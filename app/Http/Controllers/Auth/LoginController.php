<?php

namespace App\Http\Controllers\Auth;

use App\Models\EmailLogin;
use App\Http\Controllers\Controller;
use App\Mail\EmailLogin as EmailLoginMail;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        // validate that this is a real email address
        $validatedData = request()->validate([
            'email' => 'required|string|email|exists:users|max:255',
        ]);

        $emailLogin = EmailLogin::createForEmail($validatedData['email']);

        // send off a login email
        $url = route('auth.email-authenticate', [
            'token' => $emailLogin->token
        ]);

        Mail::to($emailLogin->email)->send(new EmailLoginMail($url));

        // show the users a view saying "check your email"
        return view('auth.email-login-sent');
    }

    public function authenticateEmail($token)
    {
        $emailLogin = EmailLogin::validFromToken($token);

        $user = User::where('email', $emailLogin->email)->firstOrFail();

        Auth::login($user);

        return redirect()->route('user.profile');
    }
}
