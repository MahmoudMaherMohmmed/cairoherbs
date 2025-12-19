<?php

namespace App\Filament\Resources\Galleries\Schemas;

use App\Enums\GalleryStatusEnum;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Pixelpeter\FilamentLanguageTabs\Forms\Components\LanguageTabs;

class GalleryForm
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
                    ->directory('galleries')
                    ->image()
                    ->required()
                    ->columnSpanFull(),
                Select::make('status')
                    ->options(GalleryStatusEnum::class)
                    ->default(GalleryStatusEnum::ACTIVE)
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}
