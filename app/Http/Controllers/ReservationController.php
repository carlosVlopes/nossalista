<?php

namespace App\Http\Controllers;

use App\Enums\ProductStatus;
use App\Http\Requests\LookupReservationsRequest;
use App\Http\Requests\StoreReservationRequest;
use App\Models\Product;
use App\Models\Reservation;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{
    public function store(StoreReservationRequest $request, Product $product): RedirectResponse|JsonResponse
    {
        $reserved = DB::transaction(function () use ($request, $product): bool {
            /** @var Product $fresh */
            $fresh = Product::whereKey($product->getKey())->lockForUpdate()->first();

            if ($fresh->status !== ProductStatus::Disponivel) {
                return false;
            }

            $fresh->reservations()->create($request->safe()->only(['nome', 'telefone']));
            $fresh->update(['status' => ProductStatus::Reservado]);

            return true;
        });

        if (! $reserved) {
            $message = 'Esse presente já foi reservado. Escolha outro. 💛';

            if ($request->wantsJson()) {
                return response()->json(['reserved' => false, 'message' => $message], 409);
            }

            return back()->with('error', $message);
        }

        $message = 'Obrigado por reservar! Seu carinho já está guardado.';

        if ($request->wantsJson()) {
            return response()->json(['reserved' => true, 'message' => $message]);
        }

        return back()->with('status', $message);
    }

    /**
     * List the reservations made with a given phone number (digits-only match).
     */
    public function mine(LookupReservationsRequest $request): JsonResponse
    {
        $digits = preg_replace('/\D/', '', $request->validated('telefone'));

        $reservations = Reservation::query()
            ->with('product')
            ->latest()
            ->get()
            ->filter(fn (Reservation $reservation): bool => preg_replace('/\D/', '', $reservation->telefone) === $digits)
            ->filter(fn (Reservation $reservation): bool => $reservation->product !== null)
            ->values();

        $items = $reservations->map(fn (Reservation $reservation): array => [
            'nome' => $reservation->product->nome,
            'categoria' => $reservation->product->categoria,
            'imagem' => $reservation->product->imagemUrl(),
            'link' => $reservation->product->link,
        ]);

        return response()->json([
            'count' => $items->count(),
            'reservations' => $items,
        ]);
    }
}
