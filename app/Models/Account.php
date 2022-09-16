<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class Account extends Model {

        public static $type =['Bank','Wallet','Cash'];
    }
