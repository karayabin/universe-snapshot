ClassCreator
===========
2019-02-07



A tool to create well-formatted php classes.


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import ClassCreator
```

Or just download it and place it where you want otherwise.


Summary
=======

- [How to use](#how-to-use)
    - [The export method](#the-export-method)
- [Profile](#profile)




How to use
==========

The ClassCreator tool is pretty straight forward to use.

The example below should get you started.


```php
$file = __DIR__ . "/Dorothy.php";

$o = new ClassCreator();

$content = $o->setNamespace('MyCompany')
    ->addUseStatements([
        'OtherCompany\Mailer\SwiftMailer',
        'OtherCompany2\Logger\SuperLogger',
        'UniversalCompany\Girls\GirlsMethod',
        'UniversalCompany\Girls\GirlsInterface',
    ])
    ->setComment(CommentCreator::multipleLines(<<<EEE
The Dorothy class is a class that implements a girl.
It's an imaginary class mainly used to demonstrate the ClassCreator utility.
EEE
    ))
    ->setSignature('class Dorothy extends GirlsMethod implements GirlsInterface')
    ->addProperty(Property::create()
        ->setComment(CommentCreator::oneLine('Just a simple counter used internally.'))
        ->setSignature('private static $cpt = 0;')
    )
    ->addProperty(Property::create()
        ->setComment(CommentCreator::oneLineShellStyle('This property holds the number of legs of the girl instance.'))
        ->setSignature('protected $legs;')
    )
    ->addMethod(Method::create()
        ->setComment(CommentCreator::oneLine(<<<'EEE'
Prints the given $word to the screen.
The word can be any string
EEE
        ))
        ->setSignature('public static function saySomething ( $word )')
        ->setBody(<<<'EEE'
echo $word;
return null;
EEE
        )
    )
    ->addMethod(Method::create()
        ->setComment(CommentCreator::docBlock(<<<EEE
Prints the word bye to the screen.
You should use this method when your girl session is finished.
@see See documentation for more info.
EEE
        ))
        ->setSignature('public function sayBye ( )')
        ->setBody(<<<'EEE'
echo "bye";
EEE
        )
    )
    ->export($file);

```


With the code above:

- the $content variable holds the content of the class (which you can put anywhere you want, in a file for instance)
- the following class will be created in $file.

```php
<?php

namespace MyCompany;

use OtherCompany\Mailer\SwiftMailer;
use OtherCompany2\Logger\SuperLogger;
use UniversalCompany\Girls\GirlsMethod;
use UniversalCompany\Girls\GirlsInterface;

/*
* The Dorothy class is a class that implements a girl.
* It's an imaginary class mainly used to demonstrate the ClassCreator utility.
*/
class Dorothy extends GirlsMethod implements GirlsInterface {

    // Just a simple counter used internally.
    private static $cpt = 0;

    # This property holds the number of legs of the girl instance.
    protected $legs;


    // Prints the given $word to the screen.
    // The word can be any string
    public static function saySomething ( $word ) {
        echo $word;
        return null;
    }

    /**
    * Prints the word bye to the screen.
    * You should use this method when your girl session is finished.
    * @see See documentation for more info.
    */
    public function sayBye ( ) {
        echo "bye";
    }

}










```




The export method
-----------------

Creates and returns the content of the class to create.

If $file is given, it will also create the class file at the location given by $file.



### Description

```php
export ( string $file=null, array $options = [] ): string
```


### Parameters


- **file**

    The path of the file to create.
    If null, no file will be created.

- **options**

    An array of options.
    The available options are:
    - profile, the profile to use.
               It not set, a default profile will be used.


### Return Values

Returns a string (the created class content).


### Examples

#### Example #1 returning the content as a string


The ClassCreator doesn't create a file unless you told him to.

With the following code, no class was created:


```php

$o = new ClassCreator();
$content = $o->setSignature('class MyClass')->export();
az($content);


*/

```

But the content variable contains the following.
Note: the empty lines after the class are intentional, you can
customize that using the profile.


```php
class MyClass {
}










```




#### Example #2 writing to a file

We can write the class directly to a file using the $file argument of the export method.




```php

$o = new ClassCreator();
$file = __DIR__ . "/Dorothy.php";
$o->setSignature('class MyClass')->export($file);

```

The code above will create the **MyClass** class in the file $file.



Profile
=======

We can control the cosmetic settings of the created class using a profile.

The profile is a simple object, which properties control various aspects of the
created class.


All properties are public and self descriptive.
Here is the list of all properties and their default values.


Note: Eol means PHP_EOL, which is a new line.



Header & class
--------------


Property        | Default value       |  Description
-------------- | -------------------- | -----------
number_of_eol_after_php_opening_tag  |  1 | The number of eol after the php opening tag (<?php).
number_of_eol_after_namespace |  1 | The number of eol after the namespace (only if the namespace is displayed).
number_of_eol_after_use_statements | 1 | The number of eol after the use statements (only if at least one use statement is displayed).
class_opening_brace_on_new_line | false | Whether to add the class opening brace on a new line, or on the same line as the class signature.
space_between_class_signature_and_opening_brace | true | Whether to add a space between the class signature and the class opening brace. Note: this property is ignored if the **class_opening_brace_on_new_line** property is set to true.
number_of_eol_before_class_closing_brace | 0 | The number of eol before the class closing brace.
number_of_eol_after_class_closing_brace | 10 | The number of eol after the class closing brace.


Class children
--------------


Property        | Default value       |  Description
-------------- | -------------------- | -----------
class_children_indentation_number  |  4 | Defines the indentation level for all class children (properties, methods).
class_children_indentation_unit |  space | Defines the character to use (space|tab) for the indentation of all class children.



Properties
----------


Property        | Default value       |  Description
-------------- | -------------------- | -----------
number_of_eol_before_properties  |  1 | The number of eol before the properties section (only if there is at least one property).
number_of_eol_before_property |  1 | The number of eol before each individual property.



Methods
-------


Property        | Default value       |  Description
-------------- | -------------------- | -----------
number_of_eol_before_methods  |  1 | The number of eol before the methods section (only if there is at least one method).
number_of_eol_before_method |  1 | The number of eol before each individual method.
method_opening_brace_on_new_line |  false | Whether to add the method opening brace on a new line, or on the same line as the method signature.
space_between_method_signature_and_opening_brace | false | Whether to add a space between the method signature and the method opening brace. Note: this property is ignored if the **method_opening_brace_on_new_line** property is set to true.
number_of_eol_before_method_body |  0 | The number of eol before the method body (top padding).
number_of_eol_after_method_body |  0 | The number of eol after the method body (bottom padding).

Methods children
----------------


Property        | Default value       |  Description
-------------- | -------------------- | -----------
method_children_indentation_number  |  8 | Defines the indentation level for all methods children (the body of the method).
method_children_indentation_unit |  space | Defines the character to use (space|tab) for the indentation of all methods children.










History Log
------------------

- 1.0.0 -- 2019-02-07

    - initial commit