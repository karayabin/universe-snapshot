<?php


namespace Ling\Chloroform\Form;


use Ling\Chloroform\Exception\ChloroformException;
use Ling\Chloroform\Field\FieldInterface;
use Ling\Chloroform\Field\FormAwareFieldInterface;
use Ling\Chloroform\Field\PostedDataAwareFieldInterface;
use Ling\Chloroform\FormNotification\FormNotificationInterface;
use Ling\Chloroform\Helper\FieldHelper;
use Ling\Chloroform\Validator\ValidatorInterface;
use Ling\PhpUploadFileFix\PhpUploadFileFixTool;

/**
 * The Chloroform class.
 */
class Chloroform
{


    /**
     * This property holds the fields for this instance.
     * @var FieldInterface[]
     */
    protected $fields;

    /**
     * This property holds the notifications for this instance.
     * @var FormNotificationInterface[]
     */
    protected $notifications;

    /**
     * This property holds the _postedData for this instance.
     * It's a cached data used to improve performances.
     *
     * @var array
     */
    private $_postedData;

    /**
     * Builds the Chloroform instance.
     */
    public function __construct()
    {
        $this->fields = [];
        $this->notifications = [];
        $this->_postedData = null;
    }


    /**
     * Returns whether this form instance was posted.
     *
     * @return bool
     */
    public function isPosted(): bool
    {
        $postedData = $this->getPostedData();
        return (false === empty($postedData));
    }


    /**
     * Returns an array of posted data.
     *
     * The posted data is empty if no form was posted, and otherwise is the
     * array described in @page(the postedData section).
     *
     * Note: you should not override this method. If your postedData are "special", you should override the
     * createPostedData method.
     *
     *
     *
     * @return array
     */
    public function getPostedData(): array
    {
        if (null === $this->_postedData) {
            $this->_postedData = $this->createPostedData();
        }
        return $this->_postedData;

    }


    /**
     * Returns whether all fields attached to this form validate.
     *
     * A field validates if all its validators validate.
     * By default, if no validator exists, a field validates.
     *
     *
     * Note: the form will also inject the postedData values to the corresponding fields.
     *
     *
     * @return bool
     */
    public function validates(): bool
    {
        $postedData = $this->getPostedData();

        $validates = true;
        foreach ($this->fields as $id => $field) {

            if (false === $field->validates($postedData, true)) {
                /**
                 * Note: we don't break the loop to ensure that all the fields
                 * build their error messages.
                 */
                $validates = false;
            }
        }

        return $validates;
    }

    /**
     * Returns the fields of this instance.
     * It's an array of field id => field instance.
     *
     * @return FieldInterface[]
     */
    public function getFields(): array
    {
        return $this->fields;
    }


    /**
     * Returns the field which id is given.
     *
     *
     * @param string $fieldId
     * @return FieldInterface
     * @throws ChloroformException
     */
    public function getField(string $fieldId): FieldInterface
    {

        if (array_key_exists($fieldId, $this->fields)) {
            return $this->fields[$fieldId];
        }
        throw new ChloroformException("The field with id $fieldId doesn't exist.");
    }

    /**
     * Inject the given values in the corresponding fields.
     * This method is typically used in an update form, to have the first instantiation of your form filled
     * with the "old" values.
     *
     * Note: the keys are @concept(the field ids).
     *
     *
     *
     * @param array $values
     */
    public function injectValues(array $values)
    {
        foreach ($this->fields as $fieldId => $field) {
            $value = FieldHelper::getFieldValue($fieldId, $values);
            $field->setValue($value);
        }
    }


    /**
     * Adds a field to this instance.
     *
     * @param FieldInterface $field
     * @param ValidatorInterface[] $validators
     */
    public function addField(FieldInterface $field, array $validators = [])
    {


        if ($field instanceof FormAwareFieldInterface) {
            $field->setForm($this);
        }

        foreach ($validators as $validator) {
            $field->addValidator($validator);
        }
        $this->fields[$field->getId()] = $field;
    }


    /**
     * Adds a notification to this instance.
     *
     * @param FormNotificationInterface $notification
     */
    public function addNotification(FormNotificationInterface $notification)
    {
        $this->notifications[] = $notification;
    }

    /**
     * Returns the notifications of this instance.
     *
     * @return FormNotificationInterface[]
     */
    public function getNotifications(): array
    {
        return $this->notifications;
    }


    /**
     * Returns the array version (template friendly) of the form.
     *
     * The blueprint looks like this:
     *
     *
     * ```yaml
     * notifications:
     *      -
     *          type: string, the type of notification (success, info, warning, error)
     *          msg: string, the message of the notification
     * errors: a summary of the form errors (for the templates to use).
     *          It's actually nothing more than the fields errors put altogether here.
     *
     * fields:
     *      -
     *          the array version of the field (see the @page(FieldInterface->toArray method) for more info)
     *
     * ```
     *
     *
     * @return array
     *
     */
    public function toArray(): array
    {
        $notifs = $this->getNotifications();
        $fields = $this->getFields();
        $errors = [];

        $notificationsDetails = [];
        $fieldsDetails = [];


        // notifications
        foreach ($notifs as $notification) {
            $notificationsDetails[] = [
                "type" => $notification->getType(),
                "message" => $notification->getMessage(),
            ];
        }


        // fields
        foreach ($fields as $fieldId => $field) {
            $fieldsDetails[$fieldId] = $field->toArray();

            $fieldErrors = $field->getErrors();
            if ($fieldErrors) {
                $errors[$fieldId] = $fieldErrors;
            }

        }

        return [
            "notifications" => $notificationsDetails,
            "fields" => $fieldsDetails,
            "errors" => $errors,
        ];
    }


    //--------------------------------------------
    //
    //--------------------------------------------

    /**
     * Creates and returns the postedData array, as defined in @page(the postedData section).
     * @return array
     * @overrideMe
     */
    protected function createPostedData(): array
    {
        return array_merge($_POST, PhpUploadFileFixTool::fixPhpFiles($_FILES, true));
    }
}