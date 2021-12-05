<?php


/**
 * @var $this LightKitPrototypeWidgetHandler
 */


use Ling\Light_Kit\WidgetHandler\LightKitPrototypeWidgetHandler;
use Ling\Light_Kit_Store\Service\LightKitStoreService;


$container = $this->getContainer();


/**
 * @var $_ks LightKitStoreService
 */
$_ks = $container->get("kit_store");


$urlChangePassword = $_ks->getApiUrl("changePassword");


?>


<div class="container" style="background: #f9f9f9;">
    <div class="px-4 py-5 my-5 text-center">
        <!--        <img class="d-block mx-auto mb-4" src="/libs/universe/Ling/Light_Kit_Store/img/kit-store-lightning.png" alt=""-->
        <!--             width="72" height="57">-->

        <i class="bi bi-key" style="color: #aa0808; font-size: 50px"></i>
        <h1 class="display-5 fw-bold mb-5">Change your password</h1>
        <div class="col-lg-6 mx-auto">


            <form id="changePasswordForm">

                <div class="alert alert-danger alert-dismissible fade show the-error" role="alert" style="display: none">
                    <span class="the-error-message">
                        <strong>Holy guacamole!</strong> You should check in on some of those fields below.
                    </span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>


                <div class="alert alert-success alert-dismissible fade show the-success" role="alert" style="display: none">
                    <span class="the-success-message">
                        <strong>Holy guacamole!</strong> You should check in on some of those fields below.
                    </span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>



                <div class="form-floating mb-3">
                    <input name="password" autocomplete="new-password" type="password" class="form-control form-collect"
                           id="floatingPass1"
                           placeholder="Password" value="">
                    <label for="floatingPass1">Your new password</label>
                </div>
                <div class="form-floating mb-3">
                    <input name="password_confirm" type="password" class="form-control form-collect" id="floatingPass2"
                           placeholder="Password" value="">
                    <label for="floatingPass2">Confirm the new password</label>
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary submit-change-password-form">

                           <span class="spinner-border spinner-border-sm the-loader" role="status"
                                 aria-hidden="true"></span>

                        Submit</button>
                </div>
            </form>


        </div>
    </div>
</div>


<script>
    document.addEventListener("DOMContentLoaded", function (event) {
        $(document).ready(function () {

            var jForm = $("#changePasswordForm");


            var postCb = AlcpHelper.getContextualPostCallback(jForm, {
                success: function (jTheSuccessMsg, response, textStatus, jqXHR) {
                    jTheSuccessMsg.html(response.message);
                },
            });


            $("body").on("click.kitstore_account_change_password", function (e) {


                var jTarget = $(e.target);
                var url = null;
                var data = {};


                if (jTarget.hasClass("submit-change-password-form")) {

                    data = FormCollect.collect({
                        context: jForm,
                    });


                    url = "<?php echo $urlChangePassword; ?>";
                    postCb(url, data);
                    return false;
                }
            });


        });
    });
</script>