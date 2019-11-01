<?php


namespace Ling\Chloroform\Form;


use Ling\Bat\BDotTool;
use Ling\Chloroform\Exception\ChloroformException;
use Ling\Chloroform\Field\FieldInterface;
use Ling\Chloroform\Field\FormAwareFieldInterface;
use Ling\Chloroform\Field\HiddenField;
use Ling\Chloroform\FormNotification\FormNotificationInterface;
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
     * This property holds the formId for this instance.
     * This is helpful if your page contains multiple forms, to differentiate
     * which form was actually submitted.
     *
     * @var string = chloroform_one
     */
    protected $formId;


    /**
     * Builds the Chloroform instance.
     */
    public function __construct()
    {
        $this->fields = [];
        $this->notifications = [];
        $this->_postedData = null;
        $this->formId = "chloroform_one";
        $this->addField(HiddenField::create("chloroform_hidden_key", ['value' => $this->formId])->setHasVeryImportantData(false));

    }

    /**
     * Sets the formId.
     *
     * @param string $formId
     * @throws ChloroformException
     */
    public function setFormId(string $formId)
    {
        $this->formId = $formId;
        $this->getField("chloroform_hidden_key")->setValue($this->formId);
    }


    /**
     * Returns whether this form instance was posted.
     *
     * @return bool
     */
    public function isPosted(): bool
    {
        if (array_key_exists("chloroform_hidden_key", $_POST) && $this->formId === $_POST['chloroform_hidden_key']) {
            return true;
        }
        return false;
    }


    /**
     * Returns an array of posted data (for this instance).
     *
     * The posted data is empty if no form was posted, and otherwise is the
     * array described in @page(the postedData section).
     *
     *
     *
     * @return array
     * @throws \Exception
     */
    public function getPostedData(): array
    {
        if (false === $this->isPosted()) {
            throw new ChloroformException("The form hasn't been posted yet, the postedData is not available.");
        }

        if (null === $this->_postedData) {
            $this->_postedData = array_merge($_POST, PhpUploadFileFixTool::fixPhpFiles($_FILES, true));
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
     * @throws \Exception
     */
    public function validates(): bool
    {
        $postedData = $this->getPostedData();

        $validates = true;
        foreach ($this->fields as $id => $field) {

            $value = $this->getFieldPostedValue($field, $postedData);

            // value injection
            $field->setValue($value);

            if (false === $field->validates($value)) {
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
     * Returns the @page(very important data) of a form.
     *
     * @return array
     * @throws \Exception
     */
    public function getVeryImportantData(): array
    {
        if (false === $this->isPosted()) {
            throw new ChloroformException("The form hasn't been posted yet, the veryImportantData is not available.");
        }
        $ret = [];
        foreach ($this->fields as $id => $field) {
            if (true === $field->hasVeryImportantData()) {
                $ret[$id] = $field->getValue();
            }
        }
        return $ret;
    }


    /**
     * Execute the data transformers (see the @page(DataTransformerInterface) for more details) on the given postedData.
     *
     * @param array $postedData
     */
    public function executeDataTransformers(array &$postedData)
    {
        foreach ($this->fields as $id => $field) {
            if (null !== ($transformer = $field->getDataTransformer())) {
                $value = BDotTool::getDotValue($id, $postedData);
                $transformer->transform($value, $postedData, $field);
                BDotTool::setDotValue($id, $value, $postedData);
            }
        }
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
            $found = false;
            $value = BDotTool::getDotValue($fieldId, $values, null, $found);
            if (true === $found) {
                $field->setValue($value);
            }
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
     * isPosted: bool, whether this form instance was submitted.
     *
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
            "isPosted" => $this->isPosted(),
            "notifications" => $notificationsDetails,
            "fields" => $fieldsDetails,
            "errors" => $errors,
        ];
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Returns the field posted value for the given field and posted data.
     *
     *
     * @param FieldInterface $field
     * @param array $postedData
     * @return mixed|null
     */
    private function getFieldPostedValue(FieldInterface $field, array $postedData)
    {
        return BDotTool::getDotValue($field->getId(), $postedData, $field->getFallbackValue());
    }
}