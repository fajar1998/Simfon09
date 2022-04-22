<!DOCTYPE html>
<html>

<head>
    <style>
        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }

    </style>
</head>

<body>


    <p style="text-align:center"><span style="font-size:20px">Sekolah Dasar 09 Bakau
            <p style="text-align:center"><span style="font-size:14px">Laporan Hasil Ujian
                    {{ $show['tipe_ujian']['name'] }}
                    <hr style="border:dashed 2px; width:95%; color:#000000; margin-bottom:50px">

                    <table>
                        <tr>
                            <td width="15%">
                                <p style="text-align:justify">Nama Siswa
                            </td>
                            <td>:</td>
                            <td>{{ $show['siswa']['name'] }} </td>
                            <td width="10%"></td>
                            <td width="10%">
                                <p style="text-align:justify">Nilai
                            </td>
                            <td>:</td>
                            <td width="8%">{{ $show->nilai }} </td>
                        </tr>


                        <tr>
                            <td>
                                <p style="text-align:justify"><span style="font-size:14px">Tahun Ajaran

                            </td>
                            <td>:</td>
                            <td> {{ $show['tahun']['name'] }}</td>
                            <td width="10%"></td>
                            <td width="10%">
                                <p style="text-align:justify">Tertulis
                            </td>
                            <td>:</td>
                            <td width="15%">

                                @if ($show->nilai >= 90 && $show->nilai <= 100)
                                    <span class="badge badge-success">Lulus Terbaik</span>
                                @elseif($show->nilai >= 80 && $show->nilai <= 89)
                                    <span class="badge badge-info"> Lulus</span>
                                @elseif($show->nilai >= 60 && $show->nilai <= 79)
                                    <span class="badge badge-secondary"> Lulus Standar</span>
                                @elseif($show->nilai >= 50 && $show->nilai <= 59)
                                    <span class="badge badge-danger"> Tidak Lulus</span>
                                @elseif($show->nilai >= 0 && $show->nilai <= 49)
                                    <span class="badge badge-warning">Evaluasi</span>
                                @endif


                            </td>
                        </tr>

                        <tr>
                            <td>
                                <p style="text-align:justify"><span style="font-size:14px">Kelas

                            <td>:</td>
                            <td> {{ $show['kelas']['name'] }}</td>
                        </tr>

                        <tr>
                            <td>
                                <p style="text-align:justify"><span style="font-size:14px">Mata Pelajaran

                            <td>:</td>
                            <td> {{ $show['mapel']['name'] }}</td>
                        </tr>




                    </table>





                    <p style="text-align:justify">&nbsp;</p>



                    <p style="text-align:justify">&nbsp;</p>
                    <br>
                    <hr style="border:dashed 2px; width:95%; color:#000000; margin-bottom:50px">


                    <p style="text-align:left"> <span style="font-size:10px"> Cetak Pada : {{ date('d M Y') }} </span>
                    </p>
</body>

</html>
