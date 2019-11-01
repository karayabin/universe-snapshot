<?php


namespace Ling\Light_Kit_Admin\Chloroform;


use Ling\Chloroform\Helper\ChloroformRendererHelper;

/**
 * The LightKitAdminChloroformRendererUtil class.
 */
class LightKitAdminChloroformRendererUtil
{

    /**
     * Prints the csrf field to protect your forms.
     *
     *
     * @param array $chloroform
     * The @page(chloroform array).
     */
    public static function renderCsrfControl(array $chloroform)
    {
        $key = "csrf_token";
        ?>
        <input type="hidden" name="<?php echo htmlspecialchars($key); ?>"
               value="<?php echo $chloroform['fields'][$key]['value']; ?>"/>
        <?php
    }



    /**
     * Prints the csrf control and form id key control.
     * See the renderCsrfControl and renderFormIdKeyControl methods of this class for more info.
     *
     *
     * @param array $chloroform
     * The @page(chloroform array).
     */
    public static function renderHiddenCommonFields(array $chloroform)
    {
        self::renderCsrfControl($chloroform);
        ChloroformRendererHelper::printsFormIdKeyControl($chloroform);
    }


    /**
     * Prints the chloroform notifications (if any) in the bootstrap 4 style used
     * by the light kit admin gui.
     *
     * @param array $chloroform
     * The @page(chloroform array).
     */
    public static function renderNotifications(array $chloroform)
    {
        ?>
        <?php foreach ($chloroform['notifications'] as $item):
        $type = $item['type'];
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
        <div class="alert alert-<?php echo $type; ?>" role="alert">
            <?php echo $item['message']; ?>
        </div>
    <?php endforeach; ?>
        <?php
    }


    /**
     *
     * Prints a summary of errors if any, or nothing if there is no error.
     *
     * See the @page(Chloroform toArray) method for more info about the errors structure.
     *
     * The available options are:
     * - showOnlyFirstError: bool=true. Whether to show only the first error or all the errors (for each field).
     *
     *
     *
     * @param array $options
     * @param array $chloroform
     */
    public static function renderErrorsSummary(array $chloroform, array $options = [])
    {

        $showOnlyFirstError = $options['showOnlyFirstError'] ?? true;

        $errors = $chloroform["errors"];
        /**
         * Note: even if we don't display the error summary, we still inject the html code,
         * as a template to help implementing the js validation mechanism.
         */
        $hasErrors = (bool)count($errors);

        ?>
        <?php if (true === $hasErrors): ?>
        <div class="alert alert-danger errorSummary" role="alert">
            <h4 id="errorSummary-heading"
                class="alert-heading">There's a problem.</h4>
            <ul class="list-unstyled">
                <?php foreach ($errors as $id => $fieldErrors):
                    if (true === $showOnlyFirstError) {
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
    <?php endif; ?>
        <?php
    }
}