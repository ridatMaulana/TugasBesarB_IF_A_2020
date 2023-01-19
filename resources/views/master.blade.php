<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets') }}/dist/css/adminlte.min.css">
    {{-- <link rel="stylesheet" href="sweetalert2.min.css"> --}}
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->

    @include('templates.header')

    <div class="wrapper">
        <div class="main">
            @yield('content')
        </div>
        @include('templates.footer')
    </div>
    <!-- ./wrapper -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        @if($errors->any())
            @foreach($errors->all() as $error)
                Swal.fire({
                    icon: 'error',
                    title: "Ooops",
                    text: "{{ $error }}",
                })
            @endforeach
        @endif
        </script>
        @stack('js')
    <!-- jQuery -->
    <script src="{{ asset('assets') }}/plugins/jquery/jquery.min.js"></script>
    <script src="{{ mix('js/app.js') }}"></script>
    {{-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script> --}}
    {{-- <script src="https://code.jquery.com/jquery-3.6.3.js" type="text/javascript"></script> --}}
    <!-- Bootstrap 4 -->
    <script src="{{ asset('assets') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('assets') }}/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('assets') }}/dist/js/demo.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- <script src="sweetalert2.min.js"></script> --}}
    <script>
        // Swal.bindClickHandler()
        const Toast = Swal.mixin({
            Toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
        })

        @if(Session::has('message'))
            var type = "{{ Session::get('alert-type') }}";
            switch(type){
                case 'info' :
                    Toast.fire({
                        icon: 'info',
                        title: "{{ Session::get('message') }}"
                    })
                    break;

                case 'warning' :
                    Toast.fire({
                        icon: 'warning',
                        title: "{{ Session::get('message') }}"
                    })
                    break;

                case 'success' :
                    Toast.fire({
                        icon: 'success',
                        title: "{{ Session::get('message') }}"
                    })
                    break;

                case 'error' :
                    Toast.fire({
                        icon: 'error',
                        title: "{{ Session::get('message') }}"
                    })
                    break;

                case 'error_dialog' :
                    Toast.fire({
                        icon: 'error',
                        title: "Ooops",
                        text: "{{ Session::get('message') }}",
                        timer: 3000,
                    })
                    break;
            }
            @endif

            @if($errors->any())
                @foreach($errors->all() as $error)
                    Swal.fire({
                        icon: 'error',
                        title: "Ooops",
                        text: "{{ $error }}",
                    })
                @endforeach
            @endif

            // $('#table-data').DataTable();
        // Swal.mixin({
        // toast: true,
        // }).bindClickHandler('data-swal-toast-template')

        function logout() {
            Swal.fire({
                template: '#logout',
            }).then((result)=>{
                if (result.isConfirmed) {
                    window.location = "{{ route('logout') }}"
                    // $.ajax({
                    //     type: 'get',
                    //     url: "",
                    // })
                }
            })
        }

    </script>
</body>

</html>
