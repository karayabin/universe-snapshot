The Ling.Light_DeveloperWizard command line tool
--------
2021-06-29


We provide a command line tool.

It uses the [Light_Cli](https://github.com/lingtalfi/Light_Cli/) planet with an appId of **wiz**.

So for instance, you can access our raw commands with something like:

```bash
lt wiz $the_command_name
```

Reminder: if a command has an alias, you can omit the **wiz** identifier and type $the_command_name directly after **lt**.


The commands are the following.


```yamll
- **help**: shows the help for the <b>Ling.Light_DeveloperWizard</b> cli tool. 
    - Arguments:
        - flags:
            - v: display a more verbose help  
- **create_controller**:
    Creates a basic controller. This is an interactive command, just type it and follow the instructions.
      
    - Arguments:
        - aliases: 
            - create_widget
```

