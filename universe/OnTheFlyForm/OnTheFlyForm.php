<?php


namespace OnTheFlyForm;


use OnTheFlyForm\DataAdaptor\DataAdaptorInterface;
use OnTheFlyForm\Helper\OnTheFlyFormHelper;
use OnTheFlyForm\Validator\ValidatorInterface;

class OnTheFlyForm implements OnTheFlyFormInterface
{

    private $ids;
    private $options;
    private $notHtmlSpecialChars;
    private $validationRules;
    private $key;
    private $injectedData;
    private $model;
    // form level
    private $action;
    private $method;
    private $errorMessage;
    private $successMessage;
    private $isSuccess;
    private $validationOk;
    //
    private $radioItems;
    private $singleCheckboxes;
    /**
     * @var array of id => value
     */
    private $immutableValues; // those won't change
    private $constants; // those won't change, and won't be prefixed
    /**
     * @var ValidatorInterface
     */
    private $formValidator;

    /**
     * @var DataAdaptorInterface|null
     */
    private $inputDataAdaptor;

    /**
     * @var DataAdaptorInterface|null
     */
    private $outputDataAdaptor;
    private $labels;
    private $files;
    /**
     * @var array of groupName => ids of element in the group.
     * Note: only the view will know how to represent groups (fieldsets, div, ...)
     */
    private $groups;

    public function __construct()
    {
        $this->ids = [];
        $this->options = [];
        $this->notHtmlSpecialChars = [];
        $this->successMessage = "Congratulations!";
        $this->validationRules = [];
        $this->injectedData = [];
        $this->key = 'ontheflyform_default_key';
        $this->action = '';
        $this->method = 'post'; // post|get
        $this->model = null;
        $this->errorMessage = "";
        $this->successMessage = "";
        $this->isSuccess = true;
        $this->validationOk = true;
        //
        $this->radioItems = [];
        $this->singleCheckboxes = [];
        $this->labels = [];
        $this->immutableValues = [];
        $this->files = [];
        $this->constants = [];
        $this->groups = [];
    }


    public static function create(array $ids, $key = null)
    {
        $o = new static();
        $o->setIds($ids);
        $o->setKey($key);
        return $o;
    }


    //--------------------------------------------
    // SETTERS
    //--------------------------------------------
    public function setOptions($id, array $options)
    {
        $this->options[$id] = $options;
        return $this;
    }


    public function setRadioItems($id, array $radioItems)
    {
        $this->radioItems[$id] = $radioItems;
        return $this;
    }

    public function setNotHtmlSpecialChars(array $notHtmlSpecialCharsIds)
    {
        $this->notHtmlSpecialChars = $notHtmlSpecialCharsIds;
        return $this;
    }

    public function setSuccessMessage($successMessage)
    {
        $this->successMessage = $successMessage;
        return $this;
    }

    public function setValidationRules(array $validationRules)
    {
        $this->validationRules = $validationRules;
        return $this;
    }

    public function setErrorMessage($errorMessage)
    {
        $this->errorMessage = $errorMessage;
        $this->isSuccess = false;
        return $this;
    }

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

    public function setIds(array $ids)
    {
        $this->ids = $ids;
        return $this;
    }

    public function setKey($key)
    {
        $this->key = $key;
        return $this;
    }

    public function setInputDataAdaptor(DataAdaptorInterface $inputDataAdaptor)
    {
        $this->inputDataAdaptor = $inputDataAdaptor;
        return $this;
    }

    public function setOutputDataAdaptor(DataAdaptorInterface $outputDataAdaptor)
    {
        $this->outputDataAdaptor = $outputDataAdaptor;
        return $this;
    }


    public function setSingleCheckboxes(array $singleCheckboxes)
    {
        $this->singleCheckboxes = $singleCheckboxes;
        return $this;
    }

    public function setLabels(array $labels)
    {
        $this->labels = $labels;
        return $this;
    }


    public function setImmutableValues(array $immutableValues)
    {
        $this->immutableValues = $immutableValues;
        return $this;
    }

    public function setConstants(array $constants)
    {
        $this->constants = $constants;
        return $this;
    }

    /**
     * @param array $files ,
     *              - array of identifier
     *              or
     *              - array of identifier => [accept => $acceptString]
     *                  - $acceptString, same as html accept attribute's content
     *
     * @return $this
     */
    public function setFiles(array $files)
    {
        $this->files = $files;
        return $this;
    }

    public function addGroup($name, array $group)
    {
        $this->groups[$name] = $group;
        return $this;
    }


    //--------------------------------------------
    // FUNCTIONAL
    //--------------------------------------------
    public function isPosted()
    {
        $arr = ('post' === $this->method) ? $_POST : $_GET;
        return array_key_exists($this->key, $arr);
    }

