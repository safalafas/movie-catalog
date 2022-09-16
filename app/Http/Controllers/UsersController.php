<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UsersController extends Controller
{

    public function index()
    {
        return view('users.index',
            [
                'users' => Users::latest()->paginate(5),
            ]
        );
    }
    public function show(Users $user)
    {
        return view('users.show',
            [
                'user' => $user,
            ]
        );
    }
    public function create()
    {
        return view('users.create');
    }
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'username' => ['required', Rule::unique('users', 'username')],
                'password' => ['required', 'confirmed', 'min:8'],
                'email' => ['required', 'email', Rule::unique('users', 'email')],
            ]
        );
        $data['password'] = bcrypt($data['password']);
        if ($request->hasFile('profile_picture')) {
            $data['profile_picture'] = $request->file('profile_picture')->store('pictures', 'local');
        }

        $user = Users::create($data);
        auth()->login($user);
        
    }

    public function edit(Users $user)
    {
        return view('users.edit', ['user' => $user]);
    }

    public function update(Request $request, Users $user)
    {
        $data = $request->validate(
            [
                'username' => ['required'],
                'password' => 'required|confirmed|min:8',
                'email' => ['required', 'email'],
            ]
        );
        $data['password'] = bcrypt($data['password']);
        if ($request->hasFile('profile_picture')) {
            $data['profile_picture'] = $request->file('profile_picture')->store('pictures', 'local');
        }

        $user->update($data);
        return back();
    }

    public function destroy(Users $user)
    {
        $user->delete();
        return redirect('/');
    }

    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function login()
    {
        return view('users.login');
    }

    public function authenticate(Request $request)
    {
        $data = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (auth()->attempt($data)) {
            $request->session()->regenerate();
            $request->session()->regenerate();
            return redirect('/');
        }

        return back()->withErrors(["username" => "Incorrect Username/Password"]);

    }
}
