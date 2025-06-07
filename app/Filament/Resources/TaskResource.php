<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TaskResource\Pages;
use App\Models\Task;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Kirschbaum\Commentions\Filament\Actions\CommentsTableAction;

class TaskResource extends Resource
{
    protected static ?string $model = Task::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label(__('Title'))
                    ->maxLength(255)
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('description')
                    ->label(__('Description'))
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Select::make('user_id')
                    ->label(__('User name'))
                    ->relationship('user', 'name')
                    ->searchable()
                    ->required(),
            ]);
    }

    public static function getModelLabel(): string
    {
        return __('task');
    }

    public static function getNavigationLabel(): string
    {
        return __('Task');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTasks::route('/'),
            'create' => Pages\CreateTask::route('/create'),
            'edit' => Pages\EditTask::route('/{record}/edit'),
        ];
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label(__('Title')),
                Tables\Columns\TextColumn::make('user.name')
                    ->label(__('User name'))
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                CommentsTableAction::make()
                    ->label(__('Comments'))
                    ->mentionables(User::all()),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
