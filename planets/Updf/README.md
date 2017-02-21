Updf
=========
2017-02-12



A helper class to create pdf.


Updf is part of the [universe framework](https://github.com/karayabin/universe-snapshot) and
uses the [tcpdf library](https://tcpdf.org/) (I used 6.2.13).




Features
============

- create pdf using html only
- template system (with variables references)
- multilang system included



Example code
================

The code below generates an invoice pdf and displays it to the browser:

```php

require "bigbang.php"; // initialize the universe
require_once __DIR__ . "/TCPDF/tcpdf.php"; // dependency to tcpdf

Updf::create()
    ->setModel(DummyInvoiceModel::create())
    ->setTemplate('invoice')
    ->render();
```


The result is this [invoice pdf](https://github.com/lingtalfi/updf/blob/master/doc/invoice.pdf).



Here is another example where we customize the model lang and variables,
I also changed the footer content.

```php

require "bigbang.php"; // initialize the universe
require_once __DIR__ . "/TCPDF/tcpdf.php"; // dependency to tcpdf

Updf::create()
    ->setModel(DummyInvoiceModel::create()->setLang('fr')->setVar('theme_header_bgcolor', '#8aaf5f'))
    ->setTemplate('invoice')
    ->setFooterModel(FooterModel::create()->setFooterText("Your Company"))
    ->render();
```


The result is this [invoice fr pdf](https://github.com/lingtalfi/updf/blob/master/doc/invoice-fr.pdf).








Updf code overview
===============

Updf code was built upon the idea that we should only use html to create a pdf.

Although Updf uses the excellent tcpdf library under the hood, you don't actually
need to know tcpdf to create your pdfs.

Updf uses html templates instead.

Here is how the Updf code is organized:


[![updf.jpg](https://s19.postimg.org/ho3vasqcj/updf.jpg)](https://postimg.org/image/ufi1hb04f/)



So the basic idea is that we use an html template to create a pdf.

The template can use variable references (like all templates), and those variables are stored
in a model.

In other words, the model contains the variables that the template uses.


The benefit of using a separated model to hold the variables is that for one given model 
we could use different templates if we wanted to.

If you know the [MVC pattern](https://en.wikipedia.org/wiki/Model%E2%80%93view%E2%80%93controller),
then you can think of the Updf class to be the Controller, the Model class to be the Model,
and the Template to be the View.

Here is a short description of each class shown in the picture above:

- Updf
    - injects the Model variables into the template, and renders the template
    - outputs the rendered template either to the browser or write it to a file
- Template 
    - allows you to write your pdf using html code only (it's a lot easier than learning how to use a pdf class)
    - it's a blue print which contains references to variables
- Model
    - is responsible for holding the variables used by the template(s)
- FooterModel
    - a Model with two extra methods to set the current page number and the total number of pages  
    - it represents the footer displayed at the bottom of every page
- (Template) Loader
    - is responsible for resolving a template name into a template content 
- Utcpdf
    - the tcpdf wrapper used by Updf internally
     
     
     

     
Hello world tutorial
=======================

In this tutorial, you'll learn how to use Updf.
You'll understand how classes work together in Updf, and then you'll be able to create just any pdf document you want.
 
Installing tcpdf
--------------------
 
First step is to include the tcpdf library somewhere on your machine.
You can download it from [here](https://github.com/tecnickcom/TCPDF/releases/tag/6.2.13) (you can choose
any version you want, but Updf was built on version 6.2.13 so if you use another version and there is a problem you're on your own)

Unzip it, and place it where you want in your local machine.

The only thing we're interested about is the location of the **tcpdf.php** file (at the root of the TCPDF repository).

Copy the path to the tcpdf.php file (**/path/to/tcpdf.php** in my case) as we will need it later.



Creating and rendering the template
-------------------------------------

Let's create our first template!

Create a **pdf** directory at the root of your application, and create the **hello.tpl.php** file inside of it.

Your tree structure should look like this:

```txt
- app/
----- planets/    # universe directory, contains the Updf planet
----- pdf/
--------- hello.tpl.php
----- www/
--------- TCPDF/        # the tcpdf directory, contains the tcpdf.php file
--------- index.php     # this is our working file, from where we'll invoke the Updf library
```


As you can see, I've already put some directories/files in my app directory.

The **planets** directory contains the planets from the universe. You can think of it as a directory of packages, or library.
Since Updf is a planet, you will find the Updf directory inside the **planets** directory.


The **pdf** directory at the root of the app is where Updf searches a template by default.

We've just created an empty **hello.tpl.php** file inside of it.
The **tpl.php** extension is the extension used by Updf's TemplateLoader.

It basically means that we can use the php language directly inside our templates: no need to learn another template language (nice).

The **www** directory is the root of the webserver.
I put the **TCPDF/** directory inside this directory, but you can put it where you want as long as you reference it correctly within the **index.php** file.


The **index.php** file, in this example, is just our working file: we will test our code by refreshing the browser pointing to this file.



So, hopefully you can understand this tree structure.

Assuming this is the case (if not pm me if you want), then open the **hello.tpl.php** file and put the following content inside of it:


```html
<table>
    <tr>
        <td>Tutorial</td>
        <td>Hello world</td>
    </tr>
</table>
```


Notice that I used an html table tag.

Tables are a good tool when design pdf documents because they provide interesting alignment capabilities 
which we often need when creating pdf pages.


Tip: open the [invoice.tpl.php](https://github.com/lingtalfi/updf/blob/master/Model/pdf/invoice.tpl.php) file,
and observe how tables are used to lay out the skeleton of the pdf document.


Now our template is done, and we want to display it.

Open the index file and put the following code in it.

```php
<?php

use Updf\Updf;


require_once "bigbang.php";
require_once __DIR__ . "/TCPDF/tcpdf.php";

Updf::create()
    ->setTemplate('hello')
    ->render();
```


The first require_once statement calls the universe autoloader (or you can use one of your own if you want),
and the second require_once statement calls the tcpdf library.

Then to render the template, we just need to instantiate the Updf class, pass the name of the template 
to the setTemplate method, and call the render method.

The correspondence between the "hello" string and our **app/pdf/hello.tpl.php** template file is done
by the default TemplateLoader.


If you open your index.php page in a browser, it should generate and output the pdf file corresponding
to the hello.tpl.php template file.


The three types of variables
-----------------------------------

Congratulations if you've made it so far.
But now we are going one step further: we are going to add variables into the mix.

Re-open the template file and replace its content with the following:

```html
<style>
    .header {
        background-color: __theme_background_color__;
    }
</style>

<table>
    <tr>
        <td class="header">__text_tutorial__</td>
        <td>Hello __name__</td>
    </tr>
</table>
```

Then, open the **index.php** file and replace its content with the following:

```php
<?php

use Updf\Updf;


require_once "bigbang.php";
require_once __DIR__ . "/TCPDF/tcpdf.php";


Updf::create()
    ->setTemplate('hello')
    ->setVariables([
        'theme_background_color' => "#c00",
        'text_tutorial' => "Tutorial",
        'name' => "me",
    ])
    ->render();
```



We've done three main things here:

- in the template, we've added a style section
- in the template, we've used variables references
- in the index, we've initialized the variables with some values and pass them to the Updf class


The style section allows us to separate the presentation from the content (you should know that if you use css).

Using variables in the template allows us to RE-USE our template with different values every time.

In Updf, there are two ways to use variables inside a template:

- using the variable reference tag
- using php


The variable reference tag starts with two consecutive underscores (__), and ends with two consecutive underscores as well.
This form of wrapping was chosen because it's html AND css friendly (note: the traditional curly braces wrapping is NOT css friendly
when you reformat your code using the automatic formatting function of your editor, at least from my tests with phpstorm).

An other way to use variables in a template is to use directly php.
Php is such a powerful language, we don't need any other tool to write template (that's my personal opinion of course),
as long as you don't let the web user write the templates.

Variables are provided as $v, which is an objectified version of the variables array.

So for instance, we could replace the template content with the following, and we would have EXACTLY the same results:

```php
<style>
    .header {
        background-color: __theme_background_color__;
    }
</style>

<table>
    <tr>
        <td class="header">__text_tutorial__</td>
        <td>Hello <?php echo $v->name; ?></td>
    </tr>
</table>
```


The benefit of using php becomes obvious only when you need to operate on the variables (check their existence, loop them, and so on...);
otherwise, the tag form is just fine. 



Abstracting the variables to a model
-----------------------------------

If you've made it so far, congrats!
...but we can go even deeper.

Wouldn't it be great if we could delegate the creation of the variables to an object, so that we would only have
to call an object method to instantiate all the necessary variables to render a template?

That's exactly what we will do in this section.

The Model object of the Updf planet was designed exactly for that purpose.

Create a **HelloModel.php** file (I put mine directly inside the **app/planets** directory for this quick tutorial but it doesn't 
really matter) and put the following content in it:

```php
<?php


use Updf\Model\AbstractModel;

class HelloModel extends AbstractModel {

    public function __construct()
    {
        $this->vars = [
            'theme_background_color' => "#c00",
            'text_tutorial' => "Tutorial",
            'name' => "me",
        ];
    }
}
```

Basically, we've just transferred all our variables into the HelloModel class.

Then, replace the index.php file content with the following:

```php
<?php

use Updf\Updf;


require_once "bigbang.php";
require_once __DIR__ . "/TCPDF/tcpdf.php";


Updf::create()
    ->setModel(HelloModel::create())
    ->setTemplate('hello')
    ->render();
```


Do you see how much cleaner it is now?
 
It might not seem much now because we've only three variables, but a template can have dozens of variables, so at some point
it's important to be able to just reference a model rather than specifying all the variable values every time.


So that's the end of this tutorial.

BUT, if you want to go deeper, you can.
I'll just give you this hint: did you notice how I named the variables:
 
- theme_background_color
- text_tutorial
- name

I like to organize variables in three categories:
 
- theme variables 
- text variables 
- template variables
 
And I've created a class called LingAbstractModel, which your Model can extend, instead of extending the 
regular AbstractModel.
Doing so will give you extra powers, and I'll let your curiosity do the rest...






So that's it for this tutorial.
Hopefully you learned something.

See you next time.








 








     
     
     
     
re-learn html
=================
     
The most difficult task in creating a pdf, I found, was to re-learn the html.
     
Keep in mind that Updf uses the tcpdf html interpreter, which is just a subset of browsers html interpreter.

My suggestion is that you open the [invoice.tpl.php](https://github.com/lingtalfi/updf/blob/master/Model/pdf/invoice.tpl.php) 
file and study how it's done.

Here are a few things that astonished me or caused me some troubles:

1. p#first   (not just #first) 
2. table#mytable tr td    (not just table#mytable td) 
3. Do not repeat your rules: rules replaces themselves instead of merging 
4. An inline style will override ALL the rules in a style tag 


Using styles
---------------
1. To target an element with an id, put the name of the tag before the 
sharp symbol (do p#first, and not #first), otherwise it won't work.

2. To target a td of a table, you need to write the intermediate tr.
In other words, "table td" won't work, while "table tr td" will.

3. If you write a rule, write it only once, because rules seems to replace themselves
rather than merging.

For instance if you write this:

```html
div#doo {
    color: red;
}
div#doo {
    font-weight: bold;
}
```

Then in the end, the #doo div will only have font weight to bold (the color will not be red).


4. An inline style will override ALL the rules in a style tag

So if you write this code, notice the border=0.5 set on the table tag...

```html
<style>
    table#invoice_summary_table {
        border: 1px solid black;
    }

    table#invoice_summary_table tr th {
        text-align: center;
        font-weight: bold;
        font-size: 9px;
        background-color: #c00;
        border: none;
    }
</style>

<table id="invoice_summary_table" border="0.5">
    <tr>
        <th>Invoice number</th>
        <th>Invoice date</th>
    </tr>
    <tr>
        <td>F_0000382</td>
        <td>2017-02-12</td>
    </tr>
</table>
```

... then the th tags will have a border as well (although border is set to none).









History Log
------------------
    
- 1.0.1 -- 2017-02-17

    - fix bug in template loader
    
- 1.0.0 -- 2017-02-12

    - initial commit
    
    
    





     














