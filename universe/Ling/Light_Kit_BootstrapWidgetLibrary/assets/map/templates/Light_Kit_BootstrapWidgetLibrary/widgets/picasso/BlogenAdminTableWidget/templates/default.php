<?php


/**
 * @var $this PicassoWidget
 */


use Ling\Kit_PicassoWidget\Widget\PicassoWidget;

$title = $z['title'] ?? "";
$table_class = $z['table_class'] ?? "";
$table_head_class = $z['table_head_class'] ?? "";
$columns = $z['columns'] ?? [];
$rows = $z['rows'] ?? [];
$pagination_always_visible = $z['pagination_always_visible'] ?? false;
$pagination_nb_pages = $z['pagination_nb_pages'] ?? 1;
$pagination_link_format = $z['pagination_link_format'] ?? "";
$pagination_selected_page = $z['pagination_selected_page'] ?? 1;
$pagination_show_prev = $z['pagination_show_prev'] ?? true;
$pagination_show_next = $z['pagination_show_next'] ?? true;
$pagination_prev_text = $z['pagination_prev_text'] ?? "Previous";
$pagination_next_text = $z['pagination_next_text'] ?? "Next";


//
$link = function ($i) use ($pagination_link_format) {
    return str_replace('{page}', $i, $pagination_link_format);
};

?>
<section class="kit-bwl-blogen_admin_table <?php echo htmlspecialchars($this->getCssClass()); ?>"
    <?php echo $this->getAttributesHtml(); ?>
>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <?php if ($title): ?>
                        <div class="card-header">
                            <h4><?php echo $title; ?></h4>
                        </div>
                    <?php endif; ?>
                    <table class="table <?php echo htmlspecialchars($table_class); ?>">
                        <thead class="<?php echo htmlspecialchars($table_head_class); ?>">
                        <tr>
                            <?php foreach ($columns as $column): ?>
                                <th><?php echo $column; ?></th>
                            <?php endforeach; ?>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($rows as $row): ?>
                            <tr>
                                <?php foreach ($row as $value): ?>
                                    <td><?php echo $value; ?></td>
                                <?php endforeach; ?>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>


                    <?php if (true === $pagination_always_visible || $pagination_nb_pages > 1): ?>
                        <!-- PAGINATION -->
                        <nav class="ml-4">
                            <ul class="pagination">

                                <?php if (true === $pagination_show_prev):
                                    $sDisabled = (1 === $pagination_selected_page) ? 'disabled' : '';
                                    $prevPage = $pagination_selected_page - 1;
                                    if ($prevPage < 1) {
                                        $prevPage = 1;
                                    }
                                    $url = $link($prevPage);
                                    ?>
                                    <li class="page-item <?php echo $sDisabled; ?>">
                                        <a href="<?php echo htmlspecialchars($url); ?>"
                                           class="page-link"><?php echo $pagination_prev_text; ?></a>
                                    </li>
                                <?php endif; ?>


                                <?php for ($i = 1; $i <= $pagination_nb_pages; $i++):
                                    $sActive = ($i === (int)$pagination_selected_page) ? 'active' : '';
                                    $url = $link($i);
                                    ?>
                                    <li class="page-item <?php echo $sActive; ?>">
                                        <a href="<?php echo htmlspecialchars($url); ?>"
                                           class="page-link"><?php echo $i; ?></a>
                                    </li>
                                <?php endfor; ?>

                                <?php if (true === $pagination_show_next):
                                    $sDisabled = ($pagination_nb_pages === $pagination_selected_page) ? 'disabled' : '';
                                    $nextPage = $pagination_selected_page + 1;
                                    if ($nextPage > $pagination_nb_pages) {
                                        $nextPage = $pagination_nb_pages;
                                    }
                                    $url = $link($nextPage);

                                    ?>
                                    <li class="page-item <?php echo $sDisabled; ?>">
                                        <a href="<?php echo htmlspecialchars($url); ?>"
                                           class="page-link"><?php echo $pagination_next_text; ?></a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </nav>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
</section>