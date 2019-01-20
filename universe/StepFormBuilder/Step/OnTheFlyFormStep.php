<?php


namespace StepFormBuilder\Step;


use OnTheFlyForm\OnTheFlyFormInterface;
use StepFormBuilder\Exception\StepFormBuilderException;

class OnTheFlyFormStep extends Step
{

    /**
     * @var OnTheFlyFormInterface $form
     */
    private $form;


    public function __construct()
    {
        $this->form = null;
    }


    public function isPosted()
    {
        return $this->getForm()->isPosted();
    }

    public function getModel(array $defaultValues)
    {
        $this->getForm()->inject($defaultValues, true);
        return $this->getForm()->getModel();
    }

    public function isValid(array $data)
    {
        $ret = $this->getForm()->validate();
        if (true === $ret) {
            $this->onSuccessfulValidateAfter($data);
        }
        return $ret;
    }

    public function inject(array $data)
    {
        return $this->getForm()->inject($data);
    }

    public function getData()
    {
        return $this->getForm()->getData();
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * @param $form , callable returning an OnTheFlyFormInterface instance, or a OnTheFlyFormInterface instance
     * @return $this
     */
    public function setForm($form)
    {
        $this->form = $form;
        return $this;
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    protected function onSuccessfulValidateAfter(array $data)
    {

    }

    //--------------------------------------------
    //
    //--------------------------------------------
    private function getForm()
    {
        if (null === $this->form) {
            throw new StepFormBuilderException("OnTheFlyForm instance not set");
        }
        if (!$this->form instanceof OnTheFlyFormInterface) {
            $this->form = call_user_func($this->form);
        }
        return $this->form;
    }
}


