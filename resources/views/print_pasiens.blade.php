<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body>
    <h1 class="text-center">Data Pasien</h1>
    <p class="text-center">Laporan Data Pasien tahun 2023</p>
    <br/>

    <table id="table-data" class="table table-bordered">
        <thead>
            <tr>
                <th>NO</th>
                <th>NAMA</th>
                <th>TANGGAL LAHIR</th>
                <th>ALAMAT</th>
                <th>AGAMA</th>
                <th>NAMA IBU</th>
                <th>JENIS KELAMIN</th>
                <th>TANGGAL DAFTAR</th>
            </tr>
        </thead>
        <tbody>
            @php $no=1; @endphp
            @foreach ($pasiens as $pasien)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$pasien->nama}}</td>
                    <td>{{$pasien->tanggal_lahir}}</td>
                    <td>{{$pasien->alamat}}</td>
                    <td>{{$pasien->agama}}</td>
                    <td>{{$pasien->nama_ibu}}</td>
                    <td>{{$pasien->jenis_kelamin}}</td>
                    <td>{{$pasien->tanggal_daftar}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
