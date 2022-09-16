<?php

    namespace App\Http\Livewire;

    use App\Models\Course;
    use App\Models\Query;
    use Filament\Forms;
    use Filament\Forms\Components\MarkdownEditor;
    use Filament\Forms\Components\TextInput;
    use Filament\Forms\Components\Wizard;
    use Filament\Forms\Components\Wizard\Step;
    use Illuminate\Contracts\View\View;
    use Livewire\Component;

    class RegisterOnline extends Component implements Forms\Contracts\HasForms {

        use Forms\Concerns\InteractsWithForms;

        public Query $query;
        public $courses = [];
//        public $title;
//        public $content;

        public function mount(): void
        {
//            $this->form->fill([
//                                                                   'title' => $this->query->title,
//                                                                   'content' => $this->query->content,
//                                                               ]);
        }

        protected function getFormSchema(): array
        {
            return [
                Forms\Components\Grid::make(2)
                ->schema([

                          TextInput::make('name')->required(),
                          TextInput::make('mobile')->label('Mobile Number'),
                          TextInput::make('wapp')->label('Whatsapp Number'),

                          Forms\Components\MultiSelect::make('courses')
                          ->options(Course::all()->pluck('title','id'))
                         ])
            ];
        }

        public function submit(): void
        {
            // ...
        }

        public function render(): View
        {
            return view('livewire.register-online');
        }
    }
