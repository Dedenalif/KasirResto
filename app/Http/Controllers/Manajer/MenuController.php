<?php

namespace App\Http\Controllers\Manajer;

use App\Http\Controllers\Controller;
use App\Menu;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function makanan()
    {
        $data = Menu::where('kategori', 'makanan')->get();

        return view('manajer.menu.makanan', compact('data'));
    }

    public function minuman()
    {
        $data = Menu::where('kategori', 'minuman')->get();

        return view('manajer.menu.minuman', compact('data'));
    }

    public function add()
    {
        return view('manajer.menu.add');
    }

    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'nama' => 'required',
                'kategori' => 'required',
                'harga' => 'required',
                'gambar' => 'required|image'
            ],
            [
                'nama.required' => 'Nama Wajib Diisi',

                'kategori.required' => 'Kategori Wajib Diisi',

                'harga.required' => 'Harga Wajib Diisi',

                'gambar.required' => 'Gambar Wajib Diisi',
                'gambar.image' => 'Format Harus Berupa Gambar',
            ]
        );


        $lokasi = public_path('manajer/menu');


        $gambar = $request->file('gambar');
        $nama_gambar = 'menu' . time() . '.' . $gambar->getClientOriginalExtension();
        $resize = Image::make($gambar->getRealPath());
        $resize->resize(200, 150)->save($lokasi . '/' . $nama_gambar);

        $menu = new Menu();
        $menu->nama = $request->nama;
        $menu->kategori = $request->kategori;
        $menu->harga = $request->harga;
        $menu->gambar = $nama_gambar;
        $menu->status = 'tersedia';
        $menu->save();

        if ($request->kategori == 'makanan') {
            return redirect()->route('makanan')->with('toast_success', 'Data berhasil di input');
        } else {
            return redirect()->route('minuman')->with('toast_success', 'Data berhasil di input');
        }
    }

    public function edit($id)
    {
        $dt = Menu::find($id);

        return view('manajer.menu.edit', compact('dt'));
    }

    public function update(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                'nama' => 'required',
                'kategori' => 'required',
                'harga' => 'required',
                'gambar' => 'image'
            ],
            [
                'nama.required' => 'Nama Wajib Diisi',

                'kategori.required' => 'Kategori Wajib Diisi',

                'harga.required' => 'Harga Wajib Diisi',

                // 'gambar.required' => 'Gambar Wajib Diisi',
                'gambar.image' => 'Format Harus Berupa Gambar',
            ]
        );


        $lokasi = public_path('manajer/menu');


        $gambar = $request->file('gambar');


        $menu = Menu::find($id);

        if ($request->file('gambar')) {
            if ($request->old_gambar) {
                File::delete('manajer/menu/' . $request->old_gambar);
            }
            $menu->nama = $request->nama;
            $menu->kategori = $request->kategori;
            $menu->harga = $request->harga;
            //Gambar
            $nama_gambar = 'menu' . time() . '.' . $gambar->getClientOriginalExtension();
            $resize = Image::make($gambar->getRealPath());
            $resize->resize(200, 150)->save($lokasi . '/' . $nama_gambar);
            $menu->gambar = $nama_gambar;
            $menu->save();
        } else {
            $menu->nama = $request->nama;
            $menu->kategori = $request->kategori;
            $menu->harga = $request->harga;
            $menu->gambar = $request->old_gambar;
            $menu->save();
        }

        if ($request->kategori == 'makanan') {
            return redirect()->route('makanan')->with('toast_success', 'Data berhasil di ubah');
        } else {
            return redirect()->route('minuman')->with('toast_success', 'Data berhasil di ubah');
        }
    }

    public function delete($id)
    {
        $dt = Menu::find($id);
        File::delete('manajer/menu/' . $dt->gambar);
        $dt->delete();

        return redirect()->back()->with('toast_success', 'Data berhasil di hapus');
    }

    public function status($id)
    {
        $dt = Menu::find($id);

        if ($dt->status == 'tersedia') {
            Menu::where('id', $id)->update([
                'status' => 'habis'
            ]);
        } else {
            Menu::where('id', $id)->update([
                'status' => 'tersedia'
            ]);
        }

        return redirect()->back()->with('toast_success', 'Data berhasil di ubah');
    }
}
