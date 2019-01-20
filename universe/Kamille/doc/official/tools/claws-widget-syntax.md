Syntaxe des fichiers widget
==========
2018-03-02




A l'intérieur d'un fichier de widget:


- le code html est permis
- le code php est permis
- la variable $v est disponible et contient la configuration du widget (passée par le contrôleur via la méthode setConf)
- les tags sont permis



Les tags
---------------

Les tags sont une manière alternative d'accéder à la configuration du widget.

La manière normale (et recommandée) d'accéder à la configuration du widget est d'utiliser la variable $v.

Cependant, je voulais vous montrer l'utilisation des tags.

Imaginons la configuration du widget suivante:

- `fruit`: poire
- `age`: 46
- `items`: \[a, b, c]
- `o:otherItems`: [d, e, last => f]


Et bien avec cette configuration, nous pouvons avoir ce fichier de widget (template) par exemple:


```php
Coucou, je suis le template de démo pour cet exemple.

Le fruit que j'ai choisi est: <?php echo $v['fruit']; ?>. (recommandé car php est TOUJOURS la solution la plus souple)
Le fruit que j'ai choisi est: {fruit}. (tags, plus rapide mais a plusieurs limitations: conflits avec d'autres sytèmes utilisant des tags similaires, pas de gestion des arrays...)


Pour les items, il est possible de faire ceci:

Avec php normal:
L'item n°1 est <?php echo $v['otherItems'][0]; ?>.  Remarquez que otherItems est disponible...
L'item n°2 est <?php echo $v['otherItems'][1]; ?>.  
L'item n°3 est <?php echo $v['otherItems']["last"]; ?>.

Avec les tags:
Remarquez que dans notre contrôleur, on a référencé la variable otherItems par la lettre o.
C'est ce qui se passe lorsqu'on utilise les deux-points dans le nom de la variable de configuration.


L'item n°1 est {o:0}.  
L'item n°2 est {o:1}.  
L'item n°3 est {o:last}.  




```

