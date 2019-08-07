<?php


namespace Ling\Light_Kit_Admin\Chloroform;


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
     * Prints the form id key control to identify which form is posed when the page contains multiple forms.
     *
     *
     * @param array $chloroform
     * The @page(chloroform array).
     */
    public static function renderFormIdKeyControl(array $chloroform)
    {
        $key = "chloroform_hidden_key";
        ?>
        <input type="text" name="<?php echo htmlspecialchars($key); ?>"
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
        self::renderFormIdKeyControl($chloroform);
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

}