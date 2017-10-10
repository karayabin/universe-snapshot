CrudGeneratorTools
======================
2017-05-02 --> 2017-05-10


Tools to generate an admin like phpMyAdmin.



This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import CrudGeneratorTools
```

Or just download it and place it where you want otherwise.





What is it?
=================
The main idea is that you have a schema, and you want to generate an auto-admin tool: a tool
that allows you to interact with all the tables (like phpMyAdmin for instance).

In order to do that, you will probably need to collect all sort of information about the 
tables: what are the foreign keys, what form control do you want to generate depending on the sql type of the column, ...



The CrudGeneratorTools help you do that by providing my thoughts about a general auto-admin system,
and some concrete tools helping the implementation of those ideas.



So first, what's an auto-admin system?
And then, what are the tools.


Auto-admin
==============
This is a big topic, please browse the doc directory of this repository to find the information you would like.



What are the tools
===================

Hopefully by the name of the methods you get the idea, because that and the source code
is all the doc we have (at least for now).

- CrudGeneratorToolsHelper
    - getDbAndTable ( table )
    - getTables ( db=null, useDbPrefix=true )
    - getColumns ( table )
    - getForeignKeysInfo ( table )
    - getDatabases ( db=null )
    - getRic ( table )
    
- GeneratorGenerator
    - generateForeignKeysPreferredColumnsByDatabase ( db=null )
    - generateForeignKeysPreferredColumnsByTable ( table )
    
- CrudGenerator
    - generate
    - getSqlQuery ( table )
    - getSqlQueryAsString ( table )
    - getJoinsList ( table )
    - getPrefixedColumns ( table )



Basically what you want to do is extend the CrudGenerator class, and then call the generate method.

You should end up with a generator script like this one:


```php
<?php


use Core\Services\A;
use Module\AutoAdmin\CrudGenerator\NullosCrudGenerator;

require_once __DIR__ . "/../boot.php";


A::quickPdoInit();
NullosCrudGenerator::create()->setDatabases(['zilu'])->generate();

```

The example above comes from the AutoAdmin module, part of the [Kamille framework](https://github.com/lingtalfi/Kamille).
It generates the admin for the NullosAdmin module.





What is skinny?
====================

If you browse the planet, you will see the Skinny directory, which contains the Skinny subsystem tools.

Skinny basically implements the workflow of first generating a list of desired form types,
and store them in a file.

Then, generate the desired files using those form types preferences.

This allows for more control on what's being generated, giving the user the ability to easily
override the default generated preferences.

The documentation for skinny can be found in the auto-admin document of this repository.



ForeignKeyPreferredColumnUtil
===============================

See auto-admin documentation for explanations about what that is.

```php
<?php


use Core\Services\A;
use CrudGeneratorTools\Util\ForeignKeyPreferredColumnUtil;


/**
 * Kamille framework init
 */
ini_set('display_errors', "1");
require_once __DIR__ . "/../boot.php";
A::quickPdoInit();



a(ForeignKeyPreferredColumnUtil::create()->getPreferredForeignKey('zilu', 'container'));

```


History Log
------------------
    
- 1.3.0 -- 2017-05-19

    - update SkinnyTypeUtil
    
- 1.2.0 -- 2017-05-19

    - update ForeignKeyPreferredColumnUtil
    
- 1.1.1 -- 2017-05-18

    - SkinnyModelGenerator internal reorganization
    
- 1.1.0 -- 2017-05-11

    - add ForeignKeyPreferredColumnUtil
    
- 1.0.0 -- 2017-05-10

    - initial commit




