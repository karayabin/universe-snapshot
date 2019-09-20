Ling/Light_Csrf
================
2019-09-20 --> 2019-09-20




Table of contents
===========

- [LightCsrfService](https://github.com/lingtalfi/Light_Csrf/blob/master/doc/api/Ling/Light_Csrf/Service/LightCsrfService.md) &ndash; The LightCsrfService class.
    - CSRFProtector::inst &ndash; Gets the singleton instance for this class.
    - CSRFProtector::setUsePage &ndash; Sets the usePage.
    - CSRFProtector::createToken &ndash; Creates the token named $tokenName, stores its value in the "new" slot, and returns the token value.
    - CSRFProtector::hasToken &ndash; Returns whether the token identified by the given tokenName is already stored in the session.
    - CSRFProtector::isValid &ndash; Returns whether the given $tokenName exists and has the given $tokenValue.
    - CSRFProtector::deleteToken &ndash; Deletes the given $tokenName.
    - CSRFProtector::deletePageUnusedTokens &ndash; Deletes the tokens that are not associated with the current page.


Dependencies
============
- [CSRFTools](https://github.com/lingtalfi/CSRFTools)


