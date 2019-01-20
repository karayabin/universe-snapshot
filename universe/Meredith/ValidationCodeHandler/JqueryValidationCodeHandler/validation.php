<?php

/**
 * @var JqueryValidationCodeHandler $this
 */
use Meredith\ValidationCodeHandler\JqueryValidationCodeHandler;

?>
<script>

    (function ($) {
        $(document).ready(function () {

            validatorRules = {};


            // section {validatorRules}
            <?php echo $this->getValidatorJsUserCode()->render('validatorRules', $mc->getFormId()); ?>


            var validator = $(".meredith-form").validate({
                rules: validatorRules,
                submitHandler: function (form) {

                    // section {onSubmitBefore}
                    <?php echo $this->getValidatorJsUserCode()->render('onSubmitBefore', $mc->getFormId()); ?>


                    meredithFunctions.submitValidForm(form);


                    // section {onSubmitAfter}
                    <?php echo $this->getValidatorJsUserCode()->render('onSubmitAfter', $mc->getFormId()); ?>


                    return false;
                }
            });


            var jForm = $("form[data-meredith=<?php echo $mc->getFormId(); ?>]");
            jForm.find("[type=reset]").on("click", function () {
                validator.resetForm();
            });

        });
    })(jQuery);
</script>
