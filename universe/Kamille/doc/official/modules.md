Modules
==========
2018-03-02 --> 2018-03-05




Les modules dans kamille sont situés dans le dossier **class-modules**.

Les modules que j'ai créés sont pour l'instant tous ici: https://github.com/KamilleModules/


Pour qu'un module soit effectif, il faut réaliser les deux phases suivantes:

- import du module
- installation du module


L'import du module est la phase dans laquelle vous placez le module dans le dossier class-modules.

!> Dans kamille, tous les modules sont importés dans le dossier **class-modules**.

Une fois votre module dans ce dossier, il est bien importé, mais il n'est pas encore actif.

Pour le rendre actif il faut **installer** le module.




Installation d'un module
----------------



### Les éléments installés


L'installation d'un module provoque des changements dans l'application cliente.

Lorsqu'on installe un module, plusieurs actions peuvent être réalisées en fonction de la complexité du module.

Les principales actions réalisées sont:

- import et installation des dépendances (du module) des planètes du [framework universe](https://github.com/karayabin/universe-snapshot).<br>
En effet, la plupart des modules que je créé dépendent de planètes appartenant au framework universe.
         
- installation des fichiers de configuration du module 
- installation des routes utilisées par le module 
- installation des autres fichiers utilisés par le module (comprenant les controllers, les assets webs, et...) 
- enregistrement des services utilisés par ce module.
 Les services sont enregistrés directement en dur dans le fichier des services de l'application: **class-core/Services/X.php**. 
- enregistrement des hooks utilisés par ce module et inscription aux hooks des autres modules.
 Les hooks sont enregistrés directement en dur dans le fichier des hooks de l'application: **class-core/Services/Hooks.php**. 
- création de la base de données et/ou de tables dans une base de données existante
- inscription du module dans le fichier modules.txt (situé à la racine de l'application)
- ... d'autres étapes, en fonction de la complexité du module




> La méthode ModuleInstallationRegister::isInstalled($moduleName) permet de savoir si un module est déjà installé.
                 
             


### Les méthodes d'installation


Pour installer et/ou désinstaller un module, on utilise les méthodes install/uninstall que doivent implémenter
chaque module (planets/Kamille/Module/ModuleInterface.php).


Il y a deux types d'installation:

- installation manuelle 
- installation par ligne de commande (recommandée)



!> Quelque soit le mode d'installation choisi, l'outil [uni](https://github.com/lingtalfi/universe-naive-importer) est requis si votre module a des dépendances avec des planètes
du [framework universe](https://github.com/karayabin/universe-snapshot).


### Installation manuelle


Pour l'installation manuelle, on doit écrire un bout de code et l'exécuter (dans le navigateur web par exemple).

Voici un exemple de code qui installe le module [NullosAdmin](https://github.com/KamilleModules/NullosAdmin) dans votre application.

```php
<?php


use Core\Services\A;
use Module\NullosAdmin\NullosAdminModule;
use Output\WebProgramOutput;

// using kamille framework here (https://github.com/lingtalfi/kamille)
require_once __DIR__ . "/../boot.php";
require_once __DIR__ . "/../init.php";


A::testInit(); // generic init to create an improved test environment (often optional)




NullosAdminModule::create()->install();
```




Comme vous le voyez, on instancie le module de notre choix (ici NullosAdminModule),
puis on appelle sa méthode **install**.






### Installation par ligne de commande

Pour gagner un peu de temps, on peut utiliser l'outil en ligne de commande de kamille:
 [kamille installer tool](https://github.com/lingtalfi/kamille-installer-tool), qu'il faut au préalablement installer.
 
 Pour l'installer, je vous recommande de suivre la doc pas à pas.
 
 Ensuite, pour l'utiliser, c'est assez simple: dirigez vous dans le dossier de l'application, puis exécutez les
 commandes que vous souhaitez.
 
 
 Par exemple, pour installer ET importer le module NullosAdmin en une ligne, on peut faire ceci:
 
```bash
kamille install NullosAdmin
``` 


### Désinstallation par ligne de commande
 
```bash
kamille uninstall NullosAdmin
``` 


