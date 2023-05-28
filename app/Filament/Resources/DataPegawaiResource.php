<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DataPegawaiResource\Pages;
use App\Filament\Resources\DataPegawaiResource\RelationManagers;
use App\Models\DataPegawai;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use App\Filament\Resources\SasaranPegawaiResource\Pages\EditSasaranPegawai;
use App\Filament\Resources\SasaranPegawaiResource\Pages\ListSasaranPegawai;
use App\Filament\Resources\SasaranPegawaiResource\Pages\CreateSasaranPegawai;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Forms\Components\Card;
use Illuminate\Database\Eloquent\Model;
use Filament\Tables\Actions\EditAction;

class DataPegawaiResource extends Resource
{
    protected static ?string $model = DataPegawai::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationLabel = 'Data Pegawai';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama'),
                TextInput::make('nip'),
                TextInput::make('pangkat/golongan'),
                TextInput::make('jabatan'),
                TextInput::make('unit_kerja'),
                TextInput::make('nama_pp'),
                TextInput::make('nama_app'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')->sortable()->searchable(),
                TextColumn::make('nip')->sortable()->searchable(),
                TextColumn::make('pangkat/golongan')->sortable()->searchable(),
                TextColumn::make('unit_kerja')->sortable()->searchable(),
                TextColumn::make('nama_pp')->sortable()->searchable(),
                TextColumn::make('nama_app')->sortable()->searchable(),
                // TextColumn::make('pegawai_id')->sortable()->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
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
            'index' => Pages\ListDataPegawai::route('/'),
            'create' => Pages\CreateDataPegawai::route('/create'),
            'edit' => Pages\EditDataPegawai::route('/{record}/edit'),
        ];
    }
}