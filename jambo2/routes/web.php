<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\AirportController;
use App\Http\Controllers\SeatController;
use App\Http\Controllers\FlightScheduleController;
use App\Http\Controllers\AircraftController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\ClientLoginController;
use App\Http\Controllers\Clients\ClientAirportController;
use App\Http\Controllers\Clients\ClientBookingController;
use App\Http\Controllers\Clients\ClientFlightController;
use App\Http\Controllers\Clients\ClientFlightScheduleController;
use App\Http\Controllers\Clients\ClientPaymentController;
use App\Http\Controllers\Clients\ClientSeatController;


use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\IsAdmin;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Public routes
Route::get('/', function () {
    return view('welcome');
});

Route::get('/landing', function () {
    return view('landingpage');
});



// Authenticated routes
Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard route
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin  login routes
Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminLoginController::class, 'login'])->name('admin.login.action');
    Route::get('/register', [AdminLoginController::class, 'showRegisterForm'])->name('admin.register');
    Route::post('/register', [AdminLoginController::class, 'register'])->name('admin.register.save');
});
// Admin logout route
Route::post('/admin/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
Route::middleware(['auth:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin-dashboard');
    })->name('admin.dashboard');
});

//Client login routes
Route::prefix('client')->group(function () {
    Route::get('/login', [ClientLoginController::class, 'showLoginForm'])->name('client.login');
    Route::post('/login', [ClientLoginController::class, 'login'])->name('client.login.action');
    Route::get('/register', [ClientLoginController::class, 'showRegisterForm'])->name('client.register');
    Route::post('/register', [ClientLoginController::class, 'register'])->name('client.register.save');
});

// Client logout route
Route::post('/client/logout', [ClientLoginController::class, 'logout'])->name('client.logout');
// Define the client routes within a middleware group and a prefix.
Route::middleware(['auth:client'])->prefix('client')->group(function () {
    Route::get('/dashboard', function () {
        return view('client-dashboard');
    })->name('client.dashboard');
});







// Flight management routes
Route::prefix('flights')->group(function () {
    Route::get('', [FlightController::class, 'index'])->name('flights.index');
    Route::get('create', [FlightController::class, 'create'])->name('flights.create');
    Route::post('store', [FlightController::class, 'store'])->name('flights.store');
    Route::get('show/{id}', [FlightController::class, 'show'])->name('flights.show');
    Route::get('edit/{id}', [FlightController::class, 'edit'])->name('flights.edit');
    Route::put('edit/{id}', [FlightController::class, 'update'])->name('flights.update');
    Route::delete('destroy/{id}', [FlightController::class, 'destroy'])->name('flights.destroy');

    // Route for flight filtering
    Route::post('filter', [FlightController::class, 'filter'])->name('flights.filter');
});



// Payment management routes
Route::controller(PaymentController::class)->prefix('payments')->group(function () {
    Route::get('', 'index')->name('payments.index');
    Route::get('create', 'create')->name('payments.create');
    Route::post('store', 'store')->name('payments.store');
    Route::get('show/{id}', 'show')->name('payments.show');
    Route::get('edit/{id}', 'edit')->name('payments.edit');
    Route::put('update/{id}', 'update')->name('payments.update');
    Route::delete('delete/{id}', 'destroy')->name('payments.destroy');
    Route::post('filter', 'filter')->name('payments.filter');
});

// Airport management routes
Route::prefix('airports')->group(function () {
    Route::get('', [AirportController::class, 'index'])->name('airports.index');
    Route::get('create', [AirportController::class, 'create'])->name('airports.create');
    Route::post('store', [AirportController::class, 'store'])->name('airports.store');
    Route::get('show/{id}', [AirportController::class, 'show'])->name('airports.show');
    Route::get('edit/{id}', [AirportController::class, 'edit'])->name('airports.edit');
    Route::put('edit/{id}', [AirportController::class, 'update'])->name('airports.update');
    Route::delete('destroy/{id}', [AirportController::class, 'destroy'])->name('airports.destroy');
    Route::get('filter', [AirportController::class, 'filter'])->name('airports.filter');
});



// Seat management routes
Route::controller(SeatController::class)->prefix('seats')->group(function () {
    Route::get('', 'index')->name('seats.index');
    Route::get('create', 'create')->name('seats.create');
    Route::post('store', 'store')->name('seats.store');
    Route::get('edit/{id}', 'edit')->name('seats.edit');
    Route::put('edit/{id}', 'update')->name('seats.update');
    Route::get('delete/{id}', 'delete')->name('seats.delete');
    Route::delete('destroy/{id}', 'destroy')->name('seats.destroy');
    Route::get('filter', 'filter')->name('seats.filter');
    Route::get('show/{id}', 'show')->name('seats.show'); // Add this line
});



// Flight schedule management routes
Route::prefix('flight-schedules')->name('flight-schedules.')->group(function () {
    Route::get('', [FlightScheduleController::class, 'index'])->name('index');
    Route::get('create', [FlightScheduleController::class, 'create'])->name('create');
    Route::post('store', [FlightScheduleController::class, 'store'])->name('store');
    Route::get('show/{id}', [FlightScheduleController::class, 'show'])->name('show');
    Route::get('edit/{id}', [FlightScheduleController::class, 'edit'])->name('edit');
    Route::put('update/{id}', [FlightScheduleController::class, 'update'])->name('update');
    Route::delete('destroy/{id}', [FlightScheduleController::class, 'destroy'])->name('destroy');
    Route::post('filter', [FlightScheduleController::class, 'filter'])->name('filter');
});





