<?php

namespace UrlFriendlyListHelper\ItemGeneratorHelper;

/*
 * LingTalfi 2015-11-04
 * 
 * Customizes a generator.
 *
 * 
 */
use UrlFriendlyListHelper\ItemGenerator\ItemGeneratorInterface;
use UrlFriendlyListHelper\Plugin\ListHelperPluginInterface;

interface ItemGeneratorHelperInterface
{
    public function setPlugin(ListHelperPluginInterface $p);

    public function customize(array &$data, ItemGeneratorInterface $g);
}
