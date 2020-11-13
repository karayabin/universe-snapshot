<?php


namespace Ling\Bootstrap4AdminTable\RendererWidget;


/**
 * The NeckFiltersRendererWidget class.
 */
class NeckFiltersRendererWidget extends AbstractOpenAdminTableRendererWidget implements NeckFiltersRendererWidgetInterface
{


    /**
     * This property holds the columns2DataTypes for this instance.
     * @var array
     */
    protected $columns2DataTypes;


    /**
     * @overrides
     */
    public function __construct()
    {
        parent::__construct();
        $this->columns2DataTypes = [];
    }


    /**
     * @implementation
     */
    public function setColumns2DataTypes(array $column2DataTypes)
    {
        $this->columns2DataTypes = $column2DataTypes;
    }


    /**
     * @implementation
     */
    public function render()
    {
        ?>
        <tr class="table-primary d-none d-sm-table-row oath-neck-filters">
            <?php foreach ($this->columns2DataTypes as $columnName => $dataType): ?>
                <?php switch ($dataType):
                    case 'action': ?>
                        <td>
                            <button type="button" class="btn btn-primary btn-sm text-nowrap oath-clear-all-btn">
                                <i class="far fa-times-circle"></i> Clear all
                            </button>
                        </td>
                        <?php break; ?>
                    <?php case 'checkbox': ?>
                        <td></td>
                        <?php break; ?>
                    <?php default: ?>

                        <td>
                            <div class="d-flex oath-filter-container rtt-emitter" data-rtt-tag="generic_sub_filter"
                                 data-rtt-extra-tag_group="neck_filters">

                                <span class="d-none" data-rtt-variable="column"
                                      data-rtt-value="<?php echo htmlspecialchars($columnName); ?>"></span>
                                <span class="d-none" data-rtt-variable="operator" data-rtt-value="="></span>

                                <?php switch ($dataType):
                                    case 'enum': ?>
                                        <select class="form-control form-control-sm oath-control"
                                                data-rtt-variable="operator_value">
                                            <option>Choose a country</option>
                                            <option>France</option>
                                            <option>Germany</option>
                                            <option>Spain</option>
                                        </select>
                                        <?php break; ?>
                                    <?php default: ?>
                                        <input type="text" class="oath-control"
                                               data-rtt-variable="operator_value"
                                        />
                                        <?php break; ?>
                                    <?php endswitch; ?>

                                <button type="button" class="btn btn-primary btn-xs ml-1 oath-clear-btn"><i
                                            class="fas fa-times"></i></button>
                            </div>
                        </td>
                        <?php break; ?>
                    <?php endswitch; ?>
            <?php endforeach; ?>
        </tr>
        <?php
    }


}