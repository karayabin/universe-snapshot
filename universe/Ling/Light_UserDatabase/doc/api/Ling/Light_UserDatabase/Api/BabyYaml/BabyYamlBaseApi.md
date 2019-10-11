[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)



The BabyYamlBaseApi class
================
2019-07-19 --> 2019-10-04






Introduction
============

The BabyYamlBaseApi class.



Class synopsis
==============


class <span class="pl-k">BabyYamlBaseApi</span>  {

- Properties
    - protected string [$file](#property-file) ;
    - protected string [$rootKey](#property-rootKey) ;
    - protected [Ling\BabyYamlDatabase\BabyYamlDatabaseInterface](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase/BabyYamlDatabaseInterface.md) [$babyYamlDatabase](#property-babyYamlDatabase) ;
    - protected string [$table](#property-table) ;
    - protected array [$ric](#property-ric) ;
    - protected string [$autoIncrementedKey](#property-autoIncrementedKey) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlBaseApi/__construct.md)() : void
    - public [setFile](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlBaseApi/setFile.md)(string $file) : void
    - public [setRootKey](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlBaseApi/setRootKey.md)(string $rootKey) : void
    - protected [getBabyYamlDatabase](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlBaseApi/getBabyYamlDatabase.md)() : [BabyYamlDatabaseInterface](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase/BabyYamlDatabaseInterface.md)
    - protected [getItemByKey](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlBaseApi/getItemByKey.md)(array $key, $default = null, bool $throwNotFoundEx = false) : array | false | null
    - protected [insertItem](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlBaseApi/insertItem.md)(array $item, bool $ignoreDuplicate = true, bool $returnRic = false) : array | bool | int | null

}




Properties
=============

- <span id="property-file"><b>file</b></span>

    This property holds the configuration file for this instance.
    
    

- <span id="property-rootKey"><b>rootKey</b></span>

    This property holds the rootKey for this instance.
    See the [BabyYamlDatabase](https://github.com/lingtalfi/BabyYamlDatabase/) planet for more details.
    
    

- <span id="property-babyYamlDatabase"><b>babyYamlDatabase</b></span>

    This property holds the babyYamlDatabase for this instance.
    
    

- <span id="property-table"><b>table</b></span>

    This property holds the table for this instance.
    
    

- <span id="property-ric"><b>ric</b></span>

    This property holds the ric for this instance.
    
    

- <span id="property-autoIncrementedKey"><b>autoIncrementedKey</b></span>

    This property holds the autoIncrementedKey for this instance.
    
    



Methods
==============

- [BabyYamlBaseApi::__construct](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlBaseApi/__construct.md) &ndash; Builds the BabyYamlBaseApi instance.
- [BabyYamlBaseApi::setFile](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlBaseApi/setFile.md) &ndash; Sets the file.
- [BabyYamlBaseApi::setRootKey](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlBaseApi/setRootKey.md) &ndash; Sets the rootKey.
- [BabyYamlBaseApi::getBabyYamlDatabase](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlBaseApi/getBabyYamlDatabase.md) &ndash; Returns the babyYamlDatabase object for this instance.
- [BabyYamlBaseApi::getItemByKey](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlBaseApi/getItemByKey.md) &ndash; Returns the first row matching the given key.
- [BabyYamlBaseApi::insertItem](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlBaseApi/insertItem.md) &ndash; Inserts the given item in the database.





Location
=============
Ling\Light_UserDatabase\Api\BabyYaml\BabyYamlBaseApi<br>
See the source code of [Ling\Light_UserDatabase\Api\BabyYaml\BabyYamlBaseApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Api/BabyYaml/BabyYamlBaseApi.php)



SeeAlso
==============
Next class: [BabyYamlPermissionApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlPermissionApi.md)<br>
