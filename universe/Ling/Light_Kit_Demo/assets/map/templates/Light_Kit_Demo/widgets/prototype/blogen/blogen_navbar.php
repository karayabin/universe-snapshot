<?php


$baseUrl = explode("?", $_SERVER['REQUEST_URI'])[0];
$get = $_GET;
unset($get['page']);


$link = function ($page) use ($get, $baseUrl) {
    return $baseUrl . "?" . http_build_query(array_merge($get, [
            "page" => $page,
        ]));
};


$page = $_GET['page'] ?? "dashboard";


?>
<nav class="navbar navbar-expand-sm navbar-dark bg-dark p-0">
    <div class="container">
        <a href="<?php echo $link('dashboard'); ?>" class="navbar-brand">Blogen</a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav">
                <li class="nav-item px-2">
                    <a href="<?php echo $link('dashboard'); ?>" class="nav-link <?php echo ("dashboard" === $page) ? "active" : ""; ?>">Dashboard</a>
                </li>
                <li class="nav-item px-2">
                    <a href="<?php echo $link('posts'); ?>" class="nav-link <?php echo ("posts" === $page) ? "active" : ""; ?>">Posts</a>
                </li>
                <li class="nav-item px-2">
                    <a href="<?php echo $link('categories'); ?>" class="nav-link <?php echo ("categories" === $page) ? "active" : ""; ?>">Categories</a>
                </li>
                <li class="nav-item px-2">
                    <a href="<?php echo $link('users'); ?>" class="nav-link <?php echo ("users" === $page) ? "active" : ""; ?>">Users</a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown mr-3">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        <i class="fas fa-user"></i> Welcome Brad
                    </a>
                    <div class="dropdown-menu">
                        <a href="<?php echo $link('profile'); ?>" class="dropdown-item">
                            <i class="fas fa-user-circle"></i> Profile
                        </a>
                        <a href="<?php echo $link('settings'); ?>" class="dropdown-item">
                            <i class="fas fa-cog"></i> Settings
                        </a>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="<?php echo $link('login'); ?>" class="nav-link">
                        <i class="fas fa-user-times"></i> Logout
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>