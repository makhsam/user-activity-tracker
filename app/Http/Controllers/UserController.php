<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display all users
     */
    public function index()
    {
        // Check if the current user is admin
        $this->authorize('is-admin');

        $users = User::all();
        return view('user')->with('users', $users);
    }
}
