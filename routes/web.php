<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ProductoController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

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

Route::get('/', function () {
    return redirect('https://betos-mu.vercel.app/');
});


Route::group(['middleware' => ['auth']], function () {
    Route::resource('roles', RolController::class);
    Route::resource('usuarios', UsuarioController::class);
    Route::resource('productos', ProductoController::class);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();


Route::get('/login-google', function () {
    return Socialite::driver('google')->redirect();
});

Route::get('/google-callback', function () {
    $user = Socialite::driver('google')->user();
    $userExists = User::where('external_id', $user->id)->where('external_auth', 'google')->first();

    if ($userExists) {
        Auth::login($userExists);
    } else {
        $userNew = User::create([
            'name' => $user->name,
            'email' => $user->email,
            'avatar' => $user->avatar,
            'external_id' => $user->id,
            'external_auth' => 'google',
        ]);
        Auth::login($userNew);
    }
    return redirect('/home');
});
