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
                            <a href="{{route('penilaian.create')}}" class="btn btn-secondary">Buat PKP</a>
                        </div>
                        @csrf
                        @foreach($data as $item)
                        <table id="editable" class="table table-bordered">
                            <thead class="thead" style="background-color: yellow">
                            <tr>
                                <th colspan="13">Indikator Kinerja: {{@$item->uraian}}</th>
                            </tr>
                            <tr style="border-collapse: collapse; text-align: center">
                                <th rowspan="2">No.</th>
                                <th rowspan="2">Kegiatan Tugas Jabatan</th>
                                <th rowspan="2">AK</th>
                                <th colspan="3">Target</th>
                                <th rowspan="2">AK</th>
                                <th colspan="3">Realisasi</th>
                                <th rowspan="2">Nilai Capaian Kerja</th>
                                <th rowspan="2">Aksi</th>
                            </tr>
                            <tr>
                                <th>Kuant/Output</th>
                                <th>Satuan</th>
                                <th>Kual/Mutu</th>
                                <th>Kuant/Output</th>
                                <th>Satuan</th>
                                <th>Kual/Mutu</th>
                            </tr>
                            </thead>
                            {{-- <tfoot style="text-align: center">
                                <tr style="background-color: yellow">
                                    <th colspan="10">Nilai Capaian</th>
                                    <th>100</th>
                                    <th></th>
                                </tr>
                            </tfoot> --}}
                            <tbody>
                                @foreach($item->penilaian_kinerja as $key)
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
                                <td>
                                    <div>
                                        <a href="#" class="btn-edit" data-toggle="modal" data-target="#editPKP" data-id="{{$key->id}}" data-keg="{{$key->kegiatan}}" data-akt="{{$key->angka_kredit_target}}" data-kt="{{$key->kuant_target}}" data-st="{{$key->satuan_target}}" data-klt="{{$key->kual_target}}" data-akr="{{$key->angka_kredit_realisasi}}" data-kr="{{$key->kuant_realisasi}}" data-sr="{{$key->satuan_realisasi}}" data-klr="{{$key->kual_realisasi}}" data-nilai="{{$key->nilai_capaian}}"><i class="fa fa-edit mr-2 font-success"></i></a>
                                        <a href="#" class="btn-hapus" data-toggle="modal" data-target="#hapusPKP" data-id="{{$key->id}}" data-url="{{route('penilaian.hapus', ['id' => $key->id])}}"><i class="fa fa-trash font-danger"></i></a>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                            @endforeach
                        </table>
                        @endforeach
                        <table id="editable" class="table table-bordered">
                            <thead class="thead" style="background-color: yellow">
                            <tr>
                                <th colspan="3" style="text-align: center">REKAPITULASI PENILAIAN CAPAIAN KINERJA BULAN 2022</th>
                            </tr>
                            <tr style="border-collapse: collapse; text-align: center">
                                <th rowspan="2" style="width:5%">No.</th>
                                <th rowspan="2">Kegiatan Tugas Jabatan</th>
                                <th rowspan="2" style="width:15%">Nilai Capaian Kerja</th>
                            </tr>
                            </thead>
                            <tfoot style="text-align: center">
                                <tr style="background-color: yellow">
                                    <th colspan="2">Hasil Capaian Kerja Bulan </th>
                                    <th>{{$nilai / $pembagi}}</th>
                                </tr>
                            </tfoot>
                            <tbody>
                            @foreach($data as $key)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{@$key->uraian}}</td>
                                <td>{{@$key->penilaian_kinerja->sum('nilai_capaian') / @$key->penilaian_kinerja->count()}}</td>
                            </tr>
                            @endforeach
                            </tbody>

                        </table>
                        <a href="{{route('cetak.pkp')}}" target="_blank" class="pull-right mt-4"><img src="{{asset('assets/images/print2.png')}}" style="max-width:80px" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->

