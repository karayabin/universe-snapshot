<?php


namespace DocTools\Info;


/**
 * The ParameterInfo class.
 */
class ParameterInfo implements InfoInterface
{

    /**
     * This property holds the name of the parameter.
     * @var string
     */
    protected $name;


    /**
     * This property holds the type of the parameter.
     * @var string | null
     */
    protected $type;

    /**
     * This property holds the default value of the parameter.
     * @var string | null
     */
    protected $defaultValue;

    /**
     * This property holds the value alternatives for this parameter.
     * @var string | null
     */
    protected $valueAlternatives;


    /**
     * This property holds the descriptive text for this parameter.
     * @var string | null
     */
    protected $descriptiveText;


    /**
     * Builds the ParameterInfo instance.
     */
    public function __construct()
    {
        $this->name = "";
        $this->type = null;
        $this->defaultValue = null;
        $this->valueAlternatives = null;
        $this->descriptiveText = null;
    }


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
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * Returns the type of this instance.
     *
     * @return string
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * Sets the type.
     *
     * @param string|null $type
     */
    public function setType(?string $type)
    {
        $this->type = $type;
    }

    /**
     * Returns the defaultValue of this instance.
     *
     * @return string|null
     */
    public function getDefaultValue(): ?string
    {
        return $this->defaultValue;
    }

    /**
     * Sets the defaultValue.
     *
     * @param string|null $defaultValue
     */
    public function setDefaultValue(?string $defaultValue)
    {
        $this->defaultValue = $defaultValue;
    }

    /**
     * Returns the valueAlternatives of this instance.
     *
     * @return string|null
     */
    public function getValueAlternatives(): ?string
    {
        return $this->valueAlternatives;
    }

    /**
     * Sets the valueAlternatives.
     *
     * @param string|null $valueAlternatives
     */
    public function setValueAlternatives(?string $valueAlternatives)
    {
        $this->valueAlternatives = $valueAlternatives;
    }

    /**
     * Returns the descriptiveText of this instance.
     *
     * @return string | null
     */
    public function getDescriptiveText(): ?string
    {
        return $this->descriptiveText;
    }

    /**
     * Sets the descriptiveText.
     *
     * @param string|null $descriptiveText
     */
    public function setDescriptiveText(?string $descriptiveText)
    {
        $this->descriptiveText = $descriptiveText;
    }


}