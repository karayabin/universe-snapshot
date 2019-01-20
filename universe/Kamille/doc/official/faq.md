Faq
==========
2018-03-02




Général
=============

Qu'est-ce que c'est ric?
-----------------------

RIC: row identying columns.

L'ensemble de (nom de) colonnes qui identifient un enregistrement de manière unique.

En terme de code, il s'agit d'un tableau.
Souvent, ric est un tableau contenant uniquement un champ: id. 




Contrôleur et code php
=============

Comment récupérer un paramètre d'url?
-----------------------

```php
$id = Z::getUrlParam("id");
```



Comment récupérer l'identifiant de la route actuelle?
------------------------------

```php
$routeId = A::route();
```


Comment récupérer le chemin de l'application?
------------------------------

```php
$appDir = A::appDir();
```


Comment savoir si on est dans le backoffice ou pas?
------------------------------

```php
A::isBackOffice(); 
```



Quel est l'environnement actuel: prod ou dev?
------------------------------

```php
A::getEnvironment(); 
```

Quel est le thème actuel?
------------------------------

```php
A::getTheme(); 
```



Comment débugguer une application lente?
------------------------------

Ajoutez un identifiant `page.perf` à votre logger en utilisant le hook `Core_addLoggerListener` appelé depuis `class-modules/Core/ApplicationHandler/WebApplicationHandler.php`.

```php
$f = A::appDir() . "/logs/page-perf.log.txt";
$logger->addListener(\Logger\Listener\FileLoggerListener::create()
    ->addIdentifier('page.perf')
    ->setFormatter(\Logger\Formatter\TagFormatter::create())
    ->setPath($f));
```

Maintenant, vous pouvez appeler la méthode suivante:

```php
A::chronosPoint("page.perf");
```



Comment savoir si un module est installé?
------------------------------

```php
if (ModuleInstallationRegister::isInstalled("PeiPei")) {
    // le module PeiPei est installé   
}
```
