<?php

namespace App\Filament\Resources\Contacts\Pages;

use App\Filament\Resources\Contacts\ContactResource;
use App\Models\Contact;
use Filament\Resources\Pages\ManageRecords;

class ManageContacts extends ManageRecords
{
    protected static string $resource = ContactResource::class;

    public function mount(): void
    {
        parent::mount();

        // Mark unread contacts as read
        Contact::whereNull('read_at')->update([
            'read_at' => now(),
        ]);
    }

    protected function getHeaderActions(): array
    {
        return [
            // CreateAction::make(),
        ];
    }
}
