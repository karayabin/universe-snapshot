<?php


namespace Ling\Chloroform_HeliumRenderer;


use Ling\Bat\CaseTool;
use Ling\Bat\StringTool;
use Ling\Chloroform\FormNotification\FormNotificationInterface;
use Ling\Chloroform\Renderer\ChloroformRendererInterface;
use Ling\Chloroform_HeliumRenderer\Exception\ChloroformHeliumRendererException;


/**
 * The HeliumRenderer class.
 *
 * I set print methods to public, in case you want to reuse this class bit by bit, instead
 * of using the render method.
 *
 *
 * This class has some external dependencies:
 *
 * - jquery (I used 3.4 for development)
 *
 * And some internal dependencies:
 * - the js file (helium.js is provided with this planet)
 * - the css file (helium.css is provided with this planet)
 *
 * The helium.js file must be called AFTER jquery.
 *
 *
 *
 * data-main=...
 * ===============
 * For every field, I add a data-main attribute with value equals to the field identifier.
 * This is for the js validator: it basically tells the js validator: "hey, I'm the main field to update".
 * Why do I need this?
 * Because for some fields (like TimeField or even a simple CheckboxField), it might be confusing as to which element
 * to give the focus on when you click the link in the error summary for that field.
 *
 * Reminder: the error summary is the list of errors at the top of the form. And so the idea is that each element of
 * this list is actually a link that focuses the culprit field. And so to the question: "what field exactly is the culprit field
 * that I should focus on?", then the answer is: "the field with data-main=1".
 *
 * Important note: the focused element is not necessarily a control element, it can also be any html element (like a span for instance),
 * as this is the case with the CheckboxField and RadioField in this particular class.
 * And so in this case, the validator would anchor to the element, but not focus it (because afaik you can't focus a span for instance).
 *
 *
 *
 *
 * inline errors
 * ============
 * Inline errors should be appended to:
 *
 * - a label tag if this label tag contains a .field-label element (see the printFieldLabel method for more info)
 * - the .field-inline-errors element (see printCheckboxField and printRadioField methods for some examples).
 *
 *
 *
 *
 *
 *
 *
 *
 */
class HeliumRenderer implements ChloroformRendererInterface
{


    /**
     * This property holds the options for this instance.
     * The options array can contain the following:
     *
     * - method: string=POST. The value of the "method" attribute of the form tag.
     * - action: string=<empty string>. The value of the "action" attribute of the form tag.
     * - useEnctypeMultiformData: bool=false. Whether to use the enctype=multipart/form-data encoding on the form tag.
     * - showOnlyFirstError: bool=true. For a given field, show only the first error (if the field contains multiple errors).
     * - strict: bool=true. Defines the behaviour when the renderer doesn't know how to interpret a given field.
     *              If true (strict mode), an exception is thrown.
     *              If false (non strict mode), the field is ignored.
     * - text: array containing all language specific related strings.
     *      - submitButtonValue: string=Submit. The value of the submit button.
     *      - errorSummaryTitle: string="There's a problem". The text of the error summary title (displayed only if the form contains static errors).
     *      - hours: string=hours. Text used in time and datetime fields.
     *      - minutes: string=minutes. Text used in time and datetime fields.
     *      - seconds: string=seconds. Text used in time and datetime fields.
     *
     * - displayErrorMode: string=both (both | inline | summary). How to display error messages: whether inline (i.e. above the form fields),
     *          in an error summary at the top of the form (summary mode), or both at the same time.
     * - useValidation: bool=true. Set it to false to debug static validation, or if you don't need js validation at all.
     * - printJsHandler: bool=true. Whether the render method should print the js handler. If false, you are responsible for printing the js handler manually wherever you see fit (usually just before the body tag).
     * - printSubmitButton: bool=true. Whether to render the submit button.
     * - printFormTag: bool=true. Whether to render the form tag.
     * - formStyle: string=stack (stack|horizontal). Which bootstrap 4 style to use to render the fields.
     *                  With stack, the form control is below the label,
     *                  with horizontal, the form control is to the right of the label.
     *
     *
     *
     * @var array
     */
    protected $options;


    /**
     * This property holds the displayInlineErrors for this instance.
     * @var bool = true
     */
    protected $displayInlineErrors;

    /**
     * This property holds the displayErrorSummary for this instance.
     * @var bool = true
     */
    protected $displayErrorSummary;


    /**
     * This property holds the css id of the form.
     * This property becomes only available when the render method is called.
     *
     * @var string
     */
    protected $_formCssId;

    /**
     * This property holds the _chloroform array for this instance.
     * This property becomes only available when the render method is called.
     * @var array
     */
    protected $_chloroform;


