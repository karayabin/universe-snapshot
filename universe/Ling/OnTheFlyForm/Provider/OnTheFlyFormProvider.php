<?php


namespace Ling\OnTheFlyForm\Provider;

use Ling\OnTheFlyForm\Exception\OnTheFlyFormException;


/**
 * This OnTheFlyProvider let you add forms by defining the namespace in which they exist.
 * Note that your forms shouldn't have arguments in their constructor method,
 * because we won't know how to call them (we basically apply a generic new $class pattern).
 *
 */
class OnTheFlyFormProvider implements OnTheFlyFormProviderInterface
{


    private $namespaces;


    public function __construct()
    {
        $this->namespaces = [];
    }


    public static function create()
    {
        return new static();
    }

    /**
     * Returns an instance of a OnTheFlyFormInterface
     */
    public function getForm($namespace, $formName)
    {
        if (array_key_exists($namespace, $this->namespaces)) {
            $namespacePath = $this->namespaces[$namespace];

            $class = $namespacePath . "\\" . $formName . "OnTheFlyForm";
            if (class_exists($class)) {
                return new $class;
            } else {
                throw new OnTheFlyFormException("class not found: $class");
            }

        } else {
            throw new OnTheFlyFormException("namespace not defined: $namespace");
        }
    }


    /**
     * @param $namespaceIdentifier , string: the identifier of the namespace (for instance Ekom)
     * @param $namespacePath , string: the namespace containing the (on the fly) forms.
     *                      If you set a namespace of A\B\C with an identifer of ccc,
     *
     *                      then later you can call the getForm method like this:
     *                      getForm ( ccc, MyForm )
     *
     *                      and it will look for the class A\B\C\MyForm.
     *
     *
     * @return $this
     */
    public function setNamespace($namespaceIdentifier, $namespacePath)
    {
        $this->namespaces[$namespaceIdentifier] = $namespacePath;
        return $this;
    }

}