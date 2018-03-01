<?php


namespace GuiAdminTable\Renderer;


class MorphicBootstrap3GuiAdminHtmlTableRenderer extends Bootstrap3GuiAdminHtmlTableRenderer
{
    public function __construct()
    {
        parent::__construct();
        $this->addHtmlAttributes("table", [
            'class' => "morphic-table",
        ]);
    }


    protected function getHeaderColClasses($col)
    {
        $classes = parent::getHeaderColClasses($col);
        if (true === $this->useSort) {
            $classes[] = "morphic-table-sort";
            $classes[] = "morphic";
        }
        return $classes;
    }

    protected function getHeaderColAttributes($col)
    {
        $attributes = parent::getHeaderColAttributes($col);

        if (true === $this->useSort) {
            $dir = "null";
            if (array_key_exists($col, $this->headersDirection)) {
                $v = $this->headersDirection[$col];
                if (true === $v || 'asc' === $v) {
                    $dir = "asc";
                } elseif (false === $v || 'desc' === $v) {
                    $dir = "desc";

                }
            }
            if (null !== $dir) {
                $attributes["data-sort-dir"] = $dir;
            }
            $attributes["data-column"] = $col;

        }
        return $attributes;
    }

    protected function displayCheckboxCell()
    {
        ?>
        <td><input class="morphic morphic-checkbox" type="checkbox"></td>
        <?php
    }


    protected function displaySearchButton()
    {
        ?>
        <button type="button" class="btn btn-default btn-sm morphic morphic-table-search-btn">
            <i class="fa fa-search"></i>
            Rechercher
        </button>
        <button type="button" class="btn btn-default btn-sm morphic morphic-table-search-reset-btn">
            <i class="fa fa-close"></i>
        </button>
        <?php
    }


    protected function displayDefaultSearchCol($col)
    {
        $value = "";
        if (array_key_exists($col, $this->searchValues)) {
            $value = $this->searchValues[$col];
        }
        ?>
        <input data-column="<?php echo $col; ?>" class="morphic-table-filter" type="text"
               value="<?php echo htmlspecialchars($value); ?>">
        <?php
    }
}