    /**
     * Builds the HeliumRenderer instance.
     *
     * @param array $options
     * See the options property (in this class) for more info.
     *
     */
    public function __construct(array $options = [])
    {
        $this->options = array_replace_recursive([
            "method" => "POST",
            "action" => "",
            "useEnctypeMultiformData" => false,
            "showOnlyFirstError" => true,
            "strict" => true,
            "text" => [
                "submitButtonValue" => "Submit",
                "errorSummaryTitle" => "There's a problem",
                "hours" => "hours",
                "minutes" => "minutes",
                "seconds" => "seconds",
            ],
            "displayErrorMode" => "both",
            "useValidation" => true,
            "printJsHandler" => true,
            "printSubmitButton" => true,
            "printFormTag" => true,
            "formStyle" => "stack",
            "cssId" => StringTool::getUniqueCssId(),

        ], $options);


        /**
         * Note: I used a proxy property displayErrorMode to protect the user from accidentally
         * disabling two error modes, leaving her with a form that doesn't display error messages at all.
         */
        if ('summary' === $this->options['displayErrorMode']) {
            $this->displayErrorSummary = true;
            $this->displayInlineErrors = false;
        } elseif ('inline' === $this->options['displayErrorMode']) {
            $this->displayErrorSummary = false;
            $this->displayInlineErrors = true;
        } else {
            $this->displayErrorSummary = true;
            $this->displayInlineErrors = true;
        }

        $this->_formCssId = $this->options['cssId'];
        $this->_chloroform = [];

    }


    /**
     * Stores the chloroform array in memory.
     *
     * You should use this method before (and along with) printFormTagOpening, printFormContent and printFormTagClosing
     * if you need to use a custom submit button for instance.
     *
     * Otherwise the simpler render method should be enough.
     *
     *
     * @param array $chloroform
     */
    public function prepare(array $chloroform)
    {

        // storing cache vars
        $this->_chloroform = $chloroform;
        if (array_key_exists("cssId", $chloroform) && null !== $chloroform['cssId']) {
            $this->_formCssId = $chloroform['cssId'];
        }
    }

    /**
     * @implementation
     */
    public function render(array $chloroform): string
    {


        $this->prepare($chloroform);

        ob_start();


        if (true === $this->options['printFormTag']) {
            $this->printFormTagOpening();
        }


        $this->printFormContent();


        ?>


        <?php if (true === $this->options['printSubmitButton']): ?>
        <button type="submit" class="submitButton btn btn-primary">
            <?php echo $this->options['text']['submitButtonValue']; ?>
        </button>
    <?php endif; ?>


        <?php

        if (true === $this->options['printFormTag']) {
            $this->printFormTagClosing();
        }


        if (true === $this->options['printJsHandler']) {
            $this->printJsHandler();
        }


        $this->printCustomScripts();

        return ob_get_clean();
    }


    /**
     * Prints the form content (notifications, error summary, and fields), but not the
     * form tag itself.
     *
     *
     * @throws \Exception
     */
    public function printFormContent()
    {

        $properties = $this->_chloroform['properties'];
        //--------------------------------------------
        // IFRAME SIGNAL TECHNIQUE
        //--------------------------------------------
        if (array_key_exists("iframe-signal", $properties)) {
            // as for now we cannot change the css id, this might change if I need it...
            $value = $properties['iframe-signal'];
            echo '<div style="display: none;" id="iframe-signal" data-value="' . htmlspecialchars($value) . '"></div>';
        }

        $this->printNotifications($this->_chloroform['notifications']);
        $this->printErrorSummary($this->_chloroform['errors']);
        $this->printFields($this->_chloroform['fields']);
        $this->printJsCode($this->_chloroform['jsCode']);
    }

    /**
     * Prints the opening form tag.
     */
public function printFormTagOpening()
{
    $isPosted = $this->_chloroform["isPosted"];
    $sPosted = (true === $isPosted) ? "helium-was-validated" : "";
    ?>
    <form id="<?php echo $this->_formCssId; ?>" novalidate class="helium <?php echo $sPosted; ?> cfi-form"
          data-cfi-id="<?php echo htmlspecialchars($this->_chloroform['id']); ?>"
          method="<?php echo $this->options['method']; ?>"
          action="<?php echo htmlspecialchars($this->options['action']); ?>"
        <?php if (true === $this->options['useEnctypeMultiformData']): ?>
            enctype="multipart/form-data"
        <?php endif; ?>
    >
        <?php
        }


        /**
         * Prints the closing form tag.
         */
        public function printFormTagClosing()
        {
        ?>
    </form>
    <?php
}



    //--------------------------------------------
    //
    //--------------------------------------------

    /**
     * Prints the given notifications.
     *
     * See the @page(Chloroform toArray) method for more info about the notifications structure.
     *
     * @param array $notifications
     */
    public function printNotifications(array $notifications)
    {
        foreach ($notifications as $notification) {


            if ($notification instanceof FormNotificationInterface) {
                $notification = [
                    "type" => $notification->getType(),
                    "message" => $notification->getMessage(),
                ];
            }

            $type = $notification['type'];
            switch ($type) {
                case "info":
                    $type = "primary";
                    break;
                case "error":
                    $type = "danger";
                    break;
                default:
                    break;
            }


            ?>
            <div class="notification alert alert-<?php echo htmlspecialchars($type); ?> alert-dismissible fade show"
                 role="alert">
                <?php echo $notification['message']; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php
        }
    }


