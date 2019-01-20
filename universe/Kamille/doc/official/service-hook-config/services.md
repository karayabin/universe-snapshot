Services
==========
2018-03-02



Si votre application a besoin de services, alors vous pouvez utiliser l'objet X, qui est le service 
container du framework kamille.



L'objet X se trouve ici: **class-core/Services/X.php**.

!> Vous pouvez toujours utiliser votre propre système de services si vous préférez: kamille est un framework agnostique à ce niveau




L'utilisation de X nécessite les étapes suivantes:



- inscription du service au service container
- appel du service 



Inscription du service 
-----------------------

Pour inscrire un service au service container, ouvrez la class X et ajoutez une méthode protected static.

Par convention, un service est nommé d'après son module.

- nomDuService: $NomModule_$nomDuService


Par exemple, tous les services déclarés par le module Core commencent par **Core_**.

Exemple:

```php 
protected static function Core_DerbyCache()
{
    return \Module\ThisApp\Ekom\Helper\ServiceHelper::Core_DerbyCache();
}
```


Vous êtes entièrement responsable du contenu des services que vous créez.



Appel d'un service
---------------------

Une fois que votre service est créé, vous pouvez l'appeler avec la méthode get de l'objet X.


```php
<?php 

use Core\Services\X;
use DerbyCache\DerbyCacheInterface;
/**
 * @var DerbyCacheInterface
 */
$cache = X::get("Core_DerbyCache");
```

La méthode get possède d'autres arguments:

```php
X::get ( $service, $default = null, $throwEx = true, $reuse = true )
```

Par défaut, si le service n'existe pas, la méthode jette une exception (car $throwEx=true).

Si $throwEx=false et que le service n'existe pas, alors la valeur $default est retournée.

Enfin par défaut le résultat d'un premier appel à un service est toujours mis en cache (car $reuse=true),
ce qui permet de configurer les services de manière lazy.

Pour re-exécuter l'initialisation du service (et bypasser le cache), mettez le flag $reuse à false.