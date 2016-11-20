JVideoPlayer General
====================
2016-04-20



Goals
--------
- Jouer un event
- Jouer un event avec innerqueue
- Jouer une eventsqueue
- Later: Gestion des replace/insert patterns





Event > nonInteractive (abstract)
                    
Event > interactive
            peut être contrôlé par remote
            
            event methods:
            - jEvent    load ( eventData, jParent )
                        jEvent must at least contain a container node (not just text),
                        because the jquery data method will be used on that jEvent.
                        
                        
            - resume    
                    (asap if still loading...)
            - pause
            - isPlaying
            - setTime
            - getTime
            - getDuration
            - getTitle
            
            (callbacks)
            - addListener ( method, fn )
                // replaces all below, but should be inherited?
                // - eventLoaded
                // - eventEnded
                // - ?onProgress
                // - ?onTimeUpdate
            - removeListener ( method, fn )
            
            


Queue > RelativeQueue
Queue > AbsoluteQueue

            - setOnEventPrepare
            - setOnEventStart
            
Queue > AbsoluteQueue > PreloadingAbsoluteQueue
                            - onPrepare (fn:e)
                            - onStart (fn:e)
Queue > AbsoluteQueue > DecorativeAbsoluteQueue 
                            - onShow (fn:e)
                            - onHide (fn:e)




QueuePlayer

- playQueues ( ...queues )
- playQueues2 ( startTime, ...queues )   // that's right, method overloads in js, who said that was not possible?!
        

    Internally (MY implementation only)
        
        an event can resume/pause by itself (i.e. it has the methods to do so),
        but the queuePlayer adds the handling for stopping an event and killing an event.
        The difference between both actions is that:
            - stopping an event occurs when the event naturally ends
            - killing an event is when the event is interrupted
            
        In both cases, by default the corresponding jEvents are moved off the layer,
        so that they visually disappear.
        Also, for now I decided to put them back in their shell (the background layer where they
        were prepared) for possible later use.
        However, a better? implementation might be that only event which need PREPARATION (like videos)
        should be put back to their shell, otherwise, that's a waste of shells creating (for instance
        panels don't need preparation...).
                
                
        


    
QueuePlayer.onQueuePrepareHandler (fn:e)
            
                
QueuePlayer.onQueueStartHandler (fn:e)  
                




Brainstorm: prototype
==========================
todo: code it

Prerequisites


eventNodes:
    id => jEvent

jEvent.data
        - object
        - id
    
playingNodes:    
- layerId => jEvent    


Algorithm
    Queue.onQueuePrepareHandler (fn:e):
    
        id = getId(e)
        jParent = createLayer (id, bgLevel=-1)
        handler = getHandler(e)
        jEvent = handler.load( event, jParent, {
            // trigger eventLoaded?
        })
        jParent.append(jEvent)
        
    
    Queue.onQueueStartHandler (fn:e):
         
        target = getTarget(e)
        target busy?
            no: 
                // A: put event to dst layer
                id =  getId(e)
                jEvent = getEventNode(id)
                jLayer = getLayer(target)
                jLayer.empty().append(jEvent)
                
                // now target is clear
                handler = jEvent.data(object)
                handler.resume()
            yes:
                pattern = getPattern(e)
                switch pattern:
                    replace:
                        jOldEvent = getPlayingNode(target)
                        kill ( jOldEvent )
                        // call A: put event to dst layer
                    insert:
                        jOldEvent = getPlayingNode(target)
                        object = jOldEvent.data(object)
                        oldState = e.isPlaying
                        toBg(jOldEvent)
                        
                        // I forgot to pause the jOldEvent...
                        
                        object.resume()
                        object.addListener ( end, {
                            // en fonction de oldState,
                            // rejouer ou pas l'oldEvent, et le redéplacer etc...
                        } )
                        
                        
kill( jEvent )
    trigger ( kill, layer, event? )  // pif                        
                        
toBg ( jEvent )
    layer = jEvent.data(id)
    jLayer = getLayer(layer, create=true?)
    jLayer.append(jEvent)
                
                
    





