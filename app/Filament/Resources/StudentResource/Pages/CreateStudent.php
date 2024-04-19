<?php

namespace App\Filament\Resources\StudentResource\Pages;

use App\Filament\Resources\StudentResource;
use App\Models\BatchStudent;
use App\Models\Recovery;
use App\Models\Student;
use App\Models\User;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateStudent extends CreateRecord
{
    protected static string $resource = StudentResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        $user = [
            'name'=>$data['name'],
            'email'=>$data['email'],
            'password'=>bcrypt($data['password']),
        ];
        $student = [
          'name'=>$data['name'],
          'father_name'=>$data['father_name'],
          'gender'=>$data['gender'],
          'date_of_birth'=>$data['date_of_birth'],
        ];
        $batches = $data['batches'];

        $user_model = User::create($user);
        $roll = now()->format('Ymd'). str_pad( $user_model->id,4,0,0);
        $user_model->roll = $roll;
        $user_model->save();

        $student['reg_number']=$roll;
        $student['user_id']=$user_model->id;
        $student_model = Student::create($student);

        foreach($batches as $batch) {
            $batch['student_id'] = $student_model->id;
            $recoveries = $batch['recoveries'];
            unset($batch['recoveries']);
            unset($batch['price']);
            $batch_model = BatchStudent::create($batch);
                foreach($recoveries as $recovery) {
                    $recovery['batch_student_id'] = $batch_model->id;
                    $recovery['is_paid'] = 0;
                    $recovery_model = Recovery::create($recovery);
                }
        }
        return $student_model;
    }
}
