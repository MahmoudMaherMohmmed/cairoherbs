<?php

namespace App\Filament\Resources\Users\Schemas;

use App\Enums\UserStatusEnum;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required()
                    ->unique(fn($record) => $record),
                TextInput::make('phone')
                    ->tel()
                    ->default(null),
                TextInput::make('password')
                    ->password()
                    ->required()
                    ->columnSpanFull(),
                Select::make('status')
                    ->options(UserStatusEnum::class)
                    ->default(UserStatusEnum::ACTIVE)
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}
