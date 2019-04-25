<?php


namespace Ling\Chloroform_HydrogenRenderer;


use Ling\Bat\CaseTool;
use Ling\Bat\StringTool;
use Ling\Chloroform\Renderer\ChloroformRendererInterface;
use Ling\Chloroform_HydrogenRenderer\Exception\ChloroformHydrogenRendererException;


/**
 * The HydrogenRenderer class.
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
 * - the js file (hydrogen.js is provided with this planet)
 * - the css file (hydrogen.css is provided with this planet)
 *
 * The hydrogen.js file must be called AFTER jquery.
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
class HydrogenRenderer implements ChloroformRendererInterface
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
     * Builds the HydrogenRenderer instance.
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

    }


    /**
     * @implementation
     */
    public function render(array $chloroform): string
    {


        $cssId = StringTool::getUniqueCssId();
        ob_start();
        ?>
        <form id="<?php echo $cssId; ?>" novalidate class="hydrogen" method="<?php echo $this->options['method']; ?>"
              action="<?php echo htmlspecialchars($this->options['action']); ?>"
            <?php if (true === $this->options['useEnctypeMultiformData']): ?>
                enctype="multipart/form-data"
            <?php endif; ?>
        >


            <svg style="display: none">
                <symbol id="warning-icon" viewBox="0 0 10 10">
                    <path d="m5 1-4 8h8zm-.36 2.6h.7v3h-.7v-2.8594zm.36 3.4c.4 0 .5.3.5.6-.1.3-.4.45-.63.4-.27-.1-.47-.4-.37-.63.07-.17.20-.37.50-.37z"></path>
                </symbol>
            </svg>

            <?php
            $this->printNotifications($chloroform['notifications']);
            $this->printErrorSummary($chloroform['errors']);
            $this->printFields($chloroform['fields']);
            ?>


            <input type="submit" class="submitButton"
                   value="<?php echo htmlspecialchars($this->options['text']['submitButtonValue']); ?>">


        </form>
        <?php

        echo $this->printJsHandler($cssId, $chloroform['fields'], [
            "displayErrorSummary" => $this->displayErrorSummary,
            "displayInlineErrors" => $this->displayInlineErrors,
            "showOnlyFirstError" => $this->options['showOnlyFirstError'],
            "useValidation" => $this->options['useValidation'],
        ]);


        return ob_get_clean();
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
            ?>
            <div class="notification <?php echo $notification['type']; ?>">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                <?php echo $notification['message']; ?>
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
        <div tabindex="-1" role="group" class="errorSummary <?php echo $sClass; ?>"
             aria-labelledby="errorSummary-heading">
            <h2 id="errorSummary-heading"><?php echo $this->options['text']['errorSummaryTitle']; ?></h2>
            <ul>
                <?php foreach ($errors as $id => $fieldErrors):
                    if (true === $this->options['showOnlyFirstError']) {
                        $fieldErrors = [array_shift($fieldErrors)];
                    }
                    ?>
                    <?php foreach ($fieldErrors as $error): ?>
                    <li class="summary-field-error"><a href="#<?php echo $id; ?>"><?php echo $error; ?></a></li>
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
     * @throws ChloroformHydrogenRendererException
     */
    public function printFields(array $fields)
    {
        foreach ($fields as $id => $field) {
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
                default:
                    if (true === $this->options['strict']) {
                        throw new ChloroformHydrogenRendererException("Don't know how to handle this class name: $className (for fieldId=$id)");
                    }
                    break;
            }
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
        ?>
        <div class="field">
            <?php $this->printFieldLabel($field); ?>
            <textarea
                    data-main="<?php echo $field['id']; ?>"
                <?php
                $rows = $field['rows'] ?? null;
                if ($rows): ?>
                    rows="<?php echo $rows; ?>"
                <?php endif; ?>
                      id="<?php echo $cssId; ?>"
                    name="<?php echo $field['htmlName']; ?>"><?php echo htmlspecialchars($field['value']); ?></textarea>
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
        ?>
        <input type="hidden" name="<?php echo $field['htmlName']; ?>"
               value="<?php echo htmlspecialchars($field['value']); ?>"/>
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
        <input type="hidden" name="<?php echo $field['htmlName']; ?>"
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


        ?>
        <div class="field" id="<?php echo $cssId; ?>">
            <?php $this->printFieldLabel($field); ?>
            <input data-main="<?php echo $field['id']; ?>" class="input-time input-time-hours" type="number"
                   name="<?php echo $tempName . "[hours]"; ?>"
                   min="0" max="23"
                   value="<?php echo htmlspecialchars($hour); ?>"/> <?php echo $this->options['text']['hours']; ?>

            <input class="input-time input-time-minutes" type="number" name="<?php echo $tempName . "[minutes]"; ?>"
                   min="0" max="59"
                   value="<?php echo htmlspecialchars($minute); ?>"/> <?php echo $this->options['text']['minutes']; ?>

            <?php if (true === $useSecond): ?>
                <input class="input-time input-time-seconds" type="number" name="<?php echo $tempName . "[seconds]"; ?>"
                       min="0" max="59"
                       value="<?php echo htmlspecialchars($second); ?>"/> <?php echo $this->options['text']['seconds']; ?>
            <?php endif; ?>


            <input class="input-target" type="hidden" name="<?php echo htmlspecialchars($field['htmlName']); ?>"
                   value="<?php echo htmlspecialchars($field['value']); ?>">
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
        $value = (string)$field['value'];
        $useSecond = $field['useSecond'];
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
        <div class="field">
            <?php $this->printFieldLabel($field); ?>


            <input data-main="<?php echo $field['id']; ?>" class="input-time-date" type="date"
                   id="<?php echo $cssId; ?>"
                   name="<?php echo $tempName; ?>[date]"
                   value="<?php echo htmlspecialchars($date); ?>">
            <br>
            <br>

            <input class="input-time input-time-hours" type="number" name="<?php echo $tempName . "[hours]"; ?>"
                   min="0" max="23"
                   value="<?php echo htmlspecialchars($hour); ?>"/> <?php echo $this->options['text']['hours']; ?>

            <input class="input-time input-time-minutes" type="number" name="<?php echo $tempName . "[minutes]"; ?>"
                   min="0" max="59"
                   value="<?php echo htmlspecialchars($minute); ?>"/> <?php echo $this->options['text']['minutes']; ?>

            <?php if (true === $useSecond): ?>
                <input class="input-time input-time-seconds" type="number" name="<?php echo $tempName . "[seconds]"; ?>"
                       min="0" max="59"
                       value="<?php echo htmlspecialchars($second); ?>"/> <?php echo $this->options['text']['seconds']; ?>
            <?php endif; ?>


            <input class="input-target" type="hidden" name="<?php echo htmlspecialchars($field['htmlName']); ?>"
                   value="<?php echo htmlspecialchars($field['value']); ?>">
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
        $multiple = $field['multiple'] ?? false;
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


        ?>
        <div class="field">
            <?php $this->printFieldLabel($field); ?>
            <select
                    data-main="<?php echo $field['id']; ?>"
                <?php if (true === $multiple): ?>
                    multiple
                <?php endif; ?>
                    name="<?php echo htmlspecialchars($htmlName); ?>"
                    id="<?php echo htmlspecialchars($cssId); ?>">


                <?php if (false === $useOptGroup): ?>
                    <?php foreach ($field['items'] as $value => $label):
                        $sSel = ($field['value'] === $value) ? ' selected="selected"' : '';
                        ?>
                        <option <?php echo $sSel; ?>
                                value="<?php echo htmlspecialchars($value); ?>"><?php echo $label; ?></option>
                    <?php endforeach; ?>
                <?php else: ?>
                    <?php foreach ($field['items'] as $groupLabel => $fieldItems): ?>
                        <optgroup label="<?php echo htmlspecialchars($groupLabel); ?>">
                            <?php foreach ($fieldItems as $value => $label):
                                $sSel = ($field['value'] === $value) ? ' selected="selected"' : '';
                                ?>
                                <option <?php echo $sSel; ?>
                                        value="<?php echo htmlspecialchars($value); ?>"><?php echo $label; ?></option>
                            <?php endforeach; ?>
                        </optgroup>
                    <?php endforeach; ?>
                <?php endif; ?>


            </select>
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
        ?>
        <fieldset class="field">
            <legend>
                <span class="field-legend"
                      data-main="<?php echo $field['id']; ?>"
                      id="<?php echo htmlspecialchars($cssId); ?>"><?php echo $field['label']; ?></span>
            </legend>
            <div class="field-inline-errors"></div>
            <div class="field-options">
                <?php foreach ($field['items'] as $value => $label):
                    $boxCssId = $cssId . "_" . CaseTool::toSnake($value);
                    ?>
                    <div class="field-checkbox">
                        <label for="<?php echo $boxCssId; ?>">
                            <input type="checkbox"
                                   name="<?php echo $field['htmlName']; ?>[<?php echo htmlspecialchars($value); ?>]"
                                   value="<?php echo htmlspecialchars($value); ?>"
                                   id="<?php echo htmlspecialchars($boxCssId); ?>">
                            <?php echo $label; ?>
                        </label>
                    </div>
                <?php endforeach; ?>
            </div>
        </fieldset>
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
        ?>
        <fieldset class="field">
            <legend>
                <span
                        data-main="<?php echo $field['id']; ?>"
                        class="field-legend"><?php echo $field['label']; ?></span>
            </legend>
            <div class="field-inline-errors"></div>
            <div class="field-options">
                <?php foreach ($field['items'] as $value => $label):
                    $boxCssId = $cssId . "_" . CaseTool::toSnake($value);
                    ?>
                    <div class="field-checkbox">
                        <label for="<?php echo $boxCssId; ?>">
                            <input type="radio" name="<?php echo $field['htmlName']; ?>"
                                   value="<?php echo htmlspecialchars($value); ?>"
                                   id="<?php echo $boxCssId; ?>">
                            <?php echo $label; ?>
                        </label>
                    </div>
                <?php endforeach; ?>
            </div>
        </fieldset>
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
     *
     * @param string $cssId
     * The form css id.
     * @param array $fields
     * @param array $options
     */
    public function printJsHandler(string $cssId, array $fields, array $options)
    {
        ?>
        <script>
            var formHandler = new FormHandler($('#<?php echo $cssId ?>'), <?php echo json_encode($fields); ?>, <?php echo json_encode($options); ?>);
            formHandler.init();
        </script>
        <?php
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
        ?>
        <div class="field">
            <?php $this->printFieldLabel($field); ?>
            <input data-main="<?php echo $field['id']; ?>" type="<?php echo $type; ?>" id="<?php echo $cssId; ?>"
                   name="<?php echo $field['htmlName']; ?>"
                   value="<?php echo htmlspecialchars($field['value']); ?>"/>
        </div>
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
        ?>
        <label for="<?php echo $cssId; ?>">
            <span class="field-label"><?php echo $field['label']; ?></span>
            <?php if ('' !== (string)$field['hint']): ?>
                <span class="field-hint"><?php echo $field['hint']; ?></span>
            <?php endif; ?>

            <?php if (true === $this->displayInlineErrors): ?>
                <?php if ($field['errors']):
                    $errors = $field['errors'];
                    if (true === $this->options['showOnlyFirstError']) {
                        $errors = [array_shift($errors)];
                    }
                    ?>
                    <?php foreach ($errors as $error): ?>
                    <span class="field-error"><svg width="1.5em" height="1.5em"><use
                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                    xlink:href="#warning-icon"></use></svg><?php echo $error; ?>
                    </span>
                <?php endforeach; ?>
                <?php endif; ?>
            <?php endif; ?>

        </label>
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
}