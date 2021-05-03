<?php


namespace Ling\Light_Kit_Admin\Light_BMenu\Util;

use Ling\BabyYaml\BabyYamlUtil;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_BMenu\Service\LightBMenuService;
use Ling\Light_BMenu\Tool\LightBMenuTool;
use Ling\Light_Kit_Admin\Exception\LightKitAdminException;

/**
 * The LightKitAdminBMenuRegistrationUtil class.
 */
class LightKitAdminBMenuRegistrationUtil
{

    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface|null
     */
    private ?LightServiceContainerInterface $container;

    /**
     * Builds the LightKitAdminBMenuRegistrationUtil instance.
     */
    public function __construct()
    {
        $this->container = null;
    }

    /**
     * Sets the container.
     *
     * @param LightServiceContainerInterface $container
     */
    public function setContainer(LightServiceContainerInterface $container)
    {
        $this->container = $container;
    }


    /**
     * Adds menu items in a section of the admin main menu.
     *
     * The section can be one of:
     * - user, will register the items in the "user" submenu
     * - admin, will register the items in the "admin" submenu
     * - root, will register the items at the root of the admin main menu
     *
     *
     *
     * @param string $section
     * @param array $items
     */
    public function writeItemsToMainMenuSection(string $section, array $items)
    {

        /**
         * @var $bm LightBMenuService
         */
        $bm = $this->container->get("bmenu");
        $file = $bm->getMenusBaseDir() . "/Ling.Light_Kit_Admin/admin_main_menu.byml";
        if (true === file_exists($file)) {
            $arr = BabyYamlUtil::readFile($file);
        } else {
            $arr = [];
        }


        LightBMenuTool::toAssociative($items);



        switch ($section) {
            case "root":
                foreach ($items as $id => $item) {
                    if (false === array_key_exists($id, $arr)) {
                        $arr[$id] = $item;
                    }
                }
                break;
            case "admin":
            case "user":
                $specialItem = $arr["lka-$section"] ?? null;
                if (null === $specialItem) {
                    $this->error("The lka-$section menu item was not found, make sure the Ling.Light_Kit_Admin plugin is installed first.");
                }
                foreach ($items as $id => $item) {
                    $specialItem['children'][$id] = $item;
                }
                $arr["lka-$section"] = $specialItem;
                break;
            default:
                throw new LightKitAdminException("Unknown menu section: $section. Aborting.");
        }


        BabyYamlUtil::writeFile($arr, $file);

    }






    //--------------------------------------------
    //
    //--------------------------------------------


    /**
     * Throws an exception.
     * @param string $msg
     * @param int|null $code
     * @throws \Exception
     */
    private function error(string $msg, int $code = null)
    {
        throw new LightKitAdminException(static::class . ": " . $msg, $code);
    }
}