// Aircraft management routes
Route::prefix('aircrafts')->group(function () {
    Route::get('/', [AircraftController::class, 'index'])->name('aircrafts.index'); // List all aircraft
    Route::get('create', [AircraftController::class, 'create'])->name('aircrafts.create'); // Show form to create new aircraft
    Route::post('/', [AircraftController::class, 'store'])->name('aircrafts.store'); // Store new aircraft
    Route::get('{id}', [AircraftController::class, 'show'])->name('aircrafts.show'); // Show specific aircraft details
    Route::get('{id}/edit', [AircraftController::class, 'edit'])->name('aircrafts.edit'); // Show form to edit aircraft
    Route::put('{id}', [AircraftController::class, 'update'])->name('aircrafts.update'); // Update aircraft
    Route::delete('{id}', [AircraftController::class, 'destroy'])->name('aircrafts.destroy'); // Delete aircraft
    Route::post('filter', [AircraftController::class, 'filter'])->name('aircrafts.filter'); // Filter aircraft
});

// Admin management routes
// Resourceful routes for admin management
Route::prefix('admins')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admins.index'); // List all admins
    Route::get('create', [AdminController::class, 'create'])->name('admins.create'); // Show form to create new admin
    Route::post('/', [AdminController::class, 'store'])->name('admins.store'); // Store new admin
    Route::get('{id}', [AdminController::class, 'show'])->name('admins.show'); // Show specific admin details
    Route::get('{id}/edit', [AdminController::class, 'edit'])->name('admins.edit'); // Show form to edit admin
    Route::put('{id}', [AdminController::class, 'update'])->name('admins.update'); // Update admin
    Route::delete('{id}', [AdminController::class, 'destroy'])->name('admins.destroy'); // Delete admin
});

// Additional route for filtering admins
Route::post('admins/filter', [AdminController::class, 'filter'])->name('admins.filter');



// Client management routes
Route::prefix('clients')->group(function () {
    Route::get('', [ClientController::class, 'index'])->name('clients.index');
    Route::get('create', [ClientController::class, 'create'])->name('clients.create');
    Route::post('store', [ClientController::class, 'store'])->name('clients.store');
    Route::get('show/{id}', [ClientController::class, 'show'])->name('clients.show');
    Route::get('edit/{id}', [ClientController::class, 'edit'])->name('clients.edit');
    Route::put('edit/{id}', [ClientController::class, 'update'])->name('clients.update');
    Route::delete('destroy/{id}', [ClientController::class, 'destroy'])->name('clients.destroy');
    Route::post('filter', [ClientController::class, 'filter'])->name('clients.filter');
});




// Booking routes
Route::prefix('bookings')->group(function () {
    Route::get('/', [BookingController::class, 'index'])->name('bookings.index');
    Route::get('/create', [BookingController::class, 'create'])->name('bookings.create');
    Route::post('/', [BookingController::class, 'store'])->name('bookings.store');
    Route::get('/{id}', [BookingController::class, 'show'])->name('bookings.show');
    Route::get('/edit/{id}', [BookingController::class, 'edit'])->name('bookings.edit');
    Route::put('/{id}', [BookingController::class, 'update'])->name('bookings.update');
    Route::delete('/{id}', [BookingController::class, 'destroy'])->name('bookings.destroy');
    Route::get('/filter', [BookingController::class, 'bookingFilter'])->name('bookings.filter');
});



// Client Airport Routes
Route::prefix('client')->group(function () {
    Route::get('/airports', [ClientAirportController::class, 'index'])->name('client.airports.index');
    Route::get('/airports/{id}', [ClientAirportController::class, 'show'])->name('client.airports.show');
});

// Client Booking Routes
Route::prefix('client')->group(function () {
    Route::get('/bookings', [ClientBookingController::class, 'index'])->name('client.bookings.index');
    Route::get('/bookings/{id}', [ClientBookingController::class, 'show'])->name('client.bookings.show');
    Route::get('/bookings/create', [ClientBookingController::class, 'create'])->name('client.bookings.create');
    Route::get('/bookings/{id}/edit', [ClientBookingController::class, 'edit'])->name('client.bookings.edit');
});

// Client Flight Routes
Route::prefix('client')->group(function () {
    Route::get('/flights', [ClientFlightController::class, 'index'])->name('client.flights.index');
    Route::get('/flights/{id}', [ClientFlightController::class, 'show'])->name('client.flights.show');
});

// Client Flight Schedule Routes
Route::prefix('client')->group(function () {
    Route::get('/flight-schedules', [ClientFlightScheduleController::class, 'index'])->name('client.flight_schedules.index');
    Route::get('/flight-schedules/{id}', [ClientFlightScheduleController::class, 'show'])->name('client.flight_schedules.show');
});

// Client Payment Routes
Route::prefix('client')->group(function () {
    Route::get('/payments', [ClientPaymentController::class, 'index'])->name('client.payments.index');
    Route::get('/payments/{id}', [ClientPaymentController::class, 'show'])->name('client.payments.show');
    Route::get('/payments/create', [ClientPaymentController::class, 'create'])->name('client.payments.create');
    Route::post('/payments', [ClientPaymentController::class, 'store'])->name('client.payments.store'); // Define store route
    Route::get('/payments/{id}/edit', [ClientPaymentController::class, 'edit'])->name('client.payments.edit');
    Route::put('/payments/{id}', [ClientPaymentController::class, 'update'])->name('client.payments.update'); // Define update route
    Route::delete('/payments/{id}', [ClientPaymentController::class, 'destroy'])->name('client.payments.destroy'); // Define delete route
});


// Client Seat Routes
Route::prefix('client')->group(function () {
    Route::get('/seats', [ClientSeatController::class, 'index'])->name('client.seats.index');
    Route::get('/seats/{id}', [ClientSeatController::class, 'show'])->name('client.seats.show');
});



// Default authentication routes
//Auth::routes();
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Require additional routes
//require __DIR__.'/auth.php';
//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');