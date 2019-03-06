<?php


namespace Ling\SokoForm\Form;


use Ling\Bat\ClassTool;
use Ling\Bat\StringTool;
use Ling\SokoForm\Control\SokoControlInterface;
use Ling\SokoForm\Control\SokoFileControl;
use Ling\SokoForm\Control\SokoInputControl;
use Ling\SokoForm\Exception\SokoFormException;
use Ling\SokoForm\ValidationRule\SokoValidationRuleInterface;

class SokoForm implements SokoFormInterface
{
    private $name; // the name of the form
    private $method;
    private $action;
    private $enctype;
    private $id;
    private $class;
    private $controls;
    private $validationRules;
    private $notifications;

    private $formLevelErrors; // not used for now, I use error notifications for now

    /**
     *
     * The two properties below:
     *
     * - validationRulesLang, string|null, default=eng
     * - validationRulesTranslator, callable|null, default=null
     *
     * define how this soko form translates the validation rules error messages.
     *
     * If both are null, no translation will be used (and the default error messages are in plain english).
     * If the validationRulesTranslator is set, it has precedence over the validationRulesLang property.
     * If the validationRulesTranslator is set, it's a callback responsible for translating the error message
     *      it receives as its first argument.
     *      The second argument is an array of possible tags to use to translate the message.
     *
     *          Here is the signature:
     *          string:translatedErrorMessage  translatorFn ( string:errorMessage, array:tags )
     *
     * If the validationRulesTranslator is null and the validationRules is a string,
     * then this soko form will use its internal soko validation rule translation system.
     * If validationRulesLang is a string, the string represents the ISO 639-2 code (3 letters code)
     *          of the lang to use for the validation rules error messages.
     *
     * Note: if your lang is missing, please consider to the translation and send them me to me,
     * so that soko can help people of your country too.
     *
     *
     *
     *
     * @var null|string, (default=eng)
     */
    private $validationRulesLang;
    /**
     * @var null|callback
     */
    private $validationRulesTranslator;

    /**
     * @var bool, when this flag becomes true, it means that:
     * - an extra control with the form name as its name has been
     *   added to the existing controls.
     *  This extra control is how soko form knows whether or not the form
     *  is submitted.
     */
    private $prepared;
    private $model;
    private $groups;

    public function __construct()
    {
        $this->name = "sokoform";
        $this->method = "post";
        $this->action = "";
        $this->id = null;
        $this->class = [];
        $this->enctype = null;
        $this->controls = [];
        $this->formLevelErrors = [];
        $this->notifications = [];
        $this->validationRules = [];
        $this->prepared = false;
        $this->model = null;
        $this->groups = [];
        $this->init();
    }

    public static function create()
    {
        return new static();
    }

    public function getName()
    {
        return $this->name;
    }


    public function getMethod()
    {
        return $this->method;
    }

