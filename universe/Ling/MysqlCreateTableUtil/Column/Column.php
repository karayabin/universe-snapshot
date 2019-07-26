<?php


namespace Ling\MysqlCreateTableUtil\Column;


/**
 * The Column class.
 */
class Column
{

    /**
     * This property holds the name for this instance.
     * @var string
     */
    protected $name;

    /**
     * This property holds the type for this instance.
     * The available types are the mysql columns types (https://dev.mysql.com/doc/refman/8.0/en/data-types.html).
     * The most common of which being:
     *
     * - int
     * - tinyint
     * - varchar
     * - text
     * - char
     *
     *
     * @var string
     */
    protected $type;

    /**
     * This property holds the typeSize for this instance.
     *
     * Some types have a size, for instance in the type varchar(512),
     * the type is varchar and the typesize is 512.
     *
     *
     *
     * @var int|null
     */
    protected $typeSize;

    /**
     * This property holds the whether this column is auto-incremented.
     * @var bool = false
     */
    protected $autoIncrement;

    /**
     * This property holds whether this column is nullable.
     * @var bool = true
     */
    protected $nullable;

    /**
     * This property holds whether this column is an unique index.
     * @var bool = false
     */
    protected $uniqueIndex;

    /**
     * This property holds the uniqueIndexId for this instance.
     * Some unique indexes are composed of multiple columns,
     * if that is the case, we use the same unique index id on all the columns
     * of the unique index.
     *
     * For unique indexes that use only one column, the unique index id is null.
     *
     *
     * @var string|null
     */
    protected $uniqueIndexId;

    /**
     * This property holds whether this column is a primary key.
     * @var bool = false
     */
    protected $primaryKey;

    /**
     * This property holds whether this column is a foreignKey.
     * @var bool
     */
    protected $foreignKey;

    /**
     * This property holds the foreignKeyReferencedSchema for this instance.
     * @var string|null
     */
    protected $foreignKeyReferencedSchema;
    /**
     * This property holds the foreignKeyReferencedTable for this instance.
     * @var string|null
     */
    protected $foreignKeyReferencedTable;
    /**
     * This property holds the foreignKeyReferencedColumn for this instance.
     * @var string|null
     */
    protected $foreignKeyReferencedColumn;

    /**
     * This property holds the referential action for the DELETE operation.
     * See [mysql documentation](https://dev.mysql.com/doc/refman/8.0/en/create-table-foreign-keys.html) for more details.
     *
     * Possible values are:
     * - cascade
     * - setNull
     * - restrict (default)
     * - noAction
     * - setDefault
     *
     *
     * @var string = restrict
     */
    protected $onDelete;

    /**
     * This property holds the referential action for the UPDATE operation.
     * See [mysql documentation](https://dev.mysql.com/doc/refman/8.0/en/create-table-foreign-keys.html) for more details.
     *
     * Possible values are:
     * - cascade
     * - setNull
     * - restrict (default)
     * - noAction
     * - setDefault
     *
     *
     * @var string = restrict
     */
    protected $onUpdate;


    /**
     * Builds the Column instance.
     */
    protected function __construct()
    {
        $this->name = null;
        $this->type = null;
        $this->typeSize = null;
        $this->autoIncrement = false;
        $this->nullable = true;
        $this->uniqueIndex = false;
        $this->primaryKey = false;
        $this->foreignKey = false;
        $this->foreignKeyReferencedSchema = null;
        $this->foreignKeyReferencedTable = null;
        $this->foreignKeyReferencedColumn = null;
        $this->onDelete = "restrict";
        $this->onUpdate = "restrict";
    }

    /**
     * Creates a new instance and returns it.
     *
     * @return Column
     */
    public static function create()
    {
        return new static();
    }

    /**
     * Sets the name of the column and returns the current instance.
     *
     * @param string $name
     * @return Column
     */
    public function name(string $name): Column
    {
        $this->name = $name;
        return $this;
    }


    /**
     * Sets the type of the column and returns the current instance.
     *
     * @param string $type
     * @return Column
     */
    public function type(string $type): Column
    {
        $this->type = $type;
        return $this;
    }


    /**
     * Sets the type size of the column and returns the current instance.
     *
     * @param int $typeSize
     * @return Column
     */
    public function typeSize(int $typeSize): Column
    {
        $this->typeSize = $typeSize;
        return $this;
    }


