<?php

use App\Models\Product;

it('shows visible products and hides hidden ones', function () {
    $visible = Product::factory()->create(['nome' => 'Panela linda']);
    $reserved = Product::factory()->reservado()->create(['nome' => 'Taças reservadas']);
    $hidden = Product::factory()->oculto()->create(['nome' => 'Rascunho secreto']);

    $response = $this->get('/');

    $response->assertOk()
        ->assertSee('Panela linda')
        ->assertSee('Taças reservadas')
        ->assertDontSee('Rascunho secreto');
});

it('counts only available products', function () {
    Product::factory()->count(3)->create();
    Product::factory()->reservado()->create();

    $this->get('/')->assertOk()->assertSee('3 de 4');
});
