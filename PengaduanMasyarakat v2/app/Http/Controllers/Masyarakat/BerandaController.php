<?php

namespace App\Http\Controllers\Masyarakat;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Controller;
use App\Pengaduan;
use App\Role;
use App\User;
use Carbon\Carbon;
use Auth;
use Image;
use File;

class BerandaController extends Controller
{
    public $path;
    public $dimensi;

    public function __construct()
    {
        // Definisikan pathnya atau letaknya
        $this->path = storage_path('app/public/images');

        // Definisikan dimensinya
        $this->dimensi = ['245', '300', '500'];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengaduan = Pengaduan::all();
        $u_pengaduan = Pengaduan::where('user_id', Auth::id())->get();
        
        return view('masyarakat.beranda.index', [
            'pengaduan' => $pengaduan,
            'u_pengaduan' => $u_pengaduan,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('masyarakat.pengaduan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul_aduan' => 'required',
            'isi_aduan' => 'required',
            'file' => 'required|image|mimes:jpg,png,jpeg',
        ]);

        // Jika foldernya belum ada
        if(!File::isDirectory($this->path)) {
            // Maka foldernya akan dibuat
            File::makeDirectory($this->path);
        }

        // Mengambil file image dari form
        $file = $request->file('file');
        // Membuat nama file dari gabungan timestaps dan unik id
        $fileName = Carbon::now()->timestamp . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        // Upload original file(dimensinya belum di ubah)
        Image::make($file)->save($this->path . '/' . $fileName);

        // Looping array dimensi yang diinginkan
        // Yang telah didefinisikan pada controller
        foreach($this->dimensi as $row) {
            // Buat canvas image sebesar dimensi yang ada dalam array
            $canvas = Image::canvas($row, $row);
            // Resize image sesuai yang ada dalam array
            // Dengan mempertahankan ratio
            $resizeImage = Image::make($file)->resize($row, $row, function($constraint) {
                $constraint->aspectRatio();
            });

            // Cek jika foldernya belum ada
            if(!File::isDirectory($this->path . '/' . $row)) {
                // Maka buat folder dengan nama dimensi
                File::makeDirectory($this->path . '/' . $row);
            }

            // Memasukan image yang telah diresize kedalam canvas
            $canvas->insert($resizeImage, 'center');
            // Simpan image kedalam masing-masing folder dimensi
            $canvas->save($this->path . '/' . $row . $fileName);
        }
        
        // Simpan data
        Pengaduan::create([
            'user_id' => Auth::id(),
            'tanggal_aduan' => Carbon::now(),
            'judul_aduan' => $request->judul_aduan,
            'isi_aduan' => $request->isi_aduan,
            'nama_file' => $fileName,
            'dimensi' => implode('|', $this->dimensi),
            'path' => $this->path,
        ]);

        return redirect()->route('masyarakat.beranda.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
