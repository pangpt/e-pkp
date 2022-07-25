@extends('layouts.master')

@section('content')
<div class="page-body">

    <div class="page-body">

        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="page-header-left">
                            <h3>Unit Kerja
                            </h3>
                        </div>
                    </div>
                    {{-- <div class="col-lg-6">
                        <ol class="breadcrumb pull-right">
                            <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item">Digital</li>
                            <li class="breadcrumb-item active">Add Product</li>
                        </ol>
                    </div> --}}
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->

        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Ubah Unit Kerja</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{route('unitkerja.edit')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="digital-add needs-validation">
                                    <div class="form-group">
                                        <label for="validationCustomtitle" class="col-form-label pt-0"> Nama Unit Kerja</label>
                                        <input class="form-control" id="validationCustomtitle"  name="nama_unit_kerja" type="text" value="{{@$data->nama_unit_kerja}}">
                                    </div>
                                </div>
                                <div class="pull-left">
                                    <button type="sumbit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->

    </div>

    <!-- footer start-->
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 footer-copyright">
                    <p class="mb-0">Copyright 2019 © Multikart All rights reserved.</p>
                </div>
                <div class="col-md-6">
                    <p class="pull-right mb-0">Hand crafted & made with<i class="fa fa-heart"></i></p>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer end-->

</div>
@endsection
