JVideoPlayer General
====================
2016-04-19



Goals
--------
- Jouer un event
- Jouer un event avec innerqueue
- Jouer une eventsqueue
- Later: Gestion des replace/insert patterns




General
-----------
How, Where, When

eventHandler: How
eventPlayer: Where, When



event
- duration: in seconds
- _target: where (a layer name) the event should be displayed
                This property is not set manually, but computed internally.





eventHandler

Sait comment jouer un event en particulier.
Une instance par event.
Est layer agnostic: peut être joué sur n'importe quel layer de la même manière.

+ str create (event, jTarget, fnSuccess, fnEnded)
    créé le thing dans le empty jTarget, puis exécute fnSuccess quand le thing est prêt à jouer 
+ resume    
+ pause    
    does nothing if it's already paused, or if the event has ended.
+ setTime


Extra (tests...)
+ getTime: retourne le temps en seconds;
            si event est ended, retourne duration.
    
 



eventsQueue


+ addEvent (e)
+ resume
    joue les events de la queue aux moments indiqués par start
+ pause
    ?onPauseBefore
        pause les "events en cours".
        Détection des events en cours par analyse du temps.
    supprime les timeouts en cours.
    
    
InnerQueue extends eventsQueue
    
+ addAllEvents(...args) // each arg is an array of events
    
        keep track of the fetched events by type,
        so that it can handle parallel queues in lazy mode (might be hard).
    
    
    
eventPlayer

        Goal: Which events are playing on which layers.


Décide où (quel layer) les événements sont joués, et par quel handler.
Garde trace de tous les events en cours par layer.   

La notion de eventCode est importante.
Le eventCode est le code html qui permet de voir un event donné.

?Le eventPlayer gère la création/destruction du eventCode en fonction de la durée des événements.
Lorsqu'un event doit jouer, le eventPlayer place le eventCode sur le layer adéquat,
puis le retire lorsque le event a fini de jouer.


Le eventPlayer considère 2 types d'events: heavy et light (pas heavy).
Un event de type heavy est un event qui doit être préparé à l'avance.
Les événements de type heavy sont en général ceux qui utilisent un média comme une vidéo.
Cette distinction est importante car elle permet à eventPlayer de préparer les vidéos (ou autre event de type
heavy) à l'avance et ainsi de réduire les transitions entre events de 
tout type à néant (le temps d'un swap z-index).




?test: Une règle de base est que un seul event peut être joué à la fois par layer.
            Cela permet de détecter un conflit, et donc de savoir QUAND appliquer 
            un pattern de résolution de conflit.
    
    
+ resume (e)
    utilise le handler
    Est-ce que handler.create doit être appelé?
        Première fois: oui
        Après destroy: oui
        Sinon: non
    
    
+ pause (e)
    si n'est pas déjà en pause (car eventsqueue may appelle pause blindly)
    utilise le handler
+ kill (e)
    utilise le handler.destroy
+ setTime (e, t)
    ?utilise le handler
    
+ getTime (e)
+ isPlaying (e)
+ getLayer (e)
+ addListener (e, method)
        ?Utilisé par queue, pour lancer le prochain event, ssi events are not overlapping.
+ attachQueue (e, queue)




- type2Target:
        map qui donne la default target pour un type d'event donné.
        Note: normalement, pas besoin de définir manuellement le target au niveau d'un event, au niveau 
        du handler suffit.



QueuePlayer

- eventHandler
+ playLiveQueue (queue)
    
    




-----------
SYNOPSIS: jouer une vidéo
-----------
videoEventHandler = new VideoEventHandler(main);
var onSuccess = (){
    this.resume    
}
videoEventHandler.create( event, jTarget, onSuccess )


OU

e = {...}
p = new eventPlayer
p.resume (e)


-----------
SYNOPSIS: jouer un event avec innerQueue
-----------


queue = new InnerQueue ()
            .addAllEvents(
                [...], // subtitles
                [...], // ads
            )
e = {...}
p = new eventPlayer
p.attachQueue (e, queue)
p.resume (e)




-----------
SYNOPSIS: jouer une live eventQueue
-----------

lq = new eventQueue // live

    (brainstorm)
    remote.resume ->  lq.resume
    remote.pause ->  lq.pause
     
    ? remote.setTime -> nope


new liveQueuePlayer({
    eventPlayer: new eventPlayer
}).play(lq)


-----------
SYNOPSIS: handling patterns
-----------

replace:
    - from liveQueuePlayer synopsis
    - technically also from InnerQueue (ad cuts another ad of the same eventsQueue?)
    
    => when same "target" is used
    
    C'est géré au niveau du eventPlayer: avant de faire un resume, il teste si un event est déjà en train 
    de jouer sur le même layer, et si c'est le cas, utilise les patterns pour résoudre les éventuels conflits.
    
    
    
            

useful? Interrogations
------------------

Conception du eventPlayer:
- Est-ce que tous les events handlés par un handler donné sont display sur le MÊME layer?
        


