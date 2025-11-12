<?php

namespace App\Filament\Resources\Sections\Schemas;

use App\Enums\SectionStatusEnum;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Pixelpeter\FilamentLanguageTabs\Forms\Components\LanguageTabs;

class SectionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                LanguageTabs::make([
                    TextInput::make('title')
                        ->required()
                        ->columnSpanFull(),
                    RichEditor::make('description')
                        ->required()
                        ->columnSpanFull()
                ])->columnSpanFull(),
                FileUpload::make('image')
                    ->image()
                    ->required()
                    ->columnSpanFull(),
                Select::make('status')
                    ->options(SectionStatusEnum::class)
                    ->default(SectionStatusEnum::ACTIVE)
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}
