/**
 * 
 * InterruptModeHandler
 * =========================
 * 
 * An InterruptModeHandler handles an event conflict (which occurs when two events overlap on the same spot).
 *
 * 
 * In this implementation, we have two modes:
 * 
 * - stop
 * - pause
 * 
 * Let event B interrupting event A.
 * 
 * 
 * With stop, event B is stopped.
 * With pause, event B is paused and put in the background, then resumed when event B ends.
 * 
 * 
 * Recursive pause (feature)
 * ---------------------
 * 
 * With this strategy, recursive pause is possible.
 * Let event A play, B interrupt A in pause mode, and C interrupt C in pause mode too.
 * 
 * Then A plays, when B kicks in, A is paused and put into the background,
 * when C kicks in, B is paused and put into the background too.
 * Then C ends, and so B resumes,
 * then B ends, and so A resumes.
 * 
 * 
 * Mixing modes
 * ---------------------
 * 
 * Let's describe the intent of this class when mixing modes of differents types.
 * 
 * Let A play, B interrupt A in pause mode, and C interrupt B in stop mode.
 * What happens?
 * A plays, then B kicks in and A is paused and put into the background,
 * then C kicks in and stops B and A.
 * Eventually, C ends.
 * 
 * The key point in this scenario is that a stop is destructive and kills any existing paused event.
 * That's how we have implemented our stop feature.
 * 
 * 
 * 
 * 
 */
window.InterruptModeHandler = function () {
    this.paused = {};
};
window.InterruptModeHandler.prototype = {

    handleConflict: function (eventsPlayer, interruptMode, jOutgoingEvent, jIngoingEvent, targetLayer) {

        console.log(interruptMode + " " + jOutgoingEvent.data('eventId'));
        var zis = this;
        switch (interruptMode) {
            case 'pause':
                /**
                 * Put the outgoing event to the background,
                 * and wait until the ingoing event ends,
                 * then resume the outgoing event (and put it back to the foreground)
                 */
                var outgoingEventId = jOutgoingEvent.data('eventId');
                jOutgoingEvent.data('eventHandler').pause();
                eventsPlayer.__putIntoBackground(outgoingEventId, jOutgoingEvent);

                if (false === this.paused.hasOwnProperty(targetLayer)) {
                    this.paused[targetLayer] = {};
                }
                this.paused[targetLayer][outgoingEventId] = jOutgoingEvent;

                var eventIsSet = jIngoingEvent.data('_eventIsSet');
                if ('undefined' === typeof eventIsSet || false === eventIsSet) {
                    jIngoingEvent.data('eventHandler').on('eventend', function (jElement) {
                
                
                        // put the paused element back to the foreground
                        // unless it has been replaced
                        if (zis.paused[targetLayer].hasOwnProperty(outgoingEventId)) {
                            eventsPlayer.lm.putIntoLayer(targetLayer, jOutgoingEvent);
                            jOutgoingEvent.data('eventHandler').resume();
                
                        }
                
                
                    });
                    jIngoingEvent.data('_eventIsSet', true);
                }
                break;
            case 'stop':
                /**
                 * stop the outgoing event,
                 * and kill any paused event for that spot
                 */
                jOutgoingEvent.data('eventHandler').stop();

                // also clear all paused events
                if (true === this.paused.hasOwnProperty(targetLayer)) {
                    for (var i in this.paused[targetLayer]) {
                        this.paused[targetLayer][i].data('eventHandler').stop();
                    }
                    this.paused[targetLayer] = {};
                }

                break;
            default:
                // this statement might be removed in the future, I just use it as a debug reminder (not part of the conception "masterplan")...
                throw new Error("Unknown interruptMode " + interruptMode);
                break;
        }
    },
};