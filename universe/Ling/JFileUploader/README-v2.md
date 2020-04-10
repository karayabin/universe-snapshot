JFileUploader
===========
2019-11-25 -> 2020-03-11



Js file uploader is a javascript tool to upload files to a backend server.


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/JFileUploader
```

Or just download it and place it where you want otherwise.






![js file uploader screenshot, default theme](https://lingtalfi.com/img/universe/JFileUploader/fileuploader.png)



Table of Contents
=================

* [JFileUploader](#jfileuploader)
* [Install](#install)
* [Table of Contents](#table-of-contents)
  * [In a nutshell](#in-a-nutshell)
  * [What is it?](#what-is-it)
  * [Quickstart](#quickstart)
* [Documentation](#documentation)
  * [The synopsis](#the-synopsis)
  * [The widget html structure](#the-widget-html-structure)
  * [General overview of the objects](#general-overview-of-the-objects)
  * [The FileUploader object](#the-fileuploader-object)
  * [The FileList object](#the-filelist-object)
  * [The theme object](#the-theme-object)
  * [Lang](#lang)
  * [Server side script](#server-side-script)
  * [The file editor](#the-file-editor)
* [History Log](#history-log)


Conception notes:
- [Conception notes](https://github.com/lingtalfi/JFileUploader/blob/master/doc/pages/conception-notes.md)
- [File editor conception notes](https://github.com/lingtalfi/JFileUploader/blob/master/doc/pages/file-editor-conception-notes.md)




In a nutshell
---------

- allows you to handle one or multiple file uploads, using ajax and a server side script
- inspired by plupload
- has a cropper feature 
- translated in english and french, other languages can be added easily
- items can be sorted (this feature requires jqueryui sortable, graceful degradataion implemented)
- it requires jquery
- it will work on all major browsers except IE9-, Opera Mini, and it might not work on "Safari on iOS", there is no graceful degradation implemented.
- it has a default theme, other themes can be added easily




What is it?
-------------

It's a javascript widget that provides file uploads.
It works in conjunction with a server side script, to store the uploaded file on the hard drive.

There is also an older version of this plugin (see [README-v1.md](https://github.com/lingtalfi/JFileUploader/blob/master/README-v1.md)
and [fileuploader-v1.js](https://github.com/lingtalfi/JFileUploader/blob/master/assets/map/www/libs/universe/Ling/JFileUploader/fileuploader-v1.js) if you're interested
in that), but it was quite messy in terms of code organization so I've rewritten it.

I've been inspired by the [plupload](https://www.plupload.com/) plugin, and in fact, I almost decided to use plupload, but then
I realized that I also want to implement features such as a crop box, which plupload doesn't have, so I preferred to re-code everything,
so that I have complete control over the development (I'm generally not good at extending somebody else's code).

On the downside, I've not taken care of browsers compatibility problems, and so if you want a cross-browsers compatible solution,
you're probably better off using plupload, because jFileUploader will work only in all major browsers, but will fail in IE9 and below,
and in Opera mini, and possibly in Safari on iOS (and there is no graceful degradation for that yet).


On the positive side, now the code is more organized than before, and so it's easier to extend, I'll be working on this crop plugin
very soon...

This plugin requires 3 js files:

- the core, which contains the main objects
- the theme file, which draws the widget and can be changed (I plan to do a bootstrap theme soon)
- the lang file, which is responsible for encoding the language translations for a given lang


There is only one core file.
For the theme, the idea is that you include the theme you want by including its file. All themes are in the **theme** folder.
For the lang, the idea is that you include only the lang file that you want. All lang files are located in the **lang** folder.

It's important that the lang file and the theme file are included **AFTER** the core file (because they register themselves to the core,
so the core needs to be there when they are loaded).




 

Quickstart
-----------

This widget depends on jquery, and on jqueryui.sortable for the sortable feature.

Paste this in your web editor:

```html

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Title</title>




    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css"
          integrity="sha256-UzFD2WYH2U1dQpKDjjZK72VtPeWP50NoJjd26rnAdUI=" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" integrity="sha256-rByPlHULObEjJ6XQxW/flG2r+22R5dKiAoef+aXWfik=" crossorigin="anonymous" />


    <link rel="stylesheet" href="/libs/universe/Ling/JFileUploader/theme/theme-default.css">

