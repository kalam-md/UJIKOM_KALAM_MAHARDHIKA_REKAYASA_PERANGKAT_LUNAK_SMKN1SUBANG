@extends('layouts.master.m_app')

@section('title', 'KETIKAN | Masyarakat')
@section('content')
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
    <section class="content">
      <div class="row">
          <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="post">
                        <div class="user-block">
                            <img class="img-circle img-bordered-sm" src="/assets/dist/img/user1-128x128.jpg" alt="user image">
                        <span class="username">
                            <a href="#" class="text-info">{{ $pengaduan->users->name }}</a>
                        </span>
                        <span class="description">Dipublikasikan pada - {{ $pengaduan->tanggal_aduan }}</span>
                        </div>
                        <!-- /.user-block -->
                        <h4 class="text-info"><b>{{ $pengaduan->judul_aduan }}</b></h4>
                        <p class="text-justify">
                        {{ $pengaduan->isi_aduan }}
                        </p>
                        <img src="{{ url('storage/app/public/images/' . $pengaduan->nama_file) }}" alt="">
                    </div>
                    @if($tanggapan == TRUE)
                    @foreach($tanggapan as $t)
                    <div class="ml-4 post">
                        <div class="user-block">
                            <img class="img-circle img-bordered-sm" src="/assets/dist/img/user1-128x128.jpg" alt="user image">
                        <span class="username">
                            <a href="#" class="text-info">{{ $t->name }}</a>
                        </span>
                        <span class="description">Dipublikasikan pada - {{ $t->tanggal_tanggapan }}</span>
                        </div>
                        <!-- /.user-block -->
                        <p class="text-justify">
                        {{ $t->isi_tanggapan }}
                        </p>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
            <!-- /.card -->
        </div>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
@endsection
