@extends('master')
@section('title',"Karyawan")
@section('content')
<section>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Karyawan</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Karyawan</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <div class="container-fluid">
            <div class="card card-default">
                <div class="card-header">{{ __('Pengelolaan Karyawan') }}</div>
                <div class="card-body">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#tambahPasien">
                        <i class="fa fa-plus"></i>
                        Tambah Data
                    </button>
                    <a href="{{ route('admin.print.pasiens') }}" class="btn btn-secondary" target="_blank"><i class="fa fa-print"></i> PDF</a>
                    <a href="{{ route('admin.print.export') }}" class="btn btn-info" target="_blank"><i class="fas fa-file-export"></i> Export</a>
                    <a href="{{ route('admin.print.import') }}" class="btn btn-info" target="_blank"><i class="fas fa-file-import"></i> import</a>
                    <table id="table-data" class="table table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th>NO</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>No Telepon</th>
                                <th>Jabatan</th>
                                <th>Spesialis</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach($karyawans as $karyawan)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $karyawan->nama }}</td>
                                    <td>{{ $karyawan->alamat }}</td>
                                    <td>{{ $karyawan->no_telepon }}</td>
                                    <td>{{ $karyawan->jabatan }}</td>
                                    <td>{{ $karyawan->spesialis }}</td>
                                    <td>
                                        <button class="btn btn-warning" id="edit-karyawan" data-toggle="modal" data-target="#editKaryawan" onclick="edit({{ $karyawan->id }})">
                                            <i class="fa fa-pencil-alt"></i>
                                        </button>
                                        <button type="button" title="Hapus Karyawan" class="btn btn-danger"
                                            onclick="deleteConfirm('{{ $karyawan->id }}','{{ $karyawan->nama }}')"><i
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

    <div class="modal fade" id="tambahKaryawan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Karyawan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.karyawan.submit') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama Karyawan</label>
                            <input type="text" class="form-control" name="nama" id="nama" required>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" required>
                        </div>
                        <div class="form-group">
                            <label for="no_telepon">No Telepon</label>
                            <textarea name="no_telepon" id="no_telepon" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="jabatan">Jabatan</label>
                            <input type="text" class="form-control" name="jabatan" id="jabatan" required>
                        </div>
                        <div class="form-group">
                            <label for="spesialis">Spesialis</label>
                            <input type="text" class="form-control" name="spesialis" id="spesialis" required>
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

    <div class="modal fade" id="editKaryawan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Karyawan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.karyawan.update') }}" method="post">
                        @csrf
                        @method("PATCH")
                        <div class="form-group">
                            <label for="nama">Nama Karyawan</label>
                            <input type="text" class="form-control" name="nama" id="edit-nama" required>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" id="edit-alamat" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="no_telepon">No Telepon</label>
                            <input type="text" class="form-control" name="no_telepon" id="edit-nama_ibu" required>
                        </div>
                        <div class="form-group">
                            <label for="jabatan">Jabatan</label>
                            <input type="text" class="form-control" name="jabatan" id="edit-jabatan" required>
                        </div>
                        <div class="form-group">
                            <label for="spesialis">Spesialis</label>
                            <input type="text" class="form-control" name="spesialis" id="edit-spesialis" required>
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
</div>

</section>
@stop
    @push('js')
        <script>
            function edit(id) {
                    var edit = document.getElementById("edit-karyawan");
                    $('#image-area').empty();
                    $.ajax({
                        type: "get",
                        url: "{{ url('/admin/ajaxadmin/dataKaryawan') }}/"+id,
                        dataType: 'json',
                        success: function (res) {
                            $('#edit-nama').val(res.nama);
                            $('#edit-alamat').val(res.alamat);
                            $('#edit-tanggal_lahir').val(res.tanggal_lahir);
                            $('#edit-jabatan').val(res.jabatan);
                            $('#edit-spesialis').val(res.spesialis);
                            $('#edit-id').val(res.id);

                        },
                    });
                }

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
                            url: "{{ url('admin/karyawans/delete') }}/" + npm,
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
                    } else {
                        e.dismiss;
                    }
                }, (dismiss) => {
                    return false;
                });
            }

        </script>
    @endpush
