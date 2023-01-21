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
                    <a href="{{ route('pembayaran.create') }}" class="btn btn-primary">
                        <i class="fa fa-plus"></i>
                        Tambah Data
                    </a>
                    <table id="table-data" class="table table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th>NO</th>
                                <th>Nama Pasien</th>
                                <th>Nama Dokter</th>
                                <th>Obat</th>
                                <th>Tindakan</th>
                                <th>Rekam Medis</th>
                                <th>No Antrian</th>
                                <th>Tanggal Transaksi</th>
                                <th>Biaya</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach($bayars as $bayar)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $bayar->pasiens->nama }}</td>
                                    <td>{{ $bayar->karyawans->nama }}</td>
                                    <td>{{ $bayar->obat->nama_obat }}</td>
                                    <td>{{ $bayar->tindakan->nama_tindakan }}</td>
                                    <td>{{ $bayar->rekammedises->id }}</td>
                                    <td>{{ $bayar->no_antrian }}</td>
                                    <td>{{ $bayar->tanggal_transaksi }}</td>
                                    <td>{{ $bayar->total_biaya }}</td>
                                    <td>

                                        {{-- <button class="btn btn-warning" id="edit-pembayaran" data-toggle="modal" data-target="#editpembayaran" onclick="edit({{ $pembayaran->id }})">
                                            <i class="fa fa-pencil-alt"></i>
                                        </button> --}}
                                        <button type="button" title="Hapus Pembayaran" class="btn btn-danger"
                                            onclick="deleteConfirm('{{ $bayar->id }}','{{ $bayar->nama }}')"><i
                                                class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="modal fade" id="tambahpembayaran" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah pembayaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.pembayaran.submit') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama Pembayaran</label>
                            <input type="text" class="form-control" name="nama" id="nama" required>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" id="alamat" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="no_telepon">No Telepon</label>
                            <input type="number" class="form-control" name="no_telepon" id="no_telepon" required>
                        </div>
                        <div class="form-group">
                            <label for="jabatan">Jabatan</label>
                            <select name="jabatan" id="jabatan" class="form-control">
                                <option value="Dokter">Dokter</option>
                                <option value="Admin">Admin</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="spesialis">Spesialis</label>
                            <select name="spesialis" id="spesialis" class="form-control">
                                @foreach ($spesialis as $spel)
                                <option value="{{ $spel->id }}">{{ $spel->nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editpembayaran" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Pembayaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.pembayaran.update') }}" method="post">
                        @csrf
                        @method("PATCH")
                        <div class="form-group">
                            <label for="nama">Nama pembayaran</label>
                            <input type="text" class="form-control" name="nama" id="edit-nama" required>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" id="edit-alamat" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="no_telepon">No Telepon</label>
                            <input type="number" class="form-control" name="no_telepon" id="edit-no_telepon" required>
                        </div>
                        <div class="form-group">
                            <label for="jabatan">Jabatan</label>
                            <input type="text" class="form-control" name="jabatan" id="edit-jabatan" required>
                        </div>
                        <div class="form-group">
                            <label for="spesialis">Spesialis</label>
                            <select name="spesialis" id="edit-spesialis" class="form-control">
                                @foreach ($spesialis as $spel)
                                <option value="{{ $spel->id }}">{{ $spel->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="id" id="edit-id">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


<!-- modal import data form -->
<div class="modal fade" id="importDataModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">import data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{route('admin.print.import') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="cover">upload file</label>
                        <input type="file" class="form-control" name="file"/>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">batal</button>
                        <button type="submit" class="btn btn-primary">import data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> --}}

</section>
@stop
    @push('js')
        <script>
            // function edit(id) {
            //         var edit = document.getElementById("edit-pembayaran");
            //         $('#image-area').empty();
            //         $.ajax({
            //             type: "get",
            //             url: "{{ url('/admin/ajaxadmin/datapembayaran') }}/"+id,
            //             dataType: 'json',
            //             success: function (res) {
            //                 $('#edit-nama').val(res.nama);
            //                 $('#edit-alamat').val(res.alamat);
            //                 $('#edit-tanggal_lahir').val(res.tanggal_lahir);
            //                 $('#edit-jabatan').val(res.jabatan);
            //                 $('#edit-no_telepon').val(res.no_telepon);
            //                 $('#edit-spesialis').val(res.spesialis_id);
            //                 $('#edit-id').val(res.id);

            //             },
            //         });
            //     }

            function deleteConfirm(npm, judul) {
                swal.fire({
                    title: "Hapus??",
                    icon: 'warning',
                    text: "Apakah anda yakin ingin menghapus data dengan judul " + judul + "?!",
                    showCancelButton: !0,
                    confirmButtonText: "Ya, lakukan!!",
                    cancelButtonText: "Tidak, Batalkan!!",
                    reverseButtons: !0,
                }).then((e) => {
                    if (e.value === true) {

                        $.ajax({
                            type: 'DELETE',
                            url: "{{ url('/pembayarans/delete') }}/" + npm,
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            Type: 'JSON',
                            success: (result) => {
                                if (result.success === true) {
                                    swal.fire("Done!", result.message, "success");

                                    setTimeout(() => {
                                        location.reload();
                                    }, 1000);
                                } else {
                                    swal.fire("Error!", result.message, "error");
                                }
                            },
                        });
                    } e
                }, (dismiss) => {
                    return false;
                });
            }

        </script>
    @endpush
