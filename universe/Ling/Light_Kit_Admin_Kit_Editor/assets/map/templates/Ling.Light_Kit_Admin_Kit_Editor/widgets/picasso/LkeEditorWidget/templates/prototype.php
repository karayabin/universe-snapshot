<?php


/**
 * @var $this LkeEditorWidget
 */


use Ling\Light_Kit_Admin_Kit_Editor\Widget\Picasso\LkeEditorWidget;


$title = $z['title'] ?? "Website Editor";
$container = $this->getContainer();


?>

<style type="text/css">
    #kit-lke-editor-container .list-group-item-disabled {
        background-color: #ececec;
        color: #a2a2a2;
    }
</style>

<div id="kit-lke-editor-container"
     class="kit-lke_editor container-fluid <?php echo htmlspecialchars($this->getCssClass()); ?>"
    <?php echo $this->getAttributesHtml(); ?>
>


    <div class="row">
        <div class="col m-auto">
            <div class="card">
                <div class="card-header">
                    <h5><?php echo $title; ?></h5>
                </div>
                <div class="card-body">


                    <div>
                        <select>
                            <option>website 1</option>
                            <option>website 2</option>
                        </select>
                        <a href="#"><i class="fas fa-plus-circle text-primary"></i></a>
                        <a href="#"><i class="fas fa-trash-alt text-primary"></i></a>


                        <div class="d-none spinner-border spinner-border-sm" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>

                    <hr>

                    <div class="container-fluid">
                        <div class="row">

                            <div class="col">
                                <h6 class="d-flex">
                                    <span>Pages</span>
                                    <a href="#" class="ml-auto"><i class="fas fa-plus-circle text-primary"></i></a>
                                </h6>

                                <div class="list-group">
                                    <button type="button"
                                            class="d-flex list-group-item p-1 list-group-item-action active"
                                            aria-current="true">
                                        <span>The current button</span>
                                        <a href="#" class="ml-auto"><i class="fas fa-edit text-white"></i></a>
                                        <a href="#" class="ml-2"><i class="fas fa-trash-alt text-white"></i></a>
                                    </button>
                                    <button type="button" class="d-flex list-group-item p-1 list-group-item-action">
                                        <span>A second item</span>
                                        <a href="#" class="ml-auto"><i class="fas fa-edit text-primary"></i></a>
                                        <a href="#" class="ml-2"><i class="fas fa-trash-alt text-primary"></i></a>
                                    </button>
                                    <button type="button"
                                            class="d-flex list-group-item list-group-item-disabled list-group-item-secondary p-1 list-group-item-action">
                                        <span>Disabled page</span>
                                        <a href="#" class="ml-auto"><i class="fas fa-edit text-primary"></i></a>
                                        <a href="#" class="ml-2"><i class="fas fa-trash-alt text-primary"></i></a>
                                    </button>
                                    <button type="button" class="d-flex list-group-item p-1 list-group-item-action">
                                        <span>A fourth item</span>
                                        <a href="#" class="ml-auto"><i class="fas fa-edit text-primary"></i></a>
                                        <a href="#" class="ml-2"><i class="fas fa-trash-alt text-primary"></i></a>
                                    </button>
                                </div>


                            </div>
                            <div class="col">
                                <h6 class="d-flex">
                                    <span>Positions</span>
                                </h6>


                                <?php for ($j = 1;
                                           $j <= 3;
                                           $j++): ?>
                                    <ul class="list-group mb-2">
                                        <li class="d-flex-column list-group-item p-1 list-group-item-info"
                                            aria-current="true">
                                            <div class="d-flex">
                                                <span class="text-bold"><b>Header</b></span>
                                                <a href="#" class="ml-auto"><i
                                                            class="fas fa-plus-circle text-primary"></i></a>
                                                <span class="ml-2">
                                                    <a data-toggle="collapse"
                                                       href="#lke-bowc<?php echo $j; ?>"
                                                    ><i
                                                                class="fas fa-list-ul text-primary"></i></a></span>
                                            </div>


                                            <div class="collapse" id="lke-bowc<?php echo $j; ?>">
                                                <hr>


                                                <div
                                                        class="block-or-widget-container d-flex flex-column flex-grow-1">

                                                    <?php for ($i = 1;
                                                               $i <= 3;
                                                               $i++): ?>


                                                        <ul class="list-group mb-2">
                                                            <li class="d-flex list-group-item p-1 active"
                                                                aria-current="true">
                                                                <span>Block <?php echo $i; ?></span>
                                                                <span class="ml-auto">
                                            <a href="#"><i class="fas fa-plus-circle text-white"></i></a>
                                            <a href="#"><i class="fas fa-edit text-white"></i></a>
                                            <a data-toggle="collapse" href="#lke-wc<?php echo $i; ?>"><i
                                                        class="fas fa-list-ul text-white"></i></a>
                                            <a href="#"><i class="fas fa-arrow-up text-white"></i></a>
                                            <a href="#"><i class="fas fa-arrow-down text-white"></i></a>
                                            <a href="#"><i class="fas fa-trash-alt text-white"></i></a>
                                        </span>
                                                            </li>
                                                            <li class="list-group-item collapse"
                                                                id="lke-wc<?php echo $i; ?>">
                                                                <ul class="list-group">
                                                                    <li class="d-flex list-group-item p-1 active"
                                                                        aria-current="true">
                                                                        <span>Widget 1</span>
                                                                        <span class="ml-auto">
                                                    <a href="#"><i class="fas fa-edit text-white"></i></a>
                                                    <a href="#"><i class="fas fa-arrow-up text-white"></i></a>
                                                    <a href="#"><i class="fas fa-arrow-down text-white"></i></a>
                                                    <a href="#"><i class="fas fa-trash-alt text-white"></i></a>
                                                </span>
                                                                    </li>
                                                                    <li class="list-group-item p-1 d-flex">
                                                                        <span>Widget 2</span>
                                                                        <span class="ml-auto">
                                                    <a href="#"><i class="fas fa-edit text-primary"></i></a>
                                                    <a href="#"><i class="fas fa-arrow-up text-primary"></i></a>
                                                    <a href="#"><i class="fas fa-arrow-down text-primary"></i></a>
                                                    <a href="#"><i class="fas fa-trash-alt text-primary"></i></a>
                                                </span>
                                                                    </li>
                                                                    <li class="list-group-item list-group-item-disabled p-1 d-flex">
                                                                        <span>Widget 3 disabled</span>
                                                                        <span class="ml-auto">
                                                    <a href="#"><i class="fas fa-edit text-primary"></i></a>
                                                    <a href="#"><i class="fas fa-arrow-up text-primary"></i></a>
                                                    <a href="#"><i class="fas fa-arrow-down text-primary"></i></a>
                                                    <a href="#"><i class="fas fa-trash-alt text-primary"></i></a>
                                                </span>
                                                                    </li>
                                                                </ul>

                                                            </li>
                                                        </ul>
                                                    <?php endfor; ?>
                                                    <ul class="list-group mb-2">
                                                        <li class="list-group-item p-1 d-flex">
                                                            <span>Widget 2</span>
                                                            <span class="ml-auto">
                                                    <a href="#"><i class="fas fa-edit text-primary"></i></a>
                                                    <a href="#"><i class="fas fa-arrow-up text-primary"></i></a>
                                                    <a href="#"><i class="fas fa-arrow-down text-primary"></i></a>
                                                    <a href="#"><i class="fas fa-trash-alt text-primary"></i></a>
                                                </span>
                                                        </li>
                                                    </ul>

                                                </div>
                                            </div>
                                    </ul>
                                <?php endfor; ?>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>