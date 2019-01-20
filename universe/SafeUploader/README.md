SafeUploader
=================
2018-02-26

Secure "server side ajax upload handling" using configuration file.



Same principle as https://github.com/lingtalfi/Upload-Profiles
but with different config values, and concrete implementation tools.




This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import SafeUploader
```

Or just download it and place it where you want otherwise.




Overview
=================
See the ajax-upload-pattern.md file in doc dir of this repository.





The configuration file structure
============================


- `conf`
    - `profiles`, array of profileId => profile, each profile having the following structure
        - `?moveHandler`: callback ( SafeUploader $uploader, array $verifiedPhpFile, array $payload )
            You can handle the moving of the file with a custom callback.
            If you use this technique, then the following properties become obsolete:
            - dir
            - file
            - thumbs

        Note that you can/should use the `setRealUrl` method of the SafeUploader instance,
        and return directly the real url expected by the js handler.
        This is the new way of doing things. It has the benefit that you can execute some action like inserting
        the url in the database, plus you have more control on the path (the default tag system doesn't provide
        a natural mechanism for handling hashed paths for instance like /1/5/8/3/product.png).
        Call setUrl from your moveHandler when you are ready...

            Note: when the moveHandler callback is executed, all checks defined in your profile have been
            verified first, so you can safely upload the file without re-checking for file errors.

        - `?dir`: string=/tmp/SafeUploader

            The dir in which the uploaded file should be put.
            You can pass some data (called payload in this planet) using $_GET along with the file upload,
            and use those data as tags (wrapped with curly brackets).
            For instance, if you pass id=5, you can use the tag "{id}" in your dir path (i.e. /tmp/mypath/{id}).

        - `?file`: string=null,

            If null, will look for the "_file" value in the payload.
            If not defined, then the natural file name will be used.

            If string, will define the file name (it must not be empty).
            It can use tags, like for dir (source for tags is the payload).
            Note that if you use the uploadPhpFile method, the natural name
            of the file ($_FILES[myfile][name]) will be automatically added
            as "_file" in the payload.

        - `?thumbs`: array=[]

            Thumbs only applies if isImage is true.
            It allows you to make copies of the original uploaded image.
            The thumbs are usually smaller than the original, but they could be greater too, depending
            on the image library installed on your system.

            Each item of thumbs is a thumbItem, which has the following structure:
             - `?maxWidth`, if set this will be the maximum width of the image
             - `?maxHeight`, if set this will be the maximum height of the image
             - `?preserveRatio`=true, boolean. If set to false AND both maxWitdth and maxHeight are defined, then
                 maxWidth and maxHeight will actually be the exact width and height of the thumb,
                 it might distort the image.
             - ...more to come later probably (a naming function would be welcome...)

        - `?isImage`: bool=false

            If set and true, will apply special image specific security restrictions to
            the uploaded file (i.e. the image will be regenerated to ensure it does not
            contain a trojan horse).

        - `?maxSize`: string|false=2M

            If false, no maxSize checking will be done
            The maximum size of the uploaded file.
            The following filesize units can be used (case does NOT matter):

            - b: bytes
            - o: octet, alias for bytes
            - k: kilo bytes
            - kb: alias for kilo bytes
            - ko: alias for kilo bytes
            - m: mega bytes
            - mb: alias for mega bytes
            - mo: alias for mega bytes

        - `?returnType`: string|null
            Controls the return of the ajax service.
            This is optional.
            the default value is null, which has the same effect as "path".
            Possible values are the following:
            - path: the file path will be returned
            - url: the url will be returned

            Note: this property is handled at the ajax service level

        - `?absoluteUrl`: bool=true
            Works only if `returnType`'s value is `url`.
            This is optional.
            If true, the returned url will be in absolute form (i.e. with the domain name prefix),
            otherwise it will be in relative form (starting with a forward slash)

            Note: this property is handled at the ajax service level


Playground for SafeUploader
=============================


The example.config.php file contains the following:
```php
<?php


$baseDir = '/tmp/SafeUploader';


