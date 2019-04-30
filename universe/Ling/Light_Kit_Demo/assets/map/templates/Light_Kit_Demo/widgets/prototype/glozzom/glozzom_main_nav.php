<?php


$baseUrl = explode("?", $_SERVER['REQUEST_URI'])[0];
$get = $_GET;
unset($get['page']);


$link = function ($page) use ($get, $baseUrl) {
    return $baseUrl . "?" . http_build_query(array_merge($get, [
            "page" => $page,
        ]));
};

$page = $_GET['page'] ?? "home";


?>
<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <div class="container">
        <a href="<?php echo $link('home'); ?>" class="navbar-brand">Glozzom</a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item <?php echo ("home" === $page) ? "active" : ""; ?>">
                    <a href="<?php echo $link('home'); ?>" class="nav-link">Home</a>
                </li>
                <li class="nav-item <?php echo ("about" === $page) ? "active" : ""; ?>">
                    <a href="<?php echo $link('about'); ?>" class="nav-link">About</a>
                </li>
                <li class="nav-item <?php echo ("services" === $page) ? "active" : ""; ?>">
                    <a href="<?php echo $link('services'); ?>" class="nav-link">Services</a>
                </li>
                <li class="nav-item <?php echo ("blog" === $page) ? "active" : ""; ?>">
                    <a href="<?php echo $link('blog'); ?>" class="nav-link">Blog</a>
                </li>
                <li class="nav-item <?php echo ("contact" === $page) ? "active" : ""; ?>">
                    <a href="<?php echo $link('contact'); ?>" class="nav-link">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
