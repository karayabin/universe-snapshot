<?php


namespace Ling\Light_Realist\Tool;

use Ling\Bat\ArrayTool;
use Ling\Bat\BDotTool;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_CsrfSession\Service\LightCsrfSessionService;
use Ling\Light_Realist\Exception\LightRealistException;

/**
 * The LightRealistTool class.
 */
class LightRealistTool
{


    /**
     * Returns the @page(toolbar item) identified by the given actionId.
     *
     * @param string $actionId
     * @param array $requestDeclaration
     * @return array
     * @throws \Exception
     */
    public static function getToolbarItemByActionId(string $actionId, array $requestDeclaration): array
    {
        $listActionGroups = BDotTool::getDotValue("rendering.list_action_groups", $requestDeclaration);
        if ($listActionGroups) {
            $matchingItem = null;
            ArrayTool::walkRowsRecursive($listActionGroups, function ($item) use (&$matchingItem, $actionId) {
                if (null === $matchingItem) {
                    if ($actionId === $item['action_id']) {
                        $matchingItem = $item;
                    }
                }
            }, 'items', false);
            if (null !== $matchingItem) {
                return $matchingItem;
            }
        }
        throw new LightRealistException("Toolbar item not found with actionId $actionId.");
    }

    /**
     * Returns the @page(list general action item) identified by the given actionId.
     *
     * @param string $actionId
     * @param array $requestDeclaration
     * @return array
     * @throws \Exception
     */
    public static function getListGeneralActionItemByActionId(string $actionId, array $requestDeclaration): array
    {
        $items = BDotTool::getDotValue("rendering.list_general_actions", $requestDeclaration);
        if ($items) {
            foreach ($items as $item) {
                if ($actionId === $item['action_id']) {
                    return $item;
                }
            }
        }
        throw new LightRealistException("List general action item not found with actionId $actionId.");
    }


    /**
     *
     * Checks whether the given token is valid and throws an exception if it's not the case.
     *
     * @param string $token
     * @param LightServiceContainerInterface $container
     * @throws \Exception
     */
    public static function checkAjaxToken(string $token, LightServiceContainerInterface $container)
    {
        /**
         * @var $csrfService LightCsrfSessionService
         */
        $csrfService = $container->get('csrf_session');
        if (false === $csrfService->isValid($token)) {
            throw new LightRealistException("Invalid token with value $token.");
        }
    }


    /**
     * Returns a comma separated list of integers, based on the given rics.
     *
     * It's assumed that the given rics comes from the user, and therefore is not trusted.
     * This method was designed with the goal of providing the string to use inside the IN mysql function,
     * with rics which has a primary key composed of only one column of type integer (such as a table
     * with the auto-incremented key as the primary key).
     *
     *
     *
     * @param array $rics
     * @return string
     */
    public static function ricsToIntegersOnlyInString(array $rics): string
    {
        $s = '';
        $c = 0;
        foreach ($rics as $ric) {
            if (0 !== $c++) {
                $s .= ', ';
            }
            $s .= (int)current($ric);
        }
        return $s;
    }
}