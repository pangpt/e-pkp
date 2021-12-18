@extends('layouts.master')

@section('content')

<div class="page-body">

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <div class="page-header-left">
                        <h3>Create Menu
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
                        <h5>Add Indikator</h5>
                    </div>
                    <div class="card-body">
                        <form class="needs-validation" action="{{route('indikator.inputIndikator')}}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label for="validationCustom0" class="col-xl-3 col-md-4"><span>*</span>Indikator Kinerja</label>
                                <input class="form-control col-md-8" id="validationCustom0" type="text" name="uraian" required="">
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
