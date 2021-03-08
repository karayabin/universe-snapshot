BSR-0
=============
2015-10-05 --> 2021-03-08



**BSR-0** is a convention for naming and organizing php classes.



Class naming
-----------------
A class name is composed of different components.


For instance the class name **Batman57\Translator\BatmanTranslator** is composed of three components:

- Batman57
- Translator
- BatmanTranslator


Every component SHOULD use the [PascalCase](https://github.com/lingtalfi/ConventionGuy/blob/master/nomenclature.stringCases.eng.md#pascalcase)).





Class organization
-----------------

A **BSR-0** class resides under a root directory,
and the path of the class file is the class name, with the ".php" extension added at the end, and with backslashes (\) converted to forward slashes (/).

Each bsr-0 file must contain one class, and one class only.


So for instance if our root directory is **/my/directory**, then the path to the **Batman57\Translator\BatmanTranslator** BSR-0 class must be:

- /my/directory/Batman57/Translator/BatmanTranslator.php


Note: it is possible to have multiple root directories, so that you don't need to have aaaaaallll your classes in under just one root directory.

The [BumbleBee autoloader](https://github.com/lingtalfi/BumbleBee) will help you creating multiple root directories.