    /**
     *
     * Prints the given errors.
     *
     * See the @page(Chloroform toArray) method for more info about the errors structure.
     *
     * @param array $errors
     */
    public function printErrorSummary(array $errors)
    {

        /**
         * Note: even if we don't display the error summary, we still inject the html code,
         * as a template to help implementing the js validation mechanism.
         */
        $hasErrors = (bool)count($errors);

        $sClass = "";
        if (false === $this->displayErrorSummary || false === $hasErrors) {
            $sClass = "is-hidden";
        }


        ?>
        <div class="alert alert-danger errorSummary <?php echo htmlspecialchars($sClass); ?>" role="alert">
            <h4 id="errorSummary-heading"
                class="alert-heading"><?php echo $this->options['text']['errorSummaryTitle']; ?></h4>
            <ul class="list-unstyled">
                <?php foreach ($errors as $id => $fieldErrors):
                    if (true === $this->options['showOnlyFirstError']) {
                        $fieldErrors = [array_shift($fieldErrors)];
                    }
                    ?>
                    <?php foreach ($fieldErrors as $error): ?>
                    <li class="summary-field-error"><a href="#<?php echo $id; ?>"
                                                       class="alert-link"><?php echo $error; ?></a></li>
                <?php endforeach; ?>

                <?php endforeach; ?>
            </ul>

        </div>
        <?php
    }


    /**
     *
     * Prints the given fields.
     *
     * See the @page(Chloroform toArray) method for more info about the fields structure.
     *
     * @param array $fields
     * @throws \Exception
     */
    public function printFields(array $fields)
    {
        foreach ($fields as $field) {
            $this->printField($field);
        }
    }

    /**
     *
     * Prints the given field.
     *
     * See the @page(Chloroform toArray) method for more info about the fields structure.
     *
     * @param array $field
     * @throws \Exception
     */
    public function printField(array $field)
    {
        $className = $field['className'];
        switch ($className) {
            case "Ling\Chloroform\Field\StringField":
                $this->printStringField($field);
                break;
            case "Ling\Chloroform\Field\TextField":
                $this->printTextField($field);
                break;
            case "Ling\Chloroform\Field\NumberField":
                $this->printNumberField($field);
                break;
            case "Ling\Chloroform\Field\HiddenField":
                $this->printHiddenField($field);
                break;
            case "Ling\Chloroform\Field\CSRFField":
                $this->printCSRFField($field);
                break;
            case "Ling\Chloroform\Field\ColorField":
                $this->printColorField($field);
                break;
            case "Ling\Chloroform\Field\DateField":
                $this->printDateField($field);
                break;
            case "Ling\Chloroform\Field\TimeField":
                $this->printTimeField($field);
                break;
            case "Ling\Chloroform\Field\DateTimeField":
                $this->printDateTimeField($field);
                break;
            case "Ling\Chloroform\Field\SelectField":
                $this->printSelectField($field);
                break;
            case "Ling\Chloroform\Field\CheckboxField":
                $this->printCheckboxField($field);
                break;
            case "Ling\Chloroform\Field\RadioField":
                $this->printRadioField($field);
                break;
            case "Ling\Chloroform\Field\FileField":
                $this->printFileField($field);
                break;
            case "Ling\Chloroform\Field\PasswordField":
                $this->printPasswordField($field);
                break;
            case "Ling\Chloroform\Field\DecorativeField":
                $this->printDecorativeField($field);
                break;
            default:
                if (true === $this->options['strict']) {
                    throw new ChloroformHeliumRendererException("Don't know how to handle this class name: $className (for fieldId=" . $field['id'] . ")");
                }
                break;
        }
    }


    /**
     *
     * Prints the given string field.
     *
     * See the @page(Chloroform toArray method) and the @page(StringField class) for more info about the field structure.
     *
     * @param array $field
     */
    public function printStringField(array $field)
    {
        $this->printInputField($field, "text");
    }


