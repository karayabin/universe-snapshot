<?php


namespace Ling\Bootstrap4AdminTable\RendererWidget;


/**
 * The AdvancedSearchRendererWidget class.
 */
class AdvancedSearchRendererWidget extends AbstractOpenAdminTableRendererWidget
{


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

        $fields = [
            "id",
            "identifier",
            "pseudo",
//            "password",
            "avatar_url",
            "rights",
            "extra",
        ];

        ?>
        <div class="table-responsive mb-5 collapse oath-advanced-search" id="admin-advanced-search">
            <form action="" method="post">


                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Column</th>
                        <th scope="col">Operator</th>
                        <th scope="col">Value</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($fields as $field):

                        ?>

                        <tr class="rtt-emitter" data-rtt-tag="generic_filter"
                            data-rtt-extra-tag_group="advanced_search">

                            <td data-rtt-variable="column"
                                data-rtt-value="<?php echo $field; ?>"><?php echo $field; ?></td>
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
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="text-right">
                    <button type="submit" class="btn btn-primary oath-search-btn">Go
                    </button>
                </div>
            </form>
        </div>
        <?php
    }


}