</head>


<body>


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


<script>
    $(document).ready(function () {
        var fileUploader = new FileUploader({
            theme: "default",
            container: $("#file-container"),
            urls: [
                "/plugins/Light_Kit_Admin/img/avatars/root_avatar.png",
                "/img/cat.png",
            ],
            name: "avatar_url",
            maxFile: 5,
            maxFileSize: -1,
            mimeType: null,
            serverUrl: "/libs/universe/Ling/JFileUploader/uploader-mocks/upload-success.php",
            themeOptions: {
                defaultView: "image",
                // defaultView: "text",
                showHiddenInput: false,
            },
        });
        fileUploader.init();

    });
</script>
</body>
</html>
```


Alternately, if you want to use the **file editor** feature, you can initialize this plugin like this:

```js
    $(document).ready(function () {

        var csrfToken = "<?php echo $csrfToken; ?>";

        var fileUploader = new FileUploader({
            theme: "default",
            container: $("#file-container"),
            urls: [
                "/plugins/Light_Kit_Admin/img/avatars/root_avatar.png",
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

```




All the resources required for this tutorial are located in the assets directory: [https://github.com/lingtalfi/JFileUploader/tree/master/assets/map/www/libs/universe/Ling/JFileUploader](https://github.com/lingtalfi/JFileUploader/tree/master/assets/map/www/libs/universe/Ling/JFileUploader).


Then:
- Make sure all the references to the plugin assets (js and css files) are honoured.
- Then optionally replace the urls (/img/cat.png...) with some existing images (those are not in the assets directory, you need to provide your own).
- Then make sure the **serverUrl** leads to the **upload-success.php** script found in the **uploader-mocks** folder.


Once you've done all that you should be able to see the working plugin in action.



Documentation
=================
2020-01-23



The synopsis
----------
2020-01-23


This widget is meant to be used in an html form, like any other form control.
When the form is posted, what you will get via POST is either an url, or an array of urls, depending on the **maxFile** value (see the FileUploader object section
in this document for more details). 

What happens under the hood is that this widget creates some hidden input of type="text".
And the values of those hidden inputs are the urls corresponding to the files being uploaded.

If maxFile=1, only one hidden input is created, and a scalar value will be passed via POST (i.e. the name
attribute of the input doesn't end with the square brackets []).

If maxFile > 1, then that many hidden inputs are created, and an array of values will be passed via POST (i.e. the name
attribute of the input will end with the square brackets []).







The widget html structure
------------
2020-01-23 -> 2020-01-24


The core expects the widget to have the following html structure:

- .fileuploader-widget: the html element containing the whole widget.
    It's used by theme files to style the whole widget, and therefore
    the theme css class must be put on that same element in order to apply a theme
    to the widget.
    
    - .input-file: the hidden file input that's used to hold the change event 
    - .fileuploader-item: an item representing a file. It's used to obtain the index of the file.
    - data-id=$itemId: the theme is responsible for adding this attribute on the same element than the .fileuploader-item.
        It's used by the core to access the inner file from a click in the gui.     
     - .btn-remove-file: the remove file button.  
    - .fileuploader-item-container: a container of fileuploader-item, it's used to implement the sortable feature. 
    - .dropzone: the element into which the user can drop files
    - .last-dragged-item: the element that was last dragged. It's used by the default theme which provides 2 views, to 
     sync the reordering of items in the 2 views simultaneously.
    
    - .btn-add-file: the add file button replacing the hidden file input (I use this because it's visually more pleasing than the default input)
    - .btn-view-image: the button to switch to image view  
    - .btn-view-text: the button to switch to text view  
    - .btn-remove-error: the button to remove an error. Each error has one.  
    - .btn-start-upload: the button to start the upload of queued files.  
    - .btn-edit-file: the button to open the file editor dialog.  



General overview of the objects
--------------------
2020-01-24

In this version, rather than having everything handled by one all powerful object, I split the responsibilities into
multiple objects that work together.
As a result, the code is more readable and the widget is easier to extend.

A brief overview of the different objects is exposed in this section.
And the most important objects (named followed by an asterisk) have also their own section later in this document.


- Dispatcher: it's responsible for implementing the observer/notify pattern. It's a simple object that can trigger events,
    and allow listeners to subscribe to an event. It's a very simple piece, but a very important one too.
- Validator: when the user selects a file, the validator checks that the file is ok. It can check the file size and the
    file mime type. The developer decides what to check. 
    When a file is erroneous, it's not stacked into the widget, but rather an error message is displayed.
    Note: when the file is uploaded, a server side script performs a similar checking.    
- FileList*: the file list contains all the files handled by the widget. There are two types of files: the queued files
    and the url files. See more in the file list section.
    
- UploaderEngine: this object is responsible for uploading the queued files.
- GlobalProgressTracker: this is a helper for the UploaderEngine object. It helps tracking the global percent of
    the queue being uploaded (because the queue can contain more than one file).
- FileUploader*: this is the core object. It's the one we instantiate with some options, and the one that controls all the others.
    I like to see it as the controller object.
- the theme object*: 
    The theme is the object responsible for painting the gui parts of the widget.
    This includes building the whole widget, but also updating some parts of it (for instance when a file is being uploaded,
    updating the progress bar).
    
    This object's code lies in a separate theme file.
    The name of that object depends on the theme. For instance the default theme object's name is **FileUploaderTheme_Default**.
    If you wanted to create a bootstrap theme, you would name the object **FileUploaderTheme_Bootstrap** for instance.
    
    







The FileUploader object
-----------
2020-01-23


The **FileUploader** is the main object representing this widget.
Its constructor takes some options which control the behaviour of the widget.

Those options are:

- container: mandatory. Jquery object representing the html element that contains the whole widget.
- theme: optional, string=default. The name of the theme to use.
         In order to use a theme, the theme file must be included first.
- maxFile: optional, int=1. The maximum number of files handled by this instance.
     If more than 1 file, this widget will create an array of input type hidden (one per file),
     and the name attribute will end with square brackets ([]).
     If exactly 1 file, this widget will create a single input type hidden, and the name attribute
     will not end with square brackets.
- dropzoneOverClass: optional, string=dropzone-hover. The css class to add when the dropzone is hovered by the user.
- urls: optional, array=[]. The urls to start with. The urls will be converted to fileUrls. See the documentation for more details.
- name: optional, string=the_file. The html name of the file. This name attribute will be added to the hidden input(s). See the documentation for more info.
- maxFileSize: optional, int = -1, the maximum number of bytes per file. Use -1 (negative one) to allow any size.
- mimeType: optional, array|string|null = null, the allowed mime type(s). By default, mimeType equals null, which means all mime types are allowed.
- uploadItemName: optional, string = item, the name of the uploaded file when sent to the server side script handling the upload.
- uploadItemExtraFields: optional, map = {}, an extra map of data to send to the server when uploading a file.
- serverUrl: optional, string = /upload.php, the url of the server script responsible for handling the uploading.
     A certain communication protocol is expected, see the conception notes for more details, or the example files in this repository,
     or the source code below.
- immediateUpload: optional, bool=false, whether to upload the file immediately after the user selected it.
    If false, then the user needs to manually click the "Upload files" button to upload the files.     
- themeOptions: optional, map = {}, a map of options to pass to the theme's buildFileUploader method. Refer to the theme's file to see the available options.



The FileList object
-----------
2020-01-24

The filelist object holds the files managed by this plugin.
There are two types of files, both of which are based on the javascript File object.


- the queued file
- the url file

When file(s) are added by the user via the control (via "open file" dialog in the browser or dropzone),
they are added to the queue, and so they are **queue files**. 

When a queued file is then being uploaded, it becomes an **url files** (and a hidden input is created and bound to it).
Also, when a form is in update mode and is initialized with some urls already, those urls are represented as **url files**
in the widget.


Both objects are based on the javascript File object, but they add extra properties to it:

- queue file:
    - itemId: the item id is used to target the item html. It's an unique identifier assigned to every file.
- url file:
    - itemId: the item id is used to target the item html. It's an unique identifier assigned to every file.
    - id: the id of the file, used to keep track of the bound hidden input 
    - url: the url of the file



The theme object
--------------
2020-01-23


The theme is a painter object, it paints the html and give the widget its look.

Each theme is encoded in its own file, for organization sake.

There is a default theme provided, which code lies in the following files:

- https://github.com/lingtalfi/JFileUploader/tree/master/assets/map/www/libs/universe/Ling/JFileUploader/theme/theme-default.js
- https://github.com/lingtalfi/JFileUploader/tree/master/assets/map/www/libs/universe/Ling/JFileUploader/theme/theme-default.css 


To create your own theme, copy the code from the **theme-default.js** file, and adapt it to your likings.

To use a theme, its js file must be included, and then when you instantiate the **FileUploader** object (see the 
Fileuploader object section for more details) you pass the **theme** option to it, which takes the theme name as an argument
(each theme has its own name).  


Here are the theme methods used by the core:

- buildFileUploader ( themeOptions ): builds the main widget
- addUserError ( errorMsg ): adds an user error message
- addFile ( oFile ): adds a file
- addHiddenInput ( url, id ): adds an hidden input 
- removeHiddenInputById ( id ): remove an hidden input
- updateFooterInfo ( oFiles ): updates the information in the footer (global size, number of files, those kind of things)
- removeFileByIndex ( index ): removes a file from the widget
- reorderFiles ( oFiles, oldIndex, newIndex ): reorder the files after the user sorts them. To better understand this,
    it's helpful to know that the default theme has two possible views: an image view and a text view, and both show the 
    same files, and therefore they both need to be synchronized with each other. So when the user re-arrange the order
    of the file in one view, the other view has to be updated too (hence this method).
- refreshProgress ( oFile, percent, loaded, total, globalPercent ): updates the gui so that it reflects the progress of a given file.
- hideUploadButton ( ): if the widget works in immediate upload mode (a file selected by the user is immediately uploaded), then
    we don't need the upload button. This method just hides the upload button.
- removeUserErrorByTarget ( jTarget ): removes an user error message.




Lang
--------
2020-01-24

To translate the widget in a different language, we need to include the corresponding lang file, which resides in the **lang** directory.
The available languages are:

- english (lang/lang-eng.js)
- french (lang/lang-fra.js)


To create a new lang, just copy the french or english file and change the translations.
If your language has more than one plural form, you might need to do some extra coding, as the french and english both
have a single plural form.



Server side script
---------------
2020-01-24


It's expected that the communication with the server side script works like this.


The client (this plugin) sends the following to the server via POST:

- item: the javascript file object (if you are using php, this will be available in the php $_FILES super array)
- ...other optional custom parameters defined by the developer, and sent via POST.

The response of the server must be a json array:

- in case of success, the json array structure should be:
    - **type**: success
    - **url**: (the url to the uploaded file treated by the server)

- in case of error, the json array structure should be:
    - **type**: error
    - **message**: (the error message here...)



The file editor
------------
2020-02-21


![File editor](https://lingtalfi.com/img/universe/JFileUploader/file-editor.png)


The file editor is a gui interface that allows the user to edit a file.

To open the file editor, you click on the edit icon of the file item (you need to use the fileEditor option in your configuration to allow this).
 
The possible actions are possible, depending on your server and plugin configurations:

- renaming the file 
- defining the **is_private** property for the file 
- defining the **tags** to attach to this file 
- cropping the file if it's an image


For more details, refer to the [file editor conception notes](https://github.com/lingtalfi/JFileUploader/blob/master/doc/pages/file-editor-conception-notes.md). 





History Log
=============


--- 2.2.3 -- 2020-03-11

    - fix fileuploader.js remove irrelevant console debug messages
    

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






