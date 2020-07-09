<?php


namespace Ling\WebWizardTools\Controls;


use Ling\WebWizardTools\Exception\WebWizardToolsException;

/**
 * The WebWizardToolsOptionList class.
 */
class WebWizardToolsOptionList extends WebWizardToolsControl
{


    /**
     * This property holds the options for this instance.
     * It's an array of id => optionInstance.
     *
     * @var WebWizardToolsOption[]
     */
    protected $options;


    /**
     * Builds the WebWizardToolsOptionList instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this->options = [];
    }

    /**
     * Returns a new instance of this class.
     * @return WebWizardToolsOptionList
     */
    public static function inst(): WebWizardToolsOptionList
    {
        return new self();
    }


    /**
     * Adds an option to the list, and returns the optionList instance.
     *
     *
     * @param WebWizardToolsOption $option
     * @return WebWizardToolsOptionList
     */
    public function setOption(WebWizardToolsOption $option): WebWizardToolsOptionList
    {
        $this->options[$option->getId()] = $option;
        return $this;
    }


    /**
     * Sets an option's checked status to either true or false.
     *
     * @param string $id
     * @param bool $isChecked
     * @throws \Exception
     */
    public function setOptionStatus(string $id, bool $isChecked)
    {
        if (false === array_key_exists($id, $this->options)) {
            throw new WebWizardToolsException("Cannot update option \"$id\" because it was not defined.");
        }
        $this->options[$id]->setChecked($isChecked);
    }


    /**
     * Returns the options of this instance.
     *
     * @return array
     */
    public function getOptions(): array
    {
        return $this->options;
    }


}