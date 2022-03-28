<?php

namespace App\Http\Controllers\Manajer;

use App\Http\Controllers\Controller;
use App\Kasir;
use App\Menu;
use App\Transaksi;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $menu = Menu::get();
        $kasir = Kasir::get();
        $pendapatan = Transaksi::get();

        return view('manajer.dashboard-manajer', compact('menu', 'kasir', 'pendapatan'));
    }
}
