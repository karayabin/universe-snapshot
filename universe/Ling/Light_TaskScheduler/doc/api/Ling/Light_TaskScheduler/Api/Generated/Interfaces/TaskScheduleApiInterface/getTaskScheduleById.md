[Back to the Ling/Light_TaskScheduler api](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler.md)<br>
[Back to the Ling\Light_TaskScheduler\Api\Generated\Interfaces\TaskScheduleApiInterface class](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Interfaces/TaskScheduleApiInterface.md)


TaskScheduleApiInterface::getTaskScheduleById
================



TaskScheduleApiInterface::getTaskScheduleById — Returns the taskSchedule row identified by the given id.




Description
================


abstract public [TaskScheduleApiInterface::getTaskScheduleById](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Interfaces/TaskScheduleApiInterface/getTaskScheduleById.md)(int $id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed




Returns the taskSchedule row identified by the given id.

If the row is not found, this method's return depends on the throwNotFoundEx flag:
- if true, the method throws an exception
- if false, the method returns the given default value




Parameters
================


- id

    

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
See the source code for method [TaskScheduleApiInterface::getTaskScheduleById](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/Api/Generated/Interfaces/TaskScheduleApiInterface.php#L95-L95)


See Also
================

The [TaskScheduleApiInterface](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Interfaces/TaskScheduleApiInterface.md) class.

Previous method: [fetch](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Interfaces/TaskScheduleApiInterface/fetch.md)<br>Next method: [getTaskSchedule](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Interfaces/TaskScheduleApiInterface/getTaskSchedule.md)<br>