    public function inject(array $data, $useAdaptor = false)
    {
        if (true === $useAdaptor && null !== $this->inputDataAdaptor) {
            $data = $this->inputDataAdaptor->transform($data);
        }


        // ensure immutable values don't change
        if ($this->immutableValues) {
            $data = array_replace($data, $this->immutableValues);
        }


        $this->injectedData = $data;
        return $this;
    }

    public function validate()
    {
        $this->prepareModel();
        $validator = $this->getValidator();
        if (true === $validator->validate($this->validationRules, $this->model)) {
            return true;
        }
        $this->validationOk = false;
        $this->isSuccess = false;
        return false;
    }

    public function getModel()
    {
        $this->prepareModel();
        $this->model['formMethod'] = $this->method;
        $this->model['formAction'] = $this->action;
        $this->model['groups'] = $this->groups;

        $this->model['errorMessage'] = $this->errorMessage;
        if (true === $this->isSuccess) {
            $this->model['isSuccess'] = true;
            $this->model['successMessage'] = $this->successMessage;
        } else {
            $this->model['successMessage'] = "";
            $this->model['isSuccess'] = false;
        }

        $this->model['isPosted'] = $this->isPosted();


        $this->model['validationOk'] = $this->validationOk;


        return $this->model;
    }


    public function getData()
    {
        $data = $this->injectedData;
        if (null !== $this->outputDataAdaptor) {
            $data = $this->outputDataAdaptor->transform($data);
        }
        return $data;
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    protected function getValidator()
    {
        if (null === $this->formValidator) {
            $this->formValidator = new \OnTheFlyForm\Validator\OnTheFlyFormValidator();
        }
        return $this->formValidator;
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    private function prepareModel()
    {
        /**
         * The model needs to be prepared before the validation is executed,
         * or before the model is returned.
         */
        if (null === $this->model) {
            $model = [];

            //--------------------------------------------
            // CONTROL LEVEL
            //--------------------------------------------
            foreach ($this->ids as $id) {


                if (!in_array($id, $this->files) && !array_key_exists($id, $this->files)) {
                    $value = (array_key_exists($id, $this->injectedData)) ? $this->injectedData[$id] : '';
                    if (!in_array($id, $this->notHtmlSpecialChars)) {
                        $value = htmlspecialchars($value);
                    }
                } else {
                    $value = (array_key_exists($id, $this->injectedData)) ? $this->injectedData[$id] : null;
                }


                $pascal = OnTheFlyFormHelper::idToSuffix($id);
                $model['name' . $pascal] = $id;
                $model['value' . $pascal] = $value;
                $model['error' . $pascal] = "";

                if (array_key_exists($id, $this->labels)) {
                    $model['label' . $pascal] = $this->labels[$id];
                }


                if (in_array($id, $this->files) || array_key_exists($id, $this->files)) {
                    $accept = "";
                    if (
                        array_key_exists($id, $this->files) &&
                        is_array($this->files[$id]) &&
                        array_key_exists('accept', $this->files[$id])
                    ) {
                        $accept = $this->files[$id]['accept'];
                    }
                    $model['accept' . $pascal] = $accept;
                }


            }

            foreach ($this->options as $id => $options) {
                $pascal = OnTheFlyFormHelper::idToSuffix($id);
                $model['options' . $pascal] = $options;
            }


            foreach ($this->radioItems as $id => $items) {
                $pascal = OnTheFlyFormHelper::idToSuffix($id);
                foreach ($items as $item) {
                    $checkedPascal = OnTheFlyFormHelper::idToSuffix($item);
                    $model['value' . $pascal . '__' . $checkedPascal] = $item;
                    $model['checked' . $pascal . '__' . $checkedPascal] = (array_key_exists($id, $this->injectedData) && $item === $this->injectedData[$id]) ? 'checked' : '';
                }
            }


            foreach ($this->singleCheckboxes as $id) {
                $checked = '';
                if (array_key_exists($id, $this->injectedData) && 1 === (int)$this->injectedData[$id]) {
                    $checked = 'checked';
                }
                $pascal = OnTheFlyFormHelper::idToSuffix($id);
                $model['checked' . $pascal] = $checked;
            }


            foreach ($this->immutableValues as $id => $value) {
                $pascal = OnTheFlyFormHelper::idToSuffix($id);
                $model['name' . $pascal] = $id;
                $model['value' . $pascal] = $value;
            }

            $model['nameKey'] = $this->key;
            $model['valueKey'] = 1;


            $this->model = $model;
        }

        $this->model = array_merge($this->model, $this->constants);
        return $this->model;
    }
}

