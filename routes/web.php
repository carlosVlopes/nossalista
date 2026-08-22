<?php

use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminReservationController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\ReservationController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $products = Product::visivel()->orderBy('ordem')->orderBy('nome')->get();
    $categorias = $products->pluck('categoria')->unique()->values();

    return view('lista', [
        'products' => $products,
        'categorias' => $categorias,
    ]);
})->name('home');

Route::post('/produtos/{product}/reservar', [ReservationController::class, 'store'])
    ->name('produtos.reservar');

Route::post('/minhas-reservas', [ReservationController::class, 'mine'])
    ->name('produtos.minhas-reservas');

/*
|--------------------------------------------------------------------------
| Admin
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('login', [AuthController::class, 'showLogin'])->name('login');
        Route::post('login', [AuthController::class, 'login'])->name('login.attempt');
    });

    Route::middleware('auth')->group(function () {
        Route::post('logout', [AuthController::class, 'logout'])->name('logout');

        Route::get('/', fn () => redirect()->route('admin.products.index'))->name('dashboard');
        Route::post('products/reorder', [AdminProductController::class, 'reorder'])->name('products.reorder');
        Route::resource('products', AdminProductController::class)->except('show');

        Route::get('reservations', [AdminReservationController::class, 'index'])->name('reservations.index');
        Route::delete('reservations/{reservation}', [AdminReservationController::class, 'destroy'])->name('reservations.destroy');
    });
});
