File editor conception notes
===========
2020-01-24 -> 2020-02-21




So now that the main file uploader is implemented, I want the user to be able to rename the files, and crop the images,
all that from that same gui.



The file editor dialog
--------------
2020-01-28 -> 2020-02-21




So I found this amazing cropper tool: [cropperjs](https://github.com/fengyuanchen/cropperjs/blob/master/README.md),
and I decided that I would use it to handle the cropping for the fileuploader. 

After playing a while with it, I found a synopsis that could work:

when the user clicks a file item in the uploader, a file editor dialog opens, and the user can rename the file and/or
crop the image (if the file is an image).


The theme responsibility is to open the dialog, and and return a reference to the dialog html container element, so that the core
can initialize/handle the cropping part (cropperjs needs a reference to the image, and so the dialog container element
allows the core to access the image and therefore re-initialize the cropper).


Also, I like to initialize the cropper only AFTER the dialog is opened, just in case the dialog creation, 
which depends on the theme (i.e. we don't know what specific dialog tool will be used), recreates a new html
container every time.


Then I also decided to include more parameters to the file editor.
Those extra-parameters are described in the [fileEditor protocol addition](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/pages/ajax-file-upload-protocol.md#the-fileeditor-protocol-addition).



The file editor itself must have the following html/css structure (used by the core):

    
- .image-editor-toolbar: a toolbar containing some cropperjs specific action (rotate, refresh, ...). See the cropperjs doc/demo for more insights.
- .image-original: place this on the original image (img tag) used by the cropperjs tool.
- .the-submit-button: the submit button of the file editor




Note 1: the file name has been broken in two parts on the gui side: the base name and the file extension, 
    and the file extension cannot be changed by the user.
    That's because I didn't want the user to tamper with the file extension, as it's an unnecessary burden for the user
    to deal with (I believe).
    Yet the gui re-compiles the basename and extension back to a single file name before sending it to the server,
    since server side, it should be possible to update the filename entirely. 



About the filename
----------
2020-02-11


The filename is sent by our gui to the server.
But under the term filename, we actually have different cases.

It's possible for the server to decide in advance that all the files uploaded by the user will be in an arbitrary directory (for instance an **images/** directory).
That would be the case if the user was to upload the image files for a slider for instance.
When that's the case, I would like the gui user to know that her files will be put in that **images** directory; this information is not updatable by the user, but at least the user
sees it. Hence I want to introduce the **parentDir** option.

By default, **parentDir** is null, which means that the developer has not defined any parent directory.
In that case, the user will rightfully assume that the filename will be placed under her root directory.

When the **parentDir** is set, then the value of that **parentDir** will appear in the gui in a disabled control, so that the user can see it, but cannot edit it.

In both cases, the server might allow the use of slashes in the filename, thus allowing the user to organize herself inside the chosen 
parent directory (or the user's root directory if **parentDir** is null). 

In other words, the **parentDir** option represents the server's intention about where to place the uploaded file, but it's not sent to the server via the gui (because the server already
knows that information).




 
The file editor options
----------
2020-02-21

All options are explained in the source code comment of the **FileUploader** object, in the 
**fileuploader.js** file.
    
    
    
    