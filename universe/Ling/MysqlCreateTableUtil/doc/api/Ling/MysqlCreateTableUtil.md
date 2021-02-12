Ling/MysqlCreateTableUtil
================
2019-07-23 --> 2020-12-08




Table of contents
===========

- [Column](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/Column.md) &ndash; The Column class.
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
- [PrimaryKeyAutoIncrementedColumn](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/PrimaryKeyAutoIncrementedColumn.md) &ndash; The PrimaryKeyAutoIncrementedColumn class.
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
- [MysqlCreateTableUtilException](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Exception/MysqlCreateTableUtilException.md) &ndash; The MysqlCreateTableUtilException class.
- [MysqlCreateTableUtil](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/MysqlCreateTableUtil.md) &ndash; The MysqlCreateTableUtil class.
    - [MysqlCreateTableUtil::create](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/MysqlCreateTableUtil/create.md) &ndash; Creates and returns an instance of MysqlCreateTableUtil.
    - [MysqlCreateTableUtil::setEngine](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/MysqlCreateTableUtil/setEngine.md) &ndash; Sets the engine.
    - [MysqlCreateTableUtil::setDefaultCharset](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/MysqlCreateTableUtil/setDefaultCharset.md) &ndash; Sets the defaultCharset.
    - [MysqlCreateTableUtil::addColumn](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/MysqlCreateTableUtil/addColumn.md) &ndash; Adds a column to this instance, and returns itself.
    - [MysqlCreateTableUtil::render](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/MysqlCreateTableUtil/render.md) &ndash; Returns the create table statement for this instance.




