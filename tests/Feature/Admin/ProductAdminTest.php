<?php

use App\Enums\ProductStatus;
use App\Models\Product;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

it('requires authentication for admin area', function () {
    $this->get('/admin/products')->assertRedirect('/admin/login');
});

it('lets an authenticated admin create a product with an image', function () {
    Storage::fake('public');
    $admin = User::factory()->create();

    $response = $this->actingAs($admin)->post('/admin/products', [
        'categoria' => 'Cozinha & Mesa',
        'nome' => 'Batedeira',
        'descricao' => 'Para os bolos.',
        'status' => ProductStatus::Disponivel->value,
        'link' => 'https://loja.exemplo.com/batedeira',
        'imagem' => UploadedFile::fake()->image('batedeira.jpg'),
    ]);

    $response->assertRedirect('/admin/products');

    $product = Product::firstWhere('nome', 'Batedeira');
    expect($product)->not->toBeNull();
    expect($product->imagem)->not->toBeNull();
    Storage::disk('public')->assertExists($product->imagem);
});

it('lets an admin reorder products', function () {
    $admin = User::factory()->create();
    $a = Product::factory()->create(['ordem' => 1]);
    $b = Product::factory()->create(['ordem' => 2]);
    $c = Product::factory()->create(['ordem' => 3]);

    $this->actingAs($admin)
        ->postJson(route('admin.products.reorder'), ['ids' => [$c->id, $a->id, $b->id]])
        ->assertOk()
        ->assertJson(['ok' => true]);

    expect($c->fresh()->ordem)->toBe(1);
    expect($a->fresh()->ordem)->toBe(2);
    expect($b->fresh()->ordem)->toBe(3);
});

it('lets an admin cancel a reservation and frees the product', function () {
    $admin = User::factory()->create();
    $product = Product::factory()->reservado()->create();
    $reservation = Reservation::create([
        'product_id' => $product->id,
        'nome' => 'Convidado',
        'telefone' => '11999990000',
    ]);

    $this->actingAs($admin)
        ->delete("/admin/reservations/{$reservation->id}")
        ->assertRedirect('/admin/reservations');

    expect($product->fresh()->status)->toBe(ProductStatus::Disponivel);
    $this->assertDatabaseCount('reservations', 0);
});
