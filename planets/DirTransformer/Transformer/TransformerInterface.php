<?php


namespace DirTransformer\Transformer;

interface TransformerInterface
{
    public function transform(&$content);
}