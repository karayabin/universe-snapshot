[Back to the Ling/CliTools api](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools.md)<br>
[Back to the Ling\CliTools\Util\TableUtil class](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Util/TableUtil.md)


TableUtil::render
================



TableUtil::render — Writes a html like table to the given $output.




Description
================


public [TableUtil::render](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Util/TableUtil/render.md)([Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output) : void




Writes a html like table to the given $output.

The table will look like this:


```txt
+---------------+-----------------------+------------------+
| ISBN          | Title                 | Author           |
+---------------+-----------------------+------------------+
| 99921-58-10-7 | Divine Comedy         | Dante Alighieri  |
| 9971-5-0210-0 | A Tale of Two Cities  | Charles Dickens  |
| 960-425-059-0 | The Lord of the Rings | J. R. R. Tolkien |
+---------------+-----------------------+------------------+
```




Parameters
================


- output

    


Return values
================

Returns void.








See Also
================

The [TableUtil](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Util/TableUtil.md) class.

Previous method: [setRows](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Util/TableUtil/setRows.md)<br>Next method: [writeRow](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Util/TableUtil/writeRow.md)<br>

