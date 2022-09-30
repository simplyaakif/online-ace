<?php

    use Carbon\Carbon;

    if(!function_exists('carbon')) {
        function carbon($value)
        {
            return Carbon::parse($value);
        }
    }
