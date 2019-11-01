Light Real Generator
================
2019-10-23




The main idea of the real generator is to generate the config files for both the [realist](https://github.com/lingtalfi/Light_Realist) and the [realform](https://github.com/lingtalfi/Light_Realform) plugins,
which is a step towards generating an auto-admin.


The real generator is available as a service, and you basically just call an identifier which is an entry of a [babyYaml](https://github.com/lingtalfi/BabyYaml) file.


You can organize your configurations how you wish: either one per file, or multiple configurations per file, and create as many files as you want.

The main method to execute the generator is: 


- generate( string file, string identifier )



All other configuration is done inside the configuration identified by the given file and identifier.



For nomenclature sake, and ease of development, the expression **configuration block** will be used to represent the configuration
array identified by the aforementioned file and identifier.


To make things simpler, I've limited the generator to generate only configuration files for a given database.

This means if you want to generate configuration files based on tables coming from different databases, you need to call the generator's **generate** method
once per database.





The configuration block
--------------
2019-10-23


See the [configuration block document](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/pages/realgen-configuration-block.md).







