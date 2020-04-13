<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use App\Pengaduan;
use App\Tanggapan;
use DB;

class BerandaController extends Controller
{
    public function index()
    {
        return view('admin.beranda.index');
    }

    public function indexPengaduan()
    {
        $pengaduan = Pengaduan::all();
        
        return view('admin.pengaduan.index', ['pengaduan' => $pengaduan]);
    }

    public function showPengaduan($id)
    {
        // $pengaduan = Pengaduan::where('id', $id)->get();
        $pengaduan = Pengaduan::find($id);

        $tanggapan = DB::table('tanggapans')
        ->join('users', 'users.id', '=', 'tanggapans.user_id')
        ->join('pengaduans', 'pengaduans.id', '=', 'tanggapans.pengaduan_id')
        ->select('users.*', 'pengaduans.*', 'tanggapans.*', DB::raw('users.name AS nama_user'))
        ->where('pengaduan_id', $id)
        ->get();

        return view('admin.pengaduan.show', [
            'pengaduan' => $pengaduan,
            'tanggapan' => $tanggapan
        ]);
    }
}
