@extends('layouts.master')

@section('content')
<div class="page-body">

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>Orders
                            <small>Multikart Admin panel</small>
                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Sales</li>
                        <li class="breadcrumb-item active">Orders</li>
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
                        <h5>Penilaian Kinerja Pegawai</h5>
                    </div>
                    <div class="card-body order-datatable">
                        <div class="btn-popup pull-right">
                            <a href="{{route('penilaian.create')}}" class="btn btn-secondary">Create User</a>
                        </div>
                        <table class="table table-stipped">
                            @foreach($data as $key)
                            <thead class="thead-dark">
                            <tr>
                                <th colspan="13">Indikator Kinerja: {{@$key->indikator_kegiatan->uraian}}</th>
                            </tr>
                            <tr style="border-collapse: collapse">
                                <th>No.</th>
                                <th>Kegiatan Tugas Jabatan</th>
                                <th>AK</th>
                                <th>Kuant/Output</th>
                                <th>Satuan (Target)</th>
                                <th>Kual/Mutu (Target)</th>
                                <th>AK</th>
                                <th>Kuant/Output</th>
                                <th>Satuan (Realisasi)</th>
                                <th>Kual/Mutu (Realisasi)</th>
                                <th>Nilai Capaian Kerja</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{@$key->kegiatan}}</td>
                                <td>{{@$key->angka_kredit_target}}</td>
                                <td>{{@$key->kuant_target}}</td>
                                <td>{{@$key->satuan_target}}</td>
                                <td>{{@$key->kual_target}}</td>
                                <td>{{@$key->angka_kredit_realisasi}}</td>
                                <td>{{@$key->kuant_realisasi}}</td>
                                <td>{{@$key->satuan_realisasi}}</td>
                                <td>{{@$key->kual_realisasi}}</td>
                                <td>{{@$key->nilai_capaian}}</td>
                            </tr>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->

</div>
@endsection

@section('js-after')
<script type="text/javascript">
    $(document).ready(function () {
        $('.select2').select2();
          $('.select2bs4').select2({
              theme: 'bootstrap4'
          })
    });
</script>
@endsection
