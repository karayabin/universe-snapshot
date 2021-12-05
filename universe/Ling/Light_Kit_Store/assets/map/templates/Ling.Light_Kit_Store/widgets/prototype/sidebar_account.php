<?php


/**
 * @var $this LightKitPrototypeWidgetHandler
 */


use Ling\Bat\UriTool;
use Ling\Light_Kit\WidgetHandler\LightKitPrototypeWidgetHandler;
use Ling\Light_ReverseRouter\Service\LightReverseRouterService;

$container = $this->getContainer();


/**
 * @var $_rr LightReverseRouterService
 */
$_rr = $container->get("reverse_router");
$urlHome = $_rr->getUrl("lks_route-your_account_home");
$urlChangePassword = $_rr->getUrl("lks_route-your_account_change_password");
$urlBillingInfo = $_rr->getUrl("lks_route-your_account_billing_info");
$urlDownloads = $_rr->getUrl("lks_route-your_account_downloads");
$urlRatings = $_rr->getUrl("lks_route-your_account_ratings");


$currentUrl = $_SERVER['REQUEST_URI'];


$matchUrlClass = function (string $url) use ($currentUrl) {
    if (true === UriTool::matchCurrentUrl($url, $currentUrl)) {
        return "active";
    }
    return "link-dark";
};


?>


<style>
    #sidebar_account .bi {
        vertical-align: baseline;
    }
</style>


<div id="sidebar_account" class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px; min-height: 100vh">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
        <span class="fs-4">Your Account</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="<?php echo htmlspecialchars($urlHome); ?>" class="nav-link <?php echo $matchUrlClass($urlHome); ?>"
               aria-current="page">
                <i class="bi bi-house-door"></i>
                Home
            </a>
        </li>
        <li>
            <a href="<?php echo htmlspecialchars($urlChangePassword); ?>"
               class="nav-link <?php echo $matchUrlClass($urlChangePassword); ?>">
                <i class="bi bi-key"></i>
                Change Password
            </a>
        </li>
        <li>
            <a href="<?php echo htmlspecialchars($urlBillingInfo); ?>"
               class="nav-link <?php echo $matchUrlClass($urlBillingInfo); ?>">
                <i class="bi bi-info-circle"></i>
                Billing info
            </a>
        </li>
        <li>
            <a href="<?php echo htmlspecialchars($urlDownloads); ?>"
               class="nav-link <?php echo $matchUrlClass($urlDownloads); ?>">
                <i class="bi bi-cloud-download"></i>
                Downloads
            </a>
        </li>
        <li>
            <a href="<?php echo htmlspecialchars($urlRatings); ?>"
               class="nav-link <?php echo $matchUrlClass($urlRatings); ?>">
                <i class="bi bi-stars"></i>
                <!--                <i class="bi bi-hand-thumbs-up"></i>-->
                Ratings
            </a>
        </li>
    </ul>
</div>


