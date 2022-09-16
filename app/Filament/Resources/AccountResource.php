<?php

    namespace App\Filament\Resources;

    use App\Filament\Resources\AccountResource\Pages;
    use App\Models\Account;
    use Filament\Forms\Components\Placeholder;
    use Filament\Forms\Components\Select;
    use Filament\Forms\Components\TextInput;
    use Filament\Resources\Form;
    use Filament\Resources\Resource;
    use Filament\Resources\Table;
    use Filament\Tables\Columns\TextColumn;

    class AccountResource extends Resource {

        protected static ?string $model = Account::class;

        protected static ?string $slug = 'accounts';

        protected static ?string $recordTitleAttribute = 'title';
        protected static ?string $navigationGroup = 'Finance Management';


        public static function form(Form $form): Form
        {
            return $form->schema([
                                     TextInput::make('bank')->required(),
                                     TextInput::make('title'),
                                     TextInput::make('account_number'),

                                     Select::make('type')
                                        ->options([
                                            'Bank','Wallet','Cash'
                                                  ]),

                                     Placeholder::make('created_at')->label('Created Date')->content(fn(?Account $record): string => $record?->created_at?->diffForHumans() ?? '-'),

                                     Placeholder::make('updated_at')->label('Last Modified Date')->content(fn(?Account $record): string => $record?->updated_at?->diffForHumans() ?? '-'),
                                 ]);
        }

        public static function table(Table $table): Table
        {
            return $table->columns([
                                       TextColumn::make('bank')->searchable()->sortable(),
                                       TextColumn::make('title')->searchable()->sortable(),

                                       TextColumn::make('account_number'),

                                       TextColumn::make('type'),
                                   ]);
        }

        public static function getPages(): array
        {
            return [
                'index'  => Pages\ListAccounts::route('/'),
                'create' => Pages\CreateAccount::route('/create'),
                'edit'   => Pages\EditAccount::route('/{record}/edit'),
            ];
        }

        public static function getGloballySearchableAttributes(): array
        {
            return ['title'];
        }
    }
