<?php


/**
 * @var $this HasDualPaneWidget
 */




use Ling\Bat\StringTool;
use Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso\HasDualPaneWidget;


//
$this->useAcpHep();


$container = $this->kitPageRenderer->getContainer();
$identifier = $z['identifier'];
$ajaxHandlerId = $z['ajax_handler_id'];
$ajaxHandlerUrl = $z['ajax_handler_url'];
$crudDeleteContextIdentifier = $z['crud_delete_context_identifier'];
$title = $z['title'] ?? '';
$csrfToken = $z['csrf_token'] ?? '';


//
$pane1 = $z['pane1'];
$pane1Table = $pane1['table'];
$pane1Title = $pane1['title'] ?? '';
$pane1UseSearch = $pane1['use_search'] ?? true;
$pane1Info = $pane1['info'];
$pane1FormInfo = $pane1['formInfo'];
$pane1FormInsertUrl = $pane1FormInfo['url_insert'];
$pane1FormUpdateUrl = $pane1FormInfo['url_update'];
$pane1NbPages = $pane1Info['nb_pages'] ?? 1;
$pane1Page = $pane1Info['page'] ?? 1;
$pane1Rows = $pane1Info['rows'] ?? [];

$pane2 = $z['pane2'];
$pane2Table = $pane2['table'];
$pane2Title = $pane2['title'] ?? '';
$pane2UseSearch = $pane2['use_search'] ?? true;
$pane2Info = $pane2['info'];
$pane2FormInfo = $pane2['formInfo'];
$pane2FormInsertUrl = $pane2FormInfo['url_insert'];
$pane2FormUpdateUrl = $pane2FormInfo['url_update'];
$pane2NbPages = $pane2Info['nb_pages'] ?? 1;
$pane2Page = $pane2Info['page'] ?? 1;
$pane2Rows = $pane2Info['rows'] ?? [];


$text = $z['text'] ?? [];
$textReset = $text['reset'] ?? 'Reset';
$textEdit = $text['edit'] ?? 'Edit';
$textNew = $text['new'] ?? 'New';
$textAddChildren = $text['add_children'] ?? 'Add children';
$textRemove = $text['remove'] ?? 'Remove';
$textConfirmDeleteRows = $text['confirm_delete_rows'] ?? 'Are you sure you want to delete the selected row(s)?';

$cssId = StringTool::getUniqueCssId('has-dual-pane-');
$cssIdModal = StringTool::getUniqueCssId('has-dual-pane-modal-');;
$cssIdModal2 = StringTool::getUniqueCssId('has-dual-pane-modal2-');;


?>


<?php
ob_start();
?>
<div class="modal fade" id="<?php echo htmlspecialchars($cssIdModal); ?>" tabindex="-1" role="dialog"
     aria-labelledby="<?php echo htmlspecialchars($cssIdModal) . 'Title'; ?>"
     style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <iframe
                        width="100%"
                        src=""
                        class="kit-has-dual-pane-iframe"
                >

                </iframe>

            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="<?php echo htmlspecialchars($cssIdModal2); ?>" tabindex="-1" role="dialog"
     aria-labelledby="<?php echo htmlspecialchars($cssIdModal2) . 'Title'; ?>"
     style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Select the children to add</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Modal body text goes here.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<?php
$modal = ob_get_clean();
$this->copilot->addModal($modal);
?>


