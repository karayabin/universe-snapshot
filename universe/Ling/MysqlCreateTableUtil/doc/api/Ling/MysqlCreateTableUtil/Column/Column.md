[Back to the Ling/MysqlCreateTableUtil api](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil.md)



The Column class
================
2019-07-23 --> 2020-12-08






Introduction
============

The Column class.



Class synopsis
==============


class <span class="pl-k">Column</span>  {

- Properties
    - protected string [$name](#property-name) ;
    - protected string [$type](#property-type) ;
    - protected int|null [$typeSize](#property-typeSize) ;
    - protected bool [$autoIncrement](#property-autoIncrement) ;
    - protected bool [$nullable](#property-nullable) ;
    - protected bool [$uniqueIndex](#property-uniqueIndex) ;
    - protected string|null [$uniqueIndexId](#property-uniqueIndexId) ;
    - protected bool [$primaryKey](#property-primaryKey) ;
    - protected bool [$foreignKey](#property-foreignKey) ;
    - protected string|null [$foreignKeyReferencedSchema](#property-foreignKeyReferencedSchema) ;
    - protected string|null [$foreignKeyReferencedTable](#property-foreignKeyReferencedTable) ;
    - protected string|null [$foreignKeyReferencedColumn](#property-foreignKeyReferencedColumn) ;
    - protected string [$onDelete](#property-onDelete) ;
    - protected string [$onUpdate](#property-onUpdate) ;

- Methods
    - protected [__construct](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/Column/__construct.md)() : void
    - public static [create](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/Column/create.md)() : [Column](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/Column.md)
    - public [name](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/Column/name.md)(string $name) : [Column](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/Column.md)
    - public [type](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/Column/type.md)(string $type) : [Column](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/Column.md)
    - public [typeSize](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/Column/typeSize.md)(int $typeSize) : [Column](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/Column.md)
    - public [notNullable](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/Column/notNullable.md)() : [Column](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/Column.md)
    - public [autoIncrement](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/Column/autoIncrement.md)() : [Column](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/Column.md)
    - public [uniqueIndex](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/Column/uniqueIndex.md)(?string $indexId = null) : [Column](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/Column.md)
    - public [primaryKey](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/Column/primaryKey.md)() : [Column](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/Column.md)
    - public [foreignKey](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/Column/foreignKey.md)(string $referencedTable, string $referencedColumn, ?string $referencedSchema = null) : [Column](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/Column.md)
    - public [onDelete](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/Column/onDelete.md)(string $action) : [Column](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/Column.md)
    - public [onUpdate](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/Column/onUpdate.md)(string $action) : [Column](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/Column.md)
    - public [getName](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/Column/getName.md)() : string
    - public [getType](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/Column/getType.md)() : string
    - public [getTypeSize](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/Column/getTypeSize.md)() : int | null
    - public [isAutoIncrement](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/Column/isAutoIncrement.md)() : bool
    - public [isNullable](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/Column/isNullable.md)() : bool
    - public [isUniqueIndex](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/Column/isUniqueIndex.md)() : bool
    - public [isPrimaryKey](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/Column/isPrimaryKey.md)() : bool
    - public [getUniqueIndexId](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/Column/getUniqueIndexId.md)() : string | null
    - public [isForeignKey](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/Column/isForeignKey.md)() : bool
    - public [getForeignKeyReferencedSchema](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/Column/getForeignKeyReferencedSchema.md)() : string | null
    - public [getForeignKeyReferencedTable](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/Column/getForeignKeyReferencedTable.md)() : string | null
    - public [getForeignKeyReferencedColumn](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/Column/getForeignKeyReferencedColumn.md)() : string | null
    - public [getOnDelete](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/Column/getOnDelete.md)() : string
    - public [getOnUpdate](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/Column/getOnUpdate.md)() : string

}




Properties
=============

- <span id="property-name"><b>name</b></span>

    This property holds the name for this instance.
    
    

- <span id="property-type"><b>type</b></span>

    This property holds the type for this instance.
    The available types are the mysql columns types (https://dev.mysql.com/doc/refman/8.0/en/data-types.html).
    The most common of which being:
    
    - int
    - tinyint
    - varchar
    - text
    - char
    
    

- <span id="property-typeSize"><b>typeSize</b></span>

    This property holds the typeSize for this instance.
    
    Some types have a size, for instance in the type varchar(512),
    the type is varchar and the typesize is 512.
    
    

- <span id="property-autoIncrement"><b>autoIncrement</b></span>

    This property holds the whether this column is auto-incremented.
    
    

- <span id="property-nullable"><b>nullable</b></span>

    This property holds whether this column is nullable.
    
    

- <span id="property-uniqueIndex"><b>uniqueIndex</b></span>

    This property holds whether this column is an unique index.
    
    

- <span id="property-uniqueIndexId"><b>uniqueIndexId</b></span>

    This property holds the uniqueIndexId for this instance.
    Some unique indexes are composed of multiple columns,
    if that is the case, we use the same unique index id on all the columns
    of the unique index.
    
    For unique indexes that use only one column, the unique index id is null.
    
    

- <span id="property-primaryKey"><b>primaryKey</b></span>

    This property holds whether this column is a primary key.
    
    

- <span id="property-foreignKey"><b>foreignKey</b></span>

    This property holds whether this column is a foreignKey.
    
    

- <span id="property-foreignKeyReferencedSchema"><b>foreignKeyReferencedSchema</b></span>

    This property holds the foreignKeyReferencedSchema for this instance.
    
    

- <span id="property-foreignKeyReferencedTable"><b>foreignKeyReferencedTable</b></span>

    This property holds the foreignKeyReferencedTable for this instance.
    
    

- <span id="property-foreignKeyReferencedColumn"><b>foreignKeyReferencedColumn</b></span>

    This property holds the foreignKeyReferencedColumn for this instance.
    
    

- <span id="property-onDelete"><b>onDelete</b></span>

    This property holds the referential action for the DELETE operation.
    See [mysql documentation](https://dev.mysql.com/doc/refman/8.0/en/create-table-foreign-keys.html) for more details.
    
    Possible values are:
    - cascade
    - setNull
    - restrict (default)
    - noAction
    - setDefault
    
    

- <span id="property-onUpdate"><b>onUpdate</b></span>

    This property holds the referential action for the UPDATE operation.
    See [mysql documentation](https://dev.mysql.com/doc/refman/8.0/en/create-table-foreign-keys.html) for more details.
    
    Possible values are:
    - cascade
    - setNull
    - restrict (default)
    - noAction
    - setDefault
    
    



Methods
==============

- [Column::__construct](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/Column/__construct.md) &ndash; Builds the Column instance.
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
Ling\MysqlCreateTableUtil\Column\Column<br>
See the source code of [Ling\MysqlCreateTableUtil\Column\Column](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/Column/Column.php)



SeeAlso
==============
Next class: [PrimaryKeyAutoIncrementedColumn](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/PrimaryKeyAutoIncrementedColumn.md)<br>
