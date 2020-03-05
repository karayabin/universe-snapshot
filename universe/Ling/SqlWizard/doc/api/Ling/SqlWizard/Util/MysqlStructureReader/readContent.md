[Back to the Ling/SqlWizard api](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard.md)<br>
[Back to the Ling\SqlWizard\Util\MysqlStructureReader class](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Util/MysqlStructureReader.md)


MysqlStructureReader::readContent
================



MysqlStructureReader::readContent — Reads the given content and returns an array containing **table info items**, each of which having the following structure.




Description
================


public [MysqlStructureReader::readContent](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Util/MysqlStructureReader/readContent.md)(string $content) : array




Reads the given content and returns an array containing **table info items**, each of which having the following structure.

- db: string|null, the name of the database, or null if not specified
- table: string, the name of the table
- pk: array, the names of the columns of the primary key (or an empty array by default)
- uind: array, the unique indexes. Each entry of the array is itself an array representing one index.
    Each index is an array of column names composing the index.
- fkeys: array, the foreign keys. It's an array of foreign key => references, with references being an array with
    the following structure:
    - 0: the referenced database, or null if it was not specified
    - 1: the referenced table
    - 2: the referenced column
- columnNames: array, the array of column names for this table
- columnTypes: array, the array of column name => column type. Each type is in lower string, and contains
    the information in parenthesis if any (for instance int, or varchar(64), or char(1), etc...)
- columnNullables: array, the array of column name => boolean (whether the column is nullable)
- ai: string|null = null, the name of the auto-incremented column if any
- referencedByTables: array of the tables defined in the given content that have a foreign key referencing this table.
     It's an array of "rb" items, each of which having the following structure:
     - 0: database, string or null
     - 1: table




Parameters
================


- content

    


Return values
================

Returns array.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [MysqlStructureReader::readContent](https://github.com/lingtalfi/SqlWizard/blob/master/Util/MysqlStructureReader.php#L154-L274)


See Also
================

The [MysqlStructureReader](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Util/MysqlStructureReader.md) class.

Previous method: [readFile](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Util/MysqlStructureReader/readFile.md)<br>Next method: [getDatabaseAndTableFromLine](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Util/MysqlStructureReader/getDatabaseAndTableFromLine.md)<br>

