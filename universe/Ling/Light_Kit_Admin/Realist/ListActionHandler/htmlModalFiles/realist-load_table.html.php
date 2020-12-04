<div class="modal" tabindex="-1" role="dialog" id="modal-Light_Kit_Admin-load_table">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Load table</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


                <div class="lka-modal-main-spinner">
                    <div class="d-flex justify-content-center">
                        <div class=" spinner-border" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                </div>


                <form class="d-none lka-modal-form">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Backup directory</label>
                        <div class="col-sm-6">
                            <div class="placeholder-backup-dir mt-2"></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="mlkast-backup-name" class="col-sm-4 col-form-label">Backup</label>
                        <div class="col-sm-6">
                            <select class="form-control the-select" id="mlkast-backup-name"></select>
                        </div>
                    </div>
                </form>


                <div class="no-item-error error text-danger">
                    You cannot load an empty item.
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary btn-lka-load">Load</button>
                <button class="d-none lka-btn-spinner btn btn-primary" type="button" disabled>
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    Loading...
                </button>
            </div>
        </div>
    </div>
</div>