$conf = [
    /**
     * profiles: array of profile.
     */
    'profiles' => [
        'ek_seller.image' => [
            /**
             * The dir in which the uploaded file should be put.
             * You can use the inserted data (including auto-incremented key) as part of the dir path,
             * just wrap the column name with curly brackets (for instance {id}).
             *
             */
            'dir' => $baseDir . '/ek_seller/{id}',
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
            /**
            * Controls the return of the ajax service.
            *
            * This is optional.
            * the default value is null, which has the same effect as path.
            * Possible values are the following:
            * - path: the file path will be returned
            * - url: the url will be returned
            */
            'returnType' => 'url',
        ],
    ],
];
```

Another example of config using the moveHandler:

```php
        'cardImage' => [
            'moveHandler' => function (SafeUploader $uploader, array $phpFile, array $payload) {
                if (array_key_exists("product_card_id", $payload)) {
                    $cardId = $payload['product_card_id'];
                    $dstDir = sys_get_temp_dir() . "/safe-uploader";

                    if (!file_exists($dstDir)) {
                        FileSystemTool::mkdir($dstDir, 0777, true);
                    }
                    $dstFile = $dstDir . "/" . $phpFile['name'];
                    if (move_uploaded_file($phpFile['tmp_name'], $dstFile)) {

                        // create thumbnails
                        $o = new ImageLayer();
                        $paths = $o->createImageCopy($dstFile, "cards", $cardId);


                        // now make the ajax service return the medium url
                        foreach ($paths as $path) {
                            if (false !== strpos($path, '/medium/')) {
                                $url = str_replace(A::appDir() . '/www/', '', $path);
                                $url = '/' . ltrim($url, '/');
                                $uploader->setRealUrl($url);
                                break;
                            }
                        }


                    } else {
                        throw new EkomException("Could not move the file with product_card_id=$cardId");
                    }
                } else {
                    throw new EkomException("product card id not defined in payload");
                }
            },
            'isImage' => true,
            'maxSize' => '2M',
            'returnType' => 'url',
        ],
```



And then the main script:


```php
<?php


use Core\Services\A;
use SafeUploader\SafeUploader;

// using kamille framework here (https://github.com/lingtalfi/kamille)
require_once __DIR__ . "/../boot.php";
require_once __DIR__ . "/../init.php";


A::testInit();


$o = SafeUploader::create()
//    ->setErrorMode('exception')
    ->setErrorMode('array')
    ->setConfigurationFile(__DIR__ . "/../class/SafeUploader/assets/example.config.php")
    ->uploadPhpFile("ek_seller.image", null, [
        "id" => 6,
    ]);


a($o->getUploadedFilePath(), $o->getErrors());
a($_POST);
a($_FILES);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>

<body>
Hello there
<form method="post" action=""
      enctype="multipart/form-data"
>

    <input type="file" name="file">
    <input type="submit" value="Envoyer">
</form>
</body>
</html>

