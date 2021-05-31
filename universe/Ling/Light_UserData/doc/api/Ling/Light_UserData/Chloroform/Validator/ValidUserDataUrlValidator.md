[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)



The ValidUserDataUrlValidator class
================
2019-09-27 --> 2021-05-31






Introduction
============

The ValidUserDataUrlValidator class.

Checks that the url belongs to the current user.


If the url is empty or not a string, it's ignored.



Class synopsis
==============


class <span class="pl-k">ValidUserDataUrlValidator</span> extends [AbstractValidator](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractValidator.md) implements [ValidatorInterface](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/ValidatorInterface.md) {

- Properties
    - protected [Ling\Light_User\LightUserInterface](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightUserInterface.md) [$currentUser](#property-currentUser) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;

- Inherited properties
    - protected string [AbstractValidator::$messagesDir](#property-messagesDir) ;
    - protected array [AbstractValidator::$customMessages](#property-customMessages) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Chloroform/Validator/ValidUserDataUrlValidator/__construct.md)() : void
    - public [test](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Chloroform/Validator/ValidUserDataUrlValidator/test.md)($value, string $fieldName, Ling\Chloroform\Field\FieldInterface $field, ?string &$error = null) : bool
    - public [setCurrentUser](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Chloroform/Validator/ValidUserDataUrlValidator/setCurrentUser.md)([Ling\Light_User\LightUserInterface](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightUserInterface.md) $currentUser) : [ValidUserDataUrlValidator](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Chloroform/Validator/ValidUserDataUrlValidator.md)
    - public [setContainer](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Chloroform/Validator/ValidUserDataUrlValidator/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : [ValidUserDataUrlValidator](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Chloroform/Validator/ValidUserDataUrlValidator.md)
    - private [getCurrentUser](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Chloroform/Validator/ValidUserDataUrlValidator/getCurrentUser.md)() : [LightUserInterface](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightUserInterface.md)

- Inherited methods
    - public static AbstractValidator::create() : [AbstractValidator](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractValidator.md)
    - public AbstractValidator::toArray() : array
    - public AbstractValidator::setErrorMessage(string $errorMessage, ?string $messageIdentifier = null) : [AbstractValidator](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractValidator.md)
    - protected AbstractValidator::getErrorMessage(string $msgId, array $variables) : string
    - protected AbstractValidator::getMessages(?bool $identifierAsKey = false) : array
    - protected AbstractValidator::getDefaultMessagesDir(string $baseDir) : string

}




Properties
=============

- <span id="property-currentUser"><b>currentUser</b></span>

    This property holds the currentUser for this instance.
    
    

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    

- <span id="property-messagesDir"><b>messagesDir</b></span>

    This property holds the messagesDir for this instance.
    
    

- <span id="property-customMessages"><b>customMessages</b></span>

    This property holds the customMessages for this instance.
    It's an array of message identifier => (symbolic) error message (i.e. symbolic means with tags).
    
    



Methods
==============

- [ValidUserDataUrlValidator::__construct](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Chloroform/Validator/ValidUserDataUrlValidator/__construct.md) &ndash; Builds the AbstractValidator instance.
- [ValidUserDataUrlValidator::test](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Chloroform/Validator/ValidUserDataUrlValidator/test.md) &ndash; of the validator.
- [ValidUserDataUrlValidator::setCurrentUser](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Chloroform/Validator/ValidUserDataUrlValidator/setCurrentUser.md) &ndash; Sets the currentUser.
- [ValidUserDataUrlValidator::setContainer](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Chloroform/Validator/ValidUserDataUrlValidator/setContainer.md) &ndash; Sets the container.
- [ValidUserDataUrlValidator::getCurrentUser](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Chloroform/Validator/ValidUserDataUrlValidator/getCurrentUser.md) &ndash; Returns the current user.
- AbstractValidator::create &ndash; Builds and returns the instance for this class.
- AbstractValidator::toArray &ndash; Returns the array version of a validator.
- AbstractValidator::setErrorMessage &ndash; Overrides a default error message, and returns this instance (for chaining).
- AbstractValidator::getErrorMessage &ndash; Returns the error message for the called object (this).
- AbstractValidator::getMessages &ndash; Returns an array of the lines of the error messages file for this validator.
- AbstractValidator::getDefaultMessagesDir &ndash; Returns a default/standard location for the messages directory.





Location
=============
Ling\Light_UserData\Chloroform\Validator\ValidUserDataUrlValidator<br>
See the source code of [Ling\Light_UserData\Chloroform\Validator\ValidUserDataUrlValidator](https://github.com/lingtalfi/Light_UserData/blob/master/Chloroform/Validator/ValidUserDataUrlValidator.php)



SeeAlso
==============
Previous class: [LightUserData2SvpDataTransformer](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Chloroform/DataTransformer/LightUserData2SvpDataTransformer.md)<br>Next class: [LightUserDataController](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Controller/LightUserDataController.md)<br>
