<!DOCTYPE html>
<html>

<head>
    <style>
        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 15px;
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
            <p style="text-align:center"><span style="font-size:14px">Laporan Kehadiran Staff
                    <p style="text-align:center"><span style="font-size:14px">Pada Bulan {{ $bulan }}
                            <hr style="border:dashed 2px; width:95%; color:#000000; margin-bottom:50px">

                            <table>
                                <tr>
                                    <td width="30%">
                                        <p style="text-align:justify">Nama Staff
                                    </td>
                                    <td>:</td>
                                    <td>{{ $show['0']['user']['name'] }} </td>
                                    <td width="8%"></td>
                                    <td width="20%">
                                        <p style="text-align:justify">Total Kehadiran

                                    <td>:</td>
                                    <td> {{ $hadir }}</td>
                                </tr>


                                <tr>
                                    <td width="30%">
                                        <p style="text-align:justify">Nomor Induk Pegawai
                                    </td>
                                    <td>:</td>
                                    <td width="15%">{{ $show['0']['user']['nid'] }} </td>
                                    <td width="10%"></td>
                                    <td>
                                        <p style="text-align:justify"><span style="font-size:14px">Izin

                                    <td>:</td>
                                    <td> {{ $izin }}</td>
                                </tr>
                                <tr>
                                    <td width="30%">
                                        <p style="text-align:justify">Nomor Telepon
                                    </td>
                                    <td>:</td>
                                    <td width="15%">{{ $show['0']['user']['no_hp'] }}</td>
                                    <td width="10%"></td>
                                    <td>
                                        <p style="text-align:justify"><span style="font-size:14px">Tidak Hadir

                                    <td>:</td>
                                    <td> {{ $alfa }}</td>
                                </tr>









                            </table>






                            <hr style="border:dashed 2px; width:95%; color:#000000; margin-bottom:50px">

                            <table class="#customers td">
                                <tr>

                                    <td>Tanggal</td>
                                    <td width="15%"> Status Kehadiran</td>
                                    <td width="10%"></td>

                                </tr>
                                @foreach ($show as $item)
                                    <tr>


                                        <td width="15%">
                                            {{ date('d-m-Y', strtotime($item->date)) }}
                                        </td>
                                        <td width="15%">
                                            {{ $item->status_kehadiran }}
                                        </td>

                                    </tr>
                                @endforeach
                            </table>
                            <hr style="border:dashed 2px; width:95%; color:#000000; margin-bottom:50px">
                            <p style="text-align:left"> <span style="font-size:10px"> Cetak Pada :
                                    {{ date('d M Y') }}
                                </span>
                            </p>



</body>

</html>
