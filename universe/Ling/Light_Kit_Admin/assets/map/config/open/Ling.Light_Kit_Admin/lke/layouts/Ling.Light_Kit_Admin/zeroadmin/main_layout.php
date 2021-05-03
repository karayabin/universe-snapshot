<?php


/**
 * @var $this LightKitPageRenderer
 */

use Ling\Bat\StringTool;
use Ling\Light_Kit\PageRenderer\LightKitPageRenderer;


$this->copilot->registerLibrary("FontAwesome", [], [
    '/libs/universe/Ling/FontAwesome/5.13/css/all.min.css',
]);


$this->copilot->registerLibrary("Jquery", [], [], [
    'override' => true,
]); // hard written in this file

$this->copilot->registerLibrary("lka_environment", [
    "/libs/universe/Ling/JBee/bee.js",
    "/libs/universe/Ling/JAcpHep/acphep-helper.js",
//            "/libs/universe/Ling/JRadioHide/radio-hide.js",
    "/libs/universe/Ling/Light_Kit_Admin/js/light-kit-admin-environment.js",
    "/libs/universe/Ling/Light_Kit_Admin/js/light-kit-admin-init.js",
    "/libs/universe/Ling/JPostForm/post-form.js",
    "/libs/universe/Ling/JimToolbox/jim-toolbox.js",
],
    [
        "/libs/universe/Ling/JimToolbox/jim-toolbox.css",
    ]);


$container = $this->getContainer();
$jsLibs = $this->copilot->getJsUrls();
$cssLibs = $this->copilot->getCssUrls();
$modals = $this->copilot->getModals()


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
          integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">


    <?php foreach ($cssLibs as $url): ?>
        <link rel="stylesheet" href="<?php echo htmlspecialchars($url); ?>">
    <?php endforeach; ?>

    <?php if (true === $this->copilot->hasCssCodeBlocks()): ?>
        <link rel="stylesheet"
              href="<?php echo $container->get('kit_css_file_generator')->generate($this->copilot, $this->pageName); ?>">
    <?php endif; ?>


    <?php if (true === $this->copilot->hasTitle()): ?>
        <title><?php echo $this->copilot->getTitle(); ?></title><?php endif; ?>

    <?php if (true === $this->copilot->hasDescription()): ?>
        <meta name="description"
              content="<?php echo htmlspecialchars($this->copilot->getDescription()); ?>"><?php endif; ?>


    <link rel="stylesheet" href="/libs/universe/Ling/Light_Kit_Admin/zeroadmin/css/style.css">
    <link rel="stylesheet" href="/libs/universe/Ling/Light_Kit_Admin/zeroadmin/css/my_colors.css">

    <?php if (true === "deprecated, remove me"): ?>
        <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
        <link rel="stylesheet" href="css/my_colors.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="libs/icomoon/style.css">
        <link rel="stylesheet" href="css/skin-light.css">
    <?php endif; ?>

</head>

<body <?php
$this->copilot->addBodyTagClass("app skin-dark");
echo StringTool::htmlAttributes($this->copilot->getBodyTagAttributes()); ?>>


<?php if ($modals): ?>
    <!-- modals -->
    <?php foreach ($modals as $modal): ?>
        <!-- another modal -->
        <?php echo $modal; ?>
    <?php endforeach; ?>
<?php endif; ?>



<?php $this->printZone("header"); ?>

<div id="lka-toasts-zone" class="toasts-zone d-flex flex-column align-items-end stacked-toasts" aria-live="polite"
     aria-atomic="true">

    <?php $this->printZone("toasts"); ?>
</div>

<div class="notifications-zone">
    <?php $this->printZone("notifications"); ?>
</div>


<?php require_once __DIR__ . "/toolbox.inc.php"; ?>

<div class="app-body">
    <?php $this->printZone("sidebar"); ?>
    <main class="main">
        <?php $this->printZone("body"); ?>
    </main>
</div>


