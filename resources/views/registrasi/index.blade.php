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
                    <a href="{{ route('registrasi.create') }}" class="btn btn-primary">
                        <i class="fa fa-plus"></i>
                        Tambah Data
                    </a>
                    <table id="table-data" class="table table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th>NO</th>
                                <th>No Nota</th>
                                <th>No Antrian</th>
                                <th>Tanggal Registrasi</th>
                               <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach($registrasis as $registrasi)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $registrasi->no_nota }}</td>
                                    <td>{{ $registrasi->no_antrian }}</td>
                                    <td>{{ $registrasi->tanggal_registrasi }}</td>
                                    
                                    <td>
                                        <button type="button" title="Hapus Registrasi" class="btn btn-danger"
                                            onclick="deleteConfirm('{{ $registrasi->id }}','{{ $registrasi->nama }}')"><i
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
                            url: "{{ url('/registrasi/delete') }}/" + npm,
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
