Easy Console Menu configuration file
===================================
2019-04-02




Summary
============
- [The configuration file example](#the-configuration-file-example)
- [Overview](#overview)
- [Settings](#settings)
- [Variables](#variables)
- [Steps](#steps)
    - [Step structure](#step-structure)
- [Commands](#commands)



The configuration file example
==============


Example 1: a simple coffee machine
-----------

```yaml
settings:
    intro_msg: Entering interactive mode:
    first_step: null
    use_clear: true
    use_history_nav: true
    history_nav_color: lightBlue
    debug: false
    execute_step_color: red
    header: <
        <white:bgLightBlue>-----------------------------------</white:bgLightBlue>
        <white:bgLightBlue>- Welcome to the coffee/tea machine</white:bgLightBlue>
        <white:bgLightBlue>-----------------------------------</white:bgLightBlue>
    >
    execute_after_mode: last
    ask_back: __back__



variables: []


steps:
    step_one:
        msg: What would you like me to do today?
        choices:
            -
                msg: Coffee
                goto: coffee
            -
                msg: Tea
                goto: tea

    coffee:
        msg: Creating coffee - Choose the coffee type:
        choices:
            -
                msg: Cappuccino
                goto: coffee_cappuccino
            -
                msg: Latte
                goto: coffee_latte
            -
                msg: Espresso
                execute: coffee_espresso

    coffee_cappuccino:
        msg: Creating coffee Cappuccino - Number of sugars:
        ask: Number of sugars?
        store_as: nb_sugar
        execute: coffee_cappuccino

    coffee_latte:
        msg: Creating coffee Latte - Choose your size:
        choices:
            -
                msg: Big
                execute: coffee_latte
            -
                msg: Medium
                execute: coffee_latte
            -
                msg: Small
                execute: coffee_latte
        store_as: size
    tea:
        msg: <red:b>DO YOU REALLY THOUGHT I COULD MAKE TEA?</red:b> What a joke. Bye (if you paid me maybe...).


commands:
    coffee_cappuccino:
        print: <success>Here is your <b>Cappuccino coffee</b> with ${nb_sugar} sugar(s)</success>
    coffee_latte:
        print: <blue>Here is your ${size} <b>coffee Latte</b></blue>
    coffee_latte:
        print: <blue>Here is your <b>Espresso coffee</b></blue>
```





Example 2: a real world example: the deploy interactive console
-----------

This is the configuration file I'm using for a deploy tool I'm currently working on (as of 2019-04-01). 


```yaml
settings:
    intro_msg: Entering interactive mode:
    first_step: null
    use_clear: true
    use_history_nav: true
    history_nav_color: lightBlue
    debug: false
    execute_step_color: red
    header: <
        <white:bgLightBlue>-------------------------</white:bgLightBlue>
        <white:bgLightBlue>- Deploy Interactive mode</white:bgLightBlue>
        <white:bgLightBlue>-------------------------</white:bgLightBlue>
    >
    execute_after_mode: step:choose_action
    execute_after_mode: last
    ask_back: __back__



variables:
    deploy_conf_path: /komin/jin_site_demo/tmp/deploy.conf.byml


steps:


    # --------------------------------------
    # MAIN
    # --------------------------------------
    choose_project:
        msg: Choose a project:
        dynamic_choices: Ling\Deploy\Helper\EasyConsoleMenuHelper::getProjectsList(${deploy_conf_path})
        store_as: project
        goto: choose_action

    choose_action:
        msg: Project <b>${project}</b> - Choose an action:
        choices:
            -
                msg: Files...
                goto: files_choice
            -
                msg: Databases...
                goto: databases_choice
            -
                msg: Configuration...
                execute: conf

    files_choice:
        msg: Project <b>${project}</b> - Files - Select an action:
        choices:
            -
                msg: Push files
                goto: push_file_zip_option
            -
                msg: Fetch files
                goto: fetch_file_zip_option
            -
                msg: Create a backup of the files
                goto: backup_files
            -
                msg: List files backups
                goto: list_backup_files
            -
                msg: Restore files backup
                goto: restore_backup_files
            -
                msg: Clean files backups
                goto: clean_backup_files
            -
                msg: Show diff
                goto: show_diff
            -
                msg: Show map
                goto: show_map


    # --------------------------------------
    # FILES
    # --------------------------------------
    push_file_zip_option:
        msg: Project <b>${project}</b> - Push files - Select a transfer mode:
        choices:
            -
                msg: Using zip (faster)
                execute: push_file_with_zip
            -
                msg: Without zip (slower, but file details)
                execute: push_file_without_zip

    fetch_file_zip_option:
        msg: Project <b>${project}</b> - Fetch files - Select a transfer mode:
        choices:
            -
                msg: Using zip (faster)
                execute: fetch_file_with_zip
            -
                msg: Without zip (slower, but file details)
                execute: fetch_file_without_zip

    backup_files:
        msg: Project <b>${project}</b> - Backup files - Choose local/remote:
        choices:
            -
                msg: Locally
                goto: backup_files_local
            -
                msg: Remotely
                goto: backup_files_remote


    backup_files_local:
        msg: Project <b>${project}</b> - Backup local files - Choose backup name:
        ask: Choose the name of the backup (leave empty for a non-named backup)?
        store_as: backup_name
        execute: backup_files_local

    backup_files_remote:
        msg: Project <b>${project}</b> - Backup remote files - Choose backup name:
        ask: Choose the name of the backup (leave empty for a non-named backup)?
        store_as: backup_name
        execute: backup_files_remote


    list_backup_files:
        msg: Project <b>${project}</b> - List files backups - Choose local/remote:
        choices:
            -
                msg: Locally
                execute: list_backup_files_local
            -
                msg: Remotely
                execute: list_backup_files_remote


    restore_backup_files:
        msg: Project <b>${project}</b> - Restore files backup - Choose local/remote:
        choices:
            -
                msg: Locally
                goto: restore_backup_files_local
            -
                msg: Remotely
                goto: restore_backup_files_remote


    restore_backup_files_local:
        msg: Project <b>${project}</b> - Restore local files backup - Choose the backup:
        ask: Name of the backup (leave empty to use the last non-named backup)?
        store_as: backup_name
        execute: restore_backup_files_local


    restore_backup_files_remote:
        msg: Project <b>${project}</b> - Restore remote files backup - Choose the backup:
        ask: Name of the backup (leave empty to use the last non-named backup)?
        store_as: backup_name
        execute: restore_backup_files_remote

    clean_backup_files:
        msg: Project <b>${project}</b> - Clean files - Choose local/remote:
        choices:
            -
                msg: Locally...
                goto: clean_backup_files_local
            -
                msg: Remotely
                goto: clean_backup_files_remote

    clean_backup_files_local:
        msg: Project <b>${project}</b> - Clean local backup files - Choose a method:
        choices:
            -
                msg: Delete all non-named backup files but the <b>x</b> most recent...
                goto: clean_backup_files_local_keep
            -
                msg: Delete a backup file by its name
                goto: clean_backup_files_local_name


    clean_backup_files_local_keep:
        msg: Project <b>${project}</b> - Clean local backup files with keep option:
        ask: How many non-named backup files do you want to keep?
        store_as: keep_number
        execute: clean_backup_files_local_keep


    clean_backup_files_local_name:
        msg: Project <b>${project}</b> - Clean a local backup files by name:
        ask: Name (or comma separated names) of the local backup(s) to delete?
        ask_validation: not_empty
        store_as: backup_name
        execute: clean_backup_files_local_name


    clean_backup_files_remote:
        msg: Project <b>${project}</b> - Clean remote backup files - Choose a method:
        choices:
            -
                msg: Delete all non-named backup files but the <b>x</b> most recent...
                goto: clean_backup_files_remote_keep
            -
                msg: Delete a backup file by its name
                goto: clean_backup_files_remote_name


    clean_backup_files_remote_keep:
        msg: Project <b>${project}</b> - Clean remote backup files with keep option:
        ask: How many non-named backup files do you want to keep?
        store_as: keep_number
        execute: clean_backup_files_remote_keep


    clean_backup_files_remote_name:
        msg: Project <b>${project}</b> - Clean a remote backup files by name:
        ask: Name (or comma separated names) of the remote backup(s) to delete?
        ask_validation: not_empty
        store_as: backup_name
        execute: clean_backup_files_remote_name

    show_diff:
        msg:  Project <b>${project}</b> - Show diff - Choose local/remote:
        choices:
            -
                msg: Show local diff (to turn the remote into a mirror of the local site)
                execute: show_diff_local
            -
                msg: Show remote diff (to turn the local site into a mirror of the remote)
                execute: show_diff_remote

    show_map:
        msg:  Project <b>${project}</b> - Show map - Choose local/remote:
        choices:
            -
                msg: Show local map
                execute: show_map_local
            -
                msg: Show remote map
                execute: show_map_remote


    # --------------------------------------
    # DATABASES
    # --------------------------------------
    databases_choice:
        msg: Project <b>${project}</b> - Databases - Select an action:
        choices:
            -
                msg: Create the databases
                goto: create_database
            -
                msg: Drop the databases
                goto: drop_database
            -
                msg: Push the databases
                execute: push_database
            -
                msg: Fetch the databases
                execute: fetch_database
            -
                msg: Create a backup of the databases
                goto: backup_database
            -
                msg: List the databases backups
                goto: list_backup_db
            -
                msg: Restore a database backup
                goto: restore_backup_db
            -
                msg: Remove database backups
                goto: clean_backup_db

    create_database:
        msg: Project <b>${project}</b> - Databases - Create the databases - Choose local/remote:
        choices:
            -
                msg: Locally
                execute: create_db_local
            -
                msg: Remotely
                execute: create_db_remote
    drop_database:
        msg: Project <b>${project}</b> - Databases - Drop the databases - Choose local/remote:
        choices:
            -
                msg: Locally
                execute: drop_db_local
            -
                msg: Remotely
                execute: drop_db_remote
    backup_database:
        msg: Project <b>${project}</b> - Databases - Create a backup - Choose local/remote:
        choices:
            -
                msg: Locally
                goto: backup_database_local
            -
                msg: Remotely
                goto: backup_database_remote


    backup_database_local:
        msg: Project <b>${project}</b> - Databases - Create a local backup - Choose the name:
        ask: Choose the name of the local backup (leave empty for a non-named backup)?
        store_as: backup_name
        execute: backup_db_local

    backup_database_remote:
        msg: Project <b>${project}</b> - Databases - Create a remote backup - Choose the name:
        ask: Choose the name of the remote backup (leave empty for a non-named backup)?
        store_as: backup_name
        execute: backup_db_remote

    list_backup_db:
        msg: Project <b>${project}</b> - Databases - List the databases backups - Choose local/remote:
        choices:
            -
                msg: Locally
                execute: list_backup_db_local
            -
                msg: Remotely
                execute: list_backup_db_remote

    restore_backup_db:
        msg: Project <b>${project}</b> - Restore databases backups - Choose local/remote:
        choices:
            -
                msg: Locally
                goto: restore_backup_db_local
            -
                msg: Remotely
                goto: restore_backup_db_remote


    restore_backup_db_local:
        msg: Project <b>${project}</b> - Restore local databases backup(s) - Choose the backup name:
        ask: Name of the backup (leave empty to use the last non-named backup)?
        store_as: backup_name
        execute: restore_backup_db_local


    restore_backup_db_remote:
        msg: Project <b>${project}</b> - Restore remote databases backup(s) - Choose the backup name:
        ask: Name of the backup (leave empty to use the last non-named backup)?
        store_as: backup_name
        execute: restore_backup_db_remote

    clean_backup_db:
        msg: Project <b>${project}</b> - Remove database backup(s) - Choose local/remote:
        choices:
            -
                msg: Locally
                goto: clean_backup_db_local
            -
                msg: Remotely
                goto: clean_backup_db_remote

    clean_backup_db_local:
        msg: Project <b>${project}</b> - Remove a local database backup:
        ask: Name (or comma separated names) of the local backup(s) to delete?
        ask_validation: not_empty
        store_as: backup_name
        execute: clean_backup_db_local

    clean_backup_db_remote:
        msg: Project <b>${project}</b> - Remove a remote database backup:
        ask: Name (or comma separated names) of the remote backup(s) to delete?
        ask_validation: not_empty
        store_as: backup_name
        execute: clean_backup_db_remote



commands:
    # --------------------------------------
    # FILES
    # --------------------------------------
    push_file_with_zip:
        cmd: deploy p="${project}" push -z
    push_file_without_zip:
        cmd: deploy p="${project}" push
    fetch_file_with_zip:
        cmd: deploy p="${project}" fetch -z
    fetch_file_without_zip:
        cmd: deploy p="${project}" fetch
    backup_files_local:
        cmd_backup_name: deploy p="${project}" backup-files name="${backup_name}"
        cmd: deploy p="${project}" backup-files
    backup_files_remote:
        cmd_backup_name: deploy p="${project}" backup-files name="${backup_name}" -r
        cmd: deploy p="${project}" backup-files -r
    list_backup_files_local:
        cmd: deploy p="${project}" list-backup-files
    list_backup_files_remote:
        cmd: deploy p="${project}" list-backup-files -r
    restore_backup_files_local:
        cmd: deploy p="${project}" restore-backup-files
        cmd_backup_name: deploy p="${project}" restore-backup-files name=${backup_name}
    restore_backup_files_remote:
        cmd: deploy p="${project}" restore-backup-files -r
        cmd_backup_name: deploy p="${project}" restore-backup-files name=${backup_name} -r
    clean_backup_files_local_keep:
        cmd: deploy p="${project}" clean-backup-files keep=${keep_number}
    clean_backup_files_local_name:
        cmd: deploy p="${project}" clean-backup-files names=${backup_name}
    clean_backup_files_remote_keep:
        cmd: deploy p="${project}" clean-backup-files keep=${keep_number} -r
    clean_backup_files_remote_name:
        cmd: deploy p="${project}" clean-backup-files names=${backup_name} -r
    show_diff_local:
        cmd: deploy p="${project}" diff
    show_diff_remote:
        cmd: deploy p="${project}" diffback
    show_map_local:
        cmd: deploy p="${project}" map -d
    show_map_remote:
        cmd: deploy p="${project}" map -dr
    # --------------------------------------
    # DATABASES
    # --------------------------------------
    create_db_remote:
        cmd: deploy p="${project}" create-db -rf
    create_db_local:
        cmd: deploy p="${project}" create-db -f
    drop_db_local:
        cmd: deploy p="${project}" drop-db
    drop_db_remote:
        cmd: deploy p="${project}" drop-db -rp-db
    push_database:
        cmd: deploy p="${project}" push-db
    fetch_database:
        cmd: deploy p="${project}" fetch-db
    backup_db_local:
        cmd: deploy p="${project}" backup-db
        cmd_backup_name: deploy p="${project}" backup-db name=${backup_name}
    backup_db_remote:
        cmd: deploy p="${project}" backup-db -r
        cmd_backup_name: deploy p="${project}" backup-db name=${backup_name} -r
    list_backup_db_local:
        cmd: deploy p="${project}" list-backup-db
    list_backup_db_remote:
        cmd: deploy p="${project}" list-backup-db -r
    restore_backup_db_local:
        cmd: deploy p="${project}" restore-backup-db
        cmd_backup_name: deploy p="${project}" restore-backup-db name=${backup_name}
    restore_backup_db_remote:
        cmd: deploy p="${project}" restore-backup-db -r
        cmd_backup_name: deploy p="${project}" restore-backup-db name=${backup_name} -r
    clean_backup_db_local:
        cmd: deploy p="${project}" clean-backup-db
        cmd_backup_name: deploy p="${project}" clean-backup-db names=${backup_name}
    clean_backup_db_remote:
        cmd: deploy p="${project}" clean-backup-db -r
        cmd_backup_name: deploy p="${project}" clean-backup-db names=${backup_name} -r
    conf:
        cmd: deploy conf
```







Overview
==============

The configuration file is an array composed of 4 main sections:


- settings
- variables
- steps
- commands



The **settings** section defines the general behaviour of the [MenuExecutor](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/doc/api/Ling/EasyConsoleMenu/MenuExecutor.md) object: is it in debug mode, what's the first step to execute,
what's the color of that step, do we use navigation history, ...


The **variables** section is a pool of variables that we can use to infer dynamism into our configuration file.
We can define any variable we want, and we can also create variable from the output of a command (we'll see that later)
with the **store_as** directive.

A variable can be used directly in the configuration file, by using the following tag notation: **${variable}**.

A variable is also available programmatically in the code.


The **steps** will ask for some user input, and either redirect to another step, or execute a command.

The **commands** on the other hands just describe actual commands (aka actions) to perform.


Now that we have a broad overview of the different sections, we shall discuss those sections in greater details.



Settings
===============

The **settings** section defines the general behaviour of the [MenuExecutor](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/doc/api/Ling/EasyConsoleMenu/MenuExecutor.md) object.

It's composed of various keys.


- **intro_msg**: string=null. This is a welcome message displayed once when the program starts.
    However you will only see it the **use_clear** (see below) setting is set to false.
    
- **first_step**: string=null. The name of the first step to execute. If not set, the first step found in the steps section will be executed.
    Note: when the [MenuExecutor](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/doc/api/Ling/EasyConsoleMenu/MenuExecutor.md) starts, it always execute a step (i.e. it cannot do nothing).
    
- **use_clear**: bool=true. Whether to clear the console screen before executing a step.
- **use_history_nav**: bool=true. Whether or not to use the history navigation system. With the history navigation is activated, you 
    have the option to go back to the previous step (if any) and/or to the home. Those options are added as prepended choices in all your steps 
    (except for the first step because they make little sense at that moment, since there is no previous step to go back to).
    If you're interested in the history implementation, have a look at the [StepsHistory](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/doc/api/Ling/EasyConsoleMenu/History/StepsHistory.md) object.
- **history_nav_color**: string=lightBlue. The [Bashtml color](https://github.com/lingtalfi/CliTools/blob/master/doc/pages/bashtml.md#the-tags-list) (aka format) to apply to the history navigation items.
    Note: the **use_history_nav** option needs to be set to true.  
- **execute_step_color**: string=red. The [Bashtml color](https://github.com/lingtalfi/CliTools/blob/master/doc/pages/bashtml.md#the-tags-list) (aka format) to apply to choice items of type "execution" (choices with the "execute" directive defined).
- **debug**: bool=false. When the debug mode is on, caught exceptions will display their trace. Otherwise (if set to true), they will only display the (exception) message.
- **header**: string=null. The header is like a banner displayed at the top of every command. You can leave it empty, or create a simple title, or be more creative
    and make a pretty banner (using Bashtml formatting). Here is an example image of a banner I use for a project I'm working on at the moment (just to give you a gist of what
    can be done): [see the image](http://lingtalfi.com/img/universe/EasyConsoleMenu/easy-console-menu-header-example.png).
- **execute_after_mode**: string=home (home|last|quit|step:$stepName). Defines how the MenuExecutor behaves after a command is executed.
    Once a command is executed, the MenuExecutor will display the message: "Press a key to continue...".
    When the user types a key, then an action will be executed, depending on the chosen mode.
    The possible modes are:
        - **home**: by default. Triggers the home step (i.e. the first step executed in the current session).
        - **last**: Triggers the last step again.
        - **quit**: Exits.
        - **step:$stepName**: Executes the $stepName step.
- **ask_back**: string=__back__. The string to type to exit the "ask" mode and get back one step in the history. 
    Note: you would need this only if you accidentally enter a step which asks you a question, and you want to step back.
         


Variables
===============

Variables bring dynamism to the EasyConsoleMenu environment.

It's a simple string replacement system that was originally created to store values and re-use them during the execution of commands.

For instance, if my goal is to execute a command like this:

```bash
deploy p=my_project push -z
```

Then I can use a variable to collect the **my_project** value in a previous step, and then re-use the variable when the time
to execute the command arrives.



You can either create a variable from the configuration file, or programmatically.

To create a variable from the configuration file, add it to the **variables** section of the configuration file.

To add it programmatically, you just want to append an entry to the **variables** array provided by the [MenuExecutor](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/doc/api/Ling/EasyConsoleMenu/MenuExecutor.md) 
class (so you could extend the MenuExecutor class for instance, and access those variables...).


Once the variable is created, not only is it available programmatically, but you can also inject it in the configuration file
pretty much anywhere where it makes sense, using the **${variable}** notation.

Note: remember that the variable system is basically a string replacement system, so your variable should be a string (an int is ok too),
but you can't use bool or array types; variables aren't meant to be used programmatically, but just as a way to temporarily store 
some of the user's choices to re-use them in a command.

See the **configuration file example** section in this document for a concrete example.
 


Steps
============

Steps are the flesh of the EasyConsoleMenu system.
Along with their cousins the **commands** they provide the original functionality of the EasyConsoleMenu system: a gui to help
the user navigating in an ocean of bash commands.


The step will collect data from the user, and either redirect to another step or execute a command.

There are two ways to collect data from the user:

- asking for the user to choose from a list of items (see **choices**, **dynamic_choices** directives below)
- asking a direct question (see **ask** directive below)




Step structure
---------------

The steps are defined in the **steps** section. Each step is a key/value pair, where the key is the **name** of the step,
and the value is an array representing the step.

The step array has the following structure:

- **msg**: string=null. The text to display at the top when the step is executed. It can use variable injection.
- ?**choices**: array. An array of **choice items** to present to the user. 

    Each choice item will have the following structure:
    - **msg**: string=null. The message of the choice item. If null, this choice option will be ignored (i.e. not displayed in the choice list).   
    - ?**goto**: string=null. The name of the step the user should be redirected to.     
    - ?**execute**: string=null. The name of the command (defined in the **commands** section) to execute. 
    - ?**value**: string. The value of the variable to store (when the **store_as** directive is set). 
        If not set, the value of variable will be the **msg** value. 
    
            
- ?**dynamic_choices**: string. A [KrankenStein one shot](https://github.com/lingtalfi/KrankenStein#one-shot-notation) string providing a list of items to choose from.
    Each item can be either a simple string, or a choice item as described in the **choices** directive just above.
- ?**ask**: string. A question to ask to the user. Note: to get back to the previous step once the question is asked, you need to type the **ask_back string** defined in the settings.  
- ?**ask_validation**: string. If you need some validation callback for the **ask** directive, you can use this directive.
    The possible values are:
    - not_empty: will re-ask the question until the answer is not empty.  
- ?**store_as**: string. The variable name to store the collected data with. The collected data can come from a choice (**choices**, **dynamic_choices**) or a question (**ask**).    
- ?**goto**: string. A step name to redirect to.
- ?**execute**: string. The name of a command to execute.     
 


Note: a step must define one (and only one) data collecting method: either **choices**, **dynamic_choices**, or **ask**.  
  


Commands
===========  

The **commands** section describes the available commands to use.
It's an array of key/value pairs, with the keys being the command names, and the values being the command items.

Each command item has the following stucture:


- ?**cmd**: the bash command to execute. It can use variable injection.
- ?**cmd_$variableName**: a bash command to execute. It can use variable injection. 
- ?**print**: a debug utility; it prints the [Bashtml](https://github.com/lingtalfi/CliTools/blob/master/doc/pages/bashtml.md#the-tags-list) formatted text associated with it.



The **cmd_$variableName** notation performs a test on the $variableName variable.
If the $variableName variable exists and is not null or the empty string, then the **cmd_$variableName** command will
be executed. Otherwise, the default **cmd** command will be executed.


So for instance, imagine the following excerpt of the configuration file:

```yaml
steps:
    create_backup:
        msg: Creating a backup
        ask: Choose the name of the backup (leave empty for automatic naming)?
        store_as: backup_name
        execute: backup_files_local      
commands:
    backup_files_local:
        cmd_backup_name: deploy backup-files name=${backup_name}
        cmd: deploy backup-files 
```

If we execute the program above, the **create_backup** step will be first executed,
and will ask the user for the name of a backup.

If the user leaves the field empty, then the **backup_name** variable will be created as an empty string,
and then when executing the **backup_files_local** command, the **cmd_backup_name** test will fail and the actual
command being executed will be the **cmd** (deploy backup-files).

However, if the user types "maurice" (for instance), then the **backup_name** variable will not be empty, and the 
**cmd_backup_name** test will succeed, and so the **cmd_backup_name** command will be executed (deploy backup-files name=${backup_name}).






