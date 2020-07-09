<?php


namespace Ling\WebWizardTools\Controls;


/**
 * The WebWizardToolsControl class.
 */
class WebWizardToolsControl
{

    /**
     * This property holds the name for this instance.
     * @var string
     */
    protected $name;

    /**
     * This property holds the label for this instance.
     * @var string
     */
    protected $label;


    /**
     * This property holds the validationRules for this instance.
     * It's an array of name => callback.
     *
     * @var array
     */
    protected $validationRules;

    /**
     * This property holds the error for this instance.
     * @var string
     */
    protected $error;


    /**
     * This property holds the value for this instance.
     * @var mixed = null
     */
    protected $value;


    /**
     * Builds the WebWizardToolsControl instance.
     */
    public function __construct()
    {
        $this->name = null;
        $this->label = null;
        $this->validationRules = [];
        $this->error = null;
        $this->value = null;
    }




    //--------------------------------------------
    // GETTERS/SETTERS
    //--------------------------------------------
    /**
     * Returns the name of this instance.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Sets the name.
     *
     * @param string $name
     * @return $this
     */
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Returns the label of this instance.
     *
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * Sets the label.
     *
     * @param string $label
     * @return $this
     */
    public function setLabel(string $label): self
    {
        $this->label = $label;
        return $this;
    }

    /**
     * Returns the validationRules of this instance.
     *
     * @return array
     */
    public function getValidationRules(): array
    {
        return $this->validationRules;
    }

    /**
     * Sets the validationRules.
     *
     * @param array $validationRules
     * @return $this
     */
    public function setValidationRules(array $validationRules): self
    {
        $this->validationRules = $validationRules;
        return $this;
    }

    /**
     * Returns the error of this instance.
     *
     * @return string
     */
    public function getError(): string
    {
        return $this->error;
    }

    /**
     * Sets the error.
     *
     * @param string $error
     * @return $this
     */
    public function setError(string $error): self
    {
        $this->error = $error;
        return $this;
    }

    /**
     * Returns the value of this instance.
     *
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Sets the value.
     * @param mixed $value
     * @return $this
     *
     */
    public function setValue($value): self
    {
        $this->value = $value;
        return $this;
    }


}