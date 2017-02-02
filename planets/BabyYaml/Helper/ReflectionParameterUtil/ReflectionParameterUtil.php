<?php


namespace BabyYaml\Helper\ReflectionParameterUtil;
use BabyYaml\Helper\InlineVariableUtil\Adaptor\PhpDocInlineVariableUtilAdaptor;
use BabyYaml\Helper\InlineVariableUtil\InlineVariableUtil;


/**
 * ReflectionParameterUtil
 * @author Lingtalfi
 * 2015-04-27
 *
 */
class ReflectionParameterUtil
{


    protected $options;
    protected $inlineVarUtil;

    public function __construct(array $options = [])
    {
        $this->options = array_replace([
            /**
             * bool:
             *      if true, the content of the array is shown
             *      if false, the "array" keyword is written
             */
            'arrayContent' => true,
        ], $options);
    }


    public function getParameterAsString(\ReflectionParameter $parameter)
    {
        $words = [];
        if ($parameter->isArray()) {
            $words[] = 'array';
        }
        elseif (null !== $class = $parameter->getClass()) {
            $words[] = $class->getName();
        }

        $var = '';
        if ($parameter->isPassedByReference()) {
            $var .= '&';
        }
        if (version_compare(PHP_VERSION, '5.6.0') >= 0 && $parameter->isVariadic()) {
            $var .= '...';
        }
        $var .= '$' . $parameter->name;
        $words[] = $var;

        if (true === $parameter->isDefaultValueAvailable()) {
            $arg = $parameter->getDefaultValue();
            $words[] = '=';
            $words[] = $this->getDefaultValueRepresentation($arg);
        }
        return implode(' ', $words);
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    protected function getDefaultValueRepresentation($arg)
    {
        return $this->getInlineVarUtil()->toString($arg);
    }
    
    protected function getInlineVarUtil()
    {
        if (null === $this->inlineVarUtil) {
            $this->inlineVarUtil = new InlineVariableUtil();
            $this->inlineVarUtil->setAdaptors([
                new PhpDocInlineVariableUtilAdaptor([
                    'arrayContent' => $this->options['arrayContent'],
                ]),
            ]);
        }
        return $this->inlineVarUtil;
    }
}
