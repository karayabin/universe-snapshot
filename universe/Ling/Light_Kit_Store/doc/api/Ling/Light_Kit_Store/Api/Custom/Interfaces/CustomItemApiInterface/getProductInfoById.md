[Back to the Ling/Light_Kit_Store api](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store.md)<br>
[Back to the Ling\Light_Kit_Store\Api\Custom\Interfaces\CustomItemApiInterface class](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Custom/Interfaces/CustomItemApiInterface.md)


CustomItemApiInterface::getProductInfoById
================



CustomItemApiInterface::getProductInfoById — Returns information about the product.




Description
================


abstract public [CustomItemApiInterface::getProductInfoById](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Custom/Interfaces/CustomItemApiInterface/getProductInfoById.md)(int $itemId, ?array $options = []) : array




Returns information about the product.

The returned fields are:

- id
- label
- slug
- description
- reference
- price_in_euro
- screenshots: array of items, each of which:
     - type: string identifying the type of video. Can be one of:
            - photo
            - video/mp4
            - video/youtube

     - url: url of the video/mp4 or photo. For photo, it's the url of the medium size. For the video/mp4, it's the url of the video.
     - thumb: url of the thumb (only if type=photo or type= video/mp4)
     - large: url of the large photo (only if type=photo)
     - poster: url of the poster (only if type=video/mp4)
     - videoId: the id of the youtube video (only if type=video/youtube)

- author_label: string, the author label
- author_name: string, the author name
- ratings, string|null: a csv string where each components is a rating/nb_rating colon separated key/value pair (i.e., 1:2, 2:2, 3:1, 5:4)
- avg_rating: the average rating value for this item, or null if this item has no rating
- avg_rating: string|null, the average rating value for this item, or null if this item has no rating
- nb_ratings: string|null, the number of ratings on this item, or null if no ratings


Available options are:
- imageSizes: bool=false. If true, the screenshots array items are augmented with the following properties for type=photo:
     - largeWidth: width of the large image in pixel, or 0 if the file is not found
     - largeHeight: height of the large image in pixel, or 0 if the file is not found




Parameters
================


- itemId

    

- options

    


Return values
================

Returns array.








Source Code
===========
See the source code for method [CustomItemApiInterface::getProductInfoById](https://github.com/lingtalfi/Light_Kit_Store/blob/master/Api/Custom/Interfaces/CustomItemApiInterface.php#L118-L118)


See Also
================

The [CustomItemApiInterface](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Custom/Interfaces/CustomItemApiInterface.md) class.

Previous method: [getProductListItems](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Custom/Interfaces/CustomItemApiInterface/getProductListItems.md)<br>

