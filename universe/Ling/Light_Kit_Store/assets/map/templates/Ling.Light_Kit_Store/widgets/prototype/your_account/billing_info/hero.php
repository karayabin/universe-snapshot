<?php


/**
 * @var $this LightKitPrototypeWidgetHandler
 */


use Ling\HtmlToolbox\HtmlTool;
use Ling\IsoTools\IsoCountryTool;
use Ling\Light_Kit\WidgetHandler\LightKitPrototypeWidgetHandler;
use Ling\Light_Kit_Store\Service\LightKitStoreService;



$container = $this->getContainer();


/**
 * @var $_ks LightKitStoreService
 */
$_ks = $container->get("kit_store");


$submitBillingInfoForm = $_ks->getApiUrl("updateBillingInfo");

$userRow = $z['userRow'];

$countries = IsoCountryTool::getCountryList();
array_unshift($countries, "Choose a country");





?>


<div class="container" style="background: #f9f9f9;">
    <div class="px-4 py-5 my-5 text-center">
        <!--        <img class="d-block mx-auto mb-4" src="/libs/universe/Ling/Light_Kit_Store/img/kit-store-lightning.png" alt=""-->
        <!--             width="72" height="57">-->

        <i class="bi bi-info-circle" style="color: #088caa; font-size: 50px"></i>
        <h1 class="display-5 fw-bold">Your billing info</h1>
        <div class="col-lg-6 mx-auto">


            <form id="billingInfoForm">

                <div class="alert alert-danger alert-dismissible fade show the-error" role="alert"
                     style="display: none">
                    <span class="the-error-message">
                        <strong>Holy guacamole!</strong> You should check in on some of those fields below.
                    </span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>


                <div class="alert alert-success alert-dismissible fade show the-success" role="alert"
                     style="display: none">
                    <span class="the-success-message">
                        <strong>Holy guacamole!</strong> You should check in on some of those fields below.
                    </span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>


                <div class="form-floating mb-3">
                    <input name="company" type="text" class="form-control form-collect"
                           id="field-company"
                           placeholder="Your company" value="<?php echo htmlspecialchars($userRow['company']); ?>">
                    <label for="field-company">Company</label>
                </div>

                <div class="form-floating mb-3">
                    <input name="first_name" type="text" class="form-control form-collect"
                           id="field-first_name"
                           placeholder="Your first name"
                           value="<?php echo htmlspecialchars($userRow['first_name']); ?>">
                    <label for="field-first_name">First Name</label>
                </div>

                <div class="form-floating mb-3">
                    <input name="last_name" type="text" class="form-control form-collect"
                           id="field-last_name"
                           placeholder="Your last name" value="<?php echo htmlspecialchars($userRow['last_name']); ?>">
                    <label for="field-last_name">Last Name</label>
                </div>

                <div class="form-floating mb-3">
                    <input name="address" type="text" class="form-control form-collect"
                           id="field-address"
                           placeholder="Your Address" value="<?php echo htmlspecialchars($userRow['address']); ?>">
                    <label for="field-address">Address</label>
                </div>

                <div class="form-floating mb-3">
                    <input name="zip_postal_code" type="text" class="form-control form-collect"
                           id="field-zip_postal_code"
                           placeholder="Your zip/postal code"
                           value="<?php echo htmlspecialchars($userRow['zip_postal_code']); ?>">
                    <label for="field-zip_postal_code">Zip/Postal Code</label>
                </div>

                <div class="form-floating mb-3">
                    <input name="city" type="text" class="form-control form-collect"
                           id="field-city"
                           placeholder="Your city" value="<?php echo htmlspecialchars($userRow['city']); ?>">
                    <label for="field-city">City</label>
                </div>

                <div class="form-floating mb-3">
                    <input name="state_province_region" type="text" class="form-control form-collect"
                           id="field-state_province_region"
                           placeholder="Your state/province/region"
                           value="<?php echo htmlspecialchars($userRow['state_province_region']); ?>">
                    <label for="field-state_province_region">State/Province/Region</label>
                </div>

                <div class="form-floating mb-3">
                    <select name="country" class="form-select form-collect" id="field-country">
                        <?php echo HtmlTool::renderSelectOptions($countries, $userRow['country']); ?>
                    </select>
                    <label for="field-country">Country</label>
                </div>

                <div class="form-floating mb-3">
                    <input name="phone" type="text" class="form-control form-collect"
                           id="field-phone"
                           placeholder="Your phone" value="<?php echo htmlspecialchars($userRow['phone']); ?>">
                    <label for="field-phone">Phone</label>
                </div>


                <div class="mb-3">
                    <button type="submit" class="btn btn-primary submit-account-billing-info-form">

                           <span class="spinner-border spinner-border-sm the-loader" role="status"
                                 aria-hidden="true"></span>

                        Submit
                    </button>
                </div>
            </form>


        </div>
    </div>
</div>


<script>
    document.addEventListener("DOMContentLoaded", function (event) {
        $(document).ready(function () {

            var jForm = $("#billingInfoForm");


            var postCb = AlcpHelper.getContextualPostCallback(jForm, {
                success: function (jTheSuccessMsg, response, textStatus, jqXHR) {
                    jTheSuccessMsg.html(response.message);
                },
            });


            $("body").on("click.kit_store_account_billing_info", function (e) {


                var jTarget = $(e.target);
                var url = null;
                var data = {};


                if (jTarget.hasClass("submit-account-billing-info-form")) {

                    data = FormCollect.collect({
                        context: jForm,
                    });


                    url = "<?php echo $submitBillingInfoForm; ?>";
                    postCb(url, data);
                    return false;
                }
            });


        });
    });
</script>


