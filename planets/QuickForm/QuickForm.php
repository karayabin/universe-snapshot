<?php

namespace QuickForm;


use QuickForm\ControlFactory\ControlFactoryInterface;
use QuickForm\ControlFactory\LingControlFactory;
use QuickPdo\QuickPdo;

class QuickForm
{


    public $controlErrorLocation; // local(default)|top
    public $title; // string(default="$table form")|null, null means no title
    public $header; // string|null, null means no header
    public $labels;
    public $allowMultipleErrorsPerControl;
    public $translateFunc;
    public $formTreatmentFunc;
    public $defaultValues;
    public $finalValues;
    public $displayForm;
    public $messages;


    private $controls;
    private $controlFactories;
    private $fieldsets;


    public function __construct()
    {
        $this->controls = [];
        $this->labels = [];
        $this->defaultValues = [];
        $this->finalValues = [];
        $this->controlFactories = [];
        $this->fieldsets = [];
        $this->controlErrorLocation = "local";
        $this->title = null;
        $this->header = null;
        $this->allowMultipleErrorsPerControl = true;
        $this->displayForm = true;
        $this->validationTranslateFunc = function ($v) {
            return $v;
        };

        /**
         * Return whether or not the form treatment is a success or failure.
         * The msg adds precision to the result.
         */
        $this->formTreatmentFunc = function (array $formattedValue, &$msg) {
            $msg = 'form data have been successfully treated';
            return true;
        };

        $this->messages = [
            'formHasControlErrors' => 'The form has the following errors, please fix them and resubmit the form',
            'submit' => 'Submit', // submit btn value
            'formNotDisplayed' => 'Oops, there was a problem with the form',
        ];
    }


    public function addControl($name)
    {
        $c = new QuickFormControl();
        $this->controls[$name] = $c;
        return $c;
    }

    public function addControlFactory(ControlFactoryInterface $c)
    {
        $this->controlFactories[] = $c;
        return $this;
    }

    public function addFieldset($label, array $controlNames)
    {
        $this->fieldsets[$label] = $controlNames;
        return $this;
    }

