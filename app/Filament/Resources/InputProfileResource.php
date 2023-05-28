<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\DataPegawai;
use App\Models\InputProfile;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\InputProfileResource\Pages;
use App\Filament\Resources\InputProfileResource\RelationManagers;

class InputProfileResource extends Resource
{
    protected static ?string $model = InputProfile::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationLabel = 'Input Profile';

    public static function getEloquentQuery(): Builder
    {
        $pegawai_id = auth()->user()->data_pegawai_id;

        return static::getModel()::query()->where('id', $pegawai_id);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama'),
                TextInput::make('pangkat/golongan'),
                TextInput::make('unit_kerja'),
                TextInput::make('nama_pp'),
                TextInput::make('nama_app')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')->sortable()->searchable(),
                TextColumn::make('pangkat/golongan')->sortable()->searchable(),
                TextColumn::make('unit_kerja')->sortable()->searchable(),
                TextColumn::make('nama_pp')->sortable()->searchable(),
                TextColumn::make('nama_app')->sortable()->searchable()
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListInputProfile::route('/'),
            'create' => Pages\CreateInputProfile::route('/create'),
            'view' => Pages\ViewInputProfile::route('/{record}'),
            'edit' => Pages\EditInputProfile::route('/{record}/edit'),
        ];
    }
}