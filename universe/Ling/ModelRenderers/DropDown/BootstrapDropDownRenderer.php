<?php


namespace Ling\ModelRenderers\DropDown;


use Ling\ModelRenderers\ActionLink\ActionLinkRenderer;

class BootstrapDropDownRenderer extends DropDownRenderer
{


    protected $linkAttributes;


    public function __construct()
    {
        $this->linkAttributes = [];
    }

    public static function create()
    {
        return new static();
    }

    public function render()
    {
        $m = $this->model;
        /**
         * Flavours: default, primary, info, success, warning, danger, link (, dark?)
         */
        $flavour = (array_key_exists("flavour", $m)) ? $m['flavour'] : 'default';

        /**
         * Sizes: xs, sm, default, lg
         */
        $size = (array_key_exists("size", $m)) ? $m['size'] : "default";


        ?>
        <div class="btn-group">
            <button data-toggle="dropdown"
                    class="btn btn-<?php echo $flavour; ?> dropdown-toggle btn-<?php echo $size; ?>"
                    type="button" aria-expanded="false">

                <?php if (array_key_exists('icon', $m)): ?>
                    <span class="<?php echo $m['icon']; ?>"></span>&nbsp;
                <?php endif; ?>

                <?php echo $m['text']; ?> <span class="caret"></span>
            </button>
            <ul role="menu" class="dropdown-menu">

                <?php foreach ($m['items'] as $item): ?>
                    <?php if ('divider' === $item): ?>
                        <li class="divider"></li>
                    <?php else: ?>
                        <li><?php echo ActionLinkRenderer::create()->setAttr($this->linkAttributes)->setModel($item)->render(); ?></li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php
    }

}