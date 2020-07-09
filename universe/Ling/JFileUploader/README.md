JFileUploader
===========
2019-11-25 -> 2020-06-04



Js file uploader is a javascript tool to help uploading files to a server.


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/JFileUploader
```

Or just download it and place it where you want otherwise.










Table of Contents
=================

* [JFileUploader overview](#jfileuploader-overview)
* [The main idea](#the-main-idea)
* [The file manager protocol example](#the-file-manager-protocol-example)
* [The dependencies](#the-dependencies)
* [The options](#the-options)
* [Photos gallery](#photos-gallery)
* [History Log](#history-log)



Conception notes:
- [Conception notes](https://github.com/lingtalfi/JFileUploader/blob/master/doc/pages/conception-notes.md)
- [File editor conception notes](https://github.com/lingtalfi/JFileUploader/blob/master/doc/pages/file-editor-conception-notes.md)





JFileUploader overview
==========
2020-06-02


The **JFileUploader** widget was written with svelte.

It was designed to handle the [file manager protocol](https://github.com/lingtalfi/TheBar/blob/master/discussions/file-manager-protocol.md).

Some characteristics:

- can upload one or multiple files to a remote server
- can edit a file's data via a modal (filename, directory, tags, is public/private)
- can remove a file (useful if you allow multiple files handling for instance)
- has built-in validation rules to check things like the file size or the mime type
- gui inspired by plupload
- supports chunk uploads (enable by default)
- has a file editor with cropper feature for images 
- translated in english and french, other languages can be added easily
- items can be sorted
- it has a default a basic bootstrap theme included




The main idea
=========
2020-06-04


The main idea of the widget is that it converts the uploaded files into urls that it puts into html input elements.


So because of this, you can include this widget in your forms, and when the user submits the form, you basically
just have to deal with one url (a string) or an array of urls, depending on the maxFile option value.

In other words, this widget helps you abstract the ajax uploading part, and let you deal with the uploaded files
as if they were simple urls.


Now of course, for this to work properly, the server needs to do some extra work.


This widget assumes that you are using the [file manager protocol](https://github.com/lingtalfi/TheBar/blob/master/discussions/file-manager-protocol.md).


Note that if you need to use another protocol, you can probably re-implement the main **file manager protocol** actions
into whatever you need.
 








The file manager protocol example
==========
2020-06-02


The code below is what I used during the development of this widget.
It shows the quite complex setup for the JFileUploader widget, along with most of the options.

Let's have a look. 





```html
<?php


require_once "init.inc.php";

$csrfToken = $container->get("csrf_session")->getToken();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Title</title>

    <link rel="stylesheet" href="/libs/universe/Ling/JFileUploader/dist/bundle.css">
    <link rel="stylesheet" href="/libs/universe/Ling/FontAwesome/5.13/css/all.min.css">

    <script src="/libs/universe/Ling/Jquery/3.5.1/jquery.min.js"></script>


    <link rel="stylesheet" href="/libs/universe/Ling/JFileUploader/dist/css/cropper-1.5.6.css"/>


    <!-- select2 -->
    <link href="/libs/universe/Ling/Select2/4.0.13/select2.min.css" rel="stylesheet"/>
    <script src="/libs/universe/Ling/Select2/4.0.13/select2.min.js"></script>


    <script src="/libs/universe/Ling/JFileUploader/dist/bundle.js"></script>
    <script src="/libs/universe/Ling/JFileUploader/dist/lang/lang-eng.js"></script>
<!--    <script src="/libs/universe/Ling/JFileUploader/dist/lang/lang-fra.js"></script>-->


</head>

<body>

<form>
    <div id="my-component"></div>
    <input type="submit" value="Save"/>
    <input type="reset" value="Reset"/>
</form>


