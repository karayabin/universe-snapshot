<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Component\Template\FileTemplate;


/**
 * FileTemplate
 * @author Lingtalfi
 * 2015-03-07
 *
 */
class FileTemplate implements FileTemplateInterface
{

    protected $template;
    protected $tagSymbol;


    //------------------------------------------------------------------------------/
    // IMPLEMENTS FileTemplateInterface
    //------------------------------------------------------------------------------/
    function __construct($template, array $options = [])
    {
        $options = array_replace([
            'tagSymbol' => '$',
        ], $options);
        $this->template = $template;
        $this->tagSymbol = $options['tagSymbol'];
    }

    public function getContent(array $tags=[])
    {
        if (file_exists($this->template)) {
            $ttags = [];
            foreach ($tags as $tag => $value) {
                $ttags[$this->tagSymbol . $tag . $this->tagSymbol] = $value;
            }
            $content = file_get_contents($this->template);
            return str_replace(array_keys($ttags), array_values($ttags), $content);
        }
        else {
            throw new \RuntimeException(sprintf("File not found: %s", $this->template));
        }
    }
}
