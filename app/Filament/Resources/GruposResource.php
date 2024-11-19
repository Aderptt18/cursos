<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GruposResource\Pages;
use App\Filament\Resources\GruposResource\RelationManagers;
use App\Models\Grupos;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GruposResource extends Resource
{
    protected static ?string $model = Grupos::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nombre')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('descripcion')
                    ->columnSpanFull(),
                Forms\Components\DatePicker::make('fecha_incio')
                    ->required(),
                Forms\Components\DatePicker::make('fecha_final')
                    ->required(),
                Forms\Components\TextInput::make('salon')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('capacidad')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('curso_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('docente_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('periodo_academico_id')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombre')
                    ->searchable(),
                Tables\Columns\TextColumn::make('fecha_incio')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('fecha_final')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('salon')
                    ->searchable(),
                Tables\Columns\TextColumn::make('capacidad')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('curso_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('docente_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('periodo_academico_id')
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
            'index' => Pages\ListGrupos::route('/'),
            'create' => Pages\CreateGrupos::route('/create'),
            'edit' => Pages\EditGrupos::route('/{record}/edit'),
        ];
    }
}
