Ling/ClassCooker
================
2020-07-21 --> 2021-06-28




Table of contents
===========

- [ClassCooker](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker.md) &ndash; The ClassCooker class.
    - [ClassCooker::create](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/create.md) &ndash; Creates a new instance of this class, and returns it.
    - [ClassCooker::setFile](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/setFile.md) &ndash; Sets the file to work with.
    - [ClassCooker::addContent](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/addContent.md) &ndash; Adds a string to the class.
    - [ClassCooker::addMethod](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/addMethod.md) &ndash; Adds the given method(s) to a class if it doesn't exist.
    - [ClassCooker::addProperty](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/addProperty.md) &ndash; Adds a property to the current class.
    - [ClassCooker::addUseStatements](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/addUseStatements.md) &ndash; Adds the given use statement(s) to the class, if it doesn't exist.
    - [ClassCooker::getMethodContent](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/getMethodContent.md) &ndash; Returns the method content, by default including the signature and the wrapping curly brackets.
    - [ClassCooker::getMethodSignature](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/getMethodSignature.md) &ndash; Returns the given method' signature, or false if the method doesn't exist.
    - [ClassCooker::getClassName](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/getClassName.md) &ndash; Returns the class name of the current class (i.e.
    - [ClassCooker::getMethods](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/getMethods.md) &ndash; Return an array of all the method signatures of the current class.
    - [ClassCooker::getMethodBoundariesByName](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/getMethodBoundariesByName.md) &ndash; Get the boundaries for a given method.
    - [ClassCooker::getMethodsBoundaries](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/getMethodsBoundaries.md) &ndash; Proxy to the [ClassCookerHelper::getMethodsBoundaries](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/Helper/ClassCookerHelper/getMethodsBoundaries.md) method.
    - [ClassCooker::hasMethod](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/hasMethod.md) &ndash; Returns whether the class contains the given method.
    - [ClassCooker::hasParent](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/hasParent.md) &ndash; Returns whether the current class has a parent.
    - [ClassCooker::getParentSymbol](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/getParentSymbol.md) &ndash; Returns the parent symbol if any, or false otherwise.
    - [ClassCooker::getMethodsBasicInfo](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/getMethodsBasicInfo.md) &ndash; Returns an array of propertyName => informationItem about the class methods, in the order they appear in the class file.
    - [ClassCooker::getClassStartLine](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/getClassStartLine.md) &ndash; Returns the number of the start line of the class.
    - [ClassCooker::getClassFirstEmptyLine](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/getClassFirstEmptyLine.md) &ndash; Returns the number of the first empty line found after the class declaration, or false if there is no empty line.
    - [ClassCooker::getClassLastLineInfo](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/getClassLastLineInfo.md) &ndash; Returns an array containing information related to the end of the class.
    - [ClassCooker::hasProperty](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/hasProperty.md) &ndash; Returns whether the current class contains the given property.
    - [ClassCooker::hasUseStatement](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/hasUseStatement.md) &ndash; Returns whether the current class contains an use statement which references the given useStatementClass.
    - [ClassCooker::hasUseStatementSymbol](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/hasUseStatementSymbol.md) &ndash; Returns whether the given symbol is defined in the use statements.
    - [ClassCooker::removeMethod](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/removeMethod.md) &ndash; or does nothing and returns false if the method was not found.
    - [ClassCooker::updateMethodContent](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/updateMethodContent.md) &ndash; Updates the inner content of a method, using a callable.
    - [ClassCooker::updateClassSignature](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/updateClassSignature.md) &ndash; Updates the class signature using the given callable.
    - [ClassCooker::addParentClass](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/addParentClass.md) &ndash; Adds a parent class to the current service class.
    - [ClassCooker::updatePropertyComment](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/updatePropertyComment.md) &ndash; Updates the [docblock comment](https://github.com/lingtalfi/TheBar/blob/master/discussions/docblock-comment.md) of the given property (if there is one), using the given callable.
- [ClassCookerException](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/Exception/ClassCookerException.md) &ndash; The ClassCookerException class.
- [FryingPan](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/FryingPan.md) &ndash; The FryingPan class.
    - [FryingPan::__construct](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/FryingPan/__construct.md) &ndash; Builds the FryingPan instance.
    - [FryingPan::setFile](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/FryingPan/setFile.md) &ndash; Sets the file.
    - [FryingPan::getFile](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/FryingPan/getFile.md) &ndash; Returns the file of this instance.
    - [FryingPan::setOptions](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/FryingPan/setOptions.md) &ndash; Sets the options.
    - [FryingPan::addIngredient](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/FryingPan/addIngredient.md) &ndash; Adds an ingredient, and returns itself for chaining.
    - [FryingPan::cook](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/FryingPan/cook.md) &ndash; Cooks all the ingredients into the file we're working on.
    - [FryingPan::sendToLog](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/FryingPan/sendToLog.md) &ndash; Sends a message to the log (if the loggerCallable is defined).
    - [FryingPan::getCooker](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/FryingPan/getCooker.md) &ndash; Returns the cooker of this instance.
- [BaseIngredient](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/BaseIngredient.md) &ndash; The BaseIngredient class.
    - [BaseIngredient::__construct](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/BaseIngredient/__construct.md) &ndash; Builds the BaseIngredient instance.
    - [BaseIngredient::create](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/BaseIngredient/create.md) &ndash; Create a new instance and returns it.
    - [BaseIngredient::setFryingPan](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/BaseIngredient/setFryingPan.md) &ndash; Attaches a frying pan instance to the ingredient, and returns itself for chaining.
    - [BaseIngredient::setValue](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/BaseIngredient/setValue.md) &ndash; Sets the value.
    - [IngredientInterface::execute](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/IngredientInterface/execute.md) &ndash; Executes the goal of the ingredient.
- [BasicConstructorIngredient](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/BasicConstructorIngredient.md) &ndash; The BasicConstructorIngredient class.
    - [BasicConstructorIngredient::execute](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/BasicConstructorIngredient/execute.md) &ndash; Executes the goal of the ingredient.
    - [BaseIngredient::__construct](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/BaseIngredient/__construct.md) &ndash; Builds the BaseIngredient instance.
    - [BaseIngredient::create](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/BaseIngredient/create.md) &ndash; Create a new instance and returns it.
    - [BaseIngredient::setFryingPan](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/BaseIngredient/setFryingPan.md) &ndash; Attaches a frying pan instance to the ingredient, and returns itself for chaining.
    - [BaseIngredient::setValue](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/BaseIngredient/setValue.md) &ndash; Sets the value.
- [BasicConstructorVariableInitIngredient](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/BasicConstructorVariableInitIngredient.md) &ndash; The BasicConstructorVariableInitIngredient class.
    - [BasicConstructorVariableInitIngredient::execute](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/BasicConstructorVariableInitIngredient/execute.md) &ndash; Executes the goal of the ingredient.
    - [BaseIngredient::__construct](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/BaseIngredient/__construct.md) &ndash; Builds the BaseIngredient instance.
    - [BaseIngredient::create](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/BaseIngredient/create.md) &ndash; Create a new instance and returns it.
    - [BaseIngredient::setFryingPan](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/BaseIngredient/setFryingPan.md) &ndash; Attaches a frying pan instance to the ingredient, and returns itself for chaining.
    - [BaseIngredient::setValue](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/BaseIngredient/setValue.md) &ndash; Sets the value.
- [IngredientInterface](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/IngredientInterface.md) &ndash; The IngredientInterface interface.
    - [IngredientInterface::execute](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/IngredientInterface/execute.md) &ndash; Executes the goal of the ingredient.
    - [IngredientInterface::setFryingPan](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/IngredientInterface/setFryingPan.md) &ndash; Attaches a frying pan instance to the ingredient, and returns itself for chaining.
- [MethodIngredient](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/MethodIngredient.md) &ndash; The MethodIngredient class.
    - [MethodIngredient::execute](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/MethodIngredient/execute.md) &ndash; Executes the goal of the ingredient.
    - [BaseIngredient::__construct](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/BaseIngredient/__construct.md) &ndash; Builds the BaseIngredient instance.
    - [BaseIngredient::create](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/BaseIngredient/create.md) &ndash; Create a new instance and returns it.
    - [BaseIngredient::setFryingPan](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/BaseIngredient/setFryingPan.md) &ndash; Attaches a frying pan instance to the ingredient, and returns itself for chaining.
    - [BaseIngredient::setValue](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/BaseIngredient/setValue.md) &ndash; Sets the value.
- [ParentIngredient](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/ParentIngredient.md) &ndash; The ParentIngredient class.
    - [ParentIngredient::execute](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/ParentIngredient/execute.md) &ndash; Executes the goal of the ingredient.
    - [BaseIngredient::__construct](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/BaseIngredient/__construct.md) &ndash; Builds the BaseIngredient instance.
    - [BaseIngredient::create](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/BaseIngredient/create.md) &ndash; Create a new instance and returns it.
    - [BaseIngredient::setFryingPan](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/BaseIngredient/setFryingPan.md) &ndash; Attaches a frying pan instance to the ingredient, and returns itself for chaining.
    - [BaseIngredient::setValue](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/BaseIngredient/setValue.md) &ndash; Sets the value.
- [PropertyIngredient](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/PropertyIngredient.md) &ndash; The PropertyIngredient class.
    - [PropertyIngredient::execute](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/PropertyIngredient/execute.md) &ndash; Executes the goal of the ingredient.
    - [BaseIngredient::__construct](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/BaseIngredient/__construct.md) &ndash; Builds the BaseIngredient instance.
    - [BaseIngredient::create](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/BaseIngredient/create.md) &ndash; Create a new instance and returns it.
    - [BaseIngredient::setFryingPan](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/BaseIngredient/setFryingPan.md) &ndash; Attaches a frying pan instance to the ingredient, and returns itself for chaining.
    - [BaseIngredient::setValue](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/BaseIngredient/setValue.md) &ndash; Sets the value.
- [UseStatementIngredient](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/UseStatementIngredient.md) &ndash; The UseStatementIngredient class.
    - [UseStatementIngredient::execute](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/UseStatementIngredient/execute.md) &ndash; Executes the goal of the ingredient.
    - [BaseIngredient::__construct](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/BaseIngredient/__construct.md) &ndash; Builds the BaseIngredient instance.
    - [BaseIngredient::create](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/BaseIngredient/create.md) &ndash; Create a new instance and returns it.
    - [BaseIngredient::setFryingPan](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/BaseIngredient/setFryingPan.md) &ndash; Attaches a frying pan instance to the ingredient, and returns itself for chaining.
    - [BaseIngredient::setValue](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/BaseIngredient/setValue.md) &ndash; Sets the value.
- [ClassCookerHelper](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/Helper/ClassCookerHelper.md) &ndash; The ClassCookerHelper class.
    - [ClassCookerHelper::createSectionComment](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/Helper/ClassCookerHelper/createSectionComment.md) &ndash; Creates a section comment.
    - [ClassCookerHelper::getSectionLineNumber](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/Helper/ClassCookerHelper/getSectionLineNumber.md) &ndash; Returns the number of the line (in the file) containing the beginning of the [section comment](https://github.com/lingtalfi/TheBar/blob/master/discussions/section-comment.md), or false if the section wasn't found.
    - [ClassCookerHelper::getMethodsBoundaries](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/Helper/ClassCookerHelper/getMethodsBoundaries.md) &ndash; Returns an array of method => [startLine, endLine].


Dependencies
============
- [Bat](https://github.com/lingtalfi/Bat)
- [TokenFun](https://github.com/lingtalfi/TokenFun)


