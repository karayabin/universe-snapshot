<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Component\String\ParentsAwareMarkupParser\ParentsAwareMarkupParser\Adaptor;


/**
 * CombinedTagsConsoleParentsAwareMarkupParserAdaptor
 * @author Lingtalfi
 * 2015-05-21
 *
 * This adaptor allows for tag combination using the colon (:) separator.
 * For instance, this is possible:
 *
 * <red:blackBg>This text is red, with black background</red:blackBg>
 *
 *
 *
 *
 *
 */
abstract class CombinedTagsConsoleParentsAwareMarkupParserAdaptor extends ConsoleParentsAwareMarkupParserAdaptor
{

    /**
     * @param string $identifier
     * @return bool, whether or not the given identifier is valid (is it actually interpreted by the concrete notation?)
     */
    protected function checkIdentifier($identifier)
    {
        if (false !== strpos($identifier, ':')) {
            $p = explode(':', $identifier);
            foreach ($p as $_id) {
                if (!array_key_exists($_id, $this->formatCodes)) {
                    return false;
                }
            }
        }
        else {
            return (array_key_exists($identifier, $this->formatCodes));
        }
        return true;
    }

    /**
     * @param array $parents
     * @return array of format codes
     */
    protected function getFormatCodesByParents(array $parents)
    {
        $formats = [];
        foreach ($parents as $identifier) {
            if (false !== strpos($identifier, ':')) {
                $p = explode(':', $identifier);
                foreach ($p as $_alias) {
                    if (array_key_exists($_alias, $this->formatCodes)) {
                        $formats[] = $this->formatCodes[$_alias];
                    }
                }
            }
            else {
                if (array_key_exists($identifier, $this->formatCodes)) {
                    $formats[] = $this->formatCodes[$identifier];
                }
            }
        }
        if ($formats) {
            return $this->escapeSequence . "[" . implode(';', $formats) . "m";
        }
        return '';
    }
}
