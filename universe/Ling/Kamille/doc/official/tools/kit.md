Kit
===========
2018-03-14


Kamille Installer Tool (kit), est un outil en ligne de commande permettant d'exécuter certaines tâches ennuyantes.


Parmi les tâches que kit peut réaliser, nous allons nous intéresser aux suivantes:

- créer une page 
- créer une application de base 
- importer un module 
- empaqueter un module 



Installation
--------------

Voir la documentation sur le [repository de kit](https://github.com/lingtalfi/kamille-installer-tool).



Créer une page
----------------

La méthode `newpage` permet de créer une nouvelle page.

Cette méthode va effectuer les tâches suivantes:

- insérer une route dans le fichier de routes routsy de l'application:
    - soit `config/routsy/back.php` si on choisit le backoffice
    - soit `config/routsy/routes.php` si on choisit le frontoffice
- créer le contrôleur correspondant à cette route, par défaut dans le dossier `class-controllers/ThisApp/Pages`




Voici un exemple de commande utilisant un maximum d'options:

```bash
kamille newpage --module=Ekom --uri="/ekom/users/user/info" --route="Ekom_Users_User_Info"  --controller="Controller\Ekom\Back\Users\UserInfoController:render" --controllerModel="EkomInfoLayout"
```

Voici la liste des options possibles:

- `module`: obligatoire, le nom du module pour lequel il faut créer la page
- `uri`: obligatoire, l'uri qui permet d'accéder à la page
- `route`: obligatoire, le nom de la route; elle doit commencer par le nom de votre module suivi d'un underscore (par exemple: Ekom_)
- `controller`: obligatoire, l'identifiant de votre contrôleur; il s'agit dun namespace du contrôleur, suivi du caractère deux-points (:), suivi du nom de la méthode à exécuter
- `controllerModel`: optionnel, le modèle de contrôleur à utiliser. Votre module peut ajouter ses propres modèles grâce à un hook (voir plus loin).
    La valeur par défaut est: "Dummy".
    Le suffixe `ControllerModel` est automatiquement ajouté au nom du modèle pour trouver le fichier de modèle correspondant.
    De plus, l'extension devra être ".tpl.php".
    Les valeurs possibles sont:
        - Dummy: un contrôleur de base avec un texte en mode lorem ipsum
        - DummyNullos: un contrôleur de base avec un texte en mode lorem ipsum, mais adapté à l'environnement [Nullos](https://github.com/KamilleModules/NullosAdmin) (qui est un module important du framework kamille)
        - NullosFormList: contrôleur de type FormList (morphic)

- `controllerModelDir`: optionnel, le dossier dans lequel chercher le modèle du contrôleur.
    Le tag [app] est remplacé par le chemin de l'application (app_dir).
    La valeur par défaut résoud dans le dossier `planets/Kamille/Utils/Console/assets`
- `env`: optionnel, le nom de l'environnement dans lequel la page doit être générée. Les valeurs sont possibles sont:
    - front: la route sera générée dans le fichier `config/routsy/routes.php`   (routes du frontoffice)
    - back: la route sera générée dans le fichier `config/routsy/back.php`      (routes du backoffice)

    La valeur par défaut est: "front"







#### Le fichier de configuration

Il est possible de travailler avec un fichier de configuration afin d'éviter de répéter certains arguments.
Toutes les options décrites plus haut peuvent être incorporées dans le fichier de configuration.

Si l'utilisateur déclare une option en ligne de commande, et la même option dans le fichier de configuration,
alors l'option déclarée en ligne de commandes est évidemment prioritaire.


Le fichier de configuration doit se trouver à la racine de votre application et doit se nommer `kit-newpage.ini`.

La syntaxe utilisée est celle d'un fichier de configuration php.

Voici un exemple:

```ini
; kamille newpage --module=Ekom --uri="/ekom/users/user/list" --route="Ekom_Users_User_List"  --controller="Controller\Ekom\Back\Users\UserListController:render"


; ------------------------------
; MODELS
; ------------------------------
; kamille newpage --module=Ekom --uri="/ekom/users/user/info" --route="Ekom_Users_User_Info"  --controller="Controller\Ekom\Back\Users\UserInfoController:render" --controllerModel="EkomInfoLayout"
;
; ekom provides the following models:
; - EkomInfoLayout: a controller showing a basic info page for your backoffice (nullos)
; - DummyEkomBackList: a standard form/list backoffice page, using morphic
; - DummyEkomBack: old version DummyEkomBackList (deprecated)
;
controllerModelDir = [app]/class-modules/Ekom/Kit/PageCreator/assets
controllerModel = DummyEkomBackList
controllerDir = Back/Users
env = back


```


#### Créer ses propres modèles de contrôleur

Pour créer vos propres modèles, vous devez spécifier l'option `controllerModelDir` qui indique le dossier dans lequel se trouve votre modèle,
ainsi que l'option `controllerModel`, qui indique le nom du modèle à utiliser.

Attention à bien nommer votre modèle en terminant par le suffixe `ControllerModel`, et à utiliser l'extension ".tpl.php"
Par exemple, si vous utilisez cette commande:

```bash
kamille newpage ... --controllerModelDir="[app]/class-modules/Ekom/Kit/PageCreator/assets" --controllerModel="EkomInfoLayout"
```

Alors le fichier de modèle à créer devra être situé ici: `class-modules/Ekom/Kit/PageCreator/assets/EkomInfoLayoutControllerModel.tpl.php`

Le contenu du modèle est exactement le contrôleur que vous souhaitez utiliser, avec deux contraintes:

- le namespace doit être remplacé par: `_controllerNamespace_` (la commande newpage remplacera ce tag par le namespace réel, en fonction des paramètres de la commande
- idem pour le nom de la classe qui doit être remplacé par: `_controllerClassname_`


Une fois ces contraintes honorées, vous pouvez générer vos pages avec vos modèles :)




 

Créer une application
----------------

Cette commande permet de créer rapidement une application kamille.

```bash
kamille newapp {appName}
```

Cette commande va en gros importer le modèle d'application situé ici: `https://github.com/lingtalfi/kamille-app`




Importer un module externe
----------------

Cette commande permet d'importer/installer un module dans votre application kamille.


L'importation suivie de l'installation peut se faire avec la seule commande: `install`, comme ceci:

```bash
kamille install {moduleName}
```



Empaqueter son propre module
----------------

Cette commande permet de préparer un module pour l'export.
Le processus est décrit plus en détails sur la page [ModulePacker](tools/kamille-module-packer.md). 


```bash
kamille pack {moduleName}
```



