<?php


namespace Ling\Light_Realform\Handler;


use Ling\BabyYaml\BabyYamlUtil;
use Ling\Bat\ArrayTool;
use Ling\Bat\DebugTool;
use Ling\Bat\FileSystemTool;
use Ling\Bat\SmartCodeTool;
use Ling\Chloroform\DataTransformer\DataTransformerInterface;
use Ling\Chloroform\Field\CSRFField;
use Ling\Chloroform\Field\DecorativeField;
use Ling\Chloroform\Field\FieldInterface;
use Ling\Chloroform\Field\PasswordField;
use Ling\Chloroform\Form\Chloroform;
use Ling\Chloroform\Validator\CSRFValidator;
use Ling\Chloroform\Validator\FileMimeTypeValidator;
use Ling\Chloroform\Validator\PasswordConfirmValidator;
use Ling\Chloroform\Validator\PasswordValidator;
use Ling\Chloroform\Validator\ValidatorInterface;
use Ling\Light\ServiceContainer\LightServiceContainerAwareInterface;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_ChloroformExtension\Field\TableListField;
use Ling\Light_Realform\Exception\LightRealformException;
use Ling\Light_Realform\Service\LightRealformHandlerAliasHelperService;
use Ling\Light_Realform\Service\LightRealformService;
use Ling\Light_Realform\SuccessHandler\RealformSuccessHandlerInterface;
use Ling\Light_Realform\SuccessHandler\ToDatabaseSuccessHandler;

/**
 * The BaseRealformHandler class.
 * A helper to implement a realform handler, using my organization techniques.
 */
abstract class BaseRealformHandler implements RealformHandlerInterface, LightServiceContainerAwareInterface
{

    /**
     * This property holds the confDir for this instance.
     * @var string
     */
    protected $confDir;

    /**
     * This property holds the confCache for this instance.
     * It's an array of id => configuration array
     * @var array
     */
    protected $confCache;

    /**
     * This property holds the realform id for this instance.
     * @var string
     */
    protected $id;

    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected $container;


    /**
     * Builds the BaseRealformHandler instance.
     */
    public function __construct()
    {
        $this->confDir = null;
        $this->id = null;
        $this->confCache = [];
        $this->container = null;
    }


    /**
     * @implementation
     */
    public function setContainer(LightServiceContainerInterface $container)
    {
        $this->container = $container;
    }


    /**
     * @implementation
     */
    public function setId(string $id)
    {
        $this->id = $id;
    }


    /**
     * @implementation
     */
    public function getFormHandler(array $configuration = null): Chloroform
    {
        if (null === $configuration) {
            $conf = $this->getConfiguration();
        } else {
            $conf = $configuration;
        }



        $formHandlerConf = $conf['form_handler'] ?? [];


        //--------------------------------------------
        // DYNAMIC INJECTION PHASE
        //--------------------------------------------
        /**
         * @var $realformService LightRealformService
         */
        $realformService = $this->container->get("realform");
        SmartCodeTool::replaceSmartCodeFunction($formHandlerConf, "REALFORM", function ($identifier) use ($realformService) {
            $handler = $realformService->getDynamicInjectionHandler($identifier);
            $args = func_get_args();
            array_shift($args);
            return $handler->handle($args);
        });

        //--------------------------------------------
        //
        //--------------------------------------------
        if (array_key_exists('class', $formHandlerConf)) {
            $formHandler = new $formHandlerConf['class'];
        } else {
            $formHandler = $this->getDefaultFormHandler();
        }


        if (array_key_exists("id", $formHandlerConf)) {
            $formHandler->setFormId($formHandlerConf['id']);
        }

        if (array_key_exists("fields", $formHandlerConf)) {
            $fields = $formHandlerConf['fields'];
            foreach ($fields as $identifier => $fieldConf) {

                // preparing the properties array of the field (see AbstractField constructor for more details)
                $type = $fieldConf['type'];
                unset($fieldConf['type']);

                $field = $this->getChloroformField($formHandler, $type, $identifier, $fieldConf);

                $validators = [];
                if (array_key_exists("validators", $fieldConf)) {
                    foreach ($fieldConf['validators'] as $validatorType => $validatorConf) {
                        $validators[] = $this->getChloroformValidator($validatorType, $validatorConf);
                    }
                }
                $formHandler->addField($field, $validators);


                if (array_key_exists('dataTransformer', $fieldConf)) {
                    $dataTransformerValue = $fieldConf['dataTransformer'];
                    $field->setDataTransformer($this->getDataTransformer($dataTransformerValue));
                }


            }
        }
        return $formHandler;
    }

