<?php


namespace Ling\Chloroform\Validator;


use Ling\Chloroform\Field\FieldInterface;

/**
 * The CustomValidator class.
 * You can use this class to create custom validators.
 */
class CustomValidator implements ValidatorInterface
{

    /**
     * This property holds the testCallback for this instance.
     *
     * It's a callable to execute, which should return whether the test passes (true) or not (false).
     * The callable has the same signature as the test method of this class.
     *
     *
     *
     * @var callable
     */
    protected $testCallback;


    /**
     * Builds the CustomValidator instance.
     * @param callable $testCallback
     */
    public function __construct(callable $testCallback)
    {
        $this->testCallback = $testCallback;
    }


    /**
     * Builds and returns the CustomValidator instance.
     *
     * @param callable $testCallback
     * @return CustomValidator
     */
    public static function create(callable $testCallback)
    {
        return new static($testCallback);
    }

    /**
     * @implementation
     */
    public function test($value, string $fieldName, FieldInterface $field, string &$error = null): bool
    {
        return call_user_func_array($this->testCallback, [$value, $fieldName, $field, &$error]);
    }


    /**
     * @implementation
     */
    public function toArray(): array
    {
        return [
            "name" => get_called_class(),
        ];
    }

}