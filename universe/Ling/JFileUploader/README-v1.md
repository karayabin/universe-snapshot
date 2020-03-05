JFileUploader
===========
2019-11-25



Js file uploader is a javascript tool to upload files to a backend server.


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/JFileUploader
```

Or just download it and place it where you want otherwise.






![js file uploader screenshot with bootstrap](https://lingtalfi.com/img/js/jsfileuploader/js-file-uploader.png)

Table of Contents
=================

* [Js file uploader](#js-file-uploader)
  * [Summary](#summary)
  * [Features](#features)
  * [The global picture](#the-global-picture)
  * [Browser compatibility](#browser-compatibility)
  * [Sources](#sources)
  * [The plugin in a nutshell](#the-plugin-in-a-nutshell)
  * [How does it work?](#how-does-it-work)
     * [Step 1: onReceive](#step-1-onreceive)
        * [The dict object](#the-dict-object)
     * [Step 2: onProgress](#step-2-onprogress)
     * [Step 3: onComplete](#step-3-oncomplete)
* [Some built-in modules](#some-built-in-modules)
  * [Error handling](#error-handling)
  * [Dropzone](#dropzone)
  * [AjaxForm](#ajaxform)
  * [Progress handler](#progress-handler)
  * [Url to Form](#url-to-form)
  * [File visualizer](#file-visualizer)
* [Examples](#examples)
  * [Simplest example](#simplest-example)
  * [Displaying errors](#displaying-errors)
  * [Validation](#validation)
  * [Drop zone](#drop-zone)
  * [Progress handler](#progress-handler-1)
  * [urlToForm module, creating some inputs](#urltoform-module-creating-some-inputs)
  * [File visualizer module](#file-visualizer-module)
  * [Callbacks](#callbacks)
* [History log](#history-log)

Created by [gh-md-toc](https://github.com/ekalinin/github-markdown-toc)








Features
---------

- it's a jquery plugin
- various modules which are disabled by default:
	- error container
	- dropzone support
	- progress handler
	- url to form module, which creates/removes the necessary hidden input(s) as the files are uploaded/removed
	- file visualizer module, to visualize your files as they are uploaded/removed
- built-in validation options:
	- maxFile: to restrict the maximum number of files allowed
	- maxFileSize: define the maximum size of a file
	- mimeType: define which mime type are allowed
- all built-in error messages can be modified (if you need to translate this module to your language)




The global picture
-------------

The (js) file uploader acts as a client, which submits the files to a backend service, like a php script for instance.






Browser compatibility
--------
The fileUploader plugin uses the html5 file api, which in IE is available only since IE 10.
https://caniuse.com/#feat=fileapi
So, if you need to support IE9 for instance, please use another plugin...



Sources
-----------
https://developer.mozilla.org/en-US/docs/Web/API/File/Using_files_from_web_applications
http://significanttechno.com/file-upload-progress-bar-using-javascript




The plugin in a nutshell
------------

Upload the files where you want via this plugin.

This plugin basically provides you with:

- a callback when the files are received (so that you can decide whether or not to trigger
     the upload based on some validation rules, like if the file weight is too big...)
- a callback to handle the progress of the upload (so that you can display a progress bar)
- a callback to handle a successful/not successful upload (so that you can display a thumbnail of the uploaded image
     for instance, or an error message if the backend server responded with an error)

- you can define an element as a dropzone

- default message errors are generated for the most common validations (wrong mime type, file size problem)
- a default error container to display error messages when they occur
- a callback for handling error messages if you don't want to use the default error container
- there are some other modules that you can activate/de-activate for free before implementing your own logic.



How does it work?
---------

### Step 1: onReceive

When the user clicks on the input file (or drops a file into the dropzone), the onReceive callback is called
for each file.
Note: don't forget to add the multiple html attribute to your input if you want to allow multiple files upload.


By default it will return true, which means that the file is valid.

If the file is valid, then it's uploaded to the backend server (step 2).

To prevent the file from being uploaded, make the onReceive callback return false.

Since the validation errors are pretty much the same for every upload (file too big, wrong mime type),
I provide some built-in error messages.


However, the language in which you want to display them might vary, so I provide them in english only,
and then you use the dict object to provide the translation if necessary.

#### The dict object
The dict object basically contains all the strings that are meant to be displayed to the user.
The dict object contains strings related to:
- the validation error messages



If you want to provide your own error messages, based on your own rules,
simply use the this.appendError method from the onReceive callback.



So what are the built-in options we can use?

- **maxFile**: int = -1, the maximum number of files that we want.
         If -1, it means we can upload as many as we want.


- **maxFileSize**: int = -1, the maximum number of bytes per file. Use -1 (negative one) to allow any size.
             An error message will be generated if the size of the selected file is more than the maxFileSize value.
             The error message displayed to the user is customized using the "dict.maxFileSizeExceeded" key.
             The following tags can be used in the error message:
             - {fileName}: the name of the file
             - {fileSize}: the current file size value formatted (with the most relevant unit)
             - {maxSize}: the max file size value formatted (with the most relevant unit)


- **mimeType**: array|null, the list (javascript array []) of allowed mime types.
             By default, mimeType equals null, which means all mime types are allowed.
             An error message is generated when a file's mime type is not in the allowed mime type list.
             The error message is dict.wrongMimeType, and uses the following tags:
             - {allowedMimeTypes}: the comma separated list of allowed mime types
             - {fileName}: the name of the file
             - {fileMimeType}: the mime type of the current file








### Step 2: onProgress

Assuming that step 1 went ok, and the onReceive callback returned true, then the files are uploaded.
You can use the onProgress callback (which is triggered for each file individually) to get access to the progress
data of the file while it's being uploaded.


### Step 3: onComplete

When the file is uploaded (i.e. when it is sent successfully to the backend server), this plugin expects a
response from the back end server. The response is a json array, which structure depends on the type of response:

- in case of success, the json array structure should be:
     - **type**: success
     - **url**: (the url to the uploaded file treated by the server)

- in case of error, the json array structure should be:
     - **type**: error
     - **message**: (the error message here...)



The onSuccess callback is fired for every file that is successfully uploaded (i.e. meaning the server has
returned a successful response for that file).



Some built-in modules
=================

All the modules below are not active by default.
If you want to use them, you need to activate them manually using the corresponding option (which starts with the "use" prefix).


Error handling
----------------
At any moment, when an error occurs (i.e. when the addError method has been called) the onError callback is fired,
so that you can create any error handling system that you like.
By default though, I provide the following error system, which you can enable using the **useErrorContainer** option:
every time an error occurs, it is appended to an error container.
Every time new files are selected, the error container is flushed out so that it can show only the
relevant error messages.

The error container can be any element that you like.
It is hidden by default, but becomes visible when/if an error occurs.
The error container contains the error list container, which is where the errors are appended.

In other words, the error container is like the wrapper, it can have a title, like for instance:
Oops, the following error occurred.
And the error list container is for instance the ul element inside this wrapper, and to which the error messages
are appended.
The error message is created using a template that you define.

Use the following options to configure the error container system according to your needs:

- **useErrorContainer**: bool, whether to activate this module
- **errorContainer**: the jquery object representing the error container (the wrapper containing the title and the list container)
- **errorListContainer**: string = ul, the jquery selector to use to target the error list container element (the error message container),
         the jquery context being the errorContainer object.
- **errorMessageTemplate**: string|callable. The template used to create each error message. Each error message being
         then appended to the error list container.
         If errorMessageTemplate is a string, we can use the {message} tag, which will be replaced with the actual message.
         If errorMessageTemplate is a callable, it takes the error message as an argument, and should return the
         error message html code (that we inject directly to the error list container).




Dropzone
--------
If you wish to, you can create any element and turn it into a drop zone.
To do so, you need to pass the jquery object representing the dropzone to this plugin, using the **dropzone** option.

In order to help you style it, a css class is added when the mouse is dragging over the drop zone.
This css class is "over" by default, and is appended to the dropzone element.
You can change the css class being added using the "dropzoneOverClass" option.


AjaxForm
-----------
The technique used by this plugin to upload files is to create a form (called ajax form) for every file uploaded.
So basically, the file is validated, then the plugin creates an ajax form for that file, and sends the form
via XMLHttpRequest to the backend server.
And so, like with any form, we can add data to the form before it's being sent.
This ajax form can be seen as an array of key/value pairs.
By default, the created array contains only one key (with the name "item"), which holds the file to upload.

Now, we can add extra fields to that form, for instance if we want to add a csrf token (and we should do so
by the way, otherwise we would have a csrf issue).

Most of the options related to the ajax form start with the "ajaxForm" prefix.

Note: the form will be received in the $_FILES super array in a php backend.



Progress handler
-----------------
Because creating a progress system from scratch can take some time, this plugin provides a built-in mechanism
which displays the progress of the items as they are uploaded.

This mechanism is off by default, and must be activated using the "useProgressHandler" option.
When the "useProgressHandler" option is set to true, the mechanism is activated, and works like explained below.

This progress handler displays a zone dedicated to showing the progress of the uploaded files.

There is a progress handler container. This is the (html) element which will contain all the progress bars.
If you use the progress handler, you must create this element in your html, and pass the jquery object referencing
this container to this plugin, using the "progressHandlerContainer" option.

Then, when at least one file is being uploaded, the base template is appended to this container.
The base template like the skeleton/body of the container. By default, this skeleton displays a title,
and a zone where to append all progress items.


The skeleton must contain a zone (called list container) where all the progress bar will be injected.
The skeleton is defined with the "progressHandlerContainerTemplate" option.

By default, I use a bootstrap4 template, as bootstrap is a very common framework (plus, it's the one I'm using
at the moment, so at least this plugin's defaults will fit my needs).
However, just hook into this option to change the skeleton template as you like.

Now the progress bars will be injected in the list container (which is inside the container skeleton).
We use the "progressHandlerListContainerSelector" option, to help the plugin access the list container.
The "progressHandlerListContainerSelector" option is a jquery selector which targets the list container, in the
context of the container skeleton.

Now, every time a file is being uploaded, a new progress item is appended to the list container.
A progress item can have one of three different states:

- **progressing**: the first state of the item, the file is being uploaded
- **completed**: this state is reached when the file has been successfully uploaded
- **erroneous**: an error occurred, and the upload was aborted/cancelled for some reason.
         When this happens, this plugin will distinguish between two cases (corresponding to the corresponding ajax javascript event handlers):
                 - abort: the file uploaded was aborted for some reason.
                             In this case, the error message sent is defined with the "dict.uploadAborted" option.
                             The available tags are:
                             - {fileName}: the name of the file
                 - error: an error occurred during the upload for some reason.
                             In this case, the error message sent is defined with the "dict.uploadError" option.
                             The available tags are:
                             - {fileName}: the name of the file


Note: the state of the item will transit from progressing to completed/erroneous (this plugin handles this transition automatically),
depending on how the file upload evolves.

The progress item template is defined with the "progressHandlerListItemTemplate" option.
The template can use the following variables:
- {iconClass}: a css class representing an icon
- {fileName}: the name of the file
- {fileSize}: the size of the file (using the most appropriate unit)
- {progressBarClass}: a css class to add to the progress bar
- {percent}: the percentage of the file being uploaded

Some of those variables (iconClass and progressBarClass) might depend on the state of the item.
Therefore, we can specify how those variables are affected by the state of the item using the "progressHandlerListItemVariables" option.
This option is a javascript object with 3 entries (one per state), each entry defining the two variables.
For example, the default value of this option is:

- **progressing**:
     - iconClass: fas fa-spinner fa-spin text-blue
     - progressBarClass: bg-blue
- **completed**:
     - iconClass: fas fa-check text-green
     - progressBarClass: bg-green
- **erroneous**:
     - iconClass: fas fa-exclamation-triangle text-red
     - progressBarClass: bg-red


Bear in mind that this progress handler is the most complex handler to configure.
Take your time to understand how it works, and see if it can save you some time.

Note: I believe that an item that is uploaded completely will make it to the backend server,
whereas an aborted/erroneous item won't, although I didn't verify yet if that's actually true.




Url to Form
---------------

This built-in module will basically convert the json response from the server into input hidden fields in the target
form.

 This might be useful for when you submit the form, if you want to get the result of your ajax upload in the posted data.
 Note: this might not be what you want though, for instance if you store the data directly from the backend service,
 you might not need this module.
 
 However if you need to treat all the posted data including the ones from the ajax upload form, then this module might help.

The maximum number of fields created is governed by the maxFile option.
The html name attribute of the generated input will be suffixed with the brackets ([]) if maxFile > 1.
In other words, if maxFile = 1, then this module will generate one (and only one) input field which will create
a scalar entry when the form is submitted,
but if maxFile > 1, this module will generate (at most) $maxFile fields which will create an array when the form is submitted.
Note: the trick to do that is simply to add the brackets ([]) at the end of the html name.
If you want to use this module, you also need to define an html element that will contain them and pass its
jquery reference to the "urlToFormContainer" option.

The html name of the field to create is defined with the "urlToFormFieldName" option, and defaults to "the_file".

We can add a default value, using the "defaultValue" option, so that the plugin displays the input(s) corresponding
to that value right away (i.e. when the form is loaded for the first time).


File visualizer
---------------
This module creates a thumbnail for every file uploaded.
It's disabled by default. To enable this module set the "useFileVisualizer" option to true.
If you do so, you also need to specify the fileVisualizerContainer option, which accepts a jquery object reference
representing the container element.

The user can (by default) delete the thumbnail by clicking the delete button on the right top corner of each thumbnail.
This will remove the thumbnail, and the corresponding urlToForm item (if the urlToForm module is activated).

How does it work?
When the user uploads a file, the js client (this plugin) sends the file to the server which responds back with
either a positive response or a negative response.
A negative response indicates that the file couldn't be uploaded, and will result in showing an error message in the gui,
and a thumbnail will never be created in this case.

A positive response however indicates that the file has been successfully uploaded on the server, and the server sends
back the url of the uploaded file.

This module then creates the corresponding thumbnail and displays it in a container element.
A maximum number of maxFile thumbnails will be drawn.
When the user uploads more than maxFile files, the first thumbnail is removed and the new one is appended at the end,
so that there is a rotation which ensures that there is always a maximum of $maxFile thumbnails in the visualizer container.

How do the thumbnail look?

You decide.
There are two templates that let you control the appearance of the thumbnail: one is used if the uploaded file is
an image (jpg, png, gif, bmp), and the other in case the uploaded file is not an image.
Those two templates you can define using the
fileVisualizerImageTemplate and fileVisualizerNotImageTemplate options.

I provide some default values for those.
Speaking of default values, I provide a whole built-in theme for the file visualizer, and to use it you just
need to add the ".file-uploader-filevisualizer" css class to your container (referenced by the "fileVisualizerContainer" option).
The theme I created can be found in the fileuploader.scss file.

Then you can add the ".w100" css class to the container, in order to specify that you want the thumbnails to be
of width 100. Look at the css code to see how it's done, and should you want to have thumbnails of a different size,
you could simply do it from the css by copy-pasting the ".w100" class and creating your own from there.


If the uploaded file is not an image, we can be very specific and display a different thumbnail depending
on the file extension, using the fileVisualizerExtension2icon option.
Or if we don't need that much control, we can just define a fallback extension for all non-image files, using the
fileVisualizerFallbackIcon option.
Those options define the class of an icon that is applied to an "i" tag.
This module provides the following default values:

- fileVisualizerFallbackIcon: far fa-file-alt
- fileVisualizerExtension2icon:
     - doc: far fa-file-word
     - docx: far fa-file-word
     - mp4: far fa-file-video
     - wmv: far fa-file-video
     - ... (have a look at the default options in the source code below for the full list)



Last but not least, we can decide whether the user has the ability to remove the thumbnail using the fileVisualizerAllowDeleteAction option,
which is true by default.

Now all this applies only if you use the default template.
However, if you customize your file visualizer templates, you can use the following tags to yield similar capabilities:

- {fileUrl}: the url of the file
- {fileUrlEscaped}: the url of the file ready to be inserted in src or href attributes (i.e. the html special chars are protected)
- {fileName}: the name of the file
- {fileSize}: the size of the file in a human appropriated unit
- {iconClass}: the icon class chosen by the module algorithm.
             If the uploaded file is an image, this option is set to an empty string.
             If the uploaded file is not an image, this option is set to either a value from the fileVisualizerExtension2icon option (if
             the extension of the uploaded file is in this array), or the fileVisualizerFallbackIcon otherwise.
- {allowDelete}: delete-allowed|delete-not-allowed. A string that indicates the value of the "fileVisualizerAllowDeleteAction" option.
                 I use it in the default templates to hide (from the css) the close button if the option is set to false.



Also, the ".fileuploader-close-button" class can be added to any element, and it will transform this element into
the trigger to remove the thumbnail (see how it's done in the default template: the fileVisualizerImageTemplate option).


Note: the "defaultValue" option is used by both the urlToForm module and the fileVisualizer module.



Examples
==========



Simplest example
---------

Here is the simplest example.

It does nothing but display an html form.
But hey, when you choose a file, look at your inspector, a successful ajax request has been sent to 
the **/backend-success.php** script.

Notice the multiple attribute associated with the input tag.
This allows the user to select multiple files at the same time (using shift click) rather than just one.


First let's have a gist of how to implement the fileuploader.

The following example shows just that. 

Try this in a browser, but don't expect nothing yet: bells and whistles are added in the next examples.



```html

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Title</title>

    <script
            src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" integrity="sha256-UzFD2WYH2U1dQpKDjjZK72VtPeWP50NoJjd26rnAdUI=" crossorigin="anonymous" />
    <link rel="stylesheet" href="/libs/universe/Ling/JFileUploader/fileuploader.css">




