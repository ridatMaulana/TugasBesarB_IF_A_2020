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
                    <button class="btn btn-primary" data-toggle="modal" data-target="#tambahtindakan">
                        <i class="fa fa-plus"></i>
                        Tambah Data
                    </button>
                    <a href="{{ route('admin.print.tindakans') }}" class="btn btn-secondary" target="_blank"><i class="fa fa-print"></i> PDF</a>
                    <a href="{{ route('admin.print.export') }}" class="btn btn-info" target="_blank"><i class="fas fa-file-export"></i> Export</a> 
                    <table id="table-data" class="table table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th>NO</th>
                                <th>Nama Tindakan</th>
                                <th>Harga Tindakan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach($tindakans as $tindakan)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $tindakan->nama_tindakan }}</td>
                                    <td>{{ $tindakan->harga_tindakan }}</td>
                                    <td>
                                        <button class="btn btn-warning" id="edit-tindakan" data-toggle="modal" data-target="#editTindakan" onclick="edit({{ $tindakan->id }})">
                                            <i class="fa fa-pencil-alt"></i>
                                        </button>
                                        <button type="button" title="Hapus tindakan" class="btn btn-danger"
                                            onclick="deleteConfirm('{{ $tindakan->id }}','{{ $tindakan->nama_tindakan }}')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="tambahtindakan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Tindakan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('tambah.tindakan') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama Tindakan</label>
                            <input type="text" class="form-control" name="nama_tindakan" id="nama" required>
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga Tindakan</label>
                            <input type="number" class="form-control" name="harga_tindakan" id="harga" required>
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

    <div class="modal fade" id="editTindakan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Tindakan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('ubah.tindakan') }}" method="post">
                        @csrf
                        @method("PATCH")
                        <div class="form-group">
                            <label for="nama">Nama Tindakan</label>
                            <input type="text" class="form-control" name="nama_tindakan" id="edit-nama" required>
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga Tindakan</label>
                            <input type="number" class="form-control" name="harga_tindakan" id="edit-harga" required>
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
</section>
@stop
@push('js')
    <script>
        function edit(id) {
                    $.ajax({
                        type: "get",
                        url: "{{ url('/get_tindakan') }}/"+id,
                        dataType: 'json',
                        success: function (res) {
                            $('#edit-nama').val(res.nama_tindakan);
                            $('#edit-harga').val(res.harga_tindakan);
                            $('#edit-id').val(res.id);
                        },
                    });
                }

        function deleteConfirm(npm, judul) {
                swal.fire({
                    title: "Hapus??",
                    icon: 'warning',
                    text: "Apakah anda yakin ingin menghapus data dengan nama " + judul + "?!",
                    showCancelButton: !0,
                    confirmButtonText: "Ya, lakukan!!",
                    cancelButtonText: "Tidak, Batalkan!!",
                    reverseButtons: !0,
                }).then((e) => {
                    if (e.value === true) {
                        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                        $.ajax({
                            type: 'post',
                            url: "{{ url('/hapus_tindakan') }}/"+npm,
                            data: {
                                _token: CSRF_TOKEN,
                                id: npm
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
