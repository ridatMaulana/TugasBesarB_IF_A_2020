@extends('master')
@section('title',"Tindakan")
@section('content')
<section>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Tindakan</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Tindakan</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <div class="container-fluid">
            <div class="card card-default">
                <div class="card-header">{{ __('Pengelolaan Tindakan') }}</div>
                <div class="card-body">
                    <form action="{{ route('obat.store') }}" method="post">
                        @csrf
                        
                        <div class="form-group">
                            <label for="nama_tindakan">Nama Tindakan</label>
                            <input type="text" class="form-control" name="tensi" id="tensi" required>
                        </div>
                        <div class="form-group">
                            <label for="harga_tindakan">Harga Tindakan</label>
                            <input type="text" class="form-control" name="alergi" id="alergi">
                        </div>

                        <table id="table-data" class="table table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th>NO</th>
                                <th>Nama Tindakan</th>
                                <th>Harga Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach($tindakans as $tindakan)
                                <tr data-id="{{ $tindakan->id }}">
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $tindakan->nama_tindakan }}</td>
                                    <td>{{ $tindakan->harga_tindakan }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                        <div class="modal-footer">
                            <a href="{{ route('tindakan.index') }}" class="btn btn-secondary" data-dismiss="modal">Kembali</a>
                            <button type="submit" class="btn btn-primary">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
