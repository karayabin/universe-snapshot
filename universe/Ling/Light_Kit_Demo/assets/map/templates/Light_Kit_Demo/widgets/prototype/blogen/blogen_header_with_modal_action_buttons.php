<!-- ACTIONS -->
<section id="actions" class="py-4 mb-4 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <a href="#" class="btn btn-primary btn-block" data-toggle="modal" data-target="#addPostModal">
                    <i class="fas fa-plus"></i> Add Post
                </a>
            </div>
            <div class="col-md-3">
                <a href="#" class="btn btn-success btn-block" data-toggle="modal" data-target="#addCategoryModal">
                    <i class="fas fa-plus"></i> Add Category
                </a>
            </div>
            <div class="col-md-3">
                <a href="#" class="btn btn-warning btn-block" data-toggle="modal" data-target="#addUserModal">
                    <i class="fas fa-plus"></i> Add User
                </a>
            </div>
        </div>
    </div>
</section>



<!-- ADD POST MODAL -->
<div class="modal fade" id="addPostModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Add Post</h5>
                <button class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select class="form-control">
                            <option value="">Web Development</option>
                            <option value="">Tech Gadgets</option>
                            <option value="">Business</option>
                            <option value="">Health & Wellness</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="image">Upload Image</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="image">
                            <label for="image" class="custom-file-label">Choose File</label>
                        </div>
                        <small class="form-text text-muted">Max Size 3mb</small>
                    </div>
                    <div class="form-group">
                        <label for="body">Body</label>
                        <textarea name="editor1" class="form-control"></textarea>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button class="btn btn-primary" data-dismiss="modal">Save Changes</button>
            </div>

        </div>
    </div>
</div>


<!-- ADD CATEGORY MODAL -->
<div class="modal fade" id="addCategoryModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title">Add Category</h5>
                <button class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success" data-dismiss="modal">Save Changes</button>
            </div>
        </div>
    </div>
</div>


<!-- ADD USER MODAL -->
<div class="modal fade" id="addUserModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-warning text-white">
                <h5 class="modal-title">Add User</h5>
                <button class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password2">Confirm Password</label>
                        <input type="password" class="form-control">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-warning" data-dismiss="modal">Save Changes</button>
            </div>
        </div>
    </div>
</div>