    /**
     *
     * Prints the given text field.
     *
     * See the @page(Chloroform toArray method) and the @page(TextField class) for more info about the field structure.
     *
     * @param array $field
     */
    public function printTextField(array $field)
    {
        $cssId = $this->getCssIdById($field['id']);
        $hasHint = ('' !== (string)$field['hint']);
        $hintId = $cssId . '-help';
        $sClass = "";
        if ($field['errors']) {
            $sClass = "helium-is-invalid";
        }


        ?>
        <div class="field form-group cfi-control" data-cfi-id="<?php echo htmlspecialchars($field['id']); ?>">
            <?php $this->printFieldLabel($field); ?>
            <textarea
                    data-main="<?php echo $field['id']; ?>"
                    class="form-control <?php echo $sClass; ?>"
                <?php
                $rows = $field['rows'] ?? null;
                if ($rows): ?>
                    rows="<?php echo $rows; ?>"
                <?php endif; ?>
                      id="<?php echo $cssId; ?>"
                    name="<?php echo $field['htmlName']; ?>"
                      <?php if (true === $hasHint): ?>
                          aria-describedby="<?php echo $hintId; ?>"
                      <?php endif; ?>
            ><?php echo htmlspecialchars($field['value']); ?></textarea>

            <?php $this->printErrorsAndHint($field); ?>
        </div>
        <?php
    }


    /**
     *
     * Prints the given number field.
     *
     * See the @page(Chloroform toArray method) and the @page(NumberField class) for more info about the field structure.
     *
     * @param array $field
     */
    public function printNumberField(array $field)
    {
        $this->printInputField($field, "number");
    }


    /**
     *
     * Prints the given hidden field.
     *
     * See the @page(Chloroform toArray method) and the @page(HiddenField class) for more info about the field structure.
     *
     * @param array $field
     */
    public function printHiddenField(array $field)
    {

        $attr = [];
        $cssId = $this->getCssIdById($field['id']);

        $attr['id'] = $cssId;


        ?>
        <input
                class="cfi-control"
                data-cfi-id="<?php echo htmlspecialchars($field['id']); ?>"
                type="hidden"
                name="<?php echo $field['htmlName']; ?>"
                value="<?php echo htmlspecialchars($field['value']); ?>"
            <?php echo StringTool::htmlAttributes($attr); ?>
        />
        <?php
    }


    /**
     *
     * Prints the given csrf field.
     *
     * See the @page(Chloroform toArray method) and the @page(CSRFField class) for more info about the field structure.
     *
     * @param array $field
     */
    public function printCSRFField(array $field)
    {
        ?>
        <input class="cfi-control" data-cfi-id="<?php echo htmlspecialchars($field['id']); ?>" type="hidden"
               name="<?php echo $field['htmlName']; ?>"
               value="<?php echo htmlspecialchars($field['value']); ?>"/>
        <?php
    }


    /**
     *
     * Prints the given color field.
     *
     * See the @page(Chloroform toArray method) and the @page(ColorField class) for more info about the field structure.
     *
     * @param array $field
     */
    public function printColorField(array $field)
    {
        $this->printInputField($field, "color");
    }


    /**
     *
     * Prints the given date field.
     *
     * See the @page(Chloroform toArray method) and the @page(DateField class) for more info about the field structure.
     *
     * @param array $field
     */
    public function printDateField(array $field)
    {
        $this->printInputField($field, "date");
    }


    /**
     *
     * Prints the given time field.
     *
     * See the @page(Chloroform toArray method) and the @page(TimeField class) for more info about the field structure.
     *
     * In this particular field, we split the time in 2 or 3 parts (depending whether we use seconds),
     * and when the user submits the form, we recompile the right time value and inject it into an hidden input tag,
     * so that it gets posted.
     *
     * @param array $field
     */
    public function printTimeField(array $field)
    {
        $cssId = $this->getCssIdById($field['id']);
        $hasHint = ('' !== (string)$field['hint']);
        $hintId = $cssId . '-help';
        $sClass = "";
        if ($field['errors']) {
            $sClass = "helium-is-invalid";
        }


        $value = (string)$field['value'];
        $useSecond = $field['useSecond'];
        $tempName = "_" . $field['htmlName'];

        $hour = 0;
        $minute = 0;
        $second = 0;
        if ($value) {
            $p = explode(":", $value);
            if (true === $useSecond) {
                list($hour, $minute, $second) = $p;
            } else {
                list($hour, $minute) = $p;
            }
        }
        $hour = (int)$hour;
        $minute = (int)$minute;
        $second = (int)$second;

        $useSecond = true;


        ?>
        <div class="field form-group cfi-control" id="<?php echo $cssId; ?>"
             data-cfi-id="<?php echo htmlspecialchars($field['id']); ?>">
            <?php $this->printFieldLabel($field); ?>
            <div class="form-inline d-sm-flex">
                <div>
                    <input data-main="<?php echo $field['id']; ?>"
                           class="input-time input-time-hours form-control mr-2 <?php echo $sClass; ?>"
                           type="number"
                           name="<?php echo $tempName . "[hours]"; ?>"
                           min="0" max="23"
                        <?php if (true === $hasHint): ?>
                            aria-describedby="<?php echo $hintId; ?>"
                        <?php endif; ?>
                           value="<?php echo htmlspecialchars($hour); ?>"/> <?php echo $this->options['text']['hours']; ?>
                </div>
                <div>
                    <input class="input-time input-time-minutes form-control ml-sm-3 mr-2 <?php echo $sClass; ?>"
                           type="number"
                           name="<?php echo $tempName . "[minutes]"; ?>"
                           min="0" max="59"
                           value="<?php echo htmlspecialchars($minute); ?>"/> <?php echo $this->options['text']['minutes']; ?>
                </div>

                <?php if (true === $useSecond): ?>
                    <div>
                        <input class="input-time input-time-seconds form-control ml-sm-3 mr-2 <?php echo $sClass; ?>"
                               type="number" name="<?php echo $tempName . "[seconds]"; ?>"
                               min="0" max="59"
                               value="<?php echo htmlspecialchars($second); ?>"/> <?php echo $this->options['text']['seconds']; ?>
                    </div>
                <?php endif; ?>
            </div>


            <input class="input-target" type="hidden" name="<?php echo htmlspecialchars($field['htmlName']); ?>"
                   value="<?php echo htmlspecialchars($field['value']); ?>">


            <?php $this->printErrorsAndHint($field); ?>
        </div>
        <?php
    }