</head>


<body>





<form action="" method="post">
    <input type="file" id="id-my-file" name="my_file" multiple>
    <input type="submit" value="Submit"/>
</form>






<script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>


<script src="/libs/universe/Ling/JFileUploader/fileuploader.js"></script>


<script>
    $(document).ready(function () {
        $('#id-my-file').fileUploader({
            serverUrl: "/backend-success.php",
        });
    });
</script>
</body>
</html>
```


Displaying errors
--------------

Js file uploader doesn't display errors by default.
In order to display errors, we need to use the errorContainer module.

This is done by setting the options **useErrorContainer** and **errorContainer**.
There is more to this module, but that's the base.

Also, this module requires quite a lot of work: we need to prepare an html element which will host the errors,
and we need to hide it from the view (display: none).

Don't worry, other modules are generally easier to setup.




```html
<form action="" method="post">
    <input type="file" id="id-my-file" name="my_file" multiple>
    <div id="id-fileuploader-error-container" style="display: none">
        <strong>Oops!</strong> The following errors occurred:
        <ul>
        </ul>
    </div>
    <input type="submit" value="Submit"/>
</form>





<script>
    $(document).ready(function () {
        $('#id-my-file').fileUploader({
            serverUrl: "/backend-error.php",
            useErrorContainer: true,
            errorContainer: $('#id-fileuploader-error-container'),
        });
    });
