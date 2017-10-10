<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Component\Autoload\ClassAutoLoader;


/**
 * @author LingTalfi
 *
 */
class BeeFrameworkClassAutoLoaderTool
{
    /**
     *
     * The goal of this method is to ease the set up of environments with items that use different versions,
     * each of which being represented by a folder.
     *
     *
     * - $type:
     *      defines the interaction with the ClassAutoLoader, can be one of:
     *
     *
     * ----- vendorChildren (default):  the children of the vendor are version names.
     *
     *                  Vendor/$version/MyDir/MyClass.php
     *
     * ----- vendorItem:
     *              this one is quite complex, it does two things:
     *
     *              - it allows to use versions for named items (for instance a plugin named MakeCoffeePlugin in version 2.0)
     *              - it defines a prefix for the namespace of the item class; that's to avoid collisions that may otherwise
     *                          occur between the item classes and the other classes of the same vendor.
     *
     *
     *                  Vendor/ItemName/$version/MyDir/MyClass.php
     *
     *
     *                  In this case, the $typeExtra parameter represents the NamespacePrefix.
     *                  The version doesn't appear in the className, so for instance for the example above,
     *                  the namespace would be:
     *
     *                  namespace NamespacePrefix\Vendor\ItemName\MyDir\MyClass;
     *
     *                  If $typeExtra is null, then no NamespacePrefix will be used, and in this case the namespace would be:
     *
     *                  namespace Vendor\ItemName\MyDir\MyClass;
     *
     *
     *
     *
     * We can specify the versions with the last arguments; the default version is otherwise underscore (_).
     *      $versions looks like this for vendorChildren:
     *
     *          - Vendor => version
     *          - ...
     *
     *       And like this for vendorItem:
     *
     *          - Vendor/ItemName => version
     *          - ...
     *
     */
    public static function addVersionedDirectory($directory, $type = 'vendorChildren', $typeExtra = null, array $versions = [], $priority = 100)
    {
        $zis = ClassAutoLoader::getInst();
        if ('vendorChildren' === $type) {
            $zis->addDirectory($directory, function ($fileName, $vendor) use ($versions) {
                $v = '_';
                if (array_key_exists($vendor, $versions)) {
                    $v = $versions[$vendor];
                }
                return str_replace($vendor . '/', $vendor . '/' . $v . '/', $fileName);
            }, $priority);
        }
        elseif ('vendorItem' === $type) {


            $zis->addDirectory($directory, function ($fileName, $vendor) use ($versions, $typeExtra) {
                $v = '_';

                $oops = false;
                if (null !== $typeExtra) {
                    $fileName = substr($fileName, strlen($typeExtra) + 1);
                    if (false !== $pos = strpos($fileName, '/')) {
                        $vendor = substr($fileName, 0, $pos);
                    }
                    else {
                        $oops = true;
                    }
                }

                $len = strlen($vendor) + 1;

                if (false === $oops && false !== $pos = strpos(substr($fileName, strlen($vendor) + 1), '/')) {
                    $vendorAndItem = substr($fileName, 0, $len + $pos);
                    if (array_key_exists($vendorAndItem, $versions)) {
                        $v = $versions[$vendorAndItem];
                    }
                    return str_replace($vendorAndItem . '/', $vendorAndItem . '/' . $v . '/', $fileName);
                }


                // we maybe shall have thrown an exception here,
                // but by returning the $fileName, it allows for more design possibilities that one might need in some future...
                return $fileName;
            }, $priority);
        }
        else {
            throw new \UnexpectedValueException(sprintf("Unknown type: %s", $type));
        }
    }

}
