ZeusTemplateEngine
===========
2019-01-21



A template engine based on php files, for your php projects.

This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import ZeusTemplateEngine
```

Or just download it and place it where you want otherwise.







About
=====

ZeusTemplateEngine is a template engine which implements the [UniversalTemplateEngine](https://github.com/lingtalfi/UniversalTemplateEngine) interface.

This template engine uses the most flexible template language ever: php.

The template files are regular php files.


Inside template files, the following variables are available:

- $z: an array containing all the variables passed to the template



How to use?
===========

You first need to define directory aliases with the setDirectories method, then you can call the render method.



- First create a template file. I will use **/path/to/my_app/pages/zeus/home.php**. Put the following content in it.


```php
<h1>The home page</h1>
<p>
    Hello, this is an example template for Zeus.
    In a Zeus template, we write the variables using the most flexible template language ever: php.
    For instance, the following fruit is actually a variable, look how it's done in the source code:
</p>
<ul>
    <li>fruit: <?php echo $z['fruit']; ?></li>
</ul>

```


Then, in your main application file, paste the following code:

```php
<?php


use ZeusTemplateEngine\ZeusTemplateEngine;

require_once __DIR__ . "/../universe/bigbang.php"; // activate universe


$o = new ZeusTemplateEngine();

$o->setDirectories([
    "pages" => "/path/to/my_app/pages", // define the pages alias
]);


// now render the template
$html = $o->render("pages:zeus/home.php", [
    "fruit" => "apple",
]);


if (false === $html) {
    a($o->getErrors());
} else {
    echo $html;
}

```

The **resourceIdentifier** (pages:zeus/home.php) has the following notation:

- ```<directoryAlias> <:> <templateRelativePath>```

With:
- **directoryAlias**: one of the directory aliases defined with the setDirectories method
- **templateRelativePath**: the relative path from the given aliased directory to the template





History Log
------------------

- 1.1.0 -- 2019-01-22

    - removed implicit file extension to allow the same instance to process different file extensions if necessary

- 1.0.0 -- 2019-01-21

    - initial commit