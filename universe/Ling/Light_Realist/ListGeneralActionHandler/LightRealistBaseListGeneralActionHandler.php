<?php


namespace Ling\Light_Realist\ListGeneralActionHandler;


use Ling\Light\ServiceContainer\LightServiceContainerAwareInterface;
use Ling\Light_Realist\GenericItemActionHandler\GenericActionItemHandlerTrait;

/**
 * The LightRealistBaseListGeneralActionHandler class.
 */
abstract class LightRealistBaseListGeneralActionHandler implements LightRealistListGeneralActionHandlerInterface, LightServiceContainerAwareInterface
{
    use GenericActionItemHandlerTrait;
}