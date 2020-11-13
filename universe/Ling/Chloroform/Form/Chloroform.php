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
     * This property holds the properties for this instance.
     * This is an array of custom properties for the developer to use.
     * I added this so that I could implement an @page(iframe-signal system).
     *
     * @var array
     */
    protected $properties;

    /**
     * This property holds the mode for this instance.
     * The possible values are:
     *
     * - insert
     * - update
     * - not_set (default)
     *
     * I found out that some of the field renderer need to know whether the form is in update or insert mode.
     * Using the form mode is not an obligation (hence the default value of not_set), however I recommend using it
     * as it eases development for everybody (I believe).
     *
     *
     *
     * @var string
     */
    protected $mode;

    /**
     * This property holds the jsCode for this instance.
     * @var string|null
     */
    protected $jsCode;

    /**
     * This property holds the cssId for this instance.
     * @var string|null
     */
    protected $cssId;

    /**
     * The array of fieldId => field errors.
     * This array is only fed after a call to the "validates" method.
     *
     *
     * @var array
     */
    protected $validationErrors;


    /**
     * Builds the Chloroform instance.
     */
    public function __construct()
    {
        $this->fields = [];
        $this->notifications = [];
        $this->properties = [];
        $this->validationErrors = [];
        $this->_postedData = null;
        $this->mode = 'not_set';
        $this->formId = "chloroform_one";
        $this->jsCode = null;
        $this->cssId = null;
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
     * Returns the formId of this instance.
     *
     * @return string
     */
    public function getFormId(): string
    {
        return $this->formId;
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
     * Note: by default the form will also inject the postedData values to the corresponding fields,
     * unless the injectValue flag is set to false.
     *
     *
     * @param bool $injectValue
     * @return bool
     * @throws \Exception
     */
    public function validates(bool $injectValue = true): bool
    {
        $postedData = $this->getPostedData();

        $validates = true;
        foreach ($this->fields as $id => $field) {

            $value = $this->getFieldPostedValue($field, $postedData);

            // value injection
            if (true === $injectValue) {
                $field->setValue($value);
            }

            if (false === $field->validates($value)) {
                /**
                 * Note: we don't break the loop to ensure that all the fields
                 * build their error messages.
                 */
                $this->validationErrors[$field->getId()] = $field->getErrors();
                $validates = false;
            }
        }

        return $validates;
    }

    /**
     * Returns the validationErrors of this instance.
     *
     * @return array
     */
    public function getValidationErrors(): array
    {
        return $this->validationErrors;
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
                $ret[$id] = $field->getFormattedValue();
            }
        }


        // deprecated?
//        $this->executeDataTransformers($ret);
        return $ret;
    }


//    /**
//     * Execute the data transformers (see the @page(DataTransformerInterface) for more details) on the given postedData.
//     *
//     * @param array $postedData
//     */
//    public function executeDataTransformers(array &$postedData)
//    {
//        foreach ($this->fields as $id => $field) {
//            if (null !== ($transformer = $field->getDataTransformer())) {
//                $value = BDotTool::getDotValue($id, $postedData);
//                $transformer->transform($value, $postedData, $field);
//                BDotTool::setDotValue($id, $value, $postedData);
//            }
//        }
//    }

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
     * Returns the mode of this instance.
     *
     * @return string
     */
    public function getMode(): string
    {
        return $this->mode;
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
     * Sets a property.
     *
     * @param string $key
     * @param $value
     */
    public function setProperty(string $key, $value)
    {
        $this->properties[$key] = $value;
    }

    /**
     * Sets the mode.
     *
     * @param string $mode
     */
    public function setMode(string $mode)
    {
        $this->mode = $mode;
    }

    /**
     * Sets the jsCode.
     *
     * @param string $jsCode
     */
    public function setJsCode(string $jsCode)
    {
        $this->jsCode = $jsCode;
    }

    /**
     * Sets the cssId.
     *
     * @param string $cssId
     */
    public function setCssId(string $cssId)
    {
        $this->cssId = $cssId;
    }


    /**
     * Returns whether the property identified by the given key exists.
     *
     * @param string $key
     * @return bool
     */
    public function hasProperty(string $key): bool
    {
        return array_key_exists($key, $this->properties);
    }

    /**
     * Returns the value of the property identified by the given key, or the default value otherwise.
     *
     * @param string $key
     * @param null $default
     * @return mixed
     */
    public function getProperty(string $key, $default = null)
    {
        if (array_key_exists($key, $this->properties)) {
            return $this->properties[$key];
        }
        return $default;
    }

    /**
     * Returns the jsCode of this instance.
     *
     * @return string
     */
    public function getJsCode(): string
    {
        return $this->jsCode;
    }

    /**
     * Returns the cssId of this instance.
     * Null is returned if the form cssId was not defined.
     *
     * @return string|null
     */
    public function getCssId(): ?string
    {
        return $this->cssId;
    }


    /**
     * Returns the array version (template friendly) of the form.
     * See the @page(chloroform array page) for more details.
     *
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
            "properties" => $this->properties,
            "mode" => $this->mode,
            "jsCode" => $this->jsCode,
            "cssId" => $this->cssId,
            "id" => $this->formId,
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