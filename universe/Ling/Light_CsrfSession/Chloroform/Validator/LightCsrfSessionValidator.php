<?php


namespace Ling\Light_CsrfSession\Chloroform\Validator;


use Ling\Chloroform\Exception\ChloroformException;
use Ling\Chloroform\Field\FieldInterface;
use Ling\Chloroform\Validator\AbstractValidator;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_CsrfSession\Chloroform\Field\LightCsrfSessionField;
use Ling\Light_CsrfSession\Service\LightCsrfSessionService;


/**
 * The LightCsrfSessionValidator class.
 *
 */
class LightCsrfSessionValidator extends AbstractValidator
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
        if ($field instanceof LightCsrfSessionField) {

            if (null === $value) {
                $value = "";
            }

            /**
             * @var $csrfService LightCsrfSessionService
             */
            $csrfService = $this->container->get("csrf_session");

            if (false === $csrfService->isValid($value)) {
                $error = $this->getErrorMessage("main", [
                    "fieldName" => $fieldName,
                ]);
                return false;
            }
            return true;
        }

        $className = get_class($field);
        throw new ChloroformException("The LightCsrfSessionValidator only works against a LightCsrfSessionField, field of class $className given.");
    }




    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Sets the container.
     *
     * @param LightServiceContainerInterface $container
     * @return LightCsrfSessionValidator
     */
    public function setContainer(LightServiceContainerInterface $container): LightCsrfSessionValidator
    {
        $this->container = $container;
        return $this;
    }
}