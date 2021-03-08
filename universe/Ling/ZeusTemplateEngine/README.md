ZeusTemplateEngine
===========
2019-01-21 -> 2021-03-05



A template engine based on php files, for your php projects.

This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.ZeusTemplateEngine
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/ZeusTemplateEngine
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



Now we want to render this template.

We have two options:

- either we call it by its file name directly
- or we use the directory alias provided by Zeus by default



Using the file name directly
---------------------------

We just need to call the renderByPath method, as shown in the following code:

```php
$tpl = "/path/to/my_app/pages/zeus/home.php";
$o = new ZeusTemplateEngine();
echo $o->renderByPath($tpl, [
    "fruit" => "apple",
]);

```



Using the directory alias system
---------------------------



You first need to define directory aliases with the setDirectories method, then you can call the render method.


Then, in your main application file, paste the following code:

```php


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

- 1.3.3 -- 2021-03-05

    - update README.md, add install alternative

- 1.3.2 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.3.1 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.3.0 -- 2019-04-09

    - update ZeusTemplateEngine->render method according to the interface
    
- 1.2.0 -- 2019-02-12

    - add ZeusTemplateEngine\ZeusTemplateEngine->renderByPath method
    
- 1.1.0 -- 2019-01-22

    - removed implicit file extension to allow the same instance to process different file extensions if necessary

- 1.0.0 -- 2019-01-21

    - initial commit