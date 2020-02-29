<?php

namespace App\Http\Controllers;

use App\User;
use App\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class SiteController extends Controller
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
     * Display all websites
     */
    public function index(User $user, Request $request)
    {
        // Check if authenticated user matches $user in parameters
        $this->authorize('is-owner', $user);
        
        return view('site')->with([
            'userId' => $user->id,
            'name'   => $user->name,
            'sites'  => $user->sites
        ]);
    }


    /**
     * Store website
     */
    public function store(User $user, Request $request)
    {
        // Check if authenticated user is admin
        $this->authorize('is-admin');

        $request->validate([
            'name' => 'required',
            'url'  => 'required|unique:sites',
            'plan' => 'required'
        ]);

        Site::create([
            'user_id'   => $user->id,
            'name'      => $request->input('name'),
            'url'       => $request->input('url'),
            'token'     => Str::random(40),
            'activated' => true,
            'plan'      => $request->input('plan')
        ]);

        return redirect("/users/{$user->id}/sites")->with('success', 'New website has been created successfully.');
    }
}
