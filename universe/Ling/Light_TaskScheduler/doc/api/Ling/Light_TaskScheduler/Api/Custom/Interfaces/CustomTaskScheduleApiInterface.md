[Back to the Ling/Light_TaskScheduler api](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler.md)



The CustomTaskScheduleApiInterface class
================
2020-06-30 --> 2020-07-27






Introduction
============

The CustomTaskScheduleApiInterface interface.



Class synopsis
==============


abstract class <span class="pl-k">CustomTaskScheduleApiInterface</span> implements [TaskScheduleApiInterface](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Interfaces/TaskScheduleApiInterface.md) {

- Inherited methods
    - abstract public [TaskScheduleApiInterface::insertTaskSchedule](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Interfaces/TaskScheduleApiInterface/insertTaskSchedule.md)(array $taskSchedule, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - abstract public [TaskScheduleApiInterface::insertTaskSchedules](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Interfaces/TaskScheduleApiInterface/insertTaskSchedules.md)(array $taskSchedules, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - abstract public [TaskScheduleApiInterface::fetchAll](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Interfaces/TaskScheduleApiInterface/fetchAll.md)(?array $components = []) : array
    - abstract public [TaskScheduleApiInterface::fetch](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Interfaces/TaskScheduleApiInterface/fetch.md)(?array $components = []) : array
    - abstract public [TaskScheduleApiInterface::getTaskScheduleById](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Interfaces/TaskScheduleApiInterface/getTaskScheduleById.md)(int $id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [TaskScheduleApiInterface::getTaskSchedule](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Interfaces/TaskScheduleApiInterface/getTaskSchedule.md)($where, ?array $markers = [], ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [TaskScheduleApiInterface::getTaskSchedules](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Interfaces/TaskScheduleApiInterface/getTaskSchedules.md)($where, ?array $markers = []) : array
    - abstract public [TaskScheduleApiInterface::getTaskSchedulesColumn](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Interfaces/TaskScheduleApiInterface/getTaskSchedulesColumn.md)(string $column, $where, ?array $markers = []) : array
    - abstract public [TaskScheduleApiInterface::getTaskSchedulesColumns](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Interfaces/TaskScheduleApiInterface/getTaskSchedulesColumns.md)($columns, $where, ?array $markers = []) : array
    - abstract public [TaskScheduleApiInterface::getTaskSchedulesKey2Value](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Interfaces/TaskScheduleApiInterface/getTaskSchedulesKey2Value.md)(string $key, string $value, $where, ?array $markers = []) : array
    - abstract public [TaskScheduleApiInterface::getAllIds](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Interfaces/TaskScheduleApiInterface/getAllIds.md)() : array
    - abstract public [TaskScheduleApiInterface::updateTaskScheduleById](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Interfaces/TaskScheduleApiInterface/updateTaskScheduleById.md)(int $id, array $taskSchedule) : void
    - abstract public [TaskScheduleApiInterface::delete](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Interfaces/TaskScheduleApiInterface/delete.md)(?$where = null, ?array $markers = []) : false | int
    - abstract public [TaskScheduleApiInterface::deleteTaskScheduleById](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Interfaces/TaskScheduleApiInterface/deleteTaskScheduleById.md)(int $id) : void
    - abstract public [TaskScheduleApiInterface::deleteTaskScheduleByIds](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Interfaces/TaskScheduleApiInterface/deleteTaskScheduleByIds.md)(array $ids) : void

}






Methods
==============

- [TaskScheduleApiInterface::insertTaskSchedule](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Interfaces/TaskScheduleApiInterface/insertTaskSchedule.md) &ndash; Inserts the given taskSchedule in the database.
- [TaskScheduleApiInterface::insertTaskSchedules](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Interfaces/TaskScheduleApiInterface/insertTaskSchedules.md) &ndash; Inserts the given taskSchedule rows in the database.
- [TaskScheduleApiInterface::fetchAll](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Interfaces/TaskScheduleApiInterface/fetchAll.md) &ndash; Returns the rows corresponding to given components.
- [TaskScheduleApiInterface::fetch](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Interfaces/TaskScheduleApiInterface/fetch.md) &ndash; Returns the first row corresponding to given components, or false if there is no match.
- [TaskScheduleApiInterface::getTaskScheduleById](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Interfaces/TaskScheduleApiInterface/getTaskScheduleById.md) &ndash; Returns the taskSchedule row identified by the given id.
- [TaskScheduleApiInterface::getTaskSchedule](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Interfaces/TaskScheduleApiInterface/getTaskSchedule.md) &ndash; Returns the taskSchedule row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [TaskScheduleApiInterface::getTaskSchedules](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Interfaces/TaskScheduleApiInterface/getTaskSchedules.md) &ndash; Returns the taskSchedule rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [TaskScheduleApiInterface::getTaskSchedulesColumn](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Interfaces/TaskScheduleApiInterface/getTaskSchedulesColumn.md) &ndash; identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [TaskScheduleApiInterface::getTaskSchedulesColumns](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Interfaces/TaskScheduleApiInterface/getTaskSchedulesColumns.md) &ndash; Returns a subset of the taskSchedule rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [TaskScheduleApiInterface::getTaskSchedulesKey2Value](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Interfaces/TaskScheduleApiInterface/getTaskSchedulesKey2Value.md) &ndash; Returns an array of $key => $value from the taskSchedule rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [TaskScheduleApiInterface::getAllIds](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Interfaces/TaskScheduleApiInterface/getAllIds.md) &ndash; Returns an array of all taskSchedule ids.
- [TaskScheduleApiInterface::updateTaskScheduleById](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Interfaces/TaskScheduleApiInterface/updateTaskScheduleById.md) &ndash; Updates the taskSchedule row identified by the given id.
- [TaskScheduleApiInterface::delete](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Interfaces/TaskScheduleApiInterface/delete.md) &ndash; Deletes the taskSchedule rows matching the given where conditions, and returns the number of deleted rows.
- [TaskScheduleApiInterface::deleteTaskScheduleById](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Interfaces/TaskScheduleApiInterface/deleteTaskScheduleById.md) &ndash; Deletes the taskSchedule identified by the given id.
- [TaskScheduleApiInterface::deleteTaskScheduleByIds](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Interfaces/TaskScheduleApiInterface/deleteTaskScheduleByIds.md) &ndash; Deletes the taskSchedule rows identified by the given ids.





Location
=============
Ling\Light_TaskScheduler\Api\Custom\Interfaces\CustomTaskScheduleApiInterface<br>
See the source code of [Ling\Light_TaskScheduler\Api\Custom\Interfaces\CustomTaskScheduleApiInterface](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/Api/Custom/Interfaces/CustomTaskScheduleApiInterface.php)



SeeAlso
==============
Previous class: [CustomLightTaskSchedulerApiFactory](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Custom/CustomLightTaskSchedulerApiFactory.md)<br>Next class: [LightTaskSchedulerBaseApi](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Classes/LightTaskSchedulerBaseApi.md)<br>
