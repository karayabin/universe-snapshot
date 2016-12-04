<?php

namespace QuickForm\ControlFactory;


use QuickForm\QuickForm;
use QuickForm\QuickFormControl;


/**
 * Factory for fake controls enhanced by js.
 *
 * The intent is:
 * - a check all/uncheck all toggle button
 *
 *
 */
class MagicControlFactory implements ControlFactoryInterface
{

    public static function create()
    {
        return new self();
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    public function displayControl($name, QuickFormControl $c, QuickForm $f)
    {
        $canHandle = true;
        $type = $c->getType();
        $args = $c->getTypeArgs();

        switch ($type) {
            /**
             * This control displays two buttons: checkAll and uncheckAll,
             * and when clicked, they effectively check all or uncheck all the checkboxes of a given target control.
             */
            case 'checkUncheckAll':
                $c->markAsFake();
                $targetName = $args[0];
                $checkAllLabel = (array_key_exists(1, $args)) ? $args[1] : 'Check all';
                $uncheckAllLabel = (array_key_exists(2, $args)) ? $args[2] : 'Uncheck all';

                $formId = $f->getFormCssId();
                $checkId = $formId . '_' . rand(0, 1000);
                $uncheckId = $checkId . '_uncheck';


                ?>
                <button id="<?php echo $checkId; ?>"><?php echo $checkAllLabel; ?></button>
                <button id="<?php echo $uncheckId; ?>"><?php echo $uncheckAllLabel; ?></button>
                <script>

                    var targetId = '<?php echo QuickForm::getControlCssId($f, $targetName); ?>';
                    var target = document.getElementById(targetId);

                    if (target) {
                        function toggle(newState) {
                            var checkboxes = target.querySelectorAll('input[type="checkbox"]');
                            for (var i = 0; i < checkboxes.length; i++) {
                                checkboxes[i].checked = newState;
                            }
                        }

                        document.getElementById('<?php echo $checkId; ?>').addEventListener('click', function (e) {
                            toggle(true);
                            e.preventDefault();
                        });
                        document.getElementById('<?php echo $uncheckId; ?>').addEventListener('click', function (e) {
                            toggle(false);
                            e.preventDefault();
                        });
                    }
                    else {
                        console.log("MagicControlFactory error: target not found, with cssId=" + targetId + ", and name=<?php echo $targetName; ?>");
                    }


                </script>
                <?php
                break;
            default:
                $canHandle = false;
                break;
        }
        return $canHandle;
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    private function error($m)
    {
        throw new \Exception($m);
    }


}