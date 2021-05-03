<?php


/**
 * @var $this PicassoWidget
 */


use Ling\Kit_PicassoWidget\Widget\PicassoWidget;

$company_info_is_left = $z['company_info_is_left'] ?? true;
$company_title = $z['company_title'] ?? "";
$company_text = $z['company_text'] ?? "";
$company_address = $z['company_address'] ?? "";
$company_email = $z['company_email'] ?? "";
$company_phone = $z['company_phone'] ?? "";
$form_title = $z['form_title'] ?? "";
$form_action = $z['form_action'] ?? "";
$form_method = $z['form_method'] ?? "post";
$form_fields = $z['form_fields'] ?? [];
$form_btn_text = $z['form_btn_text'] ?? "Submit";
$form_btn_class = $z['form_btn_class'] ?? "";


$nbTextFields = 0;
$textFields = [];
$textareaFields = [];
foreach ($form_fields as $k => $field) {
    $type = $field['type'] ?? null;
    if (in_array($field['type'], ['text', 'email'])) {
        $nbTextFields++;
        $textFields[] = $field;
    } elseif ('textarea' === $type) {
        $textareaFields[] = $field;
    }
}
$colClass = ($nbTextFields === 1) ? 'col' : 'col-md-6';


$companyInfo = function () use (
    $company_title,
    $company_text,
    $company_address,
    $company_email,
    $company_phone
) {
    ?>
    <div class="col-md-4">
        <div class="card p-4">
            <div class="card-body">
                <?php if ($company_title): ?>
                    <h4><?php echo $company_title; ?></h4>
                <?php endif; ?>
                <?php if ($company_text): ?>
                    <p><?php echo $company_text; ?></p>
                <?php endif; ?>
                <?php if ($company_address): ?>
                    <h4>Address</h4>
                    <p><?php echo $company_address; ?></p>
                <?php endif; ?>
                <?php if ($company_email): ?>
                    <h4>Email</h4>
                    <p><?php echo $company_email; ?></p>
                <?php endif; ?>
                <?php if ($company_phone): ?>
                    <h4>Phone</h4>
                    <p><?php echo $company_phone; ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php
};


?>

<section class="kit-bwl-contact_form_and_company_info <?php echo htmlspecialchars($this->getCssClass()); ?>"
    <?php echo $this->getAttributesHtml(); ?>
>
    <div class="container">
        <div class="row">


            <?php if (true === $company_info_is_left): ?>
                <?php $companyInfo(); ?>
            <?php endif; ?>
            <div class="col-md-8">
                <card class="p-4">
                    <form
                            action="<?php echo htmlspecialchars($form_action); ?>"
                            method="<?php echo htmlspecialchars($form_method); ?>"
                    >
                        <div class="card-body">
                            <?php if ($form_title): ?>
                                <h3 class="text-center"><?php echo $form_title; ?></h3>
                                <hr>
                            <?php endif; ?>
                            <?php if ($nbTextFields > 0): ?>
                                <div class="row">
                                    <?php foreach ($textFields as $field): ?>
                                        <div class="<?php echo $colClass; ?>">
                                            <div class="form-group">
                                                <input type="<?php echo htmlspecialchars($field['type']); ?>"
                                                       class="form-control"
                                                       placeholder="<?php echo htmlspecialchars($field['label']); ?>"
                                                       name="<?php echo htmlspecialchars($field['name']); ?>"
                                                >
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                            <div class="row">

                                <?php foreach ($textareaFields as $field): ?>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                        <textarea class="form-control"
                                                  placeholder="<?php echo htmlspecialchars($field['label']); ?>"
                                                  name="<?php echo htmlspecialchars($field['name']); ?>"
                                        ></textarea>
                                        </div>
                                    </div>
                                <?php endforeach; ?>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="submit" value="<?php echo htmlspecialchars($form_btn_text); ?>"
                                               class="<?php echo htmlspecialchars($form_btn_class); ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </card>
            </div>
            <?php if (false === $company_info_is_left): ?>
                <?php $companyInfo(); ?>
            <?php endif; ?>
        </div>
    </div>
</section>

