<?php

use App\Http\Controllers\AuthController;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!https://twitter.com/xetdoecommerce/status/1596199940497309698
|
*/

Route::controller(AuthController::class)->as('auth.')->group(function (){

    Route::middleware(['guest'])->group(function () {

        // Rotas de autenticação...
        // Authentication Routes...

        Route::get('/login', 'login')->name('login');
        Route::post('/authenticate', 'authenticate')->name('authenticate');

        // Rotas de Registro...
        // Register Routes...

        Route::get('/register', 'register')->name('register');
        Route::post('/store', 'store')->name('store');

        // Rotas de recuperação de senha...
        // Password Reset Routes...

        Route::get('/forgot-password', 'forgotPassword')->name('forgot-password');
        Route::get('/change-password/{token}/{email}', 'changePassword')->name('reset-password');
        Route::post('/forgot-password', 'sendPasswordResetMail')->name('send-password-reset-mail');
        Route::post('/reset-password', 'updatePassword')->name('update-password');
    });

    Route::middleware(['auth'])->group(function (){

        // Rota de logout...
        // Logout Route...

        Route::post('/logout', 'logout')->name('logout');

        // Rotas de verificação de email...
        // Email Verification Routes...

        Route::get('/verify-email', 'verifyEmail')
                ->name('verify-email');
        Route::get('/email/verify/{id}/{hash}', 'verifiedEmail')
                ->middleware(['signed'])
                ->name('email-verify');
        Route::post('/resend-verification-email', 'resendVerificationEmail')
                ->middleware(['throttle:6,1'])
                ->name('resend-verification-email');
    });

});
