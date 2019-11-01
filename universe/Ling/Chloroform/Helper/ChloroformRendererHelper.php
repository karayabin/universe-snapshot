<?php


namespace Ling\Chloroform\Helper;


/**
 * The ChloroformRendererHelper class.
 */
class ChloroformRendererHelper
{
    /**
     * Prints the form id key control to identify which form is posted when the page contains multiple forms.
     *
     *
     * @param array $chloroform
     * The @page(chloroform array).
     */
    public static function printsFormIdKeyControl(array $chloroform)
    {
        $key = "chloroform_hidden_key";
        ?>
        <input type="hidden" name="<?php echo htmlspecialchars($key); ?>"
               value="<?php echo $chloroform['fields'][$key]['value']; ?>"/>
        <?php
    }


}