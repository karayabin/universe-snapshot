<?php


namespace Ling\Light_Realform\Handler;


use Ling\Chloroform\Form\Chloroform;
use Ling\Light_Realform\Renderer\RealformRendererInterface;
use Ling\Light_Realform\SuccessHandler\RealformSuccessHandlerInterface;

/**
 * The RealformHandlerInterface interface.
 */
interface RealformHandlerInterface
{


    /**
     * Sets the realform id.
     *
     * @param string $id
     * @return mixed
     */
    public function setId(string $id);


    /**
     * Returns a chloroform instance configured based on the realform id.
     *
     * @return Chloroform
     * @throws \Exception
     */
    public function getFormHandler(): Chloroform;


    /**
     * Returns the realform configuration based on the realform id.
     *
     * @return array
     * @throws \Exception
     */
    public function getConfiguration(): array;


    /**
     * Returns the success handler for this instance.
     * @return RealformSuccessHandlerInterface
     */
    public function getSuccessHandler(): RealformSuccessHandlerInterface;


    /**
     * Returns the form renderer for this instance.
     * @return RealformRendererInterface
     */
//    public function getFormRenderer(): RealformRendererInterface;
}