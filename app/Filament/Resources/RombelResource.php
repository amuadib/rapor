<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RombelResource\Pages;
use App\Filament\Resources\RombelResource\RelationManagers;
use App\Models\AnggotaRombel;
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
                Select::make('ustadz_id')
                    ->relationship(
                        name: 'ustadz',
                        titleAttribute: 'nama'
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
                        Combobox::make('anggota')
                            ->boxSearchs()
                            ->options(
                                Santri::orderBy('nama')
                                    ->pluck('nama', 'id')
                            )
                    ])
                    ->action(function (Rombel $record, $data) {
                        $i = [];
                        foreach ($data['anggota'] as $s) {
                            $i[] = [
                                'rombel_id' => $record->id,
                                'santri_id' => $s,
                                'created_at' => date('Y-m-d H:i:s'),
                                'updated_at' => date('Y-m-d H:i:s'),
                            ];
                        }
                        if (count($i)) {
                            AnggotaRombel::insert($i);
                        }
                    }),
                Tables\Actions\Action::make('pelajaran')
                    ->icon('heroicon-o-clipboard-document-list')
                    ->url(fn(Rombel $record): string => route('filament.admin.resources.rombels.pelajaran', $record)),
                Tables\Actions\Action::make('nilai')
                    ->icon('heroicon-o-star')
                    ->url(fn(Rombel $record): string => route('filament.admin.resources.rombels.nilai', $record)),
                Tables\Actions\Action::make('rekap')
                    ->color('info')
                    ->icon('heroicon-o-presentation-chart-line')
                    ->url(fn(Rombel $record): string => route('filament.admin.resources.rombels.rekap', $record)),
                Tables\Actions\EditAction::make()
                    ->color('warning'),
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
            'pelajaran' => Pages\Pelajaran::route('/{record}/pelajaran'),
            'nilai' => Pages\Nilai::route('/{record}/nilai'),
            'rekap' => Pages\Rekap::route('/{record}/rekap'),
        ];
    }
}
