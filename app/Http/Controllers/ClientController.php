<?php

namespace App\Http\Controllers;

use App\User;
use App\Site;
use App\Client;
use App\Device;
use Illuminate\Http\Request;


class ClientController extends Controller
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
     * Display list of clients 
     */
    public function index(User $user, Site $site) {
        // Check if authenticated user owns website
        $this->authorize('site-owner', $site);

        return view('client')->with([
            'clients' => $site->clients
        ]);
    }


    /**
     * Record client
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'phone_number' => 'required',
            'message' => 'max:500|nullable'
        ]);

        try { // Find site by ID
            $site = Site::where('token', $request->input('token'))
                        ->where('activated', true)->firstOrFail();
        }
        catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Token not provided.'], 400); 
        }

        $client = Client::create(array_merge($validated, ['site_id' => $site->id]));

        // Send E-mail
        //

        return response()->json(['message' => 'E-mail successfully sent!'], 200); 
    }
}
