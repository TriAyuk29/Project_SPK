<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Matriks;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\MatriksResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\MatriksResource\RelationManagers;

class MatriksResource extends Resource
{
    protected static ?string $model = Matriks::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationLabel = 'Matriks';

    public static function getEloquentQuery(): Builder
    {
        $pegawai_id = auth()->user()->data_pegawai_id;

        return static::getModel()::query()->where('pegawai_id', $pegawai_id);
    }

    public static function form(Form $form): Form
    {
        $pegawai_id = auth()->user()->data_pegawai_id;
        return $form
            ->schema([
                Select::make('periode')
                    ->options([
                        '1' => '1',
                        '2' => '2',
                        '3' => '3',
                        '4' => '4',
                    ]),
                Select::make('tahun')
                    ->options([
                        '2023' => '2023',
                        '2024' => '2024',
                        '2025' => '2025',
                    ]),
                Select::make('index_capaian')
                    ->options([
                        '1' => '1',
                        '2' => '2',
                        '3' => '3',
                        '4' => '4',
                    ]),
                TextInput::make('indikator_kinerja'),

                Hidden::make('pegawai_id')->default($pegawai_id)
            ]);
    }

    public static function table(Table $table): Table
    {


        return $table
            ->columns([
                TextColumn::make('periode')->sortable()->searchable(),
                TextColumn::make('tahun')->sortable()->searchable(),
                TextColumn::make('index_capaian')->sortable()->searchable(),
                TextColumn::make('indikator_kinerja')->sortable()->searchable(),
            ])
            ->filters([

            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                // Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListMatriks::route('/'),
            'create' => Pages\CreateMatriks::route('/create'),
            'edit' => Pages\EditMatriks::route('/{record}/edit'),
        ];
    }
}