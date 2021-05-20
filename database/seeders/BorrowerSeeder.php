<?php

namespace Database\Seeders;

use App\Models\Application;
use App\Models\Borrower;
use Illuminate\Database\Seeder;

class BorrowerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->info('Creating data into application table');

        Borrower::create([
            'name' => 'Name A',
        ]);
        Borrower::create([
            'name' => 'Name B',
        ]);
    }
}