</script>
```


Validation
-------------

Now that our errors are displayed, let's display some validation errors to see how it looks like.
There are different things we can validate: 
- the max file size
- the mime type

In this example, I set a very low max file size (5 bytes), so that almost any file you will upload will fail the validation test.


Upload an image and you will see the validation error message appear on your screen. 
Notice that the validation phase occurs BEFORE the file is even sent to the server.

Now in this case, since the validation failed, the file WILL NOT be sent to the server.


```html
<form action="" method="post">
    <input type="file" id="id-my-file" name="my_file" multiple>
    <div id="id-fileuploader-error-container" style="display: none">
        <strong>Oops!</strong> The following errors occurred:
        <ul>
        </ul>
    </div>
    <input type="submit" value="Submit"/>
</form>





<script>
    $(document).ready(function () {
        $('#id-my-file').fileUploader({
            serverUrl: "/backend-error.php",
            useErrorContainer: true,
            errorContainer: $('#id-fileuploader-error-container'),
            maxFileSize: 5,
        });
    });
</script>
```


Drop zone
----------

It's kind of boring to have to click on the input file, then choose a file.

Let's create a dropzone, so that we can drag'n'drop our files directly.

To make the js file uploader react to a drop zone, we need to create a drop zone element,
and reference it to the js file uploader plugin.

When we do this, this activates the dropzone module automatically.


Notice that I used the ".file-uploader-dropzone" css class on the drop zone.
This refers to a built-in style that you can find in the tiny **fileuploader.css** file.

It basically creates some padding and a dashed border around the dropzone.


```html
<form action="" method="post">
    <input type="file" id="id-my-file" name="my_file" multiple>
    <div id="id-fileuploader-error-container" style="display: none">
        <strong>Oops!</strong> The following errors occurred:
        <ul>
        </ul>
    </div>

    <div class="file-uploader-dropzone" id="id-fileuploader-dropzone">Or drop file</div>


    <input type="submit" value="Submit"/>
