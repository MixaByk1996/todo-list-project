<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class EventController extends Controller
{
    public function createEvent(Request $request): \Illuminate\Http\JsonResponse
    {
        $event_name = $request->get('name');
        Artisan::call("make:event $event_name");
        return response()->json([
            'message' => "Event is created"
        ]);
    }
}
