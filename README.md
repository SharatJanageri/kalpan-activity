# Kalpan-Activity-Scheduler
Prepares a schedule for given activity list  with 2 hours max time daily and 10 hours weekly 

# Constants
There are different constants defined in the functions 
 - threshold - Gives a threshold time to add few more activity that can be added into schedule.
 - holidayList - Contains all the holiday dates on which the activity is not scheduled.
    ```bash
    HOLIDAYLIST: '2025-05-01','2025-05-15','2025-05-20',
    THRESHOLD = 10
    AWSSAMPLEURL = aws_sample_url

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
# Output 
 ```
 02-May-2025 ( Study Time: 2h 3m)

Getting Started (3m)
Intro to Your Course (3m)
Module 1: Reading Assignment (7m)
Module 1: Interactive Exercise (5m)
Module 1: Quiz (31m)
Module 1: Exam (60m)
Module 2: Reading Assignment (6m)
Module 2: Interactive Exercise (8m)
05-May-2025 ( Study Time: 2h 0m)

Module 2: Quiz (30m)
Module 2: Exam (61m)
Module 3: Reading Assignment (9m)
Module 3: Interactive Exercise (10m)
Module 3: Quiz (10m)
06-May-2025 ( Study Time: 2h 0m)

Module 3: Quiz (15m)
Module 3: Exam (55m)
Module 4: Reading Assignment (15m)
Module 4: Interactive Exercise (12m)
Module 4: Quiz (23m)
07-May-2025 ( Study Time: 2h 0m)

Module 4: Quiz (13m)
Module 4: Exam (66m)
Module 5: Reading Assignment (10m)
Module 5: Interactive Exercise (10m)
Module 5: Quiz (21m)
08-May-2025 ( Study Time: 2h 3m)

Module 5: Quiz (11m)
Module 5: Exam (60m)
Module 6: Reading Assignment (10m)
Module 6: Interactive Exercise (12m)
Module 6: Quiz (30m)
09-May-2025 ( Study Time: 1h 57m)

Module 6: Exam (63m)
Module 7: Reading Assignment (9m)
Module 7: Interactive Exercise (8m)
Module 7: Quiz (30m)
Module 7: Exam (7m)
12-May-2025 ( Study Time: 2h 0m)

Module 7: Exam (53m)
Module 8: Reading Assignment (10m)
Module 8: Interactive Exercise (10m)
Module 8: Quiz (31m)
Module 8: Exam (16m)
13-May-2025 ( Study Time: 2h 0m)

Module 8: Exam (44m)
Module 9: Reading Assignment (9m)
Module 9: Interactive Exercise (10m)
Module 9: Quiz (35m)
Module 9: Exam (22m)
14-May-2025 ( Study Time: 2h 0m)

Module 9: Exam (45m)
Module 10: Reading Assignment (9m)
Module 10: Interactive Exercise (10m)
Module 10: Quiz (32m)
Module 10: Exam (24m)
16-May-2025 ( Study Time: 2h 0m)

Module 10: Exam (38m)
Module 11: Reading Assignment (6m)
Module 11: Interactive Exercise (10m)
Module 11: Quiz (34m)
Module 11: Exam (32m)
19-May-2025 ( Study Time: 2h 0m)

Module 11: Exam (28m)
Module 12: Reading Assignment (8m)
Module 12: Interactive Exercise (10m)
Module 12: Quiz (34m)
Module 12: Exam (40m)
21-May-2025 ( Study Time: 2h 0m)

Module 12: Exam (30m)
Module 13: Reading Assignment (9m)
Module 13: Interactive Exercise (12m)
Module 13: Quiz (34m)
Module 13: Exam (35m)
22-May-2025 ( Study Time: 2h 0m)

Module 13: Exam (25m)
Module 14: Reading Assignment (12m)
Module 14: Interactive Exercise (15m)
Module 14: Quiz (24m)
Module 14: Exam (44m)
23-May-2025 ( Study Time: 2h 0m)

Module 14: Exam (21m)
Module 15: Reading Assignment (5m)
Module 15: Interactive Exercise (8m)
Module 15: Quiz (35m)
Module 15: Exam (51m)
26-May-2025 ( Study Time: 2h 0m)

Module 15: Exam (19m)
Module 16: Reading Assignment (12m)
Module 16: Interactive Exercise (10m)
Module 16: Quiz (40m)
Module 16: Exam (39m)
27-May-2025 ( Study Time: 2h 10m)

Module 16: Exam (24m)
Module 17: Reading Assignment (10m)
Module 17: Interactive Exercise (7m)
Module 17: Quiz (25m)
Module 17: Exam (64m)
28-May-2025 ( Study Time: 2h 1m)

Module 18: Reading Assignment (5m)
Module 18: Interactive Exercise (7m)
Module 18: Quiz (34m)
Module 18: Exam (65m)
Module 19: Reading Assignment (5m)
Module 19: Interactive Exercise (5m)
29-May-2025 ( Study Time: 2h 0m)

Module 19: Quiz (30m)
Module 19: Exam (60m)
Module 20: Reading Assignment (12m)
Module 20: Interactive Exercise (7m)
Module 20: Quiz (11m)
30-May-2025 ( Study Time: 1h 54m)

Module 20: Quiz (34m)
Module 20: Exam (80m)

Holiday List

01-May-2025
15-May-2025
20-May-2025

```