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
<div class="card">
    <div class="card-header">
        <h4>Latest Posts</h4>
    </div>
    <table class="table table-striped">
        <thead class="thead-dark">
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Category</th>
            <th>Date</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>1</td>
            <td>Post One</td>
            <td>Web Development</td>
            <td>May 10 2018</td>
            <td>
                <a href="<?php echo $link('details'); ?>" class="btn btn-secondary">
                    <i class="fas fa-angle-double-right"></i> Details
                </a>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>Post Two</td>
            <td>Tech Gadgets</td>
            <td>May 11 2018</td>
            <td>
                <a href="<?php echo $link('details'); ?>" class="btn btn-secondary">
                    <i class="fas fa-angle-double-right"></i> Details
                </a>
            </td>
        </tr>
        <tr>
            <td>3</td>
            <td>Post Three</td>
            <td>Web Development</td>
            <td>May 13 2018</td>
            <td>
                <a href="<?php echo $link('details'); ?>" class="btn btn-secondary">
                    <i class="fas fa-angle-double-right"></i> Details
                </a>
            </td>
        </tr>
        <tr>
            <td>4</td>
            <td>Post Four</td>
            <td>Business</td>
            <td>May 15 2018</td>
            <td>
                <a href="<?php echo $link('details'); ?>" class="btn btn-secondary">
                    <i class="fas fa-angle-double-right"></i> Details
                </a>
            </td>
        </tr>
        <tr>
            <td>5</td>
            <td>Post Five</td>
            <td>Web Development</td>
            <td>May 17 2018</td>
            <td>
                <a href="<?php echo $link('details'); ?>" class="btn btn-secondary">
                    <i class="fas fa-angle-double-right"></i> Details
                </a>
            </td>
        </tr>
        <tr>
            <td>6</td>
            <td>Post Six</td>
            <td>Health & Wellness</td>
            <td>May 20 2018</td>
            <td>
                <a href="<?php echo $link('details'); ?>" class="btn btn-secondary">
                    <i class="fas fa-angle-double-right"></i> Details
                </a>
            </td>
        </tr>
        </tbody>
    </table>
</div>