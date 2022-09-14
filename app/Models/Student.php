<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Student extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;
    protected $guarded=[];

    public function batches()
    {
        return $this->belongsToMany(Batch::class)->withPivot('start_date','end_date','is_frozen','status');
    }
}
