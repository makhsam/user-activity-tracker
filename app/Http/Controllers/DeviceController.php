<?php

namespace App\Http\Controllers;

use App\Site;
use App\Device;
use Illuminate\Http\Request;

class DeviceController extends Controller
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
     * Save device info
     */
    public function store(Request $request)
    {
        try { // Find site by ID
            $site = Site::where('token', $request->input('token'))
                        ->where('activated', true)->firstOrFail();
        }
        catch(ModelNotFoundException $e) {
            return response()->json(['message' => 'Token not provided.'], 400); 
        }

        $device = Device::find($request->input('fingerprint'));
        if ($device === null) {
            $device = Device::create(array_merge($request->all(), ['site_id' => $site->id]));
        }

        return response()->json(['fingerprint' => $device->fingerprint], 200); 
    }

    
}
