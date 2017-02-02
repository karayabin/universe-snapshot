<?php

namespace QuickForm\ControlFactory;


use QuickForm\ControlFactory\MagicControlFactory\MagicControlRendererInterface;
use QuickForm\ControlFactory\MagicControlFactory\MultipleInputRenderer;
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

    private $renderers;

    public function __construct()
    {
        $this->renderers = [];
    }


    public static function create()
    {
        return new self();
    }

    public function setRenderer($type, MagicControlRendererInterface $renderer)
    {
        $this->renderers[$type] = $renderer;
        return $this;
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    public function prepareControl($name, QuickFormControl $c)
    {
        $canHandle = true;
        $type = $c->getType();
        switch ($type) {
            case 'checkUncheckAll':
                $c->markAsFake();
                break;
            case 'multipleInput':

                break;
            default:
                $canHandle = false;
                break;
        }
        return $canHandle;
    }


    public function displayControl($name, QuickFormControl $c, QuickForm $f)
    {
        $canHandle = true;
        $type = $c->getType();
        $args = $c->getTypeArgs();
        $value = $c->getValue();

        switch ($type) {
            /**
             * This control displays two buttons: checkAll and uncheckAll,
             * and when clicked, they effectively check all or uncheck all the checkboxes of a given target control.
             */
            case 'checkUncheckAll':
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
            case 'multipleInput':
                $renderer = $this->getRenderer('multipleInput', MultipleInputRenderer::class);
                $formId = $f->getFormCssId();
                $containerId = $formId . '-multipleinput-' . rand(0, 1000);
                $blackHoleId = $containerId . '-h';
                if (null === $value) {
                    $value = [];
                }
                ?>
                <div id="<?php echo $containerId ?>">
                    <?php $renderer->render($value, $name); ?>
                </div>
                <div id="<?php echo $blackHoleId ?>" style="display: none;">
                    <?php $renderer->printMultipleInputItem(''); ?>
                </div>

                <script>
                    var container = document.getElementById("<?php echo $containerId; ?>");
                    var blackHole = document.getElementById("<?php echo $blackHoleId; ?>");
                    var tpl = blackHole.querySelector('.horizontal-line');
                    var itemsContainer = container.querySelector('.items');
                    container.addEventListener('click', function (e) {
                        if (e.target.classList.contains('addbutton')) {
                            e.preventDefault();
                            var clone = tpl.cloneNode(true);
                            var input = clone.querySelector('input');
                            input.setAttribute('name', "<?php echo $name; ?>[]");

                            itemsContainer.appendChild(clone);
                        }
                        else if (e.target.classList.contains('removebutton')) {
                            e.preventDefault();
                            var horizontalLine = e.target.parentNode;
                            horizontalLine.parentNode.removeChild(horizontalLine);
                        }
                    });

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

    private function getRenderer($type, $defaultRendererClass)
    {
        if (array_key_exists($type, $this->renderers)) {
            return $this->renderers[$type];
        }
        return new $defaultRendererClass;
    }

}