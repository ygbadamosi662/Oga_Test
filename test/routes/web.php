<?php

use App\Http\Controllers\AuthController;
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

Route::get('/', [AuthController::class, 'index']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/update_user', [AuthController::class, 'update_user']);
Route::post('/update_password', [AuthController::class, 'update_password']);
Route::get('/get_user', [AuthController::class, 'get_user']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/delete_user', [AuthController::class, 'delete_user']);
Route::get('page/register', function () {
    return view('Register');
})->name('page/register');
Route::get('page/login', function () {
    return view('Login');
})->name('page/login');
Route::get('page/profile/update', function () {
    return view('Update');
})->name('page/profile/update');
Route::get('page/password/update', function () {
    return view('Password');
})->name('page/password/update');
// Route::get('/test-database-connection', function () {
//     try {
//         // Just attempting to connect without querying a specific table
//         DB::connection()->getPdo();
//         return "Connected to the database!";
//     } catch (\Exception $e) {
//         phpinfo();
//         echo($e);
//         return "Database connection failed: " . $e->getMessage();
//     }
// });
