Tutoriel de création d'une application simple avec kamille
==========
2018-03-01


Aujourd'hui nous allons voir comment créer une application de base avec le framework kamille.




Importer l'application basique
--------------------------------

Pour commencer, on va importer une architecture de base.


Il y a 3 méthodes:

- avec l'outil kit (recommandé)
- avec git
- manuellement



Si vous avez installé l'outil [kit](https://github.com/lingtalfi/kamille-installer-tool):


```bash
kamille newapp kamille-app
```

Cette méthode a l'avantage de supprimer le dossier .git et le fichier .gitignore pour vous automatiquement.
 
 
Avec git:
```bash
git clone https://github.com/lingtalfi/kamille-app.git kamille-app
```


Manuellement:
allez sur le [repository kamille-app](https://github.com/lingtalfi/kamille-app) et téléchargez le 
contenu dans votre application.





Dans tous les cas, vous aurez un dossier contenant une application kamille fonctionnelle de base.
Dans la suite de ce tutoriel, nous allons expliquer comment cette application fonctionne.






Mise en place du serveur web
--------------------------------
Le choix du serveur web dépend de vous.
Pour le reste de ce tutoriel, j'utiliserai apache.

Normalement, vous n'aurez pas besoin de cette section et vous pouvez passer directement à l'étape suivante: [structure](#structure-type-d39une-application-kamille).

Cependant, voici ma configuration personnelle sur mon poste de travail pour ce tutoriel.

### Configuration des vhosts avec MAMP

```bash
open /Applications/MAMP/conf/apache/extra/httpd-vhosts.conf
```

Mon virtual host:

```apacheconfig
<VirtualHost *:80>
    ServerAdmin admin@gmail.com
    DocumentRoot "/myphp/kamille-app/www"
    ServerName kamille-app
    SetEnv APPLICATION_ENVIRONMENT dev
    <Directory "/myphp/kamille-app/www">
        AllowOverride All
    </Directory>
</VirtualHost>
```


Ne pas oublier le host:

```bash
open /private/etc/hosts
```

Et ajouter la ligne:

```bash
127.0.0.1		kamille-app
```

Enfin relancer MAMP dans cet exemple.

Ouvrir le navigateur sur **http://kamille-app** pour vérifier.




Structure type d'une application kamille
--------------------------------



Une fois le squelette de l'application kamille téléchargé, vous aurez la structure suivante:


[filename](inc/structure-app.md ':include')




La première route
----------------------

Maintenant que nous avons eu un aperçu théorique de la structure de l'application, commençons la partie pratique 
de notre tutoriel.

Notre premier but va être d'afficher une page web affichant le texte "hello world".

Nous allons partir du point le plus haut (la requête web) et finir par le point le plus bas (le code du controller).
Cela nous permettra de comprendre l'architecture [kam](https://github.com/lingtalfi/kam) utilisée par le 
framework kamille.

C'est parti!

Lorsque la requête web arrive dans l'application, il faut savoir quel objet (contrôleur) va la traiter.
Le rôle de dispatcher cette **requête** au bon contrôleur est celui du routeur.

Au sein du framework kamille, le système **routsy** est de loin le plus utilisé.

Ce système permet d'écrire simplement les routes dans un fichier de configuration: **config/routsy/routes.php**.

!> Si vous vous allez plus loin avec le système de routage, ouvrez le fichier<br> **class-modules/Core/ApplicationHandler/WebApplicationHandler.php**
qui définit quels systèmes de routeurs sont utilisés par votre application.

Ouvrez le fichier **config/routsy/routes.php**.

Son contenu est le suivant:


```php
<?php

//--------------------------------------------
// USER - BEFORE
//--------------------------------------------



//--------------------------------------------
// STATIC
//--------------------------------------------
$routes["MyApp_home"] = ["/", null, null, 'Controller\ThisApp\Raw\HomeController:render'];
$routes["MyApp_bootstrap_home"] = ["/bootstrap", null, null, 'Controller\ThisApp\Bootstrap\ThreePages\HomePageController:renderHomePage'];
$routes["MyApp_bootstrap_blog"] = ["/bootstrap-blog", null, null, 'Controller\ThisApp\Bootstrap\ThreePages\BlogPageController:render'];
$routes["MyApp_bootstrap_blog_item"] = ["/bootstrap-blog-item/{id}", null, null, 'Controller\ThisApp\Bootstrap\ThreePages\BlogPageController:renderItem'];
$routes["MyApp_bootstrap_contact"] = ["/bootstrap-contact", null, null, 'Controller\ThisApp\Bootstrap\ThreePages\ContactPageController:render'];



//--------------------------------------------
// DYNAMIC
//--------------------------------------------


//--------------------------------------------
// USER - AFTER
//--------------------------------------------




```


On peut y voir 4 sections:

- user-before
- static
- dynamic
- user-after


Théoriquement, les sections **user-before** et **user-after** sont réservées pour l'utilisateur (vous, le développeur),
tandis que les sections **static** et **dynamic** sont potentiellement écrites dynamiquement par l'installateur de 
modules lorsque vous installez des modules.

La section **static** contient les routes n'ayant pas de paramètres dynamiques tandis que la section **dynamic**
est réservée aux routes contenant des paramètres dynamiques.

Dans la pratique cependant, vous pouvez mettre les routes où vous voulez, car l'installation des modules ne supprime 
pas les routes qu'il ne connaît pas.

Il faut juste savoir que les routes sont lues de bas en haut.

!> NE SUPPRIMEZ JAMAIS CES DÉLIMITEURS DE SECTION, CAR ILS SONT UTILISÉS PAR L'INSTALLATEUR DE MODULES.


Analysons la première route:

```php
$routes["MyApp_home"] = ["/", null, null, 'Controller\ThisApp\Raw\HomeController:render'];
```

Voici la version décryptée de cette route:

```php
$routes[$routeIdentifier] = [$url, $constraints, $requirements, $controller];
```

- $routeIdentifier: un identifiant unique pour cette route
- $url: l'url relative par laquelle cette route est accédée. Cette url peut utiliser des tags (nous voyons cela juste après) représentant des paramètres d'url
- $constraints: un tableau (ou null) permettant de mettre des conditions sur des paramètres d'url
- $requirements: un tableau (ou null) permettant de mettre des conditions sur la requête http
- $controller: une représentation du contrôleur à appeler en cas de match


Afin de mieux comprendre, voici un exemple concret d'utilisation de tous ces paramètres (vous pouvez
retrouver cet exemple ici: planets/Kamille/doc/routsy/routes.example.php) 

```php
<?php
use Kamille\Architecture\Request\Web\HttpRequestInterface;

/**
 * id => [
 *      uri,
 *      urlParams constraints,
 *      http requirements
 *      controller match (see WebRouterInterface for more details)
 * ]
 */
$routes["Core_myRouteId1"] = ["/mystatic/uri", null, null, "?Controller:method"];

$routes["Core_myRouteId2"] = ["/mystatic2/uri", null, null, ["?Controller:method", ["urlParam1" => "blabla"]]];
$routes["Core_myRouteId3"] = ["/mystatic3/uri", [
    // ints
    'dynamic' => ">6",
    'dynamic2' => ">=6",
    'dynamic3' => "<6",
    'dynamic4' => "<=6",
    'dynamic5' => "6", // =
    'dynamic6' => ">7<10",
    'dynamic6b' => ">=7<10",
    'dynamic6c' => ">=7<=10",
    'dynamic6d' => ">7<=10",
    'dynamic9' => ["78", "45"], // alternatives
    // strings
    'dynamic7' => "kabo",
    'dynamic8' => ["kano", "kabo"], // alternatives


], null, "?Controller:method"];
$routes["Core_myRouteId4"] = ["/my/{dynamic}/uri", ['dynamic' => ["64", "65", "66"]], [
    'https' => true,
    'inGet' => ["disconnect", "pou"],
    'inPost' => ["disconnect", "pou"],
    'getValues' => ["ee" => "45", "pou" => "pl"],
    'postValues' => ["ee" => "45", "pou" => "pl"],
], "?Controller:method"];
$routes["Core_myRouteId5"] = ["/my/{dynamic}/uri", null, function (HttpRequestInterface $request) {
    return true; // true if ok, false will make the match fails
}, "?Controller:method"];


// note the null uri, which means the uri matches (but maybe the other criterion will fail)
$routes["Core_myRouteId6"] = [null, null, function (HttpRequestInterface $request) {
    return true; // true if ok, false will make the match fails
}, "?Controller:method"];

```



### Le paramètre $url d'une route

L'écriture du paramètre **url** d'une route se fait en utilisation une url relative (à la racine du site).
C'est à dire que toutes vos urls doivent commencer par un slash. 

Il y a également 3 types de tags que vous pouvez utiliser:

- le tag par défaut:   {foo}
- le slash tag:     {/foo}
- le greedy tag:    {foo+}



> Pour plus de détails, lisez les commentaires de la classe: planets/Kamille/Utils/Routsy/Util/DynamicUriMatcher/CherryDynamicUriMatcher.php



### Le paramètre $controller d'une route

La syntaxe utilisée est simple:

```txt
Controller\ThisApp\Raw\HomeController:render
```

Si on décrypte on a ceci:
```txt
$className:$method
```

> Le $className doit être spécifié en utilisant des backslashes (\\).


!> Pour aller plus loin (par exemple si vous voulez inventer une nouvelle syntaxe), ouvrez le fichier<br> 
**planets/Kamille/Architecture/RequestListener/Web/ControllerExecuterRequestListener.php** et regardez la méthode **executeController**.



### Conclusion sur cette première route

Et donc avec tout ça de dit, nous voyons que notre première route est déjà écrite:


```php
$routes["MyApp_home"] = ["/", null, null, 'Controller\ThisApp\Raw\HomeController:render'];
```

En français, qu'est-ce que cela veut dire?


Cela veut dire que si l'url slash est appelée (c'est à dire si on ouvre le site par défaut),
c'est la méthode **render** du contrôleur **Controller\ThisApp\Raw\HomeController** qui sera invoquée.

