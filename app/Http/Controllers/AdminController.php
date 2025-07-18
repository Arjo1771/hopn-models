<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelProfile;
use App\Models\Booking;

class AdminController extends Controller
{
   

public function dashboard()
{
    return response()->json([
        'total_models' => ModelProfile::count(),
        'total_bookings' => Booking::count()
    ]);
}

}
