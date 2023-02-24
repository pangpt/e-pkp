<div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Penilaian Kinerja Pegawai</h5>
                    </div>
                    <div class="card-body order-datatable">
                        <form action="">
                            <div class="row mb-4">
                                <div class="col-2">
                                     <select class="form-control" required="">
                                        <option value="">-Bulan-</option>
                                     </select>
                                </div>
                                <div class="col-2">
                                     <select class="form-control" required="">
                                        <option value="">-Tahun-</option>
                                     </select>
                                </div>
                                <div class="col-2">
                                     <a href="{{route('penilaian.create')}}" class="btn btn-primary">Filter</a>
                                </div>
                            </div>
                        </form>
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
                            @if(@$data->count() != 0)
                            <tfoot style="text-align: center">
                                <tr style="background-color: yellow">
                                    <th colspan="10">Nilai Capaian</th>
                                    <th>{{number_format(@$rataTotal, 2, '.', '')}}</th>
                                    <th></th>
                                </tr>
                            </tfoot>
                            @else
                            <tfoot style="text-align: center">
                                <tr style="background-color: yellow">
                                    <th colspan="10">Nilai Capaian</th>
                                    <th>0</th>
                                    <th></th>
                                </tr>
                            </tfoot>
                            @endif
                            <tbody>
                                {{-- @foreach($item->penilaian_kinerja as $key) --}}
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <div>
                                        
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                            {{-- @endforeach --}}
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
                            @if(@$data->count() != 0)
                            <tfoot style="text-align: center">
                                <tr style="background-color: yellow">
                                    <th colspan="2">Hasil Capaian Kerja Bulan </th>
                                    <th>asd</th>
                                </tr>
                            </tfoot>
                            @else
                            <tfoot style="text-align: center">
                                <tr style="background-color: yellow">
                                    <th colspan="2">Hasil Capaian Kerja Bulan </th>
                                    <th>0</th>
                                </tr>
                            </tfoot>
                            @endif
                            <tbody>
                            @foreach($data as $key)
                            @if(@$data->count() != 0)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{@$key->uraian}}</td>
                                <td>{{number_format(@$rataTotal, 2, '.', '')}}</td>
                            </tr>
                            @else 
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{@$key->uraian}}</td>
                                <td>0</td>
                            </tr>
                            @endif
                            @endforeach
                            </tbody>

                        </table>
                        <a href="{{route('cetak.pkp')}}" target="_blank" class="pull-right mt-4"><img src="{{asset('assets/images/print2.png')}}" style="max-width:80px" alt=""></a>
                    </div>
                </div>
            </div>
        </div>