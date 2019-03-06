<?php


namespace Ling\SokoForm\Renderer\Ling;


use Ling\Bat\ClassTool;
use Ling\Bat\StringTool;
use Module\Ekom\Utils\E;

class WithParsleyUikitSokoFormRenderer extends UikitSokoFormRenderer
{

    protected $validationRules;
    protected $topNotificationType;
    protected $topNotificationMessage;
    protected $topNotificationTitle;

    public function __construct()
    {
        parent::__construct();
        $this->validationRules = [];
        $this->topNotificationType = "error";
        $this->topNotificationMessage = "Some errors were found in this form. Please fix them, then post the form again";
        $this->topNotificationTitle = "Oops";
    }


    public function renderForm(array $form, array $options = [])
    {

        $disableParsley = $options['disableParsley'] ?? false;


        $contextId = $options['contextId'] ?? StringTool::getUniqueCssId("with-parsley-uikit-context-");

        ?>
        <div id="<?php echo $contextId; ?>">
            <?php


            $this->prepareExtraAttributes($form);


            // prepare top notification,
            // it will be hidden by default, and the parsley js tool will toggle its visibility when needed
            $notification = $options['topNotification'] ?? [
                    "type" => $this->topNotificationType,
                    "msg" => $this->topNotificationMessage,
                    "title" => $this->topNotificationTitle,
                ];

            $this->renderNotifications([$notification], [
                "cssClass" => "top-notification hidden",
            ]);
            parent::renderForm($form, $options);

            ?>
        </div>
        <?php if (false === $disableParsley): ?>

        <script>
            (function ($) {

                $(document).ready(function () {


                    if (true) {

                        var jContext = $("#<?php echo $contextId; ?>");
                        var jForm = $("form", jContext);
                        var jTopNotification = $(".top-notification", jContext);


                        jForm.parsley({
                            errorClass: "uk-form-danger",
                            errorsContainer: function (field) {
                                var jElement = field.$element;
                                return jElement.closest('.uk-form-controls');
                            }
                        });


                        jForm.parsley()
                            .on('field:error', function () {
                                var jElement = this.$element;
                                if (jElement.is(':checkbox')) {
                                    var jFormControls = jElement.closest('.uk-form-controls');
                                    jFormControls.addClass('uk-form-danger');
                                }
                                jTopNotification.removeClass('hidden');
                            })
                            .on('field:success', function () {
                                var jElement = this.$element;
                                if (jElement.is(':checkbox')) {
                                    var jFormControls = jElement.closest('.uk-form-controls');
                                    jFormControls.removeClass('uk-form-danger');
                                }

                                if (jForm.parsley().isValid()) {
                                    jTopNotification.addClass('hidden');
                                }


                            })
                            .on('form:error', function () {
                                jTopNotification.removeClass('hidden');
                            })
                            .on('form:success', function () {
                                jTopNotification.addClass('hidden');
                            })
                        ;
                    }
                });
            })(jQuery);
        </script>
    <?php endif; ?>
        <?php
    }

    public function setTopNotificationType(string $topNotificationType)
    {
        $this->topNotificationType = $topNotificationType;
        return $this;
    }

    public function setTopNotificationMessage(string $topNotificationMessage)
    {
        $this->topNotificationMessage = $topNotificationMessage;
        return $this;
    }

    public function setTopNotificationTitle(string $topNotificationTitle)
    {
        $this->topNotificationTitle = $topNotificationTitle;
        return $this;
    }



    //--------------------------------------------
    //
    //--------------------------------------------


    protected function extraAttributes(string $methodName, array $control, $extra = null)
    {
//        E::dlog("$methodName");
        $controlName = $control['name'];
        if (array_key_exists($controlName, $this->validationRules)) {

            /**
             * For now, we only consider the first validation rule.
             */
            $classInstance = $this->validationRules[$controlName][0];

            $className = ClassTool::getShortName($classInstance);

            switch ($className) {
                case "SokoNotEmptyValidationRule":
                case "SokoFileNotEmptyValidationRule":
                    $arr = [
                        "renderInputSokoInputControl",
                        "renderTextareaSokoInputControl",
                        "renderSelectSokoChoiceControl",
                        "renderCheckboxSokoChoiceControl",
                        "renderInputStaticFileSokoInputControl",
                        "renderInputAjaxFileSokoInputControl",
                    ];
                    if (true === in_array($methodName, $arr)) {
                        echo "data-parsley-required='true'";
                    }
                    break;
                default:
                    break;
            }
        }
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    private function prepareExtraAttributes(array $form)
    {
        $this->validationRules = $form['validationRules'];
    }

}