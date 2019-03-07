<?php


namespace Ling\DocTools\Info;




/**
 * The ThrownExceptionInfo class represents information about a "@throws" tag,
 * written in a method.
 */
class ThrownExceptionInfo implements InfoInterface
{

    /**
     * This property holds the shortName of the exception.
     * @var string
     */
    protected $shortName;


    /**
     * This property holds the longName of the exception.
     * @var string
     */
    protected $longName;


    /**
     * This property holds the url to the documentation page for this exception.
     * @var string
     */
    protected $url;

    /**
     * This property holds the comment text associated with this exception.
     * @var string
     */
    protected $text;


    /**
     * Builds the ThrownExceptionInfo instance.
     */
    public function __construct()
    {
        $this->shortName = null;
        $this->longName = null;
        $this->url = null;
        $this->text = null;
    }

    /**
     * Returns the shortName of this instance.
     *
     * @return string
     */
    public function getShortName(): string
    {
        return $this->shortName;
    }

    /**
     * Sets the shortName.
     *
     * @param string $shortName
     */
    public function setShortName(string $shortName)
    {
        $this->shortName = $shortName;
    }

    /**
     * Returns the longName of this instance.
     *
     * @return string
     */
    public function getLongName(): string
    {
        return $this->longName;
    }

    /**
     * Sets the longName.
     *
     * @param string $longName
     */
    public function setLongName(string $longName)
    {
        $this->longName = $longName;
    }

    /**
     * Returns the url of this instance.
     *
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * Sets the url.
     *
     * @param string $url
     */
    public function setUrl(string $url)
    {
        $this->url = $url;
    }

    /**
     * Returns the text of this instance.
     *
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * Sets the text.
     *
     * @param string $text
     */
    public function setText(string $text)
    {
        $this->text = $text;
    }




}