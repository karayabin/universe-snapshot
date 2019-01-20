<?php

namespace UrlFriendlyListHelper\ListHelper;

/*
 * LingTalfi 2015-11-02
 * 
 * 
 * This implementation uses convention "one":
 * https://github.com/lingtalfi/UrlFriendlyListHelper/blob/master/doc/convention/convention.list-parameter-naming.one.md
 * 
 */
use UrlFriendlyListHelper\ItemGenerator\ItemGeneratorInterface;
use UrlFriendlyListHelper\Plugin\ListHelperPluginInterface;
use UrlFriendlyListHelper\Router\ListRouterInterface;
use UrlFriendlyListHelper\Tool\UrlFriendlyListHelperTool;

class AuthorListHelper implements ListHelperInterface
{

    protected static $urlParams;

    protected static $listSuffix;
    /**
     * @var ListRouterInterface
     */
    protected static $router;
    protected static $cpt = 1;


    /**
     * @var ListHelperPluginInterface[]
     */
    protected $plugins;


    /**
     * @var ItemGeneratorInterface
     */
    protected $itemGenerator;

    private $suffix;


    public function __construct()
    {
        $this->plugins = [];
    }


    public static function create()
    {
        return new static();
    }


    public function registerPlugin(ListHelperPluginInterface $p)
    {
        $this->plugins[] = $p;
        $p->setListHelper($this);
        return $this;
    }


    public function start()
    {
        if (null !== self::$router) {
            if (null !== $this->itemGenerator) {


                if (null === self::$urlParams) {
                    self::$urlParams = self::$router->getWidgetParameters();
                }
                if (null === $this->suffix) {
                    $this->suffix = self::$cpt++;
                }


                /**
                 * prepare plugins
                 */
                foreach ($this->plugins as $p) {


                    if (null !== ($h = $p->getGeneratorHelper())) {
                        $this->itemGenerator->addGeneratorHelper($h);
                    }

                    $params = $p->getDefaultWidgetParameters();

                    if (is_array($params)) {

                        $p->meetGenerator($this->itemGenerator);

                        foreach ($params as $name => $value) {

                            $newName = UrlFriendlyListHelperTool::getConcreteName($name, $this->suffix);
                            if (array_key_exists($newName, self::$urlParams)) {
                                $value = self::$urlParams[$newName];
                            }
                            $p->setWidgetParameter($name, $value);
                        }
                    }
                    else {
                        $this->error(sprintf("%s:getDefaultWidgetParameters must return an array, %s given", get_class($p), gettype($params)));
                    }
                }
            }
            else {
                $this->error("Workflow error: the itemGenerator must be set when you call the start method");
            }
        }
        else {
            $this->error("Workflow error: the list router must be set when you call the start method");
        }
    }


    public function setRouter(ListRouterInterface $r)
    {
        self::$router = $r;
        return $this;
    }

    public function setItemGenerator(ItemGeneratorInterface $g)
    {
        $this->itemGenerator = $g;
        $g->setListHelper($this);
        return $this;
    }

    public function getRouter()
    {
        return self::$router;
    }

    /**
     * You should use suffix only if your page use multiple lists.
     * The first suffix should be 2, then 3, then 4, and so on...
     */
    public function setSuffix($suffix)
    {
        $this->suffix = $suffix;
        return $this;
    }

    public function getSuffix()
    {
        return $this->suffix;
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    private function error($m)
    {
        throw new \Exception($m);
    }

}
