<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class TestController extends Controller
{
    public function index()
    {
        $users = User::all();
        // first() return single record
        // get() return multiple record

        dd($users[0]->fullname);
    }
}
