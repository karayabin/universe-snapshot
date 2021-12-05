[Back to the Ling/PaginationHelper api](https://github.com/lingtalfi/PaginationHelper/blob/master/doc/api/Ling/PaginationHelper.md)<br>
[Back to the Ling\PaginationHelper\Paginator\PaginatorInterface class](https://github.com/lingtalfi/PaginationHelper/blob/master/doc/api/Ling/PaginationHelper/Paginator/PaginatorInterface.md)


PaginatorInterface::render
================



PaginatorInterface::render — Renders a pagination widget.




Description
================


abstract public [PaginatorInterface::render](https://github.com/lingtalfi/PaginationHelper/blob/master/doc/api/Ling/PaginationHelper/Paginator/PaginatorInterface/render.md)(int $page, int $nbPages, string $linkFormat) : string




Renders a pagination widget.

The given page number must be the real page number (between 1 and $nbPages).

The linkFormat uses the {page} tag as the (dynamic) page number.




Parameters
================


- page

    

- nbPages

    

- linkFormat

    


Return values
================

Returns string.








Source Code
===========
See the source code for method [PaginatorInterface::render](https://github.com/lingtalfi/PaginationHelper/blob/master/Paginator/PaginatorInterface.php#L26-L26)


See Also
================

The [PaginatorInterface](https://github.com/lingtalfi/PaginationHelper/blob/master/doc/api/Ling/PaginationHelper/Paginator/PaginatorInterface.md) class.



