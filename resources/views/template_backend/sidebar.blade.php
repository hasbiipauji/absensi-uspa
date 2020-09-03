<div class="main-sidebar sidebar-style-2" id="fixedsidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            @if(auth()->user()->role=="admin")
                <a href="/">Admin</a>

            @else
                <a href="/">Web Absensi Uspa Media Nusantara</a>

            @endif
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            @if(auth()->user()->role=="admin")
                <a href="/">AD</a>
            @else
                <a href="/">WA UMN</a>
            @endif
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class=active><a class="nav-link" href="/dashboard"><i class="fas fa-desktop"></i> <span>Dashboard</span></a></li>

            <li class="menu-header">Starter</li>

            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-address-book"></i>
                    <span>Data Pegawai</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="/pegawai">List Pegawai</a>
                        </li>
                        @if(auth()->user()->role=="admin")
                        <li><a class="nav-link" href="{{ route('jabatan.index') }}">List Jabatan</a>
                        </li>
                        @else
                        @endif
                    </ul>
                </li>




            @if(auth()->user()->role=="admin")

            @else
                <li class="dropdown">
                    <a href="/absensi/create" class="nav-link "><i
                            class="fas fa-cubes"></i>
                        <span>Absensi</span></a>
                </li>

            @endif

            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-cubes"></i>
                    <span>Struktur</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="">List Kategori</a></li>
                </ul>
            </li>

            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-tags"></i> <span>Alur
                        Kerja</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="">List Tag</a></li>
                </ul>
            </li>

            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-user"></i>
                    <span>Report</span></a>
                <ul class="dropdown-menu">
                    @if (auth()->user()->role=="admin")
                    <li><a class="nav-link" href="/export_all">Report Absensi</a></li>
                        
                    @else
                    <li><a class="nav-link" href="/export">Report Absen</a></li>
                        
                    @endif
                </ul>
            </li>


    </aside>
</div>
