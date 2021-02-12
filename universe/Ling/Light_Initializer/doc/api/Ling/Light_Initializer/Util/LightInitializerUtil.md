[Back to the Ling/Light_Initializer api](https://github.com/lingtalfi/Light_Initializer/blob/master/doc/api/Ling/Light_Initializer.md)



The LightInitializerUtil class
================
2019-04-05 --> 2020-12-08






Introduction
============

The LightInitializerUtil class.

Read the [initializer conception notes](https://github.com/lingtalfi/Light_Initializer/blob/master/doc/pages/initializer-conception-notes.md) for more details.



Class synopsis
==============


class <span class="pl-k">LightInitializerUtil</span>  {

- Properties
    - protected array [$initializers](#property-initializers) ;
    - protected array [$installTree](#property-installTree) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Initializer/blob/master/doc/api/Ling/Light_Initializer/Util/LightInitializerUtil/__construct.md)() : void
    - public [registerInitializer](https://github.com/lingtalfi/Light_Initializer/blob/master/doc/api/Ling/Light_Initializer/Util/LightInitializerUtil/registerInitializer.md)([Ling\Light_Initializer\Initializer\LightInitializerInterface](https://github.com/lingtalfi/Light_Initializer/blob/master/doc/api/Ling/Light_Initializer/Initializer/LightInitializerInterface.md) $initializer, ?string $slot = null, ?string $parent = null) : void
    - public [initialize](https://github.com/lingtalfi/Light_Initializer/blob/master/doc/api/Ling/Light_Initializer/Util/LightInitializerUtil/initialize.md)(Ling\Light\Core\Light $light, Ling\Light\Http\HttpRequestInterface $httpRequest) : void
    - protected [processItems](https://github.com/lingtalfi/Light_Initializer/blob/master/doc/api/Ling/Light_Initializer/Util/LightInitializerUtil/processItems.md)(array $items, Ling\Light\Core\Light $light, Ling\Light\Http\HttpRequestInterface $httpRequest) : void
    - protected [getPluginName](https://github.com/lingtalfi/Light_Initializer/blob/master/doc/api/Ling/Light_Initializer/Util/LightInitializerUtil/getPluginName.md)([Ling\Light_Initializer\Initializer\LightInitializerInterface](https://github.com/lingtalfi/Light_Initializer/blob/master/doc/api/Ling/Light_Initializer/Initializer/LightInitializerInterface.md) $initializer) : string
    - protected [initializeItemRecursive](https://github.com/lingtalfi/Light_Initializer/blob/master/doc/api/Ling/Light_Initializer/Util/LightInitializerUtil/initializeItemRecursive.md)(Ling\ParentChild\ParentChildItem $item, Ling\Light\Core\Light $light, Ling\Light\Http\HttpRequestInterface $httpRequest) : void
    - private [getDependencyTree](https://github.com/lingtalfi/Light_Initializer/blob/master/doc/api/Ling/Light_Initializer/Util/LightInitializerUtil/getDependencyTree.md)(array $installItems) : [ParentChildItem](https://github.com/lingtalfi/ParentChild/blob/master/doc/api/Ling/ParentChild/ParentChildItem.md)

}




Properties
=============

- <span id="property-initializers"><b>initializers</b></span>

    This property holds the initializer items.
    It's an array of slotName => items.
    And each item:
    
    - 0: LightInitializerInterface instance
    - 1: parent
    
    

- <span id="property-installTree"><b>installTree</b></span>

    This property holds the installTree for this instance.
    It's an array of name => [ParentChildItem, LightInitializerInterface]
    
    



Methods
==============

- [LightInitializerUtil::__construct](https://github.com/lingtalfi/Light_Initializer/blob/master/doc/api/Ling/Light_Initializer/Util/LightInitializerUtil/__construct.md) &ndash; Builds the LightInitializer instance.
- [LightInitializerUtil::registerInitializer](https://github.com/lingtalfi/Light_Initializer/blob/master/doc/api/Ling/Light_Initializer/Util/LightInitializerUtil/registerInitializer.md) &ndash; Registers an initializer to this instance.
- [LightInitializerUtil::initialize](https://github.com/lingtalfi/Light_Initializer/blob/master/doc/api/Ling/Light_Initializer/Util/LightInitializerUtil/initialize.md) &ndash; Triggers the initialize method on all registered initializers.
- [LightInitializerUtil::processItems](https://github.com/lingtalfi/Light_Initializer/blob/master/doc/api/Ling/Light_Initializer/Util/LightInitializerUtil/processItems.md) &ndash; Process the given items.
- [LightInitializerUtil::getPluginName](https://github.com/lingtalfi/Light_Initializer/blob/master/doc/api/Ling/Light_Initializer/Util/LightInitializerUtil/getPluginName.md) &ndash; Returns a unique name for the given initializer.
- [LightInitializerUtil::initializeItemRecursive](https://github.com/lingtalfi/Light_Initializer/blob/master/doc/api/Ling/Light_Initializer/Util/LightInitializerUtil/initializeItemRecursive.md) &ndash; Initializes all the children of an item recursively, then initializes the item.
- [LightInitializerUtil::getDependencyTree](https://github.com/lingtalfi/Light_Initializer/blob/master/doc/api/Ling/Light_Initializer/Util/LightInitializerUtil/getDependencyTree.md) &ndash; Returns an array of ParentChildItem, based on the given install items.





Location
=============
Ling\Light_Initializer\Util\LightInitializerUtil<br>
See the source code of [Ling\Light_Initializer\Util\LightInitializerUtil](https://github.com/lingtalfi/Light_Initializer/blob/master/Util/LightInitializerUtil.php)



SeeAlso
==============
Previous class: [LightInitializerInterface](https://github.com/lingtalfi/Light_Initializer/blob/master/doc/api/Ling/Light_Initializer/Initializer/LightInitializerInterface.md)<br>
