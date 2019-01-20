<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Component\Error\CodifiedErrors\Traits;


/**
 * CodifiedErrorsTrait
 * @author Lingtalfi
 * 2015-02-25
 *
 */
trait CodifiedErrorsTrait
{

    /**
     * @var array of codifiedError.
     *      codifiedError:
     *          0: code
     *          1: plain english message (tags are translated already)
     *          2: raw english message (tags are not translated yet)
     *          3: tags, as passed by the user
     */
    protected $codifiedErrors = [];
    protected $codifiedErrorsBeginTag = '{';
    protected $codifiedErrorsEndTag = '}';

    /**
     * @var array of code => raw error message (with untranslated tags)
     */
    private $codifiedErrorsMap;


    protected function getCodifiedErrors()
    {
        return $this->codifiedErrors;
    }

    protected function setCodifiedErrorsTags($beginTag, $endTag)
    {
        $this->codifiedErrorsBeginTag = $beginTag;
        $this->codifiedErrorsEndTag = $endTag;
    }

    // you should implement this method !
    protected function getCodifiedErrorsMap()
    {
        return [];
    }

    protected function addCodifiedError($code, array $tags = [])
    {
        if (is_string($code)) {
            if (null === $this->codifiedErrorsMap) {
                $this->codifiedErrorsMap = $this->getCodifiedErrorsMap();
            }
            if (array_key_exists($code, $this->codifiedErrorsMap)) {
                $rawMsg = $this->codifiedErrorsMap[$code];
                $msg = $this->getCodifiedErrorMessage($rawMsg, $tags);
                $this->codifiedErrors[] = [$code, $msg, $rawMsg, $tags];
            }
            else {
                throw new \RuntimeException(sprintf("Invalid code: %s", $code));
            }
        }
        else {
            throw new \InvalidArgumentException(sprintf("The code argument must be a string, %s given", gettype($code)));
        }
        return false;
    }

    // need to translate from here, you can override this method if you wan
    protected function getCodifiedErrorMessage($msg, array $tags = [])
    {
        if ($tags) {
            $fTags = [];
            foreach ($tags as $k => $v) {
                $fTags[$this->codifiedErrorsBeginTag . $k . $this->codifiedErrorsEndTag] = $v;
            }
            $msg = str_replace(array_keys($fTags), array_values($fTags), $msg);
        }
        return $msg;
    }

}
