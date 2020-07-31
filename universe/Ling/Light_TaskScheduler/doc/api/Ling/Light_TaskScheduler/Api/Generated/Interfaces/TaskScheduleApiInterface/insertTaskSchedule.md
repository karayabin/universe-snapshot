[Back to the Ling/Light_TaskScheduler api](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler.md)<br>
[Back to the Ling\Light_TaskScheduler\Api\Generated\Interfaces\TaskScheduleApiInterface class](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Interfaces/TaskScheduleApiInterface.md)


TaskScheduleApiInterface::insertTaskSchedule
================



TaskScheduleApiInterface::insertTaskSchedule — Inserts the given taskSchedule in the database.




Description
================


abstract public [TaskScheduleApiInterface::insertTaskSchedule](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Interfaces/TaskScheduleApiInterface/insertTaskSchedule.md)(array $taskSchedule, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed




Inserts the given taskSchedule in the database.
By default, it returns the result of the PDO::lastInsertId method.
If the returnRic flag is set to true, the method will return the ric array instead of the lastInsertId.


If the row you're trying to insert triggers a duplicate error, the behaviour of this method depends on
the ignoreDuplicate flag:
- if true, the error will be caught internally, the return of the method is not affected
- if false, the error will not be caught, and depending on your configuration, it might either
         trigger an exception, or fail silently in which case this method returns false.




Parameters
================


- taskSchedule

    

- ignoreDuplicate

    

- returnRic

    


Return values
================

Returns mixed.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [TaskScheduleApiInterface::insertTaskSchedule](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/Api/Generated/Interfaces/TaskScheduleApiInterface.php#L35-L35)


See Also
================

The [TaskScheduleApiInterface](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Interfaces/TaskScheduleApiInterface.md) class.

Next method: [insertTaskSchedules](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Interfaces/TaskScheduleApiInterface/insertTaskSchedules.md)<br>

