<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body>
    <h1 class="text-center">Data ObatPasien</h1>
    <p class="text-center">Laporan Data Obat Pasien tahun 2023</p>
    <br/>

    <table id="table-data" class="table table-bordered">
        <thead>
            <tr>
                <th>NO</th>
                <th>ID ICD</th>
                <th>NAMA OBAT/th>
                <th>HARGA OBAT</th>
                
            </tr>
        </thead>
        <tbody>
            @php $no=1; @endphp
            @foreach ($obats as $obat)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$obat->icds_id}}</td>
                    <td>{{$obat->nama_obat}}</td>
                    <td>{{$obat->harga_obat}}</td>
                   
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
