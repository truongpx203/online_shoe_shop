
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->

      <ul class="navbar-nav ml-auto mr-3">
          <li class="nav-item dropdown">
              <i class="fa fa-user mr-3"></i>
                  <span class="dropdown-toggle" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                      {{ Auth::user()->name }}
                  </span>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                      <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                  </ul>
          </li>
      </ul>
  </nav>
  <!-- /.navbar -->
