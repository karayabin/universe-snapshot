<?php

namespace RssUtil\RssWriter;

/*
 * LingTalfi 2015-10-23
 */
use MySimpleXmlElement\MySimpleXmlBuilder;
use MySimpleXmlElement\MySimpleXmlElement;
use RssUtil\RssWriter\Exception\RssWriterException;
use RssUtil\RssWriter\Objects\Channel;
use RssUtil\RssWriter\Objects\ChannelImage;
use RssUtil\RssWriter\Objects\ChannelSkipDays;
use RssUtil\RssWriter\Objects\ChannelSkipHours;

class RssFeedWriterUtil
{


    /**
     * @var Channel
     */
    private $channel;
    private $attributes;
    private $cData;

    public function __construct()
    {
        $this->channels = [];
        $this->cData = [];
        $this->attributes = [
            'version' => '2.0',
        ];
    }

    public static function create()
    {
        return new static();
    }

    public function setChannel(Channel $channel)
    {
        $this->channel = $channel;
        return $this;
    }

    public function setAttribute($key, $value)
    {
        $this->attributes[$key] = $value;
        return $this;
    }

    public function setCDataFields(array $cData)
    {
        $this->cData = $cData;
        return $this;
    }

    /**
     * @return string
     * @throws RssWriterException
     */
    public function render()
    {
        $xml = MySimpleXmlElement::create('rss')->setAttributes($this->attributes);
        $channelElements = [
            'language' => false,
            'copyright' => false,
            'managingEditor' => false,
            'webMaster' => false,
            'pubDate' => false,
            'lastBuildDate' => false,
            'category' => true,
            'generator' => false,
            'docs' => false,
            'cloud' => true,
            'ttl' => false,
            'image' => 0,
            'rating' => false,
            'textInput' => false,
            'skipHours' => 0,
            'skipDays' => 0,
        ];

        $itemElements = [
            'title' => false,
            'link' => false,
            'description' => false,
            'author' => false,
            'category' => true,
            'comments' => false,
            'enclosure' => true,
            'guid' => true,
            'pubDate' => false,
            'source' => true,
        ];


        $channel = $this->channel;

        $c = $xml->createChild('channel');
        $title = $channel->getTitle();
        $link = $channel->getLink();
        $description = $channel->getDescription();
        if (null !== $title) {
            if (null !== $link) {
                if (null !== $description) {


                    $c->createChild('title', $title, in_array('title', $this->cData));
                    $c->createChild('link', $link, in_array('link', $this->cData));
                    $c->createChild('description', $description, in_array('description', $this->cData));


                    //------------------------------------------------------------------------------/
                    // Handling channel elements, one by one
                    //------------------------------------------------------------------------------/
                    foreach ($channelElements as $elName => $type) {
                        if (false === $type) {
                            $method = 'get' . ucfirst($elName);
                            if (null !== ($val = $channel->$method())) {
                                $c->createChild($elName, $val, in_array($elName, $this->cData));
                            }
                        }
                        elseif (true === $type) {
                            $uc = ucfirst($elName);
                            $method = 'get' . $uc;
                            $attrMethod = 'getAttr' . $uc;
                            if (null !== ($val = $channel->$method())) {
                                $child = $c->createChild($elName, $val, in_array($elName, $this->cData));
                                $attrs = $channel->$attrMethod();
                                if ($attrs) {
                                    $child->setAttributes($attrs);
                                }
                            }
                        }
                        elseif (0 === $type) {
                            $method = 'get' . ucfirst($elName);
                            switch ($elName) {
                                case 'image':
                                    $image = $channel->$method();
                                    if (null !== $image) {
                                        /**
                                         * @var ChannelImage $image
                                         */
                                        $url = $image->getUrl();
                                        $title = $image->getTitle();
                                        $link = $image->getLink();
                                        if (null !== $url) {
                                            if (null !== $title) {
                                                if (null !== $link) {

                                                    $im = $c->createChild($elName);
                                                    $im->createChild('url', $url, in_array('img-url', $this->cData));
                                                    $im->createChild('title', $title, in_array('img-title', $this->cData));
                                                    $im->createChild('link', $link, in_array('img-link', $this->cData));

                                                    if (null !== ($val = $image->getWidth())) {
                                                        $im->createChild('width', $image->getWidth());
                                                    }
                                                    if (null !== ($val = $image->getHeight())) {
                                                        $im->createChild('height', $image->getHeight());
                                                    }
                                                    if (null !== ($val = $image->getDescription())) {
                                                        $im->createChild('description', $image->getDescription(), in_array('img-description', $this->cData));
                                                    }
                                                }
                                                else {
                                                    $this->error("channelImage requires a link element");
                                                }
                                            }
                                            else {
                                                $this->error("channelImage requires a title element");
                                            }
                                        }
                                        else {
                                            $this->error("channelImage requires an url element");
                                        }
                                    }
                                    break;
                                case 'skipHours':
                                    $sh = $channel->$method();
                                    if (null !== $sh) {

                                        /**
                                         * @var ChannelSkipHours $sh
                                         */
                                        $hours = $sh->getHours();
                                        if ($hours) {
                                            $sk = $c->createChild($elName);
                                            foreach ($hours as $hour) {
                                                $sk->createChild('hour', $hour);
                                            }
                                        }
                                    }
                                    break;
                                case 'skipDays':
                                    $sd = $channel->$method();
                                    if (null !== $sd) {
                                        /**
                                         * @var ChannelSkipDays $sd
                                         */
                                        $days = $sd->getDays();
                                        if ($days) {
                                            $sk = $c->createChild($elName);
                                            foreach ($days as $day) {
                                                $sk->createChild('day', $day);
                                            }
                                        }
                                    }
                                    break;
                                default:
                                    $this->error("Internal: unknown element: $elName");
                                    break;
                            }
                        }
                        else {
                            // logic error, will likely never happen
                            $this->error("Internal: unknown case of type: $type");
                        }
                    }


                    //------------------------------------------------------------------------------/
                    // Handling Channel items
                    //------------------------------------------------------------------------------/
                    $items = $channel->getItems();
                    foreach ($items as $item) {

                        $xmlItem = $c->createChild('item');

                        $title = $item->getTitle();
                        $description = $item->getDescription();
                        if (null !== $title || null !== $description) {
                            foreach ($itemElements as $elName => $type) {
                                if (false === $type) {
                                    $method = 'get' . ucfirst($elName);
                                    if (null !== ($val = $item->$method())) {
                                        $xmlItem->createChild($elName, $val, in_array('item-' . $elName, $this->cData));
                                    }
                                }
                                elseif (true === $type) {
                                    $uc = ucfirst($elName);
                                    $method = 'get' . $uc;
                                    $attrMethod = 'getAttr' . $uc;
                                    if (null !== ($val = $item->$method())) {
                                        $child = $xmlItem->createChild($elName, $val, in_array('item-' . $elName, $this->cData));
                                        $attrs = $item->$attrMethod();
                                        if ($attrs) {
                                            $child->setAttributes($attrs);
                                        }
                                    }
                                }
                            }
                        }
                        else {
                            $this->error("item requires at least a title or a description element: none given");
                        }
                    }
                }
                else {
                    $this->error("channel requires a description element");
                }
            }
            else {
                $this->error("channel requires a link element");
            }
        }
        else {
            $this->error("channel requires a title element");
        }

        return MySimpleXmlBuilder::create()->render($xml);
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    private function error($m)
    {
        throw new RssWriterException($m);
    }

}