</form>





<script>
    $(document).ready(function () {
        $('#id-my-file').fileUploader({
            serverUrl: "/backend-error.php",
            useErrorContainer: true,
            errorContainer: $('#id-fileuploader-error-container'),
            maxFileSize: 5,
            dropzone: $("#id-fileuploader-dropzone"),
        });
    });
</script>
```


Progress handler
--------------
Sometimes we need to upload big files, like video.

It would be kind of cool if we had a progress bar showing the progress of the upload while it's uploading.

Well, the js file uploader plugin provides us with the progress handler module which does just that.

Again, we need to activate the module, and create an empty element which will hold the progress bars.

Of course, we could rebuild one of our own, but if you want a quick progress handler you can use this module,
which by the way is quite customizable (see the doc for more details).

Try to drop a video to see the progress bar (if the file is too small, the uploading will be too fast and you'll not
see the progress bars).

I forgot to mention that by default the progress bars style use bootstrap4.
So, we need to include the bootstrap4 assets for a better rendering, but for this example I will not include them
(I just want to give functional examples, I don't care about design yet).



```html

<form action="" method="post">
    <input type="file" id="id-my-file" name="my_file" multiple>
    <div id="id-fileuploader-error-container" style="display: none">
        <strong>Oops!</strong> The following errors occurred:
        <ul>
        </ul>
    </div>

    <div class="file-uploader-dropzone" id="id-fileuploader-dropzone">Or drop file</div>
    <div id="id-fileuploader-progress"></div>


    <input type="submit" value="Submit"/>
