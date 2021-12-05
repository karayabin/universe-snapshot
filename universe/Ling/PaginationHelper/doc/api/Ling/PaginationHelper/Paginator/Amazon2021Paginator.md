[Back to the Ling/PaginationHelper api](https://github.com/lingtalfi/PaginationHelper/blob/master/doc/api/Ling/PaginationHelper.md)



The Amazon2021Paginator class
================
2021-03-25 --> 2021-07-09






Introduction
============

The Amazon2021Paginator interface.

With this paginator, I try to reproduce the amazon pagination system as of 2021-07-09.

It basically shows 3 main links, with the center link representing the current page number.
The last page number is displayed to the right of the widget, but it's not a link.

From page 5 and up, a first page link appears to the left of the widget.

The previous and next buttons are placed on each side of the widget.

For the first 5 pages, all the links are displayed.


I'm using the bootstrap framework.



Class synopsis
==============


class <span class="pl-k">Amazon2021Paginator</span> implements [PaginatorInterface](https://github.com/lingtalfi/PaginationHelper/blob/master/doc/api/Ling/PaginationHelper/Paginator/PaginatorInterface.md) {

- Properties
    - protected string [$iconFlavour](#property-iconFlavour) ;
    - protected string [$activeClass](#property-activeClass) ;
    - protected string [$size](#property-size) ;
    - private string [$_linkFormat](#property-_linkFormat) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/PaginationHelper/blob/master/doc/api/Ling/PaginationHelper/Paginator/Amazon2021Paginator/__construct.md)() : void
    - public [setProperties](https://github.com/lingtalfi/PaginationHelper/blob/master/doc/api/Ling/PaginationHelper/Paginator/Amazon2021Paginator/setProperties.md)(array $properties) : void
    - public [render](https://github.com/lingtalfi/PaginationHelper/blob/master/doc/api/Ling/PaginationHelper/Paginator/Amazon2021Paginator/render.md)(int $page, int $nbPages, string $linkFormat) : string
    - protected [link](https://github.com/lingtalfi/PaginationHelper/blob/master/doc/api/Ling/PaginationHelper/Paginator/Amazon2021Paginator/link.md)(int $pageNumber) : string

}




Properties
=============

- <span id="property-iconFlavour"><b>iconFlavour</b></span>

    This property holds the iconFlavour for this instance.
    
    

- <span id="property-activeClass"><b>activeClass</b></span>

    This property holds the activeClass for this instance.
    
    

- <span id="property-size"><b>size</b></span>

    This property holds the size for this instance.
    It can be one of:
    
    - sm
    - md (default)
    - lg
    
    

- <span id="property-_linkFormat"><b>_linkFormat</b></span>

    This property holds the _linkFormat for this instance.
    
    



Methods
==============

- [Amazon2021Paginator::__construct](https://github.com/lingtalfi/PaginationHelper/blob/master/doc/api/Ling/PaginationHelper/Paginator/Amazon2021Paginator/__construct.md) &ndash; Builds the Amazon2021Paginator instance.
- [Amazon2021Paginator::setProperties](https://github.com/lingtalfi/PaginationHelper/blob/master/doc/api/Ling/PaginationHelper/Paginator/Amazon2021Paginator/setProperties.md) &ndash; Sets one or more properties.
- [Amazon2021Paginator::render](https://github.com/lingtalfi/PaginationHelper/blob/master/doc/api/Ling/PaginationHelper/Paginator/Amazon2021Paginator/render.md) &ndash; Renders a pagination widget.
- [Amazon2021Paginator::link](https://github.com/lingtalfi/PaginationHelper/blob/master/doc/api/Ling/PaginationHelper/Paginator/Amazon2021Paginator/link.md) &ndash; Returns the html escaped url for a given page number.





Location
=============
Ling\PaginationHelper\Paginator\Amazon2021Paginator<br>
See the source code of [Ling\PaginationHelper\Paginator\Amazon2021Paginator](https://github.com/lingtalfi/PaginationHelper/blob/master/Paginator/Amazon2021Paginator.php)



SeeAlso
==============
Previous class: [PaginationHelperTool](https://github.com/lingtalfi/PaginationHelper/blob/master/doc/api/Ling/PaginationHelper/PaginationHelperTool.md)<br>Next class: [PaginatorInterface](https://github.com/lingtalfi/PaginationHelper/blob/master/doc/api/Ling/PaginationHelper/Paginator/PaginatorInterface.md)<br>
