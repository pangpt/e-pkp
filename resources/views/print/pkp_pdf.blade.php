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
    #foot tr td {
        border: 0px solid;
    }
    </style>
    <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/admin.css">

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
                <th>{{@$item->penilaian_kinerja->count() == 0 ? 0 : number_format(@$item->penilaian_kinerja->sum('nilai_capaian') / @$item->penilaian_kinerja->count(), 2, '.', '')}}</th>
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
                <th rowspan="1" style="width:5%">No.</th>
                <th rowspan="1">Kegiatan Tugas Jabatan</th>
                <th rowspan="1" style="width:15%">Nilai Capaian Kerja</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $key)
            @if(@$data->count() != 0)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{@$key->uraian}}</td>
                <td>{{number_format(@$key->penilaian_kinerja->sum('nilai_capaian') / @$data->count(), 2, '.', '')}}</td>
            </tr>
            @else
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{@$key->uraian}}</td>
                <td>0</td>
            </tr>
            @endif
            @endforeach
            {{-- <tr style="background-color: yellow">
                <th colspan="2">Hasil Capaian Kerja Bulan </th>
                <th>{{number_format($nilai / $pembagi, 2, '.', '')}}</th>
            </tr> --}}
        </tbody>
        <tfoot style="text-align: center">
            <tr style="background-color: yellow">
                <th colspan="2">Hasil Capaian Kerja Bulan </th>
                <th>{{number_format($rata, 2, '.', '')}}</th>
            </tr>
        </tfoot>

    </table>
    <br>
    <table class="foot">
        <tr>
            <td>Yang Menilai</td>
            <td style="text-align: right">Yang Dinilai</td>
        </tr>
        <tr>
            <td style="text-align: right; margin-bottom: 100px"><br><br><br><br><br><br></td>
            <td style="text-align: right; margin-bottom: 100px"><br><br><br><br><br><br></td>
        </tr>
        <tr>
            <td>Pak Sekma</td>
            <td style="text-align: right; text-decoration: underline;">{{Auth::user()->name}}<br><span>{{Auth::user()->nip}}</span></td>
        </tr>
    </table>
    <script src="/assets/js/bootstrap.js"></script>
</body>
</html>

