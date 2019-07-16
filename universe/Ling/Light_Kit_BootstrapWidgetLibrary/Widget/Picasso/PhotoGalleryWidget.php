<?php


namespace Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso;


use Ling\Kit_PicassoWidget\Widget\PicassoWidget;


/**
 * The PhotoGalleryWidget class.
 */
class PhotoGalleryWidget extends PicassoWidget
{

    /**
     * @overrides
     */
    public function __construct()
    {
        parent::__construct();
        $this->registerLibrary('ekko', [
            'https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css',
        ], [
            'https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js',
        ]);
    }


}