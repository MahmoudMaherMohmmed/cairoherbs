<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum ProductFeaturedEnum: string implements HasLabel, HasColor, HasIcon
{
    case YES = 'YES';
    case NO = 'NO';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::YES => 'YES',
            self::NO => 'NO',
        };
    }

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::YES => 'primary',
            self::NO => 'secondary',
        };
    }

    public function getIcon(): ?string
    {
        return match ($this) {
            self::YES => 'heroicon-m-check',
            self::NO => 'heroicon-m-x-mark',
        };
    }
}