    /**
     *
     * Prints the given datetime field.
     *
     * See the @page(Chloroform toArray method) and the @page(DateTimeField class) for more info about the field structure.
     *
     * @param array $field
     */
    public function printDateTimeField(array $field)
    {
        $cssId = $this->getCssIdById($field['id']);
        $hasHint = ('' !== (string)$field['hint']);
        $hintId = $cssId . '-help';
        $sClass = "";
        if ($field['errors']) {
            $sClass = "helium-is-invalid";
        }

        $value = (string)$field['value'];
        $useSecond = $field['useSecond'] ?? true;
        $tempName = "_" . $field['htmlName'];


        $date = "0000-00-00";
        $hour = 0;
        $minute = 0;
        $second = 0;
        if ($value) {
            $q = explode(' ', $value);
            $date = $q[0];
            $time = $q[1];
            $p = explode(":", $time);
            if (true === $useSecond) {
                list($hour, $minute, $second) = $p;
            } else {
                list($hour, $minute) = $p;
            }
        }
        $hour = (int)$hour;
        $minute = (int)$minute;
        $second = (int)$second;

        ?>
        <div class="field form-group cfi-control" data-cfi-id="<?php echo htmlspecialchars($field['id']); ?>">
            <?php $this->printFieldLabel($field); ?>

            <div class="mb-3">
                <input data-main="<?php echo $field['id']; ?>"
                       class="input-time-date form-control mr-2 <?php echo $sClass; ?>" type="date"
                       id="<?php echo $cssId; ?>"
                       name="<?php echo $tempName; ?>[date]"
                       value="<?php echo htmlspecialchars($date); ?>"
                    <?php if (true === $hasHint): ?>
                        aria-describedby="<?php echo $hintId; ?>"
                    <?php endif; ?>
                >
            </div>
            <div class="form-inline d-sm-flex">


                <div>
                    <input class="input-time input-time-hours form-control mr-2 <?php echo $sClass; ?>"
                           type="number"
                           name="<?php echo $tempName . "[hours]"; ?>"
                           min="0" max="23"
                           value="<?php echo htmlspecialchars($hour); ?>"/> <?php echo $this->options['text']['hours']; ?>
                </div>

                <div>
                    <input class="input-time input-time-minutes form-control ml-sm-3 mr-2 <?php echo $sClass; ?>"
                           type="number"
                           name="<?php echo $tempName . "[minutes]"; ?>"
                           min="0" max="59"
                           value="<?php echo htmlspecialchars($minute); ?>"/> <?php echo $this->options['text']['minutes']; ?>
                </div>

                <?php if (true === $useSecond): ?>
                    <div>
                        <input class="input-time input-time-seconds form-control ml-sm-3 mr-2 <?php echo $sClass; ?>"
                               type="number" name="<?php echo $tempName . "[seconds]"; ?>"
                               min="0" max="59"
                               value="<?php echo htmlspecialchars($second); ?>"/> <?php echo $this->options['text']['seconds']; ?>
                    </div>
                <?php endif; ?>

            </div>

            <input class="input-target" type="hidden" name="<?php echo htmlspecialchars($field['htmlName']); ?>"
                   value="<?php echo htmlspecialchars($field['value']); ?>">

            <?php $this->printErrorsAndHint($field); ?>
        </div>
        <?php
    }


