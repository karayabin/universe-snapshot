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
 * ClassAutoLoader.
 * If the className (as given to the autoload function) has at least two components, the first component is called the vendor.
 * All classes should have a vendor.
 * But in this implementation, if a class has only one component, it will still be loaded.
 *
 *
 * @author LingTalfi
 *
 */
class ClassAutoLoader
{

    private static $inst;
    private $directories;
    private $autoloadFunction;
    private $vendorModifiers;
    private $isOrdered;


    private function __construct()
    {
        $this->directories = [];
        $this->vendorModifiers = [];
        $this->isOrdered = false;
    }

    public static function getInst()
    {
        if (null === self::$inst) {
            self::$inst = new static();
        }
        return self::$inst;
    }

    /**
     * $modifier is a callback, or null.
     * This class resolves a className by first applying vendor modifiers, THEN directory modifiers.
     * A vendor modifier will modify the className.
     *
     * That className is ultimately turned into A relativePath before applying the directory modifiers.
     *
     * A directory modifier, is either null or a callback, and in that case it has the following definition:
     *
     *          relativePath    callback (relativePath, vendor)
     *
     * If the modifier is null, then the relativePath isn't changed for this directory.
     *
     *
     */
    public function addDirectory($directory, $modifier = null, $priority = 0)
    {
        if (false !== $realDir = realpath($directory)) {
            if (!array_key_exists($realDir, $this->directories)) {
                $this->directories[] = [$priority, $modifier, $realDir];
            }
        }
        else {
            return false;
            throw new \InvalidArgumentException(sprintf("directory is not an existing directory (%s)", $directory));
        }
        $this->isOrdered = false;
    }


    public function setVendorModifier($vendor, $modifier)
    {
        if (is_callable($modifier)) {
            $this->vendorModifiers[$vendor] = $modifier;
        }
        else {
            throw new \InvalidArgumentException("constraint must be a callable");
        }
        $this->isOrdered = false;
    }


    public function register($prepend = false)
    {
        // ensure that only ONE autoload function is registered
        if (null === $this->autoloadFunction) {
            $this->autoloadFunction = array($this, 'loadClass');
            spl_autoload_register($this->autoloadFunction, true, $prepend);
        }
    }

    public function unregister()
    {
        if ($this->autoloadFunction) {
            spl_autoload_unregister($this->autoloadFunction);
        }
    }


    public function loadClass($class)
    {
        if ($file = $this->findFile($class)) {
            require_once $file;
            return true;
        }
    }


    private function findFile($className)
    {

        if (false === $this->isOrdered) {
            $this->orderDirectories();
            $this->isOrdered = true;
        }
        $className = trim($className, '\\');

        // vendor modifiers
        $vendor = null;
        if (false !== $pos = strpos($className, '\\')) {
            $vendor = substr($className, 0, $pos);
            if (array_key_exists($vendor, $this->vendorModifiers)) {
                $className = call_user_func($this->vendorModifiers[$vendor], $className);
            }
        }

        // directory modifiers
        /**
         * Note: I replace backslash with forward slash (and not DIRECTORY_SEPARATOR),
         * because it makes it more uniform to work with (it doesn't depend on the OS,
         * so that will be easier to handle the code from your callback if any).
         *
         */
        $relPath = str_replace('\\', '/', $className) . '.php';

        foreach ($this->directories as $info) {

            list($priority, $modifier, $directory) = $info;

            $zeRelPath = $relPath;
            if (is_callable($modifier)) {
                $zeRelPath = call_user_func($modifier, $relPath, $vendor);
            }
            $realFile = $directory . '/' . $zeRelPath;
            if (is_file($realFile)) {
                return $realFile;
            }
        }
    }

    private function orderDirectories()
    {
        usort($this->directories, function ($info1, $info2) {
            if ($info1[0] > $info2[0]) {
                return 1;
            }
            elseif ($info1[0] < $info2[0]) {
                return -1;
            }
            return 0;
        });
    }

}

