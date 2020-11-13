<?php


namespace Ling\Light_Realform\Result;

use Ling\Chloroform\Form\Chloroform;

/**
 * The RealformResult class.
 */
class RealformResult
{

    /**
     * This property holds the chloroform for this instance.
     * @var Chloroform
     */
    protected $chloroform;

    /**
     * This property holds the validPostedData for this instance.
     * @var array
     */
    protected $validPostedData;

    /**
     * This property holds the isSuccessful for this instance.
     * @var bool
     */
    protected $isSuccessful;

    /**
     * This property holds the redirectionUrl for this instance.
     * @var string|false=false
     */
    protected $redirectionUrl;

    /**
     * This property holds the nugget for this instance.
     * @var array
     */
    protected $nugget;


    /**
     * Builds the RealformResult instance.
     */
    public function __construct()
    {
        $this->chloroform = null;
        $this->validPostedData = [];
        $this->isSuccessful = false;
        $this->redirectionUrl = false;
        $this->nugget = [];
    }

    /**
     * Returns the chloroform of this instance.
     *
     * @return Chloroform
     */
    public function getChloroform(): Chloroform
    {
        return $this->chloroform;
    }

    /**
     * Sets the chloroform.
     *
     * @param Chloroform $chloroform
     */
    public function setChloroform(Chloroform $chloroform)
    {
        $this->chloroform = $chloroform;
    }

    /**
     * Returns the validPostedData of this instance.
     *
     * @return array
     */
    public function getValidPostedData(): array
    {
        return $this->validPostedData;
    }

    /**
     * Sets the validPostedData.
     *
     * @param array $validPostedData
     */
    public function setValidPostedData(array $validPostedData)
    {
        $this->validPostedData = $validPostedData;
    }

    /**
     * Returns the isSuccessful of this instance.
     *
     * @return bool
     */
    public function isSuccessful(): bool
    {
        return $this->isSuccessful;
    }

    /**
     * Sets the isSuccessful.
     *
     * @param bool $isSuccessful
     */
    public function setIsSuccessful(bool $isSuccessful)
    {
        $this->isSuccessful = $isSuccessful;
    }

    /**
     * Returns the redirectionUrl of this instance.
     *
     * @return false|string
     */
    public function getRedirectionUrl()
    {
        return $this->redirectionUrl;
    }

    /**
     * Sets the redirectionUrl.
     *
     * @param false|string $redirectionUrl
     */
    public function setRedirectionUrl($redirectionUrl)
    {
        $this->redirectionUrl = $redirectionUrl;
    }

    /**
     * Returns the nugget of this instance.
     *
     * @return array
     */
    public function getNugget(): array
    {
        return $this->nugget;
    }

    /**
     * Sets the nugget.
     *
     * @param array $nugget
     */
    public function setNugget(array $nugget)
    {
        $this->nugget = $nugget;
    }




}