<?php


/**
 * @var $this LightKitAdminChloroformWidget
 */


use Ling\Chloroform\Field\FieldInterface;
use Ling\Chloroform\Form\Chloroform;
use Ling\Chloroform_HeliumLightRenderer\HeliumLightRenderer;
use Ling\Light_Kit_Admin\Widget\Picasso\LightKitAdminChloroformWidget;


/**
 * @var $form Chloroform
 */

$title = $z['title'] ?? "Form";
$relatedLinks = $z['related_links'] ?? [];
$plugin2Rows = $z['plugin2Rows'] ?? [];
$form = $z['form'];
$container = $this->getContainer();

$renderer = new HeliumLightRenderer([
    "useEnctypeMultiformData" => true,
    "printJsHandler" => true,
]);
$renderer->setContainer($container);


?>

<div class="kit-bwl-chloroform container-fluid <?php echo htmlspecialchars($this->getCssClass()); ?>"
    <?php echo $this->getAttributesHtml(); ?>
>

    <style>
        .table-custom-color {
            background: #e5f4f7;
        }

        .custom-table tr, .custom-table td {
            border: 1px solid #a8bfc6;
        }

        .first-col {
            width: 20%;
        }

        .custom-form-error{
            color: red;
        }

    </style>

    <div class="row">
        <div class="col m-auto">
            <div class="card">
                <div class="card-header">
                    <h5><?php echo $title; ?></h5>
                </div>
                <div class="card-body">


                    <?php if ($relatedLinks): ?>
                        <ul class="list-unstyled">

                            <?php foreach ($relatedLinks as $item):
                                $text = $item['text'];
                                $url = $item['url'];
                                $icon = $item['icon'] ?? null;
                                ?>

                                <li>
                                    <a href="<?php echo htmlspecialchars($url); ?>">
                                        <?php if ($icon): ?>
                                            <i class="<?php echo htmlspecialchars($icon); ?>"></i>
                                        <?php endif; ?>
                                        <?php echo $text; ?>
                                    </a>
                                </li>

                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>


                    <form method="post" action="">

                        <?php echo $renderer->printNotifications($form->getNotifications()); ?>

                        <?php echo $renderer->printField($form->getField('chloroform_hidden_key')->toArray()); ?>

                        <?php foreach ($plugin2Rows as $plugin => $rows): ?>

                            <h6><?php echo $plugin; ?></h6>

                            <table class="table table-bordered table-sm custom-table">
                                <?php foreach ($rows as $row):

                                    /**
                                     * @var $field FieldInterface
                                     */
                                    $field = $row['field'];
                                    $fieldArray = $field->toArray();

                                    ?>
                                    <tr class="table-custom-color">
                                        <td class="first-col text-right"><?php echo $row['name']; ?></td>
                                        <td>
                                            <?php
                                            $type = $row['render_type'];
                                            switch ($type) {
                                                case "int":
                                                    ?>
                                                    <input type="number"
                                                           name="<?php echo htmlspecialchars($fieldArray['htmlName']); ?>"
                                                           value="<?php echo htmlspecialchars($fieldArray['value']); ?>"
                                                    <?php
                                                    break;
                                                default:
                                                    ?>
                                                    <input type="text"
                                                           name="<?php echo htmlspecialchars($fieldArray['htmlName']); ?>"
                                                           value="<?php echo htmlspecialchars($fieldArray['value']); ?>"
                                                    <?php
                                                    break;
                                            }

                                            ?>


                                            <?php if($fieldArray['errors']): ?>
                                            <?php foreach($fieldArray['errors'] as $error): ?>
                                                <br>
                                                <span class="custom-form-error"><?php echo $error; ?></span>
                                            <?php endforeach; ?>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                        <?php endforeach; ?>

                        <button type="submit" class="submitButton btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>