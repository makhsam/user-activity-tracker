<?php

namespace App\Http\Controllers;

use App\Device;
use App\Visit;
use Illuminate\Http\Request;

class VisitController extends Controller
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
     * Record visit data
     */
    public function store(Request $request) {

        $device = Device::find($request->input('fingerprint'));

        if ($device === null) {
            return response()->json(['message' => 'Invalid fingerprint.'], 400); 
        }

        $visit = new Visit;
        $visit->device_id = $device->fingerprint;
        $visit->ip = Request::ip();
        $visit->latitude = $request->input('latitude');
        $visit->longitude = $request->input('longitude');
        $visit->accuracy = $request->input('accuracy');
        $visit->http_referer = $request->input('http_referer');
        $visit->save();

        return response()->json(['visit_id' => $visit->id], 200); 
    }
}
