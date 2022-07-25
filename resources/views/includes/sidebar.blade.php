<!-- Page Sidebar Start-->
<div class="page-sidebar">
    <div class="main-header-left d-none d-lg-block">
        <div class="logo-wrapper"><a href="index.html"><img class="blur-up lazyloaded" src="#" alt=""></a></div>
    </div>
    <div class="sidebar custom-scrollbar">
        <div class="sidebar-user text-center">
            <div><img class="img-60 rounded-circle lazyloaded blur-up" src="../assets/images/dashboard/man.png" alt="#">
            </div>
            <h6 class="mt-3 f-14">{{Auth::user()->name}}</h6>
        </div>
        <ul class="sidebar-menu">
            <li><a class="sidebar-header" href="index.html"><i data-feather="home"></i><span>Dashboard</span></a></li>
            <li><a class="sidebar-header" href=""><i data-feather="settings"></i><span>Master Data</span><i class="fa fa-angle-right pull-right"></i></a>
                <ul class="sidebar-submenu">
                    <li><a href="{{route('indikator.index')}}"><i class="fa fa-circle"></i>Indikator Kinerja</a></li>
                    {{-- <li><a href="transactions.html"><i class="fa fa-circle"></i>Pangkat/ Golongan</a></li> --}}
                    {{-- <li><a href="transactions.html"><i class="fa fa-circle"></i>Jabatan</a></li> --}}
                    <li><a href="{{route('unitkerja.index')}}"><i class="fa fa-circle"></i>Unit Kerja</a></li>
                </ul>
            </li>
            <li><a class="sidebar-header" href=""><i data-feather="clipboard"></i><span>Penilaian Kinerja</span><i class="fa fa-angle-right pull-right"></i></a>
                <ul class="sidebar-submenu">
                    <li><a href="{{route('penilaian.index')}}"><i class="fa fa-circle"></i>Tabel PKP</a></li>
                    {{-- <li><a href="coupon-create.html"><i class="fa fa-circle"></i>Rekap PKP</a></li> --}}
                </ul>
            </li>
            {{-- <li><a class="sidebar-header" href="reports.html"><i data-feather="clipboard"></i><span>Sasaran Kinerja</span></a></li> --}}
            <li><a class="sidebar-header" href="{{route('pegawai.index')}}"><i data-feather="users"></i><span>Manajemen Pegawai</span></a></li>
            <li><a class="sidebar-header" href="{{route('akun')}}"><i data-feather="user"></i><span>Akun</span></a>
            </li>
            <li><a class="sidebar-header" href="login.html"><i data-feather="log-in"></i><span>Logout</span></a>
            </li>
        </ul>
    </div>
</div>
<!-- Page Sidebar Ends-->
