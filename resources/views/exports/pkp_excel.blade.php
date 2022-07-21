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
                                    
                                </td>
                            </tr>
                            </tbody>
                            @endforeach
                        </table>
                        @endforeach