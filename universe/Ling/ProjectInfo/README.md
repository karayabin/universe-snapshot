ProjectInfo
===========
2019-03-18



Show basic information about your php project.


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/ProjectInfo
```

Or just download it and place it where you want otherwise.






Summary
===========
- [ProjectInfo api](https://github.com/lingtalfi/ProjectInfo/blob/master/doc/api/Ling/ProjectInfo.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- [How to use](#how-to-use)




How to use?
===============

Project info displays a basic report of your project, containing information such as the number of files,
the total weight, the file extensions distribution, ...



The report is hybrid in that it can be displayed in both a console and/or a web page.

The following code:


```php
$rootDir = "/komin/jin_site_demo";
$pinfo = new ProjectInfo($rootDir);
$pinfo->showReport([
    'followSymlinks' => true,
]);
```



Will display something different, depending on whether it's called from a console or from a web page.

If it's called from a web page, the output will look like this:

![html report](http://lingtalfi.com/img/universe/ProjectInfo/project-info-html-report.png)

Now if it's called from a console, it will display something like this:

![cli report](http://lingtalfi.com/img/universe/ProjectInfo/project-info-cli-report.png)


History Log
=============

- 1.0.0 -- 2019-03-18

    - initial commit