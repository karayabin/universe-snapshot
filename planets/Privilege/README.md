Privilege
==================
2016-11-23



Grant privileges to your users.






Intro
============
In a website, most pages are accessible by everybody.

However, in some cases, like a website admin, you might need to log in in order to even see the website.

Then, once logged, you some functionalities (such as editing a specific column in the database) might only be 
accessible to you if you have a special privilege.

Handling those permissions questions is the main focus of Privilege: who can do what?

So, if you have a front with premium users, Privilege can help you with that too.

If you have a back-end application, Privilege can help you also.







Basic concepts
=====================

In Privilege.

A privilege is the right to do a certain thing.

A privilege user only can own privileges.

This means that if a user is not a user privilege, the Privilege framework will always refute all her requests.

In order to become a privilege user, one has to log in (as a privilege user).

The log in process is commonly done via an html form on a php page, or programmatically via the php code of the application.

The main method is Privilege::has( $requestedPrivilege ), which returns a boolean: whether or not the Privilege framework
grants the requested privilege to the privileged user. 

Again, if the privilege user is not logged in, this method will always return false (just to be clear).





Define the privileges
=========================

By default, a privilege is just a string that you either have or don't have.

You could store the privileges for a "profile" in a php array, in a file, or in a database.

If you don't have the privilege string, then by default you don't have the privilege.


When you create the privileges array, the key is the profile name, and the value is an array containing all the privileges
for this profile.


Here is an example:

```php
$profiles = [
    'root' => [
        '*', // this is a special notation which means: all privileges granted, we'll talk about that later
    ], 
    'moderator' => [
        'editPosts',
        'readPosts',
        'blameUser',
    ],
    'maintenance-guy' => [
        'startMaintenance',
        'endMaintenance',
    ],
];
```

Note: all the other storage (a config file, a database, ...) will ultimately be converted to this php array form.

How you bind a user to a profile is up to you and is not defined in the Privilege framework.

So far, so good, but there are a couple things that you might have asked yourself:

- who defines those privileges in the first place?
- so if I have 1000 privileges, I have to put 1000 strings in my array, isn't that suboptimal?



The nullos crud module example
-----------

In nullos, some part of the code is organized in modules. Each module provide its own privileges.

Nullos has the crud module, which defines all the privileges related to the database interaction:

has the user the privilege to delete a row in this table, can he edit this column, and so on...


The crud module in nullos actually allows the developer to grant privileges at the table level, but also at the column level,
for all the main actions: insert, update, delete.
  
Since a privilege is just a string, the crud privileges uses the following notations:
  
- crud privilege: 
    - $action.$table.$column, where action can be one of: insert, update or delete
    - page.$table, this defines whether or not the user can access the page related to a given table
    
    
As you can imagine, since there are a lot of columns, if we had to write down all the privileges, it's easy to see how the task of assigning the privileges
would be inefficient.

That's why we use a trick: the namespace convention and the wildcards.


Namespace convention and wildcards
------------------------------------------

The namespace convention is just a way of organizing your privileges in categories.

The name of the privilege always start with the biggest category, and goes down and down until it reaches its target (like russian dolls).

All categories in the privileges are separated by a dot.

The following fictitious example might help understanding what I meant:
 
- world.country.city.person


Okay. But what if I want to specify all the persons from the city?
Easy, you know it, use a wildcard instead of "person", like this:

- world.country.city.*
 
 
So, if you want to create a profile with all privileges granted, just give him the following privilege:
 
- *
 
 
 
As for now, the asterisk wildcard must always be the last char in the privilege string, which means that the following is invalid:
 
- world.country.*.person 
 

The Privilege and PrivilegeUser classes
--------------------------------------------

So what's the design?

The Privilege object stores the profiles definition (the profile array).

The PrivilegeUser stores the user in php session.

In particular, it stores the profile of the user in the php session.

Note that it doesn't store the list of privileges, which means every user must have a profile (I chose this design 
to not put too much data in the php session).






History Log
------------------
    
- 1.2.0 -- 2016-11-30

    - add disconnect destroy cookie parameter
    - fix PrivilegeUser.$sessionTimeout bug won't disconnect
    
- 1.1.0 -- 2016-11-26

    - PrivilegeUser.$sessionTimeout now accepts infinite timeout

- 1.0.0 -- 2016-11-23

    - initial commit



