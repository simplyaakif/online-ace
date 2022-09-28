<?php

    namespace Database\Factories;

    use App\Models\Batch;
    use App\Models\Course;
    use Illuminate\Database\Eloquent\Factories\Factory;
    use Illuminate\Support\Carbon;

    class BatchFactory extends Factory {

        protected $model = Batch::class;

        public function definition(): array
        {
            return [
                'title'          => $this->faker->word(),

                'description'    => $this->faker->text(),
                'limit'          => $this->faker->randomNumber(),
                'batch_schedule' => null,
                'created_at'     => Carbon::now(),
                'updated_at'     => Carbon::now(),
                'deleted_at'     => Carbon::now(),

                'course_id' => Course::factory(),
            ];
        }
    }
