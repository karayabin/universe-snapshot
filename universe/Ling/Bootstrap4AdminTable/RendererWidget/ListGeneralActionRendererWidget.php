<?php


namespace Ling\Bootstrap4AdminTable\RendererWidget;


use Ling\Bat\HepTool;
use Ling\Bat\StringTool;

/**
 * The ListGeneralActionRendererWidget class.
 */
class ListGeneralActionRendererWidget extends AbstractRendererWidget implements ListGeneralActionRendererWidgetInterface
{


    /**
     * This property holds the general action items for this instance.
     * @var array
     */
    protected $generalActions;


    /**
     * Builds the ListGeneralActionRendererWidget instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this->generalActions = [];
    }

    /**
     * @implementation
     */
    public function setGeneralActions(array $generalActions)
    {
        $this->generalActions = $generalActions;
    }


    /**
     * @implementation
     */
    public function render()
    {
        if ($this->generalActions):
            ?>


            <div class="btn-group btn-group-sm ml-auto dropleft">
                <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-cog"></i>
                </button>
                <div class="dropdown-menu">
                    <?php

                    foreach ($this->generalActions as $item):


                        $actionId = $item['action_id'] ?? null;
                        $text = $item['text'];
                        $attr = $item['attr'] ?? [];
                        $icon = $item['icon'] ?? null;

                        $csrf = $item['csrf_token'] ?? null;
                        if (is_string($csrf)) {
                            $attr['data-param-csrf_token'] = $csrf;
                        } elseif (is_array($csrf)) {
                            $tokenValue = $csrf['value'];
                            $attr['data-param-csrf_token'] = $tokenValue;
                        }
                        $params = $item['params'] ?? [];

                        ?>

                        <a class="dropdown-item lgah-button"
                           data-action-id="<?php echo htmlspecialchars($actionId); ?>"
                            <?php if ($attr): ?>
                                <?php echo StringTool::htmlAttributes($attr); ?>
                            <?php endif; ?>
                            <?php if ($params): ?>
                                <?php echo HepTool::hepAttributes($params); ?>
                            <?php endif; ?>
                           href="#">
                            <?php if ($icon): ?>
                                <i class="<?php echo htmlspecialchars($icon); ?>"></i>
                            <?php endif; ?>
                            <?php echo $text; ?>
                        </a>

                    <?php endforeach; ?>


                </div>
            </div>

        <?php
        endif;

    }


}