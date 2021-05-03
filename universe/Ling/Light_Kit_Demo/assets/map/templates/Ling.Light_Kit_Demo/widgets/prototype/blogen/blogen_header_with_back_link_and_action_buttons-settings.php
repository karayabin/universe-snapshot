<?php


$baseUrl = explode("?", $_SERVER['REQUEST_URI'])[0];
$get = $_GET;
unset($get['page']);


$link = function ($page) use ($get, $baseUrl) {
    return $baseUrl . "?" . http_build_query(array_merge($get, [
            "page" => $page,
        ]));
};


?>

<!-- ACTIONS -->
<section id="actions" class="py-4 mb-4 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <a href="<?php echo $link('dashboard'); ?>" class="btn btn-light btn-block">
                    <i class="fas fa-arrow-left"></i> Back To Dashboard
                </a>
            </div>
            <div class="col-md-3">
                <a href="<?php echo $link('dashboard'); ?>" class="btn btn-success btn-block">
                    <i class="fas fa-check"></i> Save Changes
                </a>
            </div>
        </div>
    </div>
</section>