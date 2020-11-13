Light_UserNotifications, conception notes
================
2020-07-31 -> 2020-08-13




A notification system for light users.

We use a database to store notifications.

The notifications we envision are things like:

- plugin ABC has been installed
- user Gilbert has subscribed to your newsletter


See our [createFile](https://github.com/lingtalfi/TheBar/blob/master/discussions/create-file.md) for more details about the database structure.


Basically, the notification has two status: normal (0) and deleted (1).

We keep deleted notifications for x=30 days, where x can be configured at the service level.

I didn't bother creating user level preferences for that one, since once the notification is deleted, the user doesn't see it anyway.


We provide a [task scheduler](https://github.com/lingtalfi/Light_TaskScheduler) task that we recommend using every day,
which will do the removal of notifications older than x days.
It's the **executeCleaningRoutine** method of our service.





We want the user to be able to unsubscribe from certain types of notifications.

For instance, this notification:

- user Gilbert has subscribed to your newsletter

might be something the user doesn't want to receive.


So we have this concept of **feeder**, which is the name of the plugin who provides the notification message.

Each notification message has a **feeder**, and a **type**, which is like a notification message identifier, and is unique
per **feeder**, so that the user can filter which messages he receives from a particular **feeder**.

Whether the user is allowed to disable a notification from a feeder depends on the service providing the notification.
By default, a notification can't be disabled by the user, unless the plugin providing that notification explicitly allows the user to do so.

In order to allow users to disable notifications, we recommend that plugin authors use the [Light_UserPreferences](https://github.com/lingtalfi/Light_UserPreferences) service. 




 




