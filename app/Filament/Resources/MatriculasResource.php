<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MatriculasResource\Pages;
use App\Filament\Resources\MatriculasResource\RelationManagers;
use App\Models\Matriculas;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MatriculasResource extends Resource
{
    protected static ?string $model = Matriculas::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('estado')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nota')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('grupo_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('usuario_id')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('estado')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nota')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('grupo_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('usuario_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMatriculas::route('/'),
            'create' => Pages\CreateMatriculas::route('/create'),
            'edit' => Pages\EditMatriculas::route('/{record}/edit'),
        ];
    }
}
