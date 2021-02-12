[Back to the Ling/Light_TaskScheduler api](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler.md)<br>
[Back to the Ling\Light_TaskScheduler\Api\Generated\Classes\TaskScheduleApi class](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Classes/TaskScheduleApi.md)


TaskScheduleApi::getTaskSchedulesColumns
================



TaskScheduleApi::getTaskSchedulesColumns — Returns a subset of the taskSchedule rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).




Description
================


public [TaskScheduleApi::getTaskSchedulesColumns](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Classes/TaskScheduleApi/getTaskSchedulesColumns.md)($columns, $where, ?array $markers = []) : array




Returns a subset of the taskSchedule rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
That subset is an array containing the given $columns.
The columns parameter can be either an array or a string.
If it's an array, the column names will be escaped with back ticks.
If it's a string, no escaping will be done. This lets you write custom expression, such as using aliases for instance.

In both cases, you shall pass the pdo markers when necessary.




Parameters
================


- columns

    

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
See the source code for method [TaskScheduleApi::getTaskSchedulesColumns](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/Api/Generated/Classes/TaskScheduleApi.php#L214-L223)


See Also
================

The [TaskScheduleApi](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Classes/TaskScheduleApi.md) class.

Previous method: [getTaskSchedulesColumn](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Classes/TaskScheduleApi/getTaskSchedulesColumn.md)<br>Next method: [getTaskSchedulesKey2Value](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Classes/TaskScheduleApi/getTaskSchedulesKey2Value.md)<br>

