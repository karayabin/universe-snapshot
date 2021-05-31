[Back to the Ling/Kit api](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit.md)



The ConfStorageInterface class
================
2019-04-24 --> 2021-05-31






Introduction
============

The ConfStorageInterface interface.



Class synopsis
==============


abstract class <span class="pl-k">ConfStorageInterface</span>  {

- Methods
    - abstract public [getPageConf](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/ConfStorage/ConfStorageInterface/getPageConf.md)(string $pageName) : array | false
    - abstract public [getErrors](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/ConfStorage/ConfStorageInterface/getErrors.md)() : array

}






Methods
==============

- [ConfStorageInterface::getPageConf](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/ConfStorage/ConfStorageInterface/getPageConf.md) &ndash; Returns the page conf array for the given $pageName, or false if a problem occurs.
- [ConfStorageInterface::getErrors](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/ConfStorage/ConfStorageInterface/getErrors.md) &ndash; Returns the errors that occurred during the last method call.





Location
=============
Ling\Kit\ConfStorage\ConfStorageInterface<br>
See the source code of [Ling\Kit\ConfStorage\ConfStorageInterface](https://github.com/lingtalfi/Kit/blob/master/ConfStorage/ConfStorageInterface.php)



SeeAlso
==============
Previous class: [BabyYamlConfStorage](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/ConfStorage/BabyYamlConfStorage.md)<br>Next class: [VariableAwareConfStorageInterface](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/ConfStorage/VariableAwareConfStorageInterface.md)<br>
