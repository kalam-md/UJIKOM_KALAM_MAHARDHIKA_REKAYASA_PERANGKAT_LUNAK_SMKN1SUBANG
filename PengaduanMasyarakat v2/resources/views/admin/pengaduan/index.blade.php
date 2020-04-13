@extends('layouts.master.app')

@section('title', 'KETIKAN | Admin')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Aduan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Aduan</li>
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
              <h3 class="card-title">Data Aduan</h3>

              <div class="card-tools">
                <div class="input-group input-group-sm">
                  <input type="text" class="form-control" placeholder="Cari Aduan">
                  <div class="input-group-append">
                    <div class="btn btn-info">
                      <i class="fas fa-search"></i>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="mailbox-controls">
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                  <tbody>
                    @foreach($pengaduan as $aduan)
                    <tr>
                        <td>
                            <div class="icheck-info">
                                <a href="{{ route('admin.pengaduan.show', $aduan->id) }}" class="btn btn-info btn-sm">Lihat</a>
                            </div>
                        </td>
                        <td class="mailbox-name">
                            <a href="" class="text-info">{{ $aduan->users->name }}</a>
                        </td>
                        <td class="mailbox-subject">
                        <b>{{ $aduan->judul_aduan }}</b> -
                            {{ str_limit($aduan->isi_aduan, 70, '') }}
                            @if(strlen($aduan->isi_aduan) > 70)
                              <span id="dots">... <a href="" class="text-info">Baca Selengkapnya</a></span>
                            @endif
                        </td>
                        <td class="mailbox-date">{{ $aduan->tanggal_aduan }}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer p-0">
              <div class="mailbox-controls">
                <button type="button" class="btn btn-default btn-sm"><i class="fas fa-sync-alt"></i></button>
                <div class="float-right">
                  <div class="btn-group">
                    <button type="button" class="btn btn-default btn-sm"><i class="fas fa-chevron-left"></i></button>
                    <button type="button" class="btn btn-default btn-sm"><i class="fas fa-chevron-right"></i></button>
                  </div>
                  <!-- /.btn-group -->
                </div>
                <!-- /.float-right -->
              </div>
            </div>
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
@endsection
