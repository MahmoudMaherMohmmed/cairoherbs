<?php

namespace App\Filament\Resources\WebsiteSettings\Schemas;

use App\Enums\WebsiteSettingStatusEnum;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Pixelpeter\FilamentLanguageTabs\Forms\Components\LanguageTabs;

class WebsiteSettingForm
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
                        ->columnSpanFull(),
                    Textarea::make('address')
                        ->default(null)
                        ->columnSpanFull(),
                ])->columnSpanFull(),
                TextInput::make('sales_email')
                    ->email()
                    ->suffixIcon(Heroicon::Envelope)
                    ->default(null),
                TextInput::make('support_email')
                    ->email()
                    ->suffixIcon(Heroicon::Envelope)
                    ->default(null),
                TextInput::make('sales_phone')
                    ->tel()
                    ->suffixIcon(Heroicon::Phone)
                    ->default(null),
                TextInput::make('support_phone')
                    ->tel()
                    ->suffixIcon(Heroicon::Phone)
                    ->default(null),
                FileUpload::make('image')
                    ->image()
                    ->required()
                    ->columnSpanFull(),
                Select::make('status')
                    ->options(WebsiteSettingStatusEnum::class)
                    ->default(WebsiteSettingStatusEnum::ACTIVE)
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}
