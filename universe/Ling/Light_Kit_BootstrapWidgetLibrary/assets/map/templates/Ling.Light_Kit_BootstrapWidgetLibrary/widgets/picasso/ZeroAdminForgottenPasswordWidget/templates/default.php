<?php


/**
 * @var $this PicassoWidget
 */

use Ling\Kit_PicassoWidget\Widget\PicassoWidget;

$title = $z['title'] ?? "Forgot password";
$description = $z['description'] ?? "Enter your email address and your password will be reset and emailed to you.";
$btnText = $z['btnText'] ?? "Send new password";
$inputFormKeyName = $z['inputFormKeyName'] ?? "forgotten_password_key";
$formMethod = $z['formMethod'] ?? "POST";
$formAction = $z['formAction'] ?? "";

$inputEmailPlaceholder = $z['inputEmailPlaceholder'] ?? "Email";
$inputEmailValue = $z['inputEmailValue'] ?? "";
$inputEmailError = $z['inputEmailError'] ?? "";
$hasMultipleAccounts = $z['hasMultipleAccounts'] ?? false;
$userIdentifiers2Labels = $z['userIdentifiers2Labels'] ?? [];
$successMessage = $z['successMessage'] ?? null;
$backToLoginUrl = $z['backToLoginUrl'] ?? null;



?>


<section class="kit-bwl-zeroadmin_forgotten_password <?php echo htmlspecialchars($this->getCssClass()); ?>"
    <?php echo $this->getAttributesHtml(); ?>
>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card p-4">

                    <div class="card-body">
                        <h2 class="font-bold"><?php echo $title; ?></h2>

                        <p>
                            <?php echo $description; ?>
                        </p>

                        <?php if (null !== $successMessage): ?>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="alert alert-success" role="alert">
                                        <?php echo $successMessage; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <div class="row">

                            <div class="col-lg-12">
                                <form class="m-t" role="form" method="<?php echo htmlspecialchars($formMethod); ?>"
                                      action="<?php echo htmlspecialchars($formAction); ?>"
                                >
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-envelope"></i>
                            </span>
                                        </div>
                                        <input
                                                name="email"
                                                class="form-control" type="text"
                                                value="<?php echo htmlspecialchars($inputEmailValue); ?>"
                                                placeholder="<?php echo htmlspecialchars($inputEmailPlaceholder); ?>">
                                        <?php if ($inputEmailError): ?>
                                            <div class="b-form-error">
                                                <?php echo $inputEmailError; ?>
                                            </div>
                                        <?php endif; ?>

                                    </div>


                                    <?php if (true === $hasMultipleAccounts): ?>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Multiple accounts were found with
                                                this address, please select one:</label>
                                            <select name="user_identifier" class="form-control"
                                                    id="exampleFormControlSelect1">
                                                <?php foreach ($userIdentifiers2Labels as $identifier => $label): ?>
                                                    <option value="<?php echo htmlspecialchars($identifier); ?>"><?php echo $label; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>

                                    <?php endif; ?>

                                    <input type="hidden" name="<?php echo htmlspecialchars($inputFormKeyName); ?>"
                                           value="1">

                                    <div class="row">
                                        <div class="col-6">
                                            <button type="submit"
                                                    class="btn btn-primary block full-width m-b"><?php echo $btnText; ?></button>
                                        </div>
                                        <?php if (null !== $backToLoginUrl): ?>
                                            <div class="col-6 text-right">
                                                <a href="<?php echo htmlspecialchars($backToLoginUrl); ?>"
                                                   class="btn btn-link px-0">
                                                    Back to the login page
                                                </a>
                                            </div>
                                        <?php endif; ?>
                                    </div>


                                </form>
                            </div>
                        </div>


                    </div>


                </div>
            </div>
        </div>
    </div>

</section>
