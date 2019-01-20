{Name}
===============
{date}



Widget for displaying a {Name}.




This is a widget for the [kamille framework](https://github.com/lingtalfi/Kamille).


Install
===========
using the [kamille installer tool](https://github.com/lingtalfi/kamille-installer-tool)
```bash
kamille winstall {Name}
```



Model
===========

The model used by this widget contains the following variables:

- code: the http code (like 404, 403, etc...)
- text: a text explaining the code


OR


The model used by this widget is the notification model
from the [Models planet](https://github.com/lingtalfi/Models).





Demo snippet
=========

```php
<?php


$conf = [
    "layout" => [
        "name" => "splash/default",
    ],
    "widgets" => [
        "main.{name}" => [
            "name" => "{Name}/default",
            "conf" => [
                "code" => 404,
                "text" => "Page not found",
            ],
        ],
    ],
];
```






History Log
------------------

- 1.0.0 -- {date}

    - initial commit