<?php


namespace Ling\Chloroform\Validator;


use Ling\Bat\ClassTool;
use Ling\Chloroform\Exception\ChloroformException;

/**
 * The AbstractValidator class.
 *
 * A helper class that most validators will extend (except for the CustomValidator).
 *
 */
abstract class AbstractValidator implements ValidatorInterface
{


    /**
     * This property holds the messagesDir for this instance.
     * @var string
     */
    protected $messagesDir;

    /**
     * This property holds the customMessages for this instance.
     * It's an array of message identifier => (symbolic) error message (i.e. symbolic means with tags).
     *
     * @var array
     */
    protected $customMessages;


    /**
     * Builds the AbstractValidator instance.
     */
    public function __construct()
    {
        $this->messagesDir = $this->getDefaultMessagesDir(__DIR__);
        $this->customMessages = [];
    }


    /**
     * Builds and returns the instance for this class.
     *
     * @return $this
     */
    public static function create()
    {
        return new static();
    }


    /**
     * @implementation
     */
    public function toArray(): array
    {
        return [
            "name" => get_called_class(),
            "custom_messages" => $this->customMessages,
            "messages" => $this->getMessages(),
        ];
    }


    /**
     * Overrides a default error message, and returns this instance (for chaining).
     *
     * The errorMessage can use the same tags as the replaced default error message (i.e. {fieldName}, {min}, ...).
     *
     * If the message identifier is not specified, it will defaults to main.
     *
     * @param string $errorMessage
     * @param string|null $messageIdentifier
     * @return $this
     */
    public function setErrorMessage(string $errorMessage, string $messageIdentifier = null)
    {
        if (null === $messageIdentifier) {
            $messageIdentifier = 'main';
        }
        $this->customMessages[$messageIdentifier] = $errorMessage;
        return $this;
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Returns the error message for the called object (this).
     *
     *
     * The error messages are stored in txt files in the messages directory, next to this class file.
     * They are stored by a 3-letter lang code, defined by the @object(ValidatorConfig object).
     * A message file is named after the class it provides messages for.
     *
     * A message file can contain more than one error messages (because some validators can
     * produce more than one error message), and so the message file give identifiers to each message.
     *
     * If there is only one message, the identifier is generally "main" (by convention).
     *
     * Each line of the message file is formatted using the following format:
     *
     * ```txt
     * $identifier: $message
     * ```
     *
     * Where $identifier is the identifier, and $message is the error message corresponding to that identifier.
     *
     *
     * The error messages can also be overridden by the user with the setErrorMessage method.
     *
     *
     * @param string $msgId
     * @param array $variables
     * @return string
     * @throws ChloroformException
     */
    protected function getErrorMessage(string $msgId, array $variables): string
    {

        if (array_key_exists($msgId, $this->customMessages)) {
            $errorMsg = $this->customMessages[$msgId];
        } else {

            $validatorName = ClassTool::getShortName($this);
            $messagesFile = $this->messagesDir . "/$validatorName.txt";
            $lines = $this->getMessages();
            $found = false;
            foreach ($lines as $line) {
                if (0 === strpos($line, $msgId . ':')) {
                    $p = explode(":", $line, 2);
                    $errorMsg = trim($p[1]);
                    $found = true;
                    break;
                }
            }
            if (false === $found) {
                throw new ChloroformException("Message id not found: $msgId in $messagesFile");
            }
        }


        // formatting the symbolic error message
        $keys = array_map(function ($v) {
            return '{' . $v . '}';
        }, array_keys($variables));
        $values = array_values($variables);

        return str_replace($keys, $values, $errorMsg);
    }


    /**
     * Returns an array of the lines of the error messages file for this validator.
     *
     *
     * The returned array structure depends on the $identifierAsKey argument.
     *
     * If false, each entry of the array is a line of the messages file.
     * Note: in the messages file, a line looks like this:
     *
     *
     * ```txt
     * $identifier: $message
     * ```
     *
     *
     * If true, each entry of the array is actually a pair of key/value, where the
     * key is the identifier, and the value is the message.
     *
     *
     *
     *
     * @param bool $identifierAsKey = false
     * @return array
     * @throws ChloroformException
     */
    protected function getMessages(bool $identifierAsKey = false): array
    {
        $validatorName = ClassTool::getShortName($this);
        $messagesFile = $this->messagesDir . "/$validatorName.txt";
        if (file_exists($messagesFile)) {
            $lines = file($messagesFile, FILE_SKIP_EMPTY_LINES | FILE_IGNORE_NEW_LINES);
            if (false === $identifierAsKey) {
                return $lines;
            } else {
                $ret = [];
                foreach ($lines as $line) {
                    $p = explode(":", $line, 2);
                    $ret[$p[0]] = trim($p[1]);
                }
                return $ret;
            }
        } else {
            throw new ChloroformException("Message file not found: $messagesFile");
        }
    }


    /**
     * Returns a default/standard location for the messages directory.
     * You can use this if you create new validators from another planet.
     *
     * @param string $baseDir
     * @return string
     */
    protected function getDefaultMessagesDir(string $baseDir): string
    {
        return $baseDir . "/messages/" . ValidatorConfig::$lang;
    }
}