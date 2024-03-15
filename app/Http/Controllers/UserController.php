<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Attendance;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view(
            'users.users',
            [
                'users' => $users,
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.adduser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|min:5|unique:users',
            'role' => 'required',
            'password' => 'required|min:8'
        ]);

        $validatedData['join_date'] = Carbon::now();
        $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['id_asisten'] = Str::uuid();

        User::create($validatedData);
        return redirect('/users')->with('success', 'Users successfully added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit', [
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $rules = [
            'role' => 'required',
            'password' => 'required|min:8'
        ];

        if ($request->username != $user->username) {
            $rules['username'] = 'required|min:5|unique:users';
        } else {
            $rules['username'] = 'required|min:5';
        }

        $validatedData = $request->validate($rules);
        $validatedData['password'] = bcrypt($validatedData['password']);

        User::where('id', $user->id)->update($validatedData);
        return redirect('/users')->with('success', 'Users successfully edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $isAlreadyUsed = Attendance::where('id_asisten', $user->id_asisten)->exists();

        if ($isAlreadyUsed) {
            return redirect('users')->with('error', "You cannot delete this user because it is already used");
        };
        User::destroy($user->id);
        return redirect('users')->with('success', 'User has been deleted');
    }
}
