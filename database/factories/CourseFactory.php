<?php

    namespace Database\Factories;

    use App\Models\Course;
    use Illuminate\Database\Eloquent\Factories\Factory;
    use Illuminate\Support\Carbon;

    class CourseFactory extends Factory {

        protected $model = Course::class;

        public function definition(): array
        {
            return [
                'title'       => $this->faker->word(),

                'description' => $this->faker->text(),
                'price'       => $this->faker->word(),
                'duration'    => $this->faker->word(),
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
                'deleted_at'  => Carbon::now(),
            ];
        }
    }
