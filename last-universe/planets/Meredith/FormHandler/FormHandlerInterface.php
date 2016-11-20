<?php

namespace Meredith\FormHandler;

use Meredith\FormAndValidationLayout\FormAndValidationLayoutInterface;
use Meredith\FormMessageJsHelper\FormMessageJsHelperInterface;
use Meredith\MainController\MainControllerInterface;
use Meredith\ValidatorJsSubmitHandler\ValidatorJsSubmitHandlerInterface;
use Meredith\ValidatorJsUserCode\ValidatorJsUserCodeInterface;

/**
 * LingTalfi 2015-12-29
 */
interface FormHandlerInterface
{

    public function render(MainControllerInterface $mc);


}