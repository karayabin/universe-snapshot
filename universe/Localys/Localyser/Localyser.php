<?php


namespace Localys\Localyser;

use Localys\Exception\LocalysException;
use Localys\LocalysInterface;


/**
 * A Localys finder.
 *
 */
class Localyser implements LocalyserInterface
{

    private $defaultLang;
    private $namespace;
    private $localyses; // cache

    public function __construct()
    {
        $this->defaultLang = 'eng';
        $this->namespace = 'MyLocalys';
        $this->localyses = [];
    }

    public static function create()
    {
        return new static();
    }


    /**
     * @return LocalysInterface
     * @throws LocalysException
     */
    public function get($lang = null)
    {
        if (null === $lang) {
            $lang = $this->defaultLang;
        }
        $lang = strtolower($lang);
        if (false === array_key_exists($lang, $this->localyses)) {
            $className = $this->namespace . '\\' . ucfirst($lang) . "Localys";
            if (class_exists($className)) {
                $this->localyses[$lang] = new $className();
            } else {
                throw new LocalysException("Localyzer not found with lang $lang");
            }
        }
        return $this->localyses[$lang];
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    public function setNamespace($namespace)
    {
        $this->namespace = $namespace;
        return $this;
    }

    /**
     * @return LocalyserInterface
     */
    public function setDefaultLang($defaultLang)
    {
        $this->defaultLang = $defaultLang;
        return $this;
    }
}