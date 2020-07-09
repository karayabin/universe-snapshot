<?php


namespace Ling\JumboExploder;


use Ling\JumboExploder\Exception\JumboExploderException;
use Ling\JumboExploder\Iterator\JumboExploderCharIterator;
use Ling\JumboExploder\Scope\JumboExploderScope;

/**
 * The JumboExploder class.
 */
class JumboExploder
{


    /**
     * Parses the given string, and returns an array of strings delimited by the given delimiter.
     *
     * Scopes can be given to hide some content from the parser.
     * See the @page(JumboExploder conception notes) for more details.
     *
     *
     * The options are the following:
     *
     * - trim: bool=true. Whether to trim every returned component.
     *
     *
     *
     * @param string $delimiter
     * @param string $s
     * @param JumboExploderScope[] $scopes
     * @param array $options
     * @return array
     */
    public static function explode(string $delimiter, string $s, array $scopes = [], array $options = []): array
    {

        $trim = $options['trim'] ?? true;

        $ret = [];
        $delimiterFirstChar = $delimiter;
        $delimiterLen = mb_strlen($delimiter);
        if ($delimiterLen > 1) {
            $delimiterFirstChar = substr($delimiter, 0, 1);
        }


        $it = new JumboExploderCharIterator();
        $it->setString($s);;
        $current = '';
        $inScope = false;
        $scopeEnd = null;
        $scopeEndFirstChar = null;
        $scopeEndLen = 1;
        $scopeEscapeChar = null;
        $scopeEscapeCharActive = false;
        while ($c = $it->next()) {

            if (false === $inScope) {


                if ($delimiterFirstChar === $c) {
                    if (
                        (1 === $delimiterLen) ||
                        ($delimiterLen > 1 && $delimiter === substr($it->lookahead($delimiterLen), 0, $delimiterLen))
                    ) {
                        if (true === $trim) {
                            $current = trim($current);
                        }
                        $ret[] = $current;
                        $current = '';

                        // update the pointer if necessary
                        if ($delimiterLen > 1) {
                            $it->next($delimiterLen - 1);
                        }

                    } else {
                        $current .= $c;
                    }
                } else {


                    //--------------------------------------------
                    // consume the scopes
                    //--------------------------------------------
                    foreach ($scopes as $scope) {
                        /**
                         * @var $scope JumboExploderScope
                         */
                        $scopeStart = $scope->getStartExpression();
                        $scopeEnd = $scope->getEndExpression();
                        $scopeEscapeChar = $scope->getEscapeChar();
                        $scopeStartFirstChar = $scopeStart;
                        $scopeEndFirstChar = $scopeEnd;
                        $scopeStartLen = mb_strlen($scopeStart);
                        $scopeEndLen = mb_strlen($scopeEnd);
                        if ($scopeStartLen > 1) {
                            $scopeStartFirstChar = substr($scopeStart, 0, 1);
                        }

                        if ($scopeStartFirstChar === $c) {
                            if (
                                (1 === $scopeStartLen) ||
                                ($scopeStartLen > 1 && $scopeStart === substr($it->lookahead($scopeStartLen), 0, $scopeStartLen))
                            ) {
                                $inScope = true;
                            }
                        }
                    }


                    $current .= $c;
                }
            } else {
                if (true === $scopeEscapeCharActive) {
                    $scopeEscapeCharActive = false;
                    $current .= $c;
                    continue;
                }

                if ($scopeEndFirstChar === $c) {
                    if (
                        (1 === $scopeEndLen) ||
                        ($scopeEndLen > 1 && $scopeEnd === substr($it->lookahead($scopeEndLen), 0, $scopeEndLen))
                    ) {
                        $inScope = false;
                    }
                }

                if (true === $inScope) {
                    if ($scopeEscapeChar === $c) {
                        $scopeEscapeCharActive = true;
                    }
                }
                $current .= $c;
            }
        }

        // don't forget the last component
        if (true === $trim) {
            $current = trim($current);
        }
        $ret[] = $current;


        return $ret;
    }


    /**
     * Returns the substring built from the given chars, starting at the given startIndex and which length is given.
     *
     * @param array $chars
     * @param int $startIndex
     * @param int $length
     * @return string
     */
    private static function lookahead(array $chars, int $startIndex, int $length): string
    {
        $ret = '';
        $endIndex = $startIndex + $length;
        if ($startIndex > $endIndex) {
            throw new JumboExploderException("startIndex cannot be greater than the endIndex.");
        }
        for ($i = $startIndex; $i <= $endIndex; $i++) {
            if (array_key_exists($i, $chars)) {
                $ret .= $chars[$i];
            } else {
                throw new JumboExploderException("Index $i not found in the given chars.");
            }
        }
        return $ret;
    }
}