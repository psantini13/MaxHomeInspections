<?php

namespace Tests\Unit;

use App\Models\Application;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use PHPUnit\Framework\TestCase;

class ApplicationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_loan_application_has_2_borrowers()
    {
        $applications = Application::all();
        foreach ($applications as $application) {
            $this->assertCount(2, $application->borrowers);
        }
    }
}
