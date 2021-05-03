<?php


namespace Ling\Light_BMenu\Service;


use Ling\BabyYaml\BabyYamlUtil;
use Ling\Bat\FileSystemTool;
use Ling\Light\ServiceContainer\LightServiceContainerAwareInterface;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_BMenu\Exception\LightBMenuException;
use Ling\Light_BMenu\MenuModifier\MenuModifierInterface;

/**
 * The LightBMenuService class.
 *
 * This class can return menus created collaboratively with
 * some hosts and some participant plugins.
 *
 *
 * Each host is first prompted to create the main menu structure.
 * Then plugins (aka subscribers) are then called to complement the host menu.
 *
 *
 * The menu item structure is defined in the @page(bmenu conception notes).
 *
 *
 * Each host is bound to a menuType (like "main menu" for instance), so that we can have multiple
 * menus displayed on the same page.
 *
 *
 */
class LightBMenuService
{


    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface|null
     */
    protected ?LightServiceContainerInterface $container;


    /**
     * This property holds the menuModifiers for this instance.
     * @var MenuModifierInterface[]
     */
    private array $menuModifiers;


    /**
     * Builds the LightBMenuService instance.
     */
    public function __construct()
    {
        $this->container = null;
        $this->menuModifiers = [];
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
     * Adds a menu modifier to the service instance.
     *
     * @param MenuModifierInterface $modifier
     */
    public function addMenuModifier(MenuModifierInterface $modifier)
    {
        if ($modifier instanceof LightServiceContainerAwareInterface) {
            $modifier->setContainer($this->container);
        }
        $this->menuModifiers[] = $modifier;
    }


    /**
     * Returns the path to the directory containing all the menus.
     *
     * @return string
     */
    public function getMenusBaseDir(): string
    {
        return $this->container->getApplicationDir() . "/config/open/Ling.Light_BMenu/menus";
    }


    /**
     * Returns the computed menu items for the given menu name.
     *
     * @param $menuName
     * @return array
     * @throws LightBMenuException
     */
    public function getItems(string $menuName): array
    {

        $menuName = FileSystemTool::removeTraversalDots($menuName);
        $file = $this->getMenusBaseDir() . "/$menuName.byml";
        if (true === file_exists($file)) {
            $items = BabyYamlUtil::readFile($file);


            //--------------------------------------------
            // menu modifiers
            //--------------------------------------------
            foreach ($this->menuModifiers as $modifier) {
                $modifier->updateItems($menuName, $items);
            }
            return $items;
        }
        throw new LightBMenuException("Menu file not found in $file.");
    }


}