<?php if (true === "old, remove me"): ?>
    <div class="app-body">


        <main class="main">


            <div class="container-fluid">


                <div class="row main-plot mb-3">
                    <div class="col">
                        <div class="card">
                            <div class="card-header d-flex align-items-center">

                                <h5 class="mb-0">Marketing Report</h5>
                                <span class="small text-muted ml-2">November 2018</span>


                                <div class="ml-auto d-none d-sm-block">
                                    <button class="btn btn-sm bg-blue float-right" type="button">
                                        <i class="fas fa-cloud-download-alt"></i>
                                    </button>
                                    <div class="btn-group btn-group-toggle float-right mr-3" data-toggle="buttons">
                                        <label class="btn btn-sm btn-outline-secondary">
                                            <input type="radio" name="options" id="option1" autocomplete="off">
                                            Day</label>
                                        <label class="btn btn-sm btn-outline-secondary active">
                                            <input type="radio" name="options" id="option2" autocomplete="off">
                                            Month</label>
                                        <label class="btn btn-sm btn-outline-secondary">
                                            <input type="radio" name="options" id="option3" autocomplete="off">
                                            Year</label>
                                    </div>
                                </div>

                            </div>
                            <div class="card-body p-0">
                                <div class="row">


                                </div>
                                <div id="plot-dashboard-sales"></div>
                            </div>
                            <div class="card-footer">
                                <div class="row text-center">
                                    <div class="col-md-2">
                                        <div class="text-muted">Visits</div>
                                        <strong>153779</strong>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="text-muted">Unique Visits</div>
                                        <strong>24093</strong>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="text-muted">Orders</div>
                                        <strong>5973</strong>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="text-muted">Average Pages/Visit</div>
                                        <strong>8</strong>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="text-muted">Conversion Rate</div>
                                        <strong>1.0064%</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row plots mb-3">
                    <div class="col">
                        <div class="card">
                            <div class="card-header">Sales Report</div>
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="callout callout-blue">
                                            <small class="text-muted">Male</small>
                                            <br>
                                            <strong class="h4">10123</strong>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="callout callout-red">
                                            <small class="text-muted">Female</small>
                                            <br>
                                            <strong class="h4">20123</strong>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="callout callout-yellow">
                                            <small class="text-muted">Mobile vs Desktop</small>
                                            <br>
                                            <strong class="h4">31%</strong>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="callout callout-green">
                                            <small class="text-muted">Mail Conversion Rate</small>
                                            <br>
                                            <strong class="h4">1.05%</strong>
                                        </div>
                                    </div>
                                </div>


                                <hr class="mt-0">
                                <div class="row">
                                    <div class="col-xl-4">
                                        <div id="plot-1"></div>
                                    </div>
                                    <div class="col-xl-4">
                                        <div id="plot-2"></div>
                                    </div>
                                    <div class="col-xl-4">
                                        <div id="plot-3"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row --social">
                    <div class="col-sm-6 col-lg-3 mb-3">
                        <div class="card social-card">
                            <div class="card-header bg-facebook">
                                <i class="fab fa-facebook"></i>
                                <div class="plot" id="plot-facebook-1"></div>
                            </div>
                            <div class="card-body">
                                <div>
                                    <div class="text-number">13k</div>
                                    <div class="text-uppercase text-muted small">friends</div>
                                </div>
                                <div>
                                    <div class="text-number">233</div>
                                    <div class="text-uppercase text-muted small">feeds</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3 mb-3">
                        <div class="card social-card">
                            <div class="card-header bg-twitter">
                                <i class="fab fa-twitter"></i>
                                <div class="plot" id="plot-twitter-1"></div>
                            </div>
                            <div class="card-body">
                                <div>
                                    <div class="text-number">9.8k</div>
                                    <div class="text-uppercase text-muted small">followers</div>
                                </div>
                                <div>
                                    <div class="text-number">197</div>
                                    <div class="text-uppercase text-muted small">tweets</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3 mb-3">
                        <div class="card social-card">
                            <div class="card-header bg-instagram">
                                <i class="fab fa-instagram"></i>
                                <div class="plot" id="plot-instagram-1"></div>
                            </div>
                            <div class="card-body">
                                <div>
                                    <div class="text-number">702</div>
                                    <div class="text-uppercase text-muted small">followers</div>
                                </div>
                                <div>
                                    <div class="text-number">54</div>
                                    <div class="text-uppercase text-muted small">posts</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3 mb-3">
                        <div class="card social-card">
                            <div class="card-header bg-pinterest">
                                <i class="fab fa-pinterest-p"></i>
                                <div class="plot" id="plot-pinterest-1"></div>
                            </div>
                            <div class="card-body">
                                <div>
                                    <div class="text-number">1024</div>
                                    <div class="text-uppercase text-muted small">followers</div>
                                </div>
                                <div>
                                    <div class="text-number">30</div>
                                    <div class="text-uppercase text-muted small">pins</div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row mb-3 referer">
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                Referer Traffic
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">


                                        <div class="mb-2">
                                            <div class="progress-group-header d-flex align-items-center mb-1">
                                                <i class="fas fa-globe progress-group-icon mr-2 text-sm text-success"></i>
                                                <div>Organic Search</div>
                                                <div class="ml-auto font-weight-bold mr-2">134.256</div>
                                                <div class="text-muted small">(67%)</div>
                                            </div>
                                            <div class="progress-group-bars">
                                                <div class="progress progress-xs">
                                                    <div class="progress-bar bg-success" role="progressbar"
                                                         style="width: 67%" aria-valuenow="67" aria-valuemin="0"
                                                         aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-2">
                                            <div class="progress-group-header d-flex align-items-center mb-1">
                                                <i style="color: #3b5998"
                                                   class="fab fa-facebook progress-group-icon mr-2 text-sm"></i>
                                                <div>Facebook</div>
                                                <div class="ml-auto font-weight-bold mr-2">21.540</div>
                                                <div class="text-muted small">(11%)</div>
                                            </div>
                                            <div class="progress-group-bars">
                                                <div class="progress progress-xs">
                                                    <div class="progress-bar" role="progressbar"
                                                         style="width: 11%; background-color: #3b5998;"
                                                         aria-valuenow="11"
                                                         aria-valuemin="0"
                                                         aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-2">
                                            <div class="progress-group-header d-flex align-items-center mb-1">
                                                <i style="color: #1da1f2"
                                                   class="fab fa-twitter progress-group-icon mr-2 text-sm"></i>
                                                <div>Twitter</div>
                                                <div class="ml-auto font-weight-bold mr-2">20.033</div>
                                                <div class="text-muted small">(10%)</div>
                                            </div>
                                            <div class="progress-group-bars">
                                                <div class="progress progress-xs">
                                                    <div class="progress-bar" role="progressbar"
                                                         style="width: 10%; background-color: #1da1f2"
                                                         aria-valuenow="10"
                                                         aria-valuemin="0"
                                                         aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-2">
                                            <div class="progress-group-header d-flex align-items-center mb-1">
                                                <i style="color: #fbad50"
                                                   class="fab fa-instagram progress-group-icon mr-2 text-sm"></i>
                                                <div>Instagram</div>
                                                <div class="ml-auto font-weight-bold mr-2">14.007</div>
                                                <div class="text-muted small">(7%)</div>
                                            </div>
                                            <div class="progress-group-bars">
                                                <div class="progress progress-xs">
                                                    <div class="progress-bar " role="progressbar"
                                                         style="width: 7%; background-color: #fbad50" aria-valuenow="7"
                                                         aria-valuemin="0"
                                                         aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-2">
                                            <div class="progress-group-header d-flex align-items-center mb-1">
                                                <i style="color: #c8232c"
                                                   class="fab fa-pinterest progress-group-icon mr-2 text-sm"></i>
                                                <div>Pinterest</div>
                                                <div class="ml-auto font-weight-bold mr-2">9.879</div>
                                                <div class="text-muted small">(5%)</div>
                                            </div>
                                            <div class="progress-group-bars">
                                                <div class="progress progress-xs">
                                                    <div class="progress-bar" role="progressbar"
                                                         style="width: 5%; background-color: #c8232c" aria-valuenow="5"
                                                         aria-valuemin="0"
                                                         aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="col-sm-6">


                                        <h6>Organic Search Details</h6>
                                        <div class="table-responsive mb-2">
                                            <table class="table table-hover table-striped table-sm">
                                                <thead>
                                                <tr>
                                                    <th>Url</th>
                                                    <th>Count</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>https://google.com</td>
                                                    <td>87.633</td>
                                                </tr>
                                                <tr>
                                                    <td>https://shogun-samurai.com/ad-campaign-4</td>
                                                    <td>6.904</td>
                                                </tr>
                                                <tr>
                                                    <td>https://karaoke-junior.eve/page3.php?atout-coeur</td>
                                                    <td>3.612</td>
                                                </tr>
                                                <tr>
                                                    <td>https://www.la-mere-doku.tv?serious=ly&t=78065</td>
                                                    <td>2.049</td>
                                                </tr>
                                                <tr>
                                                    <td>https://www.chimpanze-strikes-back.edu/elongation.html</td>
                                                    <td>442</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <ul class="pagination">
                                            <li class="page-item">
                                                <a class="page-link" href="/?p=dashboard">Prev</a>
                                            </li>
                                            <li class="page-item active">
                                                <a class="page-link" href="/?p=dashboard">1</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="/?p=dashboard">2</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="/?p=dashboard">3</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="/?p=dashboard">4</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="/?p=dashboard">Next</a>
                                            </li>
                                        </ul>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

            <script src="js/dashboard.js"></script>
        </main>
    </div>
    <footer class="app-footer">
        <div>
            <a href="/?p=dashboard">ZeroAdmin</a>
            <span>© 2019 Komin></span>
        </div>
        <div class="ml-auto">
            <a href="/?p=dashboard"><span>1.0.0</span></a>
        </div>
    </footer>


    <div class="aside-toolbox" id="aside-toolbox">
        <div id="aside-toolbox-toggler" class="spin-icon">
            <i class="fa fa-cog fa-spin"></i>
        </div>
        <div class="panel">
            <div class="title p-2 bg-dark text-white">
                <h6 class="p-0 m-0">Tool box</h6>
            </div>
            <div class="p-4">
                <div class="form-group">
                    <label for="skin-default">Skin</label>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="zero_change_theme_color"
                               id="zeroadmin-skin-default"
                               value="default" checked>
                        <label class="form-check-label" for="zeroadmin-skin-default">
                            Default Skin
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="zero_change_theme_color"
                               id="zeroadmin-skin-light"
                               value="light">
                        <label class="form-check-label" for="zeroadmin-skin-light">
                            Light skin
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php endif; ?>


<!--<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"-->
<!--        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"-->
<!--        crossorigin="anonymous"></script>-->

<script src="/libs/universe/Ling/Jquery/3.5.1/jquery.min.js"></script>


<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous"></script>


<?php foreach ($jsLibs as $url): ?>
    <script src="<?php echo htmlspecialchars($url); ?>"></script>
<?php endforeach; ?>


<!--<script src="/libs/universe/Ling/Light_Kit_Admin/zeroadmin/js/bottom.js"></script>-->


<?php if (true === $this->copilot->hasJsCodeBlocks()): ?>
    <script>

        <?php $blocks = $this->copilot->getJsCodeBlocks(); ?>
        <?php foreach($blocks as $block): ?>
        <?php echo $block; ?>
        <?php endforeach; ?>

    </script>

<?php endif; ?>


<script>
    document.addEventListener("DOMContentLoaded", function (event) {

        $(document).ready(function () {
            $(".toast").toast("show");
        });
    });
</script>

</body>

</html>
