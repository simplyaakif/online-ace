<?php

    namespace App\Filament\Resources;

    use App\Filament\Resources\InvoiceResource\Pages;
    use App\Models\Account;
    use App\Models\Invoice;
    use App\Models\Recovery;
    use Filament\Forms\Components\DatePicker;
    use Filament\Forms\Components\Placeholder;
    use Filament\Forms\Components\Select;
    use Filament\Forms\Components\TextInput;
    use Filament\Resources\Form;
    use Filament\Resources\Resource;
    use Filament\Resources\Table;
    use Filament\Tables\Actions\Action;
    use Filament\Tables\Columns\TextColumn;
    use File;
    use Spatie\Browsershot\Browsershot;

    class InvoiceResource extends Resource {

        protected static ?string $model = Invoice::class;

        protected static ?string $slug = 'invoices';

        protected static ?string $recordTitleAttribute = 'title';
        protected static ?string $navigationGroup = 'Finance Management';
        protected static ?string $navigationIcon = 'heroicon-o-receipt-tax';

        public static function form(Form $form): Form
        {
            return $form->schema([
                                     Select::make('course_id')
                                         ->relationship('course','title')->required(),

                                     Select::make('batch_id')
                                     ->relationship('batch','title'),

                                     TextInput::make('title')->required(),

                                     TextInput::make('name')->required(),

                                     TextInput::make('amount')->required(),

                                     DatePicker::make('due_date')->required(),

                                     Placeholder::make('created_at')->label('Created Date')->content(fn(?Invoice $record): string => $record?->created_at?->diffForHumans() ?? '-'),

                                     Placeholder::make('updated_at')->label('Last Modified Date')->content(fn(?Invoice $record): string => $record?->updated_at?->diffForHumans() ?? '-'),
                                 ]);
        }

        public static function table(Table $table): Table
        {
            return $table->columns([
                                       TextColumn::make('invoice_id')->label('Invoice No.'),
                                       TextColumn::make('course.title'),

                                       TextColumn::make('batch.title'),

                                       TextColumn::make('title')->searchable()->sortable(),

                                       TextColumn::make('name')->searchable()->sortable(),

                                       TextColumn::make('amount'),

                                       TextColumn::make('due_date'),
                                   ])
                ->actions([
                              Action::make('View Invoice')->url(fn(Invoice $record) => route('invoices.show',
                                                                                             $record->id))->openUrlInNewTab(),
                              Action::make('Download Invoice')
                                  ->action(function (Invoice $record){
                                      $invoice = $record;
                                      $accounts = Account::where('type','<>',2)->get();
                                      $html = view("admin.invoice.show",compact('invoice','accounts'))
                                          ->render();
                                      File::ensureDirectoryExists(storage_path("app/public/invoices"));
                                      $fileName = storage_path("app/public/invoices/invoice-{$invoice->id}.pdf");
                                      Browsershot::html($html)
                                          ->showBackground()
                                          ->waitUntilNetworkIdle()
                                          ->format('A4')
                                          ->emulateMedia("screen")
                                          ->save($fileName);
                                      return response()->download($fileName);
                                  })
                          ]);
        }

        public static function getPages(): array
        {
            return [
                'index' => Pages\ListInvoices::route('/'),
                'create' => Pages\CreateInvoice::route('/create'),
                'edit' => Pages\EditInvoice::route('/{record}/edit'),
            ];
        }

        public static function getGloballySearchableAttributes(): array
        {
            return [
                'title',
                'name'
            ];
        }
    }
