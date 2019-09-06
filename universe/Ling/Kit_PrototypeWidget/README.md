Kit_PrototypeWidget
===========
2019-04-25



A type of widget for the [kit](https://github.com/lingtalfi/Kit) system.




This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Kit_PrototypeWidget
```

Or just download it and place it where you want otherwise.






Summary
===========
- [Kit_PrototypeWidget api](https://github.com/lingtalfi/Kit_PrototypeWidget/blob/master/doc/api/Ling/Kit_PrototypeWidget.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- Pages
    - [Conception notes](https://github.com/lingtalfi/Kit_PrototypeWidget/blob/master/doc/pages/conception-notes.md)
- [What is it used for?](#what-is-it-used-for)
- [The Prototype widget array](#the-prototype-widget-array)
- [Related](#related)
- [History Log](#history-log)


What is it used for?
----------

In a nutshell, the prototype widget renders a file as is.
 
It's used when you want to convert a static html layout into a php dynamic layout.

Rather than doing it one widget at the time, you can quickly configure the zones and widgets, and replace them all at once.

Then, in a second iteration, you can work on individual widgets one by one to add the php dynamism.



 


The Prototype widget array
----------


So, here is the configuration array for the picasso widget:

```yaml 
type: prototype                 # or any other string, as long as it's registered to the KitPageRenderer instance
template: $templateName         # for instance: default.php, or prototype.php. This is the path to the template file, relative to the templates rootDir 
``` 


Note: this merges with the widget array defined in the [kit configuration array](https://github.com/lingtalfi/Kit#the-kit-configuration-array).


The templates root dir is just a directory that you define, usually the application directory.



To register the PrototypeWidgetHandler:


```php
$kit = new KitPageRenderer();
// ...


// define the handler
$h = new PrototypeWidgetHandler();
$h->setRootDir("/path/to/my_app");


$kit->registerWidgetHandler('prototype', $h);
// ...
```



Related
========

- [Kit](https://github.com/lingtalfi/Kit): the widget rendering system 
- [Kit_PicassoWidget](https://github.com/lingtalfi/Kit_PicassoWidget): another widget type 



History Log
=============

- 1.1.0 -- 2019-08-29

    - update PrototypeWidgetHandler now implements KitPageRendererAwareInterface
    
- 1.0.1 -- 2019-07-18

    - update docTools documentation, add links to source code for classes and methods
    
- 1.0.0 -- 2019-04-25

    - initial commit