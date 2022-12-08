<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Task;

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
        Task::factory()->create(['title'=>'pray']);
        Task::factory()->create(['title'=>'workout']);
        Task::factory()->create(['title'=>'work']);
        Task::factory()->create(['title'=>'cook']);
        Task::factory()->create(['title'=>'eat healthy']);
        Task::factory()->create(['title'=>'self care']);
    }
}
