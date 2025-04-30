<?php

namespace App\Http\Controllers;

use App\Scheduler;
use Exception;
use Illuminate\Http\Request;

class SchedulerController extends Controller
{
    /** @var Scheduler */
    private Scheduler $scheduler;
    private string $awsSampleUrl = 'https://kp-lms-static.s3.us-east-2.amazonaws.com/activities.json';
    
    private array $holidayList = [
        '2025-05-01',
        '2025-05-15',
        '2025-05-20',
    ];

    public function __construct(Scheduler $scheduler)
    {
        $this->scheduler = $scheduler;
    }

    /**
     * Function to calculate the activity time
     * 
     */
    public function getActivities(){
        try{
            $activityArray = $this->getSampleDataFromAWS($this->awsSampleUrl);
            $scheduledList = $this->scheduler->schedulingTask($activityArray, $this->holidayList);
    
            //rendering view
            return view('scheduler.activityList', ['tasks' => $scheduledList, 'holidays' => $this->holidayList, 'error'=>null]);
        } catch (Exception $e){
            return view('error', ['error' => $e]);
        }
       
    }


    /**
     * Function to get the sample data from AWS.
     * @param $awsURL
     * @return array
     * @throws Exception
     */
    public function getSampleDataFromAWS($awsURL): array|null
    {
        $ch = curl_init();
        $headers = array(
        'Accept: application/json',
        'Content-Type: application/json',
        );

        curl_setopt($ch, CURLOPT_URL, $awsURL);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_HEADER, 0);
    
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FAILONERROR, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
    
        $authToken = curl_exec($ch);

        if($authToken == false){
            throw new Exception("Error while fetching sample data from AWS ". curl_error($ch));
        }
        return json_decode($authToken, true);
    }
}
