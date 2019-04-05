Deploy
===========
2019-04-03




Centralized manager to deploy your web apps on remote machines.




This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Deploy
```

Or just download it and place it where you want otherwise.






Summary
===========
- [Deploy api](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- [Requirements](#requirements)
- [Installation](#installation)
- [Gif parade](#gif-parade)
- [The main idea](#the-main-idea)
    - [What can deploy do for you?](#what-can-deploy-do-for-you)
    - [The general implementation behind files synchronization](#the-general-implementation-behind-files-synchronization)
- [The configuration file](#the-configuration-file)
    - [The settings section](#the-settings-section)
    - [The projects section](#the-projects-section)
- [The deploy directory in the application](#the-deploy-directory-in-the-application)
- [Extra Notes](#extra-notes)
- [History Log](#history-log)




Requirements
============

The deploy tool will only work in Unix environments, not on Windows (I've switched to Mac since 2009,
and this is a personal tool that I share with you, but I don't use Windows anymore).


To use deploy, your systems (both your local machine and your remote machine(s)) should be equipped with the 
following:


- php 7.0+ with zip extension
- scp
- ssh
- mysql
- mysqldump
- uni (only if you use the cron-deploy command)




Gif parade
==========

To give you a better idea of how deploy looks like, here are some gif examples:


The **deploy i** command (interactive mode):
[Deploy I](http://lingtalfi.com/img/universe/Deploy/deploy-i.gif)


The **deploy push** command:
[Deploy push](http://lingtalfi.com/img/universe/Deploy/deploy-push.gif)


The **deploy push-db** command:
[Deploy push-db](http://lingtalfi.com/img/universe/Deploy/deploy-push-db.gif)



Installation
================

Once you've installed the **Deploy** planet on your system, you need to install deploy as a program on your machine.

The simplest way for me to do that, and so the way I recommend for you as well, is to create a symlink.

Let's say that you've installed the **Deploy** planet in here: **/myphp/universe/Ling/Deploy**.

Then all you need to do is type this command (perhaps prepend it with sudo if required):

```bash
ln -s /myphp/universe/Ling/Deploy/script/deploy.php /usr/local/bin/deploy
```

If it worked, you should be able to type:

```bash
deploy help
```

 




The main idea
==============

Deploy is a command line tool written in php.

It's used by webmasters to manage the synchronization of their websites between the development machine and the remote machine(s) the website is deployed on.

The main benefit of using **deploy** is that the configuration is centralized on the development machine.

This means that there is only one configuration file for all your projects (makes it easier to manage).

The configuration file is located at: **~/.deploy/deploy.conf.byml**.


What can deploy do for you?
----------------

Here are the main features provided by deploy (all that from your local machine, with a one-liner, or using the interactive mode):

- pushing your website to a remote (making the remote website identical to the local website)
- fetching your website from the remote (making your local website identical to the remote website)
- pushing your database(s) to a remote (making the remote database(s) identical to the local database(s))
- fetching your database(s) from a remote (making the local database(s) identical to the remote database(s))
- creates mysql databases automatically for you (you don't need to remember the mysql creation account syntax)

- creating backups of your application, locally and/or remotely
- listing the backups of your application, locally and/or remotely
- restoring the backups of your application, locally and/or remotely

- creating backups of your databases, locally and/or remotely
- listing the backups of your databases, locally and/or remotely
- restoring the backups of your databases, locally and/or remotely

- provides an interactive mode, which is a graphical interface for most of the deploy commands (if you don't want to type the commands manually)


To see the complete list of commands, use the **deploy help** command, which output was put in this [deploy-help page]((https://github.com/lingtalfi/Deploy/blob/master/doc/pages/deploy-help.md)) for your convenience.


Security note: every command involving to pass a database password via ssh does a pretty good job at being secured: it basically uses the technique (by default)
of creating a temporary file containing the password, and removing it after usage (in other words, they shouldn't appear in the output of the **ps** command). 
And if you want more security, all those commands have the option to prompt you for the password.

Except for the **cron-deploy** command, which writes the password of the database of your project in a permanent file, so that you can use it from a cron script.
But be aware that the database password is stored in your application anyway, so I believe using the **cron-deploy** command this does not make your app more insecure.
  


The general implementation behind files synchronization
-------------------

A key concept to understand the **deploy** command is how the files synchronization system works.

One of the incentive for me to recreate the **deploy** system instead of using more sophisticated and powerful such as rsync and git
(apart that it also handles databases and backups) was that the synchronization system would be much simpler (and I would have total control over it).
 
So basically, the idea of synchronization is exactly what you would expect: 

- create a map on the local machine
- create a map on the remote machine
- compare the two maps, you obtain the differences
- apply the differences on whichever side you want to mirror


Now what's a map?

It's simply a file containing the file name and a hash for every file in your application.

A map is a simple text file which looks like this:

```txt
.DS_Store::56a8578b9ed8b96cc5bb19e91f7be0ebd2512524
Maurice.php::604207aaa86ca9787c77056beb13bab55b474bc5
Michel.php::604207aaa86ca9787c77056beb13bab55b474bc5
boris.txt::1d33aae1be4146dbaaca0b6e70d7a11f10801525
dir1/alice.txt::1d33aae1be4146dbaaca0b6e70d7a11f10801525
dir1/amelie.txt::1d33aae1be4146dbaaca0b6e70d7a11f10801525
dir2/john.txt::1d33aae1be4146dbaaca0b6e70d7a11f10801525
michmich/ko.txt::1d33aae1be4146dbaaca0b6e70d7a11f10801525
moo.txt::1d33aae1be4146dbaaca0b6e70d7a11f10801525
```

When we have two maps, we can easily tell the differences between them.

That's what I call a **diff** (there is a command named **diff** too).
Note: there is also a **map** command to create maps.

And once we've got the diff, we just apply some **scp** commands and sometimes **rm** via ssh to transfer
the missing files and remove the extra files.
 
Note: or we can decide to not remove files via the options, check the commands help for more details.


But basically that's it, there is nothing special to it.




The configuration file
====================

The configuration is located by default on your local machine in **~/.deploy/deploy.conf.byml** (create the file if it doesn't exist).

It's a [BabyYaml](https://github.com/lingtalfi/BabyYaml) file.

This file will contain the deploy configuration for all your projects on this machine.


Here is the content of an example configuration file.

```yaml
settings:
    date_time_zone: Europe/Paris
