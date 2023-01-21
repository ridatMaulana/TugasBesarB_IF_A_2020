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
                    <a href="{{ route('tindakan.create') }}" class="btn btn-primary">
                        <i class="fa fa-plus"></i>
                        Tambah Data
                    </a>
                    <table id="table-data" class="table table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th>Nama Tindakan</th>
                                <th>Harga Tindakan</th>
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

                                        {{-- <button class="btn btn-warning" id="edit-tindakan" data-toggle="modal" data-target="#editTindakan" onclick="edit({{ $tindakan->id }})">
                                            <i class="fa fa-pencil-alt"></i>
                                        </button> --}}
                                        <button type="button" title="Hapus Tindakan" class="btn btn-danger"
                                            onclick="deleteConfirm('{{ $tindakan->nama }}','{{ $tindakan->harga }}')"><i
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

    {{-- <div class="modal fade" id="tambahTindakan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Tindakan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.tindakan.submit') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="nama_tindakan">Nama Tindakan</label>
                            <input type="text" class="form-control" name="nama" id="nama" required>
                        </div>
                        <div class="form-group">
                            <label for="harga_tindakan">Harga Tindakan</label>
                            <textarea name="alamat" id="alamat" class="form-control" required></textarea>
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
                    <form action="{{ route('admin.tindakan.update') }}" method="post">
                        @csrf
                        @method("PATCH")
                        <div class="form-group">
                            <label for="nama">Nama Tindakan</label>
                            <input type="text" class="form-control" name="nama" id="edit-nama" required>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Harga Tindakan</label>
                            <textarea name="alamat" id="edit-alamat" class="form-control"></textarea>
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
            //         var edit = document.getElementById("edit-Rekam");
            //         $('#image-area').empty();
            //         $.ajax({
            //             type: "get",
            //             url: "{{ url('/admin/ajaxadmin/dataRekam') }}/"+id,
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
                            url: "{{ url('/tindakans/delete') }}/" + npm,
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