<div class="kit-has-dual-pane <?php echo htmlspecialchars($this->getCssClass()); ?>"
    <?php echo $this->getAttributesHtml(); ?>>
    <div class="container-fluid" id="<?php echo $cssId; ?>">


        <div class="card">
            <?php if ($title): ?>
                <div class="card-header"><?php echo $title; ?></div>
            <?php endif; ?>


            <div class="card-body">

                <div class="row">
                    <div class="col-sm-5">
                        <div class="pane pane1">
                            <?php if ($pane1Title): ?>
                                <div class="pane-header">
                                    <h6 class="pane-title mb-2"><?php echo $pane1Title; ?></h6>
                                </div>
                            <?php endif; ?>
                            <?php if (true === $pane1UseSearch): ?>
                                <div class="pane-subheader">
                                    <div class="input-group input-group-sm mb-0">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-search"></i>
                                        </span>
                                        </div>
                                        <input type="text" class="form-control search-input">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary clear-search-btn"
                                                    type="button"
                                            >
                                                <i class="fas fa-times clear-search-btn"></i>
                                            </button>
                                            <button class="btn btn-outline-secondary sort-items-btn"
                                                    type="button"
                                            >
                                                <i class="fas fa-sort sort-items-btn"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <div class="pane-body">
                                <select class="form-control rows-select" id="multiple-select" name="multiple-select"
                                        size="15"
                                        multiple="">
                                    <?php if (false): ?>
                                        <?php foreach ($pane1Rows as $row): ?>
                                            <option class="row-item"
                                                    data-paramjson-ric="<?php echo htmlspecialchars(json_encode($row['ric'])); ?>"><?php echo $row['label']; ?></option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                            <div class="pane-footer d-flex">
                                <div class="pagination">
                                    <select class="pagination-select"></select>
                                </div>
                                <div class="btn-group ml-auto" role="group">
                                    <button type="button"
                                            class="reset-btn btn btn-xs btn-outline-success"><?php echo $textReset; ?></button>
                                    <button type="button"
                                            class="btn btn-xs add-children-btn btn-outline-danger"
                                            disabled><?php echo $textAddChildren; ?></button>
                                    <button type="button"
                                            class="new-item-btn btn btn-xs btn-outline-primary"
                                    ><?php echo $textNew; ?></button>
                                    <button type="button"
                                            class="edit-item-btn btn btn-xs btn-outline-info"
                                            disabled><?php echo $textEdit; ?></button>
                                    <button type="button"
                                            class="remove-item-btn btn btn-xs btn-outline-danger"
                                            disabled><?php echo $textRemove; ?></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-none col-sm-1 d-sm-flex justify-center align-items-center">
                        <i class="fas fa-long-arrow-alt-right fa-3x icon-long-arrow"></i>
                    </div>
                    <div class="col-sm-6 mt-3 mt-sm-0">
                        <div class="pane pane2">
                            <?php if ($pane2Title): ?>
                                <div class="pane-header">
                                    <h6 class="pane-title mb-2"><?php echo $pane2Title; ?></h6>
                                </div>
                            <?php endif; ?>
                            <?php if (true === $pane2UseSearch): ?>
                                <div class="pane-subheader">
                                    <div class="input-group input-group-sm mb-0">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-search"></i>
                                        </span>
                                        </div>
                                        <input type="text" class="form-control search-input ">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary clear-search-btn"
                                                    type="button"
                                            >
                                                <i class="fas fa-times clear-search-btn"></i>
                                            </button>
                                            <button class="btn btn-outline-secondary sort-items-btn"
                                                    type="button"
                                            >
                                                <i class="fas fa-sort sort-items-btn"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <div class="pane-body">
                                <select class="form-control rows-select" id="multiple-select" name="multiple-select"
                                        size="15"
                                        multiple="">
                                    <?php if (false): ?>
                                        <?php foreach ($pane2Rows as $row): ?>
                                            <option class="row-item"
                                                    data-paramjson-ric="<?php echo htmlspecialchars(json_encode($row['ric'])); ?>"><?php echo $row['label']; ?></option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                            <div class="pane-footer d-flex">
                                <div class="pagination">
                                    <select class="pagination-select"></select>
                                </div>
                                <div class="btn-group ml-auto" role="group">
                                    <button type="button"
                                            class="new-item-btn btn btn-xs btn-outline-primary"><?php echo $textNew; ?></button>
                                    <button type="button"
                                            class="edit-item-btn btn btn-xs btn-outline-info"
                                            disabled><?php echo $textEdit; ?></button>
                                    <button type="button"
                                            class="remove-item-btn btn btn-xs btn-outline-danger"
                                            disabled><?php echo $textRemove; ?></button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>


            </div>

        </div>
    </div>
</div>

<script>


    document.addEventListener("DOMContentLoaded", function (event) {
        $(document).ready(function () {

            var panesInfo = <?php echo json_encode([
                'pane1' => $pane1Info,
                'pane2' => $pane2Info,
            ]); ?>;


            var jContext = $('#<?php echo $cssId; ?>');
            var jModal = $('#<?php echo $cssIdModal; ?>');
            var jModal2 = $('#<?php echo $cssIdModal2; ?>');

            var widget = new window.HasDualPaneWidget({
                identifier: '<?php echo $identifier; ?>',
                context: jContext,
                modal: jModal,
                modal2: jModal2,
                csrfToken: '<?php echo $csrfToken; ?>',
                crudDeleteContextIdentifier: '<?php echo $crudDeleteContextIdentifier; ?>',
                ajaxHandlerId: '<?php echo $ajaxHandlerId; ?>',
                ajaxHandlerUrl: '<?php echo $ajaxHandlerUrl; ?>',
                pane1FormInsertUrl: '<?php echo $pane1FormInsertUrl; ?>',
                pane1FormUpdateUrl: '<?php echo $pane1FormUpdateUrl; ?>',
                pane2FormInsertUrl: '<?php echo $pane2FormInsertUrl; ?>',
                pane2FormUpdateUrl: '<?php echo $pane2FormUpdateUrl; ?>',
                pane1Table: '<?php echo $pane1Table; ?>',
                pane2Table: '<?php echo $pane2Table; ?>',

                textConfirmDeleteRows: '<?php echo addcslashes($textConfirmDeleteRows, "'"); ?>',
            });
            widget.init(panesInfo);


        });
    });
</script>