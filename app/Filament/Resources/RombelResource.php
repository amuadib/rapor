<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RombelResource\Pages;
use App\Filament\Resources\RombelResource\RelationManagers;
use App\Models\Rombel;
use App\Models\Santri;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Novadaemon\FilamentCombobox\Combobox;

class RombelResource extends Resource
{
    protected static ?string $model = Rombel::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office';
    protected static ?string $navigationGroup = 'Master';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->required(),
                Select::make('tingkat_kelas')
                    ->options(array_combine(range(1, 12), range(1, 12)))
                    ->required(),
                Select::make('semester_id')
                    ->relationship(
                        name: 'semester',
                        titleAttribute: 'nama',
                        modifyQueryUsing: fn(Builder $query) => $query->orderBy('singkatan', 'ASC')
                    )
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama'),
                TextColumn::make('tingkat_kelas'),
                TextColumn::make('semester.nama'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\Action::make('anggota')
                    ->icon('heroicon-o-user-group')
                    ->form([
                        Combobox::make('santri')
                            ->boxSearchs()
                            ->options(
                                Santri::orderBy('nama')
                                    ->whereNotIn()
                                    ->pluck('nama', 'id')
                            )
                    ]),
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
            'index' => Pages\ListRombels::route('/'),
            'create' => Pages\CreateRombel::route('/create'),
            'view' => Pages\ViewRombel::route('/{record}'),
            'edit' => Pages\EditRombel::route('/{record}/edit'),
        ];
    }
}
