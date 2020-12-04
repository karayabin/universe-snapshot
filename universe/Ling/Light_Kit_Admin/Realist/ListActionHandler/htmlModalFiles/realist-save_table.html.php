<div class="modal" tabindex="-1" role="dialog" id="modal-Light_Kit_Admin-save_table">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Save table</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Backup directory</label>
                        <div class="col-sm-6">
                            <div class="mt-2">/backups/database/<?php echo $z['table']; ?></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="mlkast-backup-name" class="col-sm-4 col-form-label">Backup name</label>
                        <div class="col-sm-6">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control the-input" id="mlkast-backup-name"
                                       value="<?php echo htmlspecialchars($z['defaultName']); ?>">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2">.sql</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="mlkast-backup-visibility" class="col-sm-4 col-form-label">Visibility</label>
                        <div class="col-sm-6">
                            <select class="form-control the-select" id="mlkast-backup-visibility">
                                <option value="public">public</option>
                                <option value="private">private</option>
                            </select>
                        </div>
                    </div>


<!--                    <div class="form-group row">-->
<!--                        <label for="mlkast-backup-visibility" class="col-sm-4 col-form-label">Generate options</label>-->
<!--                        <div class="col-sm-6">-->
<!---->
<!--                            <div class="form-check">-->
<!--                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" checked>-->
<!--                                <label class="form-check-label" for="defaultCheck1">-->
<!--                                    Disable foreign key check-->
<!--                                </label>-->
<!--                            </div>-->
<!--                            <div class="form-check">-->
<!--                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck2" checked>-->
<!--                                <label class="form-check-label" for="defaultCheck2">-->
<!--                                    Use insert ignore-->
<!--                                </label>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->



                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary btn-lka-save">Save</button>
                <button class="d-none lka-btn-spinner btn btn-primary" type="button" disabled>
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    Loading...
                </button>
            </div>
        </div>
    </div>
</div>