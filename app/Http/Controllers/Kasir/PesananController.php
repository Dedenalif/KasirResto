<?php

namespace App\Http\Controllers\Kasir;

use App\Http\Controllers\Controller;
use App\Menu;
use App\Pesanan;
use App\Kasir;
use App\Pelanggan;
use App\PesananDetail;
use App\Transaksi;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PesananController extends Controller
{
    public function index()
    {
        $makanan = DB::table('menu')
            ->where('kategori', 'makanan')
            ->where('status', 'tersedia')
            ->paginate(4);
        $minuman = DB::table('menu')
            ->where('kategori', 'minuman')
            ->where('status', 'tersedia')
            ->paginate(4);

        $pesanan = DB::table('pesanan')
            ->join('menu', 'menu.id', 'pesanan.menu_id')
            ->select('pesanan.id as ps_id', 'pesanan.*', 'menu.*')
            ->where('pesanan.status', 'sedang_dipesan')
            ->get();

        $kasir = Kasir::where('user_id', Auth::user()->id)->first();

        return view('kasir.pesanan.index', compact('makanan', 'minuman', 'pesanan', 'kasir'));
    }

    public function store(Request $request)
    {
        $pesanan = Pesanan::create([
            'kasir_id' => $request->kasir_id,
            'menu_id' => $request->menu_id,
            'pesanan_detail_id' => 0,
            'pelanggan_id' => null,
            'status' => 'sedang_dipesan',
            'qty' => $request->qty,
            'sub_total' => $request->harga * $request->qty
        ]);

        return redirect()->back()->with('toast_success', 'Pesanan Berhasil Diinput');
    }

    public function update(Request $request, $id)
    {
        $pesanan1 = Pesanan::find($id);
        $menu = Menu::where('id', $pesanan1->menu_id)->first();
        $hasil = $menu->harga * $request->qty;

        $pesanan = Pesanan::find($id)->update([
            'qty' => $request->qty,
            'sub_total' => $hasil
        ]);

        return redirect()->back()->with('toast_success', 'Berhasil mengubah jumlah pesan');
    }


    public function transaksiStore(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jumlah_pembayaran' => 'required'
        ], [
            'nama.required' => 'Nama Pelanggan Wajib Diisi',
            'jumlah_pembayaran.required' => 'Jumlah Pembayaran Wajib Diisi'
        ]);

        $kasir = Kasir::join('users', 'users.id', '=', 'kasir.user_id')
            ->select('kasir.id')
            ->first();

        $getPesanan = Pesanan::where('kasir_id', $kasir->id)->where('status', 'sedang_dipesan')->get();
        $pesanan = Pesanan::where('kasir_id', $kasir->id)->where('status', 'sedang_dipesan')->first()->latest()->max('id');

        if ($request->jumlah_pembayaran < $request->total_bayar) {
            return redirect()->back()->with('toast_error', 'Nominal tidak mencukupi');
        }

        //Data Pelanggan
        $pelanggan = Pelanggan::create([
            'nama' => $request->nama
        ]);

        //Data Pesanan
        foreach ($getPesanan as $gp) {
            $update_pesanan = Pesanan::where('id', [$gp->id])->update([
                'pelanggan_id' => $pelanggan->id,
                'status' => 'sudah_bayar',
                'pesanan_detail_id' => $pesanan
            ]);
        }

        //Detail Pesanan
        foreach ($getPesanan as $gp) {
            $pesanan_detail = PesananDetail::create([
                'id_pesanan_detail' => $pesanan,
                'pesanan_id' => $gp->id
            ]);
        }

        //Transaksi
        $kode = "KSRRST";

        $transaksi = new Transaksi();
        $transaksi->kode = $kode . $pelanggan->id;
        $transaksi->pesanan_detail_id = $pesanan;
        $transaksi->total_bayar = $request->total_bayar;
        $transaksi->jumlah_pembayaran = $request->jumlah_pembayaran;
        if ($request->kembalian == '') {
            $transaksi->kembalian       = '0';
        } else {
            $transaksi->kembalian       = $request->kembalian;
        }
        $transaksi->tgl_transaksi = Carbon::now()->format('Y-m-d');
        $transaksi->save();

        return redirect()->route('pesanan')->with('toast_success', 'Pesanan berhasil di bayar');
    }

    public function delete($id)
    {
        $pesanan = Pesanan::find($id)->delete();

        return redirect()->back()->with('toast_success', 'Pesanan Berhasil Dihapus');
    }
}
