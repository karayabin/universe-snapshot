Timelines
==============
2016-02-14


Conception
----------------

Ok, populator is cool, but now I have an events table.
My events table contains all the events of the year (imagine) for a school, 
and for every class.

Meaning, each class has its own program, and all events are merged in the events table.


So, we have multiple timelines merged together in the events table, and that's fine.


Now, to populate a timeline, we cannot just say: I want 3000 events, and call 3000 times an insert callback
with random date times.

That's because time has to make sense, for a given class, we don't want to have overlapping events.

So, somehow, we want a function that call our insert callback and passes a date time to it (or timestamp),
in such a manner that none of those date times overlap; and this should be repeated for every class.



Important note: we will assert that the application dev is able to compute the duration of an event.


The parameters that we should be able to tweak could be:


(for a given timeline, i.e. school class)
- when to start (absolute time)
- when to finish (absolute time)
- given that the dev returns to us the duration of the last inserted event, a base time to wait before calling the next insert callback.
        Basically, a base for the time between two events.
        This base should have some variation, and we should be able to control that variation.
         
        This can be done by specifying both a min and max number of seconds to wait between two events.
         
        - minDelay
        - maxDelay



In terms of notation, here is my suggestion:


timelines:timelineUserTable;percentageOfRows;startTime;endTime;minDelay;maxDelay

timelines:the_classes;100;-2 days;+2 days;0;5*60
        



Notes:
- the semi-colon is used as the component separator because the times could be specified using a datetime which already has colon
- the word timelines is in plural form, that's because we use multiple timelines at once; another system might use only one timeline.
- the percentageOfRows indicates how many rows of the timelineUserTable we should parse. 
- the min and max delay accept mathematical expressions 
- this function uses the timestamp under the hood (and therefore is limited to work with dates between 1900 and 2038) 
- if you want overlapping events, you can go with negative minDelay
 
 
 
 
 
Implementation
----------------

The insert callback should be passed two arguments:

call_user_func_array($insert, [$row, &$startTime]);


The current row of the timeline table (the school class table in the examples above),
and the timestamp representing the start of the event.

This timestamp argument is a reference, and the user is responsible for incrementing it with the event's duration.

Here is how a typical insert callback would work:

```php 
    function ( array:row, int:&startTime ){
    
        QuickPdo::insert(my_school_events, [
            the_classes_id: row[id],    
            start_time: startTime
        ]);
        
        startTime += 3 * 3600; // this event lasts 3 hours...
    }
```







