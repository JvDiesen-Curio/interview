<?php

namespace Database\Factories;

use App\Models\interview;
use App\Models\project;
use App\Models\team;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\team_project>
 */
class TeamProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $projectId = project::factory()->has(interview::factory(2), 'interviews')->create()->id;
        $teamId = team::factory()->create()->id;

        // interview::factory(2)->create([
        //     "project_id" => $projectId
        // ]);

        return [
            "project_id" => $projectId,
            "team_id" => $teamId
        ];
    }
}