</form>


<script>
    $(document).ready(function () {
        $('#id-my-file').fileUploader({
            serverUrl: "/backend-success.php",
            useErrorContainer: true,
            errorContainer: $('#id-fileuploader-error-container'),
            maxFileSize: -1, // -1 means any size is allowed
            dropzone: $("#id-fileuploader-dropzone"),
            useProgressHandler: true,
            progressHandlerContainer: $('#id-fileuploader-progress'),
        });
    });
</script>
```


urlToForm module, creating some inputs
------------------
All that we did so far was pretty fun, but if we were to post the form right now we wouldn't have the
uploaded files in our $_POST array.

Now with the urlToForm module activated, the js file uploader will actually create one input per file uploaded.

The maximum number of files that we can upload is ONE by default.
Let's raise that number a bit so that we can play with the urlToForm module and see how it behaves.

In fact, you will observe that if maxFile is equal to one, the urlToForm module creates one input which will
create a scalar value (i.e. a string) in your $_POST array.

However when maxFile is more than one, the urlToForm module creates as many inputs as there are uploaded files,
and the value in your $_POST array is an array.

To setup the urlToForm module, we need to activate the module, and define an html container.


Play with maxFile, and see what happens. Note: you'll need to inspect the source code (dynamically),
since the added inputs are of type hidden (they won't show up on the screen).

You might also notice that all inputs have the same url of **/uploads/my-video.mp4**,
that's just because the backend service is a fake service that returns this string.

In production, you would code a real upload service which would return the file that you uploaded.




```html

