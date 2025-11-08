<?php

namespace App\Filament\Resources\Certificates\Schemas;

use App\Enums\CertificateStatusEnum;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Pixelpeter\FilamentLanguageTabs\Forms\Components\LanguageTabs;

class CertificateForm
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
                        ->default(null)
                        ->columnSpanFull()
                ])->columnSpanFull(),
                FileUpload::make('image')
                    ->image()
                    ->required()
                    ->columnSpanFull(),
                Select::make('status')
                    ->options(CertificateStatusEnum::class)
                    ->default(CertificateStatusEnum::ACTIVE)
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}
