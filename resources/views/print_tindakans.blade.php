<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body>
    <h1 class="text-center">Data tintakanPasien</h1>
    <p class="text-center">Laporan Data tindakan Pasien tahun 2023</p>
    <br/>

    <table id="table-data" class="table table-bordered">
        <thead>
            <tr>
                <th>NO</th>
                <th>NAMA TINDAKAN</th>
                <th>HARGA TINDAKAN</th>
                
            </tr>
        </thead>
        <tbody>
            @php $no=1; @endphp
            @foreach ($tindakans as $tindakan)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$tindakan->nama_tindakan}}</td>
                    <td>{{$tindakan->harga_tindakan}}</td>
                    
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
