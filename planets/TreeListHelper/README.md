TreeListHelper
===================
2016-08-25



Creates an array representing a directory (tree view).



Why?
-------

When you want to have a representation of a directory (tree), this class can help.



The structure
-----------------

This object takes a folder path as its first argument, some (optional) options,
and returns an array like the following.

```
[
   {name: "design", path: "design", children: [
            {name: "about material", path: "about material.md"}
            {name: "ling's weirdest stuff.md"}
            {name: "michelle", children: [
                {name: "paris.md"}   
                {name: "new-york.txt"}   
                {name: "pekin.jpg"}   
            ]}
        ]
    },
    ...
]
```


All items (files and directories) have "path" property and a "name" property (derived from the "path" property).
Furthermore, directories have also a "children" property.

The "path" is the basename of the item.


It is possible to add your own properties, to filter some part of the structure (for instance private data),
and/or to transform the value of the "name" property. See the advanced section for more details.




How to use
-------------------


```php
$dir = "/path/to/any/dir";
$options = [];
$items = TreeListHelper::scan($dir, $options);
```



Options
----------

- nameHumanize: boolean=true.
                    Whether or not to humanize the path.
                    This occurs during the name humanize pass.
                    If true, the name is humanized from the path, using an internal humanizing function.
                    If false, the name is the same as the path.
                    
- transform: string:transformedName callable ( string:name ).
                 If set, this function is called to transform the name.
                 This occurs during the name transform pass.
                    
- dirFilter: boolean callable ( string:dirBaseName, string:absolutePath ).
                If set, returns whether or not the given directory should be scanned.
                This might be useful if you want to exclude private folders for instance.
                If not set, all directories are scanned.
                
- fileFilter: boolean callable ( string:fileBaseName, string:absolutePath ).
                If set, returns whether or not the given file should be included in the results.
                If not set, all files are included.
                
- allowedExtensions: array.
                If set, only the files which extension is in the array are kept.
                The extension matching is case insensitive.
                By default, all extensions are allowed.
                
- pruneEmptyDir: bool=true.
                When a directory does not have at least one file as a descendant,
                should it be kept (false) or not (true).
                
- ignoreLinks: bool=true.
                Whether or not to ignore links.
- showBrokenLinks: bool=false.
                Only applies if ignoreLinks is false.
                Whether or not to show the broken links as files.
                
- skipHidden: bool=true.
                Whether or not to skip the hidden resources (files and/or folders)

- decorate: void callable ( array &item ).
                Hook that gives you the opportunity to decorate the final item.
                For instance, you can add new properties, or transform the "name" based on the "path".
                Note: to add a property, just add it directly to the given item array. 
                





Advanced
----------------

### Add your own properties

To add your own properties, use the decorate option.


### filter some part of the structure

Sometimes, you might have a private directory that you want to exclude.
You can tell the TreeListHelper to not parse a given directory by using the dirFilter option.

Similarly, you can exclude certain files using the fileFilter option. 


### transform the value of the name property

Here are the different passes that are applied to every item before it's included in the final results.


- symlinks filter pass (ignoreLinks and showBrokenLinks options)
- hidden filter pass (skipHidden option)
- dir filter pass (dirFilter option)
- extension pass (allowedExtensions option))
- file filter pass (fileFilter option)
- name humanize pass (nameHumanize option)
- name transform pass (transform option)
- decorate pass (decorate option)
- prune empty dir pass (pruneEmptyDir option)







History Log
------------------
    
- 1.0.0 -- 2016-08-26

    - initial commit
    
    