@extends('layouts.master.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Petugas</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Petugas</li>
            </ol>
        </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="card card-info card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Edit Petugas</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" method="POST" action="{{ route('admin.register.petugas') }}">
                        @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputName">NIK</label>
                                    <input type="number" class="form-control{{ $errors->has('nik') ? ' is-invalid' : '' }}" placeholder="NIK" value="{{ $user->nik }}" name="nik" value="{{ old('nik') }}" required autofocus>
                                    @if ($errors->has('nik'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('nik') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName">Tanggal Lahir</label>
                                    <input type="date" class="form-control{{ $errors->has('tanggal_lahir') ? ' is-invalid' : '' }}" value="{{ $user->tanggal_lahir }}" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required autofocus>
                                    @if ($errors->has('tanggal_lahir'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('tanggal_lahir') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName">Alamat</label>
                                    <input type="text" class="form-control{{ $errors->has('alamat') ? ' is-invalid' : '' }}" placeholder="Alamat" value="{{ $user->alamat }}" name="alamat" value="{{ old('alamat') }}" required autofocus>
                                    @if ($errors->has('alamat'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('alamat') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName">Username</label>
                                    <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ $user->name }}" name="name" id="exampleInputName" placeholder="Username" value="{{ old('name') }}" required autofocus>
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="exampleInputEmail1" placeholder="Email" value="{{ $user->email }}" name="email" value="{{ old('email') }}" required>
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" id="exampleInputPassword1" placeholder="Password" name="password" required>
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                <label for="exampleInputPassword1">Konfirmasi Password</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Konfirmasi Password" name="password_confirmation">
                                </div>
                                <button class="btn btn-info" type="submit">Submit</button>
                            </div>
                            <!-- /.card-body -->
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
@endsection