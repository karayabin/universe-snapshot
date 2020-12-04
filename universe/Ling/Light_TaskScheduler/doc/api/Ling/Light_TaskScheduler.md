Ling/Light_TaskScheduler
================
2020-06-30 --> 2020-08-14




Table of contents
===========

- [CustomLightTaskSchedulerBaseApi](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Custom/Classes/CustomLightTaskSchedulerBaseApi.md) &ndash; The CustomLightTaskSchedulerBaseApi class.
    - [CustomLightTaskSchedulerBaseApi::__construct](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Custom/Classes/CustomLightTaskSchedulerBaseApi/__construct.md) &ndash; Builds the CustomLightTaskSchedulerBaseApi instance.
    - [LightTaskSchedulerBaseApi::setPdoWrapper](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Classes/LightTaskSchedulerBaseApi/setPdoWrapper.md) &ndash; Sets the pdoWrapper.
    - [LightTaskSchedulerBaseApi::setContainer](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Classes/LightTaskSchedulerBaseApi/setContainer.md) &ndash; Sets the container.
- [CustomTaskScheduleApi](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Custom/Classes/CustomTaskScheduleApi.md) &ndash; The CustomTaskScheduleApi class.
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
    - [TaskScheduleApi::updateTaskSchedule](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Classes/TaskScheduleApi/updateTaskSchedule.md) &ndash; Updates the taskSchedule row.
    - [TaskScheduleApi::delete](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Classes/TaskScheduleApi/delete.md) &ndash; Deletes the taskSchedule rows matching the given where conditions, and returns the number of deleted rows.
    - [TaskScheduleApi::deleteTaskScheduleById](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Classes/TaskScheduleApi/deleteTaskScheduleById.md) &ndash; Deletes the taskSchedule identified by the given id.
    - [TaskScheduleApi::deleteTaskScheduleByIds](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Classes/TaskScheduleApi/deleteTaskScheduleByIds.md) &ndash; Deletes the taskSchedule rows identified by the given ids.
    - [LightTaskSchedulerBaseApi::setPdoWrapper](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Classes/LightTaskSchedulerBaseApi/setPdoWrapper.md) &ndash; Sets the pdoWrapper.
    - [LightTaskSchedulerBaseApi::setContainer](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Classes/LightTaskSchedulerBaseApi/setContainer.md) &ndash; Sets the container.
- [CustomLightTaskSchedulerApiFactory](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Custom/CustomLightTaskSchedulerApiFactory.md) &ndash; The CustomLightTaskSchedulerApiFactory class.
    - [CustomLightTaskSchedulerApiFactory::__construct](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Custom/CustomLightTaskSchedulerApiFactory/__construct.md) &ndash; Builds the CustomLightTaskSchedulerApiFactory instance.
    - [LightTaskSchedulerApiFactory::getTaskScheduleApi](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/LightTaskSchedulerApiFactory/getTaskScheduleApi.md) &ndash; Returns a CustomTaskScheduleApiInterface.
    - [LightTaskSchedulerApiFactory::setPdoWrapper](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/LightTaskSchedulerApiFactory/setPdoWrapper.md) &ndash; Sets the pdoWrapper.
    - [LightTaskSchedulerApiFactory::setContainer](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/LightTaskSchedulerApiFactory/setContainer.md) &ndash; Sets the container.
- [CustomTaskScheduleApiInterface](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Custom/Interfaces/CustomTaskScheduleApiInterface.md) &ndash; The CustomTaskScheduleApiInterface interface.
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
    - [TaskScheduleApiInterface::updateTaskSchedule](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Interfaces/TaskScheduleApiInterface/updateTaskSchedule.md) &ndash; Updates the taskSchedule row.
    - [TaskScheduleApiInterface::delete](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Interfaces/TaskScheduleApiInterface/delete.md) &ndash; Deletes the taskSchedule rows matching the given where conditions, and returns the number of deleted rows.
    - [TaskScheduleApiInterface::deleteTaskScheduleById](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Interfaces/TaskScheduleApiInterface/deleteTaskScheduleById.md) &ndash; Deletes the taskSchedule identified by the given id.
    - [TaskScheduleApiInterface::deleteTaskScheduleByIds](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Interfaces/TaskScheduleApiInterface/deleteTaskScheduleByIds.md) &ndash; Deletes the taskSchedule rows identified by the given ids.
- [LightTaskSchedulerBaseApi](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Classes/LightTaskSchedulerBaseApi.md) &ndash; The LightTaskSchedulerBaseApi class.
    - [LightTaskSchedulerBaseApi::__construct](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Classes/LightTaskSchedulerBaseApi/__construct.md) &ndash; Builds the AbstractLightUserDatabaseApi instance.
    - [LightTaskSchedulerBaseApi::setPdoWrapper](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Classes/LightTaskSchedulerBaseApi/setPdoWrapper.md) &ndash; Sets the pdoWrapper.
    - [LightTaskSchedulerBaseApi::setContainer](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Classes/LightTaskSchedulerBaseApi/setContainer.md) &ndash; Sets the container.
