Claws est un système de template [MVC](https://en.wikipedia.org/wiki/Model%E2%80%93view%E2%80%93controller).



Claws est une abbréviation de Controller Layout And WidgetS.

C'est un système qui permet entre autres de créer les pages web d'un site en utilisant les éléments suivants:

- themes
- controller
- layouts
- widgets



### Structure générale

Au sein d'une application, voici comment est implémenté le système Claws:


- theme/
    - $themeName/
        - includes/ 
            - ...les fichiers que l'on peut inclure avec la méthode **includes** du Layout
        - layouts/
            - ...les fichiers de layout
        - widgets/
            - ...les fichiers templates pour les widgets
- www/
    - theme/
        - $themeName/ 
            - ...les fichiers web du thème $themeName 



#### Theme

La notion de thème est une notion assez simple à comprendre: c'est l'apparence d'un site web.

Quand on change de thème, on change l'apparence visuelle d'un site.

On peut imaginer par exemple 2 thèmes A et B pour un même site:

- thème A: teintes rouges, menu principal vertical situé sur la gauche
- thème B: teintes bleues, menu principal horizontal situé en haut



#### Controller

Dans Claws, le contrôleur:

- reçoit les données à afficher
- choisit le layout et les widgets responsables de l'affichage de ces données
- transmet les données au layout et aux widgets choisis


C'est à dire que le contrôleur est un entre-metteur entre le modèle (M de MVC) et la vue (V de MVC).


###### Un contrôleur claws

```php
<?php


namespace Controller\YourModule\Miscellaneous;


use Kamille\Architecture\Controller\Web\KamilleClawsController;
use Kamille\Utils\Claws\ClawsWidget;

class MyTestController extends KamilleClawsController
{
    public function render(){
        $this->prepareClaws();
        $this->getClaws()->setWidget("maincontent.mywidget", ClawsWidget::create()
            ->setTemplate("Test/mytemplate") // theme/your_theme/widgets/Test/mytemplate.tpl.php
            ->setConf([])
        );

        return parent::doRenderClaws();
    }
}

```


#### Layout

Le layout (ou modèle en français) est le squelette d'une page web.

Il est tout à fait possible de faire un site web complet en n'utilisant qu'un seul modèle.
C'est par exemple le cas du mini-site que nous allons construire dans les paragraphes à venir.

Il est également possible que le même site web utilise plusieurs layouts différents.

Personnellement, j'aime bien utiliser des conventions pour nommer mes layouts.
Cette convention de nommage me convient pour l'instant: [LNC1](https://github.com/lingtalfi/layout-naming-conventions#lnc_1)



Le fichier de layout est un fichier php qui contient la structure html pour un modèle donné.
La différence avec un fichier php/html classique est que le fichier de layout peut utiliser un objet Layout 
représenté par la variable **$l** (la lettre l comme layout, en minuscule).


L'objet Layout a deux méthodes particulièrement intéressantes:

- includes
- position


###### includes

Includes permet d'inclure un autre fichier

Exemple:
```php
<?php $l->includes("top.php"); ?>
```

> Le fichier inclus est défini en utilisant un chemin relatif par rapport à la racine: **theme/$themeName/includes**


###### position

position permet d'afficher tous les widgets inscrits à une position particulière.

Exemple:

```php
<?php $l->position("main"); ?>
```


#### Widget

Le Widget est l'objet qui représente un élément sur la page.

Par exemple, on peut imaginer un widget Menu qui représente un menu.
Le code php/html du widget est écrit dans un template.