<form action="" method="post">
    <input type="file" id="id-my-file" name="my_file" multiple>
    <div id="id-fileuploader-error-container" style="display: none">
        <strong>Oops!</strong> The following errors occurred:
        <ul>
        </ul>
    </div>

    <div class="file-uploader-dropzone" id="id-fileuploader-dropzone">Or drop file</div>
    <div id="id-fileuploader-progress"></div>
    <div id="id-fileuploader-urltoform"></div>


    <input type="submit" value="Submit"/>
</form>


<script>
    $(document).ready(function () {
        $('#id-my-file').fileUploader({
            serverUrl: "/backend-success.php",
            useErrorContainer: true,
            errorContainer: $('#id-fileuploader-error-container'),
            maxFileSize: -1, // -1 means any size is allowed
            dropzone: $("#id-fileuploader-dropzone"),
            useProgressHandler: true,
            progressHandlerContainer: $('#id-fileuploader-progress'),
            maxFile: 3,
            useUrlToForm: true,
            urlToFormContainer: $('#id-fileuploader-urltoform'),
        });
    });
</script>
```




File visualizer module
----------------

Another thing that we can do with the js file uploader is make it show us a preview of the uploaded files.

Now when the uploaded file is an image, the image would be displayed, but in this example, the backend service
returns a video, so a video icon will be displayed by default.

Look at the various options provided by this module to customize it the way you want.


Again, like most other modules, the setup consist of activating the module and creating a container html element.


You will also notice that I used some special css classes: **.file-uploader-filevisualizer** and **.w100**.
Those are built-in css classes that you can find in the tiny **fileuploader.css** file.
They will give a basic styling to the file visualizer, and make sur that the generated thumbnails have a width of 100px.


```html
<form action="" method="post">
    <input type="file" id="id-my-file" name="my_file" multiple>
    <div id="id-fileuploader-error-container" style="display: none">
        <strong>Oops!</strong> The following errors occurred:
        <ul>
        </ul>
    </div>

    <div class="file-uploader-dropzone" id="id-fileuploader-dropzone">Or drop file</div>
    <div id="id-fileuploader-progress"></div>
    <div id="id-fileuploader-urltoform"></div>
    <div id="id-fileuploader-filevisualizer" class="file-uploader-filevisualizer w100"></div>


    <input type="submit" value="Submit"/>