    /**
     *
     * Prints the given select field.
     *
     * See the @page(Chloroform toArray method) and the @page(SelectField class) for more info about the field structure.
     *
     * @param array $field
     */
    public function printSelectField(array $field)
    {
        $cssId = $this->getCssIdById($field['id']);
        $hasHint = ('' !== (string)$field['hint']);
        $hintId = $cssId . '-help';
        $sClass = "";
        if ($field['errors']) {
            $sClass = "helium-is-invalid";
        }


        $multiple = $field['multiple'] ?? false;


        $size = $field['size'] ?? null;
        $items = $field['items'];
        $useOptGroup = false;
        if (count($items) > 0) {
            if (is_array(current($items))) {
                $useOptGroup = true;
            }
        }

        $htmlName = $field['htmlName'];
        if (true === $multiple) {
            $htmlName .= "[]";
        }
        $fieldValue = $field['value'];
        $fieldValueIsArray = is_array($field['value']);


        ?>
        <div class="field form-group cfi-control" data-cfi-id="<?php echo htmlspecialchars($field['id']); ?>">


            <?php $this->printFieldLabel($field); ?>
            <select
                    data-main="<?php echo $field['id']; ?>"
                <?php if (true === $multiple): ?>
                    multiple
                <?php endif; ?>
                    name="<?php echo htmlspecialchars($htmlName); ?>"
                    id="<?php echo htmlspecialchars($cssId); ?>"
                    class="form-control <?php echo $sClass; ?>"
                <?php if (true === $hasHint): ?>
                    aria-describedby="<?php echo $hintId; ?>"
                <?php endif; ?>
                <?php if (null !== $size): ?>
                    size="<?php echo htmlspecialchars($size); ?>"
                <?php endif; ?>
            >


                <?php if (false === $useOptGroup): ?>
                    <?php foreach ($field['items'] as $value => $label):
                        $value = (string)$value;
                        if (false === $fieldValueIsArray) {
                            $sSel = ($fieldValue === $value) ? ' selected="selected"' : '';
                        } else {
                            $sSel = in_array($value, $fieldValue, true) ? ' selected="selected"' : '';
                        }
                        ?>
                        <option <?php echo $sSel; ?>
                                value="<?php echo htmlspecialchars($value); ?>"><?php echo $label; ?></option>
                    <?php endforeach; ?>
                <?php else: ?>
                    <?php foreach ($field['items'] as $groupLabel => $fieldItems): ?>
                        <optgroup label="<?php echo htmlspecialchars($groupLabel); ?>">
                            <?php foreach ($fieldItems as $value => $label):
                                $value = (string)$value;
                                if (false === $fieldValueIsArray) {
                                    $sSel = ($fieldValue === $value) ? ' selected="selected"' : '';
                                } else {
                                    $sSel = in_array($value, $fieldValue, true) ? ' selected="selected"' : '';
                                }
                                ?>
                                <option <?php echo $sSel; ?>
                                        value="<?php echo htmlspecialchars($value); ?>"><?php echo $label; ?></option>
                            <?php endforeach; ?>
                        </optgroup>
                    <?php endforeach; ?>
                <?php endif; ?>


            </select>

            <?php $this->printErrorsAndHint($field); ?>
        </div>
        <?php
    }


    /**
     *
     * Prints the given checkbox field.
     *
     * See the @page(Chloroform toArray method) and the @page(CheckboxField class) for more info about the field structure.
     *
     * @param array $field
     */
    public function printCheckboxField(array $field)
    {
        /**
         * Note: if a validation error occurs with the checkboxes, an error message might appear in the
         * errorSummary. In that case, this message will contain a link to the culprit checkbox field.
         * That link is uses the #field_id anchor.
         * Unfortunately with checkboxes, no checkbox has the id=field_id, because the value is appended
         * to each id (field_id_red, field_id_green, ...).
         * So we create assign the id to the legend element, so that when we click the error message link,
         * we are actually redirected to the relevant form control.
         *
         */
        $cssId = $this->getCssIdById($field['id']);
        $hasHint = ('' !== (string)$field['hint']);
        $hintId = $cssId . '-help';
        $sClass = "";
        if ($field['errors']) {
            $sClass = "helium-is-invalid";
        }
        $htmlAttr = $field['htmlAttr'] ?? [];
        $fieldValue = $field['value'];


        ?>
        <div class="field form-group cfi-control" data-cfi-id="<?php echo htmlspecialchars($field['id']); ?>">
            <?php $this->printFieldLabel($field); ?>

            <!--            <div class="field-inline-errors"></div>-->
            <div class="field-options">
                <?php foreach ($field['items'] as $value => $label):
                    $boxCssId = $cssId . "_" . CaseTool::toSnake($value);
                    $showCbLabel = ('' !== $label);
                    ?>

                    <div class="custom-control custom-checkbox">
                        <input type="checkbox"
                               name="<?php echo $field['htmlName']; ?>[<?php echo htmlspecialchars($value); ?>]"
                               value="<?php echo htmlspecialchars($value); ?>"
                               id="<?php echo htmlspecialchars($boxCssId); ?>"
                               class="custom-control-input"
                            <?php if (true === $hasHint): ?>
                                aria-describedby="<?php echo $hintId; ?>"
                            <?php endif; ?>
                            <?php if ($htmlAttr): ?>
                                <?php echo StringTool::htmlAttributes($htmlAttr); ?>
                            <?php endif; ?>

                            <?php if (is_array($fieldValue)): ?>
                                <?php if (in_array($value, $fieldValue, true)): ?>
                                    checked="checked"
                                <?php endif; ?>
                            <?php elseif ((string)$value === (string)$fieldValue): ?>
                                checked="checked"
                            <?php endif; ?>

                        >
                        <?php if (true === $showCbLabel): ?>
                            <label for="<?php echo $boxCssId; ?>" class="custom-control-label <?php echo $sClass; ?>">
                                <?php echo $label; ?>
                            </label>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>

            <?php $this->printErrorsAndHint($field); ?>
        </div>
        <?php
    }


