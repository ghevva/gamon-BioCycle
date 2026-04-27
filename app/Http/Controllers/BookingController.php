<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{
    // ================== HALAMAN BOOKING USER ==================
    public function bookingPage()
    {
        if (!session('user')) {
            return redirect('/login');
        }

        $userId = session('user')->id;

        $bookings = Booking::where('user_id', $userId)
            ->latest()
            ->get();

        return view('booking', compact('bookings'));
    }

    // ================== ADMIN PANEL ==================
    public function index()
    {
        $bookings = Booking::latest()->get();
        return view('booking.index', compact('bookings'));
    }

    // ================== FORM CREATE ==================
    public function create()
    {
        $bookings = Booking::latest()->get();
        return view('booking.create', compact('bookings'));
    }

    // ================== SIMPAN BOOKING ==================
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required',
            'name' => 'required',
            'date' => 'required',
            'time' => 'required',
        ]);

        // VALIDASI TAMBAHAN (BIAR RAPIH)
        if ($request->type == 'minyak') {
            $request->validate(['volume' => 'required']);
        }

        if ($request->type == 'plastik') {
            $request->validate(['weight' => 'required']);
        }

        // CEK MAKS 5 ORANG PER SLOT
        $count = Booking::where('date', $request->date)
            ->where('time', $request->time)
            ->count();

        if ($count >= 5) {
            return back()->with('error', 'Slot jam ini sudah penuh');
        }

        // NOMOR ANTRIAN
        $lastQueue = Booking::whereDate('date', $request->date)
            ->max('queue_number');

        $queue = $lastQueue ? $lastQueue + 1 : 1;

        Booking::create([
            'user_id' => session('user')->id ?? null,
            'type' => $request->type,
            'name' => $request->name,
            'volume' => $request->type == 'minyak' ? $request->volume : null,
            'weight' => $request->type == 'plastik' ? $request->weight : null,
            'date' => $request->date,
            'time' => $request->time,
            'queue_number' => $queue,
        ]);

        return redirect()->route('booking.page')
            ->with('success', 'Booking berhasil! No antrian: ' . $queue);
    }

    // ================== FORM EDIT ==================
    public function edit(Booking $booking)
    {
        return view('booking.edit', compact('booking'));
    }

    // ================== UPDATE ==================
    public function update(Request $request, Booking $booking)
    {
        $request->validate([
            'type' => 'required',
            'name' => 'required',
            'date' => 'required',
            'time' => 'required',
        ]);

        $booking->update([
            'type' => $request->type,
            'name' => $request->name,
            'volume' => $request->type == 'minyak' ? $request->volume : null,
            'weight' => $request->type == 'plastik' ? $request->weight : null,
            'date' => $request->date,
            'time' => $request->time,
        ]);

        return redirect()->route('booking.index')
            ->with('success', 'Booking berhasil diupdate');
    }

    // ================== HAPUS ==================
    public function destroy(Booking $booking)
    {
        $booking->delete();
        return back()->with('success', 'Booking berhasil dihapus');
    }
}