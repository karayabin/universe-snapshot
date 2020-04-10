<?php


namespace Ling\Chloroform\Field;


use Ling\Bat\StringTool;
use Ling\Chloroform\DataTransformer\DataTransformerInterface;
use Ling\Chloroform\Validator\ValidatorInterface;


/**
 * The DecorativeField class.
 *
 * The idea of this class is to encode for any type of decorative element of the form.
 * Rather than creating one class per type of decorative element, this class can represent
 * any type of decorative element.
 *
 * This is done via the deco_type property of this class.
 *
 *
 * We recommend the following types, however you are free to create your owns:
 *
 * - hr: a separator
 *
 *
 *
 */
class DecorativeField implements FieldInterface
{

    /**
     * This property holds the cpt for this instance.
     * @var int
     */
    private static $cpt = 1;


    /**
     * This property holds the decoration type for this instance.
     * @var string
     */
    protected $decorationType;

    /**
     * This property holds the decorationOptions for this instance.
     * @var array
     */
    protected $decorationOptions;

    /**
     * This property holds the id for this instance.
     * @var string
     */
    protected $id;


    /**
     * Builds the DecorativeField instance.
     *
     * The properties for a decorative field are:
     *
     * - ?deco_type: string, the type of the decorative field (defaults to undefined)
     * - ?deco_options: array, some options for the decorative field, depends on the concrete renderer too
     * - ?id: string, the identifier of the field (its reference name when used by a chloroform instance)
     *
     *
     * @param array $properties
     */
    public function __construct(array $properties = [])
    {
        $cpt = self::$cpt++;
        $this->decorationType = $properties['deco_type'] ?? "undefined";
        $this->decorationOptions = $properties['deco_options'] ?? [];
        $this->id = $properties['id'] ?? StringTool::getUniqueCssId("decorative-field-$cpt-");
    }


    /**
     * @implementation
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @implementation
     */
    public function addValidator(ValidatorInterface $validator)
    {
        // nothing to do
    }

    /**
     * @implementation
     */
    public function setDataTransformer(DataTransformerInterface $dataTransformer): FieldInterface
    {
        // nothing to do
        return $this;
    }

    /**
     * @implementation
     */
    public function validates($value): bool
    {
        return true;
    }

    /**
     * @implementation
     */
    public function getErrors(): array
    {
        return [];
    }

    /**
     * @implementation
     */
    public function setValue($value)
    {
        // nothing to do
    }

    /**
     * @implementation
     */
    public function getValue()
    {
        return null;
    }

    /**
     * @implementation
     */
    public function getFallbackValue()
    {
        return null;
    }

    /**
     * @implementation
     */
    public function toArray(): array
    {
        return [
            "id" => $this->getId(),
            "label" => null,
            "hint" => null,
            "errorName" => "",
            "value" => "",
            "htmlName" => "",
            "errors" => [],
            "className" => get_called_class(),
            "deco_type" => $this->getDecorationType(),
            "deco_options" => $this->getDecorationOptions(),
        ];
    }

    /**
     * @implementation
     */
    public function hasVeryImportantData(): bool
    {
        return false;
    }

    /**
     * @implementation
     */
    public function getDataTransformer(): ?DataTransformerInterface
    {
        return null;
    }


    /**
     * @implementation
     */
    public function setProperties(array $properties)
    {
        return null;
    }

    /**
     * @implementation
     */
    public function setProperty(string $name, $value)
    {
        return null;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Returns the type of this instance.
     *
     * @return string
     */
    public function getDecorationType(): string
    {
        return $this->decorationType;
    }

    /**
     * Returns the decorationOptions of this instance.
     *
     * @return array
     */
    public function getDecorationOptions(): array
    {
        return $this->decorationOptions;
    }
}