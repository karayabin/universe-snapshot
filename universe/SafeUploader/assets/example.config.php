<?php


$baseDir = '/tmp/SafeUploader';


$conf = [
    /**
     * profiles: array of profile.
     */
    'profiles' => [
        'test.image' => [
            /**
             * The dir in which the uploaded file should be put.
             * You can pass some data (called payload in this planet) using $_GET along with the file upload,
             * and use those data as tags (wrapped with curly brackets).
             * For instance, if you pass id=5, you can use the tag "{id}" in your dir path (i.e. /tmp/mypath/{id}).
             *
             */
            'dir' => $baseDir . '/ek_seller/{ric}',
            /**
             *
             * If null, will look for the "_file" value in the payload.
             * If not defined, then the natural file name will be used.
             *
             * If string, will define the file name (it must not be empty).
             * It can use tags, like for dir (source for tags is the payload).
             * Note that if you use the uploadPhpFile method, the natural name
             * of the file ($_FILES[myfile][name]) will be automatically added
             * as "_file" in the payload.
             *
             *
             */
            'file' => null,
            /**
             * Thumbs only applies if isImage is true.
             * It allows you to make copies of the original uploaded image.
             * The thumbs are usually smaller than the original, but they could be greater too, depending
             * on the image library installed on your system.
             *
             * Each item of thumbs is a thumbItem, which has the following structure:
             *      - ?maxWidth, if set this will be the maximum width of the image
             *      - ?maxHeight, if set this will be the maximum height of the image
             *      - ?preserveRatio=true, boolean. If set to false AND both maxWitdth and maxHeight are defined, then
             *                          maxWidth and maxHeight will actually be the exact width and height of the thumb,
             *                          it might distort the image.
             *                          Note: in the current version, this setting doesn't work,
             *                          and the ratio is always preserved.
             *
             * @todo-ling: make the preserveRatio setting work
             *
             *      - ?dir: string|null
             *                  If empty, the directory of the thumb will be the same as the dir of the original image.
             *                  If string, defines the directory of the thumb.
             *                  The string can use the same tags as the original image's dir configuration (see above),
             *                  plus the tags available for thumbs (see below).
             *                  Note: the dir part can contain slashes (i.e. creating subdirectories)
             *
             *
             *      - ?name: string=null
             *              Defines the thumb base name.
             *              If string, will be the thumb base name.
             *                  The string can use the same tags as the original image's file configuration (see above),
             *                  plus the tags available for thumbs (see below)
             *
             *              If null, is equivalent to having the following string:
             *
             *                      {baseName}-{maxWidth}x{maxHeight}.{extension}
             *
             *
             *
             *      - ...more to come maybe?
             *
             *
             * The following tags are available to thumbnails:
             *          - {maxWidth}, int version of the maxWidth parameter
             *          - {maxHeight}, int version of the maxHeight parameter
             *          - {dir}, the original dir name
             *          - {fileName}, the original file name
             *          - {baseName}, the original file name without the very last extension
             *          - {extension}, the extension of the original file name
             *
             *
             *
             */
            'thumbs' => [
                [
                    "maxWidth" => 3000,
                    "maxHeight" => 1000,
                ],
                [
                    "maxWidth" => 500,
                    "maxHeight" => 500,
                ],
                [
                    "name" => "boris",
                    "maxWidth" => 500,
                    "maxHeight" => 500,
                ],
                [
                    "dir" => "{dir}/thumbs",
                    "name" => "boris--{maxWidth}x{maxHeight}.{extension}",
                    "maxWidth" => 500,
                    "maxHeight" => 500,
                ],
            ],
            /**
             * If set and true, will apply special security restrictions to the uploaded file
             */
            'isImage' => true,
            /**
             * The maximum size of the uploaded file.
             * The following filesize units can be used (case does NOT matter):
             *
             * - b: bytes
             * - o: octet, alias for bytes
             * - k: kilo bytes
             * - kb: alias for kilo bytes
             * - ko: alias for kilo bytes
             * - m: mega bytes
             * - mb: alias for mega bytes
             * - mo: alias for mega bytes
             *
             *
             */
            'maxSize' => '2M',
            /**
             * Defines the accepted mime types.
             *
             * if empty, all mime types are accepted
             * Can be a string, or an array of strings otherwise, or null.
             * Default=null.
             * Wild card is allowed in the second part of the mime type (after the slash)
             */
            'acceptedMimeType' => null,
        ],
    ],
];