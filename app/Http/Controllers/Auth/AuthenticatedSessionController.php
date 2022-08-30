<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Validation\ValidationException;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create(Request $request)
    {
        $role= $request->role;
        return view('auth.login',compact('role'));
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
    
       $data = $request->validate([
            'email' => 'required|string|email|exists:users',
            'password' => 'required|string'
        ]);

        $user = User::where('email', $data['email'])->first();

      if (Auth::guard($user->role)->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->route("{$user->role}.dashboard.index");
        }
         throw ValidationException::withMessages([
                'email' => trans('auth.failed'),
            ]);
          return back()->withInput($request->only('email', 'remember'));
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {

           if( Auth::guard('user')->check()){
           $role="user";
        }
        if( Auth::guard('superadmin')->check()){
            $role="superadmin";
        }
          if( Auth::guard('subadmin')->check()){
            $role="subadmin";
        }
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();


     
        return redirect()->route('login',['role'=> $role]);
    }
}
