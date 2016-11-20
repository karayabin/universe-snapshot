window.AbsoluteQueue = function(){};
window.AbsoluteQueue.prototype = {
    resume: function(){},
    pause: function(){},
    setTime: function(ms){},
    setOnPrepare: function(fn){},
    setOnFire: function(fn){},
    setOnPause: function(fn){},
};