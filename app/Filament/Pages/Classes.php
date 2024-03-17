<?php

namespace App\Filament\Pages;

use App\Models\Batch;
use App\Models\BatchStudent;
use Filament\Pages\Page;

class Classes extends Page
{
    protected static ?string $navigationIcon = 'iconsax-lin-home';

    protected static string $view = 'filament.pages.classes';

    public $batches;

    #[Reactive]
    public $show_class = true;
    public $students;

    public function mount(){
        $this->batches = Batch::with('batch_students')->get();
    }

    public function show_students($batch_id){
        $this->students = BatchStudent::with('student')
                                        ->where('batch_id',$batch_id)
                                        ->where('created_at','>=',now()->subYear())
                                        ->get();
        $this->show_class= false;

    }


}
