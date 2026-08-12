<?php

namespace Database\Seeders;

use App\Enums\ProductStatus;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $gifts = [
            ['categoria' => 'Cozinha & Mesa', 'nome' => 'Jogo de panelas de inox', 'descricao' => 'Para os primeiros jantares preparados a quatro mãos.'],
            ['categoria' => 'Cozinha & Mesa', 'nome' => 'Aparelho de jantar em porcelana', 'descricao' => 'Doze peças brancas com friso dourado, para as ocasiões especiais.'],
            ['categoria' => 'Cozinha & Mesa', 'nome' => 'Taças de cristal', 'descricao' => 'Um brinde à nossa vida nova sempre que houver o que celebrar.'],
            ['categoria' => 'Cozinha & Mesa', 'nome' => 'Cafeteira italiana', 'descricao' => 'Os cafés preguiçosos de domingo pedem uma boa moka.'],
            ['categoria' => 'Cozinha & Mesa', 'nome' => 'Jogo de facas do chef', 'descricao' => 'Bloco de madeira com as lâminas essenciais para cozinhar juntos.'],
            ['categoria' => 'Quarto & Aconchego', 'nome' => 'Jogo de cama de algodão egípcio', 'descricao' => '400 fios, na cor palha — o refúgio das nossas manhãs.'],
            ['categoria' => 'Quarto & Aconchego', 'nome' => 'Edredom de plumas', 'descricao' => 'Leve e quentinho, para os invernos abraçados.'],
            ['categoria' => 'Quarto & Aconchego', 'nome' => 'Manta de tricô', 'descricao' => 'Aquele aconchego extra jogado no pé da cama.'],
            ['categoria' => 'Quarto & Aconchego', 'nome' => 'Kit de travesseiros', 'descricao' => 'Um par macio para noites de sono tranquilo.'],
            ['categoria' => 'Sala & Casa', 'nome' => 'Manta para o sofá', 'descricao' => 'Para as noites de filme enroscados no sofá.'],
            ['categoria' => 'Sala & Casa', 'nome' => 'Vasos de cerâmica artesanal', 'descricao' => 'Trio de vasos terrosos para dar vida aos cantos da sala.'],
            ['categoria' => 'Sala & Casa', 'nome' => 'Luminária de piso', 'descricao' => 'Uma luz âmbar e baixa para as conversas até tarde.'],
            ['categoria' => 'Sala & Casa', 'nome' => 'Molduras para nossas fotos', 'descricao' => 'Onde vamos pendurar as memórias que estão por vir.'],
            ['categoria' => 'Banho & Bem-estar', 'nome' => 'Jogo de toalhas felpudas', 'descricao' => 'Toalhas gordas e macias, na paleta da casa.'],
            ['categoria' => 'Banho & Bem-estar', 'nome' => 'Par de roupões', 'descricao' => 'Dois roupões para os fins de tarde sem pressa.'],
            ['categoria' => 'Banho & Bem-estar', 'nome' => 'Difusor de aromas', 'descricao' => 'O cheirinho de casa nova que queremos guardar.'],
            ['categoria' => 'Nossa Lua de Mel', 'nome' => 'Cota · Jantar romântico', 'descricao' => 'Ajude a pagar um jantar à luz de velas na nossa viagem.'],
            ['categoria' => 'Nossa Lua de Mel', 'nome' => 'Cota · Passeio ao entardecer', 'descricao' => 'Um passeio de barco vendo o sol se pôr, por nossa conta e a sua.'],
        ];

        foreach ($gifts as $ordem => $gift) {
            Product::create([
                ...$gift,
                'status' => ProductStatus::Disponivel,
                'ordem' => $ordem + 1,
            ]);
        }
    }
}
