Light_DbSynchronizer
===========
2020-06-09 -> 2020-06-22




The goal of this tool is to synchronize parts of an existing database from a **create file**, which is a sql file which contains **create table** statements.


It's a semi-automated tool, meaning it assists you in doing the synchronization, but you still have to put some work do get the job done.
In particular, whenever you have renamed something, like a table or a column, then you need to tell this tool which element you renamed,
and what you renamed it into. This is explained throughout this document under the term **rename marker**.




So the idea is that this tool reads the **create file**, and might either add new tables to the existing database, or update the table structure,
or even remove tables.

For the removing of tables, our tool will only remove a table if it's in a list provided by the user (to avoid accidental removal of important tables).

Note: the **create file** might contains other statements, such as drop statements, but our tool doesn't care about them, it just
parses the **create table** statements. So basically you can use files generated with tools such as MysqlWorkBench to generate your **create files**.





Due to some technical difficulties, the synchronization will not be perfect, and you might want to double check the work done by this tool.
Below I'll give more details about what this tool shall do without problems, and what are the gray areas where this tool is not very helpful.



So, adding tables (that are in the **create file** but not existing database) is quite straightforward and shouldn't cause any problem, unless the table
you're trying to add doesn't fit the existing database (for instance it defines a foreign key in a table that doesn't exist, things like that).


Same with deleting tables (that are not in the **create file**, are in the existing database, and are defined by the user as deletable tables): you can expect this to work fine.
This tool will actually disable foreign key checks and unique key checks before deleting the table(s).


The user defines the deletable tables when calling the script, and/or when defining **table rename markers** (see the rename items section below). 


By default, if you rename a table, this tool won't know about it unless you use the "rename" markup in your **create file**,
see more about the **rename markup** in the renaming items section in this document.

So, if you rename a table and the tool is not aware of it, it will drop the table with the old name, and create a new one with the new name,
which in most cases is not what you want (especially if your table is not empty).


The same logic applies at the column level: if you rename a column but don't tell the tool about it, the tool by default will drop the column with the old name,
and recreate a new one with the new name, which will delete the rows for that column if any.

Therefore, we recommend using the **rename markup** described in the "Rename items" section of this document, to prevent those accidents to occur.


Note: if your table is empty, or you don't care of its content, then you can ignore **rename markup** to get to your ends faster (i.e. without writing the rename markup).



The tool is divided in different sections:

One is for detecting table renaming (using the **rename markers**).

Another one is used to detect the table structure changes (and column renaming using **rename markers**).




Algorithm for table structure change detection
------------
2020-06-18 -> 2020-06-19



Before we start, let me just say that this algorithm is not perfect, its main flaw lies in the "replace or rename" problem explained in the next section.

That being said, it can still be useful in some cases (hence its existence).


So this algorithm applies for table which contain rows. 

Table which don't contain rows are handled by a different algorithm.


### columns

The algorithm only does the "safe" things, which means he only execute statements that it thinks are in complete accordance with 
the original intent behind the statement. 


It starts by altering the column which name didn't change, but which other properties have changed (such as the type, the nullability, etc...).


Then, unless a column is marked as **renamed**, it does the following **column-drop-create** algorithm:

- Remove each columns that exists in the current table, but not in the new structure
- Adds any column that exist in the new structure but not in the current table


For more info about **renamed** columns, see the "Renaming items" section.


### indexes and keys


For indexes and keys, which includes:

- unique indexes
- (regular) indexes
- primary keys
- foreign keys


This tool uses the same approach: if a change is detected, it drops the key/index and recreates it.
This generally works, unless some sql (consistency) rule is violated.


### engine

This tool can also detect/alter changes of the engine (although I personally have never used it). 







Problem: replace or rename, which one was it?
--------------
2020-06-18

There are some cases where I couldn't guess the intent behind the action, in particular when the user renames a column, how can I know if he renamed a column or replaced one?


In the end, my answer was: I cannot.


For instance, imagine the current database contains a **fruit** table with the following structure:


- id: pk
- name: varchar 64



Now let's say the user provides a **create file** with a definition of the **fruit** table which looks like this:


- id: pk
- label: varchar 64


In that particular case, a human can make the assumption that label is an equivalent for name, and therefore could assume that the intent behind
the change was to rename the column.


But now let's imagine that the new structure looked like this instead:

- id: pk
- category: varchar 64


Now again, as an human, we can make the assumption that name and category is NOT the same (or is the same, depending on how you reason about this).
And so we can either choose to replace or rename the column.



Whether it's a replacement or a renaming matters, because it will affect whether the existing rows (if any).
A rename operation would typically keep the rows, while a replace operation would drop them.


So this decision of choosing whether it's a replace or a rename type of change is important, and therefore cannot be taken lightly.

As human we see that we already have some troubles (in some cases) to find out which was the intent of the change, so it's safe to assume that a php program
will do an even worse job at guessing that intent.

So in the end, this tool won't make this decision.

But if this tool cannot rename columns, it's usage become very limited, almost obsolete.

That's why I'm giving you a workaround, described in the next section.




Renaming items
------------
2020-06-18


The pragmatical intent of this tool is to update the database automatically when a plugin author changes
the structure of his tables.

Renaming is a very common thing that we, plugin authors, do.
So if this tool cannot detect renamed columns, we might not use this tool at all, and rather alter the database manually.


This is one option: don't use this tool at all, and update things manually.

But personally, I will use this tool, with caution. I'm adding this workaround:


in the **create file**, I'm adding this "special statement" syntax:

```sql
-- @rename lud_user:name->maurice
```

A special statement must fit on one line.

If you rename multiple columns, just use multiple "special statements", one per line:


```sql
-- @rename lud_user:name->label
-- @rename lud_user:description->biography
```


We can also indicate the renamed tables, by adding the table prefix, like this:

```sql
-- @rename table lud_user->lud_user2
```

Optionally, we can add the column prefix to indicate column renaming, in order to make the syntax more consistent:


```sql
-- @rename column lud_user:name->label
-- @rename column lud_user:description->biography
-- @rename table lud_user->lud_user2
```




So, as we can we use the sql comment (double dash followed by space at the beginning of the line), so that we can safely add those
special statements to the **create file**.


The idea with those special statements is to tell the tool which columns/tables have been renamed.

By doing so, we still can benefit for the few automated operations that this tool provide, which might be a little faster
than doing the synchronization by hand.

But the price to pay is to not forget to:

- add those special statements in the **create file** (otherwise the tool might delete rows/tables that you wanted to preserve)
- it's recommended to remove those special statements after immediately the update, otherwise they will clutter up your **create file**,
    making it less readable, and it might create conflicts with the next synchronization session.













Create file
========
2020-06-22


A **create file** is a file that contains sql statements to create the tables for a given plugin.


Our plugin basically parses the **create file** and can then synchronizes the current database with it. 


  





Logging
=========
2020-06-19

This tool uses the [Light_Logger](https://github.com/lingtalfi/Light_Logger) plugin to log two types of messages:


- debug messages
- error messages


Debug messages include error messages.


By default, debug messages are sent on the **db_synchronizer.debug** channel, in a file: **${app_dir}/log/db_synchronizer_debug.txt**,
and error messages are sent on the **db_synchronizer.error** channel, in a file: **${app_dir}/log/db_synchronizer_error.txt**.

The debug messages file is reset on every call to the tool's **synchronize** method (I found this is practical to debug to have a clean debug page every time). 

You can change any of this from the service configuration.


The logged errors are all failed statements, such as:

- SQLSTATE[HY000]: General error: 1553 Cannot drop index 'PRIMARY': needed in a foreign key constraint
- ...


In other words, whenever a "synchronization statement" fails, it will be reported in the logs.


The debug log will trace all the steps taken by the tool.
 
This includes all the executed statements.

As the name suggests, it's useful for debugging.