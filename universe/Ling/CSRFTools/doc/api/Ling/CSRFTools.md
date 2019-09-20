Ling/CSRFTools
================
2019-04-11 --> 2019-09-20




Table of contents
===========

- [CSRFProtector](https://github.com/lingtalfi/CSRFTools/blob/master/doc/api/Ling/CSRFTools/CSRFProtector.md) &ndash; The CSRFProtector class.
    - [CSRFProtector::inst](https://github.com/lingtalfi/CSRFTools/blob/master/doc/api/Ling/CSRFTools/CSRFProtector/inst.md) &ndash; Gets the singleton instance for this class.
    - [CSRFProtector::__construct](https://github.com/lingtalfi/CSRFTools/blob/master/doc/api/Ling/CSRFTools/CSRFProtector/__construct.md) &ndash; Builds the CSRFProtector instance.
    - [CSRFProtector::setUsePage](https://github.com/lingtalfi/CSRFTools/blob/master/doc/api/Ling/CSRFTools/CSRFProtector/setUsePage.md) &ndash; Sets the usePage.
    - [CSRFProtector::createToken](https://github.com/lingtalfi/CSRFTools/blob/master/doc/api/Ling/CSRFTools/CSRFProtector/createToken.md) &ndash; Creates the token named $tokenName, stores its value in the "new" slot, and returns the token value.
    - [CSRFProtector::hasToken](https://github.com/lingtalfi/CSRFTools/blob/master/doc/api/Ling/CSRFTools/CSRFProtector/hasToken.md) &ndash; Returns whether the token identified by the given tokenName is already stored in the session.
    - [CSRFProtector::isValid](https://github.com/lingtalfi/CSRFTools/blob/master/doc/api/Ling/CSRFTools/CSRFProtector/isValid.md) &ndash; Returns whether the given $tokenName exists and has the given $tokenValue.
    - [CSRFProtector::deleteToken](https://github.com/lingtalfi/CSRFTools/blob/master/doc/api/Ling/CSRFTools/CSRFProtector/deleteToken.md) &ndash; Deletes the given $tokenName.
    - [CSRFProtector::deletePageUnusedTokens](https://github.com/lingtalfi/CSRFTools/blob/master/doc/api/Ling/CSRFTools/CSRFProtector/deletePageUnusedTokens.md) &ndash; Deletes the tokens that are not associated with the current page.
    - [CSRFProtector::dump](https://github.com/lingtalfi/CSRFTools/blob/master/doc/api/Ling/CSRFTools/CSRFProtector/dump.md) &ndash; Returns a debug string of the php session content.
    - [CSRFProtector::cleanSession](https://github.com/lingtalfi/CSRFTools/blob/master/doc/api/Ling/CSRFTools/CSRFProtector/cleanSession.md) &ndash; Cleans the session.


Dependencies
============
- [ArrayToString](https://github.com/lingtalfi/ArrayToString)


