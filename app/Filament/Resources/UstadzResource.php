<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UstadzResource\Pages;
use App\Filament\Resources\UstadzResource\RelationManagers;
use App\Models\Ustadz;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UstadzResource extends Resource
{
    protected static ?string $model = Ustadz::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Master';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('niy')
                    ->label('NIY'),
                Forms\Components\TextInput::make('nama')
                    ->required(),
                Forms\Components\TextInput::make('alamat'),
                Forms\Components\TextInput::make('jenis_kelamin')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('niy')
                    ->label('NIY'),
                Tables\Columns\TextColumn::make('nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('alamat')
                    ->searchable(),
                Tables\Columns\TextColumn::make('jenis_kelamin')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListUstadzs::route('/'),
            'create' => Pages\CreateUstadz::route('/create'),
            'view' => Pages\ViewUstadz::route('/{record}'),
            'edit' => Pages\EditUstadz::route('/{record}/edit'),
        ];
    }
}
