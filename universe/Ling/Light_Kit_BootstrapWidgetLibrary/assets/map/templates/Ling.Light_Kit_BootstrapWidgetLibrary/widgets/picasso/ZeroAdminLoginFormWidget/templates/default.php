<?php


/**
 * @var $this ZeroAdminLoginFormWidget
 */


use Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso\ZeroAdminLoginFormWidget;


$form_method = $z['form_method'] ?? "post";
$form_action = $z['form_action'] ?? "";
$hidden_var = $z['hidden_var'] ?? "zeroadmin_login_form";
$title = $z['title'] ?? "Login";
$subtitle = $z['subtitle'] ?? "Sign In to your account";
$error_no_match_show = $z['error_no_match_show'] ?? false;
$error_no_match_body = $z['error_no_match_body'] ?? "<strong>Nope!</strong> The provided credentials don't match an user in our database.";


$field_username = $z['field_username'] ?? [];
$field_username_icon = $field_username['icon'] ?? "fas fa-user";
$field_username_name = $field_username['name'] ?? "username";
$field_username_label = $field_username['label'] ?? "Username";
$field_username_value = $field_username['value'] ?? "";


$field_password = $z['field_password'] ?? [];
$field_password_icon = $field_password['icon'] ?? "fas fa-lock";
$field_password_name = $field_password['name'] ?? "password";
$field_password_label = $field_password['label'] ?? "Password";
$field_password_value = $field_password['value'] ?? "";


$field_remember_me = $z['field_remember_me'] ?? [];
$field_remember_me_name = $field_remember_me['name'] ?? "remember_me";
$field_remember_me_label = $field_remember_me['label'] ?? "Remember me";
$field_remember_me_value = $field_remember_me['value'] ?? false;


$btn_submit = $z['btn_submit'] ?? [];
$btn_submit_class = $btn_submit["class"] ?? "btn btn-primary px-4";
$btn_submit_text = $btn_submit["login"] ?? "Login";


$link_forgot_password = $z['link_forgot_password'] ?? [];
$link_forgot_password_link = $link_forgot_password['link'] ?? "";
$link_forgot_password_text = $link_forgot_password['text'] ?? "Forgot password?";


$use_link_forgot_password = $z['use_link_forgot_password'] ?? true;
$use_remember_me = $z['use_remember_me'] ?? true;


?>

<div class="kit-bwl-zeroadmin_login_form <?php echo htmlspecialchars($this->getCssClass()); ?>"
    <?php echo $this->getAttributesHtml(); ?>
>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card p-4">
                    <form action="<?php echo htmlspecialchars($form_action); ?>"
                          method="<?php echo htmlspecialchars($form_method); ?>">


                        <input type="hidden" name="<?php echo htmlspecialchars($hidden_var); ?>" value="any"/>

                        <div class="card-body">
                            <?php if ($title): ?>
                                <h1><?php echo $title; ?></h1>
                            <?php endif; ?>
                            <?php if ($subtitle): ?>
                                <p class="text-muted"><?php echo $subtitle; ?></p>
                            <?php endif; ?>


                            <?php if (true === $error_no_match_show): ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <?php echo $error_no_match_body; ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php endif; ?>


                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="<?php echo htmlspecialchars($field_username_icon); ?>"></i>
                                </span>
                                </div>
                                <input
                                        id="zero-admin-login-auto-focus-input"
                                        class="form-control" type="text"
                                        name="<?php echo htmlspecialchars($field_username_name); ?>"
                                        placeholder="<?php echo htmlspecialchars($field_username_label); ?>"
                                        value="<?php echo htmlspecialchars($field_username_value); ?>"
                                >
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                <span class="input-group-text">
                                <i class="<?php echo htmlspecialchars($field_password_icon); ?>"></i>
                                </span>
                                </div>
                                <input class="form-control" type="password"
                                       name="<?php echo htmlspecialchars($field_password_name); ?>"
                                       placeholder="<?php echo htmlspecialchars($field_password_label); ?>"
                                       value="<?php echo htmlspecialchars($field_password_value); ?>"
                                >
                            </div>


                            <?php if (true === $use_remember_me): ?>
                                <div class="input-group mb-4 d-flex justify-content-start">
                                    <div class="form-group form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1"
                                               name="<?php echo htmlspecialchars($field_remember_me_name); ?>"
                                            <?php if (true === (bool)$field_remember_me_value): ?>
                                                checked
                                            <?php endif; ?>
                                        >
                                        <label class="form-check-label"
                                               for="exampleCheck1"><?php echo $field_remember_me_label; ?></label>
                                    </div>
                                </div>
                            <?php endif; ?>


                            <div class="row">
                                <div class="col-6">
                                    <button type="submit" class="<?php echo htmlspecialchars($btn_submit_class); ?>">
                                        <?php echo $btn_submit_text; ?>
                                    </button>
                                </div>

                                <?php if ($use_link_forgot_password): ?>
                                    <div class="col-6 text-right">
                                        <a href="<?php echo htmlspecialchars($link_forgot_password_link); ?>"
                                           class="btn btn-link px-0">
                                            <?php echo $link_forgot_password_text; ?>
                                        </a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>


<script>
    document.addEventListener("DOMContentLoaded", function (event) {
        var firstInput = document.getElementById("zero-admin-login-auto-focus-input");
        firstInput.focus();
    });

</script>