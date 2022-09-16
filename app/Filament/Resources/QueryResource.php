<?php

    namespace App\Filament\Resources;

    use App\Filament\Resources\QueryResource\Pages;
    use App\Models\Query;
    use Filament\Forms\Components\Placeholder;
    use Filament\Forms\Components\TextInput;
    use Filament\Resources\Form;
    use Filament\Resources\Resource;
    use Filament\Resources\Table;
    use Filament\Tables\Columns\TagsColumn;
    use Filament\Tables\Columns\TextColumn;

    class QueryResource extends Resource {

        protected static ?string $model = Query::class;

        protected static ?string $slug = 'queries';

        protected static ?string $recordTitleAttribute = 'name';

        public static function form(Form $form): Form
        {
            return $form->schema([
                                     TextInput::make('name')->required(),

                                     TextInput::make('mobile')->required(),

                                     TextInput::make('wapp'),

                                     TextInput::make('address'),

                                     TextInput::make('contact_type'),

                                     TextInput::make('p_timings'),

                                     TextInput::make('reference'),

                                     Placeholder::make('created_at')->label('Created Date')->content(fn(?Query $record): string => $record?->created_at?->diffForHumans() ?? '-'),

                                     Placeholder::make('updated_at')->label('Last Modified Date')->content(fn(?Query $record): string => $record?->updated_at?->diffForHumans() ?? '-'),
                                 ]);
        }

        public static function table(Table $table): Table
        {
            return $table->columns([
                                       TextColumn::make('name')->searchable()->sortable(),

                                       TextColumn::make('mobile'),

                                       TextColumn::make('wapp'),

                                       TextColumn::make('address'),

                                       TextColumn::make('contact_type'),

                                       TextColumn::make('p_timings'),

                                       TagsColumn::make('course_query')
                                       ->label('Courses'),

                                       TextColumn::make('reference'),
                                   ]);
        }

        public static function getPages(): array
        {
            return [
                'index'  => Pages\ListQueries::route('/'),
                'create' => Pages\CreateQuery::route('/create'),
                'edit'   => Pages\EditQuery::route('/{record}/edit'),
            ];
        }

        public static function getGloballySearchableAttributes(): array
        {
            return ['name'];
        }
    }
