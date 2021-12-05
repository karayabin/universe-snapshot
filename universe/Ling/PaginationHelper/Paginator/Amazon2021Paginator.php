<?php


namespace Ling\PaginationHelper\Paginator;

use Ling\PaginationHelper\Exception\PaginationHelperException;

/**
 * The Amazon2021Paginator interface.
 *
 * With this paginator, I try to reproduce the amazon pagination system as of 2021-07-09.
 *
 * It basically shows 3 main links, with the center link representing the current page number.
 * The last page number is displayed to the right of the widget, but it's not a link.
 *
 * From page 5 and up, a first page link appears to the left of the widget.
 *
 * The previous and next buttons are placed on each side of the widget.
 *
 * For the first 5 pages, all the links are displayed.
 *
 *
 * I'm using the bootstrap framework.
 *
 *
 */
class Amazon2021Paginator implements PaginatorInterface
{


    /**
     * This property holds the iconFlavour for this instance.
     * @var string
     */
    protected string $iconFlavour;

    /**
     * This property holds the activeClass for this instance.
     * @var string = active
     */
    protected string $activeClass;

    /**
     * This property holds the size for this instance.
     * It can be one of:
     *
     * - sm
     * - md (default)
     * - lg
     *
     *
     * @var string
     */
    protected string $size;

    /**
     * This property holds the _linkFormat for this instance.
     * @var string
     */
    private string $_linkFormat;


    /**
     * Builds the Amazon2021Paginator instance.
     */
    public function __construct()
    {
        $this->iconFlavour = "bootstrap";
        $this->activeClass = "active";
        $this->size = "md";
        $this->_linkFormat = '';
    }

    /**
     * Sets one or more properties.
     * Available properties are (description in the corresponding class property):
     *
     * - size = md
     * - activeClass = active
     * - iconFlavour = bootstrap
     *
     *
     *
     * @param array $properties
     */
    public function setProperties(array $properties)
    {
        foreach ($properties as $k => $v) {
            if (isset($this->$k)) {
                $this->$k = $v;
            }
        }
    }


    /**
     * @implementation
     */
    public function render(int $page, int $nbPages, string $linkFormat): string
    {
        $this->_linkFormat = $linkFormat;

        switch ($this->iconFlavour) {
            case "bootstrap":
                $icons = [
                    "arrowLeft" => "bi bi-arrow-left",
                    "arrowRight" => "bi bi-arrow-right",
                ];
                break;
            default:
                throw new PaginationHelperException("Unknown iconFlavour: " . $this->iconFlavour);
        }


        $previousDisabled = (1 === $page);
        $nextDisabled = ($nbPages === $page);
        $showFirstLinkAlone = ($page > 5);

        if ($page > 1) {
            if ($nbPages === $page) {
                $pageMax = $nbPages;
                $pageMin = $pageMax - 2;

            } else {
                if ($page <= 5) {
                    $pageMin = 1;
                    $pageMax = $page;
                    if (2 === $pageMax) {
                        $pageMax = 3;
                    }
                } else {
                    $pageMin = $page - 1;
                    $pageMax = $page + 1;
                }
            }
        } else {
            $pageMin = 1;
            $pageMax = 3;
        }

        $previousPage = $page - 1;
        if ($previousPage < 1) {
            $previousPage = 1;
        }

        $nextPage = $page + 1;
        if ($nextPage > $nbPages) {
            $nextPage = $nbPages;
        }


        ob_start();
        ?>
        <nav>


            <ul class="pagination pagination-<?php echo $this->size; ?>">


                <?php if (true === $previousDisabled): ?>
                    <li class="page-item disabled">
                        <span class="page-link">
                            <i class="<?php echo $icons['arrowLeft']; ?>"></i>
                            Previous</span>
                    </li>
                <?php else: ?>
                    <li class="page-item">
                        <a class="page-link" href="<?php echo $this->link($previousPage); ?>">
                            <i class="<?php echo $icons['arrowLeft']; ?>"></i>
                            Previous</a>
                    </li>
                <?php endif; ?>



                <?php if (true === $showFirstLinkAlone): ?>
                    <li class="page-item"><a class="page-link" href="<?php echo $this->link(1); ?>">1</a></li>
                    <li class="mx-3">...</li>
                <?php endif; ?>


                <!-- MAIN LINKS -->
                <?php for ($i = $pageMin; $i <= $pageMax; $i++): ?>
                    <?php if ($page === $i): ?>
                        <li class="page-item active" aria-current="page">
                            <span class="page-link"><?php echo $i; ?></span>
                        </li>
                    <?php else: ?>
                        <li class="page-item"><a class="page-link"
                                                 href="<?php echo $this->link($i); ?>"><?php echo $i; ?></a></li>
                    <?php endif; ?>
                <?php endfor; ?>


                <?php if ($pageMax < $nbPages): ?>
                    <li class="mx-3">...</li>
                    <li class="page-item disabled">
                        <span class="page-link"><?php echo $nbPages; ?></span>
                    </li>
                <?php endif; ?>


                <?php if (true === $nextDisabled): ?>
                    <li class="page-item disabled">
                        <span class="page-link">Next
                        <i class="<?php echo $icons['arrowRight']; ?>"></i>
                        </span>
                    </li>
                <?php else: ?>
                    <li class="page-item">
                        <a class="page-link" href="<?php echo $this->link($nextPage); ?>">Next
                            <i class="<?php echo $icons['arrowRight']; ?>"></i>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
        <?php

        return ob_get_clean();
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Returns the html escaped url for a given page number.
     * @param int $pageNumber
     * @return string
     */
    protected function link(int $pageNumber): string
    {
        return htmlspecialchars(str_replace("{page}", $pageNumber, $this->_linkFormat));
    }
}