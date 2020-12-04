Light_LoginNotifier
===========
2020-11-30




The idea behind this plugin is to do something when a user logs in.

Now which app the user logs in is not our concern.

This plugin focuses on the "what do we do" part, and let the client detect when the user actually logs in,
and call our methods if it needs them.


So what can our service do:

- send a mail to the successfully connected user
- send a mail to an admin (or more than one admin) when a user logs in successfully
- keep track of the date and user info in a table when the user logs in successfully



This is done via our configuration options, which are hopefully self-explanatory:


- send_notification_to_user: bool=false
- send_notification_to_admin: string|array of recipients|null  
- record_to_db: bool=false





