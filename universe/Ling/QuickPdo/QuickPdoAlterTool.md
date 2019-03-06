QuickPdoAlterTool
=================
2018-04-14



What is it?
-------------------


It's a companion for the [QuickPdo](https://github.com/lingtalfi/QuickPdo) tool to perform alter operations.
 



addColumn
--------------

```php
addColumn(string $table, string $column, string $columnType = null, string $after = null): bool
```


```php
a(QuickPdoAlterTool::addColumn("ek_carrier", "carrier_id", "int")); // after is not specified, will add the column after all others
a(QuickPdoAlterTool::addColumn("ek_carrier", "carrier_test", "varchar(128)", "label")); // after is specified here
```


