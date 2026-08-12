<?php

use App\Enums\ProductStatus;
use App\Models\Product;

it('reserves an available product and stores name and phone', function () {
    $product = Product::factory()->create();

    $response = $this->post("/produtos/{$product->id}/reservar", [
        'nome' => 'Tia Fernanda',
        'telefone' => '11999998888',
    ]);

    $response->assertRedirect();
    $response->assertSessionHas('status');

    expect($product->fresh()->status)->toBe(ProductStatus::Reservado);
    $this->assertDatabaseHas('reservations', [
        'product_id' => $product->id,
        'nome' => 'Tia Fernanda',
        'telefone' => '11999998888',
    ]);
});

it('returns json when reserving via ajax', function () {
    $product = Product::factory()->create();

    $this->postJson("/produtos/{$product->id}/reservar", [
        'nome' => 'Tia Fernanda',
        'telefone' => '(11) 91234-5678',
    ])->assertOk()->assertJson(['reserved' => true]);

    expect($product->fresh()->status)->toBe(ProductStatus::Reservado);
});

it('returns 409 json when reserving an already reserved product via ajax', function () {
    $product = Product::factory()->reservado()->create();

    $this->postJson("/produtos/{$product->id}/reservar", [
        'nome' => 'Alguém',
        'telefone' => '(11) 98888-7777',
    ])->assertStatus(409)->assertJson(['reserved' => false]);
});

it('requires name and phone', function () {
    $product = Product::factory()->create();

    $this->post("/produtos/{$product->id}/reservar", [])
        ->assertSessionHasErrors(['nome', 'telefone']);

    expect($product->fresh()->status)->toBe(ProductStatus::Disponivel);
    $this->assertDatabaseCount('reservations', 0);
});

it('does not allow reserving an already reserved product', function () {
    $product = Product::factory()->reservado()->create();

    $this->post("/produtos/{$product->id}/reservar", [
        'nome' => 'Alguém',
        'telefone' => '11888887777',
    ])->assertSessionHas('error');

    $this->assertDatabaseCount('reservations', 0);
});
