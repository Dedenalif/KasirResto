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
            ->where('user_id', Auth::user()->id)
            ->get();
        // dd($data);

        return view('kasir.catatan.index', compact('data'));
    }
}
