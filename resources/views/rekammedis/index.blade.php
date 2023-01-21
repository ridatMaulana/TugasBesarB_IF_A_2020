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
                    <a href="{{ route('rekam.create') }}" class="btn btn-primary">
                        <i class="fa fa-plus"></i>
                        Tambah Data
                    </a>
                    <table id="table-data" class="table table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th>NO</th>
                                <th>Nama Pasien</th>
                                <th>Nama Dokter</th>
                                <th>No Antrian</th>
                                <th>Diagnosa</th>
                                <th>Keluhan</th>
                                <th>Tanggal Rekam Medis</th>
                                <th>Tensi</th>
                                <th>Alergi</th>
                                <th>Hasil Lab</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach($rekams as $rekam)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $rekam->pasiens->nama }}</td>
                                    <td>{{ $rekam->karyawans->nama }}</td>
                                    <td>{{ $rekam->registrasis->no_antrian }}</td>
                                    <td>{{ $rekam->icd->nama_diagnosa }}</td>
                                    <td>{{ $rekam->keluhan }}</td>
                                    <td>{{ $rekam->tanggal_dibuat }}</td>
                                    <td>{{ $rekam->tensi }}</td>
                                    <td>{{ $rekam->alergi }}</td>
                                    <td>{{ $rekam->hasil_lab }}</td>
                                    <td>

                                        {{-- <button class="btn btn-warning" id="edit-rekam" data-toggle="modal" data-target="#editRekam" onclick="edit({{ $rekam->id }})">
                                            <i class="fa fa-pencil-alt"></i>
                                        </button> --}}
                                        <button type="button" title="Hapus Rekam Medis" class="btn btn-danger"
                                            onclick="deleteConfirm('{{ $rekam->id }}','{{ $rekam->nama }}')"><i
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

    {{-- <div class="modal fade" id="tambahRekam" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Rekam</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.rekam.submit') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama Rekam Medis</label>
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

    <div class="modal fade" id="editRekam" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Rekam Medis</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.rekam.update') }}" method="post">
                        @csrf
                        @method("PATCH")
                        <div class="form-group">
                            <label for="nama">Nama Rekam</label>
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
                            url: "{{ url('/rekams/delete') }}/" + npm,
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
