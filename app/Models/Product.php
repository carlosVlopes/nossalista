<?php

namespace App\Models;

use App\Enums\ProductStatus;
use Database\Factories\ProductFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    /** @use HasFactory<ProductFactory> */
    use HasFactory;

    protected $fillable = [
        'categoria',
        'nome',
        'descricao',
        'imagem',
        'link',
        'status',
        'ordem',
    ];

    protected function casts(): array
    {
        return [
            'status' => ProductStatus::class,
        ];
    }

    /**
     * @return HasMany<Reservation, $this>
     */
    public function reservations(): HasMany
    {
        return $this->hasMany(Reservation::class);
    }

    public function reservaAtual(): ?Reservation
    {
        return $this->reservations()->latest()->first();
    }

    public function isDisponivel(): bool
    {
        return $this->status === ProductStatus::Disponivel;
    }

    public function imagemUrl(): ?string
    {
        return $this->imagem ? Storage::url($this->imagem) : null;
    }

    /**
     * Products that should appear on the public site (not hidden).
     *
     * @param  Builder<Product>  $query
     */
    public function scopeVisivel(Builder $query): void
    {
        $query->where('status', '!=', ProductStatus::Oculto->value);
    }

    /**
     * @param  Builder<Product>  $query
     */
    public function scopeDisponivel(Builder $query): void
    {
        $query->where('status', ProductStatus::Disponivel->value);
    }
}
