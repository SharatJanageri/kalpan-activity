# Kalpan-Activity-Scheduler
Prepares a schedule for given activity list  with 2 hours max time daily and 10 hours weekly 

# Constants
There are different constants defined in the functions 
 - holidayList - Contains all the holiday dates on which the activity is not scheduled.
    ```bash
    path: app\Http\Controllers\SchedulerController.php

 - threshold - Gives a threshold time to add few more activity that can be added into schedule.
    ```bash
    path: app\Scheduler.php

# TestCases
Written 2 test cases for the controller functions to get and create the schedule.
![Test Case Screenshot](./public/images/Kalpan-Test-Cases.png)