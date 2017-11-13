Http4All
===========
2017-05-25



Some tools related to http.


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Http4All
```

Or just download it and place it where you want otherwise.



How to
==========


You can use this tool to get the preferred lang and/or country of the user


```php
<?php
/**
 *
 * An array containing things like this:
 *
 * - Host: my-test-domain.com
 * - User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10.12; rv:56.0) Gecko/20100101 Firefox/56.0
 * - Accept: text/html,application/xhtml+xml,application/xml;q=0.9;q=0.8
 * - Accept-Language: en-US,en;q=0.5
 * - Accept-Encoding: gzip, deflate
 * - Cookie: PHPSESSID=2ca549bcc41994fe20c7886152427882
 * - Connection: keep-alive
 * - Upgrade-Insecure-Requests: 1
 * - Cache-Control: max-age=0
 */
a(Http4AllHeader::getHttpHeaders());
a(Http4AllHeader::getUserPreferredLang(null)); // en (untouched browser result)
a(Http4AllHeader::getUserPreferredLang()); // eng (iso 639-3)
a(Http4AllHeader::getUserPreferredCountry()); // US,





```


History Log
------------------
    
- 1.1.1 -- 2017-11-10

    - fix Http4AllHeader::getUserPreferredCountry check on HTTP_ACCEPT_LANGUAGE
    
- 1.1.0 -- 2017-10-28

    - add Http4AllHeader
    - fix AcceptLanguageHelper::parseAcceptLanguage now return correct priorities (q=0.5)
    
- 1.0.0 -- 2017-04-04

    - initial commit