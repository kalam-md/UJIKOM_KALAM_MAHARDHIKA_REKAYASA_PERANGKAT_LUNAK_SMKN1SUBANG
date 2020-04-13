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
        <div class="row">
          <!-- /.col-md-6 -->
          <div class="col-lg-9">
            <div class="card card-info card-outline card-outline-tabs">
              <div class="card-header p-0 pt-1 border-bottom-0">
                  <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                  <li class="nav-item">
                      <a class="nav-link active text-info" id="custom-tabs-two-home-tab" data-toggle="pill"
                      href="#custom-tabs-two-home" role="tab" aria-controls="custom-tabs-two-home"
                      aria-selected="true">Semua</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link text-info" id="custom-tabs-two-profile-tab" data-toggle="pill"
                      href="#custom-tabs-two-profile" role="tab" aria-controls="custom-tabs-two-profile"
                      aria-selected="false">Aduan Saya</a>
                  </li>
                  </ul>
              </div>
              <div class="card-body">
                  <div class="tab-content" id="custom-tabs-two-tabContent">
                    <div class="tab-pane fade show active" id="custom-tabs-two-home" role="tabpanel"
                        aria-labelledby="custom-tabs-two-home-tab">
                        @foreach($pengaduan as $aduan)
                        <div class="post">
                          <div class="user-block">
                              <img class="img-circle img-bordered-sm" src="/assets/dist/img/lam.jpg"
                              alt="user image">
                              <span class="username">
                              <a href="#" class="text-info">
                                @if(Auth::user()->hasAnyRole('masyarakat'))
                                {{ $aduan->users->name }}
                                @endif
                              </a>
                              </span>
                              <span class="description">Dipublikasikan pada, {{ $aduan->tanggal_aduan }}</span>
                          </div>
                          <!-- /.user-block -->
                          <h4 class="text-info">{{ $aduan->judul_aduan }}</h4>
                          <p>
                            {{ str_limit($aduan->isi_aduan, 310, '') }}
                            @if(strlen($aduan->isi_aduan) > 310)
                              <span id="dots">...... <a href="{{ route('masyarakat.pengaduan.show', $aduan->id) }}" class="text-info">Baca Selengkapnya</a></span>
                            @endif
                          </p>

                          <p>
                              <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Sukai</a>
                              @hasrole('petugas')
                              <span class="float-right">
                              <a href="#" class="link-black text-sm">
                                  <i class="far fa-comments mr-1"></i> Balas
                              </a>
                              </span>
                              @endhasrole
                              <span class="float-right">
                              <a href="#" class="link-black text-sm">
                                  <i class="far fa-comments mr-1"></i> Lihat Balasan
                              </a>
                              </span>
                          </p>
                        </div>
                        @endforeach
                        <!-- <div class="col-lg-4">
                        </div> -->
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-two-profile" role="tabpanel"
                        aria-labelledby="custom-tabs-two-profile-tab">
                        @foreach($u_pengaduan as $aduan)
                        <div class="post">
                          <div class="user-block">
                              <img class="img-circle img-bordered-sm" src="/assets/dist/img/lam.jpg"
                              alt="user image">
                              <span class="username">
                              <a href="#" class="text-info">
                                {{ $aduan->users->name }}
                              </a>
                              </span>
                              <span class="description">Dipublikasikan pada, {{ $aduan->tanggal_aduan }}</span>
                          </div>
                          <!-- /.user-block -->
                          <h4 class="text-info">{{ $aduan->judul_aduan }}</h4>
                          <p>
                            {{ str_limit($aduan->isi_aduan, 310, '') }}
                            @if(strlen($aduan->isi_aduan) > 310)
                              <span id="dots">...... <a href="{{ route('masyarakat.pengaduan.show', $aduan->id) }}" class="text-info">Baca Selengkapnya</a></span>
                            @endif
                          </p>

                          <p>
                              <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Sukai</a>
                              @hasrole('petugas')
                              <span class="float-right">
                              <a href="#" class="link-black text-sm">
                                  <i class="far fa-comments mr-1"></i> Balas
                              </a>
                              </span>
                              @endhasrole
                              <span class="float-right">
                              <a href="#" class="link-black text-sm">
                                  <i class="far fa-comments mr-1"></i> Lihat Balasan
                              </a>
                              </span>
                          </p>
                        </div>
                        @endforeach
                    </div>
                  </div>
              </div>
            <!-- /.card -->
            </div>
          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-3">
            <div class="card card-widget widget-user">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-info">
                    <h3 class="widget-user-username">{{ Auth::user()->name }}</h3>
                    <h5 class="widget-user-desc">{{ Auth::user()->email }}</h5>
                </div>
                <div class="widget-user-image">
                    <img class="img-circle elevation-2" src="/assets/dist/img/user1-128x128.jpg" alt="User Avatar">
                </div>
                <div class="card-footer">
                    <div class="row">
                      <div class="col-sm-12 border-right">
                          <div class="description-block">
                            <a href="" class="btn btn-info btn-block">
                            <i class="fas fa-user"></i> Lihat Profil</a>
                          </div>
                          <!-- /.description-block -->
                      </div>
                    </div>
                    <!-- /.row -->
                </div>
            </div>
            <div class="card card-info card-outline">
                <div class="card-body">
                    <a href="{{ route('masyarakat.beranda.create') }}" class="btn btn-info btn-block">
                        <i class="fas fa-edit"></i> Tulis Aduan
                    </a>
                </div>
            </div>
          </div>
        </div>
    </div><!-- /.container-fluid -->
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
    <strong>Copyright &copy; 2020 <a href="" class="text-info">KETIKAN</a>.</strong>
  </div>
</footer>
@endsection
