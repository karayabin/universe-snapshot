<?php


namespace QuickForm\ControlFactory\MagicControlFactory;


use Icons\Icons;
use Icons\IconsFactory;

class IconsMultipleInputRenderer implements MagicControlRendererInterface
{


    /**
     *
     * Functional requirements (to ensure proper js work)
     * --------------------------
     * functional css classes are:
     * - addbutton
     * - removebutton
     *
     * The removebutton's direct parent must be the
     * whole item container.
     *
     *
     */
    public function render(array $value, $name)
    {
        ?>
        <div class="topbar">
            <button class="addbutton flat"><?php Icons::printIcon("add-circle"); ?></button>
        </div>
        <div class="items">
            <?php
            if (is_array($value)) {
                foreach ($value as $val) {
                    $this->printMultipleInputItem($val, $name);
                }
            }
            ?>
        </div>
        <?php IconsFactory::printIconsDefinitions(); ?>
        <?php
    }

    public function printMultipleInputItem($val, $name = null)
    {
        ?>
        <div class="horizontal-line">
            <input style="width: 10%; min-width: 30px" type="text"
                <?php echo (null !== $name) ? 'name="' . htmlspecialchars($name) . '[]"' : ''; ?>
                   value="<?php echo htmlspecialchars($val); ?>">
            <button class="removebutton flat"><?php Icons::printIcon("remove-circle"); ?></button>
        </div>
        <?php
    }
}