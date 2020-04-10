<?php


namespace Ling\Light_Bullsheet\Service;


use Ling\Bat\ClassTool;
use Ling\Light\ServiceContainer\LightServiceContainerAwareInterface;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_Bullsheet\Bullsheeter\LightBullsheeterInterface;
use Ling\Light_Bullsheet\Exception\LightBullsheeterException;

/**
 * The LightBullsheetService class.
 */
class LightBullsheetService
{

    /**
     * This property holds the bullsheeters for this instance.
     * @var LightBullsheeterInterface[]
     */
    protected $bullsheeters;


    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected $container;

    /**
     * This property holds the silentMode for this instance.
     * Whether to ignore the bullsheeters errors, or to throw an exception when this happen.
     *
     * When the silent mode is activated, you can retrieve the errors using the getLastErrors method,
     * and/or the countLastErrors method.
     *
     * @var bool = true
     */
    protected $silentMode;

    /**
     * This property holds the errors for this instance.
     *
     * Array of "bullsheeter short class name" -> array of errors for this bullsheeter
     * This array is re-initialized every time the generateRows method is called.
     *
     * @var array
     */
    protected $errors;

    /**
     * This property holds the errorCount for this instance.
     * This is re-initialized every time the generateRows method is called.
     * @var int = 0
     */
    protected $errorCount;


    /**
     * Builds the LightBullsheetService instance.
     */
    public function __construct()
    {
        $this->bullsheeters = [];
        $this->container = null;
        $this->silentMode = true;
        $this->errors = [];
        $this->errorCount = 0;
    }


    /**
     * Invokes the bullsheeter identified by the given $identifier and tells him to
     * populate its table(s) with $nbRows random rows.
     *
     *
     * @param string $identifier
     * @param int $nbRows
     * @param array $options
     * @throws \Exception
     */
    public function generateRows(string $identifier, int $nbRows = 50, array $options = [])
    {
        $this->errors = [];
        if (array_key_exists($identifier, $this->bullsheeters)) {
            $bullsheeter = $this->bullsheeters[$identifier];
            if ($bullsheeter instanceof LightServiceContainerAwareInterface) {
                $bullsheeter->setContainer($this->container);
            }


            try {

                $bullsheeter->generateRows($nbRows, $options);

            } catch (\Exception $e) {
                $this->errorCount++;
                $shortName = ClassTool::getShortName($bullsheeter);
                if (false === array_key_exists($shortName, $this->errors)) {
                    $this->errors[$shortName] = [];
                }
                $this->errors[$shortName][] = $e->getMessage();


                if (false === $this->silentMode) {
                    throw $e;
                }
            }

        } else {
            throw new LightBullsheeterException("Bullsheeter not found with identifier \"$identifier\".");
        }
    }


    /**
     * Registers a bullsheeter to this instance.
     *
     * @param string $identifier
     * @param LightBullsheeterInterface $bullsheeter
     */
    public function registerBullsheeter(string $identifier, LightBullsheeterInterface $bullsheeter)
    {
        $this->bullsheeters[$identifier] = $bullsheeter;
    }

    /**
     * Sets the container.
     *
     * @param LightServiceContainerInterface $container
     */
    public function setContainer(LightServiceContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * Sets the silentMode.
     *
     * @param bool $silentMode
     */
    public function setSilentMode(bool $silentMode)
    {
        $this->silentMode = $silentMode;
    }


    /**
     * Returns the array of errors collected during the last call to the generateRows method.
     * Errors are organized by bullsheeter.
     *
     * @return array
     */
    public function getLastErrors(): array
    {
        return $this->errors;
    }

    /**
     * Returns the errorCount of this instance.
     *
     * @return int
     */
    public function countLastErrors(): int
    {
        return $this->errorCount;
    }


}