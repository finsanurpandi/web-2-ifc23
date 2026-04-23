<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Lecturer;
use App\Models\Department;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $data['users'] = User::query()->with('department')->paginate(20);
        
        return view('user', $data);
    }

    public function create_lecturer()
    {
        $data['departments'] = Department::all();
        return view('user_create', $data);
    }

    public function store_lecturer(Request $req)
    {
        $validated = $req->validate([
            'username' => 'min:8',
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        $validated['department_id'] = $req->department_id;
        $validated['role'] = $req->role;

        $user = User::create($validated);

        // $user = User::create([
        //     'username' => $req->username,
        //     'firstname' => $req->firstname,
        //     'lastname' => $req->lastname,
        //     'email' => $req->email,
        //     'password' => Hash::make($req->password),
        //     'department_id' => $req->department_id,
        //     'role' => 1
        // ]);

        Lecturer::create([
            'nidn' => $req->nidn,
            'address' => $req->address,
            'user_id' => $user->id
        ]);

        return redirect()->route('user.index');
    }
}
