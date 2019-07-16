<?php


/**
 * @var $this PicassoWidget
 */


use Ling\Kit_PicassoWidget\Widget\PicassoWidget;

$title = $z['title'] ?? "";
$text = $z['text'] ?? "";
$fields = $z['fields'] ?? [];
$btn_class = $z['btn_class'] ?? "";
$btn_text = $z['btn_text'] ?? "Submit";

?>

<section class="kit-bwl-newsletter_header <?php echo htmlspecialchars($this->getCssClass()); ?>"
    <?php echo $this->getAttributesHtml(); ?>
>
    <div class="container">
        <div class="row">
            <div class="col">
                <?php if ('' !== $title): ?>
                    <h1><?php echo $title; ?></h1>
                <?php endif; ?>
                <?php if ('' !== $text): ?>
                    <p><?php echo $text; ?></p>
                <?php endif; ?>
                <form class="form-inline justify-content-center">
                    <?php foreach ($fields as $field): ?>
                        <input type="<?php echo htmlspecialchars($field['type']); ?>" class="form-control mb-2 mr-2"
                               name="<?php echo htmlspecialchars($field['name']); ?>"
                               placeholder="<?php echo htmlspecialchars($field['label']); ?>">
                    <?php endforeach; ?>
                    <button class="<?php echo htmlspecialchars($btn_class); ?>"><?php echo $btn_text; ?></button>
                </form>
            </div>
        </div>
    </div>
</section>
