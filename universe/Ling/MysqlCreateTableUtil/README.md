MysqlCreateTableUtil
===========
2019-07-23



A tool to create a basic mysql create table statement.


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/MysqlCreateTableUtil
```

Or just download it and place it where you want otherwise.






Summary
===========
- [MysqlCreateTableUtil api](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- [How to use](#how-to-use)



How to use
===========


The following:

```php
$util = MysqlCreateTableUtil::create("user", "mydb");
$util->setEngine('InnoDB');
$util->setDefaultCharset('utf8');
$util->addColumn(PrimaryKeyAutoIncrementedColumn::create()->name("id"));
//$util->addColumn(Column::create()->name("id")->type('int')->typeSize(11)->notNullable()->autoIncrement()->primaryKey());
$util->addColumn(Column::create()->name("user_id")->type('varchar')->typeSize(128)->notNullable()->uniqueIndex());
$util->addColumn(Column::create()->name("password")->type('varchar')->typeSize(64)->notNullable());
$util->addColumn(Column::create()->name("rights")->type('text')->notNullable());
$util->addColumn(Column::create()->name("avatar_url")->type('varchar')->typeSize(512)->notNullable());
$util->addColumn(Column::create()->name("pseudo")->type('varchar')->typeSize(64)->notNullable());
$util->addColumn(Column::create()->name("extra")->type('varchar')->typeSize(64)->notNullable());
$util->addColumn(Column::create()->name("address_id")->type('int')->typeSize(11)->notNullable()
    ->foreignKey("address", "id")->onUpdate("cascade")->onDelete("cascade")
);

a($util->render());
```

Will produce an output like this:

```html
string(592) "CREATE TABLE IF NOT EXISTS `mydb`.`user` (
`id` INT(11) NOT NULL AUTO_INCREMENT,
`user_id` VARCHAR(128) NOT NULL,
`password` VARCHAR(64) NOT NULL,
`rights` TEXT NOT NULL,
`avatar_url` VARCHAR(512) NOT NULL,
`pseudo` VARCHAR(64) NOT NULL,
`extra` VARCHAR(64) NOT NULL,
`address_id` INT(11) NOT NULL,
PRIMARY KEY (`id`),
UNIQUE INDEX `user_id_UNIQUE` (`user_id` ASC),
INDEX `fk_user_address_idx` (`address_id` ASC),
CONSTRAINT `fk_user_address_idx`
FOREIGN KEY (`address_id`)
REFERENCES `mydb`.`address` (`id`)
ON DELETE CASCADE
ON UPDATE CASCADE
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;"

```


Note: the created statement is based on my observations of the MysqlWorkBench utility.



History Log
=============

- 1.0.2 -- 2019-07-23

    - fix typo 
    
- 1.0.1 -- 2019-07-23

    - update docTools documentation 
    
- 1.0.0 -- 2019-07-23

    - initial commit