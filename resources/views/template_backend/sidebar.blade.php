<div class="main-sidebar sidebar-style-2" id="fixedsidebar">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="#">Uspa Media Nusantara</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="#">UMN</a>
      </div>
      <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li class=active><a class="nav-link" href="{{ route('home') }}"><i class="fas fa-desktop"></i> <span>Dashboard</span></a></li>

        <li class="menu-header">Menu</li>
        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-users"></i> <span>Data Pegawai</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="{{ route('pegawai.index') }}">List Pegawai</a></li>
              @if (auth()->user()->role == 'admin')
                <li><a class="nav-link" href="{{ route('jabatan.index') }}">List Jabatan</a></li>
              @endif
            </ul>
          </li>


        <li class="dropdown">
          <a href="{{ route('absensi.create') }}" class="nav-link " ><i class="fas fa-align-left"></i> <span>Absensi</span></a>
        </li>

        <li class="dropdown">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-cubes"></i> <span>Struktur</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="">Struktur Organisasi</a></li>
          </ul>
        </li>

        {{-- <li class="dropdown">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-tags"></i> <span>Alur Kerja</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="">List Tag</a></li>
            </ul>
         </li> --}}

         <li class="dropdown">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-archive"></i> <span>Report</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="">Hasil Report</a></li>
            </ul>
         </li>

         {{-- <li class="dropdown">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-user"></i> <span>User</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="">List User</a></li>
            </ul>
         </li> --}}
      </aside>
   </div>

