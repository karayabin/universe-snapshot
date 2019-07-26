[Back to the Ling/Uni2 api](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2.md)<br>
[Back to the Ling\Uni2\Util\ImportUtil class](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Util/ImportUtil.md)


ImportUtil::importItem
================



ImportUtil::importItem — Tries to reimport an item into the current application.




Description
================


protected [ImportUtil::importItem](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Util/ImportUtil/importItem.md)(?$dependencySystem, ?$packageImportName, ?$appItemDir, Ling\CliTools\Output\OutputInterface $output, array $postInstall, array $options = []) : void




Tries to reimport an item into the current application.
See the [universe dependency system page](https://github.com/lingtalfi/TheScientist/blob/master/universe-dependencies-2019.md) for more details.

The item is identified by the $dependencySystem and the $packageImportName.


Algorithm
--------------
Here is the inner algorithm of this method in a nutshell.

1. this method re-imports the given item.
     The reimporting steps are always the same:
         - it will first try to import the item from the local server
         - if the item is not in the local server, it will try to import it from the web.
                 Also, if this step is successful, this method will try to make a local server copy of the item
                 for the next time.
         - if it fails too, a warning is been displayed and the next item is processed

2. Then if it's a planet, it processes any dependencies that the item has.
     The dependency process is the following by default:
         - if the force flag is set, the dependency will be reimported no matter what
         - else, if the dependency already exists in the application and is up-to-date (i.e. it has the same
             version number than the version number in the [local dependency master file](https://github.com/lingtalfi/Uni2/blob/master/README.md#the-dependency-master-file)), then
             the dependency will not be reimported.
         - else, if the dependency doesn't exist in the application, or if it exists but is outdated,
             then it gets reimported.
         - if reimported, this whole algorithm is being reused from the beginning (starting back from step 1...).

3. If the item is a planet and has post install directives, those are executed.




Parameters
================


- dependencySystem

    

- packageImportName

    

- appItemDir

    The directory where the item should be imported into.
Warning: the old directory, if it exists, might be removed/replaced by the newly created item directory.

- output

    

- postInstall

    

- options

    - indentLevel: int=0. The base indent level to write output messages with.
- resolveDependencies: bool=true. An internal property, you shouldn't use it. Forces whether or not to allow dependency resolving.
- forceMode: bool=false. In force mode, all items are reimported, even if their version number is the latest.
- forceMode: bool=false. In force mode, all items are reimported, even if their version number is the latest.
- importMode: (only applies to planets)

     - reimport: the planet is imported if one of the following cases is true:

         - the planet does not exist in the application yet
         - the force flag is set to true
         - the planet exists in the application but there is a newer version available (defined in the local master dependency file)

     - import: the planet is imported if one of the following cases is true:

         - the planet does not exist in the application yet
         - the force flag is set to true

     - store: the planet is imported only in the local server




- _appReplacedItemDir: used by the PackUni2Command. You should not used it.



For non-planets, the behaviour is to import only if the item does not exist.
The force flag has no effect on non-planets.
For more control on this behaviour, one needs to use the post install directives...


Return values
================

Returns void.


Exceptions thrown
================

- [Uni2Exception](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Exception/Uni2Exception.md).&nbsp;







Source Code
===========
See the source code for method [ImportUtil::importItem](https://github.com/lingtalfi/Uni2/blob/master/Util/ImportUtil.php#L222-L529)


See Also
================

The [ImportUtil](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Util/ImportUtil.md) class.

Previous method: [importPlanet](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Util/ImportUtil/importPlanet.md)<br>Next method: [handlePostInstallDirectives](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Util/ImportUtil/handlePostInstallDirectives.md)<br>

