JVideoPlayer General
====================
2016-04-27





Grande pause mentale encore.
Finalement, je n'arrive pas, pour l'instant, à concevoir tout en amont.
Donc je reviens sur une méthode plus intuitive qui consiste à taper un peu de code, 
puis me laisser guider par mes pensées anticipatrices, récursivement...



ElementPlayer:
on doit pouvoir jouer tout élément de manière autonome.
Même les sous-titres (simplicité de conception souhaitée, du moins pour l'instant).



Légende
-----------

o: observation qui guide le design
d: désir (de design) 




Notes de conception
----------------------


### ElementPlayer

Permet de jouer un élément.
Est rarement utilisé seul de cette manière, mais plutôt en interne par le EventPlayer.


+ jElement prepare (elementInfo, jParent)
    
        o: tout élément a une représentation physique.
        l'élément est représenté dans le contexte visuel jParent.
         
         
d: les erreurs générées par tous les éléments doivent pouvoir FACILEMENT être gérées de 
la même manière.


+ self          setOnError ( fn (msg) )
+ self          setOnDurationReady ( fn (duration) )  // duration in ms, also means that the element is READY to play
+ self          setOnEnd ( fn (jElement) )  
  
+ void          resume ()        
+ bool          isPlaying ()        
+ void          pause ()        
+ void          setTime ( ms )      
        Si le temps est supérieur à la durée de l'élément, 
        le callback onEnd est lancé, et l'élément est stoppé.
        Sinon, l'état pause/play n'est pas altéré.
        
+ number:ms     getTime ( )      
       


### EventPlayer

Permet de jouer un événement et/ou une programmation live de plusieurs événements.


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

         
            


RelativeQueue

+ setEvents
+ addEvents
+ pause
+ resume
+ setTime ( ms )

+ setOnPrepare ( fn(event, startTimeout) )
+ setOnResume ( fn(event) )
+ setOnPause ( fn(event) )
+ setOnSetTime ( fn(event, ms) )
+ setOnStop ( fn(event) )
// 
+ setBacktrack ( bool )
+ setOptimizer ( fn )




Imaginons une file d'événements positionnés sur une ligne qui représente le temps,
et une tête de lecture qui peut naviguer sur cette ligne.

Pour chaque événement, la tête de lecture peut déclencher les méthodes suivantes:


- prepare
    lorsqu'un événement doit être joué prochainement
- resume
    pour déclencher la lecture d'un événement.
    La méthode prepare a forcément été appelée avant; même si parfois le laps de temps entre les 2 appels 
    est trop court pour que l'événement ait réellement eu le temps de se préparer.
    Ce problème doit être géré au niveau du EventsPlayer, par choix de design.
    
- pause
    déclenche la pause d'un élément
- setTime
    définit le temps d'un événement.
    Cette méthode peut être appelée avant de jouer l'événement, lorsque par exemple la tête de lecture est positionnée
    au milieu d'un événement, et toujours APRES la méthode prepare (si la méthode prepare est appelée).
    Cette méthode peut aussi être appelée si l'événement est déjà en cours de jeu, et qu'une fois le temps changé,
    cet événement est toujours en cours de jeu, autrement dit si le temps n'est pas "sorti" de l'événement.
    
    
    
    
    
    
Notez qu'il n'y a pas de méthode stop.
C'est volontaire.
La raison pour cela est en partie due au fait que les éléments ont déjà chacun un moteur de temps interne et donc 
s'arrêtent naturellement lorsque leur durée est expirée, donc cela aurait été redondant d'avoir deux mécanismes de stoppage 
des éléments en parallèlle.
Une autre raison (la raison principale) est que nous voulons garder la queue aussi simple que possible,
et que la queue, à la base, ne sait pas gérer les conflits de stop qui peuvent survenir.
Ces conflits sont liés aux questions: comment arrêter un élément lorsqu'il est coupé par un autre; notamment il est possible
d'interrompre temporairement un élément, ou bien de le stopper complètement, et cette logique est une couche de complexité
qui n'appartient fondamentalement pas à la queue.
 
    
Cependant il y a un event onStop qui peut être lancé sur les événements.
Cela peut survenir lors de l'appel à setTime, lorsque la tête de lecture sort
du range de l'événement en cours de jeu.
 





Au niveau de l'implémentation, cette interface permettant de jouer un événement est représentée par l'objet 
EventsPlayer.

La ligne de temps ainsi que les événements est appelée matérialisée dans l'objet EventsQueue.

L'objet EventsQueue utilise l'objet EventsPlayer pour accomplir le comportement exposé plus haut.



Si backtrack vaut true (false par défaut), l'objet RelativeQueue cherche les éléments en cours de jeu,
et leur passe un argument offset avec une valeur positive correspondant au temps à partir duquel l'élément 
doit être joué (le currentTime de l'élément en quelque sorte).

Notez que dans ce cas, si la queue est en cours de jeu, la méthode onResume est appliquée dans la foulée.
Sinon, si la queue est en pause, la méthode onResume n'est pas appelée, et ni la méthode onPause.
 
Le timeout est toujours 0 dans le cas d'événements passés (parsés en mode backtrack).

    


implementation notes
-----------------------


Gestion du temps qui avance.
Le temps n'avance pas vraiment, 
mais comme on a 3 functions, resume, setTime et pause, setTime définit le temps,
resume ouvre le compteur de temps, et pause calcule la duration du temps écoulé depuis cette marque.
Autrement dit, le temps ne bouge pas, sauf quand on appelle pause (et setTime est un cas particulier).




t = default current time (now or 0 ?)
lastMark = t


resume
    if not playing already
        lastMark = now()
    
        prepare future events
        
        // prepare present events
        presentEvents().each(
            if present event is paused
                play
            else if present event is not paused already
                prepare
                setTime
                play
        )
        
    
    
pause
    if not paused already
        t = currentTime()
    
        cancel future events
        
        pause present events (playing events)
      
        

setTime ( t )
    t = t
    if is playing
        cancel future events
        
        
        prepare future events
        
        if new time arrives on present event
            if event was not paused
                prepare
            
            setTime
            ?play
    
    
    
    

currentTime 
    return t + now() - lastMark

