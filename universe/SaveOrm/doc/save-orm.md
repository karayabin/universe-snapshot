Save Orm
=============
2017-08-31



The goal of this orm is to programmatically save data in a database using a simplified api.







Intents
=============


The database is one of the most important thing in an application.

So, you'll probably spend a lot of time interacting with it.

But how do you interact with it?

- we have mysqlWorkBench to create beautiful schemas easily
- then we have the super powerful phpMyAdmin (thanks to the phpMyAdmin dev) to interact with in
    in a graphical way. Super useful in some cases
- but then what do we have to interact with it programmatically?

Ok, there are a lot of tools out there, called ORM, that let you interact programmatically 
with a database.

SaveOrm is just another one.

The intent of SaveOrm is to speed up the development by giving a stable and intuitive way to interact 
with it for creating and updating records.

Retrieving data is not handled now, as it is particularly sensitive to performances
and therefore requires an extra care (but maybe one day?). 



An image is worth a thousand words; when you work with a database, have a schema of it next to you,
you'll have an instant understanding of how data are organized.

In this document, we will work on this one:

[![ekom-events.png](http://lingtalfi.com/img/universe/SaveOrm/ekom-events.png)](http://lingtalfi.com/img/universe/SaveOrm/ekom-events.png)



Now, our goal is that you need nothing more than this schema and a good common sense to work with saveOrm.

Therefore, as you can guess, most of the modelized objects that we will be using will be close to the schema, if not
identical.

In other words, the schema is your best friend.


The following code demonstrates the benefit of using SaveOrm.
It inserts data in the following tables (prefixes dropped for clarity):

- event
- event_lang
- location
- event_has_course
- course


```php
A::quickPdoInit(); // initialize your db object, depends on the framework you are using, I'm using kamille



$event = EventObject::create()
    ->setName("paul" . date('Y-m-d H:i:s'))
    ->setStartDate("2017-12-12")
    ->setEndDate("2017-12-14")
    ->setLocationId(1)
    ->setShopId(1)
    ->createEventLang(EventLangObject::create()
        ->setLangId(1)
        ->setEventId(1)
        ->setLabel("salon vert")
    )
    ->setLocation(LocationObject::create()
        ->setLabel("Location of myriam" . date("Y-m-d H:i:s"))
        ->setAddress("45 rue rue")
        ->setCountryId(1)
        ->setShopId(1)
    )
    ->addCourse(CourseObject::create()
        ->setShopId(1)
        ->setName("the course 1" . date("Y-m-d H:i:s")),
        EventHasCourseObject::create()
            ->setDate("2017-09-01")
            ->setStartTime("13h00")
            ->setEndTime("14h00")
            ->setPresenterGroupId(7)
            ->setCapacity(20)
    );


$om = ObjectManager::create();

a($om->save($event));
a($om->getSaveResults());
```





Approach
============

Our goal is to use an oop oriented api that represents the schema.

So basically, we will create some objects, create some connections between them (more on that later),
and finally call **THE MOST IMPORTANT METHOD**: save.


But before we create some objects, let me explain the vision behind the approach, so that your understanding
and mine are synced.


Here is how we should see the schema:

[![ekom-events.jpg](http://lingtalfi.com/img/universe/SaveOrm/ekom-events.png)](http://lingtalfi.com/img/universe/SaveOrm/ekom-events.png)



As you can see there are three main colors, representing three different types of relationships:

- green: the binding relationship 
- red: the children  relationship
- blue: the sibling relationship


The binding relationship
---------------------------

In a binding relationship, a guest table has a foreign key referencing a host table.
The guest table cannot be the middle table of a children relationship (explained in the next section).
 
Note: this constraint is actually an experimental rule, and could be removed on the future, we will see...


In our schema, there are two binding relationships:

- ekev_event is bound with ekev_event_lang  
- ekev_course is bound with ekev_course_lang  


The ekev_event_lang guest table has a foreign key (event_id) referencing the ekev_event host table (with the key id).
The ekev_course_lang guest table has a foreign key (course_id) referencing the key id of the ekev_course host table.

Neither the ekev_event_lang table nor the ekev_course_lang table are also involved in a children relationship.



That's all we need to know about the binding relationship for now.


The children relationship
---------------------------

The children relationship is a characteristic of the model that binds 3 tables together.
The left table (parent), the middle table, and the right table (children).
The middle table has a foreign key referencing the parent, and a foreign key referencing the child,
and it represents the link between the parent and the child table.
 
It's often known as the many-to-many relationship.


In our schema, we have four children relationships (I'll drop the **ekev_** prefix for readability):

- event -> event_has_course -> course
- location -> location_has_hotel -> hotel
- event_has_course -> event_has_course_has_participant -> participant
- presenter_group -> presenter_group_has_presenter -> presenter


In the first example (and all 4 examples work in the same way), the left table is event,
the middle table is event_has_course, and the right table is course.

The middle table contains a foreign key **event_id** referencing the **id** key of the event table, 
and a foreign key **course_id** referencing the **id** key of the course table.


That's all we need to know about the children relationship for now.



The sibling relationship
---------------------------

The sibling relationship, often referred as the "has relationship" or "one-to-one relationship", 
is a characteristic of the model that binds a left table to a right table, 
so that we can say that the right table is a property of the left table.

This relationship is characterized by the fact that the left table has a foreign key referencing the right table.


In our schema, we have two sibling relationships:

- event -> location
- event_has_course -> presenter_group


In the first example (it works the same for the second example), the left table is event,
the right table is location, and the event table has a foreign key location_id referencing the 
key id in the location table.



That's all we need to know about the sibling relationship for now.




So what now?
----------------

Now that we've identified the three relationships, here is the last set of rules we need to know
in order to understand the global picture of saveOrm:



- when two tables are bound together (binding relationship), we can bind a guest to a host by using
        the host.createGuest method.
        
        Let's give an example.
        Taking our first binding example, we have: 
        event is bound with event_lang, 
        where event is the host and event_lang is the guest.
        Then if we have an imaginary Event object, and EventLang object,
        and if we assume that the create method is a simple constructor call, 
        we basically can bind them using the following:
        
```php
Event::create()->createEventLang( new EventLang )        
```        

- when three tables participate to a children relationship, we can bind them using the addXXX method.
    So for instance, let's take our  "location -> location_has_hotel -> hotel" children relationship.
    
    We can do something like this:


```php
Location::create()->add( new Hotel, new LocationHasHotel )        
Location::create()->add( new Hotel, null ) // this is also possible, the LocationHasHotel will be created automatically with default values        
```        

- when two tables are bound with a sibling relationship, we can connect them using the setXXX method.
    So for instance, if we take our "event -> location" sibling relationship, we can do something
    like this:
    
```php
Event::create()->setLocation( new Location )                
```     
    


So, to recap, here is what we have:


        
```php
// binding
Event::create()->createEventLang( new EventLang )        

// children
Location::create()->add( new Hotel )
Location::create()->add( new Hotel, new LocationHasHotel )        

// sibling
Event::create()->setLocation( new Location )
```        


So, we this three relationships, we will soon be able to record any part of the model to the
actual database :)




Just for fun, here is an ensemble of objects which creates a record in every table of the schema:

```php

A::quickPdoInit(); // initialize your db object, depends on the framework you are using, I'm using kamille


// ekev_presenter_group
$shopId = 1;
$uniqueString = date("Y-m-d H:i:s"); // just to ensure being in insert mode (avoid duplicate error after a refresh)
$countryObj = CountryObject::createByIsoCode("FR");


$event = EventObject::create()
    ->setName("paul" . $uniqueString)
    ->setStartDate("2017-12-12")
    ->setEndDate("2017-12-14")
    ->setLocationId(1)
    ->setShopId($shopId)
    ->createEventLang(EventLangObject::create()
        ->setLangId(1)
        ->setEventId(1)
        ->setLabel("salon vert")
    )
    ->setLocation(LocationObject::create()
        ->setLabel("Location of myriam" . $uniqueString)
        ->setAddress("45 rue rue")
        ->setCountryId(1)
        ->setShopId($shopId)
        ->addHotel(HotelObject::create()
            ->setLabel("Hôtel des paquerettes" . $uniqueString)
            ->setAddress("85 bd mouille")
            ->setCity("Banlieue")
            ->setPostcode("85000")
            ->setShopId($shopId)
            ->setCountry($countryObj))
    )
    ->addCourse(CourseObject::create()
        ->setShopId($shopId)
        ->setName("the course 1" . $uniqueString),
        EventHasCourseObject::create()
            ->setDate("2017-09-01")
            ->setStartTime("13h00")
            ->setEndTime("14h00")
            ->setPresenterGroupId(7)
            ->setCapacity(20)
            ->setPresenterGroup(PresenterGroupObject::create()
                ->setName("MyPresenterGroup" . $uniqueString)
                ->setShopId($shopId)
                ->addPresenter(PresenterObject::create()->setPseudo("Amélie" . $uniqueString)->setShopId($shopId))// create
                ->addPresenter(PresenterObject::create()->setPseudo("Boris" . $uniqueString)->setShopId($shopId)) // create
            )
        ->addParticipant(ParticipantObject::create()
            ->setEmail("maji@gmail.com" . $uniqueString)
            ->setCountry($countryObj)
        )
    );


a($event->save());
```






Implementation notes
===========================
This should be in a separated, more technical, document.



Nomenclature
---------------
In a foreign key relationship:
the **source** references the **target**.
<=> the **source** (column) references the **target** (foreign) table.


So, for the tables below:

### ek_product
- id
- name
- product_type_id


### ek_product_type
- id 
- name


We have the following:

- ek_product.product_type_id is the source 
- ek_product_type.id is the target 



Implementation
---------------

To start with, every object created can be used as a direct interface to the model.
This means we can read the schema and create the object right away.

If we take the ekev_event table for instance, this means we can use it like this:

```php

$o = Event::create();
$o->shop_id = 6;
$o->name = "abc";
$o->start_date = "2017-08-31";
$o->end_date = "2017-08-31";
$o->location_id = 6;


$o->save(); 

```

Couple of notes:

- we use public properties for now, maybe later we wil change them in accessor methods?
- every object has a public static create method to ease chaining
- every object has default values (more on that below)
- note that we have access to EVERY property of the table, even location_id, although
     more ways to set the location_id will be added later.
     This ensures that anybody can always record an object just by reading its properties on the schema    
- every object has a save method, which saves the record into the database (more on that below)
- later the save method could migrate in an external object (objectManager?) to make object more lightweight and simple
    

Same code, but with accessor methods and an external object manager, just to see how it looks like:

```php
$o = Event::create()
    ->setShopId(6)
    ->setName("abc")
    ->setStartDate("2017-08-31")
    ->setEndDate("2017-08-31")
    ->setLocationId(6)
;


//  
ObjectManager::create()->save($o);

```



default values
----------------

What should be the default value for a date?
- 0000-00-00 or the current date

What should be the default value for an active field? 0|1?

By default, we will provide some values depending on the sql type,
but we shall also be able to generate specific default values if we want to.

This will leads us to the generator configuration file (more on this below).

The default values that we will generate are the following:

- if it's a foreign key: null  
- if it's nullable: null  
- if it's an auto-incremented key: null
- if it's an int, float, decimal: 0
- if it's an str (varchar, text,...): "" (empty string)
- if it's a datetime (non nullable): 0000-00-00 00:00:00
- if it's a date (non nullable): 0000-00-00



the save method
-------------------

There is a lot to say about the save method, but the most important thing to understand
is that save will either create a new record, or update an existing record.


So, this means it has to determine whether or not it should do the create operation or the update operation.

Now related to our 3 relationships:

- binding: every sibling bound to the host (with the createXXX method) is saved with it 
- children: every children bound to the parent (with the addXXX method) is saved with it, and so is the middle table 
- sibling: the siblings, if set with the setXXX method, are saved with the original object 


There is a lot more to say about save to understand its internal, but for now let's continue the journey.

The save.md document explains the save method in depth.


Generator configuration file
-------------------------------

The generator config file (aka config file) is where every setting to the generator is done.
It's a php array with the following structure:

```php
$conf = [
    __ => [ // general level options
        
    ],
    object1 => [ // options for object1
    
    ],
    object2 => [ // options for object2
    
    ],
    // ...
];
```
  
So basically, apart from the __ (double underscore) property which represents the generator level
configuration, every other key contains options for a specific object (table).  
  
  
In real life, replace objectX by the classPath to the object, for instance:

```php
SaveOrm\Object\Ekev\EventObject
```  



Table Prefixes
-------------------

Table prefixes are a good thing in a modular environment.
When translated to classNames, table prefixes become a namespace directory.

That's because we don't want the prefix to be part of the class name.

That's just an aesthetic decision.

For example, if we have the ekev_event table, the corresponding object could be one of:

- Ekev\EventObject
- EkevEventObject

In the first case, the "ekev" has been identified as a prefix, whereas in the
second case it has not.

Table prefixes are also used (stripped from the table name) to create keywords
used internally by the ObjectManager.



Note: the Object suffix has been added. This might change in the future.


So, this is our first generator level option: prefixes.




```php
$conf = [
    '__' => [
        'tablePrefixes' => [
            'ekev_',
        ],
    ],
];
```




The base Object
-------------------

Every saveOrm object will extend the base Object.
So that if we want to add a method to all objects at once, we can.

The base Object contains the following methods:

- public static create






Adding Binding relationship layer
----------------------------

Example with a host object Event and a guest object EventLang.


The generator creates the following:


- the Event.eventLang private property, with a default value of null
        
- accessor methods       
        
```php
/**
 * @return null|EventLangObject
 */
public function getEventLang()
{
    return $this->eventLang;
}

public function createEventLang(EventLangObject $eventLang)
{
    $this->eventLang = $eventLang;
    return $this;
}
```        
        
- handling code in the ObjectManager.save method, see the save.md document for more info


To define a binding, we use the config file:

```php
$conf = [
    object1 => [
        bindings: [ table, ... ],
    ],
];
```


The binding accepts what we call **link** in the SaveOrm nomenclature.


### What's a link?

In 99% of the cases, the link is synonym with table.
That's because in 99% of the cases, the guest table will be bound to the host table with no more than ONE foreign key,
and therefore it's not ambiguous which foreign key column was used.

However, technically, I believe that it's possible to have multiple foreign keys from table A to table B.
And so when that's the case, we need to specify WHICH foreign key was used in particular.

A link allows this disambiguation by providing the following syntax:

- link: <table> (<.> <column>)?  


So, if you want, you can use this syntax to avoid disambiguation in all cases:


```php
$conf = [
    object1 => [
        bindings: [ table.id, table2.email ],
    ],
];
```


Basically, the link notation let you tell SaveOrm not only which table you want to associate with, but also the column
used to create the association.







Adding Sibling relationship layer
----------------------------

Example with a source object Event and a sibling object EventLocation.


The generator creates the following:


- the Event.location private property, with a default value of null
        Note: this is somehow "redundant" with the "natural" location_id property.
        
- accessor methods       
        
```php

/**
 * @return null|LocationObject
 */
public function getLocation()
{
    return $this->location;
}

public function setLocation(LocationObject $location)
{
    $this->location = $location;
    return $this;
}    

```        
        
- handling code in the ObjectManager.save method, see the save.md document for more info


The sibling relationships are detected automatically by the generator, since they
are characteristics of the model and not human arbitrary decisions.


We use the "sibling table name without the prefix" as the base to define accessor methods and other things.
The prefix are defined in the config at the generator level (not table level).






Adding Children relationship layer
----------------------------

Example with the following tables:

- event (left table)
- event_has_course (middle table)
- course (right table)


The generator creates the following:


- the Event.courses private property, with a default value of [] (empty array)
        Note: this is the plural of course (more on this below).
        
- accessor methods       
        
```php
/**
 * @return CourseObject[]
 */
public function getCourses()
{
    return $this->courses;
}

public function addCourse(CourseObject $course, EventHasCourseObject $hasObj)
{
    $this->courses[] = $course;
    $course->_has_ = $hasObj;
    return $this;
}

```        
        
- handling code in the ObjectManager.save method, see the save.md document for more info


The children relationships are detected automatically by the generator, since they
are characteristics of the model and not human arbitrary decisions.


### About plural

I forgot to say that if you use the SaveOrm, all your tables must be in singular form,
otherwise results are unpredictable (oops, bummer!).

If you can live with that, then there is the legitimate question of:

- given a singular form, what's the plural form?

Well, I believe we can create a simple function for that for plain english words.



### the _has_ property

The **_has_** public "on the fly" property is the "little trick" saveOrm uses to discretely
bind the "middle" object to the "right" object.

It is used by the ObjectManager, when saving this type of relationship.

 










