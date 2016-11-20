JVideoPlayer General
====================
2016-04-18






event
- duration

positionedEvent
- start

identifiableEvent
- id
- type




EventPlayer
--------------

Keep track de tous les events et états (pause/play/et même currentTime).
Utilise des identifiableEvents.

Permet de jouer un event seul.
Todo:Permet de jouer un event seul avec une innerqueue.


+ resume ( event )
+ pause ( event )
+ setTime ( event )
            used 
+ getTime ( event )
            utilisé pour la remote: elapsed
+ isPlaying ( event )
+ addListener ( event, method )
            method=end
            
            Utilisé par queue, pour lancer le prochain event, ssi events are not overlapping.
+ attachQueue ( event, queue )

+ getPlayingEvents ()
        utilisé par queue pour pauser les playing events.
        
        
        
            
            
            
            
EventHandler
----------------

Note: le temps a été extracted.


+ create
        Par défaut, créé la chose et la met en pause,
        pour que Queue puisse faire un setTime en conservant l'état de pause si besoin.
+ destroy
+ resume
+ pause


Queue
--------

utilise des positionedEvent.
Gère le lancement des events.
Attache un listener sur la fin d'un event pour lancer le prochain (lazy), plutôt que de lancer tous les settimeouts d'un coup.



+ resume
        select le prochain event à jouer et le settimeout.
        Si il y a un event en cours, expanded? ep.settime (e), ep.resume(e)

+ pause
        prend tous les playing events
        les pause
        les garde en mémoire dans l'espoir qu'un resume soit fait immédiatement après.
                Si un setTime est fait entre temps, ils sont erase de la mémoire.
        
+ setTime
        supprime tous les timeouts en cours, puis call either resume ou pause.
        Repositionne les éléments en cours (eh.create), puis si besoin appelle resume.
        


Synopsises
----------------

Quand queue est utilisée, remote contrôle queue (via un plugin qui bind les 2 probably).
Ainsi, on a (brainstorm):
- remote.resume -> queue.resume
- remote.pause -> queue.pause
- remote.setTime -> queue.setTime
            Si c'est un setTime, c'est probablement la queue relative (de main?) qu'on control, et non plus 
            la queue live absolute (qui n'utilise pas la remote.timeline).