</form>


<script>
    $(document).ready(function () {
        $('#id-my-file').fileUploader({
            serverUrl: "/backend-success.php",
            useErrorContainer: true,
            errorContainer: $('#id-fileuploader-error-container'),
            maxFileSize: -1, // -1 means any size is allowed
            dropzone: $("#id-fileuploader-dropzone"),
            useProgressHandler: true,
            progressHandlerContainer: $('#id-fileuploader-progress'),
            maxFile: 3,
            useUrlToForm: true,
            urlToFormContainer: $('#id-fileuploader-urltoform'),
            useFileVisualizer: true,
            fileVisualizerContainer: $('#id-fileuploader-filevisualizer'),
        });
    });
</script>
```



Callbacks
-----------

I believe we've seen all the modules already, at least the surface of them.

Now what we can do is hook some custom logic into the plugin using callbacks.

The js file uploader plugin provides us with the following callbacks:

- onReceive: allow us to validate a file with some custom logic
- onProgress: allow us to implement a custom progress handler
- onError: allow us to do something whenever an error occurs
- onSuccess: allow us to do something whenever a file is successfully uploaded on the server (the backend returned a success response)


I'm pretty sure you can figure how those work on your own, but I will give you at least one example.
In this section, I'll show you how to invalidate a file name which contains the word justinbieber (nothing personal).


Now try to upload a file named **justinbieber.png** for instance, and you won't be able to.

Notice that we can use the addError method from inside this callback, to add an error the "official" way.

```html
<form action="" method="post">
    <input type="file" id="id-my-file" name="my_file" multiple>
    <div id="id-fileuploader-error-container" style="display: none">
        <strong>Oops!</strong> The following errors occurred:
        <ul>
        </ul>
    </div>

    <div class="file-uploader-dropzone" id="id-fileuploader-dropzone">Or drop file</div>
    <div id="id-fileuploader-progress"></div>
    <div id="id-fileuploader-urltoform"></div>
    <div id="id-fileuploader-filevisualizer" class="file-uploader-filevisualizer w100"></div>


    <input type="submit" value="Submit"/>
</form>


<script>
    $(document).ready(function () {
        $('#id-my-file').fileUploader({
            serverUrl: "/backend-success.php",
            useErrorContainer: true,
            errorContainer: $('#id-fileuploader-error-container'),
            maxFileSize: -1, // -1 means any size is allowed
            dropzone: $("#id-fileuploader-dropzone"),
            useProgressHandler: true,
            progressHandlerContainer: $('#id-fileuploader-progress'),
            maxFile: 3,
            useUrlToForm: true,
            urlToFormContainer: $('#id-fileuploader-urltoform'),
            useFileVisualizer: true,
            fileVisualizerContainer: $('#id-fileuploader-filevisualizer'),
            onReceive: function (file, index) {
                if (-1 !== file.name.indexOf("justinbieber")) {
                    this.addError("I don't want to upload that file sorry");
                    return false;
                }
                return true;
            }
        });
    });
</script>
```



So that's it for now. Those are just basic examples, but hopefully they'll get you started.

The js file uploader is quite flexible, I hope it will save you some time.





History Log
=============


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






