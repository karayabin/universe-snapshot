<?php


/**
 * @var $this LightKitAdminChloroformWidget
 */


use Ling\Chloroform\Form\Chloroform;
use Ling\Chloroform_HeliumLightRenderer\HeliumLightRenderer;
use Ling\Light_Kit_Admin\Chloroform\LightKitAdminChloroformRendererUtil;
use Ling\Light_Kit_Admin\Widget\Picasso\LightKitAdminChloroformWidget;


/**
 * @var $form Chloroform
 */
$form = $z['form'];
$title = $z['title'] ?? "Form";
$show_rights = $z['show_rights'] ?? true;
$rights = $z['rights'] ?? [];
$is_root = $z['is_root'] ?? false;


$text_change_your_password = $z['text_change_your_password'] ?? "Change your password";
$text_choose_file = $z['text_choose_file'] ?? "Choose file";
$text_submit = $z['text_submit'] ?? "Submit";
$text_reset = $z['text_reset'] ?? "Reset";


$chloroform = $form->toArray();


$fields = $chloroform['fields'];
$pseudo = $fields['pseudo'];
$password = $fields['password'];
$avatar_url = $fields['avatar_url'];
$cssId = 'user-profile-form';


$renderer = new HeliumLightRenderer([
    'fullAjaxForm' => true,
    'cssId' => $cssId,
]);
$renderer->setContainer($this->getContainer());
$renderer->prepare($chloroform);

?>


<div class="kit-lka-chloroform mb-5 <?php echo htmlspecialchars($this->getCssClass()); ?>"
    <?php echo $this->getAttributesHtml(); ?>
>
    <div class="container-fluid">

        <div class="row mb-3">
            <div class="col">
                <form action="" method="post" enctype="multipart/form-data"
                      id="<?php echo htmlspecialchars($cssId); ?>">
                    <div class="card">
                        <div class="card-header">
                            <?php echo $title; ?>
                        </div>
                        <div class="card-body">

                            <?php LightKitAdminChloroformRendererUtil::renderNotifications($chloroform); ?>
                            <?php LightKitAdminChloroformRendererUtil::renderErrorsSummary($chloroform); ?>


                            <div class="form-group">
                                <label for="id-control-pseudo"><?php echo $pseudo['label']; ?></label>
                                <input type="text" name="<?php echo htmlspecialchars($pseudo['htmlName']); ?>"
                                       class="form-control" id="id-control-pseudo"
                                       value="<?php echo htmlspecialchars($pseudo['value']); ?>">
                            </div>


                            <div class="form-group">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input"
                                           id="id-control-password-switch">
                                    <label class="custom-control-label"
                                           for="id-control-password-switch"><?php echo $text_change_your_password; ?></label>
                                </div>
                                <div class="form-group display-none">
                                    <label for="id-control-password"><?php echo $password['label']; ?></label>
                                    <input type="text" class="form-control" id="id-control-password"
                                           name="<?php echo htmlspecialchars($password['htmlName']); ?>"
                                           value="<?php echo htmlspecialchars($password['value']); ?>"
                                    >
                                    <small class="form-text text-muted"><?php echo $password['hint']; ?></small>
                                </div>
                            </div>

                            <?php echo $renderer->printField($fields['avatar_url']); ?>

                            <?php LightKitAdminChloroformRendererUtil::renderHiddenCommonFields($chloroform); ?>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-sm btn-primary" type="submit">
                                <?php echo $text_submit; ?>
                            </button>
                            <button class="btn btn-sm btn-danger" type="reset">
                                <?php echo $text_reset; ?>
                            </button>
                        </div>
                    </div>
                </form>
                <?php echo $renderer->printCustomScripts(); ?>
            </div>
        </div>


        <?php if (true === $show_rights): ?>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">Your rights</div>
                        <div class="card-body">


                            <?php if (false === $is_root):
                                ?>
                                <div class="row p-3">
                                    <?php foreach ($rights as $pluginName => $rightNames): ?>
                                        <div class="card mr-3 mb-3">
                                            <div class="card-header"><?php echo $pluginName; ?></div>
                                            <div class="card-body">
                                                <ul>
                                                    <?php foreach ($rightNames as $name): ?>
                                                        <li><?php echo $name; ?></li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php else: ?>
                                <div class="row">
                                    <div class="col">
                                        <div>
                                            <i class="fas fa-check-double" style="color: #20a61f;"></i> You are root,
                                            you can do anything, now remember:
                                        </div>


                                        <blockquote class="blockquote">
                                            <p class="mb-0">With great power comes great responsibility.</p>
                                            <footer class="blockquote-footer">From the Spider-man movie</footer>
                                        </blockquote>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>


                </div>
            </div>
        <?php endif; ?>
    </div>



