      <!-- Navbar -->
      <nav class="main-header navbar navbar-expand navbar-white navbar-light">
          <!-- Left navbar links -->
          <ul class="navbar-nav">
              <li class="nav-item">
                  <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
              </li>
              <li class="nav-item d-none d-sm-inline-block">
                  <a href="{{ asset('assets') }}/index3.html" class="nav-link">Home</a>
              </li>
              <li class="nav-item d-none d-sm-inline-block">
                  <a href="#" class="nav-link">Contact</a>
              </li>
          </ul>

          <!-- Right navbar links -->
          <ul class="navbar-nav ml-auto">
              <!-- Navbar Search -->
              <li class="nav-item">
                  <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                      <i class="fas fa-search"></i>
                  </a>
                  <div class="navbar-search-block">
                      <form class="form-inline">
                          <div class="input-group input-group-sm">
                              <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                  aria-label="Search">
                              <div class="input-group-append">
                                  <button class="btn btn-navbar" type="submit">
                                      <i class="fas fa-search"></i>
                                  </button>
                                  <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                      <i class="fas fa-times"></i>
                                  </button>
                              </div>
                          </div>
                      </form>
                  </div>
              </li>

              <!-- Messages Dropdown Menu -->
              <!-- Notifications Dropdown Menu -->
              <li class="nav-item">
                  <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                      <i class="fas fa-expand-arrows-alt"></i>
                  </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                      <i class="fas fa-th-large"></i>
                  </a>
              </li>

              <li class="nav-item dropdown">
                  <a href="" data-toggle="dropdown" class="nav-link">
                      <i class="fas fa-cog"></i>
                  </a>
                  <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                      <a href="#" class="dropdown-item">
                          <i class="fas fa-user mr-2"></i>Profil
                      </a>
                      <div class="dropdown-divider"></div>
                      <a href="#" class="dropdown-item" onclick="logout()">
                          <i class="fas fa-sign-out-alt mr-2"></i>Keluar
                      </a>
                  </div>
              </li>
          </ul>
      </nav>

      <template id='logout'>
          <swal-title>Yakin Mau Keluar??</swal-title>
          <swal-icon type="warning" color="red"></swal-icon>
          <swal-button type="confirm">Ya</swal-button>
          <swal-button type="cancel">Tidak</swal-button>
      </template>
      <!-- /.navbar -->

      <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
          <!-- Brand Logo -->
          <a href="{{ asset('assets') }}/index3.html" class="brand-link">
              <img src="{{ asset('assets') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
                  class="brand-image img-circle elevation-3" style="opacity: .8">
              <span class="brand-text font-weight-light">AdminLTE 3</span>
          </a>

          <!-- Sidebar -->
          <div class="sidebar sidebar-no-expand">
              <!-- Sidebar user (optional) -->
              <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                  <div class="image">
                      <img src="{{ asset('assets') }}/dist/img/avatar5.png"
                          class="img-circle elevation-2" alt="User Image">
                  </div>
                  <div class="info">
                      <a href="#" class="d-block">{{ Auth::user()->username }}</a>
                  </div>
              </div>

              <!-- SidebarSearch Form -->
              <div class="form-inline">
                  <div class="input-group" data-widget="sidebar-search">
                      <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                          aria-label="Search">
                      <div class="input-group-append">
                          <button class="btn btn-sidebar">
                              <i class="fas fa-search fa-fw"></i>
                          </button>
                      </div>
                  </div>
              </div>

              <!-- Sidebar Menu -->
              <nav class="mt-2">
                  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                      data-accordion="false">
                      <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->
                      <li class="nav-item">
                          <a href="{{ route('home') }}" class="nav-link">
                              <i class="nav-icon fas fa-tachometer-alt"></i>
                              <p>
                                  Dashboard
                              </p>
                          </a>
                      </li>
                      <li class="nav-header">DATA MASTER</li>
                      <li class="nav-item">
                          <a href="{{ route('admin.pasien') }}" class="nav-link">
                              <i class="nav-icon fas fa-user"></i>
                              <p>
                                  pasien
                              </p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="{{ route('admin.karyawan') }}" class="nav-link">
                              <i class="nav-icon far fa-user"></i>
                              <p>
                                  karyawan
                              </p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="{{ route('admin.tindakan') }}" class="nav-link">
                              <i class="nav-icon fas fa-notes-medical"></i>
                              <p>
                                  Tindakan
                              </p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="{{ route('diagnosa.index') }}" class="nav-link">
                              <i class="nav-icon fas fa-notes-medical"></i>
                              <p>
                                  Diagnosa
                              </p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="{{ route('obat.index') }}" class="nav-link">
                              <i class="nav-icon fas fa-pills"></i>
                              <p>
                                  Obat
                              </p>
                          </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{ route('spesialis.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                Spesialis
                            </p>
                        </a>
                    </li>
                      <li class="nav-header">DATA TRANSAKSI</li>
                      <li class="nav-item">
                          <a href="{{ route('admin.pasien') }}" class="nav-link">
                              <i class="nav-icon fas fa-book-medical"></i>
                              <p>
                                  Pendaftaran
                              </p>
                          </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{ route('rekam.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-book-medical"></i>
                            <p>
                                Rekam Medis
                            </p>
                        </a>
                    </li>
                      <li class="nav-item">
                          <a href="{{ route('admin.pasien') }}" class="nav-link">
                              <i class="nav-icon fas fa-book-medical"></i>
                              <p>
                                  Pembayaran
                              </p>
                          </a>
                      </li>
                  </ul>
              </nav>
              <!-- /.sidebar-menu -->
          </div>
          <!-- /.sidebar -->
      </aside>
