@extends('master')
@section('title',"Pasien")
@section('content')
<section>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Pasien</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Pasien</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <div class="container-fluid">
            <div class="card card-default">
                <div class="card-header">{{ __('Pengelolaan Pasien') }}</div>
                <div class="card-body">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#tambahPasien">
                        <i class="fa fa-plus"></i>
                        Tambah Data
                    </button>
                    <a href="{{ route('admin.print.pasiens') }}" class="btn btn-secondary" target="_blank"><i class="fa fa-print"></i> PDF</a>
                    <a href="{{ route('admin.print.export') }}" class="btn btn-info" target="_blank"><i class="fas fa-file-export"></i> Export</a>
                    <table id="table-data" class="table table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th>NO</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Agama</th>
                                <th>Nama Ibu</th>
                                <th>Jenis Kelamin</th>
                                <th>Tanggal Lahir</th>
                                <th>Tanggal daftar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach($pasiens as $pasien)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $pasien->nama }}</td>
                                    <td>{{ $pasien->alamat }}</td>
                                    <td>{{ $pasien->agama }}</td>
                                    <td>{{ $pasien->nama_ibu }}</td>
                                    <td>{{ $pasien->jenis_kelamin }}</td>
                                    <td>{{ $pasien->tanggal_lahir }}</td>
                                    <td>{{ $pasien->tanggal_daftar }}</td>
                                    <td>
                                        <button class="btn btn-warning" id="edit-pasien" data-toggle="modal" data-target="#editPasien" onclick="edit({{ $pasien->id }})">
                                            <i class="fa fa-pencil-alt"></i>
                                        </button>
                                        <button type="button" title="Hapus Pasien" class="btn btn-danger"
                                            onclick="deleteConfirm('{{ $pasien->id }}','{{ $pasien->nama }}')"><i
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

    <div class="modal fade" id="tambahPasien" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Pasien</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.pasien.submit') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama Pasien</label>
                            <input type="text" class="form-control" name="nama" id="nama" required>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" required>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" id="alamat" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="agama">Agama</label>
                            <select name="agama" id="agama" class="form-control">
                                <option value="islam">ISLAM</option>
                                <option value="kristen">KRISTEN</option>
                                <option value="katolik">KATOLIK</option>
                                <option value="hindu">HINDU</option>
                                <option value="buddha">BUDDHA</option>
                                <option value="konghucu">KONGHUCU</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nama_ibu">Nama Ibu Pasien</label>
                            <input type="text" class="form-control" name="nama_ibu" id="nama_ibu" required>
                        </div>
                        <div class="form-group">
                            <label for="jk">Jenis Kelamin</label>
                            <div>
                                <div class="form-check form-check-inline" id="jk">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki"
                                        value="Laki-laki">
                                    <label class="form-check-label" for="laki">
                                        Laki-laki
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="pr"
                                        value="Perempuan">
                                    <label class="form-check-label" for="pr">
                                        Perempuan
                                    </label>
                                </div>
                            </div>
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

    <div class="modal fade" id="editPasien" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Pasien</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.pasien.update') }}" method="post">
                        @csrf
                        @method("PATCH")
                        <div class="form-group">
                            <label for="nama">Nama Pasien</label>
                            <input type="text" class="form-control" name="nama" id="edit-nama" required>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tanggal_lahir" id="edit-tanggal_lahir"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" id="edit-alamat" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="agama">Agama</label>
                            <select name="agama" id="edit-agama" class="form-control">
                                <option value="islam">ISLAM</option>
                                <option value="kristen">KRISTEN</option>
                                <option value="katolik">KATOLIK</option>
                                <option value="hindu">HINDU</option>
                                <option value="buddha">BUDDHA</option>
                                <option value="konghucu">KONGHUCU</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nama_ibu">Nama Ibu Pasien</label>
                            <input type="text" class="form-control" name="nama_ibu" id="edit-nama_ibu" required>
                        </div>
                        <div class="form-group">
                            <label for="jk">Jenis Kelamin</label>
                            <div>
                                <div class="form-check form-check-inline" id="jk">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="edit-laki"
                                        value="Laki-laki">
                                    <label class="form-check-label" for="laki">
                                        Laki-laki
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="edit-pr"
                                        value="Perempuan">
                                    <label class="form-check-label" for="pr">
                                        Perempuan
                                    </label>
                                </div>
                            </div>
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
                    var edit = document.getElementById("edit-pasien");
                    $('#image-area').empty();
                    $.ajax({
                        type: "get",
                        url: "{{ url('/admin/ajaxadmin/dataPasien') }}/"+id,
                        dataType: 'json',
                        success: function (res) {
                            $('#edit-nama').val(res.nama);
                            $('#edit-tanggal_lahir').val(res.tanggal_lahir);
                            $('#edit-alamat').val(res.alamat);
                            if (res.jenis_kelamin == "Laki-laki") {
                                $('#edit-laki').attr('checked', 'checked');
                            } else {
                                $('#edit-pr').attr('checked', 'checked');
                            }
                            $('#edit-nama_ibu').val(res.nama_ibu);
                            $('#edit-agama').val(res.agama);
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
                            url: "{{ url('admin/pasiens/delete') }}/" + npm,
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
