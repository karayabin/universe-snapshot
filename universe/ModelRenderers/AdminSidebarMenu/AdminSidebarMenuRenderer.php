<?php


namespace ModelRenderers\AdminSidebarMenu;


use ModelRenderers\Renderer\AbstractRenderer;

class AdminSidebarMenuRenderer extends AbstractRenderer
{

    protected $arrowDownClass;
    protected $sectionContainerClass;
    protected $itemsContainerClass;
    protected $topLevelItemsContainerClass;


    public function __construct()
    {
        $this->arrowDownClass = "fa fa-chevron-down";
        $this->sectionContainerClass = "menu_section";
        $this->itemsContainerClass = "nav child_menu";
        $this->topLevelItemsContainerClass = "nav side-menu";
    }

    public static function create()
    {
        return new static();
    }

    public function render()
    {
        $m = $this->model;
        if (array_key_exists('sections', $m)) {
            foreach ($m['sections'] as $section) {
                $this->renderSection($section);
            }
        }
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    protected function renderSection(array $section)
    {
        ?>
        <div class="<?php echo $this->sectionContainerClass; ?>">
            <h3><?php echo $section['label']; ?></h3>
            <?php if (count($section['items']) > 0): ?>
                <ul class="<?php echo $this->topLevelItemsContainerClass; ?>">
                    <?php foreach ($section['items'] as $item) {
                        $this->renderItem($item);
                    }
                    ?>
                </ul>
            <?php endif; ?>
        </div>
        <?php
    }


    protected function renderItem(array $item, $level = 0)
    {
        ?>
        <li>


        <?php


        echo $this->renderItemLabel($item, $level);
        if (array_key_exists("items", $item) && count($item['items']) > 0) {
            echo $this->renderItemContainer($item['items'], $level);
        }
        ?></li><?php
    }


    protected function getIconClass(array $item)
    {
        return $item['icon'];
    }

    protected function getArrowDown(array $item)
    {
        if (array_key_exists("items", $item) && count($item['items']) > 0) {
            return '<span class="' . $this->arrowDownClass . '"></span>';
        }
        return "";
    }

    protected function getIcon(array $item)
    {
        $iconClass = $this->getIconClass($item);
        return '<i class="' . $iconClass . '"></i>';
    }

    protected function renderItemLabel(array $item, $level)
    {
        $sArrowDown = "";
        if (array_key_exists("items", $item) && count($item['items']) > 0) {
            $sArrowDown = $this->getArrowDown($item);
        }


        $sIcon = "";
        if (null !== $item['icon']) {
            $sIcon = $this->getIcon($item);
        }

        $sHref = "";
        if (array_key_exists('link', $item)) {
            $sHref = ' href="' . htmlspecialchars($this->getUri($item)) . '"';
        }

        $sBadge = "";
        if (array_key_exists('badge', $item)) {
            $sBadge = $this->getBadge($item);
        }


        ?>
        <a<?php echo $sHref; ?>><?php echo $sIcon; ?><?php echo $item['label']; ?><?php echo $sBadge; ?><?php echo $sArrowDown; ?></a>
        <?php
    }

    protected function renderItemContainer(array $items, $level)
    {
        ?>
        <ul class="<?php echo $this->itemsContainerClass; ?>">
            <?php foreach ($items as $item) {
                $this->renderItem($item, $level + 1);
            }
            ?>
        </ul>
        <?php
    }

    protected function getUri(array $item)
    {
        return $item['link'];
    }

    protected function getBadge(array $item)
    {
        $badge = $item['badge'];
        return '<span class="label label-danger pull-right">' . $badge['text'] . '</span>';
    }
}