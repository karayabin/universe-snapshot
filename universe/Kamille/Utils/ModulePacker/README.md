KamilleModulePacker
==========================
2018-03-06


A tool to help the kamille module developer pack her module in a distributable form.





It uses the power of convention to ease the packing process.
The following conventions need to be respected:

- your module's services and hooks all start with the ModuleName (CamelCase with first letter being uppercase)
- your module's routes also need to start with the same ModuleName
- you need to create a _pack.txt file at the root of your module, containing entries of the target application
    to pack into the module's "files" directory (see module install in kamille docs for more details)




Note: the directory of the module must exist in the application before you can successfully execute the packing operation.





The _pack.txt syntax
-------------------    
In your _pack.txt file, you can use different things:


- baseNode
- tags


### Base node

To understand the concept of base node, let's picture that the goal of the operation is 
to move some entries from a target app to the module's **files/app** directory.

In other words, we have a source dir (the target app) and a target dir (the module's files/app dir).
But to make things simpler, we use baseNodes.

A baseNode encapsulates the two ends (the source and the target), so that it's simpler 
to write this dual relationship.

For now the available base nodes are:


- `[app]`: the path to the app root (as the source) and the **files/app** dir of the module as the target.


So for instance, this path:

```txt
[app]/class-controllers/{ModuleName}
```

means: take the **/class-controllers/{ModuleName}** from the source app, and put them into the
/files/app/class-controllers/{ModuleName} of the module's dir (which happens to be class-modules/{ModuleName}). 



Note: there should always be a baseNode in a _pack.txt entry, and one only.
Plus, it must be at the very beginning of (starting) the entry. 



### Tag
   
The following tags are available.
Those are simple strings replaced with their semantic equivalent.


- {moduleName}: the module name using camelCase (first letter lower case)
- {ModuleName}: the module name using CamelCase (first letter uppder case)
  


### Comments

You can comment a line (entry) by prepending the line with the sharp symbol (#).
This has to be the very first char of the line for the line to be recognized as comment.
    
    
    
About the packing process
------------------

When you pack a module, it copies the files in the source app into the target module, 
but it doesn't cut them (i.e. the files still exist in the source app).


Also, the packer will ignore links by default. 


For hooks, the hooks will be packed as empty methods (i.e. you will loose their content if any).
In kamille, if you want to register to hooks, you need to put your hooks subscriptions in the {ModuleName}Hooks.php file
at the root of the module.

    




