<?php


/**
 * @var $this LkeEditorWidget
 */


use Ling\Light_CsrfSession\Service\LightCsrfSessionService;
use Ling\Light_Kit_Admin_Kit_Editor\Service\LightKitAdminKitEditorService;
use Ling\Light_Kit_Admin_Kit_Editor\Widget\Picasso\LkeEditorWidget;
use Ling\Light_Kit_Store\Service\LightKitStoreService;
use Ling\Light_ProjectVars\Service\LightProjectVarsService;


//--------------------------------------------
// services
//--------------------------------------------
$container = $this->getContainer();

/**
 * @var $_kae LightKitAdminKitEditorService
 */
$_kae = $container->get("kit_admin_kit_editor");

/**
 * @var $_ks LightKitStoreService
 */
$_ks = $container->get("kit_store");

/**
 * @var $_cs LightCsrfSessionService
 */
$_cs = $container->get("csrf_session");

/**
 * @var $_pv LightProjectVarsService
 */
$_pv = $container->get("project_vars");


//--------------------------------------------
//
//--------------------------------------------
$title = $z['title'] ?? "Website Editor";
$websites = $z['websites'] ?? [];


$csrfToken = $_cs->getToken();


//az($_SESSION, $_COOKIE);


$this->copilot->registerLibrary("formHelpers", [
    "/libs/universe/Ling/JRadioHide/radio-hide.js",
    "/libs/universe/Ling/JSelectHide/select-hide.js",
    "/libs/universe/Ling/jFormCollect/form-collect.js",
]);


//az($_COOKIE);
$kitStoreEmail = $_COOKIE['kitstore_email'] ?? "";
$kitStorePassword = $_COOKIE['kitstore_password'] ?? "";
$kitStoreRememberMe = $_COOKIE['kitstore_remember_me'] ?? "1";
$kitStoreToken = $_kae->getKitStoreToken();


$projectName = $_pv->getVariable("project_name");
$clientWebsite = $projectName;


$recaptchaSiteKey = $_ks->getRecaptchaKey($projectName, true);


$this->copilot->registerLibrary("recaptcha", [
    "https://www.google.com/recaptcha/api.js?render=$recaptchaSiteKey",
]);

?>

<style type="text/css">
    #kit-lke-editor-container .list-group-item-disabled {
        background-color: #ececec;
        color: #a2a2a2;
    }
</style>


<div id="kit-lke-editor-container"
     class="kit-lke_editor container-fluid <?php echo htmlspecialchars($this->getCssClass()); ?>"
    <?php echo $this->getAttributesHtml(); ?>
