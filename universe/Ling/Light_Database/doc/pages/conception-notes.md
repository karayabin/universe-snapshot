Light_Database conception notes
==============
2019-12-16



Hooks
------------

Light_Database provides hooks for every database operation that change the database state:

- insert
- replace
- update
- delete


Those hooks will allow plugin to implement their logic based on such operations.
For instance, if a new user has been registered in an application, we could send an email to the moderator, etc...


Use **Light_Database** only when you interact with your database and this hook system that we provide will be only stronger/more consistent.


Our hooks trigger events, and plugins who want to can listen to those events.

See [our events page](https://github.com/lingtalfi/Light_Database/blob/master/personal/mydoc/pages/events.md) to see the events triggered under the hood.



