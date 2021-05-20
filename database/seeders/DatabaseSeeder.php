<?php

namespace Database\Seeders;

use App\Models\Application;
use App\Models\Borrower;
use App\Models\Income;
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
        /*Application::factory(1)
            ->has(Borrower::factory(2))
            ->create();*/

        /*Application::factory(1)
            ->has(Borrower::factory(1)
                ->has(Income::factory(1)->create(['description' => 'Salary']))
                ->has(Income::factory(1)->create(['description' => 'Rental properties'])))
            ->create();*/

        Application::factory(1)
            ->has(Borrower::factory(1)
                ->hasIncomes(1, ['description' => 'Salary'])
                ->hasIncomes(1, ['description' => 'Rental properties']))
            ->has(Borrower::factory(1)
                ->hasIncomes(1, ['description' => 'Salary']))
            ->create();

    }
}
