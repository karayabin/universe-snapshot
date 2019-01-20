<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Component\FileSystem\FileAggregator;


/**
 * InPoolTagsFileAggregator
 * @author Lingtalfi
 * 2015-03-06
 *
 * This file aggregator matches a file only if each tag of the file is in
 * an arbitrary tag pool.
 *
 *
 */
class InPoolTagsFileAggregator extends TagsFileAggregator
{

    /**
     * @var $tags , the tags pool
     */
    protected $tags;

    public function __construct(array $options = [])
    {
        $options = array_replace([
            'tags' => [],
        ], $options);
        $this->tags = $options['tags'];
        parent::__construct($options);

    }

    
    public function setTags(array $tags)
    {
        $this->tags = $tags;
    }
    
    

    protected function filter(array $tags)
    {
        $ret = false;
        if (empty($tags)) {
            $ret = true;
        }
        else {
            if (!empty($this->tags)) {
                $ret = true;
                foreach ($tags as $tag) {
                    if (!in_array($tag, $this->tags, true)) {
                        $ret = false;
                        break;
                    }
                }
            }
        }
        return $ret;
    }

}
