<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;




class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255',"unique:users"],
            'photo' => ['required','mimes:jpg,png,jpeg,webp'],
            'email' => ['required', 'string', 'email', 'max:255',"unique:users"],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', Rule::in(['superadmin', 'subadmin','user']),],
        ]);
 

           if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
            $extension = $request->photo->extension();
            $path = $request->photo->store('images/users','public');
        }
        
  $role=strtolower($request->role);
        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'photo' => $path,
            'status' => 1,
            'role' => $role,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        

         Auth::guard($role)->login($user);

        return redirect(route("{$role}.dashboard.index"));
     

        
        
    }
}