- [TaskScheduleApi](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Classes/TaskScheduleApi.md) &ndash; The TaskScheduleApi class.
    - [TaskScheduleApi::__construct](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Classes/TaskScheduleApi/__construct.md) &ndash; Builds the TaskScheduleApi instance.
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
    - [TaskScheduleApi::updateTaskSchedule](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Classes/TaskScheduleApi/updateTaskSchedule.md) &ndash; Updates the taskSchedule row.
    - [TaskScheduleApi::delete](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Classes/TaskScheduleApi/delete.md) &ndash; Deletes the taskSchedule rows matching the given where conditions, and returns the number of deleted rows.
    - [TaskScheduleApi::deleteTaskScheduleById](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Classes/TaskScheduleApi/deleteTaskScheduleById.md) &ndash; Deletes the taskSchedule identified by the given id.
    - [TaskScheduleApi::deleteTaskScheduleByIds](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Classes/TaskScheduleApi/deleteTaskScheduleByIds.md) &ndash; Deletes the taskSchedule rows identified by the given ids.
    - [LightTaskSchedulerBaseApi::setPdoWrapper](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Classes/LightTaskSchedulerBaseApi/setPdoWrapper.md) &ndash; Sets the pdoWrapper.
    - [LightTaskSchedulerBaseApi::setContainer](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Classes/LightTaskSchedulerBaseApi/setContainer.md) &ndash; Sets the container.
- [TaskScheduleApiInterface](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Interfaces/TaskScheduleApiInterface.md) &ndash; The TaskScheduleApiInterface interface.
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
    - [TaskScheduleApiInterface::updateTaskSchedule](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Interfaces/TaskScheduleApiInterface/updateTaskSchedule.md) &ndash; Updates the taskSchedule row.
    - [TaskScheduleApiInterface::delete](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Interfaces/TaskScheduleApiInterface/delete.md) &ndash; Deletes the taskSchedule rows matching the given where conditions, and returns the number of deleted rows.
    - [TaskScheduleApiInterface::deleteTaskScheduleById](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Interfaces/TaskScheduleApiInterface/deleteTaskScheduleById.md) &ndash; Deletes the taskSchedule identified by the given id.
    - [TaskScheduleApiInterface::deleteTaskScheduleByIds](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Interfaces/TaskScheduleApiInterface/deleteTaskScheduleByIds.md) &ndash; Deletes the taskSchedule rows identified by the given ids.
- [LightTaskSchedulerApiFactory](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/LightTaskSchedulerApiFactory.md) &ndash; The LightTaskSchedulerApiFactory class.
    - [LightTaskSchedulerApiFactory::__construct](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/LightTaskSchedulerApiFactory/__construct.md) &ndash; Builds the LightTaskSchedulerApiFactoryObjectFactory instance.
    - [LightTaskSchedulerApiFactory::getTaskScheduleApi](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/LightTaskSchedulerApiFactory/getTaskScheduleApi.md) &ndash; Returns a CustomTaskScheduleApiInterface.
    - [LightTaskSchedulerApiFactory::setPdoWrapper](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/LightTaskSchedulerApiFactory/setPdoWrapper.md) &ndash; Sets the pdoWrapper.
    - [LightTaskSchedulerApiFactory::setContainer](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/LightTaskSchedulerApiFactory/setContainer.md) &ndash; Sets the container.
- [LightTaskSchedulerException](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Exception/LightTaskSchedulerException.md) &ndash; The LightTaskSchedulerException class.
- [LightTaskSchedulerService](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Service/LightTaskSchedulerService.md) &ndash; The LightTaskSchedulerService class.
    - [LightTaskSchedulerService::__construct](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Service/LightTaskSchedulerService/__construct.md) &ndash; Builds the LightTaskSchedulerService instance.
    - [LightTaskSchedulerService::setContainer](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Service/LightTaskSchedulerService/setContainer.md) &ndash; Sets the container.
    - [LightTaskSchedulerService::run](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Service/LightTaskSchedulerService/run.md) &ndash; This method IS the task manager.
    - [LightTaskSchedulerService::getFactory](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Service/LightTaskSchedulerService/getFactory.md) &ndash; Returns the factory for this plugin's api.
    - LightLingStandardService01::setOptions &ndash; Sets the options.
    - LightLingStandardService01::install &ndash; Installs the plugin in the light application.
    - LightLingStandardService01::isInstalled &ndash; Returns whether the core install phase of the plugin is fully completed.
    - LightLingStandardService01::uninstall &ndash; Uninstalls the plugin.
    - LightLingStandardService01::getDependencies &ndash; Returns the array of dependencies.
    - LightLingStandardService01::logDebug &ndash; Sends a message to the debug log, only if the useDebug option is set to true.


Dependencies
============
- [Light](https://github.com/lingtalfi/Light)
- [Light_Database](https://github.com/lingtalfi/Light_Database)
- [SimplePdoWrapper](https://github.com/lingtalfi/SimplePdoWrapper)
- [Bat](https://github.com/lingtalfi/Bat)
- [Light_LingStandardService](https://github.com/lingtalfi/Light_LingStandardService)

