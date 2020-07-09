<?php


/**
 * @var $this PicassoWidget
 */

use Ling\Kit_PicassoWidget\Widget\PicassoWidget;

$title = $z['title'] ?? "Forgot password";
$description = $z['description'] ?? "Enter your email address and your password will be reset and emailed to you.";
$btnText = $z['btnText'] ?? "Send new password";
$inputPlaceholder = $z['inputPlaceholder'] ?? "Email";
$formMethod = $z['formMethod'] ?? "POST";
$formAction = $z['formAction'] ?? "";


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

                        <div class="row">

                            <div class="col-lg-12">
                                <form class="m-t" role="form" method="<?php echo htmlspecialchars($z['formMethod']); ?>"
                                      action="<?php echo htmlspecialchars($z['formAction']); ?>"
                                >
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-envelope"></i>
                            </span>
                                        </div>
                                        <input class="form-control" type="text"
                                               placeholder="<?php echo htmlspecialchars($inputPlaceholder); ?>">
                                    </div>

                                    <button type="submit"
                                            class="btn btn-primary block full-width m-b"><?php echo $btnText; ?></button>

                                </form>
                            </div>
                        </div>


                    </div>


                </div>
            </div>
        </div>
    </div>

</section>
