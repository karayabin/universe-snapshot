<?php


namespace Ling\Logger\Listener;


/**
 * The first question a loggerListener must answer is:
 *
 * - do I respond to the log message or not?
 *
 *
 * This class provides one way of handling that question.
 * The logic is the following:
 *
 *
 * By default, no identifier will be listened to,
 * unless you specified some with the setIdentifiers method.
 *
 * If you want to listen to all identifiers by default, set the identifiers
 * to null setIdentifiers(null).
 *
 *
 * From then on, you can use the addIdentifier to add identifiers to the current set of "listened to" identifiers,
 * and/or the removeIdentifier to remove identifiers to the current set of "listened to" identifiers.
 *
 *
 */
abstract class AbstractLoggerListener implements LoggerListenerInterface
{

    private $identifiers;
    private $negativeIdentifiers;


    public function __construct()
    {
        $this->identifiers = [];
        $this->negativeIdentifiers = [];
    }

    public static function create()
    {
        return new static();
    }

    abstract protected function doListen($msg, $identifier);


    public function listen($msg, $identifier)
    {
        if (true === $this->willListen($identifier)) {
            $this->doListen($msg, $identifier);
        }
    }

    public function addIdentifier($identifier)
    {
        if (null !== $this->identifiers) {
            $this->identifiers[] = $identifier;
        }
        return $this;
    }

    public function removeIdentifier($identifier)
    {
        $this->negativeIdentifiers[] = $identifier;
        return $this;
    }

    public function setIdentifiers(array $identifiers = null)
    {
        $this->identifiers = $identifiers;
        return $this;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    protected function willListen($identifier)
    {
        if (in_array($identifier, $this->negativeIdentifiers, true)) {
            return false;
        }
        if (null === $this->identifiers) {
            return true;
        }
        return in_array($identifier, $this->identifiers, true);
    }
}