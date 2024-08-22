<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{ url('/') }}" class="brand-link">
    <img src="{{ asset('lte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
      style="opacity: .8">
    <span class="brand-text font-weight-light">
      <strong>Perpustakaan</strong>
    </span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="{{ url('home') }}" class="nav-link {{ request()->is('home') ? 'active' : '' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
              <span class="right badge badge-danger">New</span>
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ url('catalog') }}" class="nav-link {{ request()->is('catalog') ? 'active' : '' }}">
            <i class="nav-icon fas fa-cubes"></i>
            <p>
              Catalog
            </p>
          </a>
        <li class="nav-item">
          <a href="{{ url('author') }}" class="nav-link {{ request()->is('author') ? 'active' : '' }}">
            <i class="nav-icon fas fa-user"></i>
            <p>
              Author
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ url('publisher') }}" class="nav-link {{ request()->is('publisher') ? 'active' : '' }}">
            <i class="nav-icon fas fa-user-circle"></i>
            <p>
              Publisher
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ url('book') }}" class="nav-link {{ request()->is('book') ? 'active' : '' }}">
            <i class="nav-icon fas fa-book"></i>
            <p>
              Books
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ url('member') }}" class="nav-link {{ request()->is('member') ? 'active' : '' }}">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Member
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-table"></i>
            <p>
              Tables
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="pages/tables/simple.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Simple Tables</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/tables/data.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>DataTables</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-header">EXAMPLES</li>
        <li class="nav-item">
          <a href="pages/calendar.html" class="nav-link">
            <i class="nav-icon fas fa-calendar-alt"></i>
            <p>
              Calendar
              <span class="badge badge-info right">2</span>
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="pages/gallery.html" class="nav-link">
            <i class="nav-icon far fa-image"></i>
            <p>
              Gallery
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
