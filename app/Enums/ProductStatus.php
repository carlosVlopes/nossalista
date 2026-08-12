<?php

namespace App\Enums;

enum ProductStatus: string
{
    case Disponivel = 'disponivel';
    case Reservado = 'reservado';
    case Oculto = 'oculto';

    public function label(): string
    {
        return match ($this) {
            self::Disponivel => 'Disponível',
            self::Reservado => 'Reservado',
            self::Oculto => 'Oculto',
        };
    }

    /**
     * @return array<string, string>
     */
    public static function options(): array
    {
        $options = [];

        foreach (self::cases() as $case) {
            $options[$case->value] = $case->label();
        }

        return $options;
    }
}
