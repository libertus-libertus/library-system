<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{ url('/') }}" class="brand-link">
    <img src="{{ asset('lte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
      style="opacity: .8">
    <span class="brand-text font-weight-light">
      <strong class="text-sm">LIBRARY</strong>
    </span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-header text-sm">MASTER DATA</li>
        <li class="nav-item">
          <a href="{{ url('home') }}" class="nav-link btn-sm {{ request()->is('home') ? 'active' : '' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ url('catalog') }}" class="nav-link btn-sm {{ request()->is('catalog') ? 'active' : '' }}">
            <i class="nav-icon fas fa-cubes"></i>
            <p>
              Catalog
            </p>
          </a>
        <li class="nav-item">
          <a href="{{ url('author') }}" class="nav-link btn-sm {{ request()->is('author') ? 'active' : '' }}">
            <i class="nav-icon fas fa-user"></i>
            <p>
              Author
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ url('publisher') }}" class="nav-link btn-sm {{ request()->is('publisher') ? 'active' : '' }}">
            <i class="nav-icon fas fa-user-circle"></i>
            <p>
              Publisher
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ url('book') }}" class="nav-link btn-sm {{ request()->is('book') ? 'active' : '' }}">
            <i class="nav-icon fas fa-book"></i>
            <p>
              Books
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ url('member') }}" class="nav-link btn-sm {{ request()->is('member') ? 'active' : '' }}">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Member
            </p>
          </a>
        </li>
        <li class="nav-header text-sm">REPORT</li>
        <li class="nav-item">
          <a href="{{ url('member') }}" class="nav-link btn-sm {{ request()->is('member') ? 'active' : '' }}">
            <i class="nav-icon fas fa-chart-bar"></i>
            <p>
              Transactions
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
