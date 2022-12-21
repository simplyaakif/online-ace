<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BatchStudentResource\Pages;
use App\Filament\Resources\BatchStudentResource\RelationManagers;
use App\Models\BatchStudent;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BatchStudentResource extends Resource
{
    protected static ?string $model = BatchStudent::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationLabel = 'Admissions';

    protected static ?string $navigationGroup = 'Admission Management';

    protected static ?string $modelLabel = 'Admission';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('batch_id')
                ->relationship('batch','title')->searchable(),
                Forms\Components\Select::make('student_id')
                ->relationship('student','name')->searchable(),
                Forms\Components\DatePicker::make('start_date')->minDate(now()->toDateString()),
                Forms\Components\DatePicker::make('end_date'),
                Forms\Components\Toggle::make('is_frozen'),
                Forms\Components\Select::make('status')
                ->options(BatchStudent::STATUS),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('batch.title'),
                Tables\Columns\TextColumn::make('student.name'),
                Tables\Columns\TextColumn::make('start_date')
                    ->date(),
                Tables\Columns\TextColumn::make('end_date')
                    ->date(),
                Tables\Columns\BooleanColumn::make('is_frozen'),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
//                Action::make('Edit Recoveries')
//                    ->mountUsing(fn (Forms\ComponentContainer $form, BatchStudent $record) => $form->fill([
//                              'authorId' => $record->author->id,
//                        ]))
//                    ->action(function (User $record, array $data): void {
//                        $record->author()->associate($data['authorId']);
//                        $record->save();
//                    })
//                    ->form([
//                               Forms\Components\Select::make('authorId')
//                                   ->label('Author')
//                                   ->options(User::query()->pluck('name', 'id'))
//                                   ->required(),
//                           ])
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\RecoveriesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBatchStudents::route('/'),
            'create' => Pages\CreateBatchStudent::route('/create'),
            'edit' => Pages\EditBatchStudent::route('/{record}/edit'),
        ];
    }
}
