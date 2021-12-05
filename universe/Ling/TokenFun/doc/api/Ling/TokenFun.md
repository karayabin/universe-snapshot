Ling/TokenFun
================
2020-07-28 --> 2021-08-16




Table of contents
===========

- [TokenFunException](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/Exception/TokenFunException.md) &ndash; The TokenFunException class.
- [UseStatementsParser](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/Parser/UseStatementsParser.md) &ndash; The UseStatementsParser class.
    - [UseStatementsParser::parseTokens](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/Parser/UseStatementsParser/parseTokens.md) &ndash; The method will stop parsing tokens after it encounters the first "class" token, assuming the class is [bsr0 compatible](https://github.com/lingtalfi/BumbleBee/blob/master/Autoload/convention.bsr0.eng.md).
- [TokenArrayIterator](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/TokenArrayIterator.md) &ndash; The TokenArrayIterator class.
    - [TokenArrayIterator::__construct](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/TokenArrayIterator/__construct.md) &ndash; Builds the TokenArrayIterator instance.
    - [TokenArrayIterator::key](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/TokenArrayIterator/key.md) &ndash; Returns the current key, or false if the cursor is out of bounds.
    - [TokenArrayIterator::current](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/TokenArrayIterator/current.md) &ndash; Returns the current value, or false if the cursor is out of bounds.
    - [TokenArrayIterator::next](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/TokenArrayIterator/next.md) &ndash; Moves the internal pointer forward by one step.
    - [TokenArrayIterator::prev](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/TokenArrayIterator/prev.md) &ndash; Moves the internal pointer backward by one step.
    - [TokenArrayIterator::valid](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/TokenArrayIterator/valid.md) &ndash; Returns whether or not the current position is valid.
    - [TokenArrayIterator::seek](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/TokenArrayIterator/seek.md) &ndash; Seeks to index, and returns whether the method has succeeded in positioning the cursor at the given index.
    - [TokenArrayIterator::getArray](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/TokenArrayIterator/getArray.md) &ndash; Returns the inner array.
    - [TokenArrayIterator::dump](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/TokenArrayIterator/dump.md) &ndash; Displays the token explicit names of the tokens parsed by this iterator.
- [TokenArrayIteratorInterface](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/TokenArrayIteratorInterface.md) &ndash; The TokenArrayIteratorInterface class
    - [TokenArrayIteratorInterface::key](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/TokenArrayIteratorInterface/key.md) &ndash; Returns the current key, or false if the cursor is out of bounds.
    - [TokenArrayIteratorInterface::current](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/TokenArrayIteratorInterface/current.md) &ndash; Returns the current value, or false if the cursor is out of bounds.
    - [TokenArrayIteratorInterface::next](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/TokenArrayIteratorInterface/next.md) &ndash; Moves the internal pointer forward by one step.
    - [TokenArrayIteratorInterface::prev](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/TokenArrayIteratorInterface/prev.md) &ndash; Moves the internal pointer backward by one step.
    - [TokenArrayIteratorInterface::valid](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/TokenArrayIteratorInterface/valid.md) &ndash; Returns whether or not the current position is valid.
    - [TokenArrayIteratorInterface::seek](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/TokenArrayIteratorInterface/seek.md) &ndash; Seeks to index, and returns whether the method has succeeded in positioning the cursor at the given index.
    - [TokenArrayIteratorInterface::getArray](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/TokenArrayIteratorInterface/getArray.md) &ndash; Returns the inner array.
- [TokenArrayIteratorTool](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/Tool/TokenArrayIteratorTool.md) &ndash; The TokenArrayIteratorTool class.
    - [TokenArrayIteratorTool::isWhiteSpace](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/Tool/TokenArrayIteratorTool/isWhiteSpace.md) &ndash; Returns whether the current element of the given iterator is a whitespace.
    - [TokenArrayIteratorTool::moveToCorrespondingEnd](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/Tool/TokenArrayIteratorTool/moveToCorrespondingEnd.md) &ndash; Look at the "opening" token at the current position and tries to move to the corresponding closing token.
    - [TokenArrayIteratorTool::skipClassLike](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/Tool/TokenArrayIteratorTool/skipClassLike.md) &ndash; Moves the iterator pointer forward skipping class definition, and returns whether or not a class definition has been skipped.
    - [TokenArrayIteratorTool::skipSquareBracketsChain](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/Tool/TokenArrayIteratorTool/skipSquareBracketsChain.md) &ndash; Moves the iterator pointer forward skipping bracket wrappings, and returns whether a bracket wrapping has been skipped.
    - [TokenArrayIteratorTool::skipFunction](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/Tool/TokenArrayIteratorTool/skipFunction.md) &ndash; Moves the iterator pointer forward skipping functions, and returns whether a function has been skipped.
    - [TokenArrayIteratorTool::skipNsChain](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/Tool/TokenArrayIteratorTool/skipNsChain.md) &ndash; Moves the iterator pointer forward skipping namespace chain, and returns whether a namespace chain has been skipped.
    - [TokenArrayIteratorTool::skipWhiteSpaces](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/Tool/TokenArrayIteratorTool/skipWhiteSpaces.md) &ndash; Skips whitespaces and positions the cursor AFTER the last whitespace.
    - [TokenArrayIteratorTool::skipTokens](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/Tool/TokenArrayIteratorTool/skipTokens.md) &ndash; Skips the given tokens and positions the cursor AFTER the last found token.
    - [TokenArrayIteratorTool::skipWhiteSpacesOrComma](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/Tool/TokenArrayIteratorTool/skipWhiteSpacesOrComma.md) &ndash; Skips whitespaces and commas, and positions the cursor AFTER the last whitespace or comma.
    - [TokenArrayIteratorTool::skipUntil](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/Tool/TokenArrayIteratorTool/skipUntil.md) &ndash; Iterates the given tokenArrayIterator until it finds the given tokenProp.
- [ArrayReferenceTokenFinder](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/ArrayReferenceTokenFinder.md) &ndash; The ArrayReferenceTokenFinder class.
    - [ArrayReferenceTokenFinder::find](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/ArrayReferenceTokenFinder/find.md) &ndash; Returns an array of match.
    - [RecursiveTokenFinder::__construct](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/RecursiveTokenFinder/__construct.md) &ndash; Builds the RecursiveTokenFinder instance.
    - [RecursiveTokenFinder::isNestedMode](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/RecursiveTokenFinder/isNestedMode.md) &ndash; Returns whether the nested mode is turned on.
    - [RecursiveTokenFinder::setNestedMode](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/RecursiveTokenFinder/setNestedMode.md) &ndash; The setNestedMode method
- [ClassNameTokenFinder](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/ClassNameTokenFinder.md) &ndash; The ClassTokenFinder class.
    - [ClassNameTokenFinder::__construct](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/ClassNameTokenFinder/__construct.md) &ndash; Builds the ClassNameTokenFinder instance.
    - [ClassNameTokenFinder::setIncludeInterface](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/ClassNameTokenFinder/setIncludeInterface.md) &ndash; Sets the includeInterface.
    - [ClassNameTokenFinder::find](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/ClassNameTokenFinder/find.md) &ndash; Returns an array of match.
    - [RecursiveTokenFinder::isNestedMode](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/RecursiveTokenFinder/isNestedMode.md) &ndash; Returns whether the nested mode is turned on.
    - [RecursiveTokenFinder::setNestedMode](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/RecursiveTokenFinder/setNestedMode.md) &ndash; The setNestedMode method
- [ClassPropertyTokenFinder](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/ClassPropertyTokenFinder.md) &ndash; The ClassPropertyTokenFinder class.
    - [ClassPropertyTokenFinder::find](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/ClassPropertyTokenFinder/find.md) &ndash; Returns an array of match.
    - [RecursiveTokenFinder::__construct](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/RecursiveTokenFinder/__construct.md) &ndash; Builds the RecursiveTokenFinder instance.
    - [RecursiveTokenFinder::isNestedMode](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/RecursiveTokenFinder/isNestedMode.md) &ndash; Returns whether the nested mode is turned on.
    - [RecursiveTokenFinder::setNestedMode](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/RecursiveTokenFinder/setNestedMode.md) &ndash; The setNestedMode method
- [ClassSignatureTokenFinder](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/ClassSignatureTokenFinder.md) &ndash; The ClassSignatureTokenFinder class.
    - [ClassSignatureTokenFinder::find](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/ClassSignatureTokenFinder/find.md) &ndash; Returns an array of match.
    - [RecursiveTokenFinder::__construct](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/RecursiveTokenFinder/__construct.md) &ndash; Builds the RecursiveTokenFinder instance.
    - [RecursiveTokenFinder::isNestedMode](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/RecursiveTokenFinder/isNestedMode.md) &ndash; Returns whether the nested mode is turned on.
    - [RecursiveTokenFinder::setNestedMode](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/RecursiveTokenFinder/setNestedMode.md) &ndash; The setNestedMode method
- [FunctionTokenFinder](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/FunctionTokenFinder.md) &ndash; The FunctionTokenFinder class.
    - [FunctionTokenFinder::find](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/FunctionTokenFinder/find.md) &ndash; Returns an array of match.
    - [RecursiveTokenFinder::__construct](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/RecursiveTokenFinder/__construct.md) &ndash; Builds the RecursiveTokenFinder instance.
    - [RecursiveTokenFinder::isNestedMode](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/RecursiveTokenFinder/isNestedMode.md) &ndash; Returns whether the nested mode is turned on.
    - [RecursiveTokenFinder::setNestedMode](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/RecursiveTokenFinder/setNestedMode.md) &ndash; The setNestedMode method
- [InterfaceTokenFinder](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/InterfaceTokenFinder.md) &ndash; The InterfaceTokenFinder class.
    - [InterfaceTokenFinder::find](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/InterfaceTokenFinder/find.md) &ndash; Returns an array of match.
    - [RecursiveTokenFinder::__construct](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/RecursiveTokenFinder/__construct.md) &ndash; Builds the RecursiveTokenFinder instance.
    - [RecursiveTokenFinder::isNestedMode](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/RecursiveTokenFinder/isNestedMode.md) &ndash; Returns whether the nested mode is turned on.
    - [RecursiveTokenFinder::setNestedMode](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/RecursiveTokenFinder/setNestedMode.md) &ndash; The setNestedMode method
- [MethodTokenFinder](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/MethodTokenFinder.md) &ndash; The MethodTokenFinder class.
    - [MethodTokenFinder::find](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/MethodTokenFinder/find.md) &ndash; Returns an array of match.
    - [RecursiveTokenFinder::__construct](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/RecursiveTokenFinder/__construct.md) &ndash; Builds the RecursiveTokenFinder instance.
    - [RecursiveTokenFinder::isNestedMode](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/RecursiveTokenFinder/isNestedMode.md) &ndash; Returns whether the nested mode is turned on.
    - [RecursiveTokenFinder::setNestedMode](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/RecursiveTokenFinder/setNestedMode.md) &ndash; The setNestedMode method
- [NamespaceTokenFinder](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/NamespaceTokenFinder.md) &ndash; The NamespaceTokenFinder class.
    - [NamespaceTokenFinder::find](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/NamespaceTokenFinder/find.md) &ndash; Returns an array of match.
    - [RecursiveTokenFinder::__construct](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/RecursiveTokenFinder/__construct.md) &ndash; Builds the RecursiveTokenFinder instance.
    - [RecursiveTokenFinder::isNestedMode](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/RecursiveTokenFinder/isNestedMode.md) &ndash; Returns whether the nested mode is turned on.
    - [RecursiveTokenFinder::setNestedMode](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/RecursiveTokenFinder/setNestedMode.md) &ndash; The setNestedMode method
- [NewObjectTokenFinder](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/NewObjectTokenFinder.md) &ndash; The NewObjectTokenFinder class.
    - [NewObjectTokenFinder::find](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/NewObjectTokenFinder/find.md) &ndash; Returns an array of match.
    - [RecursiveTokenFinder::__construct](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/RecursiveTokenFinder/__construct.md) &ndash; Builds the RecursiveTokenFinder instance.
    - [RecursiveTokenFinder::isNestedMode](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/RecursiveTokenFinder/isNestedMode.md) &ndash; Returns whether the nested mode is turned on.
    - [RecursiveTokenFinder::setNestedMode](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/RecursiveTokenFinder/setNestedMode.md) &ndash; The setNestedMode method
- [ParentClassNameTokenFinder](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/ParentClassNameTokenFinder.md) &ndash; The ParentClassNameTokenFinder class.
    - [ParentClassNameTokenFinder::find](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/ParentClassNameTokenFinder/find.md) &ndash; Returns an array of match.
    - [RecursiveTokenFinder::__construct](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/RecursiveTokenFinder/__construct.md) &ndash; Builds the RecursiveTokenFinder instance.
    - [RecursiveTokenFinder::isNestedMode](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/RecursiveTokenFinder/isNestedMode.md) &ndash; Returns whether the nested mode is turned on.
    - [RecursiveTokenFinder::setNestedMode](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/RecursiveTokenFinder/setNestedMode.md) &ndash; The setNestedMode method
- [RecursiveTokenFinder](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/RecursiveTokenFinder.md) &ndash; The RecursiveTokenFinder class.
    - [RecursiveTokenFinder::__construct](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/RecursiveTokenFinder/__construct.md) &ndash; Builds the RecursiveTokenFinder instance.
    - [RecursiveTokenFinder::isNestedMode](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/RecursiveTokenFinder/isNestedMode.md) &ndash; Returns whether the nested mode is turned on.
    - [RecursiveTokenFinder::setNestedMode](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/RecursiveTokenFinder/setNestedMode.md) &ndash; The setNestedMode method
    - [TokenFinderInterface::find](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/TokenFinderInterface/find.md) &ndash; Returns an array of match.
- [TokenFinderInterface](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/TokenFinderInterface.md) &ndash; The TokenFinderInterface interface.
    - [TokenFinderInterface::find](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/TokenFinderInterface/find.md) &ndash; Returns an array of match.
- [TokenFinderTool](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/Tool/TokenFinderTool.md) &ndash; The TokenFinderTool class.
    - [TokenFinderTool::matchesToString](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/Tool/TokenFinderTool/matchesToString.md) &ndash; Replace the matches with their actual content.
    - [TokenFinderTool::getClassNames](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/Tool/TokenFinderTool/getClassNames.md) &ndash; Returns the class names found in the given tokens, prefixed with namespace if $withNamespaces=true.
    - [TokenFinderTool::getClassPropertyBasicInfo](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/Tool/TokenFinderTool/getClassPropertyBasicInfo.md) &ndash; Returns an array of basic information for every class properties of the given class.
    - [TokenFinderTool::getParentClassName](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/Tool/TokenFinderTool/getParentClassName.md) &ndash; Returns the parent class name, or false if no parent was found.
    - [TokenFinderTool::getClassSignatureInfo](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/Tool/TokenFinderTool/getClassSignatureInfo.md) &ndash; Returns an array containing info about the first class signature found in the tokens, or false if no class signature was found.
    - [TokenFinderTool::getInterfaces](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/Tool/TokenFinderTool/getInterfaces.md) &ndash; Returns the interfaces found in the given tokens.
    - [TokenFinderTool::getMethodsInfo](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/Tool/TokenFinderTool/getMethodsInfo.md) &ndash; Returns some info about the methods found in the given tokens.
    - [TokenFinderTool::getNamespace](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/Tool/TokenFinderTool/getNamespace.md) &ndash; Returns the first namespace found in the given tokens, or false otherwise.
    - [TokenFinderTool::getUseDependencies](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/Tool/TokenFinderTool/getUseDependencies.md) &ndash; Returns an array of use statements' class names found in the given tokens.
    - [TokenFinderTool::getUseDependenciesByFolder](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/Tool/TokenFinderTool/getUseDependenciesByFolder.md) &ndash; Returns an array of use statements' class names inside the given directory.
    - [TokenFinderTool::getUseDependenciesByReflectionClasses](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/Tool/TokenFinderTool/getUseDependenciesByReflectionClasses.md) &ndash; Returns an array of all the use statements used by the given reflection classes.
    - [TokenFinderTool::removePhpComments](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/Tool/TokenFinderTool/removePhpComments.md) &ndash; Removes the php comments from the given valid php string, and returns the result.
- [UseStatementsTokenFinder](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/UseStatementsTokenFinder.md) &ndash; The UseStatementsTokenFinder class.
    - [UseStatementsTokenFinder::find](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/UseStatementsTokenFinder/find.md) &ndash; Returns an array of match.
    - [RecursiveTokenFinder::__construct](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/RecursiveTokenFinder/__construct.md) &ndash; Builds the RecursiveTokenFinder instance.
    - [RecursiveTokenFinder::isNestedMode](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/RecursiveTokenFinder/isNestedMode.md) &ndash; Returns whether the nested mode is turned on.
    - [RecursiveTokenFinder::setNestedMode](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/RecursiveTokenFinder/setNestedMode.md) &ndash; The setNestedMode method
- [VariableAssignmentTokenFinder](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/VariableAssignmentTokenFinder.md) &ndash; The VariableAssignmentTokenFinder class.
    - [VariableAssignmentTokenFinder::__construct](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/VariableAssignmentTokenFinder/__construct.md) &ndash; Builds the VariableAssignmentTokenFinder instance.
    - [VariableAssignmentTokenFinder::find](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/VariableAssignmentTokenFinder/find.md) &ndash; Returns an array of match.
    - [VariableAssignmentTokenFinder::isSkipClass](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/VariableAssignmentTokenFinder/isSkipClass.md) &ndash; Returns the skipClass of this instance.
    - [VariableAssignmentTokenFinder::setSkipClass](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/VariableAssignmentTokenFinder/setSkipClass.md) &ndash; Sets the skipClass.
    - [VariableAssignmentTokenFinder::isSkipFunction](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/VariableAssignmentTokenFinder/isSkipFunction.md) &ndash; Returns the skipFunction of this instance.
    - [VariableAssignmentTokenFinder::setSkipFunction](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/VariableAssignmentTokenFinder/setSkipFunction.md) &ndash; Sets the skipFunction.
    - [VariableAssignmentTokenFinder::isSkipForLoopCondition](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/VariableAssignmentTokenFinder/isSkipForLoopCondition.md) &ndash; Returns the skipForLoopCondition of this instance.
    - [VariableAssignmentTokenFinder::setSkipForLoopCondition](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/VariableAssignmentTokenFinder/setSkipForLoopCondition.md) &ndash; Sets the skipForLoopCondition.
    - [VariableAssignmentTokenFinder::isSkipControlStructure](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/VariableAssignmentTokenFinder/isSkipControlStructure.md) &ndash; Returns the skipControlStructure of this instance.
    - [VariableAssignmentTokenFinder::setSkipControlStructure](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/VariableAssignmentTokenFinder/setSkipControlStructure.md) &ndash; Sets the skipControlStructure.
    - [VariableAssignmentTokenFinder::isAllowArrayAffectation](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/VariableAssignmentTokenFinder/isAllowArrayAffectation.md) &ndash; Returns the allowArrayAffectation of this instance.
    - [VariableAssignmentTokenFinder::setAllowArrayAffectation](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/VariableAssignmentTokenFinder/setAllowArrayAffectation.md) &ndash; Sets the allowArrayAffectation.
    - [VariableAssignmentTokenFinder::isAllowDynamic](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/VariableAssignmentTokenFinder/isAllowDynamic.md) &ndash; Returns the allowDynamic of this instance.
    - [VariableAssignmentTokenFinder::setAllowDynamic](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/VariableAssignmentTokenFinder/setAllowDynamic.md) &ndash; Sets the allowDynamic.
    - [RecursiveTokenFinder::isNestedMode](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/RecursiveTokenFinder/isNestedMode.md) &ndash; Returns whether the nested mode is turned on.
    - [RecursiveTokenFinder::setNestedMode](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/RecursiveTokenFinder/setNestedMode.md) &ndash; The setNestedMode method
- [TokenTool](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/Tool/TokenTool.md) &ndash; The TokenTool class.
    - [TokenTool::explicitTokenNames](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/Tool/TokenTool/explicitTokenNames.md) &ndash; Returns an array containing whole the given tokens, but with token ids replaced with explicit names.
    - [TokenTool::explodeTokens](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/Tool/TokenTool/explodeTokens.md) &ndash; Explodes the tokens using the given symbol as the separator.
    - [TokenTool::fetch](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/Tool/TokenTool/fetch.md) &ndash; Returns the first token matching the given [tokenProp definition](https://github.com/lingtalfi/TokenFun/blob/master/doc/pages/conception-notes.md#tokenprop), or false if none of them matches.
    - [TokenTool::fetchAll](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/Tool/TokenTool/fetchAll.md) &ndash; Returns an array of all given tokens matching the given tokenProp definition.
    - [TokenTool::getStartEndLineByTokens](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/Tool/TokenTool/getStartEndLineByTokens.md) &ndash; Returns an array: [startLine, endLine] containing the line numbers at which the given tokens start and end.
    - [TokenTool::ltrim](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/Tool/TokenTool/ltrim.md) &ndash; Strip whitespace (or other characters) from the beginning of a string, and returns the array representing the trimmed tokens.
    - [TokenTool::match](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/Tool/TokenTool/match.md) &ndash; Returns whether the given token matches the given tokenProp.
    - [TokenTool::matchAny](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/Tool/TokenTool/matchAny.md) &ndash; Returns whether any of the given tokens matches the given tokenProp.
    - [TokenTool::rtrim](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/Tool/TokenTool/rtrim.md) &ndash; Strip whitespace (or other characters) from the end of a string, and returns an array representing the trimmed tokens.
    - [TokenTool::slice](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/Tool/TokenTool/slice.md) &ndash; Returns the array slice of the given tokens, which starts and ends at the given indices.
    - [TokenTool::tokensToString](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/Tool/TokenTool/tokensToString.md) &ndash; Returns the string version of the given tokens.
    - [TokenTool::trim](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/Tool/TokenTool/trim.md) &ndash; Strip whitespace (or other characters) from the beginning and end of a string, and returns an array representing the trimmed tokens.


Dependencies
============
- [Bat](https://github.com/lingtalfi/Bat)
- [DirScanner](https://github.com/lingtalfi/DirScanner)


