<?php


namespace Ling\ClassCooker\FryingPan;


use Ling\ClassCooker\ClassCooker;
use Ling\ClassCooker\Exception\ClassCookerException;
use Ling\ClassCooker\FryingPan\Ingredient\IngredientInterface;

/**
 * The FryingPan class.
 * See the @page(frying pan conception notes) for more details.
 */
class FryingPan
{


    /**
     * The path to the file to work on.
     * @var string
     */
    protected $file;


    /**
     * This property holds the cooker for this instance.
     * @var ClassCooker
     */
    protected $cooker;


    /**
     * This property holds the ingredients for this instance.
     *
     * @var IngredientInterface[]
     */
    protected $ingredients;


    /**
     * The options for this class.
     * Available options are:
     *
     * - loggerCallable: callable, a callback to call whenever a message needs to be send to the log.
     *      If not set, no message will be sent.
     *      The signature of the callable looks like this:
     *      - fn ( string msg, string msgType )
     *
     *      With:
     *      - msg: string, the message to send to the log. It's decided by the ingredients.
     *      - msgType: string, one of:
     *          - add,      if the ingredient will be added during the cooking
     *          - skip,     if the ingredient is already found in the class, and will not be added
     *          - warning,  if a similar ingredient is found in the class, which prevents the addition of the new ingredient
     *          - error,    if the ingredient can't be added, due to an error
     *
     *
     *
     *
     *
     * @var array
     */
    protected $options;

    /**
     * This property holds the className for this instance.
     * @var string
     */
    private $className;

    /**
     * This property holds the loggerCallback for this instance.
     * @var null|callable
     */
    private $loggerCallback;


    /**
     * Builds the FryingPan instance.
     */
    public function __construct()
    {
        $this->file = null;
        $this->className = null;
        $this->ingredients = [];
        $this->options = [];
        $this->loggerCallback = null;
    }

    /**
     * Sets the file.
     *
     * @param string $file
     */
    public function setFile(string $file): self
    {
        $this->file = $file;
        return $this;
    }

    /**
     * Returns the file of this instance.
     *
     * @return string
     */
    public function getFile(): string
    {
        return $this->file;
    }


    /**
     * Sets the options.
     *
     * @param array $options
     */
    public function setOptions(array $options): self
    {
        $this->options = $options;
        return $this;
    }


    /**
     * Adds an ingredient, and returns itself for chaining.
     *
     * @param IngredientInterface $ingredient
     * @return $this
     */
    public function addIngredient(IngredientInterface $ingredient): self
    {
        $ingredient->setFryingPan($this);
        $this->ingredients[] = $ingredient;
        return $this;
    }


    /**
     * Cooks all the ingredients into the file we're working on.
     *
     */
    public function cook()
    {
        // process ingredients
        foreach ($this->ingredients as $ingredient) {
            $ingredient->execute();
        }
    }


    /**
     * Sends a message to the log (if the loggerCallable is defined).
     *
     * Only ingredients should use this method.
     *
     *
     * @param string $msg
     * @param string $msgType
     * @throws \Exception
     */
    public function sendToLog(string $msg, string $msgType)
    {
        if (false === in_array($msgType, ['add', 'skip', 'error', 'warning'])) {
            $this->error("Unrecognized msgType: $msgType.");
        }
        call_user_func($this->getLogger(), $msg, $msgType);
    }


    /**
     * Returns the cooker of this instance.
     *
     * @return ClassCooker
     */
    public function getCooker(): ClassCooker
    {
        if (null === $this->cooker) {
            $this->cooker = new ClassCooker();
            $this->cooker->setFile($this->file);
        }
        return $this->cooker;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Returns the name of the class we're working on.
     *
     * @return string
     */
    protected function getClassName(): string
    {
        if (null === $this->className) {
            $this->className = $this->getCooker()->getClassName();
        }
        return $this->className;
    }




    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Returns the logger callable.
     *
     * @return callable
     */
    private function getLogger(): callable
    {
        if (null === $this->loggerCallback) {
            $logger = $this->options['loggerCallable'] ?? null;
            if (null === $logger) {
                $logger = function () {
                };
            }
            $this->loggerCallback = $logger;
        }
        return $this->loggerCallback;
    }


    /**
     * Throws an exception.
     * @param string $msg
     * @throws \Exception
     */
    private function error(string $msg)
    {
        throw new ClassCookerException($msg);
    }
}