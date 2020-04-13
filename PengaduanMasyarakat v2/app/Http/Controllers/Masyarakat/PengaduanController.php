<?php

namespace App\Http\Controllers\Masyarakat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pengaduan;
use App\Tanggapan;
use App\User;
use App\Role;
use Image;
use File;
use DB;

class PengaduanController extends Controller
{
    public function showPengaduan($id)
    {
        $pengaduan = Pengaduan::find($id);
        // $tanggapan = Tanggapan::find($id);

        $tanggapan = DB::table('tanggapans')
            ->join('users', 'users.id', '=', 'tanggapans.user_id')
            ->join('pengaduans', 'pengaduans.id', '=', 'tanggapans.pengaduan_id')
            ->select('users.*', 'pengaduans.*', 'tanggapans.*', DB::raw('users.name AS nama_user'))
	        ->where('pengaduan_id', $id)
            ->get();
            // $users = DB::table('role_user')
            // ->join('users', 'users.id', '=', 'role_user.user_id')
            // ->join('roles', 'roles.id', '=', 'role_user.role_id')
            // ->select('users.*', 'roles.*', DB::raw('users.name AS nama_user'))
	        // ->where('role_id', 2)
            // ->get();

        return view('masyarakat.pengaduan.show', [
            'pengaduan' => $pengaduan,
            'tanggapan' => $tanggapan
            ]);
    }
}
