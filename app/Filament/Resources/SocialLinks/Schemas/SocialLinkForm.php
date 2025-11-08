<?php

namespace App\Filament\Resources\SocialLinks\Schemas;

use App\Enums\SocialLinkStatusEnum;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class SocialLinkForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('link')
                    ->url()
                    ->suffixIcon(Heroicon::GlobeAlt)
                    ->required()
                    ->columnSpanFull(),
                Group::make()
                    ->schema([
                        TextInput::make('icon')
                            ->required(),
                        TextInput::make('class')
                            ->required(),
                        ColorPicker::make('color')
                            ->required(),
                    ])
                    ->columns(3)
                    ->columnSpanFull(),
                Select::make('status')
                    ->options(SocialLinkStatusEnum::class)
                    ->default(SocialLinkStatusEnum::ACTIVE)
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}
