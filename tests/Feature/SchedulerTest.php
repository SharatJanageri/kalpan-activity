<?php

namespace Tests\Feature;

use App\Http\Controllers\SchedulerController;
use App\Scheduler;
use Tests\TestCase;

class SchedulerTest extends TestCase
{
    /**
     * Test to get acitivty list
     *
     * @return void
     */
    public function test_get_activities()
    {
        $response = $this->get('/get-activities');
        $response->assertStatus(200);
        $response->assertViewIs('scheduler.activityList');

    }

    /**
     * Test expection while fetching activity list
     * 
     * @return void 
     */
    public function test_get_activities_throws_exception_when_aws_fails()
    {
        $schedulerController = \Mockery::mock(SchedulerController::class . '[getSampleDataFromAWS]', [
            app(Scheduler::class)
        ]);
        $schedulerController->shouldReceive('getSampleDataFromAWS')
                ->once()
                ->andThrow(new \Exception('Error while fetching sample data from AWS'));
        $this->app->instance(SchedulerController::class, $schedulerController);
        $response = $this->get('/get-activities');
        $response->assertStatus(500);
        $this->assertStringContainsString('Error while fetching sample data from AWS', $response->getContent());
    }    
}
