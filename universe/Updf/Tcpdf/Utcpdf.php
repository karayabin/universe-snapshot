<?php


namespace Updf\Tcpdf;



class Utcpdf extends \TCPDF
{

    protected $footerCallback;


    public function setFooterCallback(\Closure $func)
    {
        $this->footerCallback = $func;
        return $this;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    // Page footer
    public function Footer()
    {

        if (is_callable($this->footerCallback)) {
            call_user_func($this->footerCallback, $this);
        }
    }
}