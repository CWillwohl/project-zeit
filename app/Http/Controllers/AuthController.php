<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use App\Service\Auth\RegisterNewUserService;
use App\Http\Requests\Auth\StoreRegisterRequest;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class AuthController extends Controller
{

    public function __construct(
        private RegisterNewUserService $registerNewUserService,
    ){}

    /**
     * Show the application's login form.
     * Retorna a o formulário de login da aplicação.
     *
     * @return \Illuminate\View\View
     */
    public function login() : View
    {
        return view('auth.login');
    }

    /**
     * Show the application's register form.
     * Retorna a o formulário de registro da aplicação.
     *
     * @return \Illuminate\View\View
     */
    public function register() : View
    {
        return view('auth.register');
    }

    /**
     * Show the application's forgot password form.
     * Retorna a o formulário de recuperação de senha da aplicação.
     *
     * @return \Illuminate\View\View
     */
    public function forgotPassword() : View
    {
        return view('auth.forgot-password');
    }

    /**
     * Show the application's change password form.
     * Retorna a o formulário de alteração de senha da aplicação.
     *
     * @return \Illuminate\View\View
     */
    public function changePassword(String $token, String $email) : View
    {
        return view('auth.change-password', compact('token', 'email'));
    }

    /**
     * Show the application's verify email form.
     * Retorna a o formulário de verificação de email da aplicação.
     *
     * @return \Illuminate\View\View
     */
    public function verifyEmail() : View
    {
        return view('auth.verify-email');
    }

    /**
     * Register a new user in database.
     * Registra um novo usuário no banco de dados.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreRegisterRequest $request) : RedirectResponse
    {
        $user = $this->registerNewUserService->handle($request);
        event(new Registered($user));

        return redirect()->route('auth.login');
    }

    /**
     * Authenticate a user.
     * Autentica um usuário.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function authenticate(Request $request) : RedirectResponse
    {

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => __('auth.failed'),
        ])->onlyInput('email');
    }

    /**
     * Send a recovery password link to the given user.
     * Envia um e-mail de recuperação de senha ao usuário.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendPasswordResetMail(Request $request) : RedirectResponse
    {
        $request->validate(['email' => 'required|email']);
        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
                    ? back()->with(['status' => __($status)])
                    : back()->withErrors(['email' => __($status)]);
    }

    /**
     * Reset the given user's password.
     * Altera a senha do usuário.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updatePassword(Request $request) : RedirectResponse
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
                    ? redirect()->route('auth.login')->with('status', __($status))
                    : back()->withErrors(['email' => [__($status)]]);
    }

    public function resendVerificationEmail() : RedirectResponse
    {
        if (Auth::user()->hasVerifiedEmail()) {
            return redirect()->route('dashboard');
        }

        Auth::user()->sendEmailVerificationNotification();

        return back()->with('status', 'success');
    }

    public function verifiedEmail(EmailVerificationRequest $request) : RedirectResponse
    {
        $request->fulfill();

        return redirect()->route('dashboard');
    }

    /**
     * Log the user out of the application.
     * Desloga o usuário da aplicação.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request) : RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
