<?php


/**
 * @var $this PicassoWidget
 */


use Ling\Kit_PicassoWidget\Widget\PicassoWidget;

$column_class = $z['column_class'] ?? "col-md-3";
$nb_profiles_per_row = $z['nb_profiles_per_row'] ?? 4;
$row_class = $z['row_class'] ?? "mt-5";
$title = $z['title'] ?? "";
$profiles = $z['profiles'] ?? [];

$cpt = 0;

?>

<section class="kit-bwl-people_grid <?php echo htmlspecialchars($this->getCssClass()); ?>"
    <?php echo $this->getAttributesHtml(); ?>
>
    <div class="container">
        <?php if ($title): ?>
            <h1><?php echo $title; ?></h1>
        <?php endif; ?>
        <hr>
        <div class="row">
            <?php foreach ($profiles

            as $profile):
            $cpt++;

            $img_url = $profile['img_url'];
            $img_alt = $profile['img_alt'];
            $name = $profile['name'] ?? "";
            $role = $profile['role'] ?? "";
            $is_rounded = $profile['is_rounded'] ?? true;

            $sRounded = (true === $is_rounded) ? 'rounded-circle' : '';

            ?>
            <div class="<?php echo htmlspecialchars($column_class); ?>">
                <img src="<?php echo htmlspecialchars($img_url); ?>"
                     alt="<?php echo htmlspecialchars($img_alt); ?>"
                     class="img-fluid mb-2 <?php echo $sRounded; ?>">
                <?php if ($name): ?>
                    <h4><?php echo $name; ?></h4>
                <?php endif; ?>
                <?php if ($role): ?>
                    <small><?php echo $role; ?></small>
                <?php endif; ?>
            </div>

            <?php if ($cpt === $nb_profiles_per_row): ?>
        </div>
        <div class="row <?php echo htmlspecialchars($row_class); ?>">
            <?php endif; ?>

            <?php endforeach; ?>
        </div>
    </div>
</section>
