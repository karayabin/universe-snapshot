<?php


namespace Ling\WebWizardTools\Controls;


/**
 * The WebWizardToolsOption class.
 */
class WebWizardToolsOption
{


    /**
     * This property holds the id for this instance.
     * @var string = null
     */
    protected $id;

    /**
     * This property holds the label for this instance.
     * @var string = null
     */
    protected $label;

    /**
     * This property holds the checked for this instance.
     * @var bool = false
     */
    protected $checked;


    /**
     * Builds the WebWizardToolsOption instance.
     */
    public function __construct()
    {
        $this->id = null;
        $this->label = null;
        $this->checked = false;
    }


    /**
     * Returns a new instance of this class.
     * @return self
     */
    public static function inst(): self
    {
        return new self();
    }



    //--------------------------------------------
    // GETTERS/SETTERS
    //--------------------------------------------
    /**
     * Returns the id of this instance.
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * Sets the id.
     *
     * @param string $id
     * @return $this
     */
    public function setId(string $id): self
    {
        $this->id = $id;
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
     * Returns the checked of this instance.
     *
     * @return bool
     */
    public function isChecked(): bool
    {
        return $this->checked;
    }

    /**
     * Sets the checked.
     *
     * @param bool $checked
     * @return $this
     */
    public function setChecked(bool $checked): self
    {
        $this->checked = $checked;
        return $this;
    }


}