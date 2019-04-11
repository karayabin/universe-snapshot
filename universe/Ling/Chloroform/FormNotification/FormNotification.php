<?php


namespace Ling\Chloroform\FormNotification;


/**
 * The FormNotification class.
 */
class FormNotification implements FormNotificationInterface
{


    /**
     * This property holds the type for this instance.
     * @var string
     */
    protected $type;


    /**
     * This property holds the message for this instance.
     * @var string
     */
    protected $message;


    /**
     * Builds the FormNotification instance.
     * @param string $type
     * @param string $message
     */
    public function __construct(string $type, string $message)
    {
        $this->type = $type;
        $this->message = $message;
    }


    /**
     * @implementation
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @implementation
     */
    public function getMessage(): string
    {
        return $this->message;
    }
}