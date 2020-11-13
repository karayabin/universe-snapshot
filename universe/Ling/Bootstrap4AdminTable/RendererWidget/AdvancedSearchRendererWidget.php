<?php


namespace Ling\Bootstrap4AdminTable\RendererWidget;


/**
 * The AdvancedSearchRendererWidget class.
 */
class AdvancedSearchRendererWidget extends AbstractOpenAdminTableRendererWidget
{


    /**
     * This property holds the fields for this instance.
     * It's an array of alias => label representing the searchable columns.
     * @var array
     */
    protected $fields;


    /**
     * Builds the AdvancedSearchRendererWidget instance.
     */
    public function __construct()
    {
        $this->fields = [];
    }

    /**
     * Sets the fields.
     *
     * @param array $fields
     */
    public function setFields(array $fields)
    {
        $this->fields = $fields;
    }


    /**
     * Prints a link that makes the advanced form toggle between the collapsed state and the expanded state.
     * To print the form, use the render method.
     */
    public function renderLink()
    {
        ?>
        <button class="btn btn-link text-left text-nowrap pl-0" data-toggle="collapse"
                aria-expanded="false"
                aria-controls="admin-advanced-search"
                href="#admin-advanced-search">Advanced search
        </button>
        <?php
    }

    /**
     * @implementation
     */
    public function render()
    {

        ?>
        <div class="table-responsive mb-5 collapse oath-advanced-search" id="admin-advanced-search">
            <form action="" method="post">


                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th scope="col">And/Or</th>
                        <th scope="col">Column</th>
                        <th scope="col">Operator</th>
                        <th scope="col">Value</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($this->fields as $alias => $label):

                        ?>

                        <tr class="rtt-emitter" data-rtt-tag="generic_filter"
                            data-rtt-extra-tag_group="advanced_search">

                            <td>
                                <span class="oath-andor-keyword"></span>
                            </td>


                            <td data-rtt-variable="column"
                                title="<?php echo htmlspecialchars($alias); ?>"
                                data-rtt-value="<?php echo $alias; ?>"><?php echo $label; ?></td>
                            <td>
                                <select class="form-control" data-rtt-variable="operator">
                                    <option>=</option>
                                    <option><=</option>
                                    <option>>=</option>
                                    <option value="%like%">LIKE %...%</option>
                                    <option value="in">IN (...)</option>
                                    <option value="between">BETWEEN</option>
                                    <option value="is_null">IS NULL</option>
                                </select>
                            </td>
                            <td>

                                <input type="text" class="form-control input-operator-value"
                                       placeholder="" data-rtt-variable="operator_value">

                            </td>
                            <td>
                                <div class="btn btn-sm btn-outline-primary oath-add-btn">
                                    <i class="fas fa-plus"></i>
                                </div>
                                <div class="btn btn-sm btn-outline-primary oath-remove-btn d-none"
                                data-hide-class="d-none">
                                    <i class="fas fa-minus"></i>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="text-right">
                    <button type="submit" class="btn btn-primary oath-search-btn">Go</button>
                    <button type="submit" class="btn btn-secondary oath-reset-btn">Reset</button>
                </div>
            </form>
        </div>
        <?php
    }


}