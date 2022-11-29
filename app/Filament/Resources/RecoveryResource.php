<?php

    namespace App\Filament\Resources;

    use App\Filament\Resources\RecoveryResource\Pages;
    use App\Models\Account;
    use App\Models\Recovery;
    use Filament\Forms;
    use Filament\Forms\Components\Select;
    use Filament\Forms\Components\TextInput;
    use Filament\Resources\Form;
    use Filament\Resources\Resource;
    use Filament\Resources\Table;
    use Filament\Tables;
    use Filament\Tables\Actions\Action;
    use Filament\Tables\Actions\DeleteBulkAction;
    use Filament\Tables\Actions\EditAction;
    use Filament\Tables\Columns\TextColumn;
    use Filament\Tables\Filters\Filter;
    use Filament\Tables\Filters\Layout;
    use Filament\Tables\Filters\SelectFilter;
    use Illuminate\Database\Eloquent\Builder;
    use Illuminate\Database\Eloquent\Model;

    class RecoveryResource extends Resource {

        protected static ?string $model = Recovery::class;

        protected static ?string $navigationIcon = 'heroicon-o-cash';
        protected static ?string $navigationGroup = 'Finance Management';

        public static function form(Form $form): Form
        {
            return $form->schema([
                                     TextInput::make('batch_students_id'),
                                     TextInput::make('amount'),
                                     Forms\Components\DatePicker::make('due_date'),
                                     Forms\Components\Toggle::make('is_paid')->required(),
                                     Forms\Components\DatePicker::make('paid_on'),
                                     TextInput::make('account_id'),
                                     Forms\Components\Textarea::make('tx_id')->maxLength(65535),
                                 ]);
        }

        public static function table(Table $table): Table
        {
            return $table->columns([

                                       TextColumn::make('batch_student.student.name')->searchable(),
                                       TextColumn::make('batch_student.batch.title'),
                                       TextColumn::make('amount'),
                                       TextColumn::make('due_date')->date()->sortable(),
                                       Tables\Columns\IconColumn::make('is_paid')
                                           ->options([
                                                         'heroicon-o-x-circle'=>0,
                                                         'heroicon-o-check-circle' => 1,
                                                     ])
                                           ->colors([
                                                        'danger'=>0,
                                                        'success' => 1,
                                                    ]),
                                       TextColumn::make('paid_on')->date()->sortable(),
                                       TextColumn::make('account.title')
                                           ->toggleable()
                                           ->toggledHiddenByDefault(),
                                       TextColumn::make('tx_id')
                                           ->label('Transaction/Slip Number')
                                           ->toggleable()
                                           ->toggledHiddenByDefault(),
                                       TextColumn::make('created_at')
                                           ->label('Recovery Generated On')
                                           ->toggledHiddenByDefault()
                                           ->toggleable()
                                           ->dateTime(),
                                   ])
                ->filters([

                    Filter::make('due_date')
                        ->form([
                                   Forms\Components\DatePicker::make('due_from'),
                                   Forms\Components\DatePicker::make('due_until'),
                               ])
                        ->query(function (Builder $query, array $data): Builder {
                            return $query
                                ->when(
                                    $data['due_from'],
                                    fn (Builder $query, $date): Builder => $query->whereDate('due_date', '>=', $date),
                                )
                                ->when(
                                    $data['due_until'],
                                    fn (Builder $query, $date): Builder => $query->whereDate('due_date', '<=', $date),
                                );
                        }),
                    Filter::make('paid_on')
                        ->form([
                                   Forms\Components\DatePicker::make('paid_from'),
                                   Forms\Components\DatePicker::make('paid_until'),
                               ])
                        ->query(function (Builder $query, array $data): Builder {
                            return $query
                                ->when(
                                    $data['paid_from'],
                                    fn (Builder $query, $date): Builder => $query->whereDate('paid_on', '>=', $date),
                                )
                                ->when(
                                    $data['paid_until'],
                                    fn (Builder $query, $date): Builder => $query->whereDate('paid_on', '<=', $date),
                                );
                        }),
                    SelectFilter::make('is_paid')
                        ->label('Paid Status')
                        ->options([
                                      '0'=>'Not Paid',
                                      '1'=>'Paid',
                                  ]),
                    SelectFilter::make('account_id')
                        ->label('Receiving Account')
                        ->options(Account::query()->pluck('title','id'))
               ], Layout::AboveContent)
                ->actions([
                   EditAction::make(),
                   Action::make('Pay Recovery')
                       ->mountUsing(fn (Forms\ComponentContainer $form, Recovery $record) => $form
                           ->fill([
                             'amount' => $record->amount,
                            ]))
                       ->form([
                           Forms\Components\Grid::make(2)
                      ->schema([
                           TextInput::make('amount')
                           ->disabled(),
                           TextInput::make('tx_id')
                               ->label('Transaction/Slip Number')
                               ->placeholder('Transaction or Slip Number')
                               ->required(),
                           Select::make('account_id')
                               ->label('Received As')
                               ->options(Account::query()->pluck('title','id')),
//                                  Select::make('authorId')
//                                      ->label('Author')
//                                      ->options(User::query()->pluck('name', 'id'))
//                                      ->required(),
                              ])
                         ])
                       ->action(function (Recovery $record, array $data): void {
                           $record->amount = $data['amount'];
                           $record->tx_id = $data['tx_id'];
                           $record->paid_on = now();
                           $record->is_paid = 1;
                           $record->account_id = $data['account_id'];
                           $record->save();
                       })
//                   Action::make('View Invoice')
//                       ->url(fn(Recovery $record) => route('recoveries.show', $record->id))
//                       ->openUrlInNewTab(),
                       ])
                ->bulkActions([
                   DeleteBulkAction::make(),
                   ]);
        }

        public static function canView(Model $record): bool
        {
            return false; // TODO: Change the autogenerated stub
        }

        public static function canEdit(Model $record): bool
        {
            return false; // TODO: Change the autogenerated stub
        }

        public static function getRelations(): array
        {
            return [//
            ];
        }


        public static function getPages(): array
        {
            return [
                'index'  => Pages\ListRecoveries::route('/'),
                'create' => Pages\CreateRecovery::route('/create'),
                'edit'   => Pages\EditRecovery::route('/{record}/edit'),
            ];
        }
    }
