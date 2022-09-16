<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration {

        public function up()
        {
            Schema::create('queries', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('mobile');
                $table->string('wapp')->nullable();
                $table->string('address')->nullable();
                $table->string('contact_type')->nullable();
                $table->string('p_timings')->nullable();
                $table->string('reference')->nullable();



                $table->timestamps();
            });
        }

        public function down()
        {
            Schema::dropIfExists('queries');
        }
    };
