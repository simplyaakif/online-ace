<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Batch extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia;
    protected $casts = [
        'batch_schedule' => 'json'
    ];
    protected $guarded=[];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function teachers()
    {
        return $this->belongsToMany(Employee::class,'batch_teacher');
    }

    public function batch_students(){
        return $this->hasMany(BatchStudent::class);
    }
}
