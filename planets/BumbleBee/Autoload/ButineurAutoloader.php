<?php


namespace BumbleBee\Autoload;

/**
 * ButineurAutoloader
 * @author Lingtalfi
 * 2015-04-25
 *
 *
 * It can also be used as a singleton.
 *
 *
 */
class ButineurAutoloader extends BeeAutoloader
{

    private static $inst = null;

    protected $locations;

    public function __construct(array $plugins = [])
    {
        parent::__construct($plugins);
        $this->locations = [];
        $this->setPlugin([$this, 'butineurAutoload']);
    }


    /**
     * @return ButineurAutoloader
     */
    public static function getInst()
    {
        if (null === self::$inst) {
            self::$inst = new static();
        }
        return self::$inst;
    }



    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    /**
     * @param $location , a dir to search within
     * @param null|string $prefix , the namespace prefix
     */
    public function addLocation($location, $prefix = null)
    {
        $this->locations[$location] = $prefix;
        return $this;
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    protected function butineurAutoload($className, &$stopPropagation)
    {
        foreach ($this->locations as $location => $prefix) {
            /**
             * If the prefix is given, the className must start with this prefix
             */
            if (null !== $prefix) {
                if (0 === strpos($className, $prefix)) {
                    $className = substr($className, strlen($prefix) + 1);
                }
                else {
                    continue;
                }
            }
            $path = $location . '/' . ltrim(str_replace('\\', '/', $className), '/') . '.php';
            if (file_exists($path)) {
                require_once $path;
                $stopPropagation = true;
                break;
            }
        }
    }

}