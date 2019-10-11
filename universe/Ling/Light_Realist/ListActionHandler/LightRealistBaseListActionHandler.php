<?php


namespace Ling\Light_Realist\ListActionHandler;


use Ling\Light\ServiceContainer\LightServiceContainerAwareInterface;
use Ling\Light_Realist\GenericItemActionHandler\GenericActionItemHandlerTrait;


/**
 * The LightRealistBaseListActionHandler class.
 */
abstract class LightRealistBaseListActionHandler implements LightRealistListActionHandlerInterface, LightServiceContainerAwareInterface
{

    use GenericActionItemHandlerTrait;
}