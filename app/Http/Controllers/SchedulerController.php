<?php

namespace App\Http\Controllers;

use App\Constants\SchedulerConstant;
use App\Scheduler;
use Exception;
use Illuminate\Http\Request;

class SchedulerController extends Controller
{
    /** @var Scheduler */
    private Scheduler $scheduler;

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
            $activityArray = $this->getSampleDataFromAWS(SchedulerConstant::AWSSAMPLEURL);
            $scheduledList = $this->scheduler->schedulingTask($activityArray, SchedulerConstant::HOLIDAYLIST);
    
            //rendering view
            return view('scheduler.activityList', ['tasks' => $scheduledList, 'holidays' => SchedulerConstant::HOLIDAYLIST]);
        } catch (Exception $e){
            return view('error', ['error' => $e]);
        }
    }


    /**
     * Function to get the sample data from AWS.
     * @throws Exception
     */
    public function getSampleDataFromAWS($awsURL)
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
