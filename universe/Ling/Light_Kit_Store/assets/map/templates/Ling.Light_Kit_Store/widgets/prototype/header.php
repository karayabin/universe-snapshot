<?php


/**
 * @var $this LightKitPrototypeWidgetHandler
 */


use Ling\Bat\UriTool;
use Ling\Light_Kit\WidgetHandler\LightKitPrototypeWidgetHandler;
use Ling\Light_Kit_Store\Service\LightKitStoreService;
use Ling\Light_ProjectVars\Service\LightProjectVarsService;
use Ling\Light_ReverseRouter\Service\LightReverseRouterService;
use Ling\Light_User\LightOpenUser;


$search = $this->getControllerVar("StoreSearchResultsController.search", "");


$container = $this->getContainer();

/**
 * @var $_ks LightKitStoreService
 */
$_ks = $container->get("kit_store");


/**
 * @var $_pv LightProjectVarsService
 */
$_pv = $container->get("project_vars");


/**
 * @var $_rr LightReverseRouterService
 */
$_rr = $container->get("reverse_router");


/**
 * @var $user LightOpenUser
 */
$user = $z['user'];

$userArr = $user->getProps();


$userLabel = $userArr['last_name'] ?? "";
if (true === empty($userLabel)) {
    $userLabel = $userArr['email'] ?? "";
}


$this->getCopilot()->registerLibrary("formHelpers", [
    "/libs/universe/Ling/jFormCollect/form-collect.js",
    "/libs/universe/Ling/jAlcp/alcp-helper.js",
]);


$projectName = $_pv->getVariable("project_name");
$recaptchaSiteKey = $_ks->getRecaptchaKey($projectName, true);

$this->getCopilot()->registerLibrary("recaptcha", [
    "https://www.google.com/recaptcha/api.js?render=$recaptchaSiteKey",
]);


$loginUrl = $_ks->getApiUrl("signIn");
$resetPasswordUrl = $_ks->getApiUrl("resetPassword");
$signupUrl = $_ks->getApiUrl("signUp");
$disconnectUrl = $_ks->getApiUrl("disconnect");


$urlHome = $_rr->getUrl("lks_route-home");
$urlWebsites = $_rr->getUrl("lks_route-websites");
$urlPages = $_rr->getUrl("lks_route-pages");
$urlWidgets = $_rr->getUrl("lks_route-widgets");
$urlAbout = $_rr->getUrl("lks_route-about");
$urlYourAccountHome = $_rr->getUrl("lks_route-your_account_home");
$urlSearch = $_rr->getUrl("lks_route-search");


$currentUrl = $_SERVER['REQUEST_URI'];


$matchUrlClass = function (string $url) use ($currentUrl) {
    if (true === UriTool::matchCurrentUrl($url, $currentUrl)) {
        return "text-secondary";
    }
    return "text-white";
};


?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid flex-wrap nf-container">


        <div class="nf-toggler d-lg-none">
            <button id="main-navbar-toggler" class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="nf-brand text-start order-1">
            <a class="navbar-brand" href="<?php echo htmlspecialchars($urlHome); ?>">
                Kit Store
                <!--            <img width="40" src="/libs/universe/Ling/Light_Kit_Store/img/kit-store-lightning-dark.png" alt="kitstore">-->
            </a>
        </div>


        <div class="nf-cart order-4">
            <a href="#" class="link-warning position-relative">
                <span class="position-absolute translate-middle rounded-pill badge  bg-cart-badge">
                    0
                    <span class="visually-hidden">cart items</span>
                </span>
                <i class="bi bi-cart2"></i>
            </a>
        </div>


        <form method="get" action="<?php echo htmlspecialchars($urlSearch); ?>" class="nf-search order-2">
            <div class="input-group">
                <input name="search" type="text" class="form ps-2 flex-grow-1"
                       placeholder="" aria-label="" aria-describedby="button-addon2"
                       value="<?php echo htmlspecialchars($search); ?>"
                >
                <button class="btn btn-warning" type="submit" id="button-addon2"><i class="bi bi-search"></i>
                </button>
            </div>

        </form>


        <div class="collapse navbar-collapse nf-links order-3" id="navbarSupportedContent">

            <ul class="navbar-nav nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="<?php echo htmlspecialchars($urlWebsites); ?>"
                       class="nav-link px-2 <?php echo $matchUrlClass($urlWebsites); ?>">Websites</a></li>
                <li><a href="<?php echo htmlspecialchars($urlPages); ?>"
                       class="nav-link px-2 <?php echo $matchUrlClass($urlPages); ?>">Pages</a></li>
                <li><a href="<?php echo htmlspecialchars($urlWidgets); ?>"
                       class="nav-link px-2 <?php echo $matchUrlClass($urlWidgets); ?>">Widgets</a></li>
                <li><a href="<?php echo htmlspecialchars($urlAbout); ?>"
                       class="nav-link px-2 <?php echo $matchUrlClass($urlAbout); ?>">About</a></li>
            </ul>

        </div>

    </div>


