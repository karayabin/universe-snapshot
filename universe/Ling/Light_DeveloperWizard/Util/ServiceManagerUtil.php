<?php


namespace Ling\Light_DeveloperWizard\Util;


/**
 * The ServiceManagerUtil class.
 */
class ServiceManagerUtil
{


    /**
     * This property holds the galaxy for this instance.
     * @var string
     */
    protected $galaxy;

    /**
     * This property holds the planet for this instance.
     * @var string
     */
    protected $planet;


    /**
     * Builds the ServiceManagerUtil instance.
     */
    public function __construct()
    {
        $this->galaxy = null;
        $this->planet = null;
    }


    /**
     * Sets the planet and galaxy for this instance.
     *
     * @param string $planet
     * @param string|null $galaxy
     */
    public function setPlanet(string $planet, string $galaxy = null)
    {
        if (null === $galaxy) {
            $galaxy = 'Ling';
        }
        $this->planet = $planet;
        $this->galaxy = $galaxy;
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Returns the @page(planet identifier).
     *
     * @return string
     */
    public function getPlanetIdentifier(): string
    {
        return "$this->galaxy/$this->planet";
    }


    /**
     * Returns whether there is a service class file for the planet.
     * @return bool
     */
    public function hasServiceClassFile(): bool
    {

    }


}