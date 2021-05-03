<?php


//$imgBase = "https://lingtalfi.com/img/unsplash";
$imgBase = "https://zeroadmin.ovh/img/nature";
$files = [
    [
        'stats-emerald-2019.doc',
        'fas fa-file',
    ],
    [
        'nevada_sunset.jpg',
        'img/nature/62.jpg',
    ],
    [
        'tv-allocution-sheyrdan.wav',
        'fas fa-music',
    ],
    [
        'bw-Beledny.jpg',
        'img/nature/61.jpg',
    ],
    [
        'Morris-interview-bahamas-2019.mp4',
        'fas fa-film',
    ],
    [
        'doris_summer_2019.jpg',
        'img/nature/64.jpg',
    ],
    [
        'swingatthelake.jpg',
        'img/nature/71.jpg',
    ],
    [
        'annual report 2019.xls',
        'fas fa-chart-line',
    ],
    [
        'coffee-table.jpg',
        $imgBase . '/42.jpg',
    ],
    [
        'cloud-fireform.jpg',
        $imgBase . '/53.jpg',
    ],
    [
        'sanfranciso bridge.jpg',
        $imgBase . '/84.jpg',
    ],
    [
        'lonely trees.jpg',
        $imgBase . '/95.jpg',
    ],
    [
        'green miniature arkansas.jpg',
        $imgBase . '/127.jpg',
    ],
    [
        'stats-komin-2019.xls',
        'fas fa-file',
    ],
    [
        'see-test-canonm5.jpg',
        $imgBase . '/147.jpg',
    ],
    [
        'water-noise-ploc.wav',
        'fas fa-music',
    ],
    [
        'venicia-bike.jpg',
        $imgBase . '/212.jpg',
    ],
    [
        'mountain-trip-october-2019.jpg',
        $imgBase . '/256.jpg',
    ],
    [
        'boss-angry-june-2019.wav',
        'fas fa-music',
    ],
    [
        'CANONDCE_IM_640984512.jpg',
        $imgBase . '/288.jpg',
    ],
    [
        'sunset halo.jpg',
        $imgBase . '/320.jpg',
    ],
    [
        'sound-track-nat.wav',
        'fas fa-music',
    ],
    [
        'elixir.doc',
        'fas fa-file',
    ],
    [
        'ruby-findings-2019.doc',
        'fas fa-file',
    ],
    [
        'Carlsen-Lagrave-norway.mp4',
        'fas fa-film',
    ],
];


function page_link(string $x): string
{
    return $x;
}


