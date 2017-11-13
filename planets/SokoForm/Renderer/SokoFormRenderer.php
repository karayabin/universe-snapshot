<?php


namespace SokoForm\Renderer;


use Bat\CaseTool;
use Bat\StringTool;
use SokoForm\Exception\SokoFormException;
use SokoForm\Form\SokoFormInterface;

class SokoFormRenderer
{
    /**
     * @var $form SokoFormInterface
     */
    protected $form;
    protected $formModel;


    private $renderCallbacks;
    /**
     * @var string, see documentation for more details
     *
     * - formLevel
     * - formLevelFirst
     * - controlLevel
     * - controlLevelFirst
     *
     */
    private $errorDisplayMode;

    /**
     * @var callable|object|null: either an object with a render method, or a callable.
     */
    private $notificationsRenderer;
    private $generalPreferences;

    public function __construct()
    {
        $this->form = null;
        $this->formModel = null;
        $this->errorDisplayMode = "controlLevelFirst";
        $this->renderCallbacks = [];
        $this->generalPreferences = [];
        $this->notificationsRenderer = null;
    }

    public static function create()
    {
        return new static();
    }


    public function formAttributes()
    {
        $formModel = $this->getModel();
        echo $formModel['form']['attributeString'];
    }

    /**
     * @param $controlName
     * @param array $preferences , the display preferences.
     *              For instance, if the renderer knows how to do it,
     *              if the control is a list, we could have two preferences:
     *                  - select
     *                  - radio
     * @return void
     * @throws SokoFormException
     */
    public function render($controlName, array $preferences = [])
    {
        $formModel = $this->getModel();
        $controls = $formModel['controls'];

        if (null === $preferences) {
            $preferences = [];
        }
        $preferences = array_replace($this->generalPreferences, $preferences);


        if (array_key_exists($controlName, $controls)) {
            $controlModel = $controls[$controlName];

            $renderIdentifier = $this->getRenderIdentifier($controlModel);
            $camelMethod = CaseTool::toCamel("render " . $renderIdentifier);
            if (method_exists($this, $camelMethod)) {
                $this->$camelMethod($controlModel, $preferences); // shall we pass the form instance too?
            } elseif (array_key_exists($renderIdentifier, $this->renderCallbacks)) {
                call_user_func($this->renderCallbacks[$renderIdentifier], $controlModel, $preferences, $formModel);
            } else {
                throw new SokoFormException("No render method found for identifier $renderIdentifier");
            }
        }
    }

    public function submitKey()
    {
        $formModel = $this->getModel();
        $name = $formModel['form']['name'];
        /**
         * Note that we don't care about the actual value set at the control level,
         * we know what we are doing here...
         */
        echo '<input type="hidden" name="' . $name . '" value="1">';

    }

    public function notifications()
    {
        $formModel = $this->getModel();
        $notifs = $formModel['form']['notifications'];
        foreach ($notifs as $notif) {
            if (true === is_object($this->notificationsRenderer)) {
                if (method_exists($this->notificationsRenderer, "render")) {
                    $this->notificationsRenderer->render($notif);
                }
            } elseif (is_callable($this->notificationsRenderer)) {
                call_user_func($this->notificationsRenderer, $notif);
            }
        }
    }


    public function getControlProperty($controlName, $propertyName, $throwEx = false)
    {
        $formModel = $this->getModel();
        $controls = $formModel['controls'];
        if (array_key_exists($controlName, $controls)) {
            if (array_key_exists($propertyName, $controls[$controlName])) {
                return $controls[$controlName][$propertyName];
            }
        }
        if (true === $throwEx) {
            throw new SokoFormException("Property $propertyName not found in control $controlName");
        }
    }


