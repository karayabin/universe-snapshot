<?php


namespace GuiAdminTable\Renderer;


use GuiAdminTable\Exception\GuiAdminTableException;

class MorphicBootstrap3GuiAdminHtmlTableRenderer extends Bootstrap3GuiAdminHtmlTableRenderer
{


    protected $searchColumnHelpers;

    public function __construct()
    {
        parent::__construct();
        $this->addHtmlAttributes("table", [
            'class' => "morphic-table",
        ]);
        $this->searchColumnHelpers = [];
    }

    public function render()
    {
        if ($this->searchColumnHelpers) {
            foreach ($this->searchColumnHelpers as $column => $helper) {
                list($type, $param1) = $helper;
                switch ($type) {
                    case "list":
                        $this->addSearchColumnGenerator($column, function ($col) use ($param1) {
                            $value = "";
                            if (array_key_exists($col, $this->searchValues)) {
                                $value = $this->searchValues[$col];
                            }
                            ?>
                            <select data-column="<?php echo $col; ?>" class="morphic-table-filter">
                                <option value="">-</option>
                                <?php foreach ($param1 as $val => $label):
                                    $sSel = ((string)$val === (string)$value) ? 'selected="selected"' : "";
                                    ?>
                                    <option <?php echo $sSel; ?>
                                            value="<?php echo htmlspecialchars($val); ?>"><?php echo $label; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <?php
                        });
                        break;
                    case "date":
                        $this->addSearchColumnGenerator($column, function ($col) use ($param1) {
                            list($lowestName, $highestName) = $param1;
                            $isDateTime = $param1[2] ?? false;


                            $className = "filter-datepicker";
                            if (true === $isDateTime) {
                                $className .= "-datetime morphic-manual-change";
                            }


                            $lowestValue = "";
                            if (array_key_exists($lowestName, $this->searchValues)) {
                                $lowestValue = $this->searchValues[$lowestName];
                            }
                            $highestValue = "";
                            if (array_key_exists($highestName, $this->searchValues)) {
                                $highestValue = $this->searchValues[$highestName];
                            }
                            ?>
                            <div class="filter-date-container">
                                <div class="input-group input-group-sm"><input data-column="<?php echo $lowestName; ?>"
                                                                               class="form-control <?php echo $className; ?> morphic-table-filter"
                                                                               placeholder="Du"
                                                                               value="<?php echo htmlspecialchars($lowestValue); ?>">
                                    <span
                                            class="input-group-addon"><i class="fa fa-calendar"></i></span></div>
                                <div class="input-group input-group-sm"><input data-column="<?php echo $highestName; ?>"
                                                                               class="form-control <?php echo $className; ?> morphic-table-filter"
                                                                               placeholder="Au"
                                                                               value="<?php echo htmlspecialchars($highestValue); ?>">
                                    <span
                                            class="input-group-addon"><i class="fa fa-calendar"></i></span></div>
                            </div>
                            <?php
                        });
                        break;
                    case "numeric_comparator":
                        $this->addSearchColumnGenerator($column, function ($col) use ($param1) {
                            list($lessCol, $moreCol) = $param1;
                            ?>
                                                        Bobby Fisher <?php echo $moreCol; ?>
                            <input data-column="<?php echo $col; ?>" class="morphic-table-filter" value="" type="text">
                            <div class="math_symbol_container">
                                <div class="less-than">
                                    <span class="math_symbol">&gt;</span> <input data-column="<?php echo $moreCol; ?>" type="text" value=""
                                                                               class="morphic-table-filter">
                                </div>
                                <div class="more-than">
                                    <span class="math_symbol">&lt;</span> <input data-column="<?php echo $lessCol; ?>" type="text" value=""
                                                                               class="morphic-table-filter">
                                </div>

                            </div>
                            <?php
                        });
                        break;
                    default:
                        throw new GuiAdminTableException("Unknown searchColumnHelper: $type");
                        break;
                }
            }
        }
        parent::render();
    }


    public function addSearchColumnHelper($column, $helperType, $param1 = null)
    {
        $this->searchColumnHelpers[$column] = [$helperType, $param1];
        return $this;
    }




    //--------------------------------------------
    //
    //--------------------------------------------
    protected function getHeaderColClasses($col)
    {
        $classes = parent::getHeaderColClasses($col);
        if (true === $this->useSort) {
            if (!in_array($col, $this->deadCols, true)) {
                $classes[] = "morphic-table-sort";
                $classes[] = "morphic";
            }
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
        <div style="display: flex;">
            <button type="button" class="btn btn-default btn-sm morphic morphic-table-search-btn">
                <i class="fa fa-search"></i>
                Rechercher
            </button>
            <button type="button" class="btn btn-default btn-sm morphic morphic-table-search-reset-btn">
                <i class="fa fa-close"></i>
            </button>
        </div>
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