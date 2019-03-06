<?php

namespace Ling\UrlFriendlyListHelper\ItemGeneratorHelper;

/*
 * LingTalfi 2015-11-04
 * 
 * Customizes a generator.
 *
 * 
 */
use Ling\UrlFriendlyListHelper\ItemGenerator\ItemGeneratorInterface;
use Ling\UrlFriendlyListHelper\Plugin\ListHelperPluginInterface;

interface ItemGeneratorHelperInterface
{
    public function setPlugin(ListHelperPluginInterface $p);

    public function customize(array &$data, ItemGeneratorInterface $g);
}