    public function setGeneralPreferences(array $preferences)
    {
        $this->generalPreferences = $preferences;
        return $this;
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    public function setForm(SokoFormInterface $form)
    {
        $this->form = $form;
        return $this;
    }

    public function setRenderCallback($renderIdentifier, callable $callback)
    {
        $this->renderCallbacks[$renderIdentifier] = $callback;
        return $this;
    }

    public function setErrorDisplayMode($errorDisplayMode)
    {
        $this->errorDisplayMode = $errorDisplayMode;
        return $this;
    }

    public function setNotificationRenderer($notificationRenderer)
    {
        $this->notificationsRenderer = $notificationRenderer;
        return $this;
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * @param array $controlModel , see the documentation for more info (model structure section)
     *
     * @return string|null, the renderIdentifier, which is an identifier
     *              used to know which method to call to render the control.
     *              If null, means no render type was found.
     *                  It allows us to chain this method with a custom one,
     *                  if we were using custom controls.
     */
    protected function getRenderIdentifier(array $controlModel)
    {
        /**
         * This is the default algorithm that maps a control to
         * a renderer method name.
         * Feel free to override this method as you wish.
         */

        $ret = null;
        $className = $controlModel['class'];
        switch ($className) {
            case "SokoInputControl":
                $type = $controlModel['type'];
                $ret = "input-$type";
                break;
            case "SokoChoiceControl":
                $type = $controlModel['type'];
                $ret = "choice-$type";
                break;
            case "SokoFileControl":
                $type = $controlModel['type'];
                $ret = "file-$type";
                break;
            default:
                break;
        }

        return $ret;

    }


    protected function formatTopErrorMessages(array $formErrors, array $controlModel)
    {
        /**
         * The idea here is to prefix the error messages with the control label
         */
        $label = $controlModel['label'];
        if (null !== $label) {
            $ret = [];
            foreach ($formErrors as $formError) {
                $ret[] = $label . ": " . $formError;
            }
            return $ret;
        }

        // no label? no update
        return $formErrors;
    }


    /**
     * Errors are critical.
     * Concrete renderers should call this method if the error
     * is caused by the developer's blunder.
     *
     * @param $errorMsg
     * @throws SokoFormException
     */
    protected function error($errorMsg)
    {
        throw new SokoFormException($errorMsg);
    }

    /**
     * Ease access to a specific preference key
     */
    protected function getPreference($name, array $preferences = [], $default = null)
    {
        return (array_key_exists($name, $preferences)) ? $preferences[$name] : $default;
    }

    protected function getHtmlAtributesAsString(array $preferences)
    {
        if (array_key_exists("attributes", $preferences)) {
            return StringTool::htmlAttributes($preferences['attributes']);
        }
        return "";
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Recommendation:
     * Call this method AFTER this instance is configured,
     * and BEFORE it displays something.
     *
     *
     * @return array|null
     * @throws SokoFormException
     */
    private function getModel()
    {
        if (null === $this->formModel) {
            if (null !== $this->form) {

                $model = $this->form->getModel();
                //--------------------------------------------
                // SHAPE THE MODEL ACCORDING TO THE CONFIGURATION
                //--------------------------------------------
                /**
                 * Taking care of errors
                 * - formLevel
                 * - formLevelFirst
                 * - controlLevel
                 * - controlLevelFirst
                 */

                $controls = $model['controls'];
                if (in_array($this->errorDisplayMode, ['formLevel', 'formLevelFirst'])) {
                    $formErrors = [];
                    $firstOnly = ('formLevelFirst' === $this->errorDisplayMode);
                    /**
                     * the intent is to display errors at the form level,
                     * we extract them from the controls and put them in the errors array
                     */
                    foreach ($controls as $k => $controlModel) {
                        if ($controlModel['errors']) {
                            if ($firstOnly) {
                                // adding the first error only
                                $controlErrors = [array_shift($controlModel['errors'])];
                            } else {
                                // adding all errors
                                $controlErrors = $controlModel['errors'];
                            }

                            // prepare the control errors for the form (prefix with the label)
                            $controlErrors = $this->formatTopErrorMessages($controlErrors, $controlModel);

                            // adding formatted errors to the form stack
                            $formErrors = array_merge($formErrors, $controlErrors);

                            // now remove the errors from the controls
                            $model['controls'][$k]['errors'] = [];
                        }
                    }

                    // add them to the form
                    $model['form']['errors'] = $formErrors;

                } else {
                    $firstOnly = ('controlLevelFirst' === $this->errorDisplayMode);
                    if (true === $firstOnly) {
                        foreach ($controls as $k => $controlModel) {
                            if ($controlModel['errors']) {
                                $controlErrors = [array_shift($controlModel['errors'])];
                            } else {
                                $controlErrors = [];
                            }
                            $model['controls'][$k]['errors'] = $controlErrors;
                        }
                    }
                }


                $this->formModel = $model;


            } else {
                throw new SokoFormException("The form was not set");
            }
        }
        return $this->formModel;
    }
}