<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin');
    }

    public function showLoginForm()
    {
        return view('auth.admin_login');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        // 1) Validate data
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        // 2) Attempt to log
        if(Auth::guard('admin')->attempt($credentials, $request->has('remember'))) {
            // 3) If successful, then redirect to their location
            return redirect()->intended(route('admin.dashboard'));
        }

        // 4) If unsuccessful, then redirect back to login form
        return redirect()->back()->withInput($credentials);
    }
}