    /**
     * Sets the nullable value of this instance to false and returns the current instance.
     *
     * @return Column
     */
    public function notNullable(): Column
    {
        $this->nullable = false;
        return $this;
    }


    /**
     * Sets the autoIncrement property to true and returns the current instance.
     *
     * @return Column
     */
    public function autoIncrement(): Column
    {
        $this->autoIncrement = true;
        return $this;
    }

    /**
     * Sets the uniqueIndex property to true and returns the current instance.
     *
     * @param string|null $indexId
     * @return Column
     */
    public function uniqueIndex(string $indexId = null): Column
    {
        $this->uniqueIndex = true;
        $this->uniqueIndexId = $indexId;
        return $this;
    }

    /**
     * Sets the primaryKey property to true and returns the current instance.
     *
     * @return Column
     */
    public function primaryKey(): Column
    {
        $this->primaryKey = true;
        return $this;
    }

    /**
     * Sets the foreign key and returns the current instance.
     *
     * @param string $referencedTable
     * @param string $referencedColumn
     * @param string|null $referencedSchema
     *
     * @return Column
     */
    public function foreignKey(string $referencedTable, string $referencedColumn, string $referencedSchema = null): Column
    {
        $this->foreignKeyReferencedSchema = $referencedSchema;
        $this->foreignKeyReferencedTable = $referencedTable;
        $this->foreignKeyReferencedColumn = $referencedColumn;
        $this->foreignKey = true;
        return $this;
    }


    /**
     * Sets the referential action for the DELETE operation and returns the current instance.
     *
     * @param string $action
     * See the onDelete property for more details.
     *
     * @return Column
     */
    public function onDelete(string $action): Column
    {
        $this->onDelete = $action;
        return $this;
    }

    /**
     * Sets the referential action for the UPDATE operation and returns the current instance.
     *
     * @param string $action
     * See the onUpdate property for more details.
     *
     * @return Column
     */
    public function onUpdate(string $action): Column
    {
        $this->onUpdate = $action;
        return $this;
    }


    //--------------------------------------------
    // GETTERS
    //--------------------------------------------
    /**
     * Returns the name of this instance.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Returns the type of this instance.
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * Returns the typeSize of this instance.
     *
     * @return int|null
     */
    public function getTypeSize(): ?int
    {
        return $this->typeSize;
    }

    /**
     * Returns the autoIncrement of this instance.
     *
     * @return bool
     */
    public function isAutoIncrement(): bool
    {
        return $this->autoIncrement;
    }

    /**
     * Returns the nullable of this instance.
     *
     * @return bool
     */
    public function isNullable(): bool
    {
        return $this->nullable;
    }

    /**
     * Returns the uniqueIndex of this instance.
     *
     * @return bool
     */
    public function isUniqueIndex(): bool
    {
        return $this->uniqueIndex;
    }

    /**
     * Returns the primaryKey of this instance.
     *
     * @return bool
     */
    public function isPrimaryKey(): bool
    {
        return $this->primaryKey;
    }

    /**
     * Returns the uniqueIndexId of this instance.
     *
     * @return string|null
     */
    public function getUniqueIndexId(): ?string
    {
        return $this->uniqueIndexId;
    }

    /**
     * Returns the foreignKey of this instance.
     *
     * @return bool
     */
    public function isForeignKey(): bool
    {
        return $this->foreignKey;
    }

    /**
     * Returns the foreignKeyReferencedSchema of this instance.
     *
     * @return string|null
     */
    public function getForeignKeyReferencedSchema(): ?string
    {
        return $this->foreignKeyReferencedSchema;
    }

    /**
     * Returns the foreignKeyReferencedTable of this instance.
     *
     * @return string|null
     */
    public function getForeignKeyReferencedTable(): ?string
    {
        return $this->foreignKeyReferencedTable;
    }

    /**
     * Returns the foreignKeyReferencedColumn of this instance.
     *
     * @return string|null
     */
    public function getForeignKeyReferencedColumn(): ?string
    {
        return $this->foreignKeyReferencedColumn;
    }

    /**
     * Returns the onDelete of this instance.
     *
     * @return string
     */
    public function getOnDelete(): string
    {
        return $this->onDelete;
    }

    /**
     * Returns the onUpdate of this instance.
     *
     * @return string
     */
    public function getOnUpdate(): string
    {
        return $this->onUpdate;
    }



}