<?php


$items = $z['items'] ?? [];

?>


.carousel-item {
    height: 450px;
}


<?php
$cpt = 1;
foreach($items as $item): ?>
.carousel-image-<?php echo $cpt++; ?> {
    background: url("<?php echo htmlspecialchars($item['img_url']); ?>");
    background-size: cover;
}

<?php endforeach; ?>
