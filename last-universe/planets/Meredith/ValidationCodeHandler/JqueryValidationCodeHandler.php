<?php

namespace Meredith\ValidationCodeHandler;

use Meredith\MainController\MainControllerInterface;
use Meredith\ValidatorJsUserCode\ValidatorJsUserCodeInterface;

/**
 * LingTalfi 2015-12-31
 */
class JqueryValidationCodeHandler implements ValidationCodeHandlerInterface
{


    private $validatorJsUserCode;


    public static function create()
    {
        return new static();
    }


    public function renderCode(MainControllerInterface $mc)
    {
        ob_start();
        require_once __DIR__ . "/JqueryValidationCodeHandler/validation.php";
        return ob_get_clean();
    }

    /**
     * @return ValidatorJsUserCodeInterface
     */
    public function getValidatorJsUserCode()
    {
        return $this->validatorJsUserCode;
    }

    public function setValidatorJsUserCode(ValidatorJsUserCodeInterface $validatorJsUserCode)
    {
        $this->validatorJsUserCode = $validatorJsUserCode;
        return $this;
    }


}