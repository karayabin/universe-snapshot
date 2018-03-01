<?php


namespace XiaoApi\Object;


use XiaoApi\Observer\ObserverInterface;

class CrudObject
{
    /**
     * Enable/Disable the hooks.
     *
     * When you're creating your own objects,
     * you sometimes want to re-use other generated (tableCrud) objects,
     * which by default use hooks.
     * You can disable those hooks temporarily by using this $enableHooks property.
     * Don't forget to put it back to true when you're done.
     */
    public static $enableHooks = true;

    /**
     * @var ObserverInterface
     */
    private $observer;

    public function __construct()
    {
        $this->observer = null;
    }

    public function setObserver(ObserverInterface $observer)
    {
        $this->observer = $observer;
        return $this;
    }

    public function hook($hookType, $data)
    {
        if (true === self::$enableHooks && null !== $this->observer) {
            $this->observer->hook($hookType, $data);
        }
    }

    public static function getInst()
    {
        return new static();
    }
}