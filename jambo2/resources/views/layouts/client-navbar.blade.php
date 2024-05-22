<nav class="mb-4 bg-white shadow navbar navbar-expand navbar-light topbar static-top">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="mr-3 btn btn-link d-md-none rounded-circle">
      <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Search -->
    <form class="my-2 mr-auto d-none d-sm-inline-block form-inline ml-md-3 my-md-0 mw-100 navbar-search">
      <div class="input-group">
        <input type="text" class="border-0 form-control bg-light small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
          <button class="btn btn-primary" type="button">
            <i class="fas fa-search fa-sm"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Topbar Navbar -->
    <ul class="ml-auto navbar-nav">

      <!-- Nav Item - Search Dropdown (Visible Only XS) -->
      <li class="nav-item dropdown no-arrow d-sm-none">
        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-search fa-fw"></i>
        </a>
        <!-- Dropdown - Messages -->
        <div class="p-3 shadow dropdown-menu dropdown-menu-right animated--grow-in" aria-labelledby="searchDropdown">
          <form class="mr-auto form-inline w-100 navbar-search">
            <div class="input-group">
              <input type="text" class="border-0 form-control bg-light small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Nav Item - Alerts -->
      <li class="mx-1 nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-bell fa-fw"></i>
          <!-- Counter - Alerts -->
          <span class="badge badge-danger badge-counter">3+</span>
        </a>
        <!-- Dropdown - Alerts -->
        <div class="shadow dropdown-list dropdown-menu dropdown-menu-right animated--grow-in" aria-labelledby="alertsDropdown">
          <h6 class="dropdown-header">
            Alerts Center
          </h6>
          <!-- Your custom alerts dropdown items here -->
          <!-- Modify as needed for client alerts -->
          <!-- Dropdown - Alerts -->
                <div class="shadow dropdown-list dropdown-menu dropdown-menu-right animated--grow-in" aria-labelledby="alertsDropdown">
                    <h6 class="dropdown-header">
                    Alerts Center
                    </h6>
                    <!-- Custom Alerts -->
                    <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="mr-3">
                        <div class="icon-circle bg-primary">
                        <i class="text-white fas fa-info"></i>
                        </div>
                    </div>
                    <div>
                        <div class="text-gray-500 small">May 22, 2024</div>
                        <span class="font-weight-bold">You have a new message from a client.</span>
                    </div>
                    </a>
                    <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="mr-3">
                        <div class="icon-circle bg-warning">
                        <i class="text-white fas fa-exclamation-triangle"></i>
                        </div>
                    </div>
                    <div>
                        <div class="text-gray-500 small">May 21, 2024</div>
                        Attention: Your account subscription is expiring soon.
                    </div>
                    </a>
                    <a class="dropdown-item text-center small text-gray-500" href="#">View All Alerts</a>
                </div>

                        </div>
                    </li>

      <!-- Nav Item - Messages -->
      <li class="mx-1 nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-envelope fa-fw"></i>
          <!-- Counter - Messages -->
          <span class="badge badge-danger badge-counter">7</span>
        </a>
        <!-- Dropdown - Messages -->
        <div class="shadow dropdown-list dropdown-menu dropdown-menu-right animated--grow-in" aria-labelledby="messagesDropdown">
          <h6 class="dropdown-header">
            Message Center
          </h6>
          <!-- Your custom message dropdown items here -->
          <!-- Modify as needed for client messages -->
          <!-- Dropdown - Messages -->
            <div class="shadow dropdown-list dropdown-menu dropdown-menu-right animated--grow-in" aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                Message Center
                </h6>
                <!-- Custom Messages -->
                <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="mr-3 dropdown-list-image">
                    <img class="rounded-circle" src="https://example.com/profile_image1.jpg" alt="Profile Image">
                    <div class="status-indicator bg-success"></div>
                </div>
                <div>
                    <div class="text-truncate">You have a new message from Client A.</div>
                    <div class="text-gray-500 small">John Doe · 1h</div>
                </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="mr-3 dropdown-list-image">
                    <img class="rounded-circle" src="https://example.com/profile_image2.jpg" alt="Profile Image">
                    <div class="status-indicator"></div>
                </div>
                <div>
                    <div class="text-truncate">Client B has updated their project requirements.</div>
                    <div class="text-gray-500 small">Jane Smith · 2h</div>
                </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">View All Messages</a>
            </div>

                    </div>
                </li>

                <div class="topbar-divider d-none d-sm-block"></div>

      <!-- Nav Item - User Information -->
      @auth
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="mr-2 text-gray-600 d-none d-lg-inline small">
            {{ auth()->user()->name }}
            <br>
            <small>{{ auth()->user()->level }}</small>
          </span>
          <img class="img-profile rounded-circle" src="https://startbootstrap.github.io/startbootstrap-sb-admin-2/img/undraw_profile.svg">
        </a>
        <!-- Dropdown - User Information -->
        <div class="shadow dropdown-menu dropdown-menu-right animated--grow-in" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="/profile">
            <i class="mr-2 text-gray-400 fas fa-user fa-sm fa-fw"></i>
            Profile
          </a>
          <!-- Modify routes as needed for client portal -->
          <a class="dropdown-item" href="#">
            <i class="mr-2 text-gray-400 fas fa-cogs fa-sm fa-fw"></i>
            Settings
          </a>
          <a class="dropdown-item" href="#">
            <i class="mr-2 text-gray-400 fas fa-list fa-sm fa-fw"></i>
            Activity Log
          </a>
          <div class="dropdown-divider"></div>
          <form id="logout-form" action="{{ route('client.logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
          <!-- Modify logout route for client -->
          <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <i class="mr-2 text-gray-400 fas fa-sign-out-alt fa-sm fa-fw"></i>
              Logout
          </a>

        </div>
      </li>
      @endauth

    
    </ul>
  </nav>
