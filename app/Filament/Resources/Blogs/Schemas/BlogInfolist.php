<?php

namespace App\Filament\Resources\Blogs\Schemas;

use App\Models\Blog;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class BlogInfolist
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
                TextEntry::make('deleted_at')
                    ->dateTime()
                    ->visible(fn(Blog $record): bool => $record->trashed()),
            ]);
    }
}
