<?php

    namespace App\Filament\Resources;

    use App\Filament\Resources\UserResource\Pages;
    use App\Models\User;
    use Filament\Forms\Components\Checkbox;
    use Filament\Forms\Components\DatePicker;
    use Filament\Forms\Components\Placeholder;
    use Filament\Forms\Components\Select;
    use Filament\Forms\Components\TextInput;
    use Filament\Forms\Form;
    use Filament\Resources\Resource;
    use Filament\Tables\Table;
    use Filament\Tables\Columns\TextColumn;

    class UserResource extends Resource {

        protected static ?string $model = User::class;

        protected static ?string $slug = 'users';
        protected static ?string $navigationIcon = 'iconsax-lin-user';

        protected static ?string $recordTitleAttribute = 'name';
        protected static ?string $navigationGroup = 'User Management';

        public static function form(Form $form): Form
        {
            return $form->schema([
                                     TextInput::make('name')->required(),

                                     TextInput::make('email'),

                                     Checkbox::make('is_admin'),

                                     DatePicker::make('email_verified_at')->label('Email Verified Date'),

                                     TextInput::make('password')->required(),

                                     Placeholder::make('created_at')->label('Created Date')->content(fn(?User $record): string => $record?->created_at?->diffForHumans() ?? '-'),

                                     Placeholder::make('updated_at')->label('Last Modified Date')->content(fn(?User $record): string => $record?->updated_at?->diffForHumans() ?? '-'),
                                 ]);
        }

        public static function table(Table $table): Table
        {
            return $table->columns([
                                       TextColumn::make('name')->searchable()->sortable(),

                                       TextColumn::make('roll'),

                                       TextColumn::make('email')->searchable()->sortable(),

                                       TextColumn::make('roll'),

                                       TextColumn::make('email_verified_at')->label('Email Verified Date')->date(),
                                   ]);
        }

        public static function getPages(): array
        {
            return [
                'index'  => Pages\ListUsers::route('/'),
                'create' => Pages\CreateUser::route('/create'),
                'edit'   => Pages\EditUser::route('/{record}/edit'),
            ];
        }

        public static function getGloballySearchableAttributes(): array
        {
            return [
                'name',
                'email'
            ];
        }
    }
