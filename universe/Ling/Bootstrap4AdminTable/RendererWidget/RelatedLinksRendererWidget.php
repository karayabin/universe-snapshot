<?php


namespace Ling\Bootstrap4AdminTable\RendererWidget;


/**
 * The RelatedLinksRendererWidget class.
 */
class RelatedLinksRendererWidget extends AbstractOpenAdminTableRendererWidget implements RelatedLinksRendererWidgetInterface
{


    /**
     * This property holds the links for this instance.
     * Each link is an array:
     * - text: the label of the link
     * - url: the url of the link
     * - ?icon: the css class of the icon if any
     *
     *
     * @var array
     */
    protected $links;


    /**
     * Builds the RelatedLinksRendererWidget instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this->links = [];
    }


    /**
     * @implementation
     */
    public function render()
    {
        ?>
        <ul class="list-unstyled">
        <?php if ($this->links): ?>
        <?php foreach ($this->links as $link): ?>
            <li>
                <a href="<?php echo htmlspecialchars($link['url']); ?>">
                    <?php if (array_key_exists('icon', $link) && $link['icon']): ?>
                        <i class="<?php echo $link['icon']; ?>"></i>
                    <?php endif; ?>
                    <?php echo $link['text']; ?>
                </a>
            </li>
        <?php endforeach; ?>
        </ul>
    <?php endif; ?>
        <?php
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Sets the links.
     *
     * @param array $links
     */
    public function setLinks(array $links)
    {
        $this->links = $links;
    }
}