Btests directory
====================
2015-11-13



This convention proposes a filesystem organisation for unit testing using 
[Beauty'n'Beast](https://github.com/lingtalfi/Dreamer/blob/master/UnitTesting/BeautyNBeast/pattern.beautyNBeast.eng.md)
approach. 
[Planet](https://github.com/lingtalfi/Observer/blob/master/article/article.planetReference.eng.md) authors can use it.
 
 
 
File system structure
------------------------
 
``` 
- $planetRootDir/
----- btests/
--------- $className (FlexiblePascalCase)
------------- $methodName (camelCase)
----------------- $fileName 
``` 


Cases used are defined in the [string cases nomenclature](https://github.com/lingtalfi/ConventionGuy/blob/master/nomenclature.stringCases.eng.md).


With:

```
- $className: the name of the class using the FlexiblePascalCase (the same name as the php class in the class file)
- $methodName: the name of the method in camelCase
- $fileName: <className2> <.> <methodName> (<.> <identifier>)? <.> <extension> 
----- className2: name of the class in camelCase
----- methodName: $methodName
----- identifier: would precise which type of test is executed. 
                    If there were many files testing the same method, the identifier could help differentiate what is being tested.
                    
----- extension: the file extension. One can use the test.php extension. 
                    The test.php extension allows you and perhaps more importantly the Beauty parser 
                    to differentiate between regular php files (which could be assets,
                    or generated files) and php test files which contain the tests.
```
