NumericKeyArray
===========
2018-03-27 -> 2021-03-05



An api to update a numericKeyArray.


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.NumericKeyArray
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/NumericKeyArray
```

Or just download it and place it where you want otherwise.



How to?
==========================

```php
<?php


use Core\Services\A;
use Ling\NumericKeyArray\NumericKeyArray;

// using kamille framework here (https://github.com/lingtalfi/kamille)
require_once __DIR__ . "/../boot.php";
require_once __DIR__ . "/../init.php";


A::testInit();


$array = [
    [
        "id1",
        "Téléphone",
        "02 45 65 12 37",
    ],
    [
        "id2",
        "Nom",
        "Moranger",
    ],
    [
        "id3",
        "Prénom",
        "Harry",
    ],
    [
        "id4",
        "Âge",
        "59",
    ],
];


$util = NumericKeyArray::create()->setArray($array);

a($util->getArray());
?>
    <pre>
array(4) {
  [0] => array(3) {
    [0] => string(3) "id1"
    [1] => string(11) "Téléphone"
    [2] => string(14) "02 45 65 12 37"
  }
  [1] => array(3) {
    [0] => string(3) "id2"
    [1] => string(3) "Nom"
    [2] => string(8) "Moranger"
  }
  [2] => array(3) {
    [0] => string(3) "id3"
    [1] => string(7) "Prénom"
    [2] => string(5) "Harry"
  }
  [3] => array(3) {
    [0] => string(3) "id4"
    [1] => string(4) "Âge"
    [2] => string(2) "59"
  }
}
</pre>

<?php

$util->remove('id2');
a($util->getArray());
?>
    <pre>
array(3) {
  [0] => array(3) {
    [0] => string(3) "id1"
    [1] => string(11) "Téléphone"
    [2] => string(14) "02 45 65 12 37"
  }
  [2] => array(3) {
    [0] => string(3) "id3"
    [1] => string(7) "Prénom"
    [2] => string(5) "Harry"
  }
  [3] => array(3) {
    [0] => string(3) "id4"
    [1] => string(4) "Âge"
    [2] => string(2) "59"
  }
}
</pre>

<?php


$util->prepend([
    "id0",
    "Type de compte",
    "professionnel",
]);
a($util->getArray());

?>
    <pre>
array(4) {
  [0] => array(3) {
    [0] => string(3) "id0"
    [1] => string(14) "Type de compte"
    [2] => string(13) "professionnel"
  }
  [1] => array(3) {
    [0] => string(3) "id1"
    [1] => string(11) "Téléphone"
    [2] => string(14) "02 45 65 12 37"
  }
  [2] => array(3) {
    [0] => string(3) "id3"
    [1] => string(7) "Prénom"
    [2] => string(5) "Harry"
  }
  [3] => array(3) {
    [0] => string(3) "id4"
    [1] => string(4) "Âge"
    [2] => string(2) "59"
  }
}
</pre>
<?php


$util->append([
    "id5",
    "Groupe",
    "b2b",
]);
a($util->getArray());


?>
    <pre>
array(5) {
  [0] => array(3) {
    [0] => string(3) "id0"
    [1] => string(14) "Type de compte"
    [2] => string(13) "professionnel"
  }
  [1] => array(3) {
    [0] => string(3) "id1"
    [1] => string(11) "Téléphone"
    [2] => string(14) "02 45 65 12 37"
  }
  [2] => array(3) {
    [0] => string(3) "id3"
    [1] => string(7) "Prénom"
    [2] => string(5) "Harry"
  }
  [3] => array(3) {
    [0] => string(3) "id4"
    [1] => string(4) "Âge"
    [2] => string(2) "59"
  }
  [4] => array(3) {
    [0] => string(3) "id5"
    [1] => string(6) "Groupe"
    [2] => string(3) "b2b"
  }
}
</pre>
<?php


$util->insertAfter([
    "id2",
    "Nom",
    "Albertini",
], 'id1');
a($util->getArray());


?>
    <pre>
array(6) {
  [0] => array(3) {
    [0] => string(3) "id0"
    [1] => string(14) "Type de compte"
    [2] => string(13) "professionnel"
  }
  [1] => array(3) {
    [0] => string(3) "id1"
    [1] => string(11) "Téléphone"
    [2] => string(14) "02 45 65 12 37"
  }
  [2] => array(3) {
    [0] => string(3) "id2"
    [1] => string(3) "Nom"
    [2] => string(9) "Albertini"
  }
  [3] => array(3) {
    [0] => string(3) "id3"
    [1] => string(7) "Prénom"
    [2] => string(5) "Harry"
  }
  [4] => array(3) {
    [0] => string(3) "id4"
    [1] => string(4) "Âge"
    [2] => string(2) "59"
  }
  [5] => array(3) {
    [0] => string(3) "id5"
    [1] => string(6) "Groupe"
    [2] => string(3) "b2b"
  }
}
</pre>
<?php



$util->insertBefore([
    "id3Bis",
    "Application",
    "Ventilateur",
], 'id4');
a($util->getArray());


?>
<pre>
array(7) {
  [0] => array(3) {
    [0] => string(3) "id0"
    [1] => string(14) "Type de compte"
    [2] => string(13) "professionnel"
  }
  [1] => array(3) {
    [0] => string(3) "id1"
    [1] => string(11) "Téléphone"
    [2] => string(14) "02 45 65 12 37"
  }
  [2] => array(3) {
    [0] => string(3) "id2"
    [1] => string(3) "Nom"
    [2] => string(9) "Albertini"
  }
  [3] => array(3) {
    [0] => string(3) "id3"
    [1] => string(7) "Prénom"
    [2] => string(5) "Harry"
  }
  [4] => array(3) {
    [0] => string(6) "id3Bis"
    [1] => string(11) "Application"
    [2] => string(11) "Ventilateur"
  }
  [5] => array(3) {
    [0] => string(3) "id4"
    [1] => string(4) "Âge"
    [2] => string(2) "59"
  }
  [6] => array(3) {
    [0] => string(3) "id5"
    [1] => string(6) "Groupe"
    [2] => string(3) "b2b"
  }
}
</pre>



<?php


az($util->getItem('id4'));

?>

<pre>
array(3) {
  [0] => string(3) "id4"
  [1] => string(4) "Âge"
  [2] => string(2) "59"
}
</pre>








```




History Log
------------------

- 1.1.3 -- 2021-03-05

    - update README.md, add install alternative

- 1.1.2 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.1.1 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.1.0 -- 2018-03-27

    - add NumericKeyArrayInterface.getItem method
    
- 1.0.0 -- 2018-03-27

    - initial commit




