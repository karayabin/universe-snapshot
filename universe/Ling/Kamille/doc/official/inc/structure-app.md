
- [class](#class)
- [class-controllers](#class-controllers)
- [class-core](#class-core)
- [class-modules](#class-modules)
- [class-themes](#class-themes)
- [config](#config)
- [functions](#functions)
- [logs](#logs)
- [planets](#planets)
- [vendor](#vendor)
- [www](#www)
- [boot.php](#bootphp)
- [init.php](#initphp)
- [modules.txt](#modulestxt)


### class
Ce dossier est réservé pour vos propres classes appartenant à CETTE application.


### class-controllers

Ce dossier contient les controllers de votre application. 


### class-core

Ce dossier contient des classes réservées au bon fonctionnement de cette application, 
et que vous pouvez modifier à votre gré. 


### class-modules

Ce dossier contient les modules de votre application.

### class-themes

Ce dossier contient les classes utilitaires en rapport avec le thème.

### config

Ce dossier contient les fichiers de configuration de l'application.
Voici à quoi ressemble la structure du dossier config dans cette application:

- config
    - laws
    - modules
    - routsy
    - application-parameters.php
    - application-parameters-dev.php
    - application-parameters-prod.php

###### laws

Ce dossier est déprécié. Vous n'en n'aurez pas besoin, car le concept laws a été remplacé par le concept claws
(que nous verrons et utiliserons plus tard dans ce document).
Cependant, le module Core utilise encore l'ancien système laws, donc ce dossier est conservé.

###### modules

Ce dossier contient la configuration des modules.

!> la syntaxe du nom des fichiers est: **$moduleName.conf.php**

###### routsy

Ce dossier contient les fichiers contenant la configuration des routes principales de l'application.


###### application-parameters.php

Ce fichier contient les paramètres de l'application.


###### application-parameters-dev.php

Ce fichier contient les paramètres de l'application en environnement dev.


###### application-parameters-prod.php

Ce fichier contient les paramètres de l'application en environnement prod.

!> L'environnement (dev ou prod ou autre) est décidé dans le fichier **[init.php](#initphp)** 



### functions

Ce dossier contient des fichiers de fonctions php.

> L'utilisation des fonctions php est assez rare, car en général nous utilisons des classes.
Cependant dans certains cas les fonctions sont plus pratiques; car plus rapides à invoquer.


### logs

Ce dossier contient les logs de l'application.

### planets

Ce dossier contient les planètes de l'application.
C'est à dire les planètes du framework [universe](https://github.com/karayabin/universe-snapshot)
que vous pouvez installer avec la commande [uni](https://github.com/lingtalfi/universe-naive-importer).

> Ce dossier contient déjà les quelques planètes nécessaires pour le fonctionnement de cette application,
donc vous n'avez pas de planètes supplémentaires à importer pour suivre ce tutoriel.


### vendor

Ce dossier contient les packages que vous téléchargez avec l'outil [composer](https://getcomposer.org/).


### www

Ce dossier est la racine web de votre application.

Pour cette application, il contient les dossiers suivants que vous pouvez utiliser, ou pas.


- www
    - modules 
    - theme
    - uploads
    - .htaccess
    - index.php

###### modules

Ce dossier contient les assets produits/utilisés par les modules.

###### theme

Ce dossier contient les assets des thèmes (si vous utilisez le concept de thèmes).

###### uploads

Ce dossier est réservé aux uploads des utilisateurs dans votre application.

> le serveur web a en général les permissions d'écriture sur le dossier **uploads**.

###### .htaccess

Le framework kamille fonctionne en redirigeant tout le trafic web virtuel (c'est à dire toutes les requêtes qui ne pointent pas vers des sources existantes comme une image par exemple) vers un seul fichier (**index.php**).

Si vous utilisez le serveur web apache, ce fichier **.htaccess** redirigera automatiquement tout le trafic web sur la page
index.php.

!> Si vous utiliser un autre serveur web, vous devrez manuellement rediriger tout le trafic vers le fichier **index.php**.


###### index.php

Aussi appelé front controller dans certains cas, le fichier **index.php** est le point d'entrée de tout le trafic web
de votre application.



### boot.php

Ce fichier initialise l'**environnement objet** de l'application.
C'est à dire entre autres l'autoloader de l'application, et les paramètres de l'application.


### init.php

Ce fichier configure l'environnement php de l'application.
C'est à dire les directives de configuration de php pour cette application.

Une fois les fichiers **boot.php** et **init.php** invoqués, l'application peut être lancée.


### modules.txt

Ce fichier contient le nom des modules installés dans cette application.

!> Lorsque vous installez un module manuellement, vous devez ajouter le nom de votre module à ce fichier, 
car le framework kamille utilise ce fichier pour déterminer si l'utilisation d'un module est possible ou non.
