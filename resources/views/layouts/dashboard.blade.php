<!--
=========================================================
* Material Dashboard 2 - v3.0.4
=========================================================
* Product Page: https://www.creative-tim.com/product/material-dashboard
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim
=========================================================
* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" type="image/png" href="{{ url('img/favicon.png') }}">
        <title>Encurtador de Links</title>
        <!--     Fonts and icons     -->
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
        <!-- Nucleo Icons -->
        <link href="{{ url('css/nucleo-icons.css') }}" rel="stylesheet" />
        <link href="{{ url('css/nucleo-svg.css') }}" rel="stylesheet" />
        <!-- Font Awesome Icons -->
        <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
        <!-- Material Icons -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
        <!-- CSS Files -->
        <link id="pagestyle" href="{{ url('css/material-dashboard.css?v=3.0.4') }}" rel="stylesheet" />

        @yield('STYLE')
    </head>

    <body class="g-sidenav-show  bg-gray-200 dark-version">

        <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
            <div class="sidenav-header">
                <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
                <a class="navbar-brand m-0" href="#" target="_blank">
                    <span class="ms-1 font-weight-bold text-white">Encurtador de Links</span>
                </a>
            </div>
            <hr class="horizontal light mt-0 mb-2">
            <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-white @if(($menu ?? 'dash') == 'dash') active bg-gradient-primary @endif" href="{{ route('dash.start') }}">
                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="material-icons opacity-10">dashboard</i>
                            </div>
                            <span class="nav-link-text ms-1">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white @if(($menu ?? 'dash') == 'user') active bg-gradient-primary @endif" href="{{ route('user.index') }}">
                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="material-icons opacity-10">table_view</i>
                            </div>
                            <span class="nav-link-text ms-1">Administradores</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white @if(($menu ?? 'dash') == 'link') active bg-gradient-primary @endif" href="{{ route('link.index') }}">
                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="material-icons opacity-10">table_view</i>
                            </div>
                            <span class="nav-link-text ms-1">Links</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white @if(($menu ?? 'dash') == 'category') active bg-gradient-primary @endif" href="{{ route('category.index') }}">
                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="material-icons opacity-10">receipt_long</i>
                            </div>
                            <span class="nav-link-text ms-1">Categorias</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white @if(($menu ?? 'dash') == 'store') active bg-gradient-primary @endif" href="{{ route('store.index') }}">
                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="material-icons opacity-10">receipt_long</i>
                            </div>
                            <span class="nav-link-text ms-1">Lojas</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white @if(($menu ?? 'dash') == 'statistic') active bg-gradient-primary @endif" href="{{ route('statistic.index') }}">
                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="material-icons opacity-10">receipt_long</i>
                            </div>
                            <span class="nav-link-text ms-1">Estatisticas</span>
                        </a>
                    </li>
                </ul>
            </div>
        </aside>

        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
            <!-- Navbar -->
            <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
                <div class="container-fluid py-1 px-3">
                    <nav aria-label="breadcrumb">
                        <h6 class="font-weight-bolder mb-0">Dashboard</h6>
                    </nav>
                    <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                            <div class="input-group input-group-outline">
                                <!-- EMPTY -->
                            </div>
                        </div>
                        <ul class="navbar-nav  justify-content-end">
                            <li class="nav-item d-flex align-items-center">
                                <a href="#" class="nav-link text-body font-weight-bold px-0">
                                    <i class="fa fa-user me-sm-1"></i>
                                    <span class="d-sm-inline d-none">{{ \Illuminate\Support\Facades\Auth::user()->name ?? 'GUEST' }}</span>
                                </a>
                            </li>
                            <li class="nav-item d-flex align-items-center">
                                <span class="nav-link text-body font-weight-bold px-0" style="margin-left: 10px;margin-right: 10px;">|</span>
                            </li>
                            <li>
                                <a href="#" class="nav-link text-body font-weight-bold px-0" id="btn-bubmit-frm-logout">Encerrar</a>
                                <form id="frm-encerrar" action="{{ url('logout') }}" method="post" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="container-fluid py-4">

                <div class="card-body p-3 pb-0">
                    @if(session()->has('MSG_ERROR'))
                    <div class="alert alert-danger alert-dismissible text-white" role="alert">
                        <span class="text-sm">{{ session()->get('MSG_ERROR') }}</span>
                        <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    @endif
                    @if(session()->has('MSG_WARNING'))
                    <div class="alert alert-warning alert-dismissible text-white" role="alert">
                        <span class="text-sm">{{ session()->get('MSG_WARNING') }}</span>
                        <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    @endif
                    @if(session()->has('MSG_SUCCESS'))
                    <div class="alert alert-success alert-dismissible text-white" role="alert">
                        <span class="text-sm">{{ session()->get('MSG_SUCCESS') }}</span>
                        <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    @endif
                </div>

                @yield('CONTENT')

                <footer class="footer py-4  ">
                    <div class="container-fluid">
                        <div class="row align-items-center justify-content-lg-between">
                            <div class="col-lg-6 mb-lg-0 mb-4">
                                <div class="copyright text-center text-sm text-muted text-lg-start">
                                    © <script>
                                        document.write(new Date().getFullYear())
                                    </script>,
                                    desenvolvido por
                                    <a href="https://www.updev.net.br" class="font-weight-bold" target="_blank">UpDEV</a>
                                    com a melhor tecnologia para a Web.
                                </div>
                            </div>
                            <div class="col-lg-6"><!-- EMPTY --></div>
                        </div>
                    </div>
                </footer>
            </div>
        </main>

        <!--   Core JS Files   -->
        <script src="{{ url('js/core/popper.min.js') }}"></script>
        <script src="{{ url('js/core/bootstrap.min.js') }}"></script>
        <script src="{{ url('js/plugins/perfect-scrollbar.min.js') }}"></script>
        <script src="{{ url('js/plugins/smooth-scrollbar.min.js') }}"></script>
        <script>
            var win = navigator.platform.indexOf('Win') > -1;
            if (win && document.querySelector('#sidenav-scrollbar')) {
                var options = {
                    damping: '0.5'
                }
                Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
            }
        </script>
        <!-- Github buttons -->
        <script async defer src="https://buttons.github.io/buttons.js"></script>
        <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
        <script src="{{ url('js/material-dashboard.min.js?v=3.0.4') }}"></script>

        <script type="text/javascript" src="//code.jquery.com/jquery-3.6.3.min.js"></script>
        <script type="text/javascript">
            $(function(){
                $('#btn-bubmit-frm-logout').click(function(){
                    $('#frm-encerrar').submit();
                });
            });
        </script>

        @yield('SCRIPT')
    </body>

</html>
