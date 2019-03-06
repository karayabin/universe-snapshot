Generated documentation styles
==============================
2019-02-09





Generated documentation is good, however we still need to define how the pages will be generated: what schemes
will they follow.

That's what we call **generated documentation styles**.



In this document, we should list all **generated documentation styles**. 








Planet style default
-------


This is the default (generated documentation) style for a planet.


A planet contains various php classes, each of which has its own page.
Each php class has various methods, each of which also has its own page.

So with this style we generate a page per class and a page per method.

We also generate a page for the planet itself.

We try to use the most natural filesystem mapping possible, and therefore came up with the structure below.

Our example uses two files from the **DocTools** planet:

- DocTools/ClassParser/ClassParser.php
- DocTools/Exception/PlanetParserException.php



```txt
- $docRoot/
    $generatedClassDirectoryName/           # default=classes
        - DocTools.md                       # this file contains the planet general documentation (in this case DocTools)
        - DocTools/                         # this directory contains all the classes related to the planet (in this case DocTools) 
            - ClassParser/
                - ClassParser.md
                - ClassParser/                  # this directory contains the (user defined) methods of this class
                    - parse.md
    
            - Exception/
                - PlanetParserException.md
```

Note: in the example above we used the markdown file type, but the same logic applies for html (or any other file type).







