<?php

namespace App\Filament\Resources\SocialLinks\Schemas;

use App\Models\SocialLink;
use Filament\Infolists\Components\ColorEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class SocialLinkInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('title'),
                TextEntry::make('link')
                    ->columnSpanFull(),
                TextEntry::make('icon'),
                TextEntry::make('class'),
                ColorEntry::make('color')
                    ->copyable()
                    ->copyMessage('Copied!')
                    ->copyMessageDuration(1500),
                TextEntry::make('status')
                    ->badge(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('deleted_at')
                    ->dateTime()
                    ->visible(fn(SocialLink $record): bool => $record->trashed()),
            ]);
    }
}
