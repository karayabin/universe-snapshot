SvgGridGenerator
=====================
2016-09-04



Create css grid lines.
 


![svg-grid lines](http://lingtalfi.com/img/universe/SvgGridGenerator/svg-grid-colors.png)
![svg-grid colors](http://lingtalfi.com/img/universe/SvgGridGenerator/svg-grid-lines.png)


SvgGridGenerator is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/SvgGridGenerator
```

If you want to experiment/create a css grid framework,
this might be a good idea to have a canvas of vertical lines behind your work.

You could do it with a background raster image, but you can also do it with SVG.

Using SVG has a few advantages over a static image:

- it's scalable (so you can tackle flexible grids)
- it's easy to customize (opacity, colors, ...)


This class helps you create a svg file that you can then use as a background image.
It can handle gutters.


To generate a grid, use the following script, or an equivalent one:

```php
<?php


header("content-type: text/plain");
use Ling\SvgGridGenerator\SvgGridGenerator;

require_once "bigbang.php"; // start the local universe (https://github.com/lingtalfi/Observer/blob/master/article/article.planetReference.eng.md)


//------------------------------------------------------------------------------/
// PARAMS
//------------------------------------------------------------------------------/
/**
 * Change the params to your need, then copy paste the code in a svg file.
 */
$nbColumns = 12;
$columnWidth = 6.8666; // in percent
$gutterWidth = 1.6; // in percent, or null if you don't use gutterWidth
$style = 'colors'; // lines | colors (you must set the gutterWidth to a non null value with the colors mode)


//------------------------------------------------------------------------------/
// SCRIPT
//------------------------------------------------------------------------------/
if ('lines' === $style) {
    echo '<svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">' . "\n";
    echo '<g fill="transparent" stroke="black" stroke-opacity=".2">' . "\n";
    array_map(function ($v) {
        echo '<rect x="' . $v . '%" y="0" width=".01" height="100%"></rect>' . "\n";
    }, SvgGridGenerator::generate($nbColumns, $columnWidth, $gutterWidth));
    echo '</g>' . "\n";
    echo '</svg>';
}
else {

    if (null !== $gutterWidth) {
        echo '<svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">' . "\n";
        echo '<g fill="red" stroke="transparent" fill-opacity=".05">' . "\n";
        echo '<rect x="0" y="0" width="' . $columnWidth . '%" height="100%"></rect>' . "\n";
        $even = false;
        array_map(function ($v) use (&$even) {
            if (true === $even) {
                echo '<rect x="' . $v . '%" y="0" width="6.8666%" height="100%"></rect>' . "\n";
            }
            $even = !$even;
        }, SvgGridGenerator::generate($nbColumns, $columnWidth, $gutterWidth));
        echo '</g>' . "\n";
        echo '</svg>';
    }
    else {
        throw new \RuntimeException("When using the colors mode, you must set the gutterWidth to a non null value");
    }
}
```  


You will save the output of this script to a svg file that you can then reference in your html.
For instance like this:

```html
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Html page</title>
    <style>
        html, body {
            height: 100%;
        }

        body {
            padding: 0px;
            margin: 0px;
        }

        .row, .column {
            box-sizing: border-box;
        }

        .row::before,
        .row::after {
            content: " ";
            display: table;
        }

        .row::after {
            clear: both;
        }

        .column {
            position: relative;
            float: left;
        }

        .column + .column {
            margin-left: 1.6%;
        }

        .column-1 {
            width: 6.86666666667%;
        }

        .column-2 {
            width: 15.3333333333%;
        }

        .column-3 {
            width: 23.8%;
        }

        .column-4 {
            width: 32.2666666667%;
        }

        .column-5 {
            width: 40.7333333333%;
        }

        .column-6 {
            width: 49.2%;
        }

        .column-7 {
            width: 57.6666666667%;
        }

        .column-8 {
            width: 66.1333333333%;
        }

        .column-9 {
            width: 74.6%;
        }

        .column-10 {
            width: 83.0666666667%;
        }

        .column-11 {
            width: 91.5333333333%;
        }

        .column-12 {
            width: 100%;
        }

        /**---------------------
        -
        ----------------------**/
        .column {
            background: red;
            height: 20px;
        }

        .row {
            margin-bottom: 10px;
        }

        body{
            background: url(svg-12grid-gutter-color.svg) repeat top left;
            width: 100%;
            height: 100%;
        }


    </style>
</head>

<body>
<div class="row">
    <div class="column column-1"></div>
    <div class="column column-1"></div>
    <div class="column column-1"></div>
    <div class="column column-1"></div>
    <div class="column column-1"></div>
    <div class="column column-1"></div>
    <div class="column column-1"></div>
    <div class="column column-1"></div>
    <div class="column column-1"></div>
    <div class="column column-1"></div>
    <div class="column column-1"></div>
    <div class="column column-1"></div>
</div>
<div class="row">
    <div class="column column-4"></div>
    <div class="column column-4"></div>
    <div class="column column-4"></div>
</div>

<div class="row">
    <div class="column column-2"></div>
    <div class="column column-4"></div>
    <div class="column column-4"></div>
    <div class="column column-2"></div>
</div>
</body>
</html>
```



This example uses the css grid framework explained here:
https://www.sitepoint.com/understanding-css-grid-systems/















History Log
------------------

- 1.0.2 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.0.1 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.0.0 -- 2016-09-04

    - initial commit
    
    

