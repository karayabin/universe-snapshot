Config
==========
2018-03-02



Si vos modules ont besoin de configuration, alors vous pouvez utiliser le système de configuration des modules
prévus par le framework kamille si vous le désirez.


!> Note: vous pouvez également utiliser votre propre système si vous préférez.



Le système proposé par kamille est le suivant:


- déclaration de la configuration d'un module
- récupération d'une valeur 



Déclaration de la configuration 
----------------------------------------

La déclaration des modules se fait dans le dossier **config/modules**.

Chaque module a son propre fichier de configuration: $Module.conf.php.

Par exemple: **config/modules/MyModule.conf.php**.

A l'intérieur du fichier de configuration, la variable **$conf** doit être déclarée et contenir un array.


Exemple:

```php
<?php 
$conf = [
    'myVar' => 6,
];
```


Récupération d'une valeur
------------------- 

Pour accéder à la configuration d'un module, on utilise la méthode get de l'objet XConfig:


```php

$myVar = XConfig::get("MyModule.myVar");

```

!> Notez que le nom de la variable doit être préfixé du "nom du module suivi d'un point". 


La méthode get possède d'autres arguments:


```php
XConfig::get ( $key, $default = null, $throwEx = false )
```

Comme vous pouvez le deviner, par défaut si la variable n'est pas trouvée, la méthode get retourne la valeur $default.
Sauf si le flag $throwEx=true, auquel cas une exception est jetée.










