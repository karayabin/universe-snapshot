<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Component\Lang\Translator;


use BeeFramework\Component\Lang\Translator\Catalog\CatalogInterface;
use BeeFramework\Component\Lang\Translator\CatalogLoader\CatalogLoaderInterface;
use BeeFramework\Component\Lang\Translator\Number2PluralFormIndexAdaptor\Number2PluralFormIndexAdaptor;
use BeeFramework\Component\Log\SuperLogger\SuperLogger;


/**
 * Translator.
 * @author Lingtalfi
 *
 */
class Translator implements TranslatorInterface
{


    /**
     * @var Number2PluralFormIndexAdaptor
     */
    protected $number2Pfi;
    /**
     * @var CatalogLoaderInterface
     */
    protected $catalogLoader;


    protected $catalogs;
    protected $options;


    public function __construct(CatalogLoaderInterface $catalogLoader, $options = [])
    {
        $this->options = array_replace([
            'defaultLang' => 'eng',
            'allowRecovery' => true,
        ], $options);
        $this->catalogLoader = $catalogLoader;
        $this->number2Pfi = new Number2PluralFormIndexAdaptor();
        $this->catalogs = [];
    }


    //------------------------------------------------------------------------------/
    // IMPLEMENTS TranslatorInterface
    //------------------------------------------------------------------------------/
    /**
     * @see TranslatorInterface
     * @return string: if the translation is not found, the $tId is returned unmodified
     *
     */
    public function translate($msgId, $catalogInfo = null, array $tags = null, $pluralNumber = null, $lang = null)
    {
        if (null === $lang) {
            $lang = $this->options['defaultLang'];
        }
        $realMsgId = '__not_set__';
        $catalogId = null;
        $notFound = false;

        if ($lang) {
            $realMsgId = trim($msgId);
            /**
             * Converting catalogInfo to catalogId
             */

            if (is_object($catalogInfo)) {
                $catalogId = str_replace('\\', '/', get_class($catalogInfo));
            } else {
                // assuming it's a string
                $catalogId = $catalogInfo;
            }

            $catalogKey = $catalogId . $lang;
            $catalog = false;



            if (array_key_exists($catalogKey, $this->catalogs)) {
                $catalog = $this->catalogs[$catalogKey];
            } elseif (false !== $catalog = $this->catalogLoader->load($catalogId, $lang)) {
                $this->catalogs[$catalogKey] = $catalog;
            }

            if ($catalog instanceof CatalogInterface) {
                $pluralFormIndex = 0;
                if (null !== $pluralNumber) {
                    $pluralFormIndex = $this->number2Pfi->get($pluralNumber, $lang);
                }
                if (false !== $msg = $catalog->getTranslation($realMsgId, $pluralFormIndex)) {
                    if (is_array($tags) && $tags) {
                        $keys = array_map(function ($v) {
                            return '{' . $v . '}';
                        }, array_keys($tags));
                        $msg = str_replace($keys, $tags, $msg);
                    }
                    return $msg;
                } else {
                    $notFound = true;
                    $this->notFound('msg', sprintf("translation not found with msgId: %s and catalog %s in lang: %s", $realMsgId, $catalogId, $lang));
                }
            } else {
                $notFound = true;
                $this->notFound('catalog', sprintf("Catalog not found with id: %s and lang: %s", $catalogId, $lang));
            }
        } else {
            $notFound = true;
            $this->notFound('lang', "Undefined lang");
        }

        // do we try to recover a not found msg?
        if (true === $notFound && true === $this->options['allowRecovery']) {
            if (null === $catalogId) {
                $catalogId = '__not_set__';
            }
            $r = $this->onTranslationNotFound([
                'msgId' => $msgId,
                'realMsgId' => $realMsgId,
                'catalogInfo' => $catalogInfo,
                'catalogId' => $catalogId,
                'lang' => $lang,
                'pluralNumber' => $pluralNumber,
                'tags' => $tags,
            ]);
            if (is_string($r)) {
                return $r;
            }
        }
        return $msgId;
    }

    public function setDefaultLang($lang)
    {
        $this->options['defaultLang'] = $lang;
    }

    //------------------------------------------------------------------------------/
    //
    //------------------------------------------------------------------------------/
    protected function notFound($id, $msg)
    {
        SuperLogger::getInst()->log('translator.notFound.' . $id, $msg);
    }

    /**
     * @param array $info :
     * - msgId
     * - catalogId
     * - locale
     * - pluralNumber
     * - tags
     */
    protected function onTranslationNotFound(array $info)
    {

    }

}
