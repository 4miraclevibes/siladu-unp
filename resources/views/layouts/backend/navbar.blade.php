        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo m-0 border-bottom">
            <a href="{{ route('beranda') }}" class="app-brand-link">
              <span class="app-brand-logo demo">
                <img src="https://siladu.unp.ac.id/assets/logo.png" style="max-width: 200px" alt="">
              </span>
            </a>
            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item {{ Route::is('dashboard') ? 'active' : '' }}">
              <a href="{{ route('dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div>Dashboard</div>
              </a>
            </li>
            <!-- User Management -->
            <li class="menu-item {{ Route::is('users*') ? 'active' : '' }}">
              <a href="{{ route('users.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-group"></i>
                <div>Users</div>
              </a>
            </li>
            <!-- Announcements -->
            <li class="menu-item {{ Route::is('announcements*') ? 'active' : '' }}">
              <a href="{{ route('announcements.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-broadcast"></i>
                <div>Berita</div>
              </a>
            </li>
            <!-- Articles -->
            <li class="menu-item {{ Route::is('articles*') ? 'active' : '' }}">
              <a href="{{ route('articles.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-book"></i>
                <div>Our Team</div>
              </a>
            </li>
            <!-- Galleries -->
            <li class="menu-item {{ Route::is('galleries*') ? 'active' : '' }}">
              <a href="{{ route('galleries.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-images"></i>
                <div>Tarif</div>
              </a>
            </li>
            <!-- Tools -->
            <li class="menu-item {{ Route::is('tools*') ? 'active' : '' }}">
              <a href="{{ route('tools.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-wrench"></i>
                <div>Fasilitas</div>
              </a>
            </li>
            <!-- Projects -->
            <li class="menu-item {{ Route::is('projects*') ? 'active' : '' }}">
              <a href="{{ route('projects.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-folder"></i>
                <div>Pengajuan</div>
              </a>
            </li>
            <!-- Downloads -->
            <li class="menu-item {{ Route::is('downloads*') ? 'active' : '' }}">
              <a href="{{ route('downloads.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-download"></i>
                <div>Unduhan</div>
              </a>
            </li>
          </ul>
        </aside>
        <!-- / Menu -->