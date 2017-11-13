<?php


namespace SokoForm\Renderer\Traits\Table;


trait SokoDate3TableTrait
{


    /**
     * Displays a control having 3 "selects" one next to the other.
     * By default:
     *      day - month - year
     *
     *
     * The preferences takes the following entries:
     *
     * - ?label: null|string, if set, represents the label to display
     *
     *
     */
    public function date3($dayChoiceListName, $monthChoiceListName, $yearChoiceListName, array $preferences = null)
    {
        if (null === $preferences) {
            $preferences = [
                'label' => null,
            ];
        }

        $label = $preferences['label'];
        $dayModel = $this->formModel['controls'][$dayChoiceListName];
        $monthModel = $this->formModel['controls'][$monthChoiceListName];
        $yearModel = $this->formModel['controls'][$yearChoiceListName];


        ?>
        <tr>
            <td>
                <?php echo $label; ?>
            </td>
            <td>
                <?php $this->doRenderChoiceWidget($dayModel); ?>
                <?php $this->doRenderChoiceWidget($monthModel); ?>
                <?php $this->doRenderChoiceWidget($yearModel); ?>
            </td>
        </tr>
        <?php

        $model = [
            'errors' => array_merge(
                $dayModel['errors'],
                $monthModel['errors'],
                $yearModel['errors']
            )
        ];
        $this->doRenderError($model);
    }
}