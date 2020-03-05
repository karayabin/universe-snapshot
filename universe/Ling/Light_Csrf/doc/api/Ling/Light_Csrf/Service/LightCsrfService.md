[Back to the Ling/Light_Csrf api](https://github.com/lingtalfi/Light_Csrf/blob/master/doc/api/Ling/Light_Csrf.md)



The LightCsrfService class
================
2019-09-20 --> 2019-12-09






Introduction
============

The LightCsrfService class.



Class synopsis
==============


class <span class="pl-k">LightCsrfService</span> extends [CSRFProtector](https://github.com/lingtalfi/CSRFTools/blob/master/doc/api/Ling/CSRFTools/CSRFProtector.md)  {

- Inherited properties
    - protected string [CSRFProtector::$sessionName](#property-sessionName) ;
    - protected bool [CSRFProtector::$usePage](#property-usePage) ;

- Inherited methods
    - public static CSRFProtector::inst() : [CSRFProtector](https://github.com/lingtalfi/CSRFTools/blob/master/doc/api/Ling/CSRFTools/CSRFProtector.md)
    - public CSRFProtector::__construct() : void
    - public CSRFProtector::setUsePage(bool $usePage) : void
    - public CSRFProtector::createToken(string $tokenName) : string
    - public CSRFProtector::hasToken(string $tokenName) : bool
    - public CSRFProtector::isValid(string $tokenName, string $tokenValue, ?bool $useNewSlot = false) : bool
    - public CSRFProtector::deleteToken(string $tokenName) : void
    - public CSRFProtector::deletePageUnusedTokens() : void
    - public CSRFProtector::dump() : string
    - public CSRFProtector::cleanSession() : void
    - protected CSRFProtector::startSession() : void
    - protected CSRFProtector::addTokenForPage(string $tokenName) : void
    - protected CSRFProtector::getPageId() : string

}






Methods
==============

- CSRFProtector::inst &ndash; Gets the singleton instance for this class.
- CSRFProtector::__construct &ndash; Builds the CSRFProtector instance.
- CSRFProtector::setUsePage &ndash; Sets the usePage.
- CSRFProtector::createToken &ndash; Creates the token named $tokenName, stores its value in the "new" slot, and returns the token value.
- CSRFProtector::hasToken &ndash; Returns whether the token identified by the given tokenName is already stored in the session.
- CSRFProtector::isValid &ndash; Returns whether the given $tokenName exists and has the given $tokenValue.
- CSRFProtector::deleteToken &ndash; Deletes the given $tokenName.
- CSRFProtector::deletePageUnusedTokens &ndash; Deletes the tokens that are not associated with the current page.
- CSRFProtector::dump &ndash; Returns a debug string of the php session content.
- CSRFProtector::cleanSession &ndash; Cleans the session.
- CSRFProtector::startSession &ndash; Ensures that the php session has started.
- CSRFProtector::addTokenForPage &ndash; Adds a token to the pages array.
- CSRFProtector::getPageId &ndash; Returns the current page id.





Location
=============
Ling\Light_Csrf\Service\LightCsrfService<br>
See the source code of [Ling\Light_Csrf\Service\LightCsrfService](https://github.com/lingtalfi/Light_Csrf/blob/master/Service/LightCsrfService.php)



