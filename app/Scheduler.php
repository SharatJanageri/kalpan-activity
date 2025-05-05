<?php

namespace App;

use App\Constants\SchedulerConstant;
use DateTime;
use Illuminate\Database\Eloquent\Model;

class Scheduler extends Model
{
    
    /**
     * Function schedules the tasks according to the creteria given 
     * @param mixed $tasks
     * @param array $holidayList
     * @param string|null $day
     * return array
     */
    public function schedulingTask($tasks, $holidayList, $day ='today'): array|null
    {
        $schedule = [];
        $day = new DateTime($day);
    
        //Skip to Monday if today is weekend
        if (in_array($day->format('N'), [6, 7])) {
            $day->modify('next Monday');
        }
    
        $weeklyMinutes = 0;
        $dailyMinutes = 0;
        
        if( !empty($tasks) ){
            foreach ($tasks['activities'] as $activity) {
                $minutesLeft = $activity['durationMinutes'];
        
                while ( $minutesLeft > 0 ) {
                    //Check if the day is weekend
                    if ( in_array($day->format('N'), [6, 7]) ) {
                        $day->modify('next Monday');
                        $weeklyMinutes = 0;
                        $dailyMinutes = 0;
                    }
        
                   //Check if the week is completed with the total hours filled
                    if ( $weeklyMinutes >= 600 ) {
                        $day->modify('next Monday');
                        $weeklyMinutes = 0;
                        $dailyMinutes = 0;
                        continue;
                    }
    
                    //check for the holiday dates
                    if( in_array($day->format('Y-m-d'), $holidayList )){
                        $day->modify('+1 day');
                        $dailyMinutes = 0;
                        continue;
                    }
        
                    $remainingToday = 120 - $dailyMinutes;
                    $availableThisWeek = 600 - $weeklyMinutes;
                    $canScheduleToday = min($remainingToday, $availableThisWeek);
        
                    $dateStr = $day->format('d-M-Y');
        
                    // Check if we can fit the entire activity with threshold
                    if ( $canScheduleToday + SchedulerConstant::THRESHOLD >= $minutesLeft ) {
                        $schedule[$dateStr][] = [
                            'task' => $activity['name'],
                            'minutes' => $minutesLeft,
                        ];
        
                        $dailyMinutes += $minutesLeft;
                        $weeklyMinutes += $minutesLeft;
                        $minutesLeft = 0;
                        //Goto next date if 120 min is completed with the threshold
                        if ( $dailyMinutes >= 120 ) {
                            $day->modify('+1 day');
                            $dailyMinutes = 0;
                        }
                    } else {
                        //else break the acitivty time schedule what we can for the day 
                        $schedule[$dateStr][] = [
                            'task' => $activity['name'],
                            'minutes' => $canScheduleToday,
                        ];
        
                        $minutesLeft -= $canScheduleToday;
                        $dailyMinutes += $canScheduleToday;
                        $weeklyMinutes += $canScheduleToday;
                        $dailyMinutes = 0;
                        $day->modify('+1 day');
                    }
                }
            }            
        }        
        return $schedule;
    } 
}
