<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HistoryResource\Pages;
use App\Filament\Resources\HistoryResource\RelationManagers;
use App\Models\History;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HistoryResource extends Resource
{
    protected static ?string $model = History::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('user_id')
                    ->label("Select User")
                    ->required()
                    ->relationship('user','name')
                    ->required()->default(auth()->id()),
                Select::make('category_id')
                    ->label("Select Category")
                    ->required()
                    ->relationship('category','title')
                    ->required(),

                TextInput::make('title')->required()
                    ->maxLength(255),
                TextInput::make('amount')->required()->numeric(),
                Select::make('type')->required()
                    ->options([
                        'Incoming' => 'Incoming',
                        'Outgoing' => 'Outgoing',
                    ]),
                DatePicker::make('date'),
                Textarea::make('note')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')->sortable()->searchable(),
                TextColumn::make('category.title')->sortable()->searchable(),
                TextColumn::make('title')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('amount')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('type')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('created_at')->sortable()->searchable()
                    ->dateTime(),

            ])
            ->filters([
                SelectFilter::make('user')->relationship('user', 'name')->default(auth()->id()),
                SelectFilter::make('category')->relationship('category', 'title'),
                SelectFilter::make('type')->options([
                    'Incoming'=>'Incoming',
                    'Outgoing'=>'Outgoing',
                ]),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListHistories::route('/'),
            'create' => Pages\CreateHistory::route('/create'),
            'edit' => Pages\EditHistory::route('/{record}/edit'),
        ];
    }
}
