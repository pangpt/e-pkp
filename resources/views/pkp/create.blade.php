@extends('layouts.master')

@section('content')
<div class="page-body">

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <div class="page-header-left">
                        <h3>Create PKP
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
                        <h5>Tambah</h5>
                    </div>
                    <div class="card-body">
                        <form class="digital-add needs-validation">
                            <div class="form-group row">
                                <label for="validationCustom0" class="col-xl-3 col-md-4"><span>*</span>Indikator Kinerja</label>
                                <select class="form-control select2 col-md-7" required="" name="indikator_kegiatan_id">
                                    <option value="">- Piliha Indikator Kegiatan -</option>
                                    @foreach($indikator as $key)
                                        <option value="">{{$key->uraian}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-md-4">Tanggal</label>
                                <input class="datepicker-here form-control digits col-md-7" type="text" data-language="en" name="tanggal">
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Uraian Kegiatan</label>
                                <table class="table table-bordered" id="dynamicTable">
                                    <tr>
                                        <th style="width:25%">Kegiatan Tugas Jabatan</th>
                                        <th>AK</th>
                                        <th>Kuant/Output (Target)</th>
                                        <th>Satuan (Target)</th>
                                        <th>Kual/Mutu (Target)</th>
                                        <th>AK</th>
                                        <th>Kuant/Output (Target)</th>
                                        <th>Satuan (Realisasi)</th>
                                        <th>Kual/Mutu (Realisasi)</th>
                                        <th>Nilai Capaian Kerja</th>
                                    </tr>
                                    <tr>
                                        <td><textarea name="kegiatan[]" id="" cols="30" rows="5"></textarea></td>
                                        <td><input type="text" name="angka_kredit_target[]" placeholder="0" class="form-control" /></td>
                                        <td><input type="text" name="kuant_target[]" placeholder="0" class="form-control" /></td>
                                        <td><input type="text" name="satuan_target[]" placeholder="Dokumen" class="form-control" /></td>
                                        <td><input type="text" name="kual_target[]" placeholder="0" class="form-control" /></td>
                                        <td><input type="text" name="angka_kredit_realisasi[]" placeholder="0" class="form-control" /></td>
                                        <td><input type="text" name="kuant_realisasi[]" placeholder="0" class="form-control" /></td>
                                        <td><input type="text" name="satuan_realisasi[]" placeholder="0" class="form-control" /></td>
                                        <td><input type="text" name="kual_realisasi[]" placeholder="0" class="form-control" /></td>
                                        <td><input type="text" name="nilai_capaian_kerja[]" placeholder="0" class="form-control" /></td>
                                        <td><button type="button" name="add" id="add" class="btn btn-success btn-sm"><i class="fa fa-plus"></button></td>
                                    </tr>
                                </table>
                            </div>

                            <button type="button" class="btn btn-primary d-block">Save</button>
                        </form>
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
        var i = 0;

       $("#add").click(function(){

           ++i;

           $("#dynamicTable").append(
               `<tr>
                    <td><textarea name="kegiatan[]" id="" cols="30" rows="5"></textarea></td>
                    <td><input type="text" name="angka_kredit_target[]" placeholder="0" class="form-control" /></td>
                    <td><input type="text" name="kuant_target[]" placeholder="0" class="form-control" /></td>
                    <td><input type="text" name="satuan_target[]" placeholder="Dokumen" class="form-control" /></td>
                    <td><input type="text" name="kual_target[]" placeholder="0" class="form-control" /></td>
                    <td><input type="text" name="angka_kredit_realisasi[]" placeholder="0" class="form-control" /></td>
                    <td><input type="text" name="kuant_realisasi[]" placeholder="0" class="form-control" /></td>
                    <td><input type="text" name="satuan_realisasi[]" placeholder="0" class="form-control" /></td>
                    <td><input type="text" name="kual_realisasi[]" placeholder="0" class="form-control" /></td>
                    <td><input type="text" name="nilai_capaian_kerja[]" placeholder="0" class="form-control" /></td>
                    <td>
                        <button type="button" class="btn btn-danger remove-tr"><i class="fa fa-minus"></button>
                    </td>
                </tr>`);
       });

       $(document).on('click', '.remove-tr', function(){
            $(this).parents('tr').remove();
       });
    $(document).ready(function () {
        $('.select2').select2();
          $('.select2bs4').select2({
              theme: 'bootstrap4'
          })
    });
</script>
@endsection
