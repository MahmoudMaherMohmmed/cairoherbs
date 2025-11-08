<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum CertificateStatusEnum: string implements HasLabel, HasColor, HasIcon
{
    case ACTIVE = 'ACTIVE';
    case IN_ACTIVE = 'IN_ACTIVE';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::ACTIVE => 'ACTIVE',
            self::IN_ACTIVE => 'IN_ACTIVE',
        };
    }

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::ACTIVE => 'success',
            self::IN_ACTIVE => 'danger',
        };
    }

    public function getIcon(): ?string
    {
        return match ($this) {
            self::ACTIVE => 'heroicon-m-check',
            self::IN_ACTIVE => 'heroicon-m-x-mark',
        };
    }
}
