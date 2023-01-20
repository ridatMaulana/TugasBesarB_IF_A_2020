<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body>
    <h1 class="text-center">Data Diagnosa</h1>
    <p class="text-center">Laporan Data  Diagnosa Pasien tahun 2023</p>
    <br/>

    <table id="table-data" class="table table-bordered">
        <thead>
            <tr>
                <th>NO</th>
                <th>NAMA DIAGNOSA</th>
                
            </tr>
        </thead>
        <tbody>
            @php $no=1; @endphp
            @foreach ($diagnosas as $diagnosa)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$diagnosa->nama_diagnosa}}</td>
                    
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
