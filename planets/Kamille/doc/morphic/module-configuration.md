Module Configuration
=========================
2018-06-13


Store the configuration of each module in separated tables.





Motivation
============
In the app I've created, I've come across many different implementations for storing modules configuration,
the main ones being:

- store the module configuration in files
- store the module configuration in the database in one big table (shared by all modules)


Today, I'm thinking about adding this third idea:

- store the module configuration in the database, in one table per module

And I would like to provide the tools for implementing such an idea, in a kamille environment.


But before I do so, let me explain why I believe this idea is a option worth considering.

I'll do so by exposing the problems in the two other implementations.


Store the module configuration in files, what's the problem?
--------------
The obvious problem comes when you want your system to be administered by some other people than you.
Often, people don't like to manually edit a configuration file; we, so lazy, want gui.



Store the module configuration in the database in one big table (shared by all modules), what's the problem?
----------------
If like me you use this type of configuration in your front app, then there is one thing to be aware of:
if you have too much entries in your big table, this is going to have impact on the front app performances.

So, imagine now you are developing a new module, and you know it's not going to be used in the front app (i.e.
it's a back end module for instance), so in this case it doesn't make much sense to add your module data in the front big table.









Implementation
============
And so the natural idea that comes into mind is: creating a table dedicated for that particular module.
But then you start to think: another module, another table, some more time lost, I don't have the time for that...

That's where I can help a bit.
First, the table structure will be always the same:


```sql
CREATE TABLE IF NOT EXISTS `myprefix_configuration` (
  `the_key` VARCHAR(128) NOT NULL,
  `the_value` TEXT NOT NULL,
  `label` VARCHAR(128) NOT NULL,
  `description` TEXT NOT NULL,
  `type` VARCHAR(64) NOT NULL,
  `type_params` TEXT NOT NULL,
  PRIMARY KEY (`the_key`))
ENGINE = InnoDB;

```


Once this is done, add the entries you want in this table (use phpMyAdmin).


And then, in your morphic form, put this:


```php
<?php


use Kamille\Utils\Morphic\Util\ModuleConfiguration\MorphicModuleConfigurationUtil;
use Module\Application\Util\Morphic\ApplicationMorphicModuleConfigurationUtil;
use SokoForm\Form\SokoForm;


// $util = MorphicModuleConfigurationUtil::create()->setTableName("myprefix_configuration"); // That's the default
$util = ApplicationMorphicModuleConfigurationUtil::create()->setTableName("myprefix_configuration"); // Use this class if you have the Application module installed: this will extend your form controls type choice...


$form = SokoForm::create();
$util->decorateSokoFormInstance($form);
$choices_scripts = [];
$choice_execution_mode = [];


//--------------------------------------------
// FORM
//--------------------------------------------
$conf = [
    //--------------------------------------------
    // FORM WIDGET
    //--------------------------------------------
    'title' => "",
    //--------------------------------------------
    // SOKO FORM
    'form' => $form,
    'feed' => $util->getFeedFunction(),
    'process' => $util->getProcessFunction(),
];


```


  
Then, to access your data, create a class which extends the MorphicModuleConfigurationTool class, like this:

```php
<?php


namespace Module\Srd;


use Kamille\Utils\Morphic\Util\ModuleConfiguration\MorphicModuleConfigurationTool;

class SrdConfig extends MorphicModuleConfigurationTool
{

    protected static $table = "srd_configuration";
}
```
 

That's it.
Enjoy!



Module developers
==========================

If the developer uses the ApplicationMorphicModuleConfigurationUtil class from the Application module,
then the Application_MorphicModuleConfigurationUtil_getControlMap hook will be called.

This hooks allows you to assign special controls to your form rather than just the boring input.
For instance, if your module provides a choice control which lists of all the users in your application,
you can create a callback (via the hook) so that the backend developer just needs to type
the name of your custom control (the type field of a configuration table) to get the
list of all users for free.

By convention, your type should start with your module name followed by a colon symbol.
For instance, the Ekom module could provide such controls:

- Ekom:category_list



