<?php

    namespace App\Filament\Resources\BatchStudentResource\RelationManagers;

    use App\Models\Recovery;
    use Filament\Forms;
    use Filament\Forms\Form;
    use Filament\Resources\RelationManagers\RelationManager;
    use Filament\Tables\Table;
    use Filament\Tables;
    use Filament\Tables\Columns\IconColumn;
    use Illuminate\Database\Eloquent\Builder;
    use Illuminate\Database\Eloquent\SoftDeletingScope;

    class RecoveriesRelationManager extends RelationManager {

        protected static string $relationship = 'recoveries';

        protected static ?string $recordTitleAttribute = 'amount';

        public function form(Form $form): Form
        {
            return $form->schema([
                                     Forms\Components\TextInput::make('amount')->required()->numeric(),
                                     Forms\Components\DatePicker::make('due_date'),

                                 ]);
        }

        public  function table(Table $table): Table
        {
            return $table->columns([
                                       Tables\Columns\TextColumn::make('amount'),
                                       Tables\Columns\TextColumn::make('due_date')->date('d-m-Y'),
                                       IconColumn::make('is_paid')->options([
                                                                                'heroicon-o-x-circle'     => 0,
                                                                                'heroicon-o-check-circle' => 1,
                                                                            ])->colors([
                                                                                           'danger'  => 0,
                                                                                           'success' => 1,
                                                                                       ]),
                                       Tables\Columns\TextColumn::make('paid_on'),
                                       Tables\Columns\TextColumn::make('account.title')->label('Paid In'),
                                       Tables\Columns\TextColumn::make('tx_id')->label('Transaction/Slip #'),
                                   ])->filters([//
                                               ])->headerActions([
                                                                     Tables\Actions\CreateAction::make(),
                                                                 ])->actions([
                                                                                 Tables\Actions\EditAction::make()->visible(fn(Recovery $record): bool => !$record->is_paid),
                                                                                 Tables\Actions\DeleteAction::make()->visible(fn(Recovery $record): bool => !$record->is_paid),
                                                                             ])->bulkActions([
                                                                                                 Tables\Actions\DeleteBulkAction::make(),
                                                                                             ]);
        }
    }
