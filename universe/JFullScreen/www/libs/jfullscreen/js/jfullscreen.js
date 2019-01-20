window.fs = {
    canFullScreen: function () {
        if (
            document.fullscreenEnabled ||
            document.webkitFullscreenEnabled ||
            document.mozFullScreenEnabled ||
            document.msFullscreenEnabled
        ) {
            return true;
        }
        return false;
    },
    requestFullscreen: function (dEl) {
        if (dEl.requestFullscreen) {
            dEl.requestFullscreen();
        } else if (dEl.webkitRequestFullscreen) {
            dEl.webkitRequestFullscreen();
        } else if (dEl.mozRequestFullScreen) {
            dEl.mozRequestFullScreen();
        } else if (dEl.msRequestFullscreen) {
            dEl.msRequestFullscreen();
        }
    },
    isFullscreen: function () {
        if (
            document.fullscreenElement ||
            document.webkitFullscreenElement ||
            document.mozFullScreenElement ||
            document.msFullscreenElement
        ) {
            return true;
        }
        return false;
    },
    exitFullscreen: function () {
        if (document.exitFullscreen) {
            document.exitFullscreen();
        } else if (document.webkitExitFullscreen) {
            document.webkitExitFullscreen();
        } else if (document.mozCancelFullScreen) {
            document.mozCancelFullScreen();
        } else if (document.msExitFullscreen) {
            document.msExitFullscreen();
        }
    },
    onFullscreenChange: function (fn) {
        document.addEventListener("fullscreenchange", fn);
        document.addEventListener("webkitfullscreenchange", fn);
        document.addEventListener("mozfullscreenchange", fn);
        document.addEventListener("MSFullscreenChange", fn);
    },
    onFullscreenError: function (fn) {
        document.addEventListener("fullscreenerror", fn);
        document.addEventListener("webkitfullscreenerror", fn);
        document.addEventListener("mozfullscreenerror", fn);
        document.addEventListener("MSFullscreenError", fn);
    }
};