</nav>

<?php if (false): ?>
    <div class="alert alert-success p-3 px-3 mb-0 text-dark fw-bold" role="alert">
        A simple primary alert—check it out!
    </div>
<?php endif; ?>


<div class="modal fade" id="headerLoginModal" tabindex="-1" aria-labelledby="headerLoginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="headerLoginModalLabel">Login</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">


                <div class="alert alert-danger alert-dismissible fade show the-error" role="alert">
                    <span class="the-error-message">
                        <strong>Holy guacamole!</strong> You should check in on some of those fields below.
                    </span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>


                <div class="alert alert-success alert-dismissible fade show the-success" role="alert">
                    <span class="the-success-message">
                        <strong>Holy guacamole!</strong> You should check in on some of those fields below.
                    </span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

                <form>
                    <div class="form-floating mb-3">
                        <input name="email" type="email" class="form-control form-collect" id="floatingInput1"
                               placeholder="name@example.com">
                        <label for="floatingInput1">Email address</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input name="password" type="password" class="form-control form-collect" id="floatingPassword1"
                               placeholder="Password">
                        <label for="floatingPassword1">Password</label>
                    </div>
                    <div class="mb-3 form-check">
                        <input name="remember_me" type="checkbox" class="form-check-input form-collect"
                               id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Keep me signed in until I log out</label>
                    </div>
                    <div class="mb-3">

                        <a href="#" class="text-small" data-bs-dismiss="modal" data-bs-toggle="modal"
                           data-bs-target="#headerForgotPasswordModal">Forgot password?</a>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary submit-header-login-form">
                        <span class="spinner-border spinner-border-sm the-loader" role="status"
                              aria-hidden="true"></span>
                            Log in
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="headerForgotPasswordModal" tabindex="-1" aria-labelledby="forgotPasswordModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="forgotPasswordModalLabel">Reset password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">


                <div class="alert alert-danger alert-dismissible fade show the-error" role="alert">
                    <span class="the-error-message">
                        <strong>Holy guacamole!</strong> You should check in on some of those fields below.
                    </span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>


                <div class="alert alert-success alert-dismissible fade show the-success" role="alert">
                    <span class="the-success-message">
                        <strong>Holy guacamole!</strong> You should check in on some of those fields below.
                    </span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

                <form>
                    <p class="mb-3">
                        Fill the form below to reset your password.
                    </p>


                    <div class="form-floating mb-3">
                        <input name="email" type="email" class="form-control form-collect" id="floatingInput2"
                               placeholder="name@example.com">
                        <label for="floatingInput2">Email address</label>
                    </div>

                    <div class="mb-3">

                        <a type="button" class="text-small" data-bs-dismiss="modal" data-bs-toggle="modal"
                           data-bs-target="#headerLoginModal">Back to login form</a>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary submit-header-forgot-password-form">
                        <span class="spinner-border spinner-border-sm the-loader" role="status"
                              aria-hidden="true"></span>
                            Reset my password
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="headerSignupModal" tabindex="-1" aria-labelledby="signUpModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="signUpModalLabel">Sign up</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="alert alert-danger alert-dismissible fade show the-error" role="alert">
                    <span class="the-error-message">
                        <strong>Holy guacamole!</strong> You should check in on some of those fields below.
                    </span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>


                <div class="alert alert-success alert-dismissible fade show the-success" role="alert">
                    <span class="the-success-message">
                        <strong>Holy guacamole!</strong> You should check in on some of those fields below.
                    </span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>


                <form>
                    <div class="form-floating mb-3">
                        <input name="email" type="email" class="form-control form-collect" id="floatingInput3"
                               placeholder="name@example.com">
                        <label for="floatingInput3">Email address</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input name="password" type="password" class="form-control form-collect" id="floatingPassword3"
                               placeholder="Password">
                        <label for="floatingPassword3">Password</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input name="password_confirm" type="password" class="form-control form-collect"
                               id="floatingPassword2"
                               placeholder="Password">
                        <label for="floatingPassword2">Password confirm</label>
                    </div>
                    <button type="submit" class="btn btn-primary submit-header-signup-form">

                               <span class="spinner-border spinner-border-sm the-loader" role="status"
                                     aria-hidden="true"></span>

                        Sign up
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    document.addEventListener("DOMContentLoaded", function (event) {


        $(document).ready(function () {

            var jFormLogin = $("#headerLoginModal");
            var jFormForgotPassword = $("#headerForgotPasswordModal");
            var jFormSignUp = $("#headerSignupModal");


            var postLoginCb = AlcpHelper.getContextualPostCallback(jFormLogin, {
                success: function (jTheSuccessMsg, response, textStatus, jqXHR) {
                    jTheSuccessMsg.html("Successful login :)");
                    window.location.reload();
                    //window.location.href = "<?php //echo $urlYourAccountHome; ?>//";
                },
            });

            var postSignupCb = AlcpHelper.getContextualPostCallback(jFormSignUp, {
                success: function (jTheSuccessMsg, response, textStatus, jqXHR) {
                    var msg = response.message;
                    jTheSuccessMsg.html(msg);
                },
            });


            var postForgotPassword = AlcpHelper.getContextualPostCallback(jFormForgotPassword, {
                success: function (jTheSuccessMsg, response, textStatus, jqXHR) {
                    jTheSuccessMsg.html("An email to reset your password has been sent to you. Check out your mail box!");
                },
            });


            $("body").on("click.kit_store_header", function (e) {


                var jTarget = $(e.target);
                var url = null;
                var data = {};


                //----------------------------------------
                // LOG IN
                //----------------------------------------
                if (jTarget.hasClass("submit-header-login-form")) {

                    data = FormCollect.collect({
                        context: jFormLogin,
                    });
                    url = "<?php echo $loginUrl; ?>";
                    postLoginCb(url, data);
                    return false;
                }
                    //----------------------------------------
                    // LOG OUT
                //----------------------------------------
                else if (jTarget.hasClass("header-disconnect-link")) {

                    url = "<?php echo $disconnectUrl; ?>";
                    AlcpHelper.post(url, {}, {
                        success: function () {
                            window.location.href = "<?php echo $urlHome; ?>";
                        },
                    });
                    return false;
                }
                    //----------------------------------------
                    // FORGOT PASSWORD
                //----------------------------------------
                else if (jTarget.hasClass("submit-header-forgot-password-form")) {

                    data = FormCollect.collect({
                        context: jFormForgotPassword,
                    });
                    url = "<?php echo $resetPasswordUrl; ?>";
                    postForgotPassword(url, data);
                    return false;
                }
                    //----------------------------------------
                    // SIGN UP
                //----------------------------------------
                else if (jTarget.hasClass("submit-header-signup-form")) {


                    grecaptcha.ready(function () {
                        grecaptcha.execute('<?php echo $recaptchaSiteKey; ?>', {action: 'submit'}).then(function (token) {

                            data = FormCollect.collect({
                                context: jFormSignUp,
                            });
                            data['g-recaptcha-response'] = token;
                            url = "<?php echo $signupUrl; ?>";
                            postSignupCb(url, data);


                        });
                    });


                    return false;
                }
            });


        });
    });
</script>