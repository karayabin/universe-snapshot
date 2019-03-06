<?php

namespace Ling\Meredith\FormHandler;

use Ling\Meredith\FormAndValidationLayout\FormAndValidationLayoutInterface;
use Ling\Meredith\FormMessageJsHelper\FormMessageJsHelperInterface;
use Ling\Meredith\MainController\MainControllerInterface;
use Ling\Meredith\ValidatorJsSubmitHandler\ValidatorJsSubmitHandlerInterface;
use Ling\Meredith\ValidatorJsUserCode\ValidatorJsUserCodeInterface;

/**
 * LingTalfi 2015-12-29
 */
interface FormHandlerInterface
{

    public function render(MainControllerInterface $mc);


}