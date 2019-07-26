<?php


namespace Ling\Light_Kit_Admin\Notification;


/**
 * The LightKitAdminNotification class.
 */
class LightKitAdminNotification
{

    /**
     * This property holds the type for this instance.
     * The possible types are:
     *
     * - success (green)
     * - info (blue)
     * - warning (yellow/orange)
     * - error (red)
     *
     * @var string = null
     */
    protected $type;


    /**
     * This property holds the notifType for this instance.
     * The possible values are:
     * - alert
     * - toast
     *
     *
     * @var string = null
     */
    protected $notifType;

    /**
     * This property holds the title for this instance.
     * @var string = null
     */
    protected $title;

    /**
     * This property holds the body for this instance.
     * @var string = null
     */
    protected $body;

    /**
     * This property holds the css class for this instance.
     * @var string = null
     */
    protected $cssClass;


    /**
     * Builds the LightKitAdminNotification instance.
     */
    public function __construct()
    {
        $this->type = null;
        $this->notifType = null;
        $this->title = null;
        $this->body = null;
        $this->cssClass = null;
    }

    /**
     * Creates a notification instance of type success and returns it.
     *
     * @return LightKitAdminNotification
     */
    public static function createSuccess()
    {
        $ret = new static();
        $ret->type = "success";
        return $ret;
    }

    /**
     * Creates a notification instance of type null and returns it.
     *
     * @return LightKitAdminNotification
     */
    public static function createCustom()
    {
        $ret = new static();
        $ret->type = null;
        return $ret;
    }


    /**
     * Creates a notification instance of type info and returns it.
     *
     * @return LightKitAdminNotification
     */
    public static function createInfo()
    {
        $ret = new static();
        $ret->type = "info";
        return $ret;
    }

    /**
     * Creates a notification instance of type warning and returns it.
     *
     * @return LightKitAdminNotification
     */
    public static function createWarning()
    {
        $ret = new static();
        $ret->type = "warning";
        return $ret;
    }

    /**
     * Creates a notification instance of type error and returns it.
     *
     * @return LightKitAdminNotification
     */
    public static function createError()
    {
        $ret = new static();
        $ret->type = "error";
        return $ret;
    }


    /**
     * Sets the title, and returns the current instance.
     *
     * @param string $title
     * @return LightKitAdminNotification
     */
    public function title(string $title): LightKitAdminNotification
    {
        $this->title = $title;
        return $this;
    }

    /**
     * Sets the body and returns the current instance.
     *
     * @param string $body
     * @return LightKitAdminNotification
     */
    public function body(string $body): LightKitAdminNotification
    {
        $this->body = $body;
        return $this;
    }

    /**
     * Sets the notif type and returns the current instance.
     *
     * @param string $notifType
     * @return LightKitAdminNotification
     */
    public function notifType(string $notifType): LightKitAdminNotification
    {
        $this->notifType = $notifType;
        return $this;
    }

    /**
     * Sets the css class of the notification and returns the current instance.
     *
     * @param string $cssClass
     * @return LightKitAdminNotification
     */
    public function cssClass(string $cssClass): LightKitAdminNotification
    {
        $this->cssClass = $cssClass;
        return $this;
    }



    //--------------------------------------------
    // GETTERS
    //--------------------------------------------
    /**
     * Returns the type of this instance.
     *
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * Returns the notifType of this instance.
     *
     * @return string|null
     */
    public function getNotifType(): ?string
    {
        return $this->notifType;
    }

    /**
     * Returns the title of this instance.
     *
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * Returns the body of this instance.
     *
     * @return string|null
     */
    public function getBody(): ?string
    {
        return $this->body;
    }

    /**
     * Returns the cssClass of this instance.
     *
     * @return string|null
     */
    public function getCssClass(): ?string
    {
        return $this->cssClass;
    }


}