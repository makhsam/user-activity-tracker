<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;


class HomeController extends Controller
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
     * Redirect user to the right destination
     */
    public function index(Request $request) {
        if (Gate::allows('is-admin')) {
            return redirect("/users");
        }
        
        $user_id = $request->user()->id;
        return redirect("/users/{$user_id}/sites");
    }
}
