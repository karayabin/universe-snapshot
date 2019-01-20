<?php


namespace SokoForm\Renderer;


use SokoForm\Renderer\Traits\Table\SokoDate3TableTrait;

class SokoDemoFormRenderer extends SokoTableFormRenderer
{

    use SokoDate3TableTrait;


    public function phone($phoneIndicator, $phone, array $preferences = null)
    {
        $label = $this->getPreference("label", $preferences, "Phone");
        $controls = $this->formModel['controls'];

        $phoneIndicatorControl = $controls[$phoneIndicator];
        $phoneControl = $controls[$phone];

        ?>
        <tr>
            <td>
                <?php echo $label; ?>
            </td>
            <td>
                <?php $this->doRenderInputWidget($phoneIndicatorControl); ?>
                <?php $this->doRenderInputWidget($phoneControl); ?>
            </td>
        </tr>
        <?php

        $model = [
            'errors' => array_merge(
                $phoneIndicatorControl['errors'],
                $phoneControl['errors']
            )
        ];
        $this->doRenderError($model);

    }

}