<style>

    .presentation-item-card {
        max-width: 30%;
    }

    @media (max-width: 992px) {
        .presentation-item-card {
            max-width: 100%;
        }
    }

    .question-to-user {
        font-weight: bold;
        font-size: 16px;
    }

    .user-focus-spacer {
        height: 10px;
    }

    @media (min-width: 992px) {
        .user-focus-spacer {
            height: 20px;
        }
    }

    @media (min-width: 1200px) {
        .user-focus-spacer {
            height: 50px;
        }
    }


    /*------------------------------------
    - login form
    ------------------------------------*/
    .login-box {
        width: 100%;
        margin: auto;
        min-height: 670px;
        position: relative;
    }

    .login-snip {
        width: 100%;
        height: 100%;
        position: absolute;
        padding: 30px 30px 50px 30px;
        background: rgba(170, 227, 227, 0.9);
        background: #fbfbfb;
    }


    .login-snip .login,
    .login-snip .sign-up-form {
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        position: absolute;
        transform: rotateY(180deg);
        backface-visibility: hidden;
        transition: all .4s linear
    }

    .login-snip .sign-in,
    .login-snip .sign-up,
    .login-space .group .check {
        display: none;
    }

    .login-snip .tab,
    .login-space .group .label,
    .login-space .group .button {
        text-transform: uppercase
    }

    .login-snip .tab {
        font-size: 22px;
        margin-right: 15px;
        padding-bottom: 5px;
        margin: 0 15px 10px 0;
        display: inline-block;
        border-bottom: 2px solid transparent;
        cursor: pointer;
    }

    .login-snip .sign-in:checked + .tab,
    .login-snip .sign-up:checked + .tab {
        color: black;
        border-color: #1161ee
    }

    .login-space {
        min-height: 345px;
        position: relative;
        perspective: 1000px;
        transform-style: preserve-3d;
    }

    .login-space .group {
        margin-bottom: 15px
    }

    .login-space .group .label,
    .login-space .group .input,
    .login-space .group .button {
        width: 99%;
        color: black;
        display: block;
        margin-left: 5px;

    }

    .login-space .group .input,
    .login-space .group .button {
        border: none;
        padding: 15px 20px;
        border-radius: 25px;
        background: rgba(25, 39, 238, 0.1);
    }

    .login-space .group input[data-type="password"] {
        text-security: circle;
        -webkit-text-security: circle
    }

    .login-space .group .label {
        color: #999;
        font-size: 12px
    }

    .login-space .group .button {
        background: #1161ee;
        color: white;
    }

    .login-space .group label .icon {
        width: 15px;
        height: 15px;
        border-radius: 2px;
        position: relative;
        display: inline-block;
        background: rgba(255, 255, 255, .1)
    }

    .login-space .group label .icon:before,
    .login-space .group label .icon:after {
        content: '';
        width: 10px;
        height: 2px;
        background: #fff;
        position: absolute;
        transition: all .2s ease-in-out 0s
    }

    .login-space .group label .icon:before {
        left: 3px;
        width: 5px;
        bottom: 6px;
        transform: scale(0) rotate(0)
    }

    .login-space .group label .icon:after {
        top: 6px;
        right: 0;
        transform: scale(0) rotate(0)
    }

    .login-space .group .check:checked + label {
        color: #444;
    }

    .login-space .group .check:checked + label .icon {
        background: #1161ee;
        top: 2px;
    }

    .login-space .group .check:checked + label .icon:before {
        transform: scale(1) rotate(45deg)
    }

    .login-space .group .check:checked + label .icon:after {
        transform: scale(1) rotate(-45deg)
    }

    .login-snip .sign-in:checked + .tab + .sign-up + .tab + .spinner-border + .login-space .login {
        transform: rotate(0)
    }

    .login-snip .sign-up:checked + .tab + .spinner-border + .login-space .sign-up-form {
        transform: rotate(0)
    }


    .kitstore-login-card .login {
        overflow: hidden;
        max-height: 360px;
    }


    .kitstore-login-card .scroller {
        position: relative;
        top: 0;
        transition: all .3s ease;
    }


    .kitstore-login-card .scroller.show-forgot-password {
        top: -350px;
    }


    .kitstore-login-card .scroller. .slide-to-login-section-action {
        cursor: pointer;
    }


    .kitstore-form-hr {
        height: 2px;
        background: rgba(255, 255, 255, .2)
    }

    .kitstore-login-card .foot {
        text-align: center
    }

    .kitstore-login-card {
        /*width: 500px;*/
        width: 100%;

    }

    ::placeholder {
        color: #aaa;
    }

