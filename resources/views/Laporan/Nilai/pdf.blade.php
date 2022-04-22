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
            <p style="text-align:center"><span style="font-size:14px">Laporan Hasil Siswa
                    <hr style="border:dashed 2px; width:95%; color:#000000; margin-bottom:50px">

                    <table>
                        <tr>
                            <td>
                                <p style="text-align:justify">Hasil dari
                            </td>
                            <td>:</td>
                            <td> {{ $allData['0']['tipe_ujian']['name'] }}</td>
                        </tr>


                        <tr>
                            <td>
                                <p style="text-align:justify"><span style="font-size:14px">Tahun Ajaran

                            </td>
                            <td>:</td>
                            <td> {{ $allData['0']['tahun']['name'] }}</td>
                        </tr>

                        <tr>
                            <td>
                                <p style="text-align:justify"><span style="font-size:14px">Kelas

                            <td>:</td>
                            <td> {{ $allData['0']['kelas']['name'] }}</td>
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
