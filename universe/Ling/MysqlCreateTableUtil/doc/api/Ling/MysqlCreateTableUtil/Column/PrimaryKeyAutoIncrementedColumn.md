[Back to the Ling/MysqlCreateTableUtil api](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil.md)



The PrimaryKeyAutoIncrementedColumn class
================
2019-07-23 --> 2019-07-23






Introduction
============

The PrimaryKeyAutoIncrementedColumn class.



Class synopsis
==============


class <span class="pl-k">PrimaryKeyAutoIncrementedColumn</span> extends [Column](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/Column.md)  {

- Inherited properties
    - protected string [Column::$name](#property-name) ;
    - protected string [Column::$type](#property-type) ;
    - protected int|null [Column::$typeSize](#property-typeSize) ;
    - protected bool [Column::$autoIncrement](#property-autoIncrement) ;
    - protected bool [Column::$nullable](#property-nullable) ;
    - protected bool [Column::$uniqueIndex](#property-uniqueIndex) ;
    - protected string|null [Column::$uniqueIndexId](#property-uniqueIndexId) ;
    - protected bool [Column::$primaryKey](#property-primaryKey) ;
    - protected bool [Column::$foreignKey](#property-foreignKey) ;
    - protected string|null [Column::$foreignKeyReferencedSchema](#property-foreignKeyReferencedSchema) ;
    - protected string|null [Column::$foreignKeyReferencedTable](#property-foreignKeyReferencedTable) ;
    - protected string|null [Column::$foreignKeyReferencedColumn](#property-foreignKeyReferencedColumn) ;
    - protected string [Column::$onDelete](#property-onDelete) ;
    - protected string [Column::$onUpdate](#property-onUpdate) ;

- Methods
    - protected [__construct](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/PrimaryKeyAutoIncrementedColumn/__construct.md)() : void

- Inherited methods
    - public static [Column::create](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/Column/create.md)() : [Column](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/Column.md)
    - public [Column::name](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/Column/name.md)(string $name) : [Column](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/Column.md)
    - public [Column::type](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/Column/type.md)(string $type) : [Column](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/Column.md)
    - public [Column::typeSize](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/Column/typeSize.md)(int $typeSize) : [Column](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/Column.md)
    - public [Column::notNullable](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/Column/notNullable.md)() : [Column](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/Column.md)
    - public [Column::autoIncrement](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/Column/autoIncrement.md)() : [Column](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/Column.md)
    - public [Column::uniqueIndex](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/Column/uniqueIndex.md)(string $indexId = null) : [Column](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/Column.md)
    - public [Column::primaryKey](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/Column/primaryKey.md)() : [Column](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/Column.md)
    - public [Column::foreignKey](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/Column/foreignKey.md)(string $referencedTable, string $referencedColumn, string $referencedSchema = null) : [Column](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/Column.md)
    - public [Column::onDelete](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/Column/onDelete.md)(string $action) : [Column](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/Column.md)
    - public [Column::onUpdate](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/Column/onUpdate.md)(string $action) : [Column](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/Column.md)
    - public [Column::getName](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/Column/getName.md)() : string
    - public [Column::getType](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/Column/getType.md)() : string
    - public [Column::getTypeSize](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/Column/getTypeSize.md)() : int | null
    - public [Column::isAutoIncrement](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/Column/isAutoIncrement.md)() : bool
    - public [Column::isNullable](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/Column/isNullable.md)() : bool
    - public [Column::isUniqueIndex](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/Column/isUniqueIndex.md)() : bool
    - public [Column::isPrimaryKey](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/Column/isPrimaryKey.md)() : bool
    - public [Column::getUniqueIndexId](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/Column/getUniqueIndexId.md)() : string | null
    - public [Column::isForeignKey](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/Column/isForeignKey.md)() : bool
    - public [Column::getForeignKeyReferencedSchema](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/Column/getForeignKeyReferencedSchema.md)() : string | null
    - public [Column::getForeignKeyReferencedTable](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/Column/getForeignKeyReferencedTable.md)() : string | null
    - public [Column::getForeignKeyReferencedColumn](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/Column/getForeignKeyReferencedColumn.md)() : string | null
    - public [Column::getOnDelete](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/Column/getOnDelete.md)() : string
    - public [Column::getOnUpdate](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/Column/getOnUpdate.md)() : string

}






Methods
==============

- [PrimaryKeyAutoIncrementedColumn::__construct](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/PrimaryKeyAutoIncrementedColumn/__construct.md) &ndash; Builds the PrimaryKeyAutoIncrementedColumn instance.
- [Column::create](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/Column/create.md) &ndash; Creates a new instance and returns it.
- [Column::name](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/Column/name.md) &ndash; Sets the name of the column and returns the current instance.
- [Column::type](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/Column/type.md) &ndash; Sets the type of the column and returns the current instance.
- [Column::typeSize](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/Column/typeSize.md) &ndash; Sets the type size of the column and returns the current instance.
- [Column::notNullable](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/Column/notNullable.md) &ndash; Sets the nullable value of this instance to false and returns the current instance.
- [Column::autoIncrement](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/Column/autoIncrement.md) &ndash; Sets the autoIncrement property to true and returns the current instance.
- [Column::uniqueIndex](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/Column/uniqueIndex.md) &ndash; Sets the uniqueIndex property to true and returns the current instance.
- [Column::primaryKey](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/Column/primaryKey.md) &ndash; Sets the primaryKey property to true and returns the current instance.
- [Column::foreignKey](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/Column/foreignKey.md) &ndash; Sets the foreign key and returns the current instance.
- [Column::onDelete](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/Column/onDelete.md) &ndash; Sets the referential action for the DELETE operation and returns the current instance.
- [Column::onUpdate](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/Column/onUpdate.md) &ndash; Sets the referential action for the UPDATE operation and returns the current instance.
- [Column::getName](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/Column/getName.md) &ndash; Returns the name of this instance.
- [Column::getType](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/Column/getType.md) &ndash; Returns the type of this instance.
- [Column::getTypeSize](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/Column/getTypeSize.md) &ndash; Returns the typeSize of this instance.
- [Column::isAutoIncrement](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/Column/isAutoIncrement.md) &ndash; Returns the autoIncrement of this instance.
- [Column::isNullable](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/Column/isNullable.md) &ndash; Returns the nullable of this instance.
- [Column::isUniqueIndex](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/Column/isUniqueIndex.md) &ndash; Returns the uniqueIndex of this instance.
- [Column::isPrimaryKey](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/Column/isPrimaryKey.md) &ndash; Returns the primaryKey of this instance.
- [Column::getUniqueIndexId](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/Column/getUniqueIndexId.md) &ndash; Returns the uniqueIndexId of this instance.
- [Column::isForeignKey](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/Column/isForeignKey.md) &ndash; Returns the foreignKey of this instance.
- [Column::getForeignKeyReferencedSchema](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/Column/getForeignKeyReferencedSchema.md) &ndash; Returns the foreignKeyReferencedSchema of this instance.
- [Column::getForeignKeyReferencedTable](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/Column/getForeignKeyReferencedTable.md) &ndash; Returns the foreignKeyReferencedTable of this instance.
- [Column::getForeignKeyReferencedColumn](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/Column/getForeignKeyReferencedColumn.md) &ndash; Returns the foreignKeyReferencedColumn of this instance.
- [Column::getOnDelete](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/Column/getOnDelete.md) &ndash; Returns the onDelete of this instance.
- [Column::getOnUpdate](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/Column/getOnUpdate.md) &ndash; Returns the onUpdate of this instance.





Location
=============
Ling\MysqlCreateTableUtil\Column\PrimaryKeyAutoIncrementedColumn<br>
See the source code of [Ling\MysqlCreateTableUtil\Column\PrimaryKeyAutoIncrementedColumn](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/Column/PrimaryKeyAutoIncrementedColumn.php)



SeeAlso
==============
Previous class: [Column](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/Column.md)<br>Next class: [MysqlCreateTableUtilException](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Exception/MysqlCreateTableUtilException.md)<br>
