<?php


namespace Updf\Model;


interface ModelInterface
{
    /**
     * @return array of variables to use with the templates
     */
    public function getVariables();

    /**
     * @return null|string, the name of the font family to use
     *
     * Possible font depend on your tcpdf installation.
     * The 6.2.13 version I used contains the following fonts:
     *
     * cid0cs.php
     * courier.php
     * dejavusans.php
     * dejavusanscondensed.php
     * dejavusansextralight.php
     * dejavusansi.php
     * dejavusansmono.php
     * dejavuserif.php
     * dejavuserifcondensed.php
     * dejavuserifi.php
     * freemono.php
     * freesans.php
     * freeserif.php
     * helvetica.php
     * hysmyeongjostdmedium.php
     * kozgopromedium.php
     * kozminproregular.php
     * msungstdlight.php
     * pdfacourier.php
     * pdfahelvetica.php
     * pdfasymbol.php
     * pdfatimes.php
     * pdfazapfdingbats.php
     * stsongstdlight.php
     * symbol.php
     * times.php
     * uni2cid_ac15.php
     * uni2cid_ag15.php
     * uni2cid_aj16.php
     * uni2cid_ak12.php
     * zapfdingbats.php
     *
     *
     */
    public function getFont();
}