    /**
     *
     * Prints the given radio field.
     *
     * See the @page(Chloroform toArray method) and the @page(RadioField class) for more info about the field structure.
     *
     * @param array $field
     */
    public function printRadioField(array $field)
    {
        $cssId = $this->getCssIdById($field['id']);
        $hasHint = ('' !== (string)$field['hint']);
        $hintId = $cssId . '-help';
        $sClass = "";
        if ($field['errors']) {
            $sClass = "helium-is-invalid";
        }
        ?>
        <div class="field form-group cfi-control" data-cfi-id="<?php echo htmlspecialchars($field['id']); ?>">
            <?php $this->printFieldLabel($field); ?>
            <!--            <div class="field-inline-errors"></div>-->
            <div class="field-options">
                <?php foreach ($field['items'] as $value => $label):
                    $boxCssId = $cssId . "_" . CaseTool::toSnake($value);
                    ?>
                    <div class="field-checkbox form-check">
                        <label for="<?php echo $boxCssId; ?>" class="form-check-label <?php echo $sClass; ?>">
                            <input type="radio" name="<?php echo $field['htmlName']; ?>"
                                   value="<?php echo htmlspecialchars($value); ?>"
                                   id="<?php echo $boxCssId; ?>"
                                   class="form-check-input"
                                <?php if (true === $hasHint): ?>
                                    aria-describedby="<?php echo $hintId; ?>"
                                <?php endif; ?>
                            >
                            <?php echo $label; ?>
                        </label>
                    </div>
                <?php endforeach; ?>
            </div>
            <?php $this->printErrorsAndHint($field); ?>
        </div>
        <?php
    }


    /**
     *
     * Prints the given file field.
     *
     * See the @page(Chloroform toArray method) and the @page(FileField class) for more info about the field structure.
     *
     * @param array $field
     */
    public function printFileField(array $field)
    {
        $this->printInputField($field, "file");
    }

    /**
     *
     * Prints the given password field.
     *
     * See the @page(Chloroform toArray method) and the @page(PasswordField class) for more info about the field structure.
     *
     * @param array $field
     */
    public function printPasswordField(array $field)
    {
        $this->printInputField($field, "password");
    }


    /**
     *
     * Prints the given decorative field.
     *
     * See the @page(Chloroform toArray method) and the @page(DecorativeField class) for more info about the field structure.
     *
     * @param array $field
     */
    public function printDecorativeField(array $field)
    {
        $decorationType = $field['deco_type'];
        $decorationOptions = $field['deco_options'];
        switch ($decorationType) {
            case "hr":
                $cssClass = $decorationOptions["cssClass"] ?? 'my-5 border border-secondary';
                ?>
                <hr class="<?php echo htmlspecialchars($cssClass); ?> cfi-control"
                    data-cfi-id="<?php echo htmlspecialchars($field['id']); ?>">
                <?php
                break;
            default:
                break;
        }
    }


    /**
     * Prints the javascript code to handle the validation of the form,
     * and some fields behaviours.
     *
     * See the @page(Chloroform toArray method) for more info about the fields structure.
     *
     * The options are all mandatory, and all pertains to the javascript handler:
     *
     * - displayErrorSummary: bool. Whether to display the error summary.
     * - displayInlineErrors: bool. Whether to display the inline errors.
     * - showOnlyFirstError: bool. Whether to display the first error or all errors for each field (in case a field has multiple errors).
     * - useValidation: bool. Whether to use the js validation system at all.
     *
     *
     * @param array $options
     */
    public function printJsHandler(array $options = null)
    {
        $cssId = $this->_formCssId;
        $fields = $this->_chloroform['fields'];
        if (null === $options) {
            $options = [
                "displayErrorSummary" => $this->displayErrorSummary,
                "displayInlineErrors" => $this->displayInlineErrors,
                "showOnlyFirstError" => $this->options['showOnlyFirstError'],
                "useValidation" => $this->options['useValidation'],
            ];
        }
        ?>
        <script>
            document.addEventListener("DOMContentLoaded", function (event) {
                $(document).ready(function () {
                    var formHandler = new HeliumFormHandler($('#<?php echo $cssId ?>'), <?php echo json_encode($fields); ?>, <?php echo json_encode($options); ?>);
                    formHandler.init();
                });
            });
        </script>
        <?php
    }