?>
<div class="container-fluid widget-usermanag-filemanager">
    <div class="row">
        <div class="col-lg-3">
            <div class="card ">
                <div class="card-body">
                    <div class="file-manager">
                        <h6>Show:</h6>
                        <div class="filter-links" id="my-tags">
                            <a data-tag="all" href="<?php echo htmlspecialchars(page_link('pages/u-filemanager')); ?>">All</a>
                            <a data-tag="doc" href="<?php echo htmlspecialchars(page_link('pages/u-filemanager')); ?>">Documents</a>
                            <a data-tag="wav" href="<?php echo htmlspecialchars(page_link('pages/u-filemanager')); ?>">Audio</a>
                            <a data-tag="jpg" href="<?php echo htmlspecialchars(page_link('pages/u-filemanager')); ?>">Images</a>
                            <a data-tag="mp4" href="<?php echo htmlspecialchars(page_link('pages/u-filemanager')); ?>">Videos</a>
                        </div>

                        <hr>

                        <button class="btn btn-primary btn-block mb-4">Upload Files</button>
                        <div class="hr-line-dashed"></div>
                        <h6>Folders</h6>
                        <ul class="folder-list list-unstyled">
                            <li><a href="<?php echo htmlspecialchars(page_link('pages/u-filemanager')); ?>"><i
                                            class="fa fa-folder"></i> Files</a></li>
                            <li><a href="<?php echo htmlspecialchars(page_link('pages/u-filemanager')); ?>"><i
                                            class="fa fa-folder"></i> Pictures</a></li>
                            <li><a href="<?php echo htmlspecialchars(page_link('pages/u-filemanager')); ?>"><i
                                            class="fa fa-folder"></i> Web pages</a></li>
                            <li><a href="<?php echo htmlspecialchars(page_link('pages/u-filemanager')); ?>"><i
                                            class="fa fa-folder"></i> Illustrations</a></li>
                            <li><a href="<?php echo htmlspecialchars(page_link('pages/u-filemanager')); ?>"><i
                                            class="fa fa-folder"></i> Films</a></li>
                            <li><a href="<?php echo htmlspecialchars(page_link('pages/u-filemanager')); ?>"><i
                                            class="fa fa-folder"></i> Books</a></li>
                        </ul>
                        <h6>Tags</h6>
                        <ul class="tag-list list-unstyled d-flex flex-wrap">
                            <li><a href="<?php echo htmlspecialchars(page_link('pages/u-filemanager')); ?>">Family</a>
                            </li>
                            <li><a href="<?php echo htmlspecialchars(page_link('pages/u-filemanager')); ?>">Work</a>
                            </li>
                            <li><a href="<?php echo htmlspecialchars(page_link('pages/u-filemanager')); ?>">Home</a>
                            </li>
                            <li><a href="<?php echo htmlspecialchars(page_link('pages/u-filemanager')); ?>">Children</a>
                            </li>
                            <li><a href="<?php echo htmlspecialchars(page_link('pages/u-filemanager')); ?>">Holidays</a>
                            </li>
                            <li><a href="<?php echo htmlspecialchars(page_link('pages/u-filemanager')); ?>">Music</a>
                            </li>
                            <li>
                                <a href="<?php echo htmlspecialchars(page_link('pages/u-filemanager')); ?>">Photography</a>
                            </li>
                            <li><a href="<?php echo htmlspecialchars(page_link('pages/u-filemanager')); ?>">Film</a>
                            </li>
                        </ul>
                        <h6>Disk Usage</h6>
                        <div class="d-flex mb-1 small">
                            <div>58Mb/200Mb:</div>
                            <div class="ml-auto">29%</div>
                        </div>
                        <div class="progress progress-xs">
                            <div style="width: 29%;" class="progress-bar bg-success"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-9 files-list">


            <div class="row" id="my-files">

                <?php foreach ($files as $info):
                    list($name, $file) = $info;

                    $date = date("M d, Y", time() + rand(0, 86400 * 50));
                    $p = explode('.', $name);
                    $ext = array_pop($p);
                    $isImage = ('jpg' === $ext);
                    $cardTopClass = $isImage ? '' : 'with-icon';
                    $size = round(rand(100, 10000) / 1000, 2);
                    $cat = $ext;
                    if ('xls' === $cat) {
                        $cat = 'doc';
                    }


                    ?>
                    <div class="col-sm-6 col-md-4 col-xl-3" data-category="<?php echo $cat; ?>">
                        <div class="card">
                            <div class="<?php echo $cardTopClass; ?> card-img-top d-flex justify-content-center align-items-center">

                                <?php if ($isImage): ?>
                                    <a href="<?php echo htmlspecialchars($file); ?>" data-toggle="lightbox"
                                       data-gallery="one">
                                        <img src="<?php echo htmlspecialchars($file); ?>" alt="" class="img-fluid">
                                    </a>
                                <?php else: ?>
                                    <i class="<?php echo $file; ?> file-icon fa-6x"></i>
                                <?php endif; ?>


                                <div class="dropleft">
                                    <button class="btn btn-white btn-xs dropdown-toggle" type="button"
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false"></button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item"
                                           href="<?php echo htmlspecialchars(page_link('pages/u-filemanager')); ?>">Remove</a>
                                        <a class="dropdown-item"
                                           href="<?php echo htmlspecialchars(page_link('pages/u-filemanager')); ?>">Another
                                            action</a>
                                    </div>
                                </div>

                            </div>
                            <div class="card-footer">
                                <div class="file-name">
                                    <a href="<?php echo htmlspecialchars(page_link('pages/u-filemanager')); ?>"
                                       class="text-primary">
                                        <?php echo $name; ?>
                                    </a>
                                    <br>
                                    <div class="d-flex">
                                        <small>Added: Jun 21, 2019</small>
                                        <small class="filesize ml-auto font-weight-bold"><?php echo $size; ?>Mb</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>


<script src="js/pages/u-filemanager.js"></script>