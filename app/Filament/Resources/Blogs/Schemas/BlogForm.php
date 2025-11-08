<?php

namespace App\Filament\Resources\Blogs\Schemas;

use App\Enums\BlogStatusEnum;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Pixelpeter\FilamentLanguageTabs\Forms\Components\LanguageTabs;

class BlogForm
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
                    ->options(BlogStatusEnum::class)
                    ->default(BlogStatusEnum::ACTIVE)
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}
