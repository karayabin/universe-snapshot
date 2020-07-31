[Back to the Ling/Light_TaskScheduler api](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler.md)<br>
[Back to the Ling\Light_TaskScheduler\Api\Generated\Interfaces\TaskScheduleApiInterface class](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Interfaces/TaskScheduleApiInterface.md)


TaskScheduleApiInterface::getTaskSchedulesColumn
================



TaskScheduleApiInterface::getTaskSchedulesColumn — identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).




Description
================


abstract public [TaskScheduleApiInterface::getTaskSchedulesColumn](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Interfaces/TaskScheduleApiInterface/getTaskSchedulesColumn.md)(string $column, $where, ?array $markers = []) : array




Returns an array which values are the given $column, from the taskSchedule rows
identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).




Parameters
================


- column

    

- where

    

- markers

    


Return values
================

Returns array.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [TaskScheduleApiInterface::getTaskSchedulesColumn](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/Api/Generated/Interfaces/TaskScheduleApiInterface.php#L140-L140)


See Also
================

The [TaskScheduleApiInterface](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Interfaces/TaskScheduleApiInterface.md) class.

Previous method: [getTaskSchedules](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Interfaces/TaskScheduleApiInterface/getTaskSchedules.md)<br>Next method: [getTaskSchedulesColumns](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Interfaces/TaskScheduleApiInterface/getTaskSchedulesColumns.md)<br>

