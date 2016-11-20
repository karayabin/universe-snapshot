<?php

namespace UrlFriendlyListHelper\ItemGeneratorHelper;

/*
 * LingTalfi 2015-11-04
 */
use UrlFriendlyListHelper\Plugin\ListHelperPluginInterface;

abstract class ItemGeneratorHelper implements ItemGeneratorHelperInterface
{

    /**
     * @var ListHelperPluginInterface
     */
    private $plugin;

    

    public function setPlugin(ListHelperPluginInterface $p)
    {
        $this->plugin = $p;
        return $this;
    }

    /**
     * @return ListHelperPluginInterface
     */
    public function getPlugin()
    {
        return $this->plugin;
    }


}
