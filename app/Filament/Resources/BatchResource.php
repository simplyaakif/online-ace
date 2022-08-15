<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BatchResource\Pages;
use App\Filament\Resources\BatchResource\RelationManagers\CourseRelationManager;
use App\Models\Batch;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class BatchResource extends Resource
{
    protected static ?string $model = Batch::class;

    protected static ?string $navigationIcon = 'heroicon-o-bookmark';
    protected static ?string $navigationGroup = 'Academics';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('course_id')
                    ->relationship('course','title')
                    ->required(),
                Forms\Components\MultiSelect::make('employee_id')
                    ->relationship('teachers','name')
                    ->required(),
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->maxLength(65535),
                Forms\Components\TextInput::make('limit')->numeric(),
                Forms\Components\Repeater::make('batch_schedule')
                ->schema([
                    Forms\Components\Select::make('day')->required()
                    ->options([
                        'monday'=>'Monday',
                        'tuesday'=>'Tuesday',
                        'wednesday'=>'Wednesday',
                        'thursday'=>'Thursday',
                        'friday'=>'Friday',
                        'saturday'=>'Saturday',
                        'sunday'=>'Sunday',
                              ]),
                    Forms\Components\TimePicker::make('time')->required()->withoutSeconds(),
                         ])->columnSpan(2)->columns(2)->minItems(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                ->searchable(),
                Tables\Columns\TextColumn::make('course.title'),
                Tables\Columns\TextColumn::make('limit'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
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
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBatches::route('/'),
            'create' => Pages\CreateBatch::route('/create'),
            'edit' => Pages\EditBatch::route('/{record}/edit'),
        ];
    }
}
