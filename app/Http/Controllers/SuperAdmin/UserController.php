<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('superadmin.user.create');  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
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

        $user = new User;
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->status = 1;
        $user->photo = $path; 
        $user->role = $request->role; 
        $user->password =bcrypt($request->password);
        $user->save();

        return back()->with(['status'=>1]);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $user =  User::find($id);
         return view('superadmin.user.edit',compact('user')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
         $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255',"unique:users,username,{$id}"],
            'photo' => ['sometimes','mimes:jpg,png,jpeg,webp'],
            'email' => ['required', 'string', 'email', 'max:255',"unique:users,email,{$id}"],
            'password' => ['sometimes', 'confirmed'],
            'role' => ['required', Rule::in(['superadmin', 'subadmin','user']),],
        ]);

         if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
            $extension = $request->photo->extension();
            $path = $request->photo->store('images/users','public');
            
        }

        $user = User::find($id);
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
         if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
                 Storage::disk('public')->delete($user->photo);
        $user->photo = $path; 
         }
        $user->role = $request->role; 
        if($request->has('password')){
            $user->password =bcrypt($request->password);
        }
       
        $user->save();

        return back()->with(['status'=>1]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

      
      
          $user =  User::find($id);
           Storage::disk('public')->delete($user->photo);
           $user->delete();

         return back()->with(['status'=>1]);
    }
}
