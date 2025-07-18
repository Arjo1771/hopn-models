<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Mail\BookingNotification;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'model_profile_id' => 'required|exists:model_profiles,id',
            'client_name' => 'required|string',
            'date' => 'required|date',
            'duration' => 'required|string',
            'notes' => 'nullable|string',
        ]);

        $booking = Booking::create($validated);

        // Load model relationship for email use
        $booking->load('modelProfile');

        // Send email notification to admin
        Mail::to('arjaniademetre88@gmail.com')->send(new BookingNotification($booking));

        return response()->json($booking, 201);
    }

    public function index()
    {
        return Booking::with('modelProfile')->get();
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate(['status' => 'required|in:pending,approved,rejected']);

        $booking = Booking::findOrFail($id);
        $booking->status = $request->status;
        $booking->save();

        return response()->json($booking);
    }
}
