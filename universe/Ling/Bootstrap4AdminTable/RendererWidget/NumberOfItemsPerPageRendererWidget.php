<?php


namespace Ling\Bootstrap4AdminTable\RendererWidget;


/**
 * The NumberOfItemsPerPageRendererWidget class.
 */
class NumberOfItemsPerPageRendererWidget extends AbstractRendererWidget
{


    /**
     * This property holds the values for this instance.
     * @var array
     */
    protected $values;

    /**
     * This property holds the defaultValue for this instance.
     * @var string=10
     */
    protected $defaultValue;


    /**
     * Builds the NumberOfItemsPerPageRendererWidget instance.
     */
    public function __construct()
    {
        $this->values = [
            'all' => 'All',
            '5' => '5',
            '10' => '10',
            '25' => '25',
            '50' => '50',
            '100' => '100',
            '200' => '200',
            '500' => '500',
        ];
        $this->defaultValue = "10";
    }

    /**
     * @implementation
     */
    public function render()
    {
        $defaultValue = (string)$this->defaultValue;
        ?>
        <div class="pt-2 oath-number-of-items-per-page">
            Per page:
            <select class="oath-nipp-selector rtt-emitter"
                    data-rtt-tag="limit"
                    data-rtt-extra-tag_group="pagination"
                    data-rtt-variable="page_length"
            >
                <?php foreach ($this->values as $val => $label):
                    $sSelected = ((string)$val === $defaultValue) ? 'selected="selected"' : "";
                    ?>
                    <option <?php echo $sSelected; ?>
                            value="<?php echo htmlspecialchars($val); ?>"><?php echo $label; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <?php
    }


}