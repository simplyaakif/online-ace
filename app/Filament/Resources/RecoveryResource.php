<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RecoveryResource\Pages;
use App\Filament\Resources\RecoveryResource\RelationManagers;
use App\Models\Recovery;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RecoveryResource extends Resource
{
    protected static ?string $model = Recovery::class;

    protected static ?string $navigationIcon = 'heroicon-o-cash';
    protected static ?string $navigationGroup = 'Finance Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('batch_students_id'),
                Forms\Components\TextInput::make('amount'),
                Forms\Components\DatePicker::make('due_date'),
                Forms\Components\Toggle::make('is_paid')
                    ->required(),
                Forms\Components\DatePicker::make('paid_on'),
                Forms\Components\TextInput::make('account_id'),
                Forms\Components\Textarea::make('tx_id')
                    ->maxLength(65535),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('batch_student.student.name'),
                TextColumn::make('batch_student.batch.title'),
                TextColumn::make('amount'),
                TextColumn::make('due_date')
                    ->date(),
                Tables\Columns\BooleanColumn::make('is_paid'),
                TextColumn::make('paid_on')
                    ->date(),
                TextColumn::make('account.title'),
                TextColumn::make('tx_id'),
                TextColumn::make('created_at')
                    ->dateTime(),
            ])
            ->filters([

            ])
            ->actions([
                Tables\Actions\EditAction::make(),
//                Tables\Actions\Action::make()
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
            'index' => Pages\ListRecoveries::route('/'),
            'create' => Pages\CreateRecovery::route('/create'),
            'edit' => Pages\EditRecovery::route('/{record}/edit'),
        ];
    }
}
