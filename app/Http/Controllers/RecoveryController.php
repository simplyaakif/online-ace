<?php

namespace App\Http\Controllers;

use App\Models\Recovery;

class RecoveryController extends Controller
{

    public function show(Recovery $recovery)
    {
        return view('admin.recovery.show', compact('recovery'));
    }
}
