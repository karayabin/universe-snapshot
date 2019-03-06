<?php


namespace Ling\DirTransformer\Transformer;

interface TransformerInterface
{
    public function transform(&$content);
}