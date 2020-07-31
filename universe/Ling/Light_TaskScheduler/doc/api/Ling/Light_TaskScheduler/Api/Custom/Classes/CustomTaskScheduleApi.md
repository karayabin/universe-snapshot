[Back to the Ling/Light_TaskScheduler api](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler.md)



The CustomTaskScheduleApi class
================
2020-06-30 --> 2020-07-27






Introduction
============

The CustomTaskScheduleApi class.



Class synopsis
==============


class <span class="pl-k">CustomTaskScheduleApi</span> extends [TaskScheduleApi](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Classes/TaskScheduleApi.md) implements [TaskScheduleApiInterface](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Interfaces/TaskScheduleApiInterface.md), [CustomTaskScheduleApiInterface](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Custom/Interfaces/CustomTaskScheduleApiInterface.md) {

- Inherited properties
    - protected [Ling\Light_Database\Service\LightDatabaseService](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/Service/LightDatabaseService.md) [LightTaskSchedulerBaseApi::$pdoWrapper](#property-pdoWrapper) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [LightTaskSchedulerBaseApi::$container](#property-container) ;
    - protected string [LightTaskSchedulerBaseApi::$table](#property-table) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Custom/Classes/CustomTaskScheduleApi/__construct.md)() : void

- Inherited methods
    - public [TaskScheduleApi::insertTaskSchedule](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Classes/TaskScheduleApi/insertTaskSchedule.md)(array $taskSchedule, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - public [TaskScheduleApi::insertTaskSchedules](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Classes/TaskScheduleApi/insertTaskSchedules.md)(array $taskSchedules, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - public [TaskScheduleApi::fetchAll](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Classes/TaskScheduleApi/fetchAll.md)(?array $components = []) : array
    - public [TaskScheduleApi::fetch](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Classes/TaskScheduleApi/fetch.md)(?array $components = []) : array
    - public [TaskScheduleApi::getTaskScheduleById](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Classes/TaskScheduleApi/getTaskScheduleById.md)(int $id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [TaskScheduleApi::getTaskSchedule](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Classes/TaskScheduleApi/getTaskSchedule.md)($where, ?array $markers = [], ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [TaskScheduleApi::getTaskSchedules](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Classes/TaskScheduleApi/getTaskSchedules.md)($where, ?array $markers = []) : array
    - public [TaskScheduleApi::getTaskSchedulesColumn](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Classes/TaskScheduleApi/getTaskSchedulesColumn.md)(string $column, $where, ?array $markers = []) : array
    - public [TaskScheduleApi::getTaskSchedulesColumns](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Classes/TaskScheduleApi/getTaskSchedulesColumns.md)($columns, $where, ?array $markers = []) : array
    - public [TaskScheduleApi::getTaskSchedulesKey2Value](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Classes/TaskScheduleApi/getTaskSchedulesKey2Value.md)(string $key, string $value, $where, ?array $markers = []) : array
    - public [TaskScheduleApi::getAllIds](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Classes/TaskScheduleApi/getAllIds.md)() : array
    - public [TaskScheduleApi::updateTaskScheduleById](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Classes/TaskScheduleApi/updateTaskScheduleById.md)(int $id, array $taskSchedule) : void
    - public [TaskScheduleApi::delete](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Classes/TaskScheduleApi/delete.md)(?$where = null, ?array $markers = []) : false | int
    - public [TaskScheduleApi::deleteTaskScheduleById](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Classes/TaskScheduleApi/deleteTaskScheduleById.md)(int $id) : void
    - public [TaskScheduleApi::deleteTaskScheduleByIds](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Classes/TaskScheduleApi/deleteTaskScheduleByIds.md)(array $ids) : void
    - private [TaskScheduleApi::fetchRoutine](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Classes/TaskScheduleApi/fetchRoutine.md)(string &$q, array &$markers, array $components) : array
    - public [LightTaskSchedulerBaseApi::setPdoWrapper](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Classes/LightTaskSchedulerBaseApi/setPdoWrapper.md)([Ling\SimplePdoWrapper\SimplePdoWrapperInterface](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface.md) $pdoWrapper) : void
    - public [LightTaskSchedulerBaseApi::setContainer](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Classes/LightTaskSchedulerBaseApi/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void

}






Methods
==============

- [CustomTaskScheduleApi::__construct](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Custom/Classes/CustomTaskScheduleApi/__construct.md) &ndash; Builds the CustomTaskScheduleApi instance.
- [TaskScheduleApi::insertTaskSchedule](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Classes/TaskScheduleApi/insertTaskSchedule.md) &ndash; Inserts the given taskSchedule in the database.
- [TaskScheduleApi::insertTaskSchedules](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Classes/TaskScheduleApi/insertTaskSchedules.md) &ndash; Inserts the given taskSchedule rows in the database.
- [TaskScheduleApi::fetchAll](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Classes/TaskScheduleApi/fetchAll.md) &ndash; Returns the rows corresponding to given components.
- [TaskScheduleApi::fetch](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Classes/TaskScheduleApi/fetch.md) &ndash; Returns the first row corresponding to given components, or false if there is no match.
- [TaskScheduleApi::getTaskScheduleById](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Classes/TaskScheduleApi/getTaskScheduleById.md) &ndash; Returns the taskSchedule row identified by the given id.
- [TaskScheduleApi::getTaskSchedule](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Classes/TaskScheduleApi/getTaskSchedule.md) &ndash; Returns the taskSchedule row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [TaskScheduleApi::getTaskSchedules](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Classes/TaskScheduleApi/getTaskSchedules.md) &ndash; Returns the taskSchedule rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [TaskScheduleApi::getTaskSchedulesColumn](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Classes/TaskScheduleApi/getTaskSchedulesColumn.md) &ndash; identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [TaskScheduleApi::getTaskSchedulesColumns](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Classes/TaskScheduleApi/getTaskSchedulesColumns.md) &ndash; Returns a subset of the taskSchedule rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [TaskScheduleApi::getTaskSchedulesKey2Value](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Classes/TaskScheduleApi/getTaskSchedulesKey2Value.md) &ndash; Returns an array of $key => $value from the taskSchedule rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [TaskScheduleApi::getAllIds](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Classes/TaskScheduleApi/getAllIds.md) &ndash; Returns an array of all taskSchedule ids.
- [TaskScheduleApi::updateTaskScheduleById](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Classes/TaskScheduleApi/updateTaskScheduleById.md) &ndash; Updates the taskSchedule row identified by the given id.
- [TaskScheduleApi::delete](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Classes/TaskScheduleApi/delete.md) &ndash; Deletes the taskSchedule rows matching the given where conditions, and returns the number of deleted rows.
- [TaskScheduleApi::deleteTaskScheduleById](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Classes/TaskScheduleApi/deleteTaskScheduleById.md) &ndash; Deletes the taskSchedule identified by the given id.
- [TaskScheduleApi::deleteTaskScheduleByIds](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Classes/TaskScheduleApi/deleteTaskScheduleByIds.md) &ndash; Deletes the taskSchedule rows identified by the given ids.
- [TaskScheduleApi::fetchRoutine](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Classes/TaskScheduleApi/fetchRoutine.md) &ndash; Appends the given components to the given query, and returns an array of options.
- [LightTaskSchedulerBaseApi::setPdoWrapper](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Classes/LightTaskSchedulerBaseApi/setPdoWrapper.md) &ndash; Sets the pdoWrapper.
- [LightTaskSchedulerBaseApi::setContainer](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Classes/LightTaskSchedulerBaseApi/setContainer.md) &ndash; Sets the container.





Location
=============
Ling\Light_TaskScheduler\Api\Custom\Classes\CustomTaskScheduleApi<br>
See the source code of [Ling\Light_TaskScheduler\Api\Custom\Classes\CustomTaskScheduleApi](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/Api/Custom/Classes/CustomTaskScheduleApi.php)



SeeAlso
==============
Previous class: [CustomLightTaskSchedulerBaseApi](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Custom/Classes/CustomLightTaskSchedulerBaseApi.md)<br>Next class: [CustomLightTaskSchedulerApiFactory](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Custom/CustomLightTaskSchedulerApiFactory.md)<br>
