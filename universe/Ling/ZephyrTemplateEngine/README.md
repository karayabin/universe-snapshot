ZephyrTemplateEngine
===========
2019-04-09



A simple template engine for your php projects.


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/ZephyrTemplateEngine
```

Or just download it and place it where you want otherwise.






Summary
===========
- [ZephyrTemplateEngine api](https://github.com/lingtalfi/ZephyrTemplateEngine/blob/master/doc/api/Ling/ZephyrTemplateEngine.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))


About
=====

ZephyrTemplateEngine is a template engine which implements the [UniversalTemplateEngine](https://github.com/lingtalfi/UniversalTemplateEngine) interface.

This template engine uses the most flexible template language ever: php.

The template files are regular php files.


Inside template files, the following variables are available:

- $z: an array containing all the variables passed to the template


Note: this is a simpler version of the [ZeusTemplateEngine](https://github.com/lingtalfi/ZeusTemplateEngine).





How to use?
===========




- First create a template file. I will use **/path/to/my_app/pages/zephyr/home.php**. Put the following content in it.


```php
<h1>The home page</h1>
<p>
    Hello, this is an example template for Zephyr.
    In a Zephyr template, we write the variables using the most flexible template language ever: php.
    For instance, the following fruit is actually a variable, look how it's done in the source code:
</p>
<ul>
    <li>fruit: <?php echo $z['fruit']; ?></li>
</ul>

```



Now to render the template, do this:



```php
$dir = "/path/to/my_app";
$tpl = "pages/zephyr/home.php";


$o = new ZephyrTemplateEngine();
$o->setDirectory( $dir );
echo $o->renderByPath($tpl, [
    "fruit" => "apple",
]);

```




History Log
=============

- 1.1.2 -- 2019-07-18

    - update docTools documentation, add links to source code for classes and methods
    
- 1.1.0 -- 2019-04-24

    - add ZephyrTemplateEngine->renderFile method 
    
- 1.0.0 -- 2019-04-09

    - initial commit