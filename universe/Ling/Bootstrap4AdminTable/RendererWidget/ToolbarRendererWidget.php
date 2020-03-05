<?php


namespace Ling\Bootstrap4AdminTable\RendererWidget;


use Ling\Bat\HepTool;
use Ling\Bat\StringTool;

/**
 * The ToolbarRendererWidget class.
 */
class ToolbarRendererWidget extends AbstractRendererWidget implements ToolbarRendererWidgetInterface
{


    /**
     * This property holds the groups for this instance.
     * @var array
     */
    protected $groups;


    /**
     * Builds the ToolbarRendererWidget instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this->groups = [];
    }

    /**
     * @implementation
     */
    public function setGroups(array $groups)
    {
        $this->groups = $groups;
    }


    /**
     * @implementation
     *
     * Note: in this implementation, we don't handle recursive children items (i.e. we only handle
     * the first level of children, but we don't implement children of children).
     *
     *
     */
    public function render()
    {
        ?>
        <div class="d-flex mb-2 justify-content-start justify-content-sm-end">
            <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                <?php

                $groupCpt = 1;
                $max = count($this->groups);
                foreach ($this->groups as $item):

                    $actionId = $item['action_id'] ?? null;
                    $text = $item['text'];
                    $items = $item['items'] ?? [];
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


                    $hasChildren = (count($items) > 0);
                    $sMargin = ($max === $groupCpt) ? "" : "mr-2";

                    ?>

                    <div class="btn-group <?php echo $sMargin; ?> btn-group-sm" role="group"
                         aria-label="group <?php echo $groupCpt; ?>">
                        <?php if (false === $hasChildren): ?>
                            <button type="button" class="btn btn-light border lah-button"
                                    data-action-id="<?php echo htmlspecialchars($actionId); ?>"
                                <?php if ($attr): ?>
                                    <?php echo StringTool::htmlAttributes($attr); ?>
                                <?php endif; ?>
                                <?php if ($params): ?>
                                    <?php echo HepTool::hepAttributes($params); ?>
                                <?php endif; ?>
                            >
                                <?php if (null !== $icon): ?>
                                    <i class="<?php echo htmlspecialchars($icon); ?>"></i>
                                <?php endif; ?>
                                <?php echo $text; ?>
                            </button>
                        <?php else:
                            $cssId = StringTool::getUniqueCssId("bsat-toolbar-");
                            ?>
                            <button id="<?php echo $cssId; ?>" type="button"
                                    class="btn btn-light border dropdown-toggle"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php if (null !== $icon): ?>
                                    <i class="<?php echo htmlspecialchars($icon); ?>"></i>
                                <?php endif; ?>
                                <?php echo $text; ?>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="<?php echo $cssId; ?>">
                                <?php
                                foreach ($items as $subItem):

                                    $subIcon = $subItem['icon'] ?? null;
                                    $attr = $subItem['attr'] ?? [];
                                    $csrf = $subItem['csrf_token'] ?? null;
                                    if (is_string($csrf)) {
                                        $attr['data-param-csrf_token'] = $csrf;
                                    } elseif (is_array($csrf)) {
                                        $tokenValue = $csrf['value'];
                                        $attr['data-param-csrf_token'] = $tokenValue;
                                    }
                                    $params = $subItem['params'] ?? [];


                                    ?>
                                    <button type="button" class="dropdown-item btn btn-light lah-button"
                                            data-action-id="<?php echo htmlspecialchars($subItem['action_id']); ?>"
                                        <?php if ($attr): ?>
                                            <?php echo StringTool::htmlAttributes($attr); ?>
                                        <?php endif; ?>
                                        <?php if ($params): ?>
                                            <?php echo HepTool::hepAttributes($params); ?>
                                        <?php endif; ?>
                                    >
                                        <?php if (null !== $subIcon): ?>
                                            <i class="<?php echo htmlspecialchars($subIcon); ?>"></i>
                                        <?php endif; ?>
                                        <?php echo $subItem['text']; ?>
                                    </button>
                                <?php endforeach; ?>
                            </div>

                        <?php endif; ?>
                    </div>
                    <?php
                    $groupCpt++;
                endforeach; ?>
            </div>
        </div>
        <?php
    }


}