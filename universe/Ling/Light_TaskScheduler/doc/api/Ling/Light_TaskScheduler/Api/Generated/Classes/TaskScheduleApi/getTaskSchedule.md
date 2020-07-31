[Back to the Ling/Light_TaskScheduler api](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler.md)<br>
[Back to the Ling\Light_TaskScheduler\Api\Generated\Classes\TaskScheduleApi class](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Classes/TaskScheduleApi.md)


TaskScheduleApi::getTaskSchedule
================



TaskScheduleApi::getTaskSchedule — Returns the taskSchedule row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).




Description
================


public [TaskScheduleApi::getTaskSchedule](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Classes/TaskScheduleApi/getTaskSchedule.md)($where, ?array $markers = [], ?$default = null, ?bool $throwNotFoundEx = false) : mixed




Returns the taskSchedule row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).

If the row is not found, this method's return depends on the throwNotFoundEx flag:
- if true, the method throws an exception
- if false, the method returns the given default value




Parameters
================


- where

    

- markers

    

- default

    

- throwNotFoundEx

    


Return values
================

Returns mixed.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [TaskScheduleApi::getTaskSchedule](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/Api/Generated/Classes/TaskScheduleApi.php#L162-L181)


See Also
================

The [TaskScheduleApi](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Classes/TaskScheduleApi.md) class.

Previous method: [getTaskScheduleById](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Classes/TaskScheduleApi/getTaskScheduleById.md)<br>Next method: [getTaskSchedules](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Classes/TaskScheduleApi/getTaskSchedules.md)<br>

