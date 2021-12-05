/**
 * Bootstrap5AjaxFormErrorHandler
 * -------
 * 2021-08-10
 *
 *
 * This module depends on jquery, and bootstrap5.
 *
 *
 * Read the AjaxFormErrorHandler's doc to start with.
 *
 *
 * Then, this class does a little more than just hiding/showing error messages.
 * It does those extra things as well:
 *
 * - will parse any element (of the context) that has a afeh-control (by default) css class on it, and if data-id
 *      of that element is in the errorIds array, it adds the bootstrap is-invalid (by default) css class to it,
 *      which translates to a visual cue that there is a problem with this element.
 *
 *
 *
 *
 *
 *
 *
 *
 */
import AjaxFormErrorHandler from "./AjaxFormErrorHandler.js";

export default class Bootstrap5AjaxFormErrorHandler extends AjaxFormErrorHandler {


    constructor(options) {
        super(options);
        this.elemClass = options.elemClass || 'afeh-control';
        this.elemCallable = options.elemCallable || function (jElem) {
            jElem.addClass("is-invalid");
        };
    }

    hideErrors() {
        super.hideErrors();
        $('.' + this.elemClass).removeClass("is-invalid");
    }


    spreadErrors(errorIds) {
        super.spreadErrors(errorIds);
        for (let i in errorIds) {
            let errorId = errorIds[i];
            var jElem = $('.' + this.elemClass + '[data-id="' + errorId + '"]');
            if (jElem.length > 0) {
                this.elemCallable(jElem);
            }
        }
    }

}



