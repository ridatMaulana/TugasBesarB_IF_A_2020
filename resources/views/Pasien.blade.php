@extends('master');
@section('title',"Pasien");
<!-- Content Wrapper. Contains page content -->

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
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
        </div><!-- /.container-fluid -->
    </section>
    <div class="container-fluid">
        <div class="card card-default">
            <div class="card-header">{{ __('Pengelolaan Pasien') }}</div>
            <div class="card-body">
                <button class="btn btn-primary" data-toggle="modal" data-target="#tambahPasienModal">
                    <i class="fa fa-plus"></i>
                    Tambah Data
                </button>
                <a href="" target="blank" class="btn btn-secondary">
                    <i class="fa fa-print"></i>
                    Cetak PDF
                </a>
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="" class="btn btn-info" target="_blank">Export</a>
                    <button type="button" class="btn btn-warning" data-toggle="modal"
                        data-target="#importDataModal">Import</button>
                </div>
                <hr>
                <table id="table-data" class="table table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th>NO</th>
                            <th>NAMA</th>
                            <th>TANGGAL LAHIR</th>
                            <th>ALAMAT</th>
                            <th>AGAMA</th>
                            <th>NAMA IBU</th>
                            <th>JENIS KELAMIN</th>
                            <th>TANGGAL DAFTAR</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no=1; @endphp
                            @foreach($pasiens as $pasien)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $pasien->nama }}</td>
                                    <td>{{ $pasien->tanggal_lahir }}</td>
                                    <td>{{ $pasien->alamat }}</td>
                                    <td>{{ $pasien->agama }}</td>
                                    <td>{{ $pasien->nama_ibu }}</td>
                                    <td>{{ $pasien->jenis_kelamin }}</td>
                                    <td>{{ $pasien->tanggal_daftar }}</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic Example">
                                            <button type="button" id="btn-edit-pasien" class="btn btn-success"
                                                data-toggle="modal" data-target="#editPasienModal"
                                                data-id="{{ $pasien->id }}"><i
                                                    class="fas fa-pencil-alt"></i></button></button>
                                            {{-- id="btn-hapus-pasien" data-toggle="modal" data-target="#hapusPasienModal" data-id="{{$pasien->id }}"
                                            --}}
                                            {{-- onclick="deleteConfirmation('{{$pasien->id }}',
                                            '{{ $pasien->nama }}')" --}}
                                            <form
                                                action="{{ url('admin/pasiens/delete') }}/{{ $pasien->id }}"
                                                method="post"><button type="submit" class="btn btn-danger">@csrf<i
                                                        class="fas fa-trash"></i></button></form>
                                            <button type="button" class="btn btn-danger"
                                                onclick="deleteConfirmation('{{ $pasien->id }}', '{{ $pasien->nama }}' )">Hapus</button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="tambahPasienModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Pasien</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.pasien.submit') }}" method="POST"
                        enctype="multipart/form-data">
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
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki" value="Laki-laki">
                                    <label class="form-check-label" for="laki">
                                        Laki-laki
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="pr" value="Perempuan">
                                    <label class="form-check-label" for="pr">
                                        Perempuan
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editPasienModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Pasien</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('admin.pasien.update') }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="edit-nama">Nama Pasien</label>
                                    <input type="text" class="form-control" name="nama" id="edit-nama" required />
                                </div>
                                <div class="form-group">
                                    <label for="edit-tanggal_lahir">Tanggal Lahir</label>
                                    <input type="text" class="form-control" name="tanggal_lahir" id="edit-tanggal_lahir"
                                        required />
                                </div>
                                <div class="form-group">
                                    <label for="edit-alamat">Alamat</label>
                                    <input type="year" class="form-control" name="alamat" id="edit-alamat" required />
                                </div>
                                <div class="form-group">
                                    <label for="edit-jenis_kelamin">Jenis Kelamin</label>
                                    <input type="text" class="form-control" name="jenis_kelamin" id="edit-jenis_kelamin"
                                        required />
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="id" id="edit-id" />
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

    @push('js')
    <script src="https://code.jquery.com/jquery-3.6.3.slim.min.js" integrity="sha256-ZwqZIVdD3iXNyGHbSYdsmWP//UBokj2FHAxKuSBKDSo=" crossorigin="anonymous"></script>
        <script>
            // $(function () {

            //     $(document).on('click', '#btn-edit-pasien', function () {
            //         let id = $(this).data('id');

            //         $('#image-area').empty();

            //         $.ajax({
            //             type: "get",
            //             url: "{{ url('/admin/ajaxadmin/dataPasien') }}/" +
            //                 id,
            //             dataType: 'json',
            //             success: function (res) {
            //                 $('#edit-nama').val(res.nama);
            //                 $('#edit-tanggal_lahir').val(res.tanggal_lahir);
            //                 $('#edit-alamat').val(res.alamat);
            //                 $('#edit-jenis_kelamin').val(res.jenis_kelamin);
            //                 $('#edit-id').val(res.id);

            //             },
            //         });
            //     });
            // });

            function deleteConfirmation(npm, nama) {
                Swal.fire({
                    title: "Hapus???",
                    icon: "warning",
                    text: "Apakah anda yakin akan menghapus data " + nama + "??",
                    showCancelButton: !0,
                    confirmButtonText: "Ya, yakin",
                    cancelButtonText: "Tidak, batalkan!!",
                    reverseButtons: !0,
                }).then((e) => {
                    if (e.isConfirmed) {
                        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                        $.ajax({
                            type: 'POST',
                            url: "pasiens/delete/" + npm,
                            data: {
                                _token: CSRF_TOKEN,
                                id: npm
                            },
                            dataType: 'JSON',
                            success: function (results) {
                                if (results.success === true) {
                                    Swal.fire("Done", results.message, "success");
                                    setTimeout(() => {
                                        location.reload();
                                    }, 1000);
                                } else {
                                    Swal.fire("Error", results.message, "error");
                                }
                            }
                        });
                    } else {
                        e.dismiss;
                    }
                }, function (dismiss) {
                    return false;
                });
            }

        </script>

        {{-- MODAL IMPORT DATA FORM --}}
        {{-- <div class="modal fade" id="importDataModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Import Data</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="" enctype="multipart/form-data">
@csrf
                                <div class="form-group">
                                    <label for="cover">Upload File</label>
                                    <input type="file" class="form-control" name="file" />
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Import Data</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div> --}}
    @endpush

    {{-- @endsection --}}
