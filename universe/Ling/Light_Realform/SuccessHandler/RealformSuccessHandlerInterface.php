<?php


namespace Ling\Light_Realform\SuccessHandler;


/**
 * The RealformSuccessHandlerInterface interface.
 */
interface RealformSuccessHandlerInterface
{



    /**
     * Process the given data, and throws an exception if something unexpected happens.
     * This method can return information if necessary.
     *
     *
     *
     * It is assumed that the given data is valid (it's generally posted by the user
     * and validated by some validation rules first before it arrives here).
     *
     * Available options are:
     * - updateRic: array|false=false, see @page(the updateRic definition in the Light_Realform conception notes) for more details.
     *      It's false if the form is not in update mode.
     * - storageId: string=null, the storage id that you defined in your configuration file.
     * - multiplier: array, the multiplier form array. See [the multiplier form document](https://github.com/lingtalfi/TheBar/blob/master/discussions/form-multiplier.md#the-form-multiplier-array) for more details.
     * - ...or you can add your own options
     *
     *
     *
     *
     * If an exception is thrown, it's message shall be displayed to the user.
     *
     *
     *
     *
     * @param array $data
     * @param array $options
     * @return mixed
     */
    public function execute(array $data, array $options = []);


}