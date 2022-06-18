<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\Profile;
use App\Models\JobTitle;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExperienceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'description' => $this->faker->paragraphs(4,true),
            'current' => $current=$this->faker->boolean(),
            'started_at' => now()->subMonths(
                $this->faker->numberBetween(3, 12)
            ),
            'finished_at' => $current ? null : now()->addMonths(
                $this->faker->numberBetween(3, 12)
            ),
            'job_title_id' => JobTitle::factory(),
            'company_id' => Company::factory(),
            'profile_id' => Profile::factory()
        ];
    }
}
