2017-02-23



So every time you call the cleaner you've got a set of file.
Some of them are going to be deleted, and the others not.

So the role of the cleaner is to decide which files are going to be deleted.

The client chooses the files to be deleted via the WHAT parameter: 1 per week, 3 per week, 2 per month, the first of every month, ...

WHAT parameters can be accumulated to shape a complex set of files.



How do you translate the WHAT parameters into a set of files?
======================================================================



So the technique the cleaner uses is to scan all the files in a given directory,
and memorize them.

Then, it decides which files to keep, and which files to throw away, based on the WHAT parameter(s) he's got.

To handle the diversity of the WHAT parameter, it uses a callback.

Basically, for each file in the directory, the cleaner calls all the callbacks it has (one callback equals one WHAT parameter),
and if one of them says to keep the file, then the file is kept.

When the parsing of the directory ends, we end up with the list of files to keep.


To make things simple, the callback only has two possible outputs: true or false (true to keep the file).


Now, to convert the human syntax "1 per week" (for instance) into an actual callback,
we can use an adapter.



As in chess, we can have many lines.
Here, let me define the main line.

The main line is to name all the files like this:


```
- file: <prefix> <fileName>
- prefix: <date> (<sep> <time>)? <sep>     // example: 20170223--073149--  
- date: <year> <month> <day> 
- sep: <-->
- time: <hour> <minute> <second>
- fileName: the file name, example: mybackup.txt
```


