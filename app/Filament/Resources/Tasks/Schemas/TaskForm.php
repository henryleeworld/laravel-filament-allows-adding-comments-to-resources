<?php

namespace App\Filament\Resources\Tasks\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class TaskForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label(__('Title'))
                    ->maxLength(255)
                    ->columnSpanFull()
                    ->required(),
                Textarea::make('description')
                    ->label(__('Description'))
                    ->columnSpanFull()
                    ->required(),
                Select::make('user_id')
                    ->label(__('User name'))
                    ->relationship('user', 'name')
                    ->searchable()
                    ->required(),
            ]);
    }
}