Vérifions cela et ouvrez l'url "/" (http://kamille-app/) dans votre navigateur:
on voit bien le message "hello-world" qui s'affiche.

Nous allons maintenant vérifier que c'est bien la méthode **render** du contrôleur **Controller\ThisApp\Raw\HomeController**
qui est exécutée.



Controller
----------------------

Ovrons le fichier **class-controllers/ThisApp/Raw/HomeController.php**.
Son contenu est le suivant:


```php
<?php


namespace Controller\ThisApp\Raw;


use Core\Controller\ApplicationController;
use Kamille\Architecture\Response\Web\HttpResponse;

class HomeController extends ApplicationController
{

    public function render()
    {
        return HttpResponse::create("hello world");
    }

}
```

On voit bien que c'est ce contrôleur qui est responsable d'écrire "hello world" dans notre navigateur.


Voici quelques points à retenir à propos des contrôleurs:

- le namespace d'un contrôleur commence toujours par Controller
- un contrôleur doit renvoyer un objet HttpResponseInterface (planets/Kamille/Architecture/Response/Web/HttpResponseInterface.php)


> Le controller est responsable de renvoyer la réponse attendue par la requête web.


Le contrôleur a carte blanche pour renvoyer la réponse.



Dans cette section nous avons réussi à afficher une page blanche avec un texte.
Il n'y a qu'un pas entre ce texte et une page html complète.
C'est à dire que dès à présent vous êtes capables de créer un site web complet avec le framework kamille.

