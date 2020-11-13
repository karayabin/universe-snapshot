/**
 * Multiple edit helper
 * ===========
 * 2019-12-09
 *
 * This helper for LightRealformRoutineTwo was designed to work with the renderer from Chloroform_HeliumRenderer,
 * or at least a renderer that expose the following structure:
 *
 * - all checkboxes are wrapped within an html element with css class "field-checkbox"
 *
 *
 */

document.addEventListener("DOMContentLoaded", function (event) {
    var $ = jQuery;
    $(document).ready(function () {


        var formId = '$formId';
        /**
         * the formId here should be the form css id.
         */
        var jContext = $('#' + formId);

        var jShareInputs = jContext.find('input[id^="lrfr2-share-"]');
        var nbFields = jContext.find('[data-cfi-id^="lrfr2-hr"]').length;


        var onShareInputChange = function (zis) {


            var isChecked = zis.prop('checked');

            var $this = zis;
            var value = zis.val();
            var number = parseInt(zis.attr('data-number'));
            var cssId = value + '_' + number;


            //----------------------------------------
            // first show/hide the checkboxes of the same type
            //----------------------------------------
            jShareInputs.each(function () {
                if (value === $(this).val()) {
                    if (false === $this.is($(this))) {
                        if (true === isChecked) {
                            $(this).closest('.field-checkbox').hide();
                        } else {
                            $(this).closest('.field-checkbox').show();
                        }
                    }
                }
            });


            //----------------------------------------
            // then hide/show the fields of the same type
            //----------------------------------------
            for (var i = 1; i <= nbFields; i++) {
                if (number !== i) {
                    var controlId = value + '_' + i;
                    var jControl = jContext.find('.cfi-control[data-cfi-id=' + controlId + ']');


                    if (true === isChecked) {
                        // jControl.prop('disabled', true);
                        jControl.hide();
                    } else {
                        // jControl.prop('disabled', false);
                        jControl.show();
                    }
                }
            }
        };

        jShareInputs.on('change', function () {
            onShareInputChange($(this));
        });

        // init
        jShareInputs.each(function () {
            onShareInputChange($(this));
        });


        // jContext.on('submit', function () {
        //     $(this).find('[disabled]').prop('disabled', false);
        // });
    });
});