<script>


    document.addEventListener("DOMContentLoaded", function (event) {
        new FileUploader({
            target: document.getElementById("my-component"),
            props: {
                options: {
                    urls: [
                        // "/img/red copy.jpg",
                        // "/img/cat copy.png",
                        "/user-data?id=f1589895033.7472.545",
                        // "/img/user_avatar.png",
                    ],
                    useBootstrap: true,
                    lang: "eng",
                    maxFile: 1,
                    // maxFileNameLength: 64,
                    mimeType: [
                        "image/png",
                        "image/jpg",
                        "image/gif",
                    ],
                    maxFileSize: 200000,
                    serverUrl: "/ajax-handler",
                    payload: {
                        // alcp
                        handler: "Light_UserData",
                        configId: "Light_Kit_Admin_UserDatabase.user_profile",
                        csrf_token: "<?php echo $csrfToken; ?>",
                    },
                    immediateUpload: true,
                    useVirtualServer: true,
                    useDelete: false,
                    useKeepOriginalImage: true,
                    isExternalUrl: function (url) {
                        if (0 === url.indexOf('/user-data')) {
                            return false;
                        }
                        return true;
                    },
                    useFileEditor: true,
                    fileEditor: {
                        fileExtensionCanBeUpdated: true,

                        directory: "boris",

                        useOriginalImage: true,
                        useImageEditor: true,


                        // useDirectory: true,
                        // usePrivacy: true,
                        // useTags: true,
                        // allowCustomTags: true,
                        // availableTags: [
                        //     "show",
                        //     "pile",
                        //     "food",
                        // ],
                        // nbTagsAllowed: 2,
                    },
                },
            }
        });
    });

</script>


</body>
</html>
```



The dependencies
----------
2020-06-02

Although there are a lot of dependencies, the good news is that you can pretty much copy-paste the example,
as the dependencies will be imported as you install this planet, thanks to the [universe assets dependency system](https://github.com/lingtalfi/NotationFan/blob/master/universe-assets.md).


But let's have a look at those dependencies.

The **JFileUploader** uses the following third-party libraries:

- font-awesome (if you want those nice icons in the gui, not functionally required but recommended)
- jquery, this is required only if you use the fileeditor 
- [cropperjs](https://github.com/fengyuanchen/cropperjs/blob/master/README.md), this is required only if you use the fileeditor's cropper 
- [select2](https://select2.org/), this is required only if you use the fileeditor's tags 


Apart from those dependencies, the JFileUploader also uses assets of its own:

- the css bundle (contains the css)
- the js bundle (contains the js)
- a lang file, which must be included AFTER the js bundle (for instance lang-eng.js or lang-fra.js)




The options
--------
2020-06-02 -> 2020-06-04


To instantiate the **JFileUploader** widget, we instantiate the js **FileUploader** object with some options.

The **options** might look unconventional, but they make sense if you know how [svelte](https://svelte.dev/) works.

Basically, like react, svelte **injects** the widget into a target element, hence the **target** option.

Then, we have the **props** option which itself contain the **options** property which contains the effective options of the widget.

You might wonder: why I didn't put the options directly at the **props** level. I don't want to dive into too much details, but let's just say
that it's because it lets me have an extra level of flexibility if I want to change the behaviour of how svelte interacts with my widget.

And now the main options:



```js

