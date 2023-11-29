<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DeleteController;
use App\Http\Controllers\RotateController;
use App\Http\Controllers\MergeController;
use App\Http\Controllers\CompressController;
use App\Http\Controllers\SplitController;
use App\Http\Controllers\PaymentpageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JpgtopdfController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TelegramController;
use App\Http\Controllers\ProcompressController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;


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

//USEERRRRR

Route::get('/tes', function () {
    return view('halamankosong');
});

//admin route

Route::resource('user', UserController::class) 
->middleware(['auth', 'verified', 'checkrole:1']);



//user route
Route::get('/dashboard/merge', [MergeController::class, 'showDashboard' ])
    ->middleware(['auth', 'verified', 'checkrole:3,2'])
    ->name('dashboard.merge.index');

    Route::get('/dashboard/payment', [PaymentpageController::class, 'showDashboard' ])
    ->middleware(['auth', 'verified', 'checkrole:2,3'])
    ->name('dashboard.payment.index');

    Route::post('/dashboard/payment/2', [TelegramController::class, 'submitPayment'])->name('konfirmasi');

    Route::get('/dashboard/split', [SplitController::class, 'showDashboard' ])
    ->middleware(['auth', 'verified', 'checkrole:2,3'])
    ->name('dashboard.split.index');

    Route::get('/dashboard/compress', [CompressController::class, 'showDashboard' ])
    ->middleware(['auth', 'verified', 'checkrole:2,3'])
    ->name('dashboard.compress.index');

    Route::get('/dashboard/jpgtopdf', [JpgtopdfController::class, 'showDashboard' ])
    ->middleware(['auth', 'verified', 'checkrole:2,3'])
    ->name('dashboard.jpgtopdf.index');
   
    Route::get('/dashboard/pro', [ProcompressController::class, 'showDashboard' ])
    ->middleware(['auth', 'verified', 'checkrole:2'])
    ->name('prouser.compress.index');

    Route::get('/dashboard/pro/delete', [DeleteController::class, 'showDashboard' ])
    ->middleware(['auth', 'verified', 'checkrole:2'])
    ->name('prouser.delete');

    Route::get('/dashboard/pro/rotate', [RotateController::class, 'showDashboard' ])
    ->middleware(['auth', 'verified', 'checkrole:2'])
    ->name('prouser.rotate');

    



   


Route::get('/', 'HomeController@index')->middleware('trackvisitors');



Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::get('/logout', [LoginController::class, 'logout'])->name('keluar');

Route::post('/split', function () {
    return view('split.index');
});



Route::get('/split', function () {
    return view('split.index');
});

Route::get('/merge', function () {
    return view('merge.index');
});

Route::get('/merges', function () {
    return view('merge.merges');
});

Route::get('/jpgtopdf', function () {
    return view('jpgtopdf.index');
});

Route::get('/compress', function () {
    return view('compress.index');
});

   


Route::get('/', function () {
    return view('welcome');
});
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);


Route::group(['middleware' => ['auth', 'checkrole:1,2,3']], function() {
    Route::post('/logout', [AuthenticatedSessionController::class, 'keluar']);
    Route::get('/redirect', [RedirectController::class, 'cek']);
});

Route::get('/redirect', [RedirectController::class, 'cek']);


Route::get('/dashboard', [DashboardController::class, 'showDashboard' ])
    ->middleware(['auth', 'verified', 'checkrole:2,3'])
    ->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';