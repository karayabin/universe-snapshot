PhpFile
===========
2018-02-14



An helper object to create a php file from scratch.


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
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
    
- 1.1.0 -- 2018-02-15

    - add PhpFile->render method's $destination optional argument
    
- 1.0.0 -- 2018-02-14

    - initial commit