let defaultOptions = 
{
        /**
         * bool=false.
         * If true, this will add some bootstrap markup, mainly for buttons (things like btn btn-primary).
         * Note: you will still an external style sheet of yours to customize further, this is just to lay down the
         * basic html markup which is the first step to the bootstrapization of this widget.
         *
         */
        useBootstrap: false,
        /**
         * string=eng.
         *
         * The language used in the gui.
         *
         * Possible values are:
         * - eng
         * - fra
         *
         * To add your own, start with a copy/paste and adapt of the **lang/lang-fra.js** file.
         *
         *
         */
        lang: "eng",
        /**
         * int=1.
         * The maximum number of files that this widget will handle.
         * If the value is -1, then it can handle any number of files.
         *
         * If the value is 1, the widget will create an input (html element) that results in a scalar when the form is posted.
         * If the value is more than 1, the widget creates inputs of that results in an array when the form is posted.
         *
         */
        maxFile: 1,
        /**
         * string=dropzone-hover.
         * The css class added to the dropzone when the user's mouse is over the dropzone of the widget while he's dragging
         * a file from his OS.
         */
        dropzoneOverClass: "dropzone-hover",
        /**
         * array of strings=[].
         * An array of the urls to initialize the widget with.
         * Those urls will be loaded in the widget at startup.
         *
         */
        urls: [],
        /**
         * string=the_file.
         * The name attribute of the input html element(s) generated by this widget.
         */
        name: "the_file",
        /**
         * int=-1.
         * The maximum file size allowed for uploaded files.
         * If -1, then any size is allowed.
         */
        maxFileSize: -1,
        /**
         * int=64.
         * The maximum length allowed for the filename of the uploaded files.
         */
        maxFileNameLength: 64,
        /**
         * array|string=null.
         *
         * The list of allowed file mime types for uploaded files.
         * null means every mime type is allowed.
         */
        mimeType: null,
        /**
         * array|string=null.
         *
         * The list of allowed file extensions for uploaded files.
         * null means every extension is allowed.
         */
        allowedFileExtension: null,
        /**
         * string=file.
         * The name of the uploaded file when sent to the server (via post).
         */
        uploadItemName: "file",
        /**
         * callback=the callback below.
         * When there is a problem with the server's response, this callback is called.
         * Note, it's called in addition to the default error handling system of this widget (i.e. it doesn't override
         * the widget's default behaviour).
         */
        onServerError: function (errorMessage) {
            console.log(errorMessage);
        },
        /**
         * callback=the callback below.
         *
         *
         * This callback returns whether the given url is external or internal.
         *
         * External means it's not recognized by the server (i.e. the server can't identify a file from that url).
         * Internal means it's recognized by the server.
         *
         * The behaviour of the server when an external urls is given depends on the server.
         * Some server will reject the request, some others will create a new internal url and return it to the client
         * so that the file can be handled correctly on the subsequent requests.
         *
         * Client side (this script), we have our own problems to solve.
         * The problem that we have which requires this callback occurs in the following situation:
         *
         *
         * update
         * ----------
         *
         * When the page starts, and an external url is given, the file item is displayed normally,
         * then when the user edits the file by opening the file editor dialog, when he clicks the update button,
         * that's where the problem begin, because our script sends the binary file only if the file has been modified
         * (image cropped, or new file dropped on the file editor dialog).
         * However if the user just changes the name of the file and click the update button, then our script
         * by default won't send the binary file, and so the server will be missing this information.
         *
         * In order for our script to send the binary file while preserving our optimized system,
         * we use this callback, which returns whether the given url is external or internal.
         *
         *
         * Note: you could make this work all the time by making this callback return true all the time,
         * but then the binary file would be sent on every update, that would defeat the purpose of our optimization.
         *
         * If you don't use external urls at all, then you don't need to worry about this callback at all.
         * If your application potentially uses external urls and you want your server to handle them (assuming it can),
         * then we recommend that you set this callback accordingly.
         *
         * By default, we return false, which means that there will be some potential problem if you try to send
         * an external url. But the intent of this choice is that you become aware of this problem and fix it to benefit
         * the optimized version of our script.
         *
         * If you're lazy and don't care of perfs, return true (not recommended).
         *
         *
         * Also, note that usually, if the server handles external urls, it will return an internal url,
         * so the isExternalUrl callback is just used the on the first update of an external url.
         *
         *
         *
         * delete
         * ----------
         * Also, the externalUrl is used with the delete action.
         * Since the server won't be able an external url, when we delete an external url's file, we simply
         * don't ask the confirmation from the server.
         *
         *
         */
        isExternalUrl: function (url) {
            return false;
        },
        /**
         * string=/upload.php
         * The url of the server.
         */
        serverUrl: "/upload.php",
        /**
         * map={}.
         * A map of extra parameters to pass (via post) with the server requests.
         */
        payload: {},
        /**
         * bool=false.
         * If true, the "upload files" button won't show up, and the files are automatically uploaded
         * as soon as the users adds them (either using the "add file" button, or by dropping them into the dropzone).
         */
        immediateUpload: false,
        /**
         * bool=false.
         * Whether to communicate with a virtual server like this one: https://github.com/lingtalfi/Light_UserData/blob/master/doc/pages/conception-notes.md
         * If true, the reset action of the [file manager protocol](https://github.com/lingtalfi/TheBar/blob/master/discussions/file-manager-protocol.md)
         * will be sent when the widget is first initialized, or when the wrapping form (if any) is reset.
         *
         * Also, when the wrapping form is submitted, this widget will trigger the "commit" action
         * on the server.
         *
         * Also, when accessing a file by its url, we add the v=1 flag, as recommended by the file manager protocol.
         *
         */
        useVirtualServer: false,

        /**
         * bool=false.
         * Whether to show the delete button on uploaded files.
         */
        useDelete: false,


        /**
         * bool=false.
         * Whether to use the keepOriginalUrl system of the [file manager protocol](https://github.com/lingtalfi/TheBar/blob/master/discussions/file-manager-protocol.md).
         * If true, when the file is uploaded, this widget also sends the keep_original flag to the server.
         * Also, it displays and handles the behaviour of a show original toggle button, so that the user can revert back to the original image if necessary.
         * Note: every time the user uploads a new file, the keep_original flag is resent to the server (so that the original image is the last image
         * uploaded by the user).
         */
        useKeepOriginalImage: false,

        /**
         * bool=false.
         * Whether to show the open file editor dialog button.
         */
        useFileEditor: false,
        /**
         * map={}.
         * The options for the file editor.
         */
        fileEditor: {

            //----------------------------------------
            // file
            //----------------------------------------
            /**
             * bool=false.
             * Whether the user can update the file extension.
             */
            fileExtensionCanBeUpdated: false,


            //----------------------------------------
            // directory
            //----------------------------------------
            /**
             * bool=false.
             * Whether to show the directory control.
             */
            useDirectory: false,

            /**
             * string="".
             * The default value of the directory control.
             */
            directory: "",
            /**
             *
             * bool=true.
             * Whether the directory can be updated.
             * It's generally a good idea to let the directory not fixed to a certain value,
             * as to sync the server with the gui,
             * as the server might change the directory defined by the user.
             */
            directoryCanBeUpdated: true,

            //----------------------------------------
            // visibility
            //----------------------------------------
            /**
             * bool=false.
             * Whether to show the visibility checkbox (private/public).
             */
            usePrivacy: false,

            //----------------------------------------
            // tags
            //----------------------------------------
            /**
             * bool=false.
             * Whether to show the tags control.
             */
            useTags: false,

            /**
             * bool=true.
             * Whether the user is allowed to create new tags.
             */
            allowCustomTags: true,
            /**
             * array=[].
             *
             * The array of tag names the user can choose from.
             *
             * Note: if allowCustomTags is true, the user can create his own tags,
             * otherwise his choice must be one of the available tags.
             *
             */
            availableTags: [],
            /**
             * int=5.
             * The number of tags the user can select/create.
             * This cannot be infinite.
             */
            nbTagsAllowed: 5,

            /**
             * bool=false.
             * Whether to show the image editor (if the file is an image).
             */
            useImageEditor: false,
        },


};

