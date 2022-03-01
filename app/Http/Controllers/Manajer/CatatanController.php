<?php

namespace App\Http\Controllers\Manajer;

use App\Http\Controllers\Controller;
use App\Transaksi;
use Illuminate\Http\Request;

class CatatanController extends Controller
{
    public function index()
    {
        $data = Transaksi::join('kasir', 'kasir.id', '=', 'kasir_id')
            ->join('pelanggan', 'pelanggan.id', '=', 'pelanggan_id')
            ->join('users', 'users.id', '=', 'user_id')
            ->select('pelanggan.nama as p_nama', 'users.name as k_nama', 'transaksi.*')
            ->orderBy('k_nama', 'asc')
            ->get();
        // dd($data);

        return view('manajer.catatan.index', compact('data'));
    }

    public function filter(Request $request)
    {
        if ($request->has('dari_tgl')) {
            $dari_tgl = $request->dari_tgl;
            $sampai_tgl = $request->sampai_tgl;
            $data = Transaksi::join('kasir', 'kasir.id', '=', 'transaksi.kasir_id')
                ->join('pelanggan', 'pelanggan.id', '=', 'pelanggan_id')
                ->join('users', 'users.id', '=', 'user_id')
                ->whereBetween('tgl_transaksi', [$dari_tgl, $sampai_tgl])
                ->select('transaksi.*', 'kasir.*', 'pelanggan.nama as p_nama', 'users.name as k_nama')
                ->get();
            if ($data->isEmpty()) {
                return redirect()->route('manajer-catatan')->with('toast_error', 'Data tidak ditemukan');
            }
            return view('manajer.catatan.index', compact('data'));
        }
        if ($request->has('nama')) {
            $nama = $request->nama;
            $data = Transaksi::join('kasir', 'kasir.id', '=', 'transaksi.kasir_id')
                ->join('pelanggan', 'pelanggan.id', '=', 'pelanggan_id')
                ->join('users', 'users.id', '=', 'user_id')
                ->where('users.name', 'LIKE', '%' . $nama . '%')
                ->select('transaksi.*', 'kasir.*', 'pelanggan.nama as p_nama', 'users.name as k_nama')
                ->get();
            if ($data->isEmpty() || $nama == '') {
                return redirect()->route('manajer-catatan')->with('toast_error', 'Data tidak ditemukan');
            }
            return view('manajer.catatan.index', compact('data'));
        }
    }
}
