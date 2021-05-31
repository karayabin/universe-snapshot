[Back to the Ling/Light_PlanetInstaller api](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller.md)<br>
[Back to the Ling\Light_PlanetInstaller\Util\ImportUtil class](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/ImportUtil.md)


ImportUtil::import
================



ImportUtil::import — Tries to import the given planet into the current application, and returns the "session dir" path, where information data is stored.




Description
================


public [ImportUtil::import](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/ImportUtil/import.md)(string $planetDotName, ?array $options = []) : string | false




Tries to import the given planet into the current application, and returns the "session dir" path, where information data is stored.
Returns false if an exception occurred (the exception is displayed to the output).


See the [Light_PlanetInstaller conception notes](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/pages/conception-notes.md) for more details.


By default this method will import the planet in its latest version, and all the dependencies are also imported, recursively, in their latest versions.

By default, it also [bangs](https://github.com/lingtalfi/UniverseTools/blob/master/doc/pages/nomenclature.md#bang) the application directory.


If the given planet already exists in the current app, the method will ask you how to resolve the conflict.
Alternately, you can set the crm option of this method to set your choice in advance.

Any warning issued during the execution of this method will be available via the getWarnings method.


Available options are:

- version: string=null, specifies the versionNumber to use for the main planet. If specified, this tool will try to import
     the dependencies (if any) with the specific version number they had when the main planet was in the version $versionNumber.

- crm: string=latest, the (application) conflict resolution mode. If specified, this will set your answer for any potential application conflict that might occur when
     the planet we try to import already exists in the target app.

     This option was designed so that you can execute this command without you having to wait for a potential conflict. The possible values are:

     - ask: ask the user what to do
     - abort: abort
     - keep: keep the planet already existing in the app
     - replace: remove (irreversible) the planet already existing in the app and import the new one
     - latest: keep the planet with the latest version (this potentially can irreversibly remove the planet from your app if the challenger planet has a higher version)
     - earliest: keep the planet with the lowest version number  (this potentially can irreversibly remove the planet from your app if the challenger planet has a earlier version)


- deps: bool=true, whether to include dependencies. If false, only the given planet will be listed in the returned map.
- alt: string=local, the path to one alternate universe to search the planets from.
     The special value "local" means that the local universe will be used.
     See more about the local universe at: https://github.com/lingtalfi/UniverseTools/blob/master/doc/pages/conception-notes.md#local-universe.
     The rationale behind this is that searching an alternate universe is faster than searching the web (which requires http requests).
     Generally, the alternate universe is the directory where you create your planets, it's your developing environment.
     You might/might not have one.

- altHasLast: bool=true. Whether to consider that the alternate universe has always the latest versions of the planets.
- lo: string=aw, the location order. When searching for planets, this tells the method in which order the different locations are searched.
    The possible locations are:
    - alternate universe
    - web

    The possible values for this option are:
    - aw: search the alternate universe first, then the web
    - wa: search web first, then the alternate universe


- sym: bool=true. If a planet is found in an alternate universe, do we use a symlink to the planet in the alternate universe, or
     do we make a regular copy of the planet dir instead.
- app: string=null. The target application directory where to import the planet. If null, defaults to the current working directory.
- bang: bool=true. Whether to bang the application directory.
- force: bool=false. If true, the **theoretical import map** is used directly as the **concrete import map**, thus avoiding application conflicts.
     See the [Light_PlanetInstaller conception notes](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/pages/conception-notes.md) for more details.
     Basically, this means that the **theoretical import map** is imported directly and as is in the application, no question asked.

- out: string=null. If set, the return of this method will also be written to the given file location, in babyYaml format.
- tim: string|array=null. the theoretical import map to use.
     It can be in array form, or a path to the babyYaml file containing the theoretical import map.
     It's an array of planetDotName => version.
     Note: if the tim is set, the planetDotName (first argument of this method) is ignored.
- test: bool=false. if true, will stop after creating the concrete import map. The build dir will not be created, and the planets won't be imported
     into the target app. This mode can be useful to consult the concrete import map, the theoretical import map, and/or the conflicts.
- testBuild: bool=false. if true, will import planets into the build dir and stop after that: and the planets won't be imported into the target app.
     This mode can be useful to consult the concrete import map, the theoretical import map, and/or the conflicts, and examine the content of the build dir.
- showEndTip: bool=true. Whether to display an end tip at the end of the process.




Implementation notes:

The technique we use is to first create a dependencyTree, which is basically a list of planet/versionNumbers to import, in the order
they should be imported (parent first, children last).
Note that the order of importing planets is actually not really important, but this method is re-used by the install procedure, in which
the order of installation matters.




Parameters
================


- planetDotName

    

- options

    


Return values
================

Returns string | false.








Source Code
===========
See the source code for method [ImportUtil::import](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/Util/ImportUtil.php#L220-L483)


See Also
================

The [ImportUtil](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/ImportUtil.md) class.

Previous method: [setDebug](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/ImportUtil/setDebug.md)<br>Next method: [moveBuildDirToTargetApp](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/ImportUtil/moveBuildDirToTargetApp.md)<br>

