<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BatchStudent extends Model
{
    use HasFactory;

    protected $table = 'batch_student';

    const STATUS=[
      'active'=>'Active',
      'cancelled'=>'Cancelled',
      'frozen'=>'Frozen',
      'completed'=>'Completed'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function batch()
    {
        return $this->belongsTo(Batch::class);
    }

    public function recoveries()
    {
        return $this->hasMany(Recovery::class);
    }
}