    public function play()
    {

        if (0 === count($this->controlFactories)) {
            $this->controlFactories = [
                new LingControlFactory(),
            ];
        }
        $atLeastOneControlError = false;

        $formTreatmentMsg = null; // witnesses whether or not the form has been posted
        $formTreatmentIsSuccess = false;


        //--------------------------------------------
        // DEFAULT VALUES
        //--------------------------------------------
        foreach ($this->defaultValues as $k => $v) {
            $this->controls[$k]->value($v);
        }


        //--------------------------------------------
        // FORM SUBMITTED
        //--------------------------------------------
        if (array_key_exists('_quickform_posted', $_POST)) {

            unset($_POST['_quickform_posted']);
            $controlsNames = array_keys($this->controls);
            $safeValues = array_intersect_key($_POST, array_flip($controlsNames));

            $formattedValues = [];
            foreach ($safeValues as $k => $v) {
                $formattedValues[$k] = $v;
                $this->controls[$k]->value($v);
            }


            // validation
            $validator = new QuickFormValidator();
            foreach ($this->controls as $columnName => $c) {
                $countErr = 0;
                foreach ($c->getConstraints() as $ruleName => $ruleArgs) {
                    $res = $validator->test($ruleName, $ruleArgs, $c->getValue());
                    if (true !== $res) {
                        if (false === $this->allowMultipleErrorsPerControl && $countErr > 0) {
                            break;
                        }
                        $atLeastOneControlError = true;
                        if (is_string($res)) {
                            $errMsg = call_user_func($this->validationTranslateFunc, $res);
                        } else {
                            $err = $res[0];
                            $tags = $res[1];
                            $keys = array_map(function ($v) {
                                return '{' . $v . '}';
                            }, array_keys($tags));
                            $values = array_values($tags);
                            $errMsg = str_replace($keys, $values, call_user_func($this->validationTranslateFunc, $err));
                        }
                        $c->addErrorMessage($errMsg);
                        $countErr++;
                    }
                }
            }


            // submit
            if (false === $atLeastOneControlError) {
                $formTreatmentMsg = null;
                $formTreatmentIsSuccess = (bool)call_user_func_array($this->formTreatmentFunc, [$formattedValues, &$formTreatmentMsg]);
            }


        }


        //--------------------------------------------
        // FEED CONTROLS WITH DEFAULT VALUES
        //--------------------------------------------
        foreach ($this->finalValues as $k => $val) {
            if (array_key_exists($k, $this->controls)) {
                $this->controls[$k]->value($val);
            }
        }


        $formId = 'form-' . rand(0, 10000);


        ?>

        <script>
            window.onSubmitCallbacks = [];
        </script>

        <section class="form-section freepage">

            <?php if (null !== $this->title): ?>
                <h3 class="form-title"><?php echo $this->title; ?></h3>
            <?php endif; ?>

            <?php if (null !== $this->header): ?>
                <div class="form-header">
                    <?php echo $this->header; ?>
                </div>
            <?php endif; ?>

            <?php if (null !== $formTreatmentMsg):
                $class = (true === $formTreatmentIsSuccess) ? 'success' : 'error';
                ?>
                <div class="top-form-result <?php echo $class; ?>"><?php echo $formTreatmentMsg; ?></div>
            <?php endif; ?>


            <?php if (true === $atLeastOneControlError && 'top' === $this->controlErrorLocation): ?>
                <div class="top-control-errors">
                    <p>
                        <?php echo $this->messages["formHasControlErrors"]; ?>
                    </p>

                    <?php foreach ($this->controls as $name => $c):
                        $errors = $c->getErrorMessages();
                        $n = count($errors);
                        if ($n > 0): ?>
                            <ul>
                                <li><?php echo ucfirst($this->label($name, $c)) . ': ';
                                    if (1 === $n): ?>
                                        <?php echo $errors[0]; ?>
                                    <?php else: ?>
                                        <ul>
                                            <?php foreach ($errors as $err): ?>
                                                <li><?php echo $err; ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php endif; ?>
                                </li>
                            </ul>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>


            <?php if (true === $this->displayForm): ?>
                <form class="form" method="post" action="" id="<?php echo $formId; ?>">
                    <?php


                    $triggers = [];
                    foreach ($this->fieldsets as $label => $controlNames) {
                        foreach ($controlNames as $name) {
                            $triggers[$name] = $label;
                        }
                    }


                    $fieldsetsAndControls = [];
                    $used = [];
                    foreach ($this->controls as $name => $c) {
                        if (array_key_exists($name, $triggers)) {
                            $label = $triggers[$name];
                            $_controls = [];
                            foreach ($this->fieldsets[$label] as $controlName) {
                                $used[] = $controlName;
                                $_controls[$controlName] = $this->controls[$controlName];
                            }
                            $fieldsetsAndControls[$label] = $_controls;

                        } else {
                            if (false === in_array($name, $used, true)) {
                                $fieldsetsAndControls[$name] = $c;
                            }
                        }
                    }


                    foreach ($fieldsetsAndControls as $name => $c) {

                        if (is_array($c)):
                            ?>
                            <fieldset>
                                <legend><?php echo $name; ?></legend>
                                <?php
                                foreach ($c as $cname => $c2) {
                                    $this->displayControlBundle($cname, $c2);
                                }
                                ?>
                            </fieldset>
                            <?php
                        else:
                            $this->displayControlBundle($name, $c);
                        endif;
                    }
                    ?>
                    <input type="hidden" name="_quickform_posted" value="1">


                    <div class="submit">
                        <input class="input-submit autowidth"
                               value="<?php echo htmlspecialchars($this->messages['submit']); ?>" type="submit">
                    </div>

                </form>
            <?php else: ?>
                <p class="error">
                    <?php echo $this->messages['formNotDisplayed']; ?>
                </p>
            <?php endif; ?>
        </section>


        <script>

            var form = document.getElementById('<?php echo $formId; ?>');
            var submitBtn = form.querySelector('.input-submit');
            submitBtn.addEventListener('click', function (e) {

                if (window.onSubmitCallbacks.length > 0) {
                    e.preventDefault();
                    var count = window.onSubmitCallbacks.length;
                    var done = function () {
                        count--;
                        if (0 === count) {
                            form.submit();
                        }
                    };
                    window.onSubmitCallbacks.forEach(function (c) {
                        c(done);
                    });
                }
            });
        </script>
        <?php
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    private function displayControlBundle($name, QuickFormControl $c)
    {
        ?>
        <div class="row">
            <span class="label"><?php echo ucfirst($this->label($name, $c)); ?></span>
            <div class="control">
                <?php $this->displayControl($name, $c); ?>
            </div>
        </div>
        <?php
        if ('local' === $this->controlErrorLocation):
            $errors = $c->getErrorMessages();
            if (count($errors) > 0):
                ?>
                <div class="row error">
                    <span class="label"></span>
                    <div>
                        <?php foreach ($errors as $msg): ?>
                            <p><?php echo $msg; ?></p>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php
            endif;
        endif;
    }

    private function displayControl($name, QuickFormControl $c)
    {
        $wasHandled = false;
        foreach ($this->controlFactories as $f) {
            if (true === $f->displayControl($name, $c)) {
                $wasHandled = true;
                break;
            }
        }
        if (false === $wasHandled) {
            throw new \Exception("Was not able to handle control of type " . $c->getType() . " (name=$name)");
        }
    }


    private function label($name, QuickFormControl $c)
    {
        $label = $c->getLabel();
        if (null !== $label) {
            return $label;
        }
        if (array_key_exists($name, $this->labels)) {
            return $this->labels[$name];
        }
        return $name;
    }
}