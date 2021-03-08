[Back to the Ling/TokenFun api](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun.md)<br>
[Back to the Ling\TokenFun\Parser\UseStatementsParser class](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/Parser/UseStatementsParser.md)


UseStatementsParser::parseTokens
================



UseStatementsParser::parseTokens — The method will stop parsing tokens after it encounters the first "class" token, assuming the class is [bsr0 compatible](https://github.com/lingtalfi/BumbleBee/blob/master/Autoload/convention.bsr0.eng.md).




Description
================


public [UseStatementsParser::parseTokens](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/Parser/UseStatementsParser/parseTokens.md)(array $tokens) : array




Returns an array of useStatement items (from the given tokens), each of which:

- 0: (class) string, the real class of the use statement
- 1: (alias) string, the alias used if any, or null otherwise
- 2: (type) string, the type of alias used: one of:
         - class         (for instance: use My\Full\NSname;)
         - function      (for instance: use function My\Full\functionName;)
         - const         (for instance: use const My\Full\CONSTANT;)


This method recognizes the following style of use statements:
(https://www.php.net/manual/en/language.namespaces.importing.php)


- use My\Full\Classname;                                 // standard use statement
- use CC;                                                // use statement with simple string as classname
- use My\Full\Classname as Another;                      // use of alias
- use function My\Full\functionName;                     // use of the function keyword
- use const My\Full\CONSTANT;                            // use of the const keyword
- use My\Full\Classname as Another, My\Full\NSname;      // multiple use statements combined
- use function some\namespace\{fn_a, fn_b, fn_c};        // group use declarations
- use some\namespace\{ClassA, ClassB, ClassC as C};      // group use declarations with alias
- use My\Test\{ClassA as P, ClassB, Exception\ClassC};   // group use declarations with relative namespaces
- use My\Test\{TeeParty, function fn_a, const EDM};      // group use declarations using function and const keywords


Apparently the following cases are not handled by php yet, so it's not handled in this method either:


- use My\Test\{ClassA as P, ClassB, Exception\ClassC}, some\namespace\ClassB;                                // group use declarations followed by multiple use statements
- use Ling\BabyYaml\BabyYamlUtil as M, Ling\UniverseTools\{PlanetTool as P2, LocalUniverseTool as P99};      // multiple use statement with a group use member



The method will stop parsing tokens after it encounters the first "class" token, assuming the class is [bsr0 compatible](https://github.com/lingtalfi/BumbleBee/blob/master/Autoload/convention.bsr0.eng.md).




Parameters
================


- tokens

    


Return values
================

Returns array.








Source Code
===========
See the source code for method [UseStatementsParser::parseTokens](https://github.com/lingtalfi/TokenFun/blob/master/Parser/UseStatementsParser.php#L58-L281)


See Also
================

The [UseStatementsParser](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/Parser/UseStatementsParser.md) class.

Next method: [debugToken](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/Parser/UseStatementsParser/debugToken.md)<br>

