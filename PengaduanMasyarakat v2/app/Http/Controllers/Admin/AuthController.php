<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pengaduan;
use App\Tanggapan;
use App\Role;
use App\User;
use Auth;
use Carbon\Carbon;
use DB;

class AuthController extends Controller
{
    public function index()
    {
        $users = User::all();
        $user = Auth::user();

        return view('admin.profil.index', [
            'users' => $users,
            'user' => $user
            ]);
    }

    public function edit(User $user)
    {
        $user = Auth::user();
        return view('admin.profil.edit', ['user' => $user]);
    }

    public function updateAdmin(User $user)
    {
        // $this->validate(request(), [
        //     'nik' => 'required',
        //     'name' => 'required',
        //     'tanggal_lahir' => 'required',
        //     'alamat' => 'required',
        //     'email' => 'required|email|unique:users',
        //     'password' => 'required|string|min:6|confirmed',
        // ]);

        // $user->nik = request('nik');
        // $user->name = request('name');
        // $user->tanggal_lahir = request('tanggal_lahir');
        // $user->alamat = request('alamat');
        // $user->email = request('email');
        // $user->password = bcrypt(request('password'));

        // $user->update();

        // return redirect()->route('admin.profil.index');
    }

    public function showRegister()
    {
        return view('admin.auth.register');
    }

    public function RegisterPetugas(Request $request)
    {
        $request->validate([
            'nik' => 'required|min:5',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'nik' => $request->nik,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $role = Role::select('id')->where('name', 'petugas')->first();
        $user->roles()->attach($role);

        return redirect()->route('admin.profil.index');
    }
}
