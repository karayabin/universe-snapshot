Fetch all components
==============
2020-07-07




Fetch all components are utility classes that can be used to help writing a sql query programmatically, rather than manually.


The available components are:

- [Columns](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Columns.md)
- [Where](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where.md)
- [OrderBy](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/OrderBy.md)
- [Limit](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Limit.md)




An imaginary example would look like this:

```php

$now = date("Y-m-d H:i:s"); 
$rows = $this->getFactory()->getTaskScheduleApi()->fetchAll([
    Columns::inst()->set('id')->singleColumn(),
    Where::inst()->key("execution_end_date")->isNull()->and()->key("scheduled_date")->lessThan($now),
    OrderBy::inst()->add("scheduled_date", 'desc'),
    Limit::inst()->set(0,1),
]);

```