    public function getAction()
    {
        return $this->action;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getClass()
    {
        $class = $this->class;
        if (is_array($class)) {
            $class = implode(" ", $class);
        }
        return $class;
    }


    public function getEnctype()
    {
        return $this->enctype;
    }

    public function getAttributes()
    {
        $attr = [
            'method' => $this->method,
            'action' => $this->action,
        ];

        if (null !== $this->id) {
            $attr['id'] = $this->id;
        }

        if (null !== $this->class && $this->class) {
            $class = $this->class;
            if (!is_array($class)) { // backward compatibility
                $class = [$class];
            }
            $attr['class'] = implode(" ", $class);
        }

        if (null !== $this->enctype) {
            $attr['enctype'] = $this->enctype;
        }
        return $attr;
    }

    public function setGroups(array $groups)
    {
        $this->groups = $groups;
        return $this;
    }

    public function getGroups()
    {
        return $this->groups;
    }

    public function getFormAttributesAsString()
    {
        return StringTool::htmlAttributes($this->getAttributes());
    }

    /**
     * @param SokoControlInterface $control , a fully configured
     *                          control (i.e. at least name set)
     * @return $this
     */
    public function addControl(SokoControlInterface $control)
    {
        /**
         * Note: this only works if the name of the control is not set after the
         * call to addControl... should be the case in most situations but be aware
         * that this might fail in the future maybe.
         *
         * Or we could just say that this method accepts only fully configured controls
         * (and actually I just did).
         */
        $this->controls[$control->getName()] = $control;

        /**
         * automatically add the enctype if the form contains a regular file control
         */
        if ($control instanceof SokoFileControl) {
            $type = $control->getType();
            if ('static' === $type) {
                $this->setEnctype("multipart/form-data");
            }
        }

        return $this;
    }


    public function getControl($controlName, $throwEx = true, $default = null)
    {
        $this->prepare();
        if (array_key_exists($controlName, $this->controls)) {
            return $this->controls[$controlName];
        }
        if (true === $throwEx) {
            throw new SokoFormException("The control $controlName does not exist");
        }
        return $default;
    }

    public function getControls()
    {
        $this->prepare();
        return $this->controls;
    }


    public function inject(array $context = [])
    {
        foreach ($this->controls as $name => $control) {
            if (array_key_exists($name, $context)) {
                $control->setValue($context[$name]);
            }
        }
    }

    public function addError(string $errorMessage)
    {
        $this->addNotification($errorMessage, "error");
        return $this;
    }


    /**
     * @param callable $onSuccess
     *                      fn ( array $context, SokoFormInterface $form )
     *
     * @param array|null $context
     * @return mixed (bool|null)
     */
    public function process(callable $onSuccess, array $context = null)
    {
        $this->prepare();

        //--------------------------------------------
        // PREPARE THE CONTEXT
        //--------------------------------------------
        if (null === $context) {
            $context = [];
            if ('post' === $this->method) {
                $context = $_POST;
                /**
                 * Reminder: The enctype attribute can be used only if method="post".
                 * Source: https://www.w3schools.com/tags/att_form_enctype.asp
                 */
                if ('multipart/form-data' === $this->enctype) {
                    $context = array_replace($context, $_FILES);
                }
            } else {
                $context = $_GET;
            }
        }
        //--------------------------------------------
        // CHECKING WHETHER OR NOT THE FORM IS SUBMITTED
        //--------------------------------------------
        if (array_key_exists($this->name, $context)) { // now the form is posted


            /**
             * Note: I'm not sure whether the context should be filtered,
             * but I believe this is not a bad idea
             */
            $filteredContext = [];

            //--------------------------------------------
            // USING VALIDATION RULES TO VALIDATE THE FORM
            //--------------------------------------------
            $formIsValid = true;
            foreach ($this->controls as $name => $control) {

                /**
                 * @var $control SokoControlInterface
                 */
                if (array_key_exists($name, $this->validationRules)) {
                    $validationRules = $this->validationRules[$name];
                    foreach ($validationRules as $validationRule) {
                        /**
                         * @var $validationRule SokoValidationRuleInterface
                         */
                        $validationFn = $validationRule->getValidationFunction();
                        $preferences = $validationRule->getPreferences();
                        if (array_key_exists($name, $context)) {
                            $value = $context[$name];
                        } else {
                            /**
                             * It's important to set non posted value to null
                             * because validation rules rely on this convention.
                             */
                            $value = null;
                        }
                        $error = "";


                        $valueIsValid = call_user_func_array($validationFn, [
                            $value,
                            &$preferences,
                            &$error,
                            $this,
                            $control,
                            $context,
                        ]);


                        // in case of failure, we translate the error message(s) and
                        // attach them to the control so that they are available to the view
                        if (false === $valueIsValid) {

                            /**
                             * tags are like preferences, except that they can only hold scalar values (i.e. not arrays).
                             * Let's filter the non scalar preferences now...
                             */
                            $tags = array_filter($preferences, function ($v) {
                                return is_scalar($v);
                            });

                            $error = $this->translateError($error, $tags);
                            $control->addError($error);
                            $formIsValid = false;
                        }

                    }
                }

                if (array_key_exists($name, $context)) {
                    $filteredContext[$name] = $context[$name];

                    //--------------------------------------------
                    // INJECTING NEW VALUES IN THE CONTROLS (data persistency)
                    //--------------------------------------------
                    $control->setValue($context[$name]);
                } else {
                    $filteredContext[$name] = null;
                    $control->setValue(null);
                }


                //--------------------------------------------
                // THEN WE ASK THE CONTROL THE VALUE AGAIN
                // that's because the control could prepare it if it wanted to.
                // for instance for checkboxes, the control might want to
                // convert the value to a boolean, or an int, ...
                //--------------------------------------------
                $filteredContext[$name] = $control->getValue();
            }


            //--------------------------------------------
            // NOW THE FORM IS SUBMITTED AND VALID,
            // WE CAN JUST CALL THE SUCCESS CALLBACK
            //--------------------------------------------
            if (true === $formIsValid) {
                $res = call_user_func($onSuccess, $filteredContext, $this);
                if (false === $res) {
                    $formIsValid = false;
                }
            }


            return $formIsValid;
        }
        return null;
    }


    public function addValidationRule($controlName, SokoValidationRuleInterface $validationRule)
    {
        $this->validationRules[$controlName][] = $validationRule;
        return $this;
    }


    public function addNotification($message, $type, $title = null)
    {
        $this->notifications[] = [
            'title' => $title,
            'type' => $type,
            'msg' => $message,
        ];
        return $this;
    }

    public function countNotifications()
    {
        return count($this->notifications);
    }


    public function getModel()
    {
        $this->prepare();
        if (null === $this->model) {


            //--------------------------------------------
            // NOW PREPARING CONTROL PARTS
            //--------------------------------------------
            $controls = [];

            /**
             * We collect form errors using this technique, because it's very probable
             * that an user calls the getControl()->addError() method inside the process method's callback,
             * and so we have to parse controls individually to get all form errors...
             */
            $formErrors = [];
            foreach ($this->controls as $name => $control) {
                /**
                 * @var $control SokoControlInterface
                 */
                $controls[$name] = $control->getModel();
                $controls[$name]['class'] = ClassTool::getShortName($control);
//                $controls[$name]['control'] = $control;

                $controlErrors = $control->getErrors();
                if ($controlErrors) {
                    $formErrors[$name] = $control->getErrors();
                }
            }


            $this->model = [
                'form' => [
                    'name' => $this->name,
                    'method' => $this->method,
                    'action' => $this->action,
                    'enctype' => $this->enctype,
                    'id' => $this->id,
                    'class' => $this->class,
                    'attributeString' => $this->getFormAttributesAsString(),
                    'attributes' => $this->getAttributes(),
                    'errors' => $formErrors,
                    'notifications' => $this->notifications,
                ],
                'controls' => $controls,
                'validationRules' => $this->validationRules,
            ];
        }

        return $this->model;
    }



    //--------------------------------------------
    //
    //--------------------------------------------

    public function setMethod($method)
    {
        $this->method = $method;
        return $this;
    }

    public function setAction($action)
    {
        $this->action = $action;
        return $this;
    }

    public function setEnctype($enctype)
    {
        $this->enctype = $enctype;
        return $this;
    }


    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function setId(string $id)
    {
        $this->id = $id;
        return $this;
    }

    public function setClass($class)
    {
        if (!is_array($class)) {
            $class = [$class];
        }
        $this->class = $class;
        return $this;
    }


    public function addClass(string $class)
    {
        $this->class[] = $class;
        return $this;
    }

    public function setValidationRulesLang($validationRulesLang)
    {
        $this->validationRulesLang = $validationRulesLang;
        return $this;
    }

    public function setValidationRulesTranslator(callable $validationRulesTranslator)
    {
        $this->validationRulesTranslator = $validationRulesTranslator;
        return $this;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    protected function onTranslationFileNotFound($lang) // override me
    {

    }

    protected function init()
    {

    }

    //--------------------------------------------
    //
    //--------------------------------------------
    private function prepare()
    {
        if (false === $this->prepared) {
            $this->prepared = true;
            $this->addControl(SokoInputControl::create()
                ->setName($this->name)
                ->setType("hidden")
                ->setValue(1)
            );
        }
    }

    private function translateError($error, array $tags)
    {
        if (null !== $this->validationRulesTranslator) {
            return call_user_func($this->validationRulesTranslator, $error, $tags);
        } elseif (null !== $this->validationRulesLang) {
            $file = __DIR__ . "/../assets/validation-rules-lang/" . $this->validationRulesLang . ".php";
            if (file_exists($file)) {
                $translations = [];
                include $file;
                if (array_key_exists($error, $translations)) {
                    $translation = $translations[$error];
                } else {
//                    $this->onTranslationFileNotFound($this->validationRulesLang);
                    /**
                     * In this case, the developer probably provides its own error message directly with the setErrorMessage
                     * of the SokoValidationRule object.
                     */
                    $translation = $error;
                }
            } else {
                /**
                 * In this case, the developer provides its own error message directly with the setErrorMessage
                 * of the SokoValidationRule object.
                 */
                $translation = $error;
            }
        } else {
            $translation = $error;
        }
        $keys = array_keys($tags);
        $values = array_values($tags);
        $keys = array_map(function ($v) {
            return "{" . $v . "}";
        }, $keys);
        return str_replace($keys, $values, $translation);


    }

}