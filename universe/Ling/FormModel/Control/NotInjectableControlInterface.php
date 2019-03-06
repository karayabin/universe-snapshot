<?php


namespace Ling\FormModel\Control;

/**
 * This kind of control is not affected by the FormModel.inject method.
 *
 * This was done so that the submit control is unaffected by the posted value.
 */
interface NotInjectableControlInterface
{
}