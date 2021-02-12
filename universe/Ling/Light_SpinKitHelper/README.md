Light_SpinKitHelper
===========
2019-08-29



A [light](https://github.com/lingtalfi/Light) service to help injecting an ajax spinner into an html container element.


This is a [Light framework plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).

This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).



Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Light_SpinKitHelper
```

Or just download it and place it where you want otherwise.



![screenshot of spinkit helper](https://lingtalfi.com/img/universe/Light_SpinKitHelper/spinkit-helper.png)


Summary
===========
- [Light_SpinKitHelper api](https://github.com/lingtalfi/Light_SpinKitHelper/blob/master/doc/api/Ling/Light_SpinKitHelper.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- [Services](#services)
- [How to use](#how-to-use)
- [Credits](#credits)




Services
=========


This plugin provides the following services:

- spinkit_helper




Here is the content of the service configuration file:

```yaml
spinkit_helper:
    instance: Ling\Light_SpinKitHelper\SpinKitHelperService

```


How to use?
=========


Two steps: markup, and removing the sk-loading class.


Markup
--------

First create an html container element with position relative, and add the **.sk-loading** css class to it.
Then inside this html container element, use the render method of the SpinKitHelperService instance.
Like this:

 
```php
<?php
/**
 * @var $spinkitHelper SpinKitHelperService
 */
$spinkitHelper = $container->get('spinkit_helper'); // (container is the light service container)


$renderer = new stdClass(); // some renderer class (irrelevant here)


?>

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">

                <div class="card-header">
                    <h5>User list</h5>
                </div>
                <div class="card-body sk-loading position-relative" id="my-realist">
                    <?php echo $spinkitHelper->render("foldingCube", 'red'); ?>
                    <?php $renderer->render(); ?>
                </div>
            </div>
        </div>
    </div>
</div>

```

The code above will display an overlay over the card-body element, with an ajax spinner rotating in its center.


The call to the **render** method accepts two optional arguments:

- style: string. The style of the ajax spinner, choose one amongst:
    - rotatingPlane (default)
    - doubleBounce
    - wave
    - wanderingCubes
    - pulse
    - chasingDots
    - threeBounce
    - circle
    - cubeGrid
    - fadingCircle
    - foldingCube    
- color: a css color (defaults is black)



The overlay is white by default.
To change it to black, add the **sk-black** css class to the container element (i.e. the one with the sk-loading class).


Removing the sk-loading class
--------

Now whenever you want, remove the overlay by removing the **sk-loading** css class from the card-body element (in the above example).



Credits
========

Spinkit js library is here: https://tobiasahlin.com/spinkit/





History Log
=============

- 1.0.3 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.0.2 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.0.1 -- 2019-08-30

    - updated doc
    
- 1.0.0 -- 2019-08-29

    - initial commit