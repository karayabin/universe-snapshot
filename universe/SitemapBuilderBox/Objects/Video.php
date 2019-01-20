<?php

namespace SitemapBuilderBox\Objects;

/*
 * LingTalfi 2015-10-09
 * https://developers.google.com/webmasters/videosearch/sitemaps
 */
class Video
{

    // required
    public $thumbnailLoc;
    public $title;
    public $description;

    // one of the following at least is required 
    public $contentLoc;
    public $playerLoc;

    // recommended
    public $duration;
    // recommended when applicable
    public $expirationDate;

    // optional
    public $rating;
    public $viewCount;
    public $publicationDate;
    public $familyFriendly;
    public $tag;
    public $category;
    public $restriction;
    public $galleryLoc;
    public $price;
    public $requiresSubscription;
    public $uploader;
    public $platform;
    public $live;


    // attributes
    public $playerLocAttr;
    public $restrictionAttr;
    public $galleryLocAttr;
    public $priceAttr;
    public $uploaderAttr;

    public function __construct()
    {

    }

    public static function create()
    {
        return new self;
    }

    public function setViewCount($viewCount)
    {
        $this->viewCount = $viewCount;
        return $this;
    }

    public function setUploader($uploader, array $attr = null)
    {
        null !== $attr && $this->uploaderAttr = $attr;
        $this->uploader = $uploader;
        return $this;
    }

    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    public function setThumbnailLoc($thumbnailLoc)
    {
        $this->thumbnailLoc = $thumbnailLoc;
        return $this;
    }

    public function setTag($tag)
    {
        $this->tag = $tag;
        return $this;
    }

    public function setRestriction($restriction, array $attr = null)
    {
        null !== $attr && $this->restrictionAttr = $attr;
        $this->restriction = $restriction;
        return $this;
    }

    public function setRequiresSubscription($requiresSubscription)
    {
        $this->requiresSubscription = $requiresSubscription;
        return $this;
    }

    public function setRating($rating)
    {
        $this->rating = $rating;
        return $this;
    }

    public function setPublicationDate($publicationDate)
    {
        $this->publicationDate = $publicationDate;
        return $this;
    }

    public function setPrice($price, array $attr = null)
    {
        null !== $attr && $this->priceAttr = $attr;
        $this->price = $price;
        return $this;
    }

    public function setPlayerLoc($playerLoc, array $attr = null)
    {
        null !== $attr && $this->playerLocAttr = $attr;
        $this->playerLoc = $playerLoc;
        return $this;
    }

    public function setPlatform($platform)
    {
        $this->platform = $platform;
        return $this;
    }

    public function setLive($live)
    {
        $this->live = $live;
        return $this;
    }

    public function setGalleryLoc($galleryLoc, array $attr = null)
    {
        null !== $attr && $this->galleryLocAttr = $attr;
        $this->galleryLoc = $galleryLoc;
        return $this;
    }

    public function setFamilyFriendly($familyFriendly)
    {
        $this->familyFriendly = $familyFriendly;
        return $this;
    }

    public function setExpirationDate($expirationDate)
    {
        $this->expirationDate = $expirationDate;
        return $this;
    }

    public function setDuration($duration)
    {
        $this->duration = $duration;
        return $this;
    }

    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    public function setContentLoc($contentLoc)
    {
        $this->contentLoc = $contentLoc;
        return $this;
    }

    public function setCategory($category)
    {
        $this->category = $category;
        return $this;
    }


}
