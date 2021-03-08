<?php


use Ling\Light\Core\Light;
use Ling\Light_CsrfSession\Service\LightCsrfSessionService;


require_once "init.inc.php";






$light = new Light();
$light->setDebug(true);
$light->setContainer($container);
$light->initialize();


/**
 * @var $csrf LightCsrfSessionService
 */
$csrf = $container->get("csrf_session");
$csrfToken = $csrf->getToken();


//$identifier = "user_" . date("Y-m-d");
//
//$user = new  LightWebsiteUser();
//$user->setPseudo("Michel");
//$user->setIdentifier($identifier);
//$user->connect();
//
//
///**
// * @var $userManager LightUserManagerService
// */
//$userManager = $container->get("user_manager");
//$userManager->setUser($user);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Title</title>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css"
          integrity="sha256-UzFD2WYH2U1dQpKDjjZK72VtPeWP50NoJjd26rnAdUI=" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css"
          integrity="sha256-rByPlHULObEjJ6XQxW/flG2r+22R5dKiAoef+aXWfik=" crossorigin="anonymous"/>


    <link rel="stylesheet" href="/libs/universe/Ling/JFileUploader/theme/theme-default.css">


    <link rel="stylesheet" href="/libs/universe/Ling/jCropperJs/cropper.css" crossorigin="anonymous">


</head>


<body>

<img id="some-image" src="" alt="">


<form action="" method="post">
    <div id="file-container" class="fileuploader-widget theme-default"></div>
    <input type="submit" value="Submit"/>


</form>


<script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"
        integrity="sha256-KM512VNnjElC30ehFwehXjx1YCHPiQkOPmqnrWtpccM=" crossorigin="anonymous"></script>

<script src="/libs/universe/Ling/JFileUploader/fileuploader.js"></script>
<script src="/libs/universe/Ling/JFileUploader/lang/lang-eng.js"></script>
<!--<script src="/libs/universe/Ling/JFileUploader/lang/lang-fra.js"></script>-->
<script src="/libs/universe/Ling/JFileUploader/theme/theme-default.js"></script>

<script src="/libs/universe/Ling/jCropperJs/cropper.js" crossorigin="anonymous"></script>
<script src="/libs/universe/Ling/jCropperJs/jquery-cropper.js"></script>
<!--<script src="/libs/cropperjs/main.js"></script>-->


<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet"/>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function () {

        var csrfToken = "<?php echo $csrfToken; ?>";

        var fileUploader = new FileUploader({
            theme: "default",
            container: $("#file-container"),
            urls: [
                "/libs/universe/Ling/Light_Kit_Admin/img/avatars/root_avatar.png",
                "/img/cat.png",
                // "/user-data?id=f1581394664.3162-256",
            ],
            name: "avatar_url",
            maxFile: 5,
            maxFileSize: -1,
            maxFileNameLength: 64,
            mimeType: null,
            serverUrl: "/libs/universe/Ling/JFileUploader/uploader-mocks/upload-success.php",
            serverUrl: "/ajax_file_upload_manager",
            uploadItemExtraFields: {
                id: "lka_user_profile",
                csrf_token: csrfToken,
            },
            immediateUpload: false,
            fileEditor: {
                useFileName: true,
                useCropper: true,
                usePrivacy: true,
                useTags: true,
                //
                allowCustomTags: true,
                fileName: null,
                parentDir: "images",
                availableTags: [
                    "Maurice",
                    "Taekwondo",
                ],
                privacyDefaultValue: 0,
                originalDefaultValue: 0,
                originalFixedValue: 0, // 0 | 1 | null
                tagsMaxLength: 2,
            },
            themeOptions: {
                defaultView: "image",
                // defaultView: "text",
                showHiddenInput: false,

            },
            useFileEditor: true,
        });
        fileUploader.init();


    });
</script>
</body>
</html>