<?php


namespace Ling\Light_CsrfSimple\Chloroform\Validator;


use Ling\Chloroform\Exception\ChloroformException;
use Ling\Chloroform\Field\FieldInterface;
use Ling\Chloroform\Validator\AbstractValidator;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_CsrfSimple\Chloroform\Field\LightCsrfSimpleField;
use Ling\Light_CsrfSimple\Service\LightCsrfSimpleService;


/**
 * The LightCsrfSimpleValidator class.
 *
 */
class LightCsrfSimpleValidator extends AbstractValidator
{


    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected $container;


    /**
     * @overrides
     */
    public function __construct()
    {
        parent::__construct();
        $this->messagesDir = $this->getDefaultMessagesDir(__DIR__);
        $this->container = null;
    }


    /**
     * @implementation
     */
    public function test($value, string $fieldName, FieldInterface $field, string &$error = null): bool
    {
        if ($field instanceof LightCsrfSimpleField) {

            if (null === $value) {
                $value = "";
            }

            /**
             * @var $csrfSimple LightCsrfSimpleService
             */
            $csrfSimple = $this->container->get("csrf_simple");

            if (false === $csrfSimple->isValid($value, true)) {
                $error = $this->getErrorMessage("main", [
                    "fieldName" => $fieldName,
                ]);
                return false;
            }
            return true;
        }

        $className = get_class($field);
        throw new ChloroformException("The LightCsrfSimpleValidator only works against a LightCsrfSimpleField, field of class $className given.");
    }




    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Sets the container.
     *
     * @param LightServiceContainerInterface $container
     * @return LightCsrfSimpleValidator
     */
    public function setContainer(LightServiceContainerInterface $container): LightCsrfSimpleValidator
    {
        $this->container = $container;
        return $this;
    }
}