@extends('layouts.master')

@section('content')

<div class="page-body">

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <div class="page-header-left">
                        <h3>Manajemen Pegawai
                            <small>Multikart Admin panel</small>
                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Menus</li>
                        <li class="breadcrumb-item active">Create Menu</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Tambah Indikator</h5>
                    </div>
                    <div class="card-body">
                        <form class="needs-validation" action="{{route('pegawai.input')}}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label for="validationCustom0" class="col-xl-3 col-md-4"><span>*</span>NIP</label>
                                <input class="form-control col-md-8" id="validationCustom0" type="text" name="nip" required="">
                            </div>
                            <div class="form-group row">
                                <label for="validationCustom0" class="col-xl-3 col-md-4"><span>*</span>Nama</label>
                                <input class="form-control col-md-8" id="validationCustom0" type="text" name="name" required="">
                            </div>
                            <div class="form-group row">
                                <label for="validationCustom0" class="col-xl-3 col-md-4"><span>*</span>Atasan</label>
                                <select class="form-control col-md-8" required="" name="atasan_id">
                                    <option value="">- Pilih Atasan Langsung -</option>
                                    @foreach($atasan as $key)
                                        <option value="{{$key->id}}">{{$key->nip}} - {{$key->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group row">
                                <label for="validationCustom0" class="col-xl-3 col-md-4"><span>*</span>Jabatan</label>
                                <select class="form-control col-md-8" required="" name="jabatan">
                                    <option value="">- Pilih Jabatan -</option>
                                    @foreach($jabatan as $key)
                                        <option value="{{$key->nama_jabatan}}">{{$key->nama_jabatan}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group row">
                                <label for="validationCustom0" class="col-xl-3 col-md-4">Pangkat</label>
                                <input class="form-control col-md-8" id="validationCustom0" type="text" name="pangkat">
                            </div>
                            <div class="form-group row">
                                <label for="validationCustom0" class="col-xl-3 col-md-4">Nomor Telepon</label>
                                <input class="form-control col-md-8" id="validationCustom0" type="text" name="phone">
                            </div>
                            <div class="form-group row">
                                <label for="validationCustom0" class="col-xl-3 col-md-4">Email</label>
                                <input class="form-control col-md-8" id="validationCustom0" type="text" name="email">
                            </div>
                            <div class="form-group row">
                                <label for="validationCustom0" class="col-xl-3 col-md-4"><span>*</span>Level</label>
                                <select class="form-control col-md-8" required="" name="level">
                                    <option value="">- Pilih Level -</option>
                                    <option value="1">Admin</option>
                                    <option value="2">Atasan</option>
                                    <option value="3">Pegawai</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary d-block">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->

</div>
@endsection
