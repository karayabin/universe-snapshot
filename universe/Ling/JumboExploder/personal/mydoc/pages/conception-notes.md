Jumbo exploder, conception notes
============
2020-06-09




When you do some parsing, sometimes you're very close were you want to be, but not quite there.

Before you jump to a lexer/parser solution, see if this jumbo exploder can help you.



The idea is to explode a string given a delimiter, but with the added concept of **scopes**.


A scope is something that's ignored by the exploder.

When we call the exploder, it scans the chars of the given string one by one, searching for the delimiter expression.

Scopes allows us to hide some content from the exploder.


For instance, consider this string:

```sql 
  `id` INT NOT NULL AUTO_INCREMENT,
  `user_group_id` INT NOT NULL,
  `identifier` VARCHAR(128) NOT NULL,
  `pseudo` VARCHAR(64) NOT NULL,
  `email` VARCHAR(128) NOT NULL,
  `password` VARCHAR(64) NOT NULL,
  `avatar_url` VARCHAR(512) NOT NULL,
  `extra` TEXT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `pseudo_UNIQUE` (`pseudo` ASC, `password` ASC),
  INDEX `fk_lud_user_lud_user_group1_idx` (`user_group_id` ASC),
  CONSTRAINT `fk_lud_user_lud_user_group1`
    FOREIGN KEY (`user_group_id`)
    REFERENCES `lud_user_group` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE
```

The general idea is that we would like to explode it by commas, but there is a small problem at this line:


```sql
UNIQUE INDEX `pseudo_UNIQUE` (`pseudo` ASC, `password` ASC),
```

So, to remedy this we can define a scope that will ignore all content in parenthesis.

This is done by creating a scope instance, and set the beginning expression to be the opening parenthesis, 
and set the closing expression to be the closing parenthesis.


In this case this would work just fine.

However, some scopes might have an escape character, in particular when you deal with strings that are wrapped with 
double quotes (or single quotes), and you want to allow an escape character (often the backslash character),
so that any character immediately following the escape character will be ignored, and won't accidentally close the scope.



So with the JumboExploder, we can do something like this:


```php
$s = '
  `id` INT NOT NULL AUTO_INCREMENT,
  `user_group_id` INT NOT NULL,
  `identifier` VARCHAR(128) NOT NULL,
  `pseudo` VARCHAR(64) NOT NULL,
  `email` VARCHAR(128) NOT NULL,
  `password` VARCHAR(64) NOT NULL,
  `avatar_url` VARCHAR(512) NOT NULL,
  `extra` TEXT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `pseudo_UNIQUE` (`pseudo` ASC, `password` ASC),
  INDEX `fk_lud_user_lud_user_group1_idx` (`user_group_id` ASC),
  CONSTRAINT `fk_lud_user_lud_user_group1`
    FOREIGN KEY (`user_group_id`)
    REFERENCES `lud_user_group` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE
';

$operations = JumboExploder::explode(',', $s, [
    JumboExploderScope::create()->setStartExpression("(")->setEndExpression(')')
]);
az($operations);


```


This would output something like this:


```html 
array(12) {
  [0] => string(32) "`id` INT NOT NULL AUTO_INCREMENT"
  [1] => string(28) "`user_group_id` INT NOT NULL"
  [2] => string(34) "`identifier` VARCHAR(128) NOT NULL"
  [3] => string(29) "`pseudo` VARCHAR(64) NOT NULL"
  [4] => string(29) "`email` VARCHAR(128) NOT NULL"
  [5] => string(31) "`password` VARCHAR(64) NOT NULL"
  [6] => string(34) "`avatar_url` VARCHAR(512) NOT NULL"
  [7] => string(21) "`extra` TEXT NOT NULL"
  [8] => string(18) "PRIMARY KEY (`id`)"
  [9] => string(59) "UNIQUE INDEX `pseudo_UNIQUE` (`pseudo` ASC, `password` ASC)"
  [10] => string(61) "INDEX `fk_lud_user_lud_user_group1_idx` (`user_group_id` ASC)"
  [11] => string(157) "CONSTRAINT `fk_lud_user_lud_user_group1`
    FOREIGN KEY (`user_group_id`)
    REFERENCES `lud_user_group` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE"
}
```








 

