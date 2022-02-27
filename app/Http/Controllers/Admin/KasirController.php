<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Kasir;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class KasirController extends Controller
{
    public function index()
    {
        $data = Kasir::join('users', 'users.id', '=', 'user_id')
            ->select('kasir.id as k_id', 'kasir.*', 'users.*')
            ->get();
        // dd($data);

        return view('admin.kasir.index', compact('data'));
    }

    public function add()
    {
        return view('admin.kasir.add');
    }

    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'name' => 'required',
                'email' => 'required|unique:users,email',
                'jenis_kelamin' => 'required',
                'no_hp' => 'required',
                'alamat' => 'required'
            ],
            [
                'name.required' => 'Nama Wajib Diisi',

                'email.required' => 'Email Wajib Diisi',
                'email.unique' => 'Email Sudah Ada',

                'jenis_kelamin.required' => 'Jenis Kelamin Wajib Diisi',

                'no_hp.required' => 'No Hp Wajib Diisi',

                'alamat.required' => 'Alamat Wajib Diisi'
            ]
        );

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make('12345678')
        ]);
        $user->assignRole('kasir');

        $kasir = Kasir::create([
            'user_id' => $user->id,
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat
        ]);

        return redirect()->route('admin-kasir')->with('toast_success', 'Data berhasil di tambahkan');;
    }

    public function edit($id)
    {
        $dt = Kasir::join('users', 'users.id', '=', 'user_id')
            ->select('kasir.id as k_id', 'kasir.*', 'users.*')
            ->find($id);


        return view('admin.kasir.edit', compact('dt'));
    }

    public function update(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                'name' => 'required',
                'email' => 'required|unique:users,email,' . $request->user_id,
                'jenis_kelamin' => 'required',
                'no_hp' => 'required',
                'alamat' => 'required'
            ],
            [
                'name.required' => 'Nama Wajib Diisi',

                'email.required' => 'Email Wajib Diisi',
                'email.unique' => 'Email Sudah Ada',

                'jenis_kelamin.required' => 'Jenis Kelamin Wajib Diisi',

                'no_hp.required' => 'No Hp Wajib Diisi',

                'alamat.required' => 'Alamat Wajib Diisi'
            ]
        );

        $kasir = Kasir::find($id);
        $kasir->user_id = $request->user_id;
        $kasir->jenis_kelamin = $request->jenis_kelamin;
        $kasir->no_hp = $request->no_hp;
        $kasir->alamat = $request->alamat;
        $kasir->save();

        $user = User::find($kasir->user_id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect()->route('admin-kasir')->with('toast_success', 'Data berhasil di ubah');
    }

    public function delete($id)
    {
        $kasir = Kasir::find($id);
        $user = User::where('id', $kasir->user_id)->first();
        $user->delete();
        $kasir->delete();

        return redirect()->route('admin-kasir')->with('toast_success', 'Data berhasil di hapus');
    }
}
