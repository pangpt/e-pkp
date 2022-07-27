@extends('layouts.master')

@section('content')
<div class="page-body">

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>Manajemen Atasan
                            <small>Multikart Admin panel</small>
                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Menus</li>
                        <li class="breadcrumb-item active">Menu Lists</li>
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
                        <h5>Manajemen Atasan</h5>
                    </div>
                    <div class="card-body order-datatable">
                        <div class="btn-popup pull-right">
                            <a href="{{route('atasan.create')}}" class="btn btn-secondary">Tambah Atasan</a>
                        </div>
                        <table class="display" id="basic-1">
                            <thead>
                            <tr>
                                <th style="width:10%">No.</th>
                                <th style="width:25%">NIP</th>
                                <th style="width:25%">Nama</th>
                                <th style="width:25%">Detil Jabatan</th>
                                <th style="width:15%">Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($data->count())
                            @foreach($data as $key)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{@$key->nip}}</td>
                                    <td>{{@$key->name}}</td>
                                    <td>{{@$key->jabatan}}</td>
                                    <td>
                                        <a href="#" class="btn=edit" data-toggle="modal"><i class="fa fa-edit mr-2 font-secondary"></i></a>
                                        <a href="#" class="btn-hapus" data-toggle="modal" data-target="#hapusPKP"><i class="fa fa-trash font-alert"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->

</div>
@endsection
