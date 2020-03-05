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

        /**
         * the formId here should be the form css id.
         */
        var jContext = $('#$formId');

        var jShareInputs = jContext.find('input[id^="lrfr2-share-"]');
        var nbFields = jShareInputs.length / 3;


        jShareInputs.on('change', function () {
            var isChecked = $(this).prop('checked');

            var $this = $(this);
            var value = $(this).val();
            var number = parseInt($(this).attr('data-number'));
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
            // then set the other fields of the same type to readonly and opacity=0.2
            //----------------------------------------
            for (var i = 1; i <= nbFields; i++) {
                if (number !== i) {
                    var controlId = value + '_' + i;
                    var jControl = jContext.find('#' + controlId);
                    if (true === isChecked) {
                        jControl.prop('disabled', true);
                    } else {
                        jControl.prop('disabled', false);
                    }
                }
            }

        });


        jContext.on('submit', function () {
            $(this).find('[disabled]').prop('disabled', false);
        });
    });
});