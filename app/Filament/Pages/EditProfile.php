<?php

namespace App\Filament\Pages;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class EditProfile extends \Filament\Auth\Pages\EditProfile
{
    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                $this->getNameFormComponent(),
                $this->getEmailFormComponent(),
                TextInput::make('phone')
                    ->required()
                    ->label('Phone')
                    ->tel()
                    ->minLength(10)
                    ->maxLength(15)
                    ->prefixIcon('heroicon-o-phone')
                    ->placeholder('+60 1123 456789')
                    ->rules(['required', 'string', 'max:255']),
                $this->getPasswordFormComponent(),
                $this->getPasswordConfirmationFormComponent(),
                $this->getCurrentPasswordFormComponent(),
            ]);
    }
}
