PhpFile
===========
2018-02-14 -> 2021-03-05



An helper object to create a php file from scratch.


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.PhpFile
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/PhpFile
```

Or just download it and place it where you want otherwise.




How to
==========

Example in a [kamille](https://github.com/lingtalfi/kamille) app.

```php
<?php

use Core\Services\A;
use Ling\PhpFile\PhpFile;
use Ling\QuickPdo\QuickPdo;

// using kamille framework here (https://github.com/lingtalfi/kamille)
require_once __DIR__ . "/../boot.php";
require_once __DIR__ . "/../init.php";


A::testInit();


header('content-type: text/plain');



echo PhpFile::create()
    ->addUseStatement(<<<EEE
use Kamille\Utils\Morphic\Helper\MorphicHelper;
use Module\Ekom\Back\User\EkomNullosUser;
use Ling\SokoForm\Form\SokoFormInterface;
use Ling\SokoForm\Form\SokoForm;
use Ling\SokoForm\Control\SokoAutocompleteInputControl;
use Ling\SokoForm\Control\SokoInputControl;
use Ling\SokoForm\Control\SokoChoiceControl;
use Module\Ekom\Utils\E;
EEE
    )
    ->addHeadStatement(<<<EEE
\$id = 3;    
EEE
    )
    ->addBodyStatement(<<<EEE
myFunction(\$id);    
EEE
    )->render();
;



/**
 * Output in the browser:

<?php

use Kamille\Utils\Morphic\Helper\MorphicHelper;
use Module\Ekom\Back\User\EkomNullosUser;
use Ling\SokoForm\Form\SokoFormInterface;
use Ling\SokoForm\Form\SokoForm;
use Ling\SokoForm\Control\SokoAutocompleteInputControl;
use Ling\SokoForm\Control\SokoInputControl;
use Ling\SokoForm\Control\SokoChoiceControl;
use Module\Ekom\Utils\E;


$id = 3;


myFunction($id);


*/



 
```





History Log
------------------    

- 1.1.4 -- 2021-05-31

    - Removing trailing plus in lpi-deps file (to work with Light_PlanetInstaller:2.0.0 api

- 1.1.3 -- 2021-03-05

    - update README.md, add install alternative

- 1.1.2 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.1.1 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.1.0 -- 2018-02-15

    - add PhpFile->render method's $destination optional argument
    
- 1.0.0 -- 2018-02-14

    - initial commit