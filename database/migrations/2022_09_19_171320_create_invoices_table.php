<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration {

        public function up()
        {
            Schema::create('invoices', function (Blueprint $table) {
                $table->id();
                $table->bigInteger('course_id');
                $table->bigInteger('batch_id');
                $table->string('title');
                $table->string('name');
                $table->string('amount');
                $table->string('due_date');


                $table->timestamps();
            });
        }

        public function down()
        {
            Schema::dropIfExists('invoices');
        }
    };
