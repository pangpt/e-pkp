<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
    table, td, th {
        border: 1px solid;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    #profil {
        width: 60%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }
    </style>
</head>
<body>
    <h4 style="text-align: center">FORMULIR PENILAIAN CAPAIAN KINERJA BULANAN <br> PEGAWAI NEGERI SIPIL</h4>
    <h6>Bula: {{\Carbon\Carbon::now()->isoFormat('MMMM YYYY')}}</h6>
    <table id="profil">
        <tr>
            <td>1</td>
            <td>Nama</td>
            <td>{{@Auth::user()->name}}</td>
        </tr>
        <tr>
            <td>2</td>
            <td>NIP</td>
            <td>{{@Auth::user()->nip}}</td>
        </tr>
        <tr>
            <td>3</td>
            <td>Pangkat/Gol Ruang</td>
            <td>{{@Auth::user()->pangkat}}</td>
        </tr>
        <tr>
            <td>4</td>
            <td>Jabatan</td>
            <td>{{@Auth::user()->jabatan}}</td>
        </tr>
        <tr>
            <td>5</td>
            <td>Unit Kerja</td>
            <td>{{@$unitkerja->nama_unit_kerja}}</td>
        </tr>
    </table>
    @foreach($data as $item)
    <table id="editable" class="table table-bordered">
        <thead class="thead" style="background-color: yellow">
        <tr>
            <th colspan="11">Indikator Kinerja: {{@$item->uraian}}</th>
        </tr>
        <tr style="border-collapse: collapse; text-align: center">
            <th rowspan="2">No.</th>
            <th rowspan="2">Kegiatan Tugas Jabatan</th>
            <th rowspan="2">AK</th>
            <th colspan="3">Target</th>
            <th rowspan="2">AK</th>
            <th colspan="3">Realisasi</th>
            <th rowspan="2">Nilai Capaian Kerja</th>
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
        </tr>
        </tbody>
        @endforeach
        <tfoot style="text-align: center">
            <tr style="background-color: yellow">
                <th colspan="10">Nilai Capaian</th>
                <th>100</th>
            </tr>
        </tfoot>
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
</body>
</html>
    
