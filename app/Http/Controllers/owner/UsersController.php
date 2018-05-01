<?php

namespace App\Http\Controllers\owner;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if(\Auth::user()->cant('isOwner', User::class)){
        return redirect('/home');
    }
      $users = User::all();
      return view('owner.staff.index', ['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $roles = [
          "chef" => "Chef",
          "waiter" => "Waiter",
          "owner" => "Owner"
      ];
      return view('owner.staff.create', ['roles'=>$roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      try{
        $validatedData = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'password' => 'required|confirmed',
            'email' => 'required|email|unique:users,email',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5000000',
            'nickname' => 'required'
        ]);

        $user = new User;
        $user->firstname = $request->input('firstname');
        $user->lastname = $request->input('lastname');
        $user->nickname = $request->input('nickname');
        $user->password = bcrypt($request->input('password'));
        $user->email = $request->input('email');
        $user->role = $request->input('role');
        $user->save();
        $mime = $request->image->getClientOriginalExtension();
        $file_name = ($user->id).'.'.$mime;
        $path = $request->image->storeAs('profile', $file_name, 'public_images');
        $user->image_path = $file_name;
        $user->save();
        return redirect('/users/' . $user->id);
      }catch (Exception $e) {
        return back()->withInput();
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
      return view('owner.staff.show', ['user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
      $roles = [
          "chef" => "Chef",
          "waiter" => "Waiter",
          "owner" => "Owner"
      ];
      return view('owner.staff.edit', ['user'=>$user,
                                  'roles'=>$roles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
      $validatedData = $request->validate([
          'firstname' => 'required',
          'lastname' => 'required',
          'nickname' => 'required',
          // 'password' => 'required|confirmed',
          'email' => 'required|email|unique:users,email,'.$user->id,
          'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5000000'
      ]);

      $user->firstname = $request->input('firstname');
      $user->lastname = $request->input('lastname');
      $user->nickname = $request->input('nickname');
      // $user->password = bcrypt($request->input('password'));
      $user->email = $request->input('email');
      $user->role = $request->input('role');
      $user->save();
      if ($request->hasFile('image')){
        \Storage::disk('public_images')->delete('profile/'.$user->image_path);
        $mime = $request->image->getClientOriginalExtension();
        $file_name = ($user->id).'.'.$mime;
        $path = $request->image->storeAs('profile', $file_name, 'public_images');
        $user->image_path = $file_name;
        $user->save();
    }
      return redirect('/users/' . $user->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
      \Storage::disk('public_images')->delete('profile/'.$user->image_path);
      $user->delete();
      return redirect('/users');
    }
}
