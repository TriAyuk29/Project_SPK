<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use App\Models\SasaranKinerja;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\DeleteBulkAction;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\SasaranKinerjaResource\Pages;
use App\Filament\Resources\SasaranKinerjaResource\RelationManagers;
use App\Filament\Resources\SasaranKinerjaResource\Pages\EditSasaranKinerja;
use App\Filament\Resources\SasaranKinerjaResource\Pages\ListSasaranKinerja;
use App\Filament\Resources\SasaranKinerjaResource\Pages\CreateSasaranKinerja;

class SasaranKinerjaResource extends Resource
{
    protected static ?string $model = SasaranKinerja::class;

    // protected static bool $shouldRegisterNavigation = false;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationLabel = 'Sasaran Kinerja';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    TextInput::make('sasaran_kinerja'),
                    // TextInput::make('jabatan'),
                    TextInput::make('matriks_id'),
                    TextInput::make('indikator_keberhasilan'),
                    Select::make('jabatan')
                        ->options([
                            'direktur' => 'Direktur',
                            'wadir1' => 'Wakil Direktur 1',
                            'wadir2' => 'Wakil Direktur 2',
                            'wadir3' => 'Wakil Direktur 3',
                            'kajur' => 'Ketua Jurusan',
                            'p3m' => 'P3M',
                            'p2m' => 'P2M',
                            'p3m/p4mp' => 'P3M / P4MP',
                            'uptperpus' => 'UPT Perpustakaan',
                        ])
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('sasaran_kinerja')->sortable()->searchable(),
                TextColumn::make('jabatan')->sortable()->searchable(),
                TextColumn::make('matriks.id')->sortable()->searchable(),
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
            'index' => Pages\ListSasaranKinerja::route('/'),
            'create' => Pages\CreateSasaranKinerja::route('/create'),
            'edit' => Pages\EditSasaranKinerja::route('/{record}/edit'),
        ];
    }
}