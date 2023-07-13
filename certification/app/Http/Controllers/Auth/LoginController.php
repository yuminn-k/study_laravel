<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

Route::controller(\App\Http\Controllers\Auth\LoginController::class)->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/login', 'showLoginForm')->name('login');
        Route::post('/login', 'login');
    });
    Route::post('/logout', 'logout')->name('logout')->middleware('auth');
});


class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }
}
