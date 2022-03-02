<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Kasir;
use App\Menu;
use App\Pelanggan;
use App\Pesanan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $menu = Menu::get();
        $pesanan = Pesanan::get();
        $pelanggan = Pelanggan::get();
        $kasir = Kasir::join('users', 'users.id', '=', 'user_id')
            ->first();

        return view('admin.dashboard-admin', compact('menu', 'pesanan', 'pelanggan', 'kasir'));
    }
}
