<?php

namespace App\Filament\Resources\Categories\Schemas;

use App\Enums\CategoryStatusEnum;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Pixelpeter\FilamentLanguageTabs\Forms\Components\LanguageTabs;

class CategoryForm
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
                    ->directory('categories')
                    ->image()
                    ->default(null)
                    ->columnSpanFull(),
                Select::make('status')
                    ->options(CategoryStatusEnum::class)
                    ->default(CategoryStatusEnum::ACTIVE)
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}
