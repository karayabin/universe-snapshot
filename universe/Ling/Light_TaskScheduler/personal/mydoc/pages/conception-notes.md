Light_TaskScheduler, conception notes
=============
2020-06-30 -> 2020-08-13




This is a task scheduler service for the [light framework](https://github.com/lingtalfi/Light).




Overview
----------
2020-06-30 -> 2020-08-13


We have a table in the database which holds the tasks to execute, see the **task schedule table** section for more info.

You can register your task to our service, and when you do so, we create a corresponding entry in the **task schedule** table.

In parallel, there is what we call a spinner, that basically ensures that the tasks are executed at their planned execution date.

See more about the spinner in the **spinner** section.


 


The task manager
------------
2020-07-21 -> 2020-07-27


Our service is also a **task manager**.

The **task manager** is the concrete code that executes the tasks, based on the rules explained in this document.

When the **task manager** executes a task, it needs to know whether the task was successful, or if there was an error.

Whatever the result is, the **task manager** reports that result in the database, so that the human manager can see in a glance what happened.

Therefore, any task must have a boolean outcome: either it's a success, or it's a failure.

To allow developers to use services directly, we consider that a task by default executes successfully, unless it returns false or throws an exception.










The task schedule table
--------
2020-06-30 -> 2020-08-13


We have a database table named **lts_task_schedule**.

It now handles recursion.

The maximum precision we have is the minute (i.e. we don't think the precision to the "second" is that important for a cron task schedule).




- id: pk ai
- name: str 128, the name of the task
- action: str 128, a string representing the action to execute, see more details in the **action format** section below
- param1: str 256 nullable, a string representing the first parameter of the action, or null if the action doesn't require any parameter
- extra_params: text nullable, a [smartCode](https://github.com/lingtalfi/NotationFan/blob/master/smart-code.md) version of an array representing the extra arguments to pass to the
    action, the first entry of the array being parameter 2, the second entry being parameter 3 and so on...
    The arguments are parsed with the [SmartCodeTool::parseArguments](https://github.com/lingtalfi/Bat/blob/master/SmartCodeTool.md#parsearguments) method (i.e. separate them with a comma, as if you
    were writing inside a [BabyYaml](https://github.com/lingtalfi/BabyYaml) sequence)
- year: int, the scheduled year, -1 means every year
- month: tinyint the scheduled month (1-12), -1 means every month
- day: tinyint the scheduled day (1-31), -1 means every day
- hour: tinyint the scheduled hour (0-23), -1 means every hour
- minute: tinyint the scheduled minute (0-56), -1 means every minute
- last_execution_end_date: datetime nullable, the date time when the task's execution stopped for the last time (which could be a success or a failure), or null if the task has never been executed yet
- error: 0|1, whether the task execution failed. In case of failure, you can check the logs if any, see the **logs** section later in this document
    





Action format
---------
2020-06-30 -> 2020-07-27


The **action** field of our **task schedule** table represents the action to execute.

In other words, what method will our **task manager** call.

We could create a TaskInterface, but in lot of cases that would be unnecessary work.

Since light is a **service oriented** framework, it's faster to just call services directly, without having to create a task wrapper,
and so for now we just have one notation, which looks like this:


- **action**: {serviceNotation} | {classNotation} 
- serviceNotation: @ {serviceName} : {methodName}
- classNotation: {className} : {methodName}


With: 

- $serviceName: string, the service name
- $methodName: string, the method name


Beware that with the classNotation, your class' constructor should not accept any parameter (as we wouldn't be able to provide them with sensible values).


Examples:

- service notation: @Mailer:send
- class notation: Ling\Mailer\Task\MailerWrapper:send


The parameters (if any) to pass to this method are defined in other columns of the **task schedule** table.


The callable should return false if something went wrong, or throw an exception.
In all the other cases, our **task manager** will assume that the task was successfully executed.

Note that other notations might be added later if needed.


Note: the benefit of using a dedicated task class is that you have more control over the logs (i.e. you can send log messages to our channel to have a better debug experience).
   






Logs
---------
2020-06-30



When a task fails, you want to know why.
It's the responsibility of the service authors to create their own logs.

However, for convenience, we also provide a dedicated log for task errors, via the [Light_Logger](https://github.com/lingtalfi/Light_Logger)'s **task_scheduler.error** channel.


In parallel, we also provide our own debug log via the **task_scheduler.debug** channel, which you can activate via the **useDebug** option (false by default) in our service configuration.






The spinner
------------
2020-06-30 -> 2020-08-13


The **spinner** mechanism ensures that the tasks are executed at their planned execution date.


It's composed of two elements:

- the task manager 
- the trigger


The **task manager** is the one that will look into the table and execute the tasks that need to be executed, based on the time it was called.

The **trigger** is the mechanism that calls the **task manager**.


It's recommended to use a cron table with a call per hour (or per minute for a more aggressive app) to our **task manager script**.



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
    
    
    
    










