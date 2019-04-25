<?php

namespace Ling\Chloroform\Renderer;


/**
 * The ChloroformRendererInterface interface.
 */
interface ChloroformRendererInterface
{


    /**
     * Returns the html version of the passed chloroform array.
     * The chloroform array is the array returned by the @page(Chloroform toArray) method.
     *
     *
     * @param array $chloroform
     * @return string
     */
    public function render(array $chloroform): string;
}