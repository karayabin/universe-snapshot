<?php


namespace Ling\Light_UserData\Api;


use Ling\SimplePdoWrapper\SimplePdoWrapperInterface;

/**
 * The LightUserDataApiFactory class.
 */
class LightUserDataApiFactory
{

    /**
     * This property holds the pdoWrapper for this instance.
     * @var SimplePdoWrapperInterface
     */
    protected $pdoWrapper;

    /**
     * Builds the LightUserDataApiFactory instance.
     */
    public function __construct()
    {
        $this->pdoWrapper = null;
    }


    /**
     * Returns a DirectoryMapApiInterface.
     *
     * @return DirectoryMapApiInterface
     */
    public function getDirectoryMapApi(): DirectoryMapApiInterface
    {
        $o = new DirectoryMapApi();
        $o->setPdoWrapper($this->pdoWrapper);
        return $o;
    }

    /**
     * Returns a ResourceApiInterface.
     *
     * @return ResourceApiInterface
     */
    public function getResourceApi(): ResourceApiInterface
    {
        $o = new ResourceApi();
        $o->setPdoWrapper($this->pdoWrapper);
        return $o;
    }

    /**
     * Returns a ResourceHasTagApiInterface.
     *
     * @return ResourceHasTagApiInterface
     */
    public function getResourceHasTagApi(): ResourceHasTagApiInterface
    {
        $o = new ResourceHasTagApi();
        $o->setPdoWrapper($this->pdoWrapper);
        return $o;
    }

    /**
     * Returns a TagApiInterface.
     *
     * @return TagApiInterface
     */
    public function getTagApi(): TagApiInterface
    {
        $o = new TagApi();
        $o->setPdoWrapper($this->pdoWrapper);
        return $o;
    }





    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Sets the pdoWrapper.
     *
     * @param SimplePdoWrapperInterface $pdoWrapper
     */
    public function setPdoWrapper(SimplePdoWrapperInterface $pdoWrapper)
    {
        $this->pdoWrapper = $pdoWrapper;
    }


}
