<?php


namespace BumbleBee\Autoload;

/**
 * BeeAutoloader
 * @author Lingtalfi
 * 2015-04-24
 *
 */
class BeeAutoloader
{

    protected $plugins;

    public function __construct(array $plugins = [])
    {
        $this->plugins = $plugins;
    }


    public function start()
    {
        spl_autoload_register([$this, 'autoLoader']);
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    public function getPlugins()
    {
        return $this->plugins;
    }

    public function setPlugins(array $plugins)
    {
        $this->plugins = $plugins;
    }

    public function setPlugin($plugin, $index = null)
    {
        if (null === $index) {
            $this->plugins[] = $plugin;
        }
        else {
            $this->plugins[$index] = $plugin;
        }
    }


    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    protected function autoLoader($className)
    {
        $stopPropagation = false;
        foreach ($this->plugins as $plugin) {
            call_user_func_array($plugin, [$className, &$stopPropagation]);
            if (true === $stopPropagation) {
                break;
            }
        }
    }
}