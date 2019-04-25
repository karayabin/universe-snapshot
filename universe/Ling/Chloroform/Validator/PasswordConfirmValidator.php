<?php


namespace Ling\Chloroform\Validator;


use Ling\Bat\BDotTool;
use Ling\Chloroform\Exception\ChloroformException;
use Ling\Chloroform\Field\FieldInterface;
use Ling\Chloroform\Field\PasswordField;

/**
 * The PasswordConfirmValidator class.
 *
 */
class PasswordConfirmValidator extends AbstractValidator
{

    /**
     * This property holds the otherFieldId for this instance.
     * @var string
     */
    protected $otherFieldId;

    /**
     * Sets the otherFieldId.
     *
     * @param string $otherFieldId
     * @return $this
     */
    public function setOtherFieldId(string $otherFieldId)
    {
        $this->otherFieldId = $otherFieldId;
        return $this;
    }


    /**
     * @implementation
     */
    public function test($value, string $fieldName, FieldInterface $field, string &$error = null): bool
    {

        if (null === $this->otherFieldId) {
            throw new ChloroformException("The otherFieldId is not set");
        }


        if ($field instanceof PasswordField) {

            $form = $field->getForm();
            $postedData = $form->getPostedData();


            $found = false;
            $otherFieldValue = BDotTool::getDotValue($this->otherFieldId, $postedData, null, $found);
            if (false === $found) {
                throw new ChloroformException("No value found in the postedData for the other field ($this->otherFieldId)");
            }


            if ($otherFieldValue !== $value) {

                $otherField = $form->getField($this->otherFieldId);
                $arr = $otherField->toArray();
                $otherFieldName = $arr['errorName'];


                $error = $this->getErrorMessage("main", [
                    "fieldName" => $fieldName,
                    "otherFieldName" => $otherFieldName,
                ]);
                return false;
            }
            return true;
        } else {
            throw new ChloroformException("This validator only works with a PasswordField.");
        }
    }


    /**
     * @overrides
     */
    public function toArray(): array
    {
        return array_merge(parent::toArray(), [
            "other_field_id" => $this->otherFieldId,
        ]);
    }


}