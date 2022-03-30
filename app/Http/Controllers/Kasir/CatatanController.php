<?php

namespace App\Http\Controllers\Kasir;

use App\Http\Controllers\Controller;
use App\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CatatanController extends Controller
{
    public function index()
    {
        $data = Transaksi::join('kasir', 'kasir.id', '=', 'kasir_id')
            ->join('pelanggan', 'pelanggan.id', '=', 'pelanggan_id')
            ->select('pelanggan.nama', 'kasir.user_id', 'transaksi.*')
            ->where('user_id', Auth::user()->id)
            ->orderBy('created_at', 'desc')
            ->get();
        // dd($data);

        return view('kasir.catatan.index', compact('data'));
    }
}
