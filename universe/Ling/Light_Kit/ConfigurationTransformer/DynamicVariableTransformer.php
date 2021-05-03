<?php


namespace Ling\Light_Kit\ConfigurationTransformer;


use Ling\ArrayVariableResolver\ArrayVariableResolverUtil;

/**
 * The DynamicVariableTransformer class.
 *
 *
 */
class DynamicVariableTransformer implements ConfigurationTransformerInterface, DynamicVariableAwareInterface
{


    /**
     * This property holds the firstSymbol for this instance.
     * @var string = $
     */
    protected $firstSymbol;

    /**
     * This property holds the openingBracket for this instance.
     * @var string = {
     */
    protected $openingBracket;

    /**
     * This property holds the closingBracket for this instance.
     * @var string = }
     */
    protected $closingBracket;

    /**
     * This property holds the resolver for this instance.
     * @var ArrayVariableResolverUtil
     */
    protected $resolver;

    /**
     * This property holds the dynamic variables for this instance.
     * @var array
     */
    protected $variables;


    /**
     * Builds the DynamicVariableTransformer instance.
     */
    public function __construct()
    {
        $this->firstSymbol = '$';
        $this->openingBracket = '{';
        $this->closingBracket = '}';
        $this->resolver = new ArrayVariableResolverUtil();
        $this->variables = [];
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Sets the firstSymbol.
     *
     * @param string $firstSymbol
     */
    public function setFirstSymbol(string $firstSymbol)
    {
        $this->firstSymbol = $firstSymbol;
    }

    /**
     * Sets the openingBracket.
     *
     * @param string $openingBracket
     */
    public function setOpeningBracket(string $openingBracket)
    {
        $this->openingBracket = $openingBracket;
    }

    /**
     * Sets the closingBracket.
     *
     * @param string $closingBracket
     */
    public function setClosingBracket(string $closingBracket)
    {
        $this->closingBracket = $closingBracket;
    }


    //--------------------------------------------
    // DynamicVariableAwareInterface
    //--------------------------------------------
    /**
     * @implementation
     */
    public function setVariables(array $variables)
    {
        $this->variables = $variables;
    }




    //--------------------------------------------
    // ConfigurationTransformerInterface
    //--------------------------------------------
    /**
     * @implementation
     */
    public function transform(array &$conf)
    {
        $this->resolver->setFirstSymbol($this->firstSymbol);
        $this->resolver->setOpeningBracket($this->openingBracket);
        $this->resolver->setClosingBracket($this->closingBracket);
        $this->resolver->resolve($conf, $this->variables);
    }


}