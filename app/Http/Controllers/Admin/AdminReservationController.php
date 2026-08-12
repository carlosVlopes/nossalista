<?php

namespace App\Http\Controllers\Admin;

use App\Enums\ProductStatus;
use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AdminReservationController extends Controller
{
    public function index(): View
    {
        $reservations = Reservation::with('product')->latest()->get();

        return view('admin.reservations.index', ['reservations' => $reservations]);
    }

    public function destroy(Reservation $reservation): RedirectResponse
    {
        $reservation->product?->update(['status' => ProductStatus::Disponivel]);
        $reservation->delete();

        return redirect()
            ->route('admin.reservations.index')
            ->with('status', 'Reserva cancelada. O presente voltou a ficar disponível.');
    }
}
