@extends('layouts.master')

@section('content')
<div class="page-body">

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header-left">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Silahkan isi indikator kinerja terlebih dahulu <a href="{{route('indikator.index')}}"><b>di sini</b></a>
                            {{-- <button type="button" class="close" data-dismiss="alert" aria-label="Close"> --}}
                            {{-- <span aria-hidden="true">&times;</span> --}}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
@endsection

