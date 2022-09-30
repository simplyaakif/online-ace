<?php

    namespace App\Models;

    use Carbon\Carbon;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\BelongsTo;

    class Invoice extends Model {

        public function getInvoiceIdAttribute()
        {
            return Carbon::parse($this->attributes['created_at'])->format('Ymd') . $this->attributes['id'];
        }

        public function course(): BelongsTo
        {
            return $this->belongsTo(Course::class);
        }

        public function batch(): BelongsTo
        {
            return $this->belongsTo(Batch::class);
        }
    }
