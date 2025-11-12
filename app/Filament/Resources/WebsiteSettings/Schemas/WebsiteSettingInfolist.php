<?php

namespace App\Filament\Resources\WebsiteSettings\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class WebsiteSettingInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('title')
                    ->columnSpanFull(),
                TextEntry::make('description')
                    ->html()
                    ->columnSpanFull(),
                TextEntry::make('address')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('sales_email')
                    ->placeholder('-'),
                TextEntry::make('support_email')
                    ->placeholder('-'),
                TextEntry::make('sales_phone')
                    ->placeholder('-'),
                TextEntry::make('support_phone')
                    ->placeholder('-'),
                ImageEntry::make('image')
                    ->columnSpanFull(),
                TextEntry::make('status')
                    ->badge()
                    ->columnSpanFull(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
