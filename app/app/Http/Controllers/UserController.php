<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Lecturer;
use App\Models\Department;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreLecturerRequest;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function index()
    {
        // withTrashed() menyertakan dengan data yang sudah dihapus.
        // onlyTrashed() hanya menampilkan data yang sudah dihapus saja.
        // methode restore() untuk mengembalikan data ke data utama, atau mengembalikan nilai deleted at menjadi null
        // methode forceDelete() untuk menghapus data dari database sehingga data benar-benar hilang.

        $data['users'] = User::withTrashed()->with('department')->paginate(20);

        // send email
        Mail::to('sdvhsvhs@sdbvbds.com')->send(new TestMail());
        
        return view('user', $data);
    }

    public function create_lecturer()
    {
        $data['departments'] = Department::all();
        return view('user_create', $data);
    }

    public function store_lecturer(StoreLecturerRequest $req)
    {
        // $validated = $req->validate([
        //     'username' => 'min:8',
        //     'firstname' => 'required',
        //     'lastname' => 'required',
        //     'email' => 'required|email',
        //     'password' => 'required|min:8',
        // ]);

        // $validated['department_id'] = $req->department_id;
        // $validated['role'] = $req->role;

        // $user = User::create($validated);

        // $user = User::create([
        //     'username' => $req->username,
        //     'firstname' => $req->firstname,
        //     'lastname' => $req->lastname,
        //     'email' => $req->email,
        //     'password' => Hash::make($req->password),
        //     'department_id' => $req->department_id,
        //     'role' => 1
        // ]);

        // Lecturer::create([
        //     'nidn' => $req->nidn,
        //     'address' => $req->address,
        //     'user_id' => $user->id
        // ]);
        $validatedUser = $req->safe()->merge(['role' => 1])->except(['nidn', 'address']);
        $user = User::create($validatedUser);

        $validatedLecturer = $req->safe()->only(['nidn', 'address']);
        $validatedLecturer['user_id'] = $user->id;
        Lecturer::create($validatedLecturer);

        return redirect()->route('user.index');
    }
}
