JVideoPlayer General
====================
2016-04-25





Grande pause mentale.


Ok.



Voici mes notes de conceptions sur le player.


Donc on a plusieurs type de choses à jouer: des vidéos, des sous-titres, des panneaux de texte 
(par exemple qui annoncent un message important que l'admin voudrait faire passer aux utilisateurs).

On voit donc qu'on a ici une diversité des éléments jouer.
On peut donc commencer par nommer les choses.





Replay mode
===================

Un élément est joué.

On aura donc un objet Player, qui sera une classe abstraite, et des Player concrets pour chaque type d'élément.

Le Player aura les méthodes de base suivantes:

- prepare ( elementInfo, jParent ) // un élément est joué dans un contexte visuel nommé jParent
- resume
- pause
- stop
- setTime

Notez qu'on a une méthode setTime qui ne fait pas forcément l'unanimité ici.
Discutons-en un peu.
Nous avons oublié de préciser que les éléments ont en commun d'être des éléments affichés dans le temps
(bien que dans le cas des sous-titres, leur gestion peut être faite de manière statique).
Dès lors, la notion de temps prend son sens, et s'applique donc généralement à Player.
(Sinon, on aurait pu retirer pause également?)

Michael a dit qu'on aurait pu retirer pause également.
Par cela remettant en cause la classe Player en tant que seule classe existante,
réfléchissons un peu à cela.


On peut effectivement faire une distinction entre 2 type d'élements:

- les éléments qui se déroulent intrinséquement sur une timeline, comme les vidéos et les sons, les médias oserais-je dire 
- tous les éléments dont on peut gérer l'affichage dans le temps en utilisant uniquement 2 propriétés: start, duration,
        ainsi que deux méthodes fonctionnellement équivalentes à: show et hide.


Je pense qu'on peut se mettre d'accord pour dire que 2 classes abstraites de Player se dessinent ici:

- MediaPlayer, qui sera parent de VideoPlayer (concrete)
- PanelPlayer, qui serait parent de TextPlayer (concrete), qui pourrait (proposition) être une classe permettant d'afficher des panneaux et/ou sous-titres


Admettons.
Imaginons un peu...
La gestion d'un TextPlayer peut servir aussi bien pour les sous-titres que pour les panneaux, il n'y a aucune difficulté particulière.
Par contre, que penser des vidéos "normales" et des vidéos publicitaires: il y a t'il une différence de gestion entre ces 2 types de vidéo ?
Et bien en fait à priori je pense que non, donc tant mieux.
 
 
 
Donc nous avons un Player qui joue des éléments, probablement passés au player sous forme d'arguments,
et donc probablement stockés au niveau de l'application sous forme de js map (l'occasion de rappeler qu'on est en javascript).
 

Simple enough, I like it.


Sur quels autres problèmes devrions-nous pencher notre attention ?

J'ai quelques requêtes de la part de mes utilisateurs: les playlists, et le mode live.



Intéressons-nous à la faisabilité de ces requêtes si vous le voulez bien.



Playlist
==============

Rappelons le principe d'une playlist:

Il y a x éléments (en général de type média), dont les liens sont affichés dans un panel sur le côté de l'écran:
l'utilisateur peut cliquer sur chacun des liens, déclenchant ainsi la lecture de l'élément cliqué;
par défaut, les éléments jouent tout seul (dans le cas du mode autoplay actif), les uns à la suite des autres,
et en boucle (si le mode loop est actif).

Déclencher la lecture d'un élément par rapport à un click n'a rien de sorcier,
mais comment gérerions-nous l'enchaînement automatique d'un élément à un autre ?

Il ne nous manque qu'un élément assez simple: un callback onEnd qui doit être appelé par l'élément lorsque sa lecture touche à sa fin.

Notre Player, ressemble maintenant à ceci:


- resume --> onEnd
- pause
- stop --> onEnd
- setTime (--> onEnd si time > duration, est une implémentation courante)




Mode live
=============

Le mode live est un mode dans lequel les éléments sont joués en fonction d'une programmation déterminée à l'avance.
Par exemple, à 09h, on joue l'inspecteur Derrick, à 09h10, il y a une pub de 5 minutes, puis à 10h on jour l'inspecteur Gadget.


Permettez-moi de partager cette image illustrant le mécanisme de base mode live.
Cette image représente une machine constituée de plusieurs composants:

- à gauche, un composant chargé de poser les événements (terme à définir) sur le tapis roulant
- au milieu, le tapis roulant, qui représente le temps qui passe, et qui transporte les événements de gauche à droite 
- à droite, le composant chargé d'interpréter les événements. Cela a généralement un impact visuel que l'utilisateur peut voir sur un écran


Commençons par la définition d'un événement: un événement est un ensemble de données permettant de jouer un élément à 
un instant donné, et pour une durée donnée.

Techniquement, (et c'est également ce qui ressort de l'illustration) un event (événement) est un wrapper (conteneur)
qui englobe les données permettant de jouer l'élément.

Assignons quelques noms:

- elementInfo: les données permettant de jouer un élément (title, url pour une vidéo, etc...)
- eventInfo: contient les données suivantes:
        - elementInfo, le tableau js elementInfo, dépendant du type de l'élément à jouer
        - start, nombre représentant l'instant auquel l'élément doit commencer, exprimé en millisecondes par rapport à l'origine Epoch 
        - duration, la durée de l'événement, exprimée en millisecondes




Notes personnelle: en fait, les événements peuvent également être utilisés dans les mode replay et playlist à travers des timelines relatives.



Mine de rien, nous venons de définir 3 modes de lecture différents:

- replay mode
- playlist
- live



Je pense que ces quelques modes sont la base de la conception, et ne devraient pas être changés (c'est à dire sous aucun prétexte).

Nous avons toutefois encore beaucoup de choses à déterminer, qu'il faudra donc ajouter progressivement et soigneusement 
de manière à ce que la distinction entre les 3 modes soit maintenue, et que chaque mode soit cohérent avec lui-même. 



Les sous-titres (cues)
===========================

Lorsqu'un élément est joué (en général un média), on peut imaginer des sous-titres qui s'affichent.
Les sous-titres et l'élément sont joués sur des layers parallèlle, et de manière synchronisée.

La tâche d'implémentation du parallèllisme physique est facilitée par la propriété native z-index du language html.
Il nous suffit de créer un div pour les sous-titres, et un div pour l'élément joué, et de placer le div contenant 
les sous-titres au-dessus du div de l'élément joué, et le tour est joué.
On peut superposer d'autres éléments si besoin.


La synchronisation temporelle est nécessaire dans le cas des sous-titres, car les sous-titres dépendent complètement
de la timeline de l'élément joué (imaginez si les sous-titres n'étaient pas synchronisés, ce serait n'importe quoi!).

Notons tout de suite qu'il serait possible de créer d'autres types d'éléments qui devraient être joués de 
manière synchronisée avec l'élément principal (par exemple une publicité qui doit commencer 20 secondes après le début
de l'élément, ou bien un pannel).

Ce serait donc bien d'avoir un système par lequel on puisse attacher plusieurs lignes de temps relatives à une ligne de temps principale.
Cependant, c'est un problème délicat; 
afin de le concevoir correctement?, je propose la méthodologie suivante: 

- recensement des différents besoins
- proposition d'un système répondant à ces besoins



Recensement des besoins
------------------------

Le système est avant tout conçu pour de la programmation statique, c'est à dire qu'un programmateur humain 
place les éléments (principalement des vidéos) à jouer sur une grille de temps.

Il est tout à fait possible que le programmateur humain (opé) puisse placer des panneaux de texte également sur 
la grille.

Il est également possible, toujours de manière statique, de faire démarrer un événement A avant la fin d'un 
autre élément B, de manière à ce que A coupe la fin de B.
Par exemple si le générique de fin d'un film dure trop longtemps, et que la programmation est assez serrée, 
cette technique permet de faire tenir plus d'événements dans une journée (example fictif).

Note: avec la programmation statique, on peut placer des publicités de la même manière qu'une autre émission,
comme cela est probablement géré par les grandes chaînes de tv? 


Notons que pour le programmateur, la programmation se fait sémantiquement sur UN seul canal, c'est à dire que le 
programmateur n'a pas conscience de layers parallèlles, mais juste d'un "écran" sur lequel sont affichés les différents
événements de cette programmation.
Cette note aura peut être son importance lors de l'implémentation.


Malgré le fait que ce mode de jeu s'appelle live, nous souhaitons également permettre l'utilisation 
de la fonction setTime dans ce mode (va et vient dans le temps possible).



Puis, comme nous sommes assez exigents en termes des possibilités du lecteur au niveau de l'implémentation,
nous voulons également gérer le côté des insertions dynamiques (programmation dynamique).
Par exemple si l'administrateur souhaite diffuser une vidéo que tous les utilisateurs voient immédiatement,
et qui interrompt le programme en cours, ou un panneau d'alerte.

Note personnelle: une possibilité d'implémentation serait d'insérer ce genre d'événements à la base dynamiques de manière statique 
dans le flux d'events absolus, puis de "draîner" la nouvelle info via un système de refresher every 3 seconds, et un objet
bridge qui permette de faire l'insertion et de réclamer le rafraîchissement des events; autrement dit on reste dans la gestion
statique. Une méthode add a déjà été implémentée sur une des queues.


Finalement, toute la programmation peut être vue de manière statique, certains événéments étant préparés plus en avance
que d'autres.


Le développeur peut attacher des événements à un élément (sous-titres, ou autre type).


Ensuite, on a les événements que l'utilisateur peut en partie/ou totalement skipper, le meilleur exemple 
de ce type d'événement étant probablement les publicités.

Le fait de sauter une publicité en soi n'est pas très compliqué, on doit juste faire attention à détecter ce saut pour 
la collecte des statistiques, entre autre;
cependant, une autre contrainte que l'on a est que le player doit agir comme une télévision, c'est à dire que 
toutes les personnes doivent voir la même chose à une heure donnée.

Evidemment, si plusieurs personnes sautent des publicités a des instants différents, il y a obligatoirement
des décalages qui se créent.
L'idée principale qui a été retenue pour pallier à ce problème est la création d'un TEMPS DE BASE, qui est effectivement
le même pour tous, et sur lequel chaque utilisateur désynchronisé peut revenir de plein gré (en cliquant sur 
un bouton par exemple). 

La logique voudrait (et nous suivons souvent les chemins de la logique) que le TEMPS DE BASE soit celui de l'utilisateur 
qui ne fait rien de spécial, c'est à dire qui subit la programmation, et qui ne saute pas les publicités.

Dès lors, un utilisateur qui saute une publicité n'est plus dans le TEMPS DE BASE, et créé/suit alors sa propre ligne de temps.



Voyons ensuite le problème que je trouve le plus complexe pour ce player.
A un instant t, la situation suivante peut se produire:
l'utilisateur regarde une émission A, puis vient une coupure pub, et pendant la pub, l'administrateur a décidé d'ajouter
un panneau de 30 secondes contenant un message personnel, que l'utilisateur ne peut pas interrompre.

Lorsque l'événement panneau se termine, la publicité doit reprendre là où elle en était donc, puis lorsque la publicité
se termine, l'émission A reprend là où elle était laissée.

Ajoutons à cela le fait que la publicité puisse être programmée de manière statique, ou bien être un élément attaché
de manière relative (comme une piste de sous-titres).


Et le cas le pire peut surgir lorsque pendant la coupure pub, avant que le panneau ne commence,
une pub attachée à A se déclenche.
Dans ce cas, le panneau interrompt la pub attachée, puis quand la pub attachée se termine, la pub normale reprend,
puis quand la pub normale reprend, A reprend.





Un autre besoin est celui de la survie d'un élément joué lors d'un refresh.
Lorsqu'un élément est en train de jouer (quelque soit le mode), si l'utilisateur rafraîchit son navigateur, 
l'élément devrait (plugin) reprendre idéalement exactement là où il était avant le rafraîchissement.
Une possibilité est d'utiliser les cookies, afin d'alléger la charge sur la base de données. 


Un autre besoin est celui du mode de persistence d'un événement (mode live).
Normalement, lorsqu'un événement A qui dure 1 heure est joué à 10h, si l'utilisateur rafraîchit son navigateur à 10h30,
la 30ème minute de l'événement A doit jouer.
Cependant, l'administrateur doit pouvoir avoir l'option de créer des publicités qui ne se déclenchent que si la tête de lecture
passe par le début de l'événement, c'est le modèle utilisé par les publicités sur youtube en 2015. 
Appelons ce mode de jeu le mode flag, et appelons le modèle traditionnel le mode persistent.
 




Voilà, je pense que nous avons recensé tous les besoins, faisons une petite synthèse:

 
- A. possibilité d'attacher des événements à une vidéo (sous-titre ou autre)
- B. possibilité de créer des événéments de manière statique, qui peuvent s'overlap
- C. setTime en mode live
- D. possibilité d'insérer dynamiquement des événements dans la programmation
- E. certains événements sont skippables
- F. TEMPS DE BASE vs temps personnel
- G. interruptions récursives possibles (panel -> ad -> program)
- H. survie au refresh
- I. choix du mode de jeu d'un événement (persistent vs flag)







Proposition d'un système répondant à ses besoins
------------------------------------------------------



Système A:


On utilise un système de calques superposés, qui permet notamment de superposer les sous-titres à une video, mais pas seulement.

Au niveau le plus bas (par défaut z-index 1) de cette pile de calques se trouve le sous-système main (appelé main).
Main est en fait une manière d'utiliser les calques, une convention si vous préférez.
Le système main fonctionne avec un calque opaque (souvent noir) qui représente le sol (ground, avec z-index=1).
Au-dessus de ce sol, il ne peut y avoir qu'un seul calque qui est appelé le calque de focus (z-index=2 par défaut).

En-dessous du sol, plusieurs calques peuvent être créés, prêts à être joués.
Le contenu de ces calques est masqué par le sol, donc ces calques ne sont pas visibles.
Ces calques sont appelés background layers (z-index=0).
Lorsqu'un élément situé sur un background layer doit être joué, son z-index est interverti avec celui du calque de focus.
Cette opération s'appelle un switch.
Lors d'un switch, deux calques sont mis en jeu: appelé calque entrant et calque sortant.
L'avenir du calque sortant est déterminé par la propriété "interrupt" de l'événement entrant, qui peut prendre l'une des valeurs suivantes:

- killSibling
- pause


Nous fairons attention à laisser de la place pour d'autres stratégies d'interrupt,
bien que ces 2 suffisent pour les besoins énoncés plus haut.



killSibling est un mode dans lequel la méthode stop de l'élément sortant est appelée lorsque l'événement entrant prend le focus.
 
pause est un mode dans lequel la méthode pause de l'élément sortant est appelée lorsque l'événement entrant prend le focus,
et lorsque l'événement entrant s'arrête de jouer, l'élément pausé reprend le focus.


Note technique:
    Pour détecter la fin d'un événement, le EventPlayer lie le callback onEnd de l'élément à un dispatcher qui permet d'affecter
    plusieurs callbacks lorsqu'un événement se termine. 
    Le nom de l'event est eventEnd.
    Cette approche nous permet de conserver la simplicité d'implémentation de l'élément (enhance cohesion).




Voici l'organisation que nous proposons:



EventPlayer
+ self      setEvents ( array:events ) // utilisation d'une queue absolue en interne
+ self      addEvents ( array:events )
+ self      attachEvents ( event, events ) // attache les events à une innerqueue? interne pour cet event?
+ void      resume (  )  // use this after a call to setEvents is the synopsis
+ void      pause (  )  // idem
+ void      setTime ( t )  // idem

- promise   prepareEvent ( event ) // event peut venir de n'importe quelle queue
+ void      playEvent ( event )
                prepareEvent(event).then(
                    // event.type?
                    // event.target? 
                    // -> main? -> conflict? -> ep.play|pause|stop...()
                )
+ void      pauseEvent ( event )
+ void      addListener ( methodName, fn ) // pour le mode playlist
                    methodName:
                        - end

            


Queue
+ pause
+ resume
+ setTime ( t )
+ setOnPrepare ( fn )
+ setOnFire ( fn )
+ setOnPause ( fn )



Bridges: des bridges permettent de lier les différents components:


Queue -> EventPlayer
- Queue.onPrepareEvent()  -> EventPlayer.prepareEvent 
- Queue.onFireEvent()  -> EventPlayer.playEvent 
- Queue.onPauseEvent()  -> EventPlayer.pauseEvent 
 
 
 
Remote -> EventPlayer
                .resume
                .pause
                .setTime
 


En mode replay et playlist, la télécommande contrôle l'élément qui a le focus.
En mode live, la télécommande contrôle la absoluteQueue interne au EventPlayer.





Tests:
Modes static = (replay, playlist).
    
    
A.
    ep.attachEvents ( event, [...] )
    ep.playEvent ( event ) // modes static
    ep.setEvents ( [...] )
    ep.resume ( ) // mode live
    

B.
    [live]
    a = { start: 0, duration: 5000 }
    b = { start: 2000, duration: 5000 }
    ep
        .setEvents( [a, b] )
        .resume()
        
C.

    ep.setTime ( x )
    
    
D. 
    ep.addEvents ( [...] )
    
E. 
    a = { skippable: true, minPlay: 3000 }   // proposition?
    
    
F.
    ep.switchTime ( user|global )
   
                            
G.                             
    Code interne.
    Idée 1:
        Ajouter une propriété paused à un événement (ou autre objet auquel on peut accéder facilement)
        et qui référence la vidéo à jouer lorsque l'événement se termine (via kill ou end).
        
H.
    En mode live, le temps GLOBAL est absolu.
    Le temps PERSONNEL se comporte comme le temps global, mais avec un décalage suivi (connu en interne
    qui se met à jour chaque fois que l'utilisateur prend du retard par rapport au temps global )
    
    Pour les modes static, on peut imaginer un plugin qui insère le temps actuel dans les cookies,
    toutes les x secondes.
    
I.
    (modalité de lecture)
    aHandler.playMode = consistent|flag // default, applies to all events
    a = { playMode: consistent|flag }    // specific to an event
    
    
    
        
                        
    
 
 

