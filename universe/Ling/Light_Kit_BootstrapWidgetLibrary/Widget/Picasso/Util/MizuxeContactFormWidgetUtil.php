<?php


namespace Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso\Util;


/**
 * The MizuxeContactFormWidgetUtil class.
 */
class MizuxeContactFormWidgetUtil
{


    /**
     * Prints the form with the title and text.
     *
     *
     * @param array $z
     * The widget variables (vars property of the @page(widget configuration array)).
     */
    public static function printForm(array $z)
    {

        $formTitle = $z['form_title'] ?? "No title";
        $formText = $z['form_text'] ?? "";
        $formTextClass = $z['form_text_class'] ?? "";
        $fields = $z['form_fields'] ?? [];
        $btnText = $z['submit_btn_text'] ?? "Submit";
        $btnClass = $z['submit_btn_class'] ?? "btn btn-primary btn-block btn-lg";


        ?>
        <?php if ($formTitle): ?>
        <h3><?php echo $formTitle; ?></h3>
    <?php endif; ?>

        <?php if ($formText): ?>
        <p class="<?php echo htmlspecialchars($formTextClass); ?>"><?php echo $formText; ?></p>
    <?php endif; ?>
        <form>
            <?php foreach ($fields as $field):
                $iconWrapperClass = $field['icon_wrapper_class'] ?? "";
                $class = $field['class'] ?? "";
                $icon = $field['icon'] ?? "";
                $type = $field['type'];
                ?>
                <div class="input-group input-group-lg mb-3">
                    <?php if ($icon): ?>
                        <div class="input-group-prepend">
                            <span class="input-group-text <?php echo htmlspecialchars($iconWrapperClass); ?>">
                                <i class="<?php echo htmlspecialchars($icon); ?>"></i>
                            </span>
                        </div>
                    <?php endif; ?>

                    <?php switch ($type):
                        case 'text':
                        case 'email':
                            ?>
                            <input
                                    type="<?php echo $type; ?>"
                                    class="form-control <?php echo htmlspecialchars($class); ?>"
                                    name="<?php echo htmlspecialchars($field['name']); ?>"
                                    placeholder="<?php echo htmlspecialchars($field['label']); ?>"
                            >
                            <?php break;
                        case 'textarea':
                            $rows = $field['rows'] ?? null;
                            ?>
                            <textarea class="form-control <?php echo htmlspecialchars($class); ?>"
                                      placeholder="<?php echo htmlspecialchars($field['label']); ?>"
                                      <?php if ($rows): ?>
                                          rows="<?php echo htmlspecialchars($rows); ?>"
                                      <?php endif; ?>
                                      name="<?php echo htmlspecialchars($field['name']); ?>"
                            ></textarea>
                            <?php break; ?>
                        <?php default: ?>
                            <?php break; ?>
                        <?php endswitch; ?>


                </div>
            <?php endforeach; ?>


            <input type="submit" value="<?php echo htmlspecialchars($btnText); ?>"
                   class="<?php echo htmlspecialchars($btnClass); ?>">
        </form>

        <?php
    }
}