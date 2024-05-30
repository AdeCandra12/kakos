<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KosanResource\Pages;
use App\Models\Kosan;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KosanResource extends Resource
{
    protected static ?string $model = Kosan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Kosan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        Forms\Components\TextInput::make('nama')
                            ->label('Nama')
                            ->required(),
                        Forms\Components\TextInput::make('alamat')
                            ->label('Alamat')
                            ->required(),
                        Forms\Components\Select::make('gender')
                            ->label('gender')
                            ->options([
                                'L' => 'Laki-laki',
                                'P' => 'Perempuan',
                                'L/P' => 'Laki-laki/Perempuan',
                            ])
                            ->required(),
                        Forms\Components\Textarea::make('fasilitas')
                            ->label('Fasilitas')
                            ->required(),
                        Forms\Components\TextInput::make('jmlh_kamar')
                            ->label('Jumlah Kamar')
                            ->required(),
                        Forms\Components\Select::make('status')
                            ->label('Status')
                            ->options([
                                'Tersedia' => 'Tersedia',
                                'Tidak Tersedia' => 'Tidak Tersedia',
                            ])
                            ->required(),
                        Forms\Components\TextInput::make('harga')
                            ->label('Harga')
                            ->required(),
                        Forms\Components\TextInput::make('latitude')
                            ->label('Latitude')
                            ->required(),
                        Forms\Components\TextInput::make('longitude')
                            ->label('Longitude')
                            ->required(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')
                    ->label('Nama'),
                TextColumn::make('alamat')
                    ->label('Alamat'),
                TextColumn::make('gender')
                    ->label('gender'),
                TextColumn::make('fasilitas')
                    ->label('Fasilitas'),
                TextColumn::make('jmlh_kamar')
                    ->label('Jumlah Kamar'),
                TextColumn::make('status')
                    ->label('Status'),
                TextColumn::make('harga')
                    ->label('Harga'),
                TextColumn::make('latitude')
                    ->label('Latitude'),
                TextColumn::make('longitude')
                    ->label('Longitude'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageKosans::route('/'),
        ];
    }
}