    /**
     *
     * Prints some custom scripts if necessary.
     * @overrideMe
     */
    public function printCustomScripts()
    {

    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     *
     * Prints an input field.
     *
     * See the @page(Chloroform toArray) method for more info about the fields structure.
     *
     * @param array $field
     * @param string $type
     */
    protected function printInputField(array $field, string $type)
    {
        $cssId = $this->getCssIdById($field['id']);
        $style = $this->options['formStyle'];
        $hasHint = ('' !== (string)$field['hint']);
        $hintId = $cssId . '-help';
        $sClass = "";
        if ($field['errors']) {
            $sClass = "helium-is-invalid";
        }

        $icon = $field['icon'] ?? null;
        $iconPosition = $field['icon_position'] ?? 'pre';

        $button = $field['button'] ?? null;
        $buttonPosition = $field['button_position'] ?? 'pre';
        $htmlAttributes = $field["htmlAttributes"] ?? [];

        ?>
        <div class="field form-group cfi-control" data-cfi-id="<?php echo htmlspecialchars($field['id']); ?>">
            <?php $this->printFieldLabel($field); ?>



            <?php if (null !== $icon || null !== $button): ?>
            <div class="input-group mb-3">
                <?php if (null !== $icon && 'pre' === $iconPosition): ?>
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="<?php echo htmlspecialchars($icon); ?>"></i></span>
                    </div>
                <?php endif; ?>
                <?php if (null !== $button && 'pre' === $buttonPosition): ?>
                    <div class="input-group-prepend">
                        <span class="input-group-text"><?php echo $button; ?></span>
                    </div>
                <?php endif; ?>

                <?php endif; ?>


                <input data-main="<?php echo $field['id']; ?>"
                       type="<?php echo $type; ?>"
                       id="<?php echo $cssId; ?>"
                       name="<?php echo $field['htmlName']; ?>"
                       value="<?php echo htmlspecialchars($field['value']); ?>"
                       class="form-control control-type-<?php echo $type; ?> <?php echo $sClass; ?>"
                    <?php if (true === $hasHint): ?>
                        aria-describedby="<?php echo $hintId; ?>"
                    <?php endif; ?>
                    <?php foreach ($htmlAttributes as $k => $v): ?>
                        <?php echo $k . '="' . htmlspecialchars($v) . '"'; ?>
                    <?php endforeach; ?>
                />
                <?php if (null !== $icon || null !== $button): ?>
                <?php if (null !== $icon && 'post' === $iconPosition): ?>
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="<?php echo htmlspecialchars($icon); ?>"></i></span>
                    </div>
                <?php endif; ?>
                <?php if (null !== $button && 'post' === $buttonPosition): ?>
                    <div class="input-group-append">
                        <?php echo $button; ?>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>


            <?php $this->printErrorsAndHint($field); ?>

        </div>

        <?php
    }


    /**
     * Prints the errors and the hint if any.
     *
     * @param array $field
     */
    protected function printErrorsAndHint(array $field)
    {
        $hasHint = ('' !== (string)$field['hint']);
        $cssId = $this->getCssIdById($field['id']);
        $hintId = $cssId . '-help';
        ?>


        <!-- js validation target -->
        <div class="field-inline-errors"></div>


        <?php if (true === $this->displayInlineErrors): ?>
        <?php if ($field['errors']):
            $errors = $field['errors'];
            if (true === $this->options['showOnlyFirstError']) {
                $errors = [array_shift($errors)];
            }
            ?>
            <div class="helium-invalid-feedback">
                <?php foreach ($errors as $error): ?>
                    <?php echo $error; ?><br>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    <?php endif; ?>

        <?php if (true === $hasHint): ?>
        <small id="<?php echo $hintId; ?>" class="form-text text-muted"><?php echo $field['hint']; ?></small>
    <?php endif; ?>
        <?php
    }


    /**
     * Prints a standard label for a field.
     *
     * The label contains the label, the hint and the errors.
     *
     * @param array $field
     */
    protected function printFieldLabel(array $field)
    {
        $cssId = $this->getCssIdById($field['id']);
        $sClass = "";
        if ('horizontal' === $this->options['formStyle']) {
            $sClass = "col-sm-2 col-form-label";
        }

        ?>
        <label for="<?php echo $cssId; ?>" class="<?php echo $sClass; ?>"><?php echo $field['label']; ?></label>
        <?php
    }


    /**
     * Returns the css id for a given field id.
     *
     * @param string $id
     * @return string
     */
    protected function getCssIdById(string $id): string
    {
        return str_replace('.', '-', $id);
    }


    /**
     * Prints the js code of the form, if any.
     *
     * @param string|null $jsCode
     */
    protected function printJsCode(?string $jsCode)
    {
        if ($jsCode) {
            ?>
            <script><?php echo $jsCode; ?></script>
            <?php
        }
    }


}