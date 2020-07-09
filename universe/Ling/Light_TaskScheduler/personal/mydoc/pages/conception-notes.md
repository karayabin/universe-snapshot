Light_TaskScheduler, conception notes
=============
2020-06-30 -> 2020-07-07




This is a task scheduler service for the [light framework](https://github.com/lingtalfi/Light).




Overview
----------
2020-06-30


We have a table in the database which holds the tasks to execute, see the **task schedule table** section for more info.

You can register your task to our service, and when you do so, we create a corresponding entry in the **task schedule** table.

The entry has an execution date.

In parallel, there is what we call a spinner, that basically ensures that the tasks are executed at their planned execution date.

See more about the spinner in the **spinner** section.


 




The task schedule table
--------
2020-06-30


We have a database table named **lts_task_schedule**, which looks like this:


- id: pk ai
- name: str 128, the name of the task
- action: str 128, a string representing the action to execute, see more details in the **action format** section below
- param1: str 256 nullable, a string representing the first parameter of the action, or null if the action doesn't require any parameter
- extra_params: text nullable, a serialized version of an array representing the extra arguments to pass to the
    action, the first entry of the array being parameter 2, the second entry being parameter 3 and so on...
- scheduled_date: datetime, the scheduled date time
- execution_end_date: datetime nullable, the date time when the task's execution stopped (which could be a success or a failure), or null if the task is not executed yet.
- error: 0|1, whether the task execution failed. In case of failure, you can check the logs if any, see the **logs** section later in this document
    





Action format
---------
2020-06-30


The **action** field of our **task schedule** table represents the action to execute.

In other words, what method will our task manager call.

As for now, we only use services, since light is a service oriented framework, and the notation is the following:


- **action**: $serviceName:$methodName


With: 

- $serviceName: string, the service name
- $methodName: string, the method name


The parameters (if any) to pass to this method are defined  in other columns of the **task schedule** table.



Logs
---------
2020-06-30



When a task fails, you want to know why.
It's the responsibility of the service authors to create their own logs.

However, for convenience, we also provide a dedicated log for task errors, via the [Light_Logger](https://github.com/lingtalfi/Light_Logger)'s **task_scheduler.error** channel.


In parallel, we also provide our own debug log via the **task_scheduler.debug** channel, which you can activate via the **useDebug** option (false by default) in our service configuration.






The spinner
------------
2020-06-30


The **spinner** mechanism ensures that the tasks are executed at their planned execution date.


It's composed of two elements:

- the task manager 
- the trigger


The **task manager** is the one that will look into the table and execute the tasks that need to be executed, based on the time it was called.

The **trigger** is the mechanism that calls the **task manager**.


It's recommended to use a cron table with a call per minute to our **task manager script**.

However, in some environments, a cron table is not available, and a common strategy is to call the script from a web (for instance if the client of your app reaches page ABC, then
it triggers the script).  


It's your job do handle the **trigger**: our service doesn't handle this part.

 


FAQ
==========
2020-07-07



What if there is more than one task to execute?
----------
2020-07-07


So in some cases, when the **trigger** calls the **task manager**, there are more than one task to execute.

You can choose the behaviour of the **task manager**, whether it executes only the last task (i.e. ignoring all the oldest),
or whether to execute the oldest only (the idea being to execute them all, in order), or to execute all the remaining tasks at once.
In the latter case, make sure your php configuration has enough execution time and memory available, as often the tasks take a long time to execute.



The option you're looking for is:

- executionMode: string, one of the following:
    - lastOnly (default)
    - firstOnly
    - allRemaining
    
    
    
    










