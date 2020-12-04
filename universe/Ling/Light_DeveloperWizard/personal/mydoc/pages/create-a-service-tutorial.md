Tutorial: create a service in light, with the Light_DeveloperWizard
===========
2020-11-27


The **Light_DeveloperWizard** can do the boring stuff for us, letting us focus on the interesting/creative part.

 
In this tutorial, I'll demonstrate that by creating a simple plugin from scratch, in about 5 minutes.


In this case, the plugin I want to create is a plugin that notifies me (the admin), or the users when they log in successfully to the lka gui.

The plugin also stores an entry in the database for each successful connexion.


Ok, let's go:


- conceptualize your service (![the Light_LoginNotifier conception](https://lingtalfi.com/img/universe/Light_LoginNotifier/light-login-notifier-conception.jpg)) ~2 minutes
- create the planet directory in $app/universe/$galaxy/$planet (~20 sec)
- open the wizard & call the **ServiceClass->create lss1 service** task (~5 sec)
    - Note: other options for creating services are available but since we use a database, this is a good option
    
- open mysqlWorkBench, and create your schema (![The Light_LoginNotifier very simple schema](https://lingtalfi.com/img/universe/Light_LoginNotifier/lln.png)) ~2 minutes    
- copy the structure statement and paste it in **$app/universe/$galaxy/$planet/assets/fixtures/create-structure.sql** (it's the [create file convention](https://github.com/lingtalfi/TheBar/blob/master/discussions/create-file.md)) ~20 sec


Notice that most of the time was spent on conception and creating the database, which is the fun part.
Now for the boring parts:

- call the **Database->synchronize** task to put the tables in the actual db (~1 sec)
- call the **Database->add standard permission** task to create [the standard permissions](https://github.com/lingtalfi/TheBar/blob/master/discussions/light-standard-permissions.md) for your plugin. (~1 sec)
- call the **Generators->generate breeze config** task, then the **Generators->generate breeze api** tasks to generate your api (~5 sec)


At this point, the service should be working just fine.
In this tutorial however, I want to go a step further and create a [lka](https://github.com/lingtalfi/Light_Kit_Admin) version of the plugin, so that we can have basic interactions with our tables via a gui.


- call the **Lka->Create the lka planet** task to create the lka planet (~1 sec)
- switch the wizard to the lka planet (there is a link for that at the top of the gui) (~1 sec)
- (from the lka planet) call the **Lka->create the lka generator config** task, then the **Lka->execute the lka generator** task to create your lka elements (~5 sec)


At this point, in the lka gui, you should be able to open your plugin's menu (in the admin section), and interact with the corresponding lists and forms. 


Here is the final result in lka: ![the Light_LoginNotifier final result in lka](https://lingtalfi.com/img/universe/Light_LoginNotifier/lln-lka.png)



 