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
            'firstname' => 'required|unique:users,firstname',
            'lastname' => 'required',
            'password' => 'required|confirmed',
            'email' => 'required|email'
        ]);

        $user = new User;
        $user->firstname = $request->input('firstname');
        $user->lastname = $request->input('lastname');
        $user->password = bcrypt($request->input('password'));
        $user->email = $request->input('email');
        $user->role = $request->input('role');
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
          'firstname' => 'required|unique:users,firstname,'.$user->id,
          'lastname' => 'required',
          // 'password' => 'required|confirmed',
          'email' => 'required|email|unique:users,email,'.$user->id,
      ]);

      $user->firstname = $request->input('firstname');
      $user->lastname = $request->input('lastname');
      // $user->password = bcrypt($request->input('password'));
      $user->email = $request->input('email');
      $user->role = $request->input('role');
      $user->save();
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
      $user->delete();
      return redirect('/users');
    }
}
