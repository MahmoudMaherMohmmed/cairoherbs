<?php

namespace App\Filament\Resources\Products\Schemas;

use App\Enums\ProductFeaturedEnum;
use App\Enums\ProductStatusEnum;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Pixelpeter\FilamentLanguageTabs\Forms\Components\LanguageTabs;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                LanguageTabs::make([
                    TextInput::make('title')
                        ->required()
                        ->columnSpanFull()
                ])->columnSpanFull(),
                TextInput::make('code')
                    ->required()
                    ->columnSpanFull(),
                LanguageTabs::make([
                    Textarea::make('description')
                        ->required()
                        ->columnSpanFull()
                ])->columnSpanFull(),
                Select::make('category_id')
                    ->relationship('category', 'id')
                    ->getOptionLabelFromRecordUsing(
                        fn($record) => $record->title[app()->getLocale()]
                    )
                    ->required()
                    ->columnSpanFull(),
                FileUpload::make('image')
                    ->directory('products')
                    ->image()
                    ->required()
                    ->columnSpanFull(),
                Select::make('featured')
                    ->options(ProductFeaturedEnum::class)
                    ->default(ProductFeaturedEnum::NO)
                    ->required()
                    ->columnSpanFull(),
                Select::make('status')
                    ->options(ProductStatusEnum::class)
                    ->default(ProductStatusEnum::ACTIVE)
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}
