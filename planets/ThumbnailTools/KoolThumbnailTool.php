<?php

namespace ThumbnailTools;


class KoolThumbnailTool extends ThumbnailTool
{


    protected static function getType2Handlers()
    {
        return [
            IMAGETYPE_JPEG => 'jpg',
            IMAGETYPE_JPEG2000 => 'jpg',
            IMAGETYPE_PSD => 'jpg',
            IMAGETYPE_GIF => 'gif',
            IMAGETYPE_PNG => 'png',
        ];
    }

}
