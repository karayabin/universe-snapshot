<?php


/**
 * @var $this ZeroAdminHeroGraphWidget
 */


use Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso\ZeroAdminHeroGraphWidget;




$container = $this->getContainer();
$reverseRouter = $container->get('reverse_router');


?>

<div class="kit-bwl-zeroadmin_herograph container-fluid <?php echo htmlspecialchars($this->getCssClass()); ?>"
    <?php echo $this->getAttributesHtml(); ?>
>

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
</div>