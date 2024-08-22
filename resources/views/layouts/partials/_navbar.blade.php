<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <!-- Navbar Search -->
    <li class="nav-item">
      <form action="{{ route('logout') }}" method="post" style="display: inline;">
        @csrf
        <button type="submit" class="btn btn-danger rounded-5 btn-xs" href="#">
          <i class="fas fa-sign-out-alt"></i> Sign out
        </button>
      </form>
    </li>
  </ul>
</nav>
<!-- /.navbar -->
