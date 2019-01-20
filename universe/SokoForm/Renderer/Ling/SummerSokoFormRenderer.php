<?php


namespace SokoForm\Renderer\Ling;


use SokoForm\Form\SokoFormInterface;
use SokoForm\NotificationRenderer\SokoNotificationRenderer;

class SummerSokoFormRenderer
{

    protected $formModel;


    public static function create()
    {
        return new static();
    }


    public function setForm($form)
    {
        if ($form instanceof SokoFormInterface) {
            $form = $form->getModel();
        }
        $this->formModel = $form;
        return $this;
    }


    public function notifications()
    {
        $renderer = SokoNotificationRenderer::create();
        $notifs = $this->formModel['form']['notifications'];
        foreach ($notifs as $notif) {
            $renderer->render($notif);
        }
    }


    public function submitKey()
    {
        $name = $this->formModel['form']['name'];
        echo '<input type="hidden" name="' . $name . '" value="1">';

    }


    public function renderInput(string $name)
    {

        $controls = $this->formModel['controls'];
        $controlValue = $controls[$name]['value'];
        $controlErrors = $controls[$name]['errors'];


        ?>
        <input type="text" name="<?php echo htmlspecialchars($name); ?>"
               value="<?php echo htmlspecialchars($controlValue); ?>">
        <?php if ($controlErrors): ?>
        <?php $this->printErrors($controlErrors); ?>
    <?php endif; ?>
        <?php
    }


    public function renderTextarea(string $name)
    {

        $controls = $this->formModel['controls'];
        $controlValue = $controls[$name]['value'];
        $controlErrors = $controls[$name]['errors'];


        ?>
        <textarea name="<?php echo htmlspecialchars($name); ?>"><?php echo $controlValue; ?></textarea>
        <?php if ($controlErrors): ?>
        <?php $this->printErrors($controlErrors); ?>
    <?php endif; ?>
        <?php
    }


    public function renderSelect(string $name)
    {
        $controls = $this->formModel['controls'];
        $controlChoices = $controls[$name]['choices'];
        $controlValue = $controls[$name]['value'];
        $controlErrors = $controls[$name]['errors'];
        ?>
        <select name="<?php echo htmlspecialchars($name); ?>">
            <?php foreach ($controlChoices as $k => $v):
                $sSel = ((string)$controlValue === (string)$k) ? "selected='selected'" : "";
                ?>
                <option <?php echo $sSel; ?>
                        value="<?php echo $k; ?>"><?php echo $v; ?></option>
            <?php endforeach; ?>
        </select>
        <?php if ($controlErrors): ?>
        <?php $this->printErrors($controlErrors); ?>
    <?php endif; ?>
        <?php
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    private function printErrors(array $errors)
    {
        ?>
        <div class="form-control-error"><?php echo $errors[0]; ?></div>
        <?php
    }
}