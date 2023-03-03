
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link">
      <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <ul class="nav">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link {{ (request()->is('admin')) ? 'active' : '' }}">
                        <i class="fas fa-home nav-icon"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('users.index') }}" class="nav-link {{ (request()->is('admin/user')) ? 'active' : '' }}">
                        <i class="fas fa-user nav-icon"></i>
                        <p>User</p>
                    </a>
                </li>
                  <li class="nav-item">
                    <a href="{{ route('product.index') }}" class="nav-link {{ (request()->is('admin/product')) ? 'active' : '' }}">
                      <i class="fas fa-box nav-icon"></i>
                      <p>Product</p>
                    </a>
                  </li>
                <li class="nav-item">
                    <a href="{{ route('category.index') }}" class="nav-link {{ (request()->is('admin/category')) ? 'active' : '' }}">
                        <i class="fas fa-circle nav-icon"></i>
                        <p>Category</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('invoices.index') }}" class="nav-link {{ (request()->is('admin/invoice')) ? 'active' : '' }}">
                        <i class="fas fa-file-invoice nav-icon"></i>
                        <p>Invoice</p>
                    </a>
                </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