    /**
     * @implementation
     */
    public function getConfiguration(): array
    {
        $id = $this->id;
        if (array_key_exists($id, $this->confCache)) {
            return $this->confCache[$id];
        }
        $file = $this->confDir . "/" . $id . ".byml";
        if (true === FileSystemTool::isDirectoryTraversalSafe($file, $this->confDir)) {
            $this->confCache[$id] = BabyYamlUtil::readFile($file);
            return $this->confCache[$id];
        } else {
            throw new LightRealformException("Incorrect file path: $file.");
        }

    }

    /**
     * @implementation
     */
    public function getSuccessHandler(): RealformSuccessHandlerInterface
    {
        $conf = $this->getConfiguration();
        $successHandlerConf = $conf['on_success_handler'] ?? [];

        $params = $successHandlerConf['params'] ?? [];

        if (array_key_exists('type', $successHandlerConf)) {
            $type = $successHandlerConf['type'];
            switch ($type) {
                case "database":
                    ArrayTool::arrayKeyExistAll("table", $params, true);


                    $o = new ToDatabaseSuccessHandler();
                    $o->setContainer($this->container);
                    $o->setTable($params['table']);
                    if (array_key_exists("pluginName", $params)) {
                        $o->setPluginName($params['pluginName']);
                    }
                    if (array_key_exists("multiplier", $params)) {
                        $o->setMultiplier($params['multiplier']);
                    }
                    return $o;
                    break;
                default:
                    $this->error("Not implemented yet: type $type.");
                    break;
            }


        } else {
            throw new LightRealformException("Missing parameter on_success_handler.type.");
        }
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Sets the confDir.
     *
     * @param string $confDir
     */
    public function setConfDir(string $confDir)
    {
        $this->confDir = $confDir;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Returns a default chloroform instance.
     * @return Chloroform
     */
    protected function getDefaultFormHandler(): Chloroform
    {
        return new Chloroform();
    }


    /**
     * Returns a chloroform field.
     * Note: fields from the @page(Light_ChloroformExtension plugin) also work.
     *
     * @param Chloroform $form
     * @param string $type
     * @param string $fieldId
     * @param array $fieldConf
     * @return FieldInterface
     * @throws \Exception
     */
    protected function getChloroformField(Chloroform $form, string $type, string $fieldId, array $fieldConf = []): FieldInterface
    {
        $fieldConf['id'] = $fieldId;


        switch ($type) {
            case "ajaxFileBox":
            case "color":
            case "date":
            case "datetime":
            case "file":
            case "hidden":
            case "number":
            case "string":
            case "text":
            case "time":
                $class = "Ling\Chloroform\Field\\" . ucfirst($type) . "Field";
                $field = new $class($fieldConf);
                break;
            case "checkbox":
            case "radio":
            case "select":
                $class = "Ling\Chloroform\Field\\" . ucfirst($type) . "Field";
                $field = new $class($fieldConf);
                if (array_key_exists("items", $fieldConf)) {
                    $field->setItems($fieldConf['items']);
                }
                break;
            case "csrf":
                $field = new CSRFField($fieldConf);
                if (array_key_exists("csrfIdentifier", $fieldConf)) {
                    $field->setCsrfIdentifier($fieldConf['csrfIdentifier']);
                }
                if (array_key_exists("csrfProtector", $fieldConf)) {
                    $field->setCsrfProtector(new $fieldConf['csrfProtector']);
                }
                break;
            case "password":
                $field = new PasswordField($fieldConf);
                $field->setForm($form);
                break;
            case "decorative":
                $field = new DecorativeField($fieldConf);
                break;
            case "table_list":
                $field = new TableListField($fieldConf);
                $field->setContainer($this->container);
                break;
            default:
                throw new LightRealformException("Unknown field type \"$type\" with id $fieldId.");
                break;
        }


        return $field;
    }


    /**
     * Returns a validator instance.
     *
     * @param string $type
     * @param array $validatorConf
     * @return ValidatorInterface
     * @throws \Exception
     */
    protected function getChloroformValidator(string $type, array $validatorConf): ValidatorInterface
    {
        switch ($type) {
            case "csrf":
                $validator = new CSRFValidator();
                if (array_key_exists("csrfProtector", $validatorConf)) {
                    $validator->setCsrfProtector(new $validatorConf['csrfProtector']);
                }
                break;
            case "fileMimeType":
                $validator = new FileMimeTypeValidator();
                if (array_key_exists("allowedMimeTypes", $validatorConf)) {
                    $validator->setMimeTypes($validatorConf['allowedMimeTypes']);
                }
                break;
            case "minMaxChar":
            case "minMaxDate":
            case "minMaxFileSize":
            case "minMaxItem":
            case "minMaxNumber":
                $class = "Ling\Chloroform\Validator\\" . ucfirst($type) . "Validator";
                $validator = new $class();
                if (array_key_exists("min", $validatorConf)) {
                    $validator->setMin($validatorConf['min']);
                }
                if (array_key_exists("max", $validatorConf)) {
                    $validator->setMax($validatorConf['max']);
                }
                break;
            case "passwordConfirm":
                $validator = new PasswordConfirmValidator();
                if (array_key_exists("otherFieldId", $validatorConf)) {
                    $validator->setOtherFieldId($validatorConf['otherFieldId']);
                }
                break;
            case "password":
                $validator = new PasswordValidator();
                if (array_key_exists("nbAlpha", $validatorConf)) {
                    $validator->setNbAlpha($validatorConf['nbAlpha']);
                }
                if (array_key_exists("nbAlphaLower", $validatorConf)) {
                    $validator->setNbAlphaLower($validatorConf['nbAlphaLower']);
                }
                if (array_key_exists("nbAlphaUpper", $validatorConf)) {
                    $validator->setNbAlphaUpper($validatorConf['nbAlphaUpper']);
                }
                if (array_key_exists("nbDigits", $validatorConf)) {
                    $validator->setNbDigits($validatorConf['nbDigits']);
                }
                if (array_key_exists("nbSpecial", $validatorConf)) {
                    $validator->setNbSpecial($validatorConf['nbSpecial']);
                }
                break;
            case "requiredDate":
            case "required":
                $class = "Ling\Chloroform\Validator\\" . ucfirst($type) . "Validator";
                $validator = new $class();
                break;
            default:


                /**
                 * @var $aliasHelper LightRealformHandlerAliasHelperService
                 */
                $aliasHelper = $this->container->get("realform_handler_alias_helper");
                $val = $aliasHelper->getChloroformValidator($type, $validatorConf);

                if (null !== $val) {
                    $validator = $val;
                } else {
                    throw new LightRealformException("Unknown validator class with type/id $type.");
                }
                break;
        }


        if (array_key_exists("errorMessage", $validatorConf)) {
            $errMsg = $validatorConf['errorMessage'];
            $msgIdentifier = null;
            if (is_array($errMsg)) {
                list($errMsg, $msgIdentifier) = $errMsg;
            }
            $validator->setErrorMessage($errMsg, $msgIdentifier);
        }

        return $validator;
    }


    /**
     * Returns a dataTransformer instance.
     *
     * @param $value
     * @return DataTransformerInterface
     * @throws \Exception
     */
    protected function getDataTransformer($value): DataTransformerInterface
    {
        $transformer = null;
        if (is_string($value)) {
            /**
             * @var $aliasHelper LightRealformHandlerAliasHelperService
             */
            $aliasHelper = $this->container->get("realform_handler_alias_helper");
            $params = [];
            $trans = $aliasHelper->getDataTransformer($value, $params);
            if (null !== $trans) {
                $transformer = $trans;
            }
        } else {
            $this->error("Not handled yet with a non string value.");
        }


        if (null !== $transformer) {
            return $transformer;
        } else {
            $sVal = DebugTool::toString($value);
            throw new LightRealformException("Cannot find the dataTransformer with the value $sVal.");
        }
    }


    /**
     * Throws an exception with the given message.
     *
     * @param string $msg
     * @throws \Exception
     */
    protected function error(string $msg)
    {
        throw new LightRealformException($msg);
    }


}