Cependant, parmi les nombreux outils proposés par le framework kamille, on trouve Claws, qui propose
un système de gestion de templates.


C'est ce que nous allons voir prochainement.
Plutôt que d'inventer notre propre système, on va utiliser le système **claws** proposé par le framework kamille.

!> Si le système claws ne vous plaît pas, vous pouvez tout à fait utiliser un autre système: le framework kamille est agnostique
et vous pouvez utiliser le système d'affichage que vous voulez.




Claws: la théorie 
--------------------------------
[filename](inc/claws.md ':include')



Claws: la pratique 
--------------------------------

Ouvrez l'url "http://kamille-app/bootstrap" dans notre navigateur, la homepage d'un site web s'afficher.
Naviguez sur ce site web qui ne contient que 4 pages:

- accueil
- blog  
    - détail d'un article en particulier
- contact


Ce site web est construit en utilisant le système Claws, et je vais essayer de tout détailler afin que vous puissiez
comprendre comment Claws fonctionne dans la pratique, et vous déciderez après si vous voulez utiliser Claws ou pas. 



Si on regarde le fichier des routes (**config/routsy/routes.php**), on voit que l'url **/bootstrap**
est gérée par la méthode **renderHomePage** du contrôleur **Controller\ThisApp\Bootstrap\ThreePages\HomePageController**
(c'est le deuxième route du fichier).


Voyons à quoi ce contrôleur ressemble:

```php
<?php


namespace Controller\ThisApp\Bootstrap\ThreePages;


use Controller\ThisApp\Bootstrap\ThreePagesController;
use Kamille\Utils\Claws\ClawsWidget;

class HomePageController extends ThreePagesController
{

    public function renderHomePage()
    {
        $this->getClaws()
            ->setWidget("maincontent.body", ClawsWidget::create()
                ->setTemplate('ThisApp/MainContent/HomePage/default')
                ->setConf([])
            );


        return $this->renderClaws();
    }
}
```




Ma méthode **renderHomePage** qui est appelée commence par récupérer un objet **Claws** (à l'aide de la méthode **getClaws**).

Cet objet **Claws** (planets/Kamille/Utils/Claws/Claws.php) permet au contrôleur de définir le layout et 
le widget simplement.

Ici, on voit que sur cet objet est ajouté un widget (avec la méthode **setWidget**).
Le layout est défini au niveau de la classe parent (ThreePagesController).

En effet, si on ouvre le code du contrôleur parent, on obtient le code suivant:

```php
<?php


namespace Controller\ThisApp\Bootstrap;


use Core\Controller\ApplicationController;
use Core\Services\A;
use Kamille\Utils\Claws\ClawsWidget;

class ThreePagesController extends ApplicationController
{
    public function renderClaws()
    {

        $routeId = A::route();
        $accueil_est_actif = ($routeId === "MyApp_bootstrap_home");
        $blog_est_actif = (in_array($routeId, ["MyApp_bootstrap_blog", "MyApp_bootstrap_blog_item"]));
        $contact_est_actif = ($routeId === "MyApp_bootstrap_contact");


        $this->getClaws()
            ->setWidget("top.menu", ClawsWidget::create()
                ->setTemplate('ThisApp/Top/Menu/default')
                ->setConf([
                    "items" => [
                        [
                            "label" => "Accueil",
                            "link" => A::link("MyApp_bootstrap_home"),
                            "active" => $accueil_est_actif,
                        ],
                        [
                            "label" => "Blog",
                            "link" => A::link("MyApp_bootstrap_blog"),
                            "active" => $blog_est_actif,
                        ],
                        [
                            "label" => "Contact",
                            "link" => A::link("MyApp_bootstrap_contact"),
                            "active" => $contact_est_actif,
                        ],
                    ],
                ])
            )
            ->setLayout("sandwich_1c/default");


        return parent::renderClaws();
    }
}
```


Ici, on voit que non seulement le parent définit le layout (avec la méthode setLayout),
mais qu'il ajoute également un autre widget (méthode setWidget).


> En termes d'organistion, c'est une pratique commune que de créer un contrôleur parent qui ajoute le layout et 
les widgets communs à un ensemble de pages web utilisant le même layout.

 

Commençons par analyser l'effet de la méthode setLayout.

### setLayout et le fichier de layout

La méthode **setLayout** définit le layout à utiilser.

```php
$claws->setLayout ( $layoutId )
```

Ici, notre identifiant de layout ($layoutId) est "sandwich_1c/default".

C'est à dire que le fichier de layout est concrètement le fichier suivant:

- theme/bootstrapv4/layouts/sandwich_1c/default.tpl.php


C'est à dire que: 
- le préfixe "theme/bootstrapv4/layouts/" est automatiquement ajouté (par Claws) à l'identifiant de layout
- le suffixe ".tpl.php" est automatiquement ajouté (par Claws) à l'identifiant de layout


Le nom du thème, **bootstrapv4** est défini dans les paramètres de l'application (**config/application-parameters.php**)


Si nous ouvrons notre fichier de layout (**theme/bootstrapv4/layouts/sandwich_1c/default.tpl.php**), nous avons le code suivant:


```php
<?php $l->includes('top.php'); ?>
<?php $l->position("maincontent"); ?>
<?php $l->includes('bottom.php'); ?>
``` 

Comme on peut le voir ce code est très succint.

Cependant, il n'a pas été toujours aussi succint.
En réalité, c'est le fruit d'une transformation en 4 étapes.
Pour ceux qui sont intéressés, j'ai mis ces 5 étapes dans le dossier **theme/bootstrapv4/archive/**, à titre pédagogique.
Chaque étape est représentée par un fichier:

- cover.php: étape n°1, le fichier est copié directement depuis le template bootstrap que j'ai utilisé (https://getbootstrap.com/docs/4.0/examples/cover/):
- cover-2.php: remplacement des assets (js et css de manière à ce que cela fonctionne pour l'appli) 
- cover-3.php: modification des textes  
- cover-4.php: première utilisation de la méthode **position** du layout. C'est à dire que dans ce layout, 
    j'ai identifié la partie variable (dans ce layout et pour cette application il n'y a qu'une seule partie variable,
    mais on peut avoir plusieurs parties variables en fonction des applications). 
    Le nom de la position: **maincontent**, m'est directement donné par la convention [LNC1](https://github.com/lingtalfi/layout-naming-conventions#lnc_1),
    mais j'aurais pu utiliser n'importe quel autre nom.  
- cover-5.php: vu que le haut et bas du fichier **cover-4.php** sont des parties fixes pour cette application,
    j'ai créé les fichiers correspondants pour le haut et le bas (theme/bootstrapv4/includes/top.php, theme/bootstrapv4/includes/bottom.php),
    puis je les ai référéncés en utilisant la méthode **includes** du Layout.
    C'est le résultat final pour ce fichier.
    
    
        
Concrètement, c'est l'appel à la position **maincontent** qui nous intéresse:

```php
<?php $l->position("maincontent"); ?>
```      

### setWidget le fichier de widget

La méthode **setWidget** ajoute un widget à l'objet Claws en cours de configuration.


Cette méthode est appelée une première fois au niveau du HomePageController:

```php
->setWidget("maincontent.body", ClawsWidget::create()
    ->setTemplate('ThisApp/MainContent/HomePage/default')
    ->setConf([])
);
```


Ici, l'identifiant de widget est "maincontent.body".

Remarquez le point entre **maincontent** et **body**.

La syntaxe pour les identifiants de widget est la suivante:


- widgetId: `(<position> <.>)? <name>`

C'est à dire qu'ici, le widget "body" est inscrit à la position **maincontent**.

Cela veut dire que lorsque notre fichier de layout invoque la position **maincontent**, notre widget va être invoqué.

Notre objet ClawsWidget a lui-même deux propriétés:

- template
- config

Dans notre exemple, le template est **ThisApp/MainContent/HomePage/default** et la configuration est un array vide.

De la même manière que pour le chemin du layout, le template est transformé en:

- theme/bootstrapv4/widgets/ThisApp/MainContent/HomePage/default.tpl.php



C'est à dire que:

- le préfixe **theme/bootstrapv4/widgets/** est ajouté à notre identifiant
- le suffixe **.tpl.php** est ajouté à l'identifiant


Encore une fois, le nom du thème, **bootstrapv4** est défini dans les paramètres de l'application (**config/application-parameters.php**)


Si on ouvre notre fichier **theme/bootstrapv4/widgets/ThisApp/MainContent/HomePage/default.tpl.php**,
on retrouve bien le code html du widget:

```php
<main role="main" class="inner cover">
    <h1 class="cover-heading">Bienvenue sur mon site.</h1>
    <p class="lead">Ce site est un exemple montrant comment gérer le système MVC avec le framework kamille.</p>
    <p class="lead">
        <a href="https://github.com/lingtalfi/Kamille" class="btn btn-lg btn-secondary">Voir le repository github</a>
    </p>
</main>
```

### Affichage des variables dans un template

Dans un template de widget, nous pouvons utiliser la variable **$v** qui représente le tableau
de configuration passé par le contrôleur (via la méthode **setConf**).

Nous pouvons voir ce concept en action avec le contrôleur **class-controllers/ThisApp/Bootstrap/ThreePages/BlogPageController.php**
et la méthode **render**.
Le widget appelé est **ThisApp/MainContent/BlogPage/default**, et la configuration est un tableau contenant
une clé **items**.

Dans le template en question (theme/bootstrapv4/widgets/ThisApp/MainContent/BlogPage/default.tpl.php),
nous voyons bien à la ligne 7 le code suivant:

```php
$items = $v['items'];
``` 

montrant bien que la variable $v est disponible ET qu'elle contient le tableau de configuration du widget.






### Fin du tutoriel

Voià, le tutoriel touche à sa fin. Maintenant j'espère que vous avez compris les bases de Claws.

Je vous propose maintenant d'observer par vous-même la globalité de l'application créée, en commençant par le fichier 
des routes, puis en continuant par le contrôleur et enfin en terminant par la vue.

Si vous faîtes cela à chaque fois, vous ne pourrez pas vous tromper.

Il y a des méthodes pour aller plus vite, mais nous verrons cela plus tard.





