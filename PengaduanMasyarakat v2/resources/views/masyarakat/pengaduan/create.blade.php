@extends('layouts.master.m_app')

@section('title', 'KETIKAN | Masyarakat')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container">
        <div class="row mb-2">

        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container">
            <div class="col-lg-12">
                <div class="card card-info card-outline">
                    <div class="card-header">
                        <h5 class="card-title m-0">Tulis Laporan</h5>
                        <div class="card-tools">
                            <ul class="pagination pagination-sm float-right">
                                <a href="{{ route('home') }}" class="btn btn-secondary btn-sm">Kembali</a>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('masyarakat.beranda.store') }}" method="post" id="form-store" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Judul:" name="judul_aduan">
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="file" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Pilih gambar</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" style="height: 300px" name="isi_aduan">
                                </textarea>
                            </div>

                            <button class="btn btn-info" type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
    <h5>Title</h5>
    <p>Sidebar content</p>
    </div>
</aside>
<!-- /.control-sidebar -->

<!-- Main Footer -->
<footer class="main-footer">
    <!-- To the right -->
    <div class="text-center">
    <strong>Copyright &copy; 2020 <a href="#" class="text-info">Pengaduan Masyarakat</a>.</strong>
    </div>
</footer>
@endsection
