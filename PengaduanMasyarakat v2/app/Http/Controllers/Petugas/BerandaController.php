<?php

namespace App\Http\Controllers\Petugas;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pengaduan;
use App\Tanggapan;
use App\Role;
use App\User;
use Carbon\Carbon;
use Auth;
use DB;

class BerandaController extends Controller
{
    public function index()
    {
        return view('petugas.beranda.index');
    }

    public function indexPengaduan()
    {
        $pengaduan = Pengaduan::paginate(5);
        
        return view('petugas.pengaduan.index', ['pengaduan' => $pengaduan]);
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

        return view('petugas.pengaduan.show', [
            'pengaduan' => $pengaduan,
            'tanggapan' => $tanggapan
        ]);
    }

    public function tanggapan(Request $request)
    {
        $request->validate([
            'isi_tanggapan' => 'required',
            'pengaduan_id' => 'required',
        ]);
        
        // Simpan data
        Tanggapan::create([
            'user_id' => Auth::id(),
            'tanggal_tanggapan' => Carbon::now(),
            'isi_tanggapan' => $request->isi_tanggapan,
            'pengaduan_id' => $request->pengaduan_id,
        ]);

        return redirect()->route('petugas.pengaduan.index');
    }
}
