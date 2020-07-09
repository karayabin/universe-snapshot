<?php


namespace Ling\SimplePdoWrapper\Exception;



/**
 * The SimplePdoWrapperQueryException class.
 */
class SimplePdoWrapperQueryException extends SimplePdoWrapperException
{

    /**
     * This property holds the query for this instance.
     * @var string
     */
    protected $query;

    /**
     * This property holds the markers for this instance.
     * @var array
     */
    protected $markers;





    /**
     * Returns the query of this instance.
     *
     * @return string
     */
    public function getQuery(): string
    {
        return $this->query;
    }

    /**
     * Sets the query.
     *
     * @param string $query
     */
    public function setQuery(string $query)
    {
        $this->query = $query;
    }

    /**
     * Sets the message for this exception.
     * @param string $message
     */
    public function setMessage(string $message){
        $this->message = $message;
    }

    /**
     * Returns the markers of this instance.
     *
     * @return array
     */
    public function getMarkers(): array
    {
        return $this->markers;
    }

    /**
     * Sets the markers.
     *
     * @param array $markers
     */
    public function setMarkers(array $markers)
    {
        $this->markers = $markers;
    }


}