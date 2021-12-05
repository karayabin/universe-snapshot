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
<header class="p-3 bg-dark text-white">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">


            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="<?php echo htmlspecialchars($urlHome); ?>"
                       class="nav-link px-2 <?php echo $matchUrlClass($urlHome); ?>">Home</a></li>
                <li><a href="<?php echo htmlspecialchars($urlWebsites); ?>"
                       class="nav-link px-2 <?php echo $matchUrlClass($urlWebsites); ?>">Websites</a></li>
                <li><a href="<?php echo htmlspecialchars($urlPages); ?>"
                       class="nav-link px-2 <?php echo $matchUrlClass($urlPages); ?>">Pages</a></li>
                <li><a href="<?php echo htmlspecialchars($urlWidgets); ?>"
                       class="nav-link px-2 <?php echo $matchUrlClass($urlWidgets); ?>">Widgets</a></li>
                <li><a href="<?php echo htmlspecialchars($urlAbout); ?>"
                       class="nav-link px-2 <?php echo $matchUrlClass($urlAbout); ?>">About</a></li>
            </ul>


            <form method="get" action="<?php echo htmlspecialchars($urlSearch); ?>" class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3 d-flex">
                <div class="input-group">
                    <input name="search" type="text" class="form ps-2"
                           placeholder="" aria-label="" aria-describedby="button-addon2"
                           value="<?php echo htmlspecialchars($search); ?>"
                    >
                    <button class="btn btn-warning" type="submit" id="button-addon2"><i class="bi bi-search"></i>
                    </button>
                </div>

            </form>


            <div class="text-end">


                <?php if (true === $user->isValid()): ?>
                    <div class="dropdown text-end">
                        <button class="btn btn-light dropdown-toggle text-small" type="button" id="dropdownMenuButton1"
                                data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo $userLabel; ?> - your account
                        </button>
                        <ul class="dropdown-menu text-small" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="<?php echo htmlspecialchars($urlYourAccountHome); ?>">My
                                    account</a></li>
                            <li><a class="dropdown-item header-disconnect-link" href="#">Log out</a></li>
                        </ul>
                    </div>
                <?php else: ?>
                    <button type="button" class="btn btn-outline-light me-2" data-bs-toggle="modal"
                            data-bs-target="#headerLoginModal">Login
                    </button>
                    <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                            data-bs-target="#headerSignupModal">
                        Sign-up
                    </button>
                <?php endif; ?>

            </div>
        </div>
    </div>
</header>


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
                        <input name="email" type="email" class="form-control form-collect" id="floatingInput"
                               placeholder="name@example.com">
                        <label for="floatingInput">Email address</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input name="password" type="password" class="form-control form-collect" id="floatingPassword"
                               placeholder="Password">
                        <label for="floatingPassword">Password</label>
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
                        <input name="email" type="email" class="form-control form-collect" id="floatingInput"
                               placeholder="name@example.com">
                        <label for="floatingInput">Email address</label>
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
                        <input name="email" type="email" class="form-control form-collect" id="floatingInput"
                               placeholder="name@example.com">
                        <label for="floatingInput">Email address</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input name="password" type="password" class="form-control form-collect" id="floatingPassword"
                               placeholder="Password">
                        <label for="floatingPassword">Password</label>
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