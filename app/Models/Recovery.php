<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Recovery extends Model
{
    use HasFactory;

    public function batch_student(): BelongsTo
    {
        return $this->belongsTo(BatchStudent::class);
    }
    public function account(): BelongsTo
    {
        return $this->belongsTo(Account::class);
    }
}
