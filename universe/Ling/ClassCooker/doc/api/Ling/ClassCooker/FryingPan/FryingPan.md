[Back to the Ling/ClassCooker api](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker.md)



The FryingPan class
================
2020-07-21 --> 2021-06-28






Introduction
============

The FryingPan class.
See the [frying pan conception notes](https://github.com/lingtalfi/ClassCooker/blob/master/doc/pages/frying-pan-conception-notes.md) for more details.



Class synopsis
==============


class <span class="pl-k">FryingPan</span>  {

- Properties
    - protected string [$file](#property-file) ;
    - protected [Ling\ClassCooker\ClassCooker](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker.md) [$cooker](#property-cooker) ;
    - protected [Ling\ClassCooker\FryingPan\Ingredient\IngredientInterface[]](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/IngredientInterface.md) [$ingredients](#property-ingredients) ;
    - protected array [$options](#property-options) ;
    - private string [$className](#property-className) ;
    - private null|callable [$loggerCallback](#property-loggerCallback) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/FryingPan/__construct.md)() : void
    - public [setFile](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/FryingPan/setFile.md)(string $file) : void
    - public [getFile](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/FryingPan/getFile.md)() : string
    - public [setOptions](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/FryingPan/setOptions.md)(array $options) : void
    - public [addIngredient](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/FryingPan/addIngredient.md)([Ling\ClassCooker\FryingPan\Ingredient\IngredientInterface](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/IngredientInterface.md) $ingredient) : [FryingPan](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/FryingPan.md)
    - public [cook](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/FryingPan/cook.md)() : void
    - public [sendToLog](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/FryingPan/sendToLog.md)(string $msg, string $msgType) : void
    - public [getCooker](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/FryingPan/getCooker.md)() : [ClassCooker](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker.md)
    - protected [getClassName](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/FryingPan/getClassName.md)() : string
    - private [getLogger](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/FryingPan/getLogger.md)() : callable
    - private [error](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/FryingPan/error.md)(string $msg) : void

}




Properties
=============

- <span id="property-file"><b>file</b></span>

    The path to the file to work on.
    
    

- <span id="property-cooker"><b>cooker</b></span>

    This property holds the cooker for this instance.
    
    

- <span id="property-ingredients"><b>ingredients</b></span>

    This property holds the ingredients for this instance.
    
    

- <span id="property-options"><b>options</b></span>

    The options for this class.
    Available options are:
    
    - loggerCallable: callable, a callback to call whenever a message needs to be send to the log.
         If not set, no message will be sent.
         The signature of the callable looks like this:
         - fn ( string msg, string msgType )
    
         With:
         - msg: string, the message to send to the log. It's decided by the ingredients.
         - msgType: string, one of:
             - add,      if the ingredient will be added during the cooking
             - skip,     if the ingredient is already found in the class, and will not be added
             - warning,  if a similar ingredient is found in the class, which prevents the addition of the new ingredient
             - error,    if the ingredient can't be added, due to an error
    
    

- <span id="property-className"><b>className</b></span>

    This property holds the className for this instance.
    
    

- <span id="property-loggerCallback"><b>loggerCallback</b></span>

    This property holds the loggerCallback for this instance.
    
    



Methods
==============

- [FryingPan::__construct](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/FryingPan/__construct.md) &ndash; Builds the FryingPan instance.
- [FryingPan::setFile](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/FryingPan/setFile.md) &ndash; Sets the file.
- [FryingPan::getFile](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/FryingPan/getFile.md) &ndash; Returns the file of this instance.
- [FryingPan::setOptions](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/FryingPan/setOptions.md) &ndash; Sets the options.
- [FryingPan::addIngredient](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/FryingPan/addIngredient.md) &ndash; Adds an ingredient, and returns itself for chaining.
- [FryingPan::cook](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/FryingPan/cook.md) &ndash; Cooks all the ingredients into the file we're working on.
- [FryingPan::sendToLog](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/FryingPan/sendToLog.md) &ndash; Sends a message to the log (if the loggerCallable is defined).
- [FryingPan::getCooker](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/FryingPan/getCooker.md) &ndash; Returns the cooker of this instance.
- [FryingPan::getClassName](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/FryingPan/getClassName.md) &ndash; Returns the name of the class we're working on.
- [FryingPan::getLogger](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/FryingPan/getLogger.md) &ndash; Returns the logger callable.
- [FryingPan::error](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/FryingPan/error.md) &ndash; Throws an exception.





Location
=============
Ling\ClassCooker\FryingPan\FryingPan<br>
See the source code of [Ling\ClassCooker\FryingPan\FryingPan](https://github.com/lingtalfi/ClassCooker/blob/master/FryingPan/FryingPan.php)



SeeAlso
==============
Previous class: [ClassCookerException](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/Exception/ClassCookerException.md)<br>Next class: [BaseIngredient](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/BaseIngredient.md)<br>
