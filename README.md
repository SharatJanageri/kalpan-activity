# Kalpan-Activity-Scheduler
Prepares a schedule for given activity list  with 2 hours max time daily and 10 hours weekly 

# Constants
There are different constants defined in the functions 
 - threshold - Gives a threshold time to add few more activity that can be added into schedule.
 - holidayList - Contains all the holiday dates on which the activity is not scheduled.
    ```bash
    HOLIDAYLIST: '2025-05-01','2025-05-15','2025-05-20',
    THRESHOLD = 10

    path: app\Constants\SchedulerConstant.php

    
# TestCases
Written 2 test cases for the controller functions to get and create the schedule.

![Test Case Screenshot](.\storage\app\public\Kalpan-Test-Cases.png)
```bash
    TestFilepath: tests\Feature\SchedulerTest.php
    ImagePath: storage\app\public\Kalpan-Test-Cases.png
```

# Run project on your local 
- Clone project from the repo to local
 ```bash
 $ git clone https://github.com/SharatJanageri/kalpan-activity.git <project-folder-name>
 ``` 
- Move to project-folder, run composer install to generate dependencies in vendor folder 
 ```
 $ composer install
```
- Change .env.example filename to .env

- Run artisan generate to generate new app key
```
$ php artisan key:generate
```

- Run the application using below command 
```
$ php artisan serve
```