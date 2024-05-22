<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
      <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
      </div>
      <div class="mx-3 sidebar-brand-text">Admin Portal<sup></sup></div>
    </a>

    <!-- Divider -->
    <hr class="my-0 sidebar-divider">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
      <a class="nav-link" href="{{ route('dashboard') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>

    <!-- Nav Item - Profile -->
    <li class="nav-item">
      <a class="nav-link" href="/profile">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Profile</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Nav Item - Models -->
    <li class="nav-item">
      <a class="nav-link" href="{{ route('admins.index') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Admin</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{ route('aircrafts.index') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Aircraft</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{ route('airports.index') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Airport</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{ route('bookings.index') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Booking</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{ route('clients.index') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Client</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{ route('flights.index') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Flight</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{ route('flight-schedules.index') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Flight Schedule</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{ route('payments.index') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Payment</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{ route('seats.index') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Seat</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="border-0 rounded-circle" id="sidebarToggle"></button>
    </div>

  </ul>
