Light_DeveloperWizard, conception notes
===========
2020-06-30 -> 2020-07-07




The **Light_DeveloperWizard** (aka wizard) helps a developer turn his ideas into a well integrated light plugin.


It was developed as a personal wizard for my own needs.


The main synopsis where the wizard is useful is this:

you start creating your schema, and you've dumped a [create file](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/pages/conception-notes.md#create-file), but then you don't know what to do. You have a vague idea, but you don't know exactly
how to implement them.

So for instance you know that you need an api, and that you need to put your schema in the actual database.
Maybe you're using [Light_Kit_Admin](https://github.com/lingtalfi/Light_Kit_Admin) and you would like to generate an admin list and form corresponding to your tables,
but again you don't remember how to do it.  


So, that's when the wizard comes handy.

It takes the form of a web script that you open in your browser, and the main tasks are listed there, 
you just need to click on the tasks that you want to execute, and the script will do them for you.




As I'm speaking, nothing has been implemented yet (it's just conception notes), but I'm very excited because
I feel that this would be a huge time saver if implemented properly, so may the lucid god be with me. 
 
 
 
 
The preferences file
-----------
2020-06-30


Sometimes, the wizard might need some kind of memory, to better help you.


The memory of the wizard takes the form of a **developer-wizard.byml** [babyYaml](https://github.com/lingtalfi/BabyYaml) file at the root of your planet.

If it doesn't exist, the wizard will create automatically if needed.

We don't recommend tweaking it for now, unless the wizard gui invites you to do so.



Conventions
-----------
2020-06-30


In order to facilitate your work, the wizard uses some conventions.

- you should manually create the **create file** at the [recommended location for the create file](https://github.com/lingtalfi/TheBar/blob/master/discussions/create-file.md).
- **LingBreezeGenerator2**, the configuration file is in **$appDir/config/data/$planetName/Light_BreezeGenerator/$tablePrefix.byml**,

    With:
    - $planetName: the name of the planet (assuming "Ling" galaxy for now)  
    - $tablePrefix: you must have a prefix for your tables. The prefix is guessed from the first table in your **create file** and memorized in the wizard preferences.
    
    The configuration file will be generated for you if it doesn't exist.  




How to get started
--------
2020-06-30



Make sure you are in a [permissive web environment](https://github.com/lingtalfi/TheBar/blob/master/discussions/permissive-dev-environment.md).


Then to use the wizard, create a file at your web root, and paste the following content in it:


```php
<?php

require_once "app.init.inc.php";

$container->get("developer_wizard")->runWizard();

```

This assumes that the **app.init.inc.php** initializes your light application (i.e. the light->initialize method is called).


Then, use the wizard.




 
 
Available tasks
----------
2020-06-30 -> 2020-07-07

Our tasks so far are (per planet):


- synchronizing the db with the [create file](https://github.com/lingtalfi/TheBar/blob/master/discussions/create-file.md)
- generating the api using the [ling breeze generator 2](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/pages/ling-breeze-generator-2.md) (requires a **create file**)
- adding [standard permissions](https://github.com/lingtalfi/TheBar/blob/master/discussions/light-standard-permissions.md) (i.e. the [Light_UserDatabase](https://github.com/lingtalfi/Light_UserDatabase) permissions)
- generating the Light_Kit_Admin plugin from a given Light plugin (this requires a **create file**), basically giving you access to your plugin inside the lka environment
    The generated lka plugin is a complete light plugin that you can publish as a planet, it includes:
    - the service config file(s)
    - light kit admin lists, forms, menus
    - the planet directory with the necessary classes


 