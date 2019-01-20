Wass0
=========
2015-10-26


Web Assets Standard Structures - 0




This convention describes a way to organize web assets (js and css) in an application.


Why?
------

Using this convention (or any other) might help third party package installers to do their jobs.
 
 
 
So what's the structure?
-----------------------------
 
In this convention, there is a special root directory referred to as "assets" in this document, and which contains all 
the assets of a given web application.
Typically, the assets directory is the web server root directory itself (often www).

The structure of the assets directory looks like this:

```
- [assets]/
----- js/
----- css/
----- libs/
-------- $libName/
------------ files of the library...
```


Js and css folders are reserved for the human developer.

The libs folder is where all dependencies using this convention are installed.
Import and export operations in the libs folder should be automated by third party tools (implementing this convention).

The libs folder's direct children are called packages (or library).
A package is a directory installed at the root of the libs folder, and its name is $libName.