</div>
<div class="modal fade" id="editPKP" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Edit PKP</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="card-body">
                <form id="form-modal-edit" class="digital-add needs-validation" action="#" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="col-form-label">Uraian Kegiatan</label>
                        <table class="table table-bordered table-responsive">
                            <tr>
                                <th style="width:25%">Kegiatan Tugas Jabatan</th>
                                <th>AK</th>
                                <th>Kuant/Output (Target)</th>
                                <th style="width:10%">Satuan (Target)</th>
                                <th>Kual/Mutu (Target)</th>
                                <th>AK</th>
                                <th>Kuant/Output (Realisasi)</th>
                                <th style="width:10%">Satuan (Realisasi)</th>
                                <th>Kual/Mutu (Realisasi)</th>
                                <th>Nilai Capaian Kerja</th>
                            </tr>
                            <tr>
                                <td><textarea name="kegiatan" id="kegiatan" cols="30" rows="5"></textarea></td>
                                <td><input type="text" name="angka_kredit_target" placeholder="0" id="angka_kredit_target" class="form-control" /></td>
                                <td><input type="text" name="kuant_target" placeholder="0" class="form-control" id="kuant_target"/></td>
                                <td>
                                    <select class="form-control select2" required="" name="satuan_target">
                                            <option value="Satuan">Satuan</option>
                                            <option value="Dokumen">Dokumen</option>
                                    </select>
                                </td>
                                <td><input type="text" name="kual_target" id="kual_target" placeholder="0" class="form-control" value="100"/></td>
                                <td><input type="text" id="angka_kredit_realisasi" name="angka_kredit_realisasi" placeholder="0" class="form-control" /></td>
                                <td><input type="text" name="kuant_realisasi" placeholder="0" id="kuant_realisasi" class="form-control" /></td>
                                <td>
                                    <select class="form-control select2" required="" name="satuan_realisasi">
                                            <option value="Satuan">Satuan</option>
                                            <option value="Dokumen">Dokumen</option>
                                    </select>
                                </td>
                                <td><input type="text" name="kual_realisasi" placeholder="0" id="kual_realisasi" class="form-control" /></td>
                                <td><input type="text" name="nilai_capaian_kerja" placeholder="0" id="nilai" class="form-control" value="100" readonly/></td>
                            </tr>
                        </table>
                    </div>


            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>

        </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="hapusPKP" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Hapus</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
                <h5>Apakah anda yakin?</h5>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <a id="hapus"> <button type="submit" class="btn btn-primary">Ya</button></a>
        </div>

      </div>
    </div>
  </div>
@endsection

@section('js-after')
<script type="text/javascript">
    $(document).ready(function () {
        $('.select2').select2();
          $('.select2bs4').select2({
              theme: 'bootstrap4'
          })

        $('.btn-edit').on('click', function() {
            id = $(this).data('id');
            keg = $(this).data('keg');
            akt = $(this).data('akt');
            kt = $(this).data('kt');
            st = $(this).data('st');
            klt = $(this).data('klt');
            akr = $(this).data('akr');
            kr = $(this).data('kr');
            sr = $(this).data('sr');
            klr = $(this).data('klr');
            nilai = $(this).data('nilai');

            urlEdit = window.location.origin + '/penilaian/' + 'edit/' + id;
            // console.log(keg)

            //pass to form modal edit
            $('#form-modal-edit').attr('action', urlEdit);
            $('#kegiatan').val(keg);
            $('#angka_kredit_target').attr('value', akt);
            $('#satuan_target').attr('value', st);
            $('#kuant_target').attr('value', kt);
            $('#kual_target').attr('value', klt);
            $('#angka_kredit_realisasi').attr('value', akr);
            $('#satuan_realisasi').attr('value', sr);
            $('#kuant_realisasi').attr('value', kr);
            $('#kual_realisasi').attr('value', klr);
            $('#nilai').attr('value', nilai);

        });

        $('.btn-hapus').on('click', function() {
            id=$(this).data('id');
            url = $(this).data('url');
            $('#hapus').attr('href', url);
        })

        $.ajaxSetup({
            headers: {
                'X-CSRF-Token' : $("input[name=_token]").val()
            }
        });

        $('#editable').Tabledit({
            url: '{{route("tabledit.action")}}',
            dataType: "JSON",
            columns: {
                identifier:[0, 'id'],
                editable: [[1, 'kegiatan'],[2,'angka_kredit_target'],[3,'kuant_target'],[4,'satuan_target','{"1":Dokumen", "2":"Satuan"}'],[5,'kual_target'],[6,'angka_kredit_realisasi'],[7,'kuant_realisasi'],[8,'satuan_realisasi','{"1":Dokumen", "2":"Satuan"}'],[9,'kual_realisasi']]
            },
            restoreButton: false,
            onSuccess: function(data, textStatus, jqXHR)
                {
                    if(data.action == 'delete')
                    {
                        $('#'+data.id).remove();
                    }
                }
        })
    });


</script>
@endsection
