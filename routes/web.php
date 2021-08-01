<?php
use App\Http\Controllers\EmailTakenController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\GenresController;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\MoviesPublicController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UsersController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Default authorization routes
Auth::routes();

//Route for setting a theme
Route::get('theme/{theme}', function ($theme) {
    if (! in_array($theme, ['dark', 'light'])) {
        abort(400);
    }
     Cookie::queue( Cookie::make('theme', $theme,1440) ); 
     return back();
 });

/* Public routes */
Route::get('/', [App\Http\Controllers\WelcomeController::class, 'index'])->name('home');
Route::post('/email/check', [EmailTakenController::class, 'check'])->name('email.check');

Route::get('/movies/{movie}', [MoviesPublicController::class, 'show'])->name('movie.show');
Route::get('/movies', [MoviesPublicController::class, 'index'])->name('movie.index');

// Reviews routes

Route::resource('reviews', ReviewController::class);

/* Admin routes - import controllers directly because of same naming*/
Route::get('/admin_dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin_dashboard')->middleware('role:admin');
Route::resource('/admin/genres', GenresController::class)->middleware('role:admin');
Route::resource('/admin/movies', MoviesController::class)->middleware('verifyGenres')->middleware('role:admin');
Route::resource('admin/users', UsersController::class)->middleware('role:admin');
/* Standard user routes */
Route::get('/user_dashboard', [App\Http\Controllers\User\DashboardController::class, 'index'])->name('user_dashboard')->middleware('role:user');
// Redirection home dashboard
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

