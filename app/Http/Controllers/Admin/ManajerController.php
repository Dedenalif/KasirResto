<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Manajer;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ManajerController extends Controller
{
    public function index()
    {
        $data = Manajer::join('users', 'users.id', '=', 'user_id')
            ->select('manajer.id as m_id', 'users.*')
            ->get();
        // dd($data);

        return view('admin.manajer.index', compact('data'));
    }

    public function add()
    {
        return view('admin.manajer.add');
    }

    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'name' => 'required',
                'email' => 'required|unique:users,email,'
            ],
            [
                'name.required' => 'Nama Wajib Diisi',

                'email.required' => 'Email Wajib Diisi',
                'email.unique' => 'Email Sudah Ada'
            ]
        );

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make('manajer');
        $user->save();

        $user->assignRole('manajer');

        $manajer = new Manajer();
        $manajer->user_id = $user->id;
        $manajer->save();


        return redirect()->route('admin-manajer')->with('toast_success', 'Data berhasil di tambahkan');
    }

    public function edit($id)
    {
        $dt = Manajer::join('users', 'users.id', '=', 'user_id')
            ->select('manajer.id as m_id', 'manajer.user_id', 'users.*')
            ->find($id);
        // dd($dt);

        return view('admin.manajer.edit', compact('dt'));
    }

    public function update(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                'name' => 'required',
                'email' => 'required|unique:users,email,' . $request->user_id
            ],
            [
                'name.required' => 'Nama Wajib Diisi',

                'email.required' => 'Email Wajib Diisi',
                'email.unique' => 'Email Sudah ada',
            ]
        );

        $manajer = Manajer::find($id);
        $manajer->user_id = $request->user_id;
        $manajer->save();

        $user = User::find($manajer->user_id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect()->route('admin-manajer')->with('toast_success', 'Data berhasil di ubah');
    }

    public function delete($id)
    {
        $manajer = Manajer::find($id);
        $user = User::where('id', $manajer->user_id)->first();
        $user->delete();
        $manajer->delete();

        return redirect()->route('admin-manajer')->with('toast_success', 'Data berhasil di hapus');
    }
}
