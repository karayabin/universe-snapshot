<?php


/**
 * @var $this PicassoWidget
 */


use Ling\Kit_PicassoWidget\Widget\PicassoWidget;

$column_class = $z['column_class'] ?? "col-md-4";
$non_initial_row_class = $z['non_initial_row_class'] ?? "mt-2";
$nb_cards_per_row = $z['nb_cards_per_row'] ?? 3;
$cards = $z['cards'] ?? [];


$cardsCpt = 0;

?>

<section class="kit-bwl-blog_cards default <?php echo htmlspecialchars($this->getCssClass()); ?>"
    <?php echo $this->getAttributesHtml(); ?>
>
    <div class="container">
        <div class="row">

            <?php foreach ($cards

            as $card):

            $cardsCpt++;

            $card_class = $card['card_class'] ?? '';
            $img_url = $card['img_url'] ?? '';
            $img_alt = $card['img_alt'] ?? '';
            $title = $card['title'] ?? '';
            $subtitle = $card['subtitle'] ?? '';
            $text = $card['text'] ?? '';
            $quote_text = $card['quote_text'] ?? '';
            $quote_author = $card['quote_author'] ?? '';
            $quote_author_class = $card['quote_author_class'] ?? '';


            ?>

            <div class="<?php echo htmlspecialchars($column_class); ?>">
                <div class="card <?php echo htmlspecialchars($card_class); ?>">

                    <?php if ($img_url): ?>
                        <img src="<?php echo htmlspecialchars($img_url); ?>"
                             alt="<?php echo htmlspecialchars($img_alt); ?>"
                             class="img-fluid card-img-top">
                    <?php endif; ?>


                    <?php if ($title || $subtitle || $text): ?>
                        <div class="card-body">
                            <?php if ($title): ?>
                                <h4 class="card-title"><?php echo $title; ?></h4>
                            <?php endif; ?>

                            <?php if ($subtitle): ?>
                                <small class="text-muted"><?php echo $subtitle; ?></small>
                            <?php endif; ?>

                            <?php if ($title || $subtitle): ?>
                                <hr>
                            <?php endif; ?>

                            <?php if ($text): ?>
                                <p class="card-text"><?php echo $text; ?></p>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>


                    <?php if ($quote_text || $quote_author): ?>
                        <blockquote class="card-blockquote card-body">
                            <?php if ($quote_text): ?>
                                <p><?php echo $quote_text; ?></p>
                            <?php endif; ?>

                            <?php if ($quote_author): ?>
                                <footer class="blockquote-footer">
                                    <small class="<?php echo htmlspecialchars($quote_author_class); ?>"><?php echo $quote_author; ?></small>
                                </footer>
                            <?php endif; ?>
                        </blockquote>
                    <?php endif; ?>

                </div>
            </div>

            <?php if ($cardsCpt === $nb_cards_per_row):
            $cardsCpt = 0;
            ?>
        </div>
        <div class="row <?php echo htmlspecialchars($non_initial_row_class); ?>">
            <?php endif; ?>

            <?php endforeach; ?>
        </div>

    </div>
</section>
