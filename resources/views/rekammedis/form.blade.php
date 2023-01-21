@extends('master')
@section('title',"Rekam Medis")
@section('content')
<section>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Rekam Medis</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Rekam Medis</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <div class="container-fluid">
            <div class="card card-default">
                <div class="card-header">{{ __('Pengelolaan Rekam Medis') }}</div>
                <div class="card-body">
                    <form action="{{ route('rekam.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="pasien">Nama Pasien</label>
                            <select name="pasiens_id" id="pasien" required class="form-control">
                                @forelse($pasiens as $pasien)
                                    <option value="{{ $pasien->id }}">{{ $pasien->nama }}</option>
                                @empty
                                    <option disabled>Silahkan isi data pasien terlebih dahulu</option>
                                @endforelse
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="karyawan">Nama Karyawan</label>
                            <select name="karyawans_id" id="karyawan" required class="form-control">
                                @forelse($karyawans as $karyawan)
                                    <option value="{{ $karyawan->id }}">{{ $karyawan->nama }}</option>
                                @empty
                                    <option disabled>Silahkan isi data karyawan terlebih dahulu</option>
                                @endforelse
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="registrasi">Registrasi</label>
                            <select name="registrasis_id" id="registrasi" required class="form-control">
                                @forelse($registrasis as $registrasi)
                                <option value="{{ $registrasi->id }}">{{ $registrasi->no_antrian }}</option>
                                @empty
                                <option disabled>Silahkan isi data registrasi terlebih dahulu</option>
                                @endforelse
                            </select>
                        </div>
                        <div class="form-group">
                        <label for="alamat">keluhan</label>
                            <textarea name="keluhan" id="keluhan" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="diagnosa">Diagnosa</label>
                            <select name="kode_icd" id="diagnosa" required class="form-control">
                                @forelse($diagnosas as $diagnosa)
                                    <option value="{{ $diagnosa->id }}">{{ $diagnosa->nama_diagnosa }}</option>
                                @empty
                                    <option disabled>Silahkan isi data diagnosa terlebih dahulu</option>
                                @endforelse
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tensi">Tensi</label>
                            <input type="text" class="form-control" name="tensi" id="tensi" required>
                        </div>
                        <div class="form-group">
                            <label for="alergi">Alergi (isi bila ada)</label>
                            <input type="text" class="form-control" name="alergi" id="alergi">
                        </div>
                        <div class="form-group">
                            <label for="hasil_lab">Hasil Lab (isi bila ada)</label>
                            <input type="text" class="form-control" name="hasil_lab" id="hasil_lab">
                        </div>
                        <div class="modal-footer">
                            <a href="{{ route('rekam.index') }}" class="btn btn-secondary" data-dismiss="modal">Kembali</a>
                            <button type="submit" class="btn btn-primary">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
