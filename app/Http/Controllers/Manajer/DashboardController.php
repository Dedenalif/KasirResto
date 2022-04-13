<?php

namespace App\Http\Controllers\Manajer;

use App\Http\Controllers\Controller;
use App\Kasir;
use App\Menu;
use App\Transaksi;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $menu = Menu::get();
        $kasir = Kasir::get();
        $pendapatan = Transaksi::whereDate('tgl_transaksi',Carbon::now())->get();

        return view('manajer.dashboard-manajer', compact('menu', 'kasir', 'pendapatan'));
    }
}
