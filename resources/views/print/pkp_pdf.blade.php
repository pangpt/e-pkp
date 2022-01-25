
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
        <tfoot style="text-align: center">
            <tr style="background-color: yellow">
                <th colspan="10">Nilai Capaian</th>
                <th>100</th>
                <th></th>
            </tr>
        </tfoot>
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
                <th>100</th>
            </tr>
        </tfoot>
        <tbody>
            @foreach($data as $key)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{@$key->uraian}}</td>
            <td>{{@$key->angka_kredit_target}}</td>
        </tr>
        @endforeach
        </tbody>

    </table>
