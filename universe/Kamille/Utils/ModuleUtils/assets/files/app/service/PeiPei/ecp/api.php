<?php


use Ecp\EcpServiceUtil;
use Ecp\Output\EcpOutputInterface;
use Module\PeiPei\Ecp\PeiPeiEcpServiceUtil;

/**
 * Tip: use a js wrapper to handle the ecp interaction.
 * If you are using the NullosAdmin module, then you can do something like this (from your front):
 *
 * nullosApi.inst().request("PeiPei:general.test", {}, function (response) {
 *      console.log(response);
 * });
 *
 */
$out = PeiPeiEcpServiceUtil::executeProcess(function ($action, $intent, EcpOutputInterface $output) {

    $out = [];
    switch ($action) {
        //--------------------------------------------
        // TEST (remove me)
        //--------------------------------------------
        case 'general.test':
            $out = [
                'some_success_var' => 6,
            ];
            break;
        case 'general.input_test':
            $number = EcpServiceUtil::get("number"); // by default this will throw an exception if number not sent in $_POST
            $out = [
                'some_success_var' => $number * 2,
            ];
            break;
        case 'general.success_message_test':
            $out = [
                'some_success_var' => 6,
            ];
            $output->success("Send a success message");
            break;
        case 'general.error_message_test':
            $out = [
                'some_success_var' => 6,
            ];

            $output->error("Send an error message");
            break;
        default:
            break;
    }


    return $out;
});

