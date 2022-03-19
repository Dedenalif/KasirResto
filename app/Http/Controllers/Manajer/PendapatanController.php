<?php

namespace App\Http\Controllers\Manajer;

use App\Http\Controllers\Controller;
use App\Transaksi;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Http\Request;

class PendapatanController extends Controller
{
    public function index()
    {
        $pendapatan = Transaksi::select([
            DB::raw("DATE_FORMAT(tgl_transaksi, '%Y-%m-%d') as day"),
            DB::raw("sum(jumlah_pembayaran) as pendapatan")
        ])
            ->groupBy('day')
            ->orderBy('day', "ASC")
            ->get();
        // dd($pendapatan);
        return view('manajer.pendapatan.index', compact('pendapatan'));
    }
    public function filter(Request $request)
    {
        // dd($request);
        $request->validate(
            [
                'dari_tgl' => 'required|before_or_equal:sampai_tgl',
                'sampai_tgl' => 'required|after_or_equal:dari_tgl',
            ],
            [
                'dari_tgl.required'    => "Dari tanggal wajib di isi",
                'sampai_tgl.required'      => "Sampai tanggal wajib di isi",
                'dari_tgl.before_or_equal'        => "Tanggal tidak valid",
                'sampai_tgl.after_or_equal'         => "Tanggal tidak valid",
            ]
        );
        if (isset($request->cari)) {
            $pendapatan = Transaksi::select([
                DB::raw("DATE_FORMAT(tgl_transaksi, '%Y-%m-%d') as day"),
                DB::raw("sum(jumlah_pembayaran) as pendapatan")
            ])
                ->whereBetween('tgl_transaksi', [$request->dari_tgl, $request->sampai_tgl])
                ->groupBy('day')
                ->orderBy('day', "ASC")
                ->get();
            if ($pendapatan->isEmpty()) {
                return redirect()->route('manajer-pendapatan')->with('toast_error', 'Data tidak di temukan');
            } else {
                return view('manajer.pendapatan.index', compact('pendapatan'));
            }
        }
        if (isset($request->cetak)) {
            $pendapatan = Transaksi::select([
                DB::raw("DATE_FORMAT(tgl_transaksi, '%Y-%m-%d') as day"),
                DB::raw("sum(jumlah_pembayaran) as pendapatan")
            ])
                ->whereBetween('tgl_transaksi', [$request->dari_tgl, $request->sampai_tgl])
                ->groupBy('day')
                ->orderBy('day', "ASC")
                ->get();
            if ($pendapatan->isEmpty()) {
                return redirect()->route('manajer-pendapatan')->with('toast_error', 'Data tidak di temukan');
            } else {
                $pdf = PDF::loadView("manajer.pendapatan.cetak", compact('pendapatan'));
                return $pdf->stream('manajer-pendapatan');
            }
        }
    }
}
