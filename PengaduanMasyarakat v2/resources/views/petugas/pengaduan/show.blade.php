@extends('layouts.master.app')

@section('title', 'KETIKAN | Petugas')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Detail Data Aduan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Detail Data Aduan</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
            <div class="card card-info card-outline">
                <div class="card-header">
                    <h3 class="card-title">Detail</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="">
                        <h5>{{ $pengaduan->judul_aduan }}</h5>
                        <h6>Dikirim oleh: {{ $pengaduan->users->name }}</h6>
                        <span class="mailbox-read-time">{{ $pengaduan->tanggal_aduan }}</span>
                    </div>
                    <hr>
                    <div class="">
                        <p>
                            {{ $pengaduan->isi_aduan }}
                        </p>
                    </div>
                    @if($tanggapan == TRUE)
                    <label for="">Balasan</label>
                    @foreach($tanggapan as $t)
                    <div class="post">
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
                    <div class="post"></div>
                    <form action="{{ route('petugas.pengaduan.tanggapan') }}" method="post" id="form-store">
                    @csrf
                    <div class="form-group">
                      <label for="balas">Tulis Balasan</label>
                      <input type="hidden" name="pengaduan_id" value="{{$pengaduan->id}}">
                        <textarea name="isi_tanggapan" id="balas" cols="30" rows="10" class="form-control"></textarea>
                      </div>
                      <!-- /.mailbox-read-message -->
                      <button type="submit" class="btn btn-info">Kirim</button>
                    </form>
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
