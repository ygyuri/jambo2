<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
      <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
      </div>
      <div class="mx-3 sidebar-brand-text">Client Portal<sup></sup></div>
    </a>

    <!-- Divider -->
    <hr class="my-0 sidebar-divider">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="#">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span>
        </a>
    </li>

    <!-- Nav Item - Profile -->
    <li class="nav-item">
        <a class="nav-link" href="#">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Profile</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Nav Item - Flights -->
    <li class="nav-item">
      <a class="nav-link" href="{{ route('client.flights.index') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Flight</span></a>
    </li>


     <!-- Nav Item - Airport -->
     <li class="nav-item">
        <a class="nav-link" href="{{ route('client.airports.index') }}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Airport</span></a>
      </li>




    <!-- Nav Item - Flight Schedules -->
    <li class="nav-item">
      <a class="nav-link" href="{{ route('client.flight_schedules.index') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Flight Schedule</span></a>
    </li>

    <!-- Nav Item - Bookings -->
    <li class="nav-item">
      <a class="nav-link" href="{{ route('client.bookings.index') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Booking</span></a>
    </li>

    <!-- Nav Item - Payments -->
    <li class="nav-item">
      <a class="nav-link" href="{{ route('client.payments.index') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Payment</span></a>
    </li>

    <!-- Nav Item - Seats -->
    <li class="nav-item">
      <a class="nav-link" href="{{ route('client.seats.index') }}">
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