projects:
    komin:
        root_dir: /my_projects/komin
        remote_root_dir: /home/ling/websites/jin_test
        ssh_config_id: kom
        databases:
            test-local:
                user: test
                name: test
                pass: 45flKEJ,EKFJZ
                collate: utf8mb4_general_ci
            test-mini:
                user: test2
                name: testing
                pass: blabla2
        map-conf:
            ignoreHidden: 1
            ignoreName: 
                - .DS_Store            
    project_two:
        root_dir: /my_projects/project_two
        remote_root_dir: /home/me/project2
        ssh_config_id: nadi
```


In the example above, there are two projects which identifiers are: komin and project_two.


The configuration file contains two main sections:

- settings
- projects


The settings section
-----------------

It defines the general behaviour for all your projects.

It contains the following directives:

- date_time_zone: string=Europe/Paris. The default date time zone to use.
    This is important since backups will by default have a name based on the date time.
    


The projects section
--------------     

This is the main section containing the configuration for all your projects on this machine.

It's organized by project; each project being identified by a **project identifier** (komin, project_two in the above example).

Each project configuration has the following directives:

- **root_dir**: string. The path to the root directory of your application on the **local** machine.
- **remote_root_dir**: string. The path to the root directory of your application on the **remote** machine. 
- **ssh_config_id**: string. The identifier used in your **~/.ssh/config** file to connect to the remote via ssh.
- **databases**: an array of database identifier => database configuration item. This is only used if your application uses a mysql database.
    Note: as of today (2019-04-03), only mysql databases are handled. 
    In the example above, the database identifiers are **test-local** and **test-mini**.
    They are just references to the corresponding database configuration items used by the deploy command.    
- ?**map-conf**: array to define the behaviour of commands related to maps (including **map**, **diff**, **diffback**, **push**, **fetch**, **push-files**, **fetch-files**).
    - **ignoreName**: array of entry (file or directory) names to ignore.
            If it's a directory, it will be ignored recursively (i.e. its content will also be ignored).
    - **ignorePath**: array of relative entry (file or directory) paths to ignore (relative to the application root directory).
            If it's a directory, it will be ignored recursively (i.e. its content will also be ignored).            
    - **ignoreHidden**: int=1. A mode defining what kind of hidden entries to ignore. The possible values are:
        - **0**: do not ignore anything.
        - **1**: ignore hidden directories (directories which name start with a dot).
        - **2**: ignore hidden directories and files (directories and files which name start with a dot).


    
A database configuration item has the following structure:

- **user**: string. The name of the user of the database.
- **name**: string. The name of the database.
- **pass**: string. The password of the database.
- ?**collate**: string. The collation for your database. Use this if your local mysql and remote mysql versions are not the same and you experience problems.
    If this directive is set, then when you restore a backup, the **deploy** command will transparently update the backup file before it is executed,
    replacing all collate usages with the one specified in the directive.
    So you should set a collation available on both systems (local and remote).
    Tip: use the **SHOW COLLATION;** mysql command to show the collations of a given system.      













The deploy directory in the application
==========

Here is a list of all potential files created by the **deploy** system for a given my_app application.



```txt
- /path/to/my_app/
----- .deploy/
--------- backup-files/             # contains the backup files created by the backup-files command
--------- backup-db/                # contains the backup files created by the backup-db command    
------------- $db_identifier/       # contains the backup files created by the backup-db command for a specific database identifier    
--------- map.txt                   # contains the files map created by the map command
--------- diff-add.txt              # created temporarily by the diff command with flag -f. Usually removed by another command.
--------- diff-remove.txt           # created temporarily by the diff command with flag -f. Usually removed by another command.
--------- diff-replace.txt          # created temporarily by the diff command with flag -f. Usually removed by another command.
--------- app.zip                   # created temporarily by the push command with flag -z. Usually removed after use.
--------- remote-map.txt            # created temporarily by the diff command. Contains the remote map.
--------- zip-map.txt               # created temporarily by the fetch command. Contains a merge of the diff-add and diff-replace maps.
--------- tmp.sql                   # temporary sql statements to execute on the remote. Usually removed by a command after usage.
--------- tmp-conf.byml             # temporary conf created by some commands. Usually, it's removed after usage.
--------- tmp-conf.cnf              # temporary conf created by some commands. Usually, it's removed after usage.
--------- backup-db.zip             # temporary archive created by the **fetch-backup-db** command.
--------- tmp-list.txt              # temporary file created by the some commands.
--------- cron-deploy.php           # the deploy script tailored for usage on the remote. It's there only if created with the cron-deploy command.
--------- cron-deploy-universe      # a dir created by the cron-deploy command.
--------- cron-deploy-conf.byml     # a configuration file created by the cron-deploy command.
````



Extra notes
=========


Mysql related commands were tested successfully on:
- macOSX mysql Ver 8.0.13
- ubuntu mysql Ver 5.7.18





History Log
=============

- 1.0.0 -- 2019-04-03

    - initial commit