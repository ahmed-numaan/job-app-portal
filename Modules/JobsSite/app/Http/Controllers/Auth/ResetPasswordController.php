<?php

namespace Modules\JobsSite\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/applications';

    public function showResetForm(Request $request, $token = null)
    {
        return view('jobssite::auth.passwords.reset')->with([
            'token' => $token,
            'email' => $request->email,
        ]);
    }

    protected function resetPassword($user, $password)
    {
        // Set new password
        $this->setUserPassword($user, $password);
        $user->setRememberToken(Str::random(60));
        $user->save();

        // 🚫 Do NOT log the user in
        // $this->guard()->login($user);
    }

    protected function sendResetResponse(Request $request, $response)
    {
        return redirect()->route('login')
            ->with('status', trans($response));
    }
}
