<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StudentResource\Pages;
use App\Models\Batch;
use App\Models\Student;
use Closure;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Wizard;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;

class StudentResource extends Resource
{
    protected static ?string $model = Student::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    protected static ?string $navigationGroup = 'Admission Management';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

             Wizard::make([
              Wizard\Step::make('Personal Information')
                  ->schema([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                TextInput::make('father_name')
                    ->maxLength(255),
                Select::make('gender')
                    ->options([
                        'male'=>'Male',
                        'female'=>'Female'
                              ]),
                DatePicker::make('date_of_birth'),
                SpatieMediaLibraryFileUpload::make('dp')
                    ->collection('dp')
                    ->maxSize(500)
                    ->image(),
                           ])->columns(2),
              Wizard\Step::make('Course Information')
                  ->schema([
                      Forms\Components\Repeater::make('batches')
                      ->schema([
                          Select::make('batch_id')
                              ->label('Batch')
                          ->options(Batch::pluck('title','id')),
                            DatePicker::make('start_date')->required(),
                            DatePicker::make('end_date')->required(),
                          TextInput::make('price'),
                          Forms\Components\Repeater::make('recoveries')
                          ->schema([
                              TextInput::make('amount')->numeric()->required(),
                              DatePicker::make('due_date')->required()
                                   ])->columnSpan(2)->columns(2)
                               ])->columns(2),
                           ]),
              Wizard\Step::make('Portal Account')
                  ->schema([
                        TextInput::make('email')->email(),
                      TextInput::make('password')->default('123456789'),
                                                 ])->columns(2),

              ])->columnSpan(2)
          ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
              Tables\Columns\SpatieMediaLibraryImageColumn::make('dp')
              ->collection('dp')
              ->rounded(),
                TextColumn::make('name')->searchable(),
                TextColumn::make('father_name'),
                TextColumn::make('gender'),
                TextColumn::make('date_of_birth')
                    ->date(),
                TextColumn::make('created_at')
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStudents::route('/'),
            'create' => Pages\CreateStudent::route('/create'),
            'edit' => Pages\EditStudent::route('/{record}/edit'),
        ];
    }
}
