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


This tool was originally created to get the user browser's preferred lang in iso-639-3 format.

Here is how one would do that.




```php
<?php

$langIso = AcceptLanguageHelper::acceptLanguageToPreferredIso639_3($lang);

```


History Log
------------------
    
- 1.0.0 -- 2017-04-04

    - initial commit