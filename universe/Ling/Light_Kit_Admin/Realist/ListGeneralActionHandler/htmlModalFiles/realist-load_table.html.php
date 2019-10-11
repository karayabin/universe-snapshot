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
                <form>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Backup directory</label>
                        <div class="col-sm-6">
                            <div class="mt-2">/backups/database/<?php echo $z['table']; ?></div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="mlkast-backup-name" class="col-sm-4 col-form-label">Backup</label>
                        <div class="col-sm-6">
                            <select class="form-control the-select" id="mlkast-backup-name">
                                <?php foreach ($z['backup_list'] as $path): ?>
                                    <option value="<?php echo htmlspecialchars($path); ?>"><?php echo $path; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>


                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary btn-lka-load">Load</button>
            </div>
        </div>
    </div>
</div>