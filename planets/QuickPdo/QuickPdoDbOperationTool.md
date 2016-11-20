QuickPdoDbOperationTool
=================
2016-01-26



What is it?
-------------------


It's a companion for the [QuickPdo](https://github.com/lingtalfi/QuickPdo) tool to perform various database operations.
 



 


Methods
------------



### rebaseAutoIncrement


```php
void function rebaseAutoIncrement ( str:table, str:autoIncrementField=id )
```

Update the auto-incremented field of every rows so that the auto-incremented field values 
are consecutive integers, starting at 1 (i.e., 1, 2, 3, ...).
 


### truncate


```php
void function truncate ( str:table)
```

Truncates a table.
 
