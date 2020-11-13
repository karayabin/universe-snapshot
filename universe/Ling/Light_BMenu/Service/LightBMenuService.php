<?php


namespace Ling\Light_BMenu\Service;


use Ling\BabyYaml\BabyYamlUtil;
use Ling\Light_BMenu\DirectInjection\BMenuDirectInjectorInterface;
use Ling\Light_BMenu\Exception\LightBMenuException;
use Ling\Light_BMenu\Host\LightBMenuHostInterface;
use Ling\Light_BMenu\Menu\LightBMenu;

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
     * This property holds the host for this instance.
     *
     * Array of menuType => LightBMenuHostInterface instance
     *
     *
     * @var LightBMenuHostInterface[]
     */
    protected $hosts;

    /**
     * This property holds the directInjectors for this instance.
     *
     * It's an array of menuType => directInjectors.
     *
     * With:
     * - menuType: string, the menu type (see @page(bmenu conception notes) for more details)
     * - directInjectors: BMenuDirectInjectorInterface[]|callable[], an array of direct injectors,
     *          each of which being either a BMenuDirectInjectorInterface instance, or a
     *          php callable which take two arguments: the menuStructureId and the LightBMenu instance.
     *
     * @var array
     */
    protected $directInjectors;

    /**
     * This property holds the directItems for this instance.
     *
     * It's an array of menuType => menuPath2Items,
     *
     * with menuPath2Items: array of @page(bdot) menuPath to menu items
     *
     * @var array
     */
    protected $directItems;

    /**
     * This property holds the defaultItems for this instance.
     *
     * An array of menuType => defaultItems.
     *
     * With:
     * - menuType: string, the menu type (see @page(bmenu conception notes) for more details)
     * - defaultItems: an array of menu items
     *
     *
     * See the @page(bmenu conception notes) for more details.
     *
     * @var array
     */
    protected $defaultItems;


    /**
     * Builds the LightBMenuService instance.
     */
    public function __construct()
    {
        $this->hosts = [];
        $this->directInjectors = [];
        $this->defaultItems = [];
        $this->directItems = [];
    }


    /**
     * Returns the computed menu items identified by the given $menuType.
     *
     * @param $menuType
     * @return array
     * @throws LightBMenuException
     */
    public function getItems(string $menuType): array
    {

        if (false === array_key_exists($menuType, $this->hosts)) {
            throw new LightBMenuException("Host not defined.");
        }


        $host = $this->hosts[$menuType];
        $menu = new LightBMenu();
        $menuStructureId = $host->getMenuStructureId();
        $host->prepareBaseMenu($menu);


        //--------------------------------------------
        // TECHNIQUE #1: DIRECT INJECTION
        //--------------------------------------------
        // via interface
        $injectors = $this->directInjectors[$menuType] ?? [];
        foreach ($injectors as $injector) {
            if ($injector instanceof BMenuDirectInjectorInterface) {
                $injector->inject($menuStructureId, $menu);
            } else {
                $injector($menuStructureId, $menu);
            }
        }


        // via config file
        $directItems = $this->directItems[$menuType] ?? [];
        foreach ($directItems as $parentPath => $items) {
            foreach ($items as $item) {
                $menu->appendItem($item, $parentPath);
            }
        }

        //--------------------------------------------
        // TECHNIQUE #2: HOST DRIVEN INJECTION
        //--------------------------------------------
        $defaultItems = $this->defaultItems[$menuType] ?? [];
        if ($defaultItems) {
            $host->injectDefaultItems($defaultItems, $menu);
        }


        $ret = $menu->getItems();

        //--------------------------------------------
        // LAST OPPORTUNITY TO CHANGE THE MENU
        //--------------------------------------------
        $host->onMenuCompiled($ret);


        return $ret;
    }

    /**
     * Registers a host.
     *
     * @param string $menuType
     * @param LightBMenuHostInterface $host
     */
    public function registerHost(string $menuType, LightBMenuHostInterface $host)
    {
        $host->setMenuType($menuType);
        $this->hosts[$menuType] = $host;
    }


    /**
     * Adds a direct injector to menu identified by $menuType.
     *
     *
     * @param string $menuType
     * @param callable|BMenuDirectInjectorInterface $injector
     * @throws \Exception
     */
    public function addDirectInjector(string $menuType, $injector)
    {
        if ($injector instanceof BMenuDirectInjectorInterface || is_callable($injector)) {
            if (false === array_key_exists($menuType, $this->directInjectors)) {
                $this->directInjectors[$menuType] = [];
            }
            $this->directInjectors[$menuType][] = $injector;
        } else {
            $type = gettype($injector);
            throw new LightBMenuException("Wrong injector type: it should be a BMenuDirectInjectorInterface instance or a callable, $type given.");
        }
    }


    /**
     * Add direct items to this instance.
     *
     * The items are found in the given file.
     * In the form of an array of menuParentPath => items.
     *
     * @param string $menuType
     * @param string $file
     */
    public function addDirectItemsByFile(string $menuType, string $file)
    {
        if (false === array_key_exists($menuType, $this->directItems)) {
            $this->directItems[$menuType] = [];
        }
        $menuPath2items = BabyYamlUtil::readFile($file);
        foreach ($menuPath2items as $menuPath => $items) {
            if (false === array_key_exists($menuPath, $this->directItems[$menuType])) {
                $this->directItems[$menuType][$menuPath] = [];
            }
            $this->directItems[$menuType][$menuPath] = array_merge($this->directItems[$menuType][$menuPath], $items);
        }
    }

    /**
     * Add direct items to this instance.
     *
     * The items are found in the given file.
     * In the form of an array items.
     * They will be appended at the given parentPath key.
     *
     *
     *
     * @param string $menuType
     * @param string $file
     * @param string $parentPath
     */
    public function addDirectItemsByFileAndParentPath(string $menuType, string $file, string $parentPath)
    {
        if (false === array_key_exists($menuType, $this->directItems)) {
            $this->directItems[$menuType] = [];
        }
        $items = BabyYamlUtil::readFile($file);
        if (false === array_key_exists($parentPath, $this->directItems[$menuType])) {
            $this->directItems[$menuType][$parentPath] = [];
        }
        $this->directItems[$menuType][$parentPath] = array_merge($this->directItems[$menuType][$parentPath], $items);
    }

    /**
     * Adds a default item to the menu identified by $menuType.
     *
     * @param string $menuType
     * @param array $item
     */
    public function addDefaultItem(string $menuType, array $item)
    {
        if (false === array_key_exists($menuType, $this->defaultItems)) {
            $this->defaultItems[$menuType] = [];
        }
        $this->defaultItems[$menuType][] = $item;
    }


    /**
     * Adds a default item stored in $path, to the menu identified by $menuType.
     *
     * Note: the path must target a @page(babyYaml) file.
     *
     * @param string $menuType
     * @param string $path
     */
    public function addDefaultItemByFile(string $menuType, string $path)
    {
        $item = BabyYamlUtil::readFile($path);
        $this->addDefaultItem($menuType, $item);
    }

}