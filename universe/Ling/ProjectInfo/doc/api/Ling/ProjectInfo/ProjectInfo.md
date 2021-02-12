[Back to the Ling/ProjectInfo api](https://github.com/lingtalfi/ProjectInfo/blob/master/doc/api/Ling/ProjectInfo.md)



The ProjectInfo class
================
2019-03-18 --> 2020-12-08






Introduction
============

The ProjectInfo class.



Class synopsis
==============


class <span class="pl-k">ProjectInfo</span>  {

- Properties
    - protected string [$rootDir](#property-rootDir) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/ProjectInfo/blob/master/doc/api/Ling/ProjectInfo/ProjectInfo/__construct.md)(string $rootDir) : void
    - public [getInfo](https://github.com/lingtalfi/ProjectInfo/blob/master/doc/api/Ling/ProjectInfo/ProjectInfo/getInfo.md)(?array $options = []) : array
    - public [showReport](https://github.com/lingtalfi/ProjectInfo/blob/master/doc/api/Ling/ProjectInfo/ProjectInfo/showReport.md)(?array $options = []) : void

}




Properties
=============

- <span id="property-rootDir"><b>rootDir</b></span>

    This property holds the rootDir for this instance.
    
    



Methods
==============

- [ProjectInfo::__construct](https://github.com/lingtalfi/ProjectInfo/blob/master/doc/api/Ling/ProjectInfo/ProjectInfo/__construct.md) &ndash; Builds the ProjectInfo instance.
- [ProjectInfo::getInfo](https://github.com/lingtalfi/ProjectInfo/blob/master/doc/api/Ling/ProjectInfo/ProjectInfo/getInfo.md) &ndash; Returns an array of information about the current project.
- [ProjectInfo::showReport](https://github.com/lingtalfi/ProjectInfo/blob/master/doc/api/Ling/ProjectInfo/ProjectInfo/showReport.md) &ndash; Show a report of the current project.


Examples
==========

Example #1: an html or console report
------------------------------

The following code:

```php
$rootDir = "/komin/jin_site_demo";
$pinfo = new ProjectInfo($rootDir);
$pinfo->showReport([
    'followSymlinks' => true,
]);

```


Will print a different output based on the context from which it was printed from.

If it's called from a webserver, it will display the following:


![html report](http://lingtalfi.com/img/universe/ProjectInfo/project-info-html-report.png)


However, if it's called from a console, it will display the following:


![cli report](http://lingtalfi.com/img/universe/ProjectInfo/project-info-cli-report.png)


Location
=============
Ling\ProjectInfo\ProjectInfo<br>
See the source code of [Ling\ProjectInfo\ProjectInfo](https://github.com/lingtalfi/ProjectInfo/blob/master/ProjectInfo.php)



