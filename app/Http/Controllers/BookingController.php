<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        return Booking::query()->when($request->date, fn ($q, $date) => $q->whereDate('starts_at', $date))->orderBy('starts_at')->paginate(20);
    }
    public function store(Request $request) { return response()->json(Booking::create($this->validated($request)), 201); }
    public function show(Booking $booking) { return $booking; }
    public function update(Request $request, Booking $booking) { $booking->update($this->validated($request, true)); return $booking->fresh(); }
    private function validated(Request $request, bool $partial = false): array
    {
        return $request->validate([
            'customer_name' => [$partial ? 'sometimes' : 'required', 'string', 'max:160'],
            'customer_email' => [$partial ? 'sometimes' : 'required', 'email'],
            'starts_at' => [$partial ? 'sometimes' : 'required', 'date'],
            'ends_at' => [$partial ? 'sometimes' : 'required', 'date', 'after:starts_at'],
            'status' => [$partial ? 'sometimes' : 'required', Rule::in(['pending', 'confirmed', 'cancelled'])],
            'notes' => ['nullable', 'string', 'max:2000'],
        ]);
    }
}
