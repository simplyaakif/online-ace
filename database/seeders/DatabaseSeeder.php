<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Batch;
use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

         User::factory()->create([
             'name' => 'Admin',
             'email' => 'admin@admin.com',
             'password'=>bcrypt('password'),
         ]);

         Course::factory()->create([
             'title' => 'Spoken English',
             'price' => '35000',
             'duration'=>'3 Months',
         ]);

         Course::factory()->create([
             'title' => 'IELTS',
             'price' => '25000',
             'duration'=>'6 Weeks',
         ]);

         Batch::factory()->create([
             'course_id'=>2,
             'title' => 'IELTS',
             'limit' => 12,
         ]);
    }
}
