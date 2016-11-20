MysqlTabular
==================
2015-10-03



What is it useful for?
---------------------------

Generate a mysql table with the "console" format, like this:
  
	+----+--------------+-----------+---------------------+--------+
	| id | committer_id | the_name  | publish_date        | active |
	+----+--------------+-----------+---------------------+--------+
	| 68 |           15 | pou       | 2015-10-02 09:29:02 |      0 |
	| 67 |           14 | r         | 2015-10-02 09:22:52 |      0 |
	| 66 |           13 | zezer     | 2015-10-02 07:59:16 |      0 |
	| 65 |           13 | ze        | 2015-10-02 07:58:21 |      0 |
	| 64 |           13 | pjzpeée   | 2015-10-02 07:37:46 |      0 |
	| 63 |           13 | pjzper    | 2015-10-02 07:20:16 |      0 |
	| 62 |           13 | zer       | 2015-10-02 06:59:53 |      0 |
	| 60 |           12 | sdf       | 2015-10-02 06:52:51 |      0 |
	| 59 |           11 | Chun li   | 2015-09-30 14:03:27 |      0 |
	| 58 |           11 | Boris Pan | 2015-09-30 13:50:51 |      0 |
	+----+--------------+-----------+---------------------+--------+



Usage
-----------



```php
$stmt = <<<EEE
select id, committer_id, the_name, publish_date, active from ideas order by publish_date desc limit 0,10
EEE;

// Here, use any method that you like to generate the rows
$rows = QuickPdo::fetchAll($stmt);


$o  = new MysqlTabularAssocUtil();
echo $o->renderRows($rows);

```






