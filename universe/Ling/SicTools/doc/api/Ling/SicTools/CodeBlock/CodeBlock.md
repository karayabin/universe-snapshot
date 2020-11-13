[Back to the Ling/SicTools api](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools.md)



The CodeBlock class
================
2019-04-25 --> 2020-08-17






Introduction
============

The CodeBlock class is a container for php code.



Class synopsis
==============


class <span class="pl-k">CodeBlock</span>  {

- Properties
    - private array [$statements](#property-statements) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/CodeBlock/CodeBlock/__construct.md)() : void
    - public [addStatement](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/CodeBlock/CodeBlock/addStatement.md)($statement) : void
    - public [getStatements](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/CodeBlock/CodeBlock/getStatements.md)() : array

}




Properties
=============

- <span id="property-statements"><b>statements</b></span>

    This property holds the array of statements for this code block instance.
    
    



Methods
==============

- [CodeBlock::__construct](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/CodeBlock/CodeBlock/__construct.md) &ndash; Builds the CodeBlock instance.
- [CodeBlock::addStatement](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/CodeBlock/CodeBlock/addStatement.md) &ndash; Adds a statement to the code block.
- [CodeBlock::getStatements](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/CodeBlock/CodeBlock/getStatements.md) &ndash; Returns all the statements attached to this code block.





Location
=============
Ling\SicTools\CodeBlock\CodeBlock<br>
See the source code of [Ling\SicTools\CodeBlock\CodeBlock](https://github.com/lingtalfi/SicTools/blob/master/CodeBlock/CodeBlock.php)



SeeAlso
==============
Next class: [ColdServiceResolver](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/ColdServiceResolver.md)<br>
