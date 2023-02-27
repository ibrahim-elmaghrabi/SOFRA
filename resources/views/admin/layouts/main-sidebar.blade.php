<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="{{  asset('assets/img/logo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
      style="opacity: .8">
    <span class="brand-text font-weight-light">Sofra</span>
  </a>
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ asset('assets/img/logo.png') }}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{ auth()->user()->name }}</a>
      </div>
    </div>
    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="{{ route('change-passwords.edit', auth()->user()->id) }}" class="nav-link">
            <i class="fa-solid fa-key"></i>
            <p>
              change Password
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="fa-solid fa-users-gear"></i>
            <p>
              Users
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{  route('users.create')  }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add user</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('users.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>
                  Manage Users
                </p>
              </a>
            </li>
          </ul>
        </li>
        {{-- @can('role-list') --}}
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="fa-solid fa-users-slash"></i>
            <p>
              Roles&Permissions
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('roles.create') }}" class="nav-link">
                <i class="fa-duotone fa-user-shield"></i><i class="far fa-circle nav-icon"></i>
                <p>Add Role</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('roles.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>
                  Manage Roles
                </p>
              </a>
            </li>
          </ul>
        </li>
        {{-- @endcan --}}
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="fas fa-dollar-sign"></i>
            <p>
              Application-payments
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('payments.create') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Payment-note</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('payments.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Manage Payments</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="fa-sharp fa-solid fa-flag"></i>
            <p>
              Cities
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('cities.create') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add City</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('cities.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Manage Cities</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="fa-solid fa-city"></i>
            <p>
              Areas
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('areas.create') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Area</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('areas.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Manage Areas</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="fa-solid fa-server"></i>
            <p>
              Categories
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('categories.create') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Category</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('categories.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Manage Category</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="far fa-credit-card"></i>
            <p>
              Payment-Methods
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('payment-methods.create') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Method</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('payment-methods.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Manage Methods</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="{{ route('restaurants.index') }}" class="nav-link">
            <i class="fa-solid fa-utensils"></i>
            <p>
              Restaurants
            </p>
          </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('offers.index') }}" class="nav-link">
              <i class="fab fa-buffer"></i>
              <p>
                Offers
              </p>
            </a>
          </li>
        <li class="nav-item">
          <a href="{{ route('meals.index') }}" class="nav-link">
            <i class="fas fa-hamburger"></i>
            <p>
              Meals
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('orders.index') }}" class="nav-link">
            <i class="fas fa-pencil-ruler"></i>
            <p>
              Orders
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('comments.index') }}" class="nav-link">
            <i class="fas fa-comments"></i>
            <p>
              Comments
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('clients.index') }}" class="nav-link">
            <i class="fa-solid fa-users"></i>
            <p>
              Clients
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('contacts.index') }}" class="nav-link">
            <i class="fas fa-envelope"></i>
            <p>
              Inbox
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('settings.edit' , ['setting' => 1]) }}" class="nav-link">
            <i class="fa-solid fa-gear"></i>
            <p>
              Settings
            </p>
          </a>
        </li>
       
        <li class="nav-item">
          <a href="{{ route('admins.logout') }}" class="nav-link">
            <i class="fa-solid fa-right-from-bracket"></i>
            <p>
              Logout
            </p>
          </a>
        </li>
      </ul>
    </nav>
  </div>
</aside>