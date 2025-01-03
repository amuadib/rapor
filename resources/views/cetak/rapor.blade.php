@php
    $srv = new \App\Services\NilaiService();
    $identitas = config('custom.identitas');

    function formatTanggal(string $ymd): string
    {
        $tgl = explode('-', $ymd);
        if (count($tgl) !== 3) {
            return '-';
        }
        return $tgl[2] . ' ' . config('custom.bulan')[$tgl[1]] . ' ' . $tgl[0];
    }
@endphp
<!DOCTYPE html>
<html lang="id" dir="ltr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Rapor {{ $data['santri'][0] }} {{ $data['santri'][2] }} </title>
    <style>
        body {
            width: 793.7007874px;
            height: 1247.2440945px;
            padding: 30px;
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th,
        .table td {
            border: 1px solid black;
            padding: 5px 4px;
        }

        .top {
            vertical-align: top;
        }

        .medium {
            font-size: 12px;
        }

        .small {
            font-size: 10px;
        }

        .center {
            text-align: center;
        }

        .bold {
            font-weight: bold;
        }

        .underline {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div
        style="border-bottom: 3px double black;display:flex;flex-direction:row; justify-content:center; padding-bottom: 10px;">
        <div style="margin-right:20px;">
            <img src="{{ asset('logo.png') }}" alt="Logo {{ $identitas['nama'] }}" style="width:84px;">
        </div>
        <div style="text-align:center">
            <h2 style="margin:0px;padding:0px;font-family:Calibri;">{{ $identitas['nama_arab'] }}</h2>
            <h3 style="margin:0px;padding:0px;text-transform:uppercase;">{{ $identitas['nama'] }}</h3>
            <div class="medium">Nomor Statistik: {{ $identitas['nomor_statistik'] }}</div>
            <div class="medium">{{ $identitas['alamat']['jalan'] }} {{ $identitas['alamat']['kelurahan'] }}
                {{ $identitas['alamat']['kecamatan'] }} {{ $identitas['alamat']['kabupaten'] }} </div>
        </div>
    </div>

    <h3 class="center">Laporan Hasil Belajar Santri</h3>
    <table>
        <tr>
            <td class="bold top" width="20%">Nama Santri</td>
            <td class="top" width="40%">: {{ $data['santri'][0] }}</td>
            <td class="bold top" width="20%">Tahun Ajaran</td>
            <td>: {{ explode(' ', $data['santri'][2])[0] }}</td>
        </tr>
        <tr>
            <td class="bold">Kelas</td>
            <td>: {{ $data['santri'][1] }}</td>
            <td class="bold">Semester</td>
            <td>: {{ explode(' ', $data['santri'][2])[1] }}</td>
        </tr>
    </table>
    <br>
    <br>
    <table class="table">
        <thead>
            <tr>
                <th rowspan="2">No</th>
                <th rowspan="2">Mata Pelajaran</th>
                <th colspan="3">Nilai</th>
                <th rowspan="2" width="200px">TTD</th>
            </tr>
            <tr>
                <th>Angka</th>
                <th>Huruf</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data['nilai'] as $id => $n)
                @if ($id != 'total')
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $data['pelajaran'][$id] }}</td>
                        <td>{{ $n }}</td>
                        <td>{{ $srv->terbilang($n) }}</td>
                        <td>{{ $srv->predikat($n) }}</td>
                        @if ($loop->index == 0)
                            <td rowspan="{{ count($data['nilai']) }}" class="center">
                                Wali Kelas
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <span class="bold">
                                    {{ $data['santri'][3] }}
                                </span>
                            </td>
                        @endif
                    </tr>
                @endif
            @endforeach
            @php
                $r = round($data['nilai']['total'] / (count($data['nilai']) - 1), 0);
            @endphp
            <tr>
                <td colspan="2">Rata-rata</td>
                <td>{{ $r }}</td>
                <td>{{ $srv->terbilang($r) }}</td>
                <td>{{ $srv->predikat($r) }}</td>
            </tr>
            <tr>
                <td colspan="2">Peringkat ke-</td>
                <td colspan="3">{{ $data['peringkat'] }} dari {{ $data['jumlah'] }} santri</td>
                <td rowspan="7" class="center">
                    Wali Santri
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    (.............................)
                </td>
            </tr>
            <tr>
                <td rowspan="3" colspan="2">Ketidakhadiran</td>
                <td>Sakit</td>
                <td colspan="2">___ hari</td>
            </tr>
            <tr>
                <td>Izin</td>
                <td colspan="2">___ hari</td>
            </tr>
            <tr>
                <td>Tanpa keterangan</td>
                <td colspan="2">___ hari</td>
            </tr>
            <tr>
                <td rowspan="3" colspan="2">Kepribadian</td>
                <td>Kelakuan</td>
                <td colspan="2"></td>
            </tr>
            <tr>
                <td>Kerajinan</td>
                <td colspan="2"></td>
            </tr>
            <tr>
                <td>Kerapian</td>
                <td colspan="2"></td>
            </tr>
            <tr>
                <td colspan="6" class="top small">
                    Catatan untuk diperhatikan Orang Tua / Wali:
                    <br>
                    <br>
                    <br>
                    <br>
                </td>
            </tr>
            @if (explode(' ', $data['santri'][2])[1] == 'Genap')
                <tr>
                    <td colspan="6">
                        <span class="bold">Keputusan:</span>
                        <br>
                        Dengan memperhatikan hasil yang dicapai pada Semester I dan Semester II maka santri ini
                        dinyatakan
                        <br>
                        Naik ke / Tinggal di kelas .......... (..............)
                    </td>
                </tr>
            @endif
        </tbody>
    </table>
    <br><br>
    <table>
        <tr>
            <td width="70%"></td>
            <td class="center">
                Blitar, {{ formatTanggal($data['santri'][4]) }} <br>
                Kepala Madrasah Diniyah
                <div style="position:relative; height: 100px;">
                    <img src="{{ asset('stempel.png') }}" alt="Stempel {{ $identitas['nama'] }}"
                        style="position:absolute; top:{{ rand(-30, -20) }}px;left:{{ rand(-50, -40) }}px;width:150px;;z-index:100">
                    <img src="{{ asset('ttd.png') }}" alt="TTD Kepala {{ $identitas['nama'] }}"
                        style="position:absolute; top:{{ rand(-6, 1) }}px;left:{{ rand(40, 30) }}px;width:150px;z-index:1">
                </div>
                <span class="bold underline">{{ $identitas['kepala'] }}</span>
            </td>
        </tr>
    </table>
</body>

</html>
