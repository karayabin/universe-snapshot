JVideoPlayer General
====================
2016-04-18


Goals
--------
- Jouer un event
- Jouer un event avec innerqueue
- Jouer une eventsqueue
- Later: Gestion des replace/insert patterns




eventHandler

Est layer agnostic: peut être joué sur n'importe quel layer de la même manière.

+ str create (event, jTarget, fnSuccess)
    créé le thing dans jTarget, puis exécute fnSuccess quand le thing est prêt à jouer 
+ resume    
+ pause    
+ ??destroy    


 



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

Garde trace de tous les états de tous les events.   
Cela comprend le layer sur lequel le event est joué.
Chaque méthode est un wrapper qui permet de conserver les traces.
    
    
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
    n'utilise pas le handler!
    
    Exception: si le handler est de type withTimeFlow,
    c'est à dire qu'il a des méthodes setTime et getTime,
    dans ce cas on peut les utiliser.
    
+ getTime (e)
+ isPlaying (e)
+ getLayer (e)
+ addListener (e, method)
        ?Utilisé par queue, pour lancer le prochain event, ssi events are not overlapping.
+ attachQueue (e, queue)





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
    
    
    
            

