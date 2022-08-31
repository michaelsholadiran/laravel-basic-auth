<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $user =  User::find(auth()->user()->id);
          return view('user.account.index',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
         

         if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
            $extension = $request->photo->extension();
            $path = $request->photo->store('images/users','public');
            
        }

        $user= User::find(auth()->user()->id);
         if ($request->has('password')) {
             $request->validate([
            // 'name' => ['required', 'string', 'max:255'],
            // 'username' => ['required', 'string', 'max:255',"unique:users,username,{$id}"],
            // 'photo' => ['sometimes','mimes:jpg,png,jpeg,webp'],
            // 'email' => ['required', 'string', 'email', 'max:255',"unique:users,email,{$id}"],
            'password' => ['sometimes', 'current_password'],
            // 'role' => ['required', Rule::in(['superadmin', 'subadmin','user']),],
            'new_password' => 'sometimes|required|confirmed',
        ]);
          $user->password=bcrypt($request->new_password);
               
         } else {
             $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255',"unique:users,username,{$id}"],
            'photo' => ['sometimes','mimes:jpg,png,jpeg,webp'],
            'email' => ['required', 'string', 'email', 'max:255',"unique:users,email,{$id}"],
            // 'password' => ['sometimes', 'current_password'],
            'role' => ['required', Rule::in(['superadmin', 'subadmin','user']),],
            // 'new_password' => 'sometimes|required|confirmed',
        ]);
           $user->name=$request->name;
           $user->username=$request->username;
           $user->email=$request->email;
             if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
               Storage::disk('public')->delete($user->photo);
            $user->photo=$path;
             }
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
        //
    }
}
