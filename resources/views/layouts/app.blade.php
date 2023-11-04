<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Pangasinan State University</title>
    <link rel="icon" type="image/png" href="../assets/psu_logo.png">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Icons -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

    <!-- Datatables -->
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script>     -->
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>    
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>    
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>    
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.colVis.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <style>
        div.dataTables_filter, div.dataTables_length {
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .buttons-print {
            float: right;
        }

        .buttons-excel {
            float: right;
            margin-right: 5px
        }

        .buttons-pdf {
            float: right;
            margin-right: 5px
        }

        /* Scroll Bar */
        /* width */
        ::-webkit-scrollbar {
            width: 8px;
        }
        
        /* Track */
        ::-webkit-scrollbar-track {
            background: #fff; 
        }
        
        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: #0D6EFD; 
            border-radius: 5px;
        }
        
        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: rgb(0, 0, 153); 
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="/assets/psu_logo.png" 
                        alt="psu_logo" 
                        class="img-fluid" 
                        height="50px" width="55px" style="margin-right: 7px;"/>
                    QR Certificate Generator
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/admin/user-manual">
                                        <i class="fa fa-info-circle" aria-hidden="true"></i> {{ __('User Manual') }}
                                    </a>
                                    <a class="dropdown-item" href="/assets/Import Data Format.xlsx" download>
                                        <i class="fa fa-download" aria-hidden="true"></i> {{ __('Import Data Format') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fa fa-sign-out" aria-hidden="true"></i> {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <script>
        $(document).ready(function () {
            $('#seminar').DataTable({
                order: [[3, 'desc']],
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'print',
                        className: 'btn btn-primary',
                        text:      '<i class="fa fa-print" data-bs-toggle="tooltip" data-bs-placement="top" title="Print"></i>',
                        messageTop: 'List of Seminar',
                        exportOptions: {
                            columns: [ 0, 1, 2, 3, 4 ]
                        }
                    },
                    
                    {
                        extend: 'excelHtml5',
                        className: 'btn btn-success',
                        text:      '<i class="fa-solid fa-file-excel" data-bs-toggle="tooltip" data-bs-placement="top" title="Excel Format"></i>',
                        messageTop: 'List of Seminar',
                        exportOptions: {
                            columns: [ 0, 1, 2, 3, 4 ]
                        }
                    },

                    {
                        extend: 'pdfHtml5',
                        className: 'btn btn-danger',
                        text:      '<i class="fa fa-file-pdf" data-bs-toggle="tooltip" data-bs-placement="top" title="PDF Format"></i>',
                        messageTop: 'List of Seminar',
                        exportOptions: {
                            columns: [ 0, 1, 2, 3, 4 ]
                        }
                    },
                    
                ],
                'paging'      : true,
                'lengthChange': true,
                'searching'   : true,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : true,
                'pageLength'  : 15,
            });
        });
        $(document).ready(function () {
            $('#example').DataTable({
                order: [[3, 'desc']],
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'print',
                        className: 'btn btn-primary',
                        text:      '<i class="fa fa-print" data-bs-toggle="tooltip" data-bs-placement="top" title="Print"></i>',
                        messageTop: 'List of Seminar',
                        exportOptions: {
                            columns: [ 0, 1, 2, 3, 4 ]
                        }
                    },
                    
                    {
                        extend: 'excelHtml5',
                        className: 'btn btn-success',
                        text:      '<i class="fa-solid fa-file-excel" data-bs-toggle="tooltip" data-bs-placement="top" title="Excel Format"></i>',
                        messageTop: 'List of Seminar',
                        exportOptions: {
                            columns: [ 0, 1, 2, 3, 4 ]
                        }
                    },

                    {
                        extend: 'pdfHtml5',
                        className: 'btn btn-danger',
                        text:      '<i class="fa fa-file-pdf" data-bs-toggle="tooltip" data-bs-placement="top" title="PDF Format"></i>',
                        messageTop: 'List of Seminar',
                        exportOptions: {
                            columns: [ 0, 1, 2, 3, 4 ]
                        }
                    },
                    
                ],
                'paging'      : true,
                'lengthChange': true,
                'searching'   : true,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : true,
                'pageLength'  : 15,
            });
        });
    </script>
</body>
</html>
