/**
 *
 * AjaxFormErrorHandler
 * ---------
 * 2021-08-10
 *
 *
 * This module depends on jquery.
 *
 *
 * I generally use it along with the AlcpHelper.getContextualPostCallback method from Ling.JAlcp planet.
 *
 *
 *
 * This class alone basically shows error messages for you when you receive an ajax response.
 *
 * The way I use it is on an ajax form:
 *
 * - before I do an ajax call, I call the hideErrors method to make sure all errors are hidden
 * - then the ajax call is done, and in case of errors, it returns an array of error ids.
 *      - before hand, in my html form, I've prepared the errors and assigned two things to each of them:
 *              - a css class of afeh-error (customizable, but that's the default)
 *              - a data-id attribute with an arbitrary identifying value
 *
 * - I call the spreadErrors method, which takes the errorIds array, and shows all the afeh-error elements with a corresponding data-id
 *
 *
 *
 * That's about it.
 * I like this technique because it let me design the html errors the way I want, with a visual feedback.
 *
 *
 *
 * Example
 * --------
 * here is a typical call to this method in a practical context.
 *
 *
 *
 *  var jAddressModalContext = $("#createAddressModal");
 *  let ajaxFormErrorHandler = new AjaxFormErrorHandler({
 *                 context: jAddressModalContext,
 *             });
 *
 *
 *  var createAddressCb = AlcpHelper.getContextualPostCallback(jAddressModalContext, {
 *                 before: function () {
 *                     ajaxFormErrorHandler.hideErrors();
 *                 },
 *                 success: function (jTheSuccessMsg, response, textStatus, jqXHR) {
 *                     console.log("successful address response");
 *                 },
 *                 error: function (defaultCb, jTheErrorMsg, error, response, textStatus, jqXHR) {
 *                     defaultCb();
 *                     ajaxFormErrorHandler.spreadErrors(response.errorIds);
 *                 },
 *             });
 *
 *  jAddressModalContext.on("click", function (e) {
 *                 var jTarget = $(e.target);
 *                 if (jTarget.hasClass("btn-create-address")) {
 *                     createAddressCb("<?php echo $urlCreateAddress; ?>", {});
 *                     return false;
 *                 }
 *             });
 *
 *
 */
export default class AjaxFormErrorHandler {


    constructor(options) {
        options = options || {};
        this.jContext = options.jContext || null;
        this.errorClass = options.errorClass || "afeh-error";
    }


    hideErrors() {
        $('.' + this.errorClass).hide();
    }


    spreadErrors(errorIds) {
        for (let i in errorIds) {
            let errorId = errorIds[i];
            $('.' + this.errorClass + '[data-id="' + errorId + '"]').show();
        }
    }

}



