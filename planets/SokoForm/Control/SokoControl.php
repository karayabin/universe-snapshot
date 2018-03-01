<?php


namespace SokoForm\Control;


abstract class SokoControl implements SokoControlInterface
{

    protected $name;
    protected $label;
    protected $value;
    protected $errors;
    protected $valueIsOverridable;
    protected $properties;

    private $model;
    private $customModel; // extra properties added by the user

    public function __construct()
    {
        $this->errors = [];
        $this->valueIsOverridable = true;
        $this->model = null;
        $this->properties = [];
        $this->customModel = [];
    }

    public static function create()
    {
        return new static();
    }


    public function getName()
    {
        return $this->name;
    }

    public function getLabel()
    {
        return $this->label;
    }

    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function addError($errorMessage)
    {
        $this->errors[] = $errorMessage;
        return $this;
    }

    public function getErrors()
    {
        return $this->errors;
    }

    public function getValueIsOverridable()
    {
        return $this->valueIsOverridable;
    }

    public function setProperties(array $properties)
    {
        $this->properties = $properties;
        return $this;
    }

    public function addProperties(array $properties)
    {
        foreach ($properties as $k => $v) {
            $this->properties[$k] = $v;
        }
        return $this;
    }


    final public function getModel()
    {
        if (null === $this->model) {
            $model = $this->getSpecificModel();
            if (!is_array($model)) {
                $model = [];
            }

            // injecting user extra properties
            $model = array_replace($model, $this->customModel);

            // now compiling with the main properties
            $this->model = array_replace($model, [
                'label' => $this->label,
                'name' => $this->name,
                'value' => $this->value,
                'errors' => $this->errors,
                'properties' => $this->properties,
            ]);
        }
        return $this->model;
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function setLabel($label)
    {
        $this->label = $label;
        return $this;
    }

    public function setValueIsOverridable($valueIsOverridable)
    {
        $this->valueIsOverridable = $valueIsOverridable;
        return $this;
    }

    public function setCustomModelProperty($key, $value)
    {
        $this->customModel[$key] = $value;
        return $this;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * @return array|null, array of specific control properties
     */
    protected function getSpecificModel() // override me
    {

    }
}