>
    <div class="row">
        <div class="col m-auto">
            <div class="card">
                <div class="card-header">
                    <h5><?php echo $title; ?></h5>
                </div>
                <div class="card-body">
                    <div>
                        <select>
                            <?php foreach ($websites as $website):

                                $id = $website['identifier'];
                                $label = $website['label'] ?? 'no label';
                                ?>
                                <option value="<?php echo htmlspecialchars($id); ?>"><?php echo $label; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <a href="#"><i class="fas fa-edit text-primary"></i></a>
                        <a class="lke-action" data-action="open-add-website-dialog" href="#" title="add a website"><i
                                    class="fas fa-plus-circle text-primary"></i></a>
                        <a
                                class="lke-action"
                                data-action="remove-website"
                                data-website-id="<?php echo htmlspecialchars($id); ?>"
                                href="#"><i class="fas fa-trash-alt text-primary"></i></a>


                        <div class="gui-loader d-none spinner-border spinner-border-sm" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>

                    <hr>

                    <div class="container-fluid">
                        <div class="row">

                            <div class="col">
                                <h6 class="d-flex">
                                    <span>Pages</span>
                                    <a href="#" class="ml-auto"><i class="fas fa-plus-circle text-primary"></i></a>
                                </h6>

                                <div class="list-group">
                                    <button type="button"
                                            class="d-flex list-group-item p-1 list-group-item-action active"
                                            aria-current="true">
                                        <span>The current button</span>
                                        <a href="#" class="ml-auto"><i class="fas fa-edit text-white"></i></a>
                                        <a href="#" class="ml-2"><i class="fas fa-trash-alt text-white"></i></a>
                                    </button>
                                    <button type="button" class="d-flex list-group-item p-1 list-group-item-action">
                                        <span>A second item</span>
                                        <a href="#" class="ml-auto"><i class="fas fa-edit text-primary"></i></a>
                                        <a href="#" class="ml-2"><i class="fas fa-trash-alt text-primary"></i></a>
                                    </button>
                                    <button type="button"
                                            class="d-flex list-group-item list-group-item-disabled list-group-item-secondary p-1 list-group-item-action">
                                        <span>Disabled page</span>
                                        <a href="#" class="ml-auto"><i class="fas fa-edit text-primary"></i></a>
                                        <a href="#" class="ml-2"><i class="fas fa-trash-alt text-primary"></i></a>
                                    </button>
                                    <button type="button" class="d-flex list-group-item p-1 list-group-item-action">
                                        <span>A fourth item</span>
                                        <a href="#" class="ml-auto"><i class="fas fa-edit text-primary"></i></a>
                                        <a href="#" class="ml-2"><i class="fas fa-trash-alt text-primary"></i></a>
                                    </button>
                                </div>


                            </div>
                            <div class="col">
                                <h6 class="d-flex">
                                    <span>Positions</span>
                                </h6>


                                <?php for ($j = 1;
                                           $j <= 3;
                                           $j++): ?>
                                    <ul class="list-group mb-2">
                                        <li class="d-flex-column list-group-item p-1 list-group-item-info"
                                            aria-current="true">
                                            <div class="d-flex">
                                                <span class="text-bold"><b>Header</b></span>
                                                <a href="#" class="ml-auto"><i
                                                            class="fas fa-plus-circle text-primary"></i></a>
                                                <span class="ml-2">
                                                    <a data-toggle="collapse"
                                                       href="#lke-bowc<?php echo $j; ?>"
                                                    ><i
                                                                class="fas fa-list-ul text-primary"></i></a></span>
                                            </div>


                                            <div class="collapse" id="lke-bowc<?php echo $j; ?>">
                                                <hr>


                                                <div
                                                        class="block-or-widget-container d-flex flex-column flex-grow-1">

                                                    <?php for ($i = 1;
                                                               $i <= 3;
                                                               $i++): ?>


                                                        <ul class="list-group mb-2">
                                                            <li class="d-flex list-group-item p-1 active"
                                                                aria-current="true">
                                                                <span>Block <?php echo $i; ?></span>
                                                                <span class="ml-auto">
                                            <a href="#"><i class="fas fa-plus-circle text-white"></i></a>
                                            <a href="#"><i class="fas fa-edit text-white"></i></a>
                                            <a data-toggle="collapse" href="#lke-wc<?php echo $i; ?>"><i
                                                        class="fas fa-list-ul text-white"></i></a>
                                            <a href="#"><i class="fas fa-arrow-up text-white"></i></a>
                                            <a href="#"><i class="fas fa-arrow-down text-white"></i></a>
                                            <a href="#"><i class="fas fa-trash-alt text-white"></i></a>
                                        </span>
                                                            </li>
                                                            <li class="list-group-item collapse"
                                                                id="lke-wc<?php echo $i; ?>">
                                                                <ul class="list-group">
                                                                    <li class="d-flex list-group-item p-1 active"
                                                                        aria-current="true">
                                                                        <span>Widget 1</span>
                                                                        <span class="ml-auto">
                                                    <a href="#"><i class="fas fa-edit text-white"></i></a>
                                                    <a href="#"><i class="fas fa-arrow-up text-white"></i></a>
                                                    <a href="#"><i class="fas fa-arrow-down text-white"></i></a>
                                                    <a href="#"><i class="fas fa-trash-alt text-white"></i></a>
                                                </span>
                                                                    </li>
                                                                    <li class="list-group-item p-1 d-flex">
                                                                        <span>Widget 2</span>
                                                                        <span class="ml-auto">
                                                    <a href="#"><i class="fas fa-edit text-primary"></i></a>
                                                    <a href="#"><i class="fas fa-arrow-up text-primary"></i></a>
                                                    <a href="#"><i class="fas fa-arrow-down text-primary"></i></a>
                                                    <a href="#"><i class="fas fa-trash-alt text-primary"></i></a>
                                                </span>
                                                                    </li>
                                                                    <li class="list-group-item list-group-item-disabled p-1 d-flex">
                                                                        <span>Widget 3 disabled</span>
                                                                        <span class="ml-auto">
                                                    <a href="#"><i class="fas fa-edit text-primary"></i></a>
                                                    <a href="#"><i class="fas fa-arrow-up text-primary"></i></a>
                                                    <a href="#"><i class="fas fa-arrow-down text-primary"></i></a>
                                                    <a href="#"><i class="fas fa-trash-alt text-primary"></i></a>
                                                </span>
                                                                    </li>
                                                                </ul>

                                                            </li>
                                                        </ul>
                                                    <?php endfor; ?>
                                                    <ul class="list-group mb-2">
                                                        <li class="list-group-item p-1 d-flex">
                                                            <span>Widget 2</span>
                                                            <span class="ml-auto">
                                                    <a href="#"><i class="fas fa-edit text-primary"></i></a>
                                                    <a href="#"><i class="fas fa-arrow-up text-primary"></i></a>
                                                    <a href="#"><i class="fas fa-arrow-down text-primary"></i></a>
                                                    <a href="#"><i class="fas fa-trash-alt text-primary"></i></a>
                                                </span>
                                                        </li>
                                                    </ul>

                                                </div>
                                            </div>
                                    </ul>
                                <?php endfor; ?>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


