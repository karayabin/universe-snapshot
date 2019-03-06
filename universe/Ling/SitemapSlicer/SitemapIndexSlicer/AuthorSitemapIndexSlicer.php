<?php

namespace Ling\SitemapSlicer\SitemapIndexSlicer;

/*
 * LingTalfi 2015-10-10
 */
use Ling\Bat\FileSystemTool;
use Ling\SitemapBuilderBox\Builder\XmlSitemapBuilder;
use Ling\SitemapBuilderBox\Builder\XmlSitemapBuilderPlugin\GoogleImageXmlSitemapBuilderPlugin;
use Ling\SitemapBuilderBox\Builder\XmlSitemapBuilderPlugin\GoogleMobileXmlSitemapBuilderPlugin;
use Ling\SitemapBuilderBox\Builder\XmlSitemapBuilderPlugin\GoogleVideoXmlSitemapBuilderPlugin;
use Ling\SitemapBuilderBox\Objects\SitemapIndex;
use Ling\SitemapBuilderBox\Objects\SitemapIndexSitemap;
use Ling\SitemapSlicer\SitemapRecipient\AuthorSitemapRecipient;
use Ling\SitemapSlicer\SitemapSlice\SitemapSliceInterface;

class AuthorSitemapIndexSlicer implements SitemapIndexSlicerInterface
{
    private $filePath;
    /**
     * @var SitemapSliceInterface[]
     */
    private $slices;
    private $_defaultSliceWidth;
    private $_maxSitemapEntries;
    private $_onWarning;
    private $urlCb;


    // internal
    /**
     * @var XmlSitemapBuilder
     */
    private $__builder;
    /**
     * @var SitemapIndex
     */
    private $__sitemapIndex;
    private $__urlCb;


    public function __construct()
    {
        $this->slices = [];
        $this->_defaultSliceWidth = 10000;
        $this->_maxSitemapEntries = 50000;
    }


    /**
     * @return AuthorSitemapIndexSlicer
     */
    public static function create()
    {
        return new static();
    }

    /**
     * @return AuthorSitemapIndexSlicer
     */
    public function file($filePath)
    {
        FileSystemTool::touchDone($filePath); // get rid of perms problem right away
        $this->filePath = $filePath;
        return $this;
    }

    /**
     * string:url       f ( string:filePath )
     */
    public function url(callable $f)
    {
        $this->urlCb = $f;
        return $this;
    }

    /**
     * @return AuthorSitemapIndexSlicer
     */
    public function defaultSliceWidth($n)
    {
        $this->_defaultSliceWidth = (int)$n;
        return $this;
    }

    /**
     * @return AuthorSitemapIndexSlicer
     */
    public function onWarning(callable $f)
    {
        $this->_onWarning = $f;
        return $this;
    }


    /**
     * @return AuthorSitemapIndexSlicer
     */
    public function addSitemapSlice(SitemapSliceInterface $slice)
    {
        $this->slices[] = $slice;
        return $this;
    }


    public function execute()
    {

        $this->__builder = $this->getSiteMapBuilder();
        $this->__sitemapIndex = SitemapIndex::create();
        $this->__urlCb = (is_callable($this->urlCb)) ? $this->urlCb : function ($filePath) {
            return 'http://dummy.com/' . basename($filePath);
        };


        if ($this->slices) {

            foreach ($this->slices as $slice) {


                $sliceWidth = (null !== $slice->getSliceWidth()) ? (int)$slice->getSliceWidth() : $this->_defaultSliceWidth;


                try {

                    $recipient = new AuthorSitemapRecipient();
                    $recipient->setFile($slice->getFile());
                    $recipient->setMaxSitemapEntries($this->_maxSitemapEntries);
                    $recipient->listenTo('onNewSitemapCreated', function ($fileName) {
                        $this->onNewSitemapCreated($fileName);
                    });
                    $recipient->start();


                    $bindures = $slice->getTableBindures();
                    foreach ($bindures as $bIndex => $b) {


                        $nbItems = (int)$b->getCount();
                        $rowsCb = $b->getRowsCallback();
                        $convert = $b->getConvertToSitemapEntryCallback();

                        $hasNextRowsSlice = true;
                        $tableOffset = 0;
                        while ($hasNextRowsSlice) {
                            /**
                             * Process the rows slice
                             */
                            $rows = call_user_func($rowsCb, $tableOffset, $sliceWidth);
                            if (is_array($rows)) {
                                $tableOffset += $sliceWidth;
                                $hasNextRowsSlice = ($tableOffset < $nbItems);


                                foreach ($rows as $rIndex => $row) {
                                    $sitemapEntry = call_user_func($convert, $row);
                                    $recipient->addSitemapEntry($sitemapEntry);
                                }
                            }
                            else {
                                $this->warning(sprintf("Invalid rows type, expected array, %s given", gettype($rows)));
                                $hasNextRowsSlice = false; // exit the loop
                            }
                        }
                    }

                    $recipient->end();


                } catch (\Exception $e) {
                    $this->warning((string)$e);
                }
            }
        }
        $this->__builder->createSitemapIndexFile($this->__sitemapIndex, $this->filePath);
    }




    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    public function maxSitemapEntries($n)
    {
        $this->_maxSitemapEntries = (int)$n;
        return $this;
    }


    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    private function warning($m)
    {
        if (is_callable($this->_onWarning)) {
            call_user_func($this->_onWarning, $m);
        }
    }

    /**
     * @return XmlSitemapBuilder
     */
    private function getSiteMapBuilder()
    {
        $o = new XmlSitemapBuilder();
        $o->registerPlugin(new GoogleVideoXmlSitemapBuilderPlugin());
        $o->registerPlugin(new GoogleImageXmlSitemapBuilderPlugin());
        $o->registerPlugin(new GoogleMobileXmlSitemapBuilderPlugin());
        return $o;
    }

    private function onNewSitemapCreated($fileName)
    {
        $url = call_user_func($this->__urlCb, $fileName);
        $map = SitemapIndexSitemap::create();
        $map->setLoc($url);
        $map->setLastmod(date('c'));
        $this->__sitemapIndex->addSitemap($map);
    }


}
