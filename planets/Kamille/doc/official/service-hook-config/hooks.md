Hooks
==========
2018-03-02



Les Hooks jouent un rôle primordial dans une application kamille:
ils permettent aux modules de communiquer entre eux et avec le reste de l'application.

L'utilisation d'un hook implique 3 parties:

- déclaration d'un hook
- inscription à un hook
- appel d'un hook



Déclaration d'un hook
------------------------

Les hooks sont déclarés ici: **class-core/Services/Hooks.php**.

Par convention, un hook est nommé d'après son module.

- nomDuHook: $NomModule_$nomDuHook


Par exemple, tous les hooks déclarés par le module Core commencent par **Core_**.


Pour déclarer un hook, il faut créer une méthode vide **protected static** dans le fichier Hooks. 

Exemple:

```php

    protected static function Core_Controller_onControllerStringReceived(&$controllerString)
    {
    
    }
```


Il est possible de passer le premier argument (et le premier argument seulement) d'un hook par référence, 
en utilisant l'esperluette (&) devant le nom du paramètre, comme c'est le cas dans l'exemple ci-dessus. 





Inscription à un hook
------------------------

Pour s'inscrire à un hook, il suffit d'ajouter le code que l'on souhaite directement dans le hook déclaré précédemment.


```php

    protected static function Core_Controller_onControllerStringReceived(&$controllerString)
    {
        // mit-start:MyModule
        $controllerString = 6;         
        // mit-end:MyModule         
    }
```

Il est IMPÉRATIF d'encadrer son code par les deux commentaires contenant le nom du module:

```php
// mit-start:MyModule         
// mit-end:MyModule         
```

Cet encadrement:

- permet d'y voir plus clair dans son propre code
- est utilisée par l'[installateur de modules](/modules?id=l39installateur-de-modules) pour supprimer, inscrire les hooks des modules étant supprimés ou installés







Appel d'un hook
------------------------

Pour appeler un hook depuis le code de l'application, on utilise la méthode call de l'objet Hooks:


```php
<?php 
use Core\Services\Hooks;


$controllerString = "";
Hooks::call("Core_Controller_onControllerStringReceived", $controllerString);
```




Philosophie des hooks
-----------------------
Comme dit plus haut, un hook appartient à un module (il est techniquement possible de déroger à cette règle, mais cela n'apporte
pas un grand intérêt dans cette discussion).

Cela signifie que les `subscribers` (ceux qui s'inscrivent à un hook) connaissent non seulement le nom du module propriétaire
du hook, mais également la fonction du hook, grâce au nom de celui-ci.

Par exemple, si on nous donne le nom de hook suivant:

- MyModule_decorateMenu

On comprend tout de suite qu'il s'agit d'un hook appartenant au module `MyModule`, et dont la fonction est de 
décorer un menu.

Autrement dit, lorsque vous (en tant que module) vous inscrivez à un hook, cela vous donne le droit d'utiliser
les méthodes du module propriétaire.




C'est à dire qu'en terme de design, les hooks sont comme des tourbillons qui aspirent l'information vers eux plutôt
que des cailloux tombant dans un lac et poussant vers l'extérieur.


> Quand vous pensez hook, pensez tourbillon


Cependant, il reste bien évidemment possible de transmettre des informations aux modules clients (ceux qui s'inscrivent
au hook), afin qu'ils aient le contexte nécessaire pour faire leur job; mais la direction générale reste du client vers 
le module propriétaire.


Une autre manière de voir les choses est la suivante: quand vous vous inscrivez à un hook, pensez que c'est un contrat.
Le module propriétaire est votre patron et il vous demande une tâche précise. Vous, vous êtes simplement le prestataire 
chargé de réaliser cette tâche, et avez accès à tous les outils (non seulement
ceux de votre module, mais également ceux du module propriétaire): vous avez carte blanche pour réaliser ce que le patron 
vous a demandé.

De plus, vous êtes censé connaître parfaitement les outils du patron, en plus des vôtres.




 
  