<?php
require_once __DIR__ . "/modals/create-website.modal.php";
?>


<script>
    document.addEventListener("DOMContentLoaded", function (event) {
        $(document).ready(function () {


            var controller = 'Ling\\Light_Kit_Admin_Kit_Editor\\Controller\\Editor\\LkeEditorController';
            var paneOrScreenHistory = [];


            function getControllerUrl(method) {
                return '/hub?execute=' + controller + '->' + method;
            }

            function getKitStoreUrl(_method) {
                var _controller = "Ling\\Light_Kit_Store\\Controller\\StoreApiController";
                return "https://kitstore/hub?execute=" + _controller + '->' + _method;
            }


            //----------------------------------------
            // MODALS
            //----------------------------------------
            var jModalCreateWebsite = $('#create-website-modal');
            jModalCreateWebsite.on('show.bs.modal', function () {


                var jModalCreateWebsiteContext = $(this);
                var jCreateWebsitePane1 = $('#lke-create-website-pane');
                var jErrorContainer = jModalCreateWebsiteContext.find('.error-container');


                function resetErrorContainer() {
                    jErrorContainer.addClass('d-none');
                    jErrorContainer.find(".error-message").html("");
                }

                function switchModalContentPane(paneId, historySource) {

                    jModalCreateWebsiteContext.find(".modal-content-pane").each(function () {
                        if (paneId === $(this).attr('data-id')) {
                            $(this).removeClass('d-none');
                            if ('undefined' !== typeof historySource) {
                                paneOrScreenHistory.push(historySource);
                            }
                        } else {
                            $(this).addClass('d-none');
                        }
                    });
                }

                function switchModalFocusScreen(screenId, historySource) {
                    jModalCreateWebsiteContext.find(".user-focus-screen-content").each(function () {
                        if (screenId === $(this).attr('data-id')) {


                            $(this).removeClass('d-none');
                            if ('undefined' !== typeof historySource) {
                                paneOrScreenHistory.push(historySource);
                            }
                        } else {
                            $(this).addClass('d-none');
                        }
                    });
                }


                resetErrorContainer();


                var jLoginSignupError = jModalCreateWebsiteContext.find('.signup-error-container');
                var jLoginSignupSuccess = jModalCreateWebsiteContext.find('.signup-error-success');

                function loginSignupFormReset() {
                    jLoginSignupError.empty();
                    jLoginSignupError.addClass("d-none");
                    jLoginSignupSuccess.empty();
                    jLoginSignupSuccess.addClass("d-none");
                }

                function loginSignupFormAddError(msg) {
                    jLoginSignupError.html(msg);
                    jLoginSignupError.removeClass("d-none");
                }

                function loginSignupFormSuccess(msg) {
                    jLoginSignupSuccess.html(msg);
                    jLoginSignupSuccess.removeClass("d-none");
                }


                var createWebsiteLoginSignupLoader = jModalCreateWebsiteContext.find('.create-website-kistore-login-loader');


                /**
                 * Note: we use the same callback for sign in as well.
                 */
                var ajaxKitStoreLoginSignUp = function (url, success, options) {
                    if ('undefined' === typeof options) {
                        options = {};
                    }
                    options.before = function () {
                        createWebsiteLoginSignupLoader.removeClass('d-none');
                    };

                    options.after = function () {
                        createWebsiteLoginSignupLoader.addClass('d-none');
                    };

                    options.error = function (msg) {
                        loginSignupFormAddError(msg);
                    };
                    window.LightKitAdminEnvironment.alcpCall(url, success, options);
                };


                var jModalCreateWebsiteLoader = jModalCreateWebsiteContext.find('.gui-loader');

                jModalCreateWebsiteContext.off('click.lke').on('click.lke', function (e) {

                    var jTarget = $(e.target);
                    if (jTarget.hasClass("modal-submit-button")) {
                        resetErrorContainer();
                        var creationMethodId = jModalCreateWebsiteContext.find('.radio-create-technique:checked').attr('data-target');
                        var data = {};

                        switch (creationMethodId) {
                            case 'create-website-1':
                                data = FormCollect.collect({
                                    context: jCreateWebsitePane1,
                                });
                                data.create_technique = "scratch";
                                break;
                            case 'create-website-2':
                                var jCreateWebsitePane2 = $('#lke-create-website-pane-2');
                                data = FormCollect.collect({
                                    context: jCreateWebsitePane2,
                                });
                                data.create_technique = "duplicate";
                                break;
                            default:
                                throw new Error("Unhandled website creation method: " + creationMethodId);
                                break;
                        }


                        window.LightKitAdminEnvironment.alcpCall(
                            getControllerUrl("addWebsite"),
                            function () {
                                jModalCreateWebsite.modal('hide');
                            },
                            {
                                loader: jModalCreateWebsiteLoader,
                                error: function (errMsg) {
                                    jErrorContainer.removeClass('d-none');
                                    jErrorContainer.find(".error-message").html(errMsg);
                                },
                                postParams: {
                                    data: data,
                                },
                            }
                        );
                        return false;
                    } else if (jTarget.hasClass("install-website-model-btn")) {
                        switchModalContentPane("install-website", ['pane', "main"]);
                        return false;
                    } else if (jTarget.hasClass("toolbox-back-to-website-list-action")) {

                        var lastPaneOrScreen = paneOrScreenHistory.pop();

                        var type, id;
                        if ('undefined' === typeof lastPaneOrScreen) {
                            type = "pane";
                            id = "main";
                        } else {
                            type = lastPaneOrScreen[0];
                            id = lastPaneOrScreen[1];
                        }

                        if ('pane' === type) {
                            switchModalContentPane(id);
                        } else if ("screen" === type) {
                            switchModalFocusScreen(id);
                        } else {
                            throw new Error("Unknown pane or screen type: " + id);
                        }
                        return false;
                    } else if (jTarget.hasClass("install-confirm-button")) {
                        switchModalFocusScreen("login", ['screen', "install"]);
                        return false;
                    } else if (jTarget.hasClass("slide-to-forgot-password-section-action")) {
                        var jScroller = jTarget.closest(".scroller");
                        jScroller.addClass("show-forgot-password");
                        return false;
                    } else if (jTarget.hasClass("slide-to-login-section-action")) {
                        var jScroller2 = jTarget.closest(".kitstore-login-card").find('.scroller');
                        jScroller2.removeClass("show-forgot-password");
                        if (false === jTarget.hasClass("tab")) {
                            return false;
                        }
                    } else if (jTarget.hasClass("kitstore-sign-up-action")) {


                        grecaptcha.ready(function () {
                            grecaptcha.execute('<?php echo $recaptchaSiteKey; ?>', {action: 'submit'}).then(function (token) {
                                var url = getKitStoreUrl("signUp");
                                var formData = FormCollect.collect({
                                    context: jModalCreateWebsiteContext.find('.sign-up-form'),
                                });

                                formData['g-recaptcha-response'] = token;

                                ajaxKitStoreLoginSignUp(url,
                                    function () {
                                        loginSignupFormReset();
                                        loginSignupFormSuccess("You signed up successfully. You can now try to log in.");
                                    },
                                    {
                                        post: formData,
                                    }
                                );
                            });
                        });
                        return false;
                    } else if (jTarget.hasClass("kitstore-sign-in-action")) {


                        var url = getKitStoreUrl("signIn");
                        var formData = FormCollect.collect({
                            context: jModalCreateWebsiteContext.find('.sign-in-form'),
                        });


                        if (true === formData.remember_me) {

                            var rm = (true === formData.remember_me) ? "1" : "0";

                            document.cookie = "kitstore_email=" + formData.email + '; secure';
                            document.cookie = "kitstore_password=" + formData.password + '; secure';
                            document.cookie = "kitstore_remember_me=" + rm + '; secure';
                        } else {
                            document.cookie = "kitstore_email=";
                            document.cookie = "kitstore_password=";
                            document.cookie = "kitstore_remember_me=0";
                        }


                        ajaxKitStoreLoginSignUp(url,
                            function (response, options) {


                                options.post = {
                                    token: response.token,
                                    csrf: "<?php echo $csrfToken; ?>",
                                };


                                loginSignupFormReset();
                                loginSignupFormSuccess("You signed in successfully.");

                                var url = getControllerUrl("updateKitStoreToken");

                                window.LightKitAdminEnvironment.alcpCall(url, function (response) {

                                }, options);


                            },
                            {
                                post: formData,
                            }
                        );
                        return false;
                    } else if (jTarget.hasClass("kitstore-reset-password-action")) {

                        var url2 = getKitStoreUrl("sendResetPasswordEmail");

                        var formData2 = FormCollect.collect({
                            context: jModalCreateWebsiteContext.find('.forgot-password-tab'),
                        });

                        formData2.client_website = "<?php echo $clientWebsite; ?>";


                        var email = formData2.email;
                        ajaxKitStoreLoginSignUp(url2,
                            function (response, options) {
                                loginSignupFormReset();
                                loginSignupFormSuccess("An email has been sent to " + email + ". Check your mailbox to reset your password.");
                            },
                            {
                                post: formData,
                            }
                        );
                        return false;
                    }
                });


                RadioHide.init({
                    context: jModalCreateWebsiteContext,
                    openPane: "create-website-3",
                    changeAfter: function (targetPane) {
                        resetErrorContainer();
                        if ('create-website-3' === targetPane) {
                            jModalCreateWebsiteContext.find(".modal-dialog").addClass('modal-xl');
                            jModalCreateWebsiteContext.find(".modal-footer").addClass('d-none');
                        } else {
                            jModalCreateWebsiteContext.find(".modal-dialog").removeClass('modal-xl');
                            jModalCreateWebsiteContext.find(".modal-footer").removeClass('d-none');
                        }
                    }
                });

                // SelectHide.init({
                //     context: jCreateWebsitePane1,
                //     openPane: "lke-engine-db",
                // });


            });


            //----------------------------------------
            // MAIN GUI
            //----------------------------------------
            var jContext = $('#kit-lke-editor-container');
            var jLoader = $('.gui-loader', jContext);


            var ajaxMainGui = function (url, success, options) {
                if ('undefined' === typeof options) {
                    options = {};
                }
                options.before = function () {
                    jLoader.removeClass('d-none');
                };

                options.after = function () {
                    jLoader.addClass('d-none');
                };
                window.LightKitAdminEnvironment.alcpCall(url, success, options);
            };


            jModalCreateWebsite.modal('show');


            jContext.off("click.lke").on('click.lke', ".lke-action", function (e) {
                var jTarget = $(this);
                var action = jTarget.attr("data-action");
                switch (action) {
                    case 'open-add-website-dialog':
                        jModalCreateWebsite.modal('show');
                        break;
                    case 'remove-website':
                        LightKitAdminEnvironment.confirmExecute("Are you sure you want to remove this website?", function () {
                            var websiteId = jTarget.attr("data-website-id");
                            var url = getControllerUrl("removeWebsite");
                            ajaxMainGui(url, function () {}, {
                                post: {
                                    identifier: websiteId,
                                }
                            });
                        });
                        break;
                    default:
                        throw new Error("Unknown action: " + action);
                        break;
                }

                return false;
            });

        });
    });
</script>
