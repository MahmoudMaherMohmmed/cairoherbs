<?php

namespace App\Filament\Resources\Services\Schemas;

use App\Enums\ServiceStatusEnum;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Pixelpeter\FilamentLanguageTabs\Forms\Components\LanguageTabs;

class ServiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                LanguageTabs::make([
                    TextInput::make('title')
                        ->required()
                        ->columnSpanFull(),
                    Textarea::make('description')
                        ->required()
                        ->columnSpanFull()
                ])->columnSpanFull(),
                FileUpload::make('image')
                    ->image()
                    ->required()
                    ->columnSpanFull(),
                Select::make('status')
                    ->options(ServiceStatusEnum::class)
                    ->default(ServiceStatusEnum::ACTIVE)
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}
