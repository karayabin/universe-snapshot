<?php


namespace Ling\Kit\PageRenderer;


use Ling\Kit\Exception\KitException;


/**
 * The KitPageRendererInterface interface.
 */
interface KitPageRendererInterface
{

    /**
     * Sets the pageConf.
     *
     * @param array $pageConf
     * See more details in the @page(page configuration array) document.
     */
    public function setPageConf(array $pageConf);


    /**
     *
     * Prints the page.
     *
     * @throws KitException
     */
    public function printPage();


    /**
     * Prints a zone.
     *
     * @param string $zoneName
     * @throws KitException
     */
    public function printZone(string $zoneName);

    /**
     * Returns the number of widgets for a given zone.
     *
     * This is used by templates which look depends on the number of widgets.
     *
     * @param string $zoneName
     * @return int
     */
    public function countWidgets(string $zoneName);


}