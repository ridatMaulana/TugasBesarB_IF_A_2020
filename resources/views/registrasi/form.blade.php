@extends('master')
@section('title',"Registrasi")
@section('content')
<section>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Registrasi</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Registrasi</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <div class="container-fluid">
            <div class="card card-default">
                <div class="card-header">{{ __('Pengelolaan Registrasi') }}</div>
                <div class="card-body">
                    <form action="{{ route('registrasi.store') }}" method="post">
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
                            <label for="no-nota">no nota</label>
                            <input type="number" class="form-control" name="no_nota" id="no_nota" required>
                        </div>
                        <div class="form-group">
                            <label for="no_antrian"> no antrian</label>
                            @forelse($antrians as $antrian)
                            <input type="text" class="form-control" name="no_antrian" id="no_antrian" value="{{ ++$antrian->no_antrian }}" readonly>
                            @empty
                            <!-- <input type="text" class="form-control" name="no_antrian" id="no_antrian" value="1" readonly> -->
                            @endforelse
                        </div>
                        <div class="form-group">
                            <label for="tanggal_registrasi">tanggal registrasi</label>
                            <input type="date" class="form-control" name="tanggal_registrasi" id="tanggal_registrasi">
                        </div>
                        <div class="modal-footer">
                            <a href="{{ route('registrasi.index') }}" class="btn btn-secondary" data-dismiss="modal">Kembali</a>
                            <button type="submit" class="btn btn-primary">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
