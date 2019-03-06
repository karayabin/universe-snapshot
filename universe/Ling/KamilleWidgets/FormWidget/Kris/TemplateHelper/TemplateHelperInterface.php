<?php


namespace Ling\KamilleWidgets\FormWidget\Kris\TemplateHelper;

interface TemplateHelperInterface
{


    public function setFormErrorPosition($formErrorPosition);

    public function setDisplayFirstErrorOnly($displayFirstErrorOnly);
    //--------------------------------------------
    // 
    //--------------------------------------------

    public function wrapControl($s, array $control, $identifier);

    public function wrapHint($hint);

    public function wrapAllControlErrors(array $errors);

    public function wrapOneControlError($error);

    public function wrapAllFormErrors(array $errors);

    public function wrapOneFormError($errorMsg);


    public function onControlNotFound($identifier);

    public function wrapGroup($groupIdentifier, array $groupInfo, array $controls, array $groups, array &$allGroups);


    public function wrapFormMessages(array $formMessages);


    public function formatCentralizedError($identifier, $errorMsg, array $controls);


}