<?php


namespace Ling\FormModel;


use Ling\FormModel\Group\GroupInterface;
use Kamille\Architecture\Controller\ControllerInterface;

/**
 * https://github.com/lingtalfi/form-modelization
 */
interface FormModelInterface
{
    public function getArray();

    public function inject(array $values);

    /**
     * @return bool
     */
    public function validate(array $values);
}