<?php


namespace Updf\Model;


interface FooterModelInterface extends ModelInterface
{

    public function setPageNumber($n);

    public function setNbTotalPages($n);
}