```





Photos gallery
=========
2020-06-04



### Default theme


![Default theme](https://lingtalfi.com/img/universe/JFileUploader/jfileuploader-default-theme.png)


### Default theme, text view


![Default theme, text view](https://lingtalfi.com/img/universe/JFileUploader/jfileuploader-default-theme-text-view.png)


### Default theme, error message


![Default theme, error message](https://lingtalfi.com/img/universe/JFileUploader/jfileuploader-default-theme-error-message.png)


### Default theme, file editor


![Default theme, file editor](https://lingtalfi.com/img/universe/JFileUploader/jfileuploader-default-theme-file-editor.png)


### Bootstrap example


![Bootstrap example](https://lingtalfi.com/img/universe/JFileUploader/jfileuploader-bootstrap-theme-example.png)

### Bootstrap example, file editor


![Bootstrap example, file editor](https://lingtalfi.com/img/universe/JFileUploader/jfileuploader-bootstrap-theme-example-file-editor.png)



Note: in case you wonder, the admin theme used in the bootstrap examples is [zero admin](https://www.templatemonster.com/admin-templates/zero-admin-template-82792.html).









History Log
=============

- 3.0.0 -- 2020-06-04

    - new api 

- 2.2.2 -- 2020-02-24

    - fix bootstrap theme: file editor buttons not bootstrapish 
    
- 2.2.1 -- 2020-02-24

    - add test.php file in personal directory 
    
- 2.2.0 -- 2020-02-24

    - add bootstrap theme 
    - add allowedFileExtension js validation option 

- 2.1.2 -- 2020-02-24

    - fix unstable initial urls order 
    
- 2.1.1 -- 2020-02-24

    - fix jquery ui dialog not draggable
    
- 2.1.0 -- 2020-02-21

    - add file editor
    
- 2.0.1 -- 2020-01-24

    - add server side script section in README.md
    
- 2.0.0 -- 2020-01-24

    - new version
    
- 1.2.2 -- 2019-11-25

    - reorganized assets
    
- 1.2.1 -- 2019-11-25

    - migrating to JFileUploader repository for better planet compatibility

- 1.2.0 -- 2019-10-21

    - now the file visualizer guesses the file name from Content-Disposition header when available

- 1.1.1 -- 2019-10-17

    - fix fileVisualizerAddItem taking extension from url instead of filename

- 1.1.0 -- 2019-08-06

    - add defaultValue option

- 1.0.1 -- 2019-08-06

    - fix doc typo

- 1.0.0 -- 2019-08-05

    - initial commit






