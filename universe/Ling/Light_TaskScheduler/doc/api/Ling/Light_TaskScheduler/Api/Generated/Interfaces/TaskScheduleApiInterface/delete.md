[Back to the Ling/Light_TaskScheduler api](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler.md)<br>
[Back to the Ling\Light_TaskScheduler\Api\Generated\Interfaces\TaskScheduleApiInterface class](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Interfaces/TaskScheduleApiInterface.md)


TaskScheduleApiInterface::delete
================



TaskScheduleApiInterface::delete — Deletes the taskSchedule rows matching the given where conditions, and returns the number of deleted rows.




Description
================


abstract public [TaskScheduleApiInterface::delete](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Interfaces/TaskScheduleApiInterface/delete.md)(?$where = null, ?array $markers = []) : false | int




Deletes the taskSchedule rows matching the given where conditions, and returns the number of deleted rows.
If where is null, all the rows of the table will be deleted.

False might be returned in case of a problem and if you don't catch db exceptions.




Parameters
================


- where

    

- markers

    


Return values
================

Returns false | int.








Source Code
===========
See the source code for method [TaskScheduleApiInterface::delete](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/Api/Generated/Interfaces/TaskScheduleApiInterface.php#L232-L232)


See Also
================

The [TaskScheduleApiInterface](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Interfaces/TaskScheduleApiInterface.md) class.

Previous method: [updateTaskSchedule](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Interfaces/TaskScheduleApiInterface/updateTaskSchedule.md)<br>Next method: [deleteTaskScheduleById](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Interfaces/TaskScheduleApiInterface/deleteTaskScheduleById.md)<br>