</style>

<div class="modal" tabindex="-1" id="create-website-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header align-items-center">
                <h5 class="modal-title">Create a website</h5>

                <div class="ml-2 gui-loader d-none spinner-border spinner-border-sm" role="status">
                    <span class="sr-only">Loading...</span>
                </div>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


                <div class="error-container d-none">
                    <div class="text-danger error-message">This is an error.</div>
                    <hr>
                </div>


                <div class="modal-content-pane d-none" data-id="main">
                    <form>
                        <div class="header-menu">
                            <div class="form-check">
                                <input class="radio-create-technique radio-hide form-check-input" type="radio"
                                       name="create-technique"
                                       id="exampleRadios1"
                                       data-target="create-website-1"
                                       value="option1" checked>
                                <label class="form-check-label" for="exampleRadios1">
                                    from scratch
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="radio-create-technique radio-hide form-check-input" type="radio"
                                       name="create-technique"
                                       id="exampleRadios2"
                                       data-target="create-website-2"
                                       value="option2">
                                <label class="form-check-label" for="exampleRadios2">
                                    by duplicating an existing one
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="radio-create-technique radio-hide form-check-input" type="radio"
                                       name="create-technique"
                                       id="exampleRadios3"
                                       data-target="create-website-3"

                                       value="option3">
                                <label class="form-check-label" for="exampleRadios3">
                                    from a model
                                </label>
                            </div>
                        </div>
                        <hr>
                        <div class="form-body">
                            <div class="radio-hide-pane" data-id="create-website-1" id="lke-create-website-pane">

                                <div class="form-group">
                                    <label for="lke-p1-label">Label</label>
                                    <input name="label" type="text" class="form-control form-collect" id="lke-p1-label"
                                           aria-describedby="lke-p1-label-help">
                                    <small id="lke-p1-label-help" class="form-text text-muted">The website name, as you
                                        want it to appear in the backoffice. Example: site 1.</small>
                                </div>
                                <div class="form-group">
                                    <label for="lke-p1-identifier">Identifier</label>
                                    <input type="text" class="form-control form-collect" id="lke-p1-identifier"
                                           name="identifier"
                                           aria-describedby="lke-p1-identifier-help">
                                    <small id="lke-p1-identifier-help" class="form-text text-muted">A unique identifier
                                        for your website. Alpha-numeric chars only. Example: site1</small>
                                </div>
                                <!--                            <div class="form-group">-->
                                <!--                                <label for="lke-p1-engine">Engine</label>-->
                                <!--                                <select id="lke-p1-engine" name="engine" class="form-collect form-control form-control-sm select-hide"-->
                                <!--                                        aria-describedby="lke-p1-engine-help"-->
                                <!--                                >-->
                                <!--                                    <option value="baby" data-target="lke-engine-baby">BabyYaml</option>-->
                                <!--                                    <option value="db" data-target="lke-engine-db">Database</option>-->
                                <!--                                </select>-->
                                <!--                                <small id="lke-p1-engine-help" class="form-text text-muted">The engine defines how the data is stored on our server.-->
                                <!--                                    If you don't have a preference, just use the default value, it's fine. You can always change it later.</small>-->
                                <!--                            </div>-->
                                <!---->
                                <!--                            <div class="engine-panes">-->
                                <!--                                <div class="form-group select-hide-pane" data-id="lke-engine-baby">-->
                                <!--                                    <label for="lke-p1-rootdir">Root dir</label>-->
                                <!--                                    <input type="text" name="rootdir" class="form-control form-collect" id="lke-p1-rootdir"-->
                                <!--                                           aria-describedby="lke-p1-rootdir-help">-->
                                <!--                                    <small id="lke-p1-rootdir-help" class="form-text text-muted">The relative path-->
                                <!--                                        from the application root dir to the babyYaml root dir. Consecutive dots are-->
                                <!--                                        not allowed.</small>-->
                                <!--                                </div>-->
                                <!--                            </div>-->
                            </div>
                            <div class="radio-hide-pane" data-id="create-website-2" id="lke-create-website-pane-2">
                                <div class="form-group">
                                    <label for="lke-p2-website">Choose a website to duplicate from</label>
                                    <select name="website_identifier" id="lke-p2-website"
                                            class="form-collect form-control form-control-sm">
                                        <?php foreach ($websites as $item): ?>
                                            <option value="<?php echo htmlspecialchars($item['identifier']); ?>"><?php echo $item['label']; ?>
                                                (<?php echo $item['identifier']; ?>)
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="radio-hide-pane" data-id="create-website-3">


                                <div class="header d-flex mb-3 justify-content-end">
                                    <div class="search-bar mr-2 d-flex align-items-center">

                                        <small class="text-muted text-nowrap">Search</small>
                                        <input type="email" class="form-control form-control-sm ml-2"
                                               id="exampleInputEmail1" aria-describedby="emailHelp">

                                    </div>
                                    <div class="sort-widget d-flex align-items-center">
                                        <small class="text-muted text-nowrap">Sort by</small>
                                        <select class="form-control form-control-sm ml-2">
                                            <option data-target="lke-engine-baby">Price: Low to High</option>
                                            <option data-target="lke-engine-baby">Price: High to Low</option>
                                            <option data-target="lke-engine-baby">Avg. Customer Review</option>
                                            <option data-target="lke-engine-baby">Newest Arrivals</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="d-flex flex-wrap">


                                    <?php for ($i = 1; $i <= 7; $i++): ?>


                                        <div class="presentation-item-card card mb-3 ml-3">
                                            <div class="row no-gutters">


                                                <a href="./single-space.html" class="position-relative"><img
                                                            src="https://demo.themesberg.com/bootstrap/spaces/assets/img/image-office.jpg"
                                                            class="card-img-top p-2 rounded-xl"
                                                            alt="themesberg office"></a>


                                                <div class="card-body">
                                                    <h5 class="card-title">Card title</h5>
                                                    <p class="card-text">This is a wider card with supporting text
                                                        below
                                                        as a natural lead-in to additional content. This content is
                                                        a
                                                        little bit longer.</p>


                                                    <?php if (false): ?>
                                                        <div class="d-flex my-4"><span
                                                                    class="star fas fa-star text-warning"></span>
                                                            <span
                                                                    class="star fas fa-star text-warning"></span>
                                                            <span
                                                                    class="star fas fa-star text-warning"></span>
                                                            <span
                                                                    class="star fas fa-star text-warning"></span>
                                                            <span
                                                                    class="star fas fa-star text-warning"></span>
                                                            <span
                                                                    class="badge badge-pill badge-primary ml-2">5.0</span>
                                                        </div>
                                                    <?php endif; ?>


                                                    <ul class="list-group mb-3">
                                                        <li class="list-group-item small p-0"><span
                                                                    class="fas fa-cube mr-2"></span>E-commerce
                                                        </li>
                                                        <li class="list-group-item small p-0"><span
                                                                    class="fas fa-dollar-sign mr-2"></span>Free
                                                        </li>
                                                    </ul>


                                                    <p class="card-text"><small class="text-muted">Posted on
                                                            2021-04-05
                                                            by ling</small></p>


                                                    <button type="button"
                                                            class="btn btn-primary install-website-model-btn">
                                                        Install
                                                    </button>

                                                </div>
                                            </div>

                                        </div>


                                    <?php endfor; ?>

                                </div>

                                <nav aria-label="Page navigation example">
                                    <ul class="pagination pagination-sm  justify-content-center mt-3">
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#" tabindex="-1"
                                               aria-disabled="true">Previous</a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">Next</a>
                                        </li>
                                    </ul>
                                </nav>


                            </div>


                        </div>


                        <!--                    <button type="submit" class="btn btn-primary">Submit</button>-->
                    </form>
                </div>

                <div class="modal-content-pane  " data-id="install-website">
                    <div class="content-header border-bottom mb-1 d-flex pb-3">
                        <h4 class="mb-0">Installing Card XXX</h4>
                        <button title="Go back to the previous screen" type="button"
                                class="close ml-auto toolbox-back-to-website-list-action" aria-label="Close">
                            <i aria-hidden="true" class="fas fa-step-backward toolbox-back-to-website-list-action"
                               style="color: black;"></i>
                        </button>
                    </div>


                    <div class="content-body d-flex">

                        <div class="container-fluid pl-0">
                            <div class="row">
                                <div class="col-lg-4 d-none d-lg-block">
                                    <div class="card">
                                        <div class="row no-gutters">


                                            <a href="./single-space.html" class="position-relative"><img
                                                        src="https://demo.themesberg.com/bootstrap/spaces/assets/img/image-office.jpg"
                                                        class="card-img-top p-2 rounded-xl" alt="themesberg office"></a>


                                            <div class="card-body">
                                                <h5 class="card-title">Card title</h5>
                                                <p class="card-text">This is a wider card with supporting text below
                                                    as a natural lead-in to additional content. This content is a
                                                    little bit longer.</p>


                                                <?php if (false): ?>
                                                    <div class="d-flex my-4"><span
                                                                class="star fas fa-star text-warning"></span> <span
                                                                class="star fas fa-star text-warning"></span> <span
                                                                class="star fas fa-star text-warning"></span> <span
                                                                class="star fas fa-star text-warning"></span> <span
                                                                class="star fas fa-star text-warning"></span> <span
                                                                class="badge badge-pill badge-primary ml-2">5.0</span>
                                                    </div>
                                                <?php endif; ?>


                                                <ul class="list-group mb-3">
                                                    <li class="list-group-item small p-0"><span
                                                                class="fas fa-cube mr-2"></span>E-commerce
                                                    </li>
                                                    <li class="list-group-item small p-0"><span
                                                                class="fas fa-dollar-sign mr-2"></span>Free
                                                    </li>
                                                </ul>


                                                <p class="card-text"><small class="text-muted">Posted on 2021-04-05
                                                        by ling</small></p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-lg-8">


                                    <div class="user-focus-spacer"></div>
                                    <div class="user-focus-screen">


                                        <div class="d-flex justify-content-center align-items-center">
                                            <div class="user-focus-screen-content d-none" data-id="install">
                                                <p class="question-to-user">
                                                    This will add the card xxx website model to your collection.
                                                    Do you wish to continue?
                                                </p>


                                                <div class="bar">
                                                    <button type="button"
                                                            class="btn btn-secondary toolbox-back-to-website-list-action">
                                                        No
                                                    </button>
                                                    <button type="button"
                                                            class="btn btn-primary install-confirm-button">
                                                        Yes
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="user-focus-screen-content " data-id="login">
                                            <p class="question-to-user">
                                                Please log in to your kitstore account.
                                            </p>

                                            <p>
                                                A kitstore account is required to download items. If you don't have one
                                                yet,
                                                you can sign up (it just takes a few seconds).
                                            </p>

                                            <div class="container">


                                                <div class="row">
                                                    <div class="col p-0">
                                                        <div class="kitstore-login-card">

                                                            <div class="d-none signup-error-container alert alert-danger"
                                                                 role="alert"></div>
                                                            <div class="d-none signup-error-success alert alert-success"
                                                                 role="alert"></div>
                                                            <div class="login-box">
                                                                <div class="login-snip">


                                                                    <input id="tab-1"
                                                                           type="radio"
                                                                           name="tab"
                                                                           class="sign-in"
                                                                           checked>
                                                                    <label
                                                                            for="tab-1"
                                                                            class="tab slide-to-login-section-action">Login</label>
                                                                    <input id="tab-2" type="radio" name="tab"
                                                                           class="sign-up">
                                                                    <label for="tab-2"
                                                                           class="tab">Sign Up
                                                                    </label>


                                                                    <div class="d-none create-website-kistore-login-loader spinner-border spinner-border-sm"
                                                                         role="status">
                                                                        <span class="sr-only">Loading...</span>
                                                                    </div>


                                                                    <div class="login-space">
                                                                        <div class="login">
                                                                            <div class="scroller">
                                                                                <div class="sign-in-form">
                                                                                    <div class="group"><label for="user"
                                                                                                              class="label">Email</label>
                                                                                        <input id="user" type="text"
                                                                                               class="input form-collect"
                                                                                               name="email"
                                                                                               value="<?php echo htmlspecialchars($kitStoreEmail); ?>"
                                                                                               placeholder="Enter your email">
                                                                                    </div>
                                                                                    <div class="group"><label for="pass"
                                                                                                              class="label">Password</label>
                                                                                        <input id="pass" type="password"
                                                                                               class="input form-collect"
                                                                                               data-type="password"
                                                                                               name="password"
                                                                                               value="<?php echo htmlspecialchars($kitStorePassword); ?>"
                                                                                               placeholder="Enter your password">
                                                                                    </div>
                                                                                    <div class="group d-flex align-items-center">
                                                                                        <input id="check"
                                                                                               name="remember_me"
                                                                                               type="checkbox"
                                                                                               class="check form-collect" <?php if ("1" === $kitStoreRememberMe): ?>
                                                                                            checked
                                                                                        <?php endif; ?>>
                                                                                        <label
                                                                                                for="check"><span
                                                                                                    class="icon"></span>
                                                                                            <span>Keep me Signed in</span></label>
                                                                                    </div>
                                                                                    <div class="group"><input
                                                                                                type="submit"
                                                                                                class="button kitstore-sign-in-action"
                                                                                                value="Sign In">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="kitstore-form-hr"></div>
                                                                                <div class="foot"><a href="#"
                                                                                                     class="slide-to-forgot-password-section-action">Forgot
                                                                                        Password?</a></div>

                                                                                <div class="forgot-password-tab mt-5">
                                                                                    <div class="d-flex">
                                                                                        <p>
                                                                                            Fill this form to
                                                                                            reset
                                                                                            your password.
                                                                                        </p>
                                                                                        <div class="ml-auto">
                                                                                            <a href="#"
                                                                                               title="Back to login form"
                                                                                               class="slide-to-login-section-action">
                                                                                                <i class="fas fa-arrow-up slide-to-login-section-action"></i>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="group"><label for="pass"
                                                                                                              class="label">Email
                                                                                            Address</label> <input
                                                                                                id="pass"
                                                                                                type="text"
                                                                                                class="input form-collect"
                                                                                                name="email"
                                                                                                placeholder="Enter your email address">
                                                                                    </div>
                                                                                    <div class="group"><input
                                                                                                type="submit"
                                                                                                class="button kitstore-reset-password-action"
                                                                                                value="Reset my password">
                                                                                    </div>
                                                                                    <div class="kitstore-form-hr"></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="sign-up-form">
                                                                            <div class="group"><label for="pass"
                                                                                                      class="label">Email
                                                                                    Address</label> <input id="pass"
                                                                                                           type="text"
                                                                                                           name="email"
                                                                                                           class="input form-collect"
                                                                                                           placeholder="Enter your email address">
                                                                            </div>
                                                                            <div class="group"><label for="pass"
                                                                                                      class="label">Password</label>
                                                                                <input id="pass" type="password"
                                                                                       class="input form-collect"
                                                                                       data-type="password"
                                                                                       name="password"
                                                                                       placeholder="Create your password">
                                                                            </div>
                                                                            <div class="group"><label for="pass"
                                                                                                      class="label">Repeat
                                                                                    Password</label> <input
                                                                                        id="pass" type="password"
                                                                                        class="input form-collect"
                                                                                        data-type="password"
                                                                                        name="password_confirm"
                                                                                        placeholder="Repeat your password">
                                                                            </div>
                                                                            <input class="form-collect" type="hidden"
                                                                                   name="project_name"
                                                                                   value="<?php echo htmlspecialchars($projectName); ?>">
                                                                            <div class="group"><input type="submit"
                                                                                                      class="button kitstore-sign-up-action"
                                                                                                      value="Sign Up">
                                                                            </div>
                                                                            <div class="kitstore-form-hr"></div>
                                                                        </div>


                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>


                    </div>

                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary modal-submit-button">Submit</button>
            </div>
        </div>
    </div>
</div>