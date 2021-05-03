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
 <div class="card text-center bg-primary text-white mb-3">
        <div class="card-body">
            <h3>Posts</h3>
            <h4 class="display-4">
                <i class="fas fa-pencil-alt"></i> 6
            </h4>
            <a href="<?php echo $link('posts'); ?>" class="btn btn-outline-light btn-sm">View</a>
        </div>
    </div>

    <div class="card text-center bg-success text-white mb-3">
        <div class="card-body">
            <h3>Categories</h3>
            <h4 class="display-4">
                <i class="fas fa-folder"></i> 4
            </h4>
            <a href="<?php echo $link('categories'); ?>" class="btn btn-outline-light btn-sm">View</a>
        </div>
    </div>

    <div class="card text-center bg-warning text-white mb-3">
        <div class="card-body">
            <h3>Users</h3>
            <h4 class="display-4">
                <i class="fas fa-users"></i> 4
            </h4>
            <a href="<?php echo $link('users'); ?>" class="btn btn-outline-light btn-sm">View</a>
        </div>
    </div>