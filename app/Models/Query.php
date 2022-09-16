<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\BelongsToMany;

    class Query extends Model {

        public function courses() :BelongsToMany
        {
            return $this->belongsToMany(Course::class);
        }
    }
