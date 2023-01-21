@extends('master')
@section('title',"Pembayaran")
@section('content')
<section>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Pembayaran</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Pembayaran</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <div class="container-fluid">
            <div class="card card-default">
                <div class="card-header">{{ __('Pengelolaan Pembayaran') }}</div>
                <div class="card-body">
                    <form action="{{ route('pembayaran.store') }}" method="post">
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
                            <label for="obat">Obat</label>
                            <select name="obats_id" id="obat" required class="form-control">
                                @forelse($obats as $obat)
                                <option value="{{ $obat->id }}">{{ $obat->nama_obat }}</option>
                                @empty
                                <option disabled>Silahkan isi data obat terlebih dahulu</option>
                                @endforelse
                            </select>
                        </div>
                    
                        <div class="form-group">
                            <label for="tindakan">Tindakan</label>
                            <select name="tindakans_id" id="tindakan" required class="form-control">
                                @forelse($tindakans as $tindakan)
                                    <option value="{{ $tindakan->id }}">{{ $tindakan->nama_tindakan }}</option>
                                @empty
                                    <option disabled>Silahkan isi data tindakan terlebih dahulu</option>
                                @endforelse
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="rekam">Rekam Medis</label>
                            <select name="rekams_id" id="rekam" required class="form-control">
                                @forelse($rekams as $rekam)
                                    <option value="{{ $rekam->id }}">{{ $rekam->id }}</option>
                                @empty
                                    <option disabled>Silahkan isi data rekam medis terlebih dahulu</option>
                                @endforelse
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="no_antrian"> no antrian</label>
                            @forelse($antrians as $antrian)
                            <input type="text" class="form-control" name="no_antrian" id="no_antrian" value="{{ ++$antrian->no_antrian }}" readonly>
                            @empty
                            <input type="text" class="form-control" name="no_antrian" id="no_antrian" value="1" readonly>
                            @endforelse
                        </div>
                    
                     
                        <div class="modal-footer">
                            <a href="{{ route('pembayaran.index') }}" class="btn btn-secondary" data-dismiss="modal">Kembali</a>
                            <button type="submit" class="btn btn-primary">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