```





Example ajax service
=====================================

This example comes from the ekom module (in service/Ekom/ecp/api.php).
It shows the server side script used to handle the ajax upload.
This pattern is explained in more details
in the "/doc/ajax-upload-pattern.md" file of this repository.




```php
        case "upload_handler":
            if (EkomNullosUser::isConnected()) { // only bo feature for now
                if (array_key_exists('profile_id', $_GET)) {


                    $payload = (array_key_exists("payload", $_GET)) ? $_GET['payload'] : [];
                    $profileId = $_GET['profile_id'];
                    /**
                     * return type: null (ekom default) | url (used by trumbowyg
                     */
                    $returnType = array_key_exists("return_type", $_GET) ? $_GET['return_type'] : null;


                    // upload the file
                    $o = SafeUploader::create()
                        ->setErrorMode('array')
                        ->setConfigurationFile(XConfig::get("Ekom.safeUploadConfigFile", null, true))
                        ->uploadPhpFile($profileId, null, $payload);


                    $errors = $o->getErrors();
                    $profile = $o->getProfile();
                    if (null === $returnType) {
                        if (array_key_exists("returnType", $profile)) {
                            $returnType = $profile['returnType'];
                        }
                    }


                    if (count($errors)) {


                        if ('url' === $returnType) {
                            $out = [
                                'success' => false,
                                'url' => "",
                            ];
                        } else {
                            $output->error("The following errors occurred: " . ArrayToStringTool::toPhpArray($errors));
                        }

                    } else {
                        $realPath = $o->getUploadedFilePath();
                        $realPaths = $o->getUploadedFilePaths();


                        if ('url' === $returnType) {

                            $realUrl = $o->getRealUrl();
                            if (null !== $realUrl) {
                                $out = [
                                    'success' => true,
                                    'url' => $realUrl,
                                ];

                            } else {


                                $isFailure = false;
                                $realUrl = $realPath;
                                $webDir = A::appDir() . '/www';
                                if (0 === strpos($realPath, $webDir)) {
                                    $realUrlSuffix = str_replace($webDir, '', $realUrl);
                                    $realUrl = UriTool::uri($realUrlSuffix, [], true, true);
                                } else {
                                    // create a symlink if possible
                                    $extension = FileSystemTool::getFileExtension($realPath);
                                    $uniqueId = HashTool::getRandomHash64();
                                    if ($extension) {
                                        $uniqueId .= '.' . $extension;
                                    }
                                    $realUrl = UriTool::uri('/uploads/' . $uniqueId, [], true, true);
                                    $link = $webDir . "/uploads/$uniqueId";
                                    if (false === symlink($realPath, $link)) {
                                        $isFailure = true;
                                    }
                                }

                                if (false === $isFailure) {

                                    $out = [
                                        'success' => true,
                                        'url' => $realUrl,
                                    ];
                                } else {
                                    $out = [
                                        'success' => false,
                                        'url' => "",
                                    ];
                                }
                            }
                        } else {
                            $out = [
                                'path' => $realPath,
                            ];
                        }


                        $isTmp = false;
                        if (array_key_exists("isTmp", $payload)) {
                            /**
                             * now if it's insert mode,
                             * we also want to save the random string ric into the session.
                             */
                            $isTmp = (bool)$payload['isTmp']; // isTmp is defined and passed by the SokoSafeUploadControl form control
                            if (true === $isTmp) {
                                SafeUploaderHelperTool::setTemporaryValue($profileId, $realPaths, $payload['ric']);
                            }
                        }
                    }
                } else {
                    $output->error("profile_id not found in _GET");
                }
            } else {
                $output->error("ekom nullos user not connected");
            }
            break;
```




When the form is processed, clean the temporary paths
================================

There is only one line to care about:

```php
SafeUploaderHelperTool::fixTemporaryPaths($profileId, implode('-', $ric));
```

But you need to put this line in the correct place.
Here is an example of where this line should be in a morphic implementation
(see the morphic form.config file for more information: https://github.com/lingtalfi/Kamille/blob/master/Utils/Morphic/Generator2/MorphicGenerator2.php )



```php
    // ...
    'process' => function ($fData, SokoFormInterface $form) use ($isUpdate, $id) {

        //--------------------------------------------
        // IF SHOP_ID
        //--------------------------------------------
        $fData['shop_id'] = EkomNullosUser::getEkomValue("shop_id");


        if (false === $isUpdate) {
//            a($_POST);


            $ric = QuickPdo::insert("ek_seller", [
                "name" => $fData['name'],
                "shop_id" => $fData['shop_id'],
            ], '', true);


            $profileId = "test.image";
            SafeUploaderHelperTool::fixTemporaryPaths($profileId, implode('-', $ric)); // this is the only interesting line
            $form->addNotification("Le vendeur a bien été ajouté", "success");
        } else {


            Seller::getInst()->update($fData, [
                "id" => $id,
            ]);
            $form->addNotification("Le vendeur a bien été mis à jour", "success");
        }
        return false;
    },
    // ...
```




History Log
------------------

- 1.2.0 -- 2018-04-29

    - add profile absoluteUri configuration property

- 1.1.0 -- 2018-03-16

    - add SafeUploader.getRealUrl method

- 1.0.0 -- 2018-02-27

    - initial commit