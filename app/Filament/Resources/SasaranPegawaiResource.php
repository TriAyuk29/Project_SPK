<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use App\Models\SasaranPegawai;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\DeleteBulkAction;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\SasaranPegawaiResource\Pages;
use App\Filament\Resources\SasaranPegawaiResource\RelationManagers;
use App\Filament\Resources\SasaranPegawaiResource\Pages\EditSasaranPegawai;
use App\Filament\Resources\SasaranPegawaiResource\Pages\ListSasaranPegawai;
use App\Filament\Resources\SasaranPegawaiResource\Pages\CreateSasaranPegawai;


class SasaranPegawaiResource extends Resource
{
    protected static ?string $model = SasaranPegawai::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationLabel = 'Sasaran Pegawai';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    TextInput::make('indikator_keberhasilan'),
                    Select::make('matriks_id')
                        ->relationship(
                            'matriks',
                            'id',
                            fn(Builder $query) => $query->where('pegawai_id', auth()->user()->data_pegawai_id)
                        )
                        ->getOptionLabelFromRecordUsing(fn(Model $record) => "Periode {$record->periode} - Tahun {$record->tahun}")
                        ->preload(),
                    Select::make('sasaran_id')
                        ->relationship('sasaran', 'sasaran_kinerja')
                        ->getOptionLabelFromRecordUsing(fn(Model $record) => "{$record->sasaran_kinerja} - {$record->jabatan}")
                        ->preload()

                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('matriks')
                    ->getStateUsing(function (Model $record) {
                        // return whatever you need to show
                        return "Periode {$record->matriks->periode} - Tahun {$record->matriks->tahun}";
                    })
                    ->sortable()->searchable(),
                TextColumn::make('sasaran.sasaran_kinerja')->sortable()->searchable(),
                TextColumn::make('sasaran.jabatan')->label('Jabatan')->sortable()->searchable(),
                TextColumn::make('indikator_keberhasilan')

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
            'index' => Pages\ListSasaranPegawais::route('/'),
            'create' => Pages\CreateSasaranPegawai::route('/create'),
            'edit' => Pages\EditSasaranPegawai::route('/{record}/edit'),
        ];
    }
}