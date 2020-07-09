JFileUploader conception notes
===========
2020-01-10 -> 2020-01-23




Those notes corresponds to the transition from version 1 to version 2.
However now JFileUploader is in version 3, so those notes are deprecated.



My previous version of fileuploader (fileuploader-v1.js) was working fine,
but it felt hard to extend it when I tried to play with it (trying to implement a resize feature on top of it).

So I guess I will redo it. This is now version 2, but the file will be **fileuploader.js**.

In this version, one of my goals is to have a clean js design, so that if I want to extend this tool later it will
be easier.
Also, the conception notes here, and the documentation are both an effort in the same direction.



Motivation, goals
-----------
2020-01-10


I would like to start by stating my motivation, and expose the main ideas I have in mind.

Do you know about ajax upload progress bars?
You know when the user uploads a file and you see that progress bar. 

I've implemented already it in version 1 of fileuploader, but I didn't really understood how it worked.

Until today, I've always thought that the each progress step (for instance 2%, then 10%, then 35%, all the way up to 100%)
were making calls to a server script.

But that's not the case. Today, I just discovered that the whole upload causes only ONE server script call, the progression
being handled by the client side.

Where do I go with that? Nowhere, I just wanted to share that with you in case you didn't know it.


Ok now let's start with the basic communication synopsis that I plan to use in conjunction with the new fileuploader.
It's important, because other scenarii might require another version of the fileuploader.

In other words, I'm telling you that I'm just creating the fileuploader.js for my own use intents, nothing else.



The main idea 
----------
2020-01-10

So here is a description of my ideal scenario for the fileuploader:


There is an html form on a web page and the user can upload one or multiple files (for instance an avatar, or all the photos
of an image gallery).

The user can select the file(s) to upload, either via clicking on the browse button, or by dropping files into the drop zone.
When she does so, the files are added to the queue, and can be optionally immediately or later, without affecting any other parts.

The uploading of the file will use a server side script called the **upload handler** in this discussion.
I actually like the idea of having a dedicated server side script to handle all uploads, and so that's what the **upload handler** will do.
The server side script checks any problem (such as max storage limit per user), stores the file and returns a safe url,
and possibly resized the image.


The user can then operate on the file (before or after it's uploaded), using js magical power.
I will try to implement (not sure if it's 100% possible yet) things such as name editing, and an image editor that features
at least a cropping tool.
Such file operations are performed by the user using the client side only.


Once the file is customized by the user, the user fills the other fields of the form and submits the form.


When the submit button is pushed, and before the other fields data is sent, we upload the selected files (if they haven't been uploaded already)
by sending them to a dedicated server side script (**upload handler**), which return one url per file.

The js code then injects the url(s) as regular input(s) type=hidden in the form.

Then the operations on files (name editing, cropping, ...) are processed.
To do so we use yet another server side script: the **file operation handler**.
We strategically trigger the **file operation handler** only once at this moment, so that the user can change her mind as many times
as she wants before committing her changes, and then we will only trigger the **file operation handler** once when she commits.
This script applies the operations on the files and possibly update the file url in the input type hidden.

In the end, the static form is submitted, and the input type hidden fields corresponding to our file uploader system are sent and validated as
a regular bunch of urls (i.e. the static validation isn't aware that the files have been uploaded and/or modified).  


So the main ideas out of this conception are the following:

- from a static point of view, the file control is seen only as an input of type hidden (or an array of input type hidden in case of multiple files) 
- there is an **upload handler** server side script that handles the upload and return an url (it checks the max limit storage per user problem).
    The **upload handler** might also resize an image, and therefore I recommend to upload the images immediately after selection, to work with the 
    correct file resolution as soon as possible. 
- there is an **file update handler** server side script that handles files modification such as file name change and cropping.
    I suggest keeping the original image and create (using filename convention) additional cropped versions, so that the user can try new crops later.
 
 
 

Conception sketch
-----------
2020-01-10


Now that the main synopsis has been established, let's try to design some js objects to help realizing it.


I always like to start with an error handler.

But before I do so, let's talk about a apparently recurrent topic in my javascript experience: theme.


### Theme


In all javascript widgets, there is a visual part with which the user interacts.
I believe the designer should always be able to customize this part.

In order to make a clearer separation between the functional code and the visual part, I would like
to introduce the concept of **theme** in my own js designs.

The **theme** of a widget being the js object that holds everything related to the visual part of the widget.

So for instance in the case of an error container, the theme will basically know how to display the error (in an li, a span, a div, etc, and
with which css class etc...).

And so my fileuploader will be the first of my js objects to use this **Theme** idea (I'm excited).
Goes without saying that the **Theme** of the fileuploader will have methods specific to that fileuploader.
We will see later what those methods are.

The **Theme** will be in its own file for organization sake, and will be registered to the fileuploader.

The **theme** registration will actually be done automatically just by including the theme file, which MUST then be called
AFTER the main fileuploader file, and will be responsible for registering itself. 

The **registerTheme** method (in the fileuploader object) will be available for that purpose.



### Error system
2020-01-10


Update 2020-01-20, this system was removed. 






Back to the error system.

I'll have two objects:

- an error handler which will store the user errors. Note: the developer errors system is different.
- an error container, which will display the errors

The **error container** will be basically reflecting the error handler state.
Those two objects will be connected via an events system.

So I guess I need to create the events system first.
I will create a **dispatcher** object with the following methods:

- on ( string event, callable fn )
- dispatch ( string event, ?arguments )


So basically the **ErrorHandler** will have at least the following method:

- add ( string errorMessage )

Which will, for now, internally trigger the **onErrorAdded** event.
And the **ErrorContainer** object will listen to that **onErrorAdded** event and will be responsible for displaying
the error message to the user. 


So now that this is done, to trigger an error inside the fileuploader, we can do something like this:

```js
this.errorHandler.add("Oops, something went wrong."); 
```





Browser compatibility
------
2020-01-10


With this second version of fileuploader, I will use the full power of the most modern browsers: chrome and firefox.
For other browsers, I will just implement a basic fallback that does nothing but the traditional upload. 
In other words, if you want to access the rename, resize and other cool features, just use a decent browser.

I do this because otherwise I might not be able to implement such a tool in the timespan I've gave myself.



Main container
-------------
2020-01-13
    
    
The whole widget is contained inside a div (or other html element) called container,
so that:
- I can provide auto-builders which we build the widget (inside the container) automatically.
        This is what most js plugin providers do, so that the client can just plug'n'play.
- the user (of this plugin) can always create a new widget html structure using simple html code.
        This ensures that everything is still possible (i.e. you're not forced to use an auto-builder).  


A la carte features
----------
2020-01-13


All features of the widget can be activated/deactivated.
I'll use the useXXX naming convention for each feature, which value is a boolean.

So for instance:

- useErrorContainer: bool=true. Note: I consider the error container as a feature,
    as I could create another version (i.e. errorContainer2 for instance) in the future.


    
    

Max file and the returned value
------------
2020-01-13


The goal of this widget is to return either an url, or an array of urls.
In order to do that, the widget creates the appropriate number of input type hidden, with the appropriate
name attribute.

Whether it's a scalar or an array depends on the **maxFile** option.
If maxFile = 1, then a scalar should be returned, and therefore the name attribute of the input type hidden will
not have the trailing square brackets.

If maxFile > 1, then an array should be returned, and therefore the name of every input type hidden will end with
the square brackets (in order to generate that array in the $_POST).





The queue system
------------
2020-01-13 -> 2020-01-17


First, because our items (the files) are not necessarily uploaded immediately, let's create a queue object.
I would like to try it with the js File api for now.

- Queue
    - addFile
    - getFiles
    
    
The queue system handles files to be uploaded only.
Once a file is uploaded, it's not part of the queue anymore, it goes to the HiddenFileInputContainer (see more details in the corresponding section
of this document).    

In other words, a file is either in the Queue or in the HiddenFileInputContainer, depending on whether it has been uploaded already.

In both cases, the file is visually represented in the file container (see the next section for more details).
    
    
File container
---------------
2020-01-14


As far as gui experience, I've just come across this plugin: https://www.plupload.com/examples/ui,
and I like it very much.
So I would reproduce something like it.
So the fileuploader has the following parts:

- header (which contains the list/image toggle buttons)
- drop zone (aka file container), into which we drop files
- footer, which contain various buttons and info
    - the add file button
    - the start upload button     
    - the global upload status/progress bar
    - the global size information
        
Then each item has its own line/cell, with the various File info: name, size (the type could be added too).
And the upload status, and, interestingly, the size BEFORE AND AFTER upload.
I found that interesting in that a file that originally weights 2M can end up weighing 10 kb by the way of resizing,
and my guess is that server side, we should not only return the url of the uploaded file, but also its new weight
(although I don't think that's how the plupload plugin does it).


I now realize how simplified my development will be, just because I chose to integrate all gui elements into a well defined
scheme, rather than having each component being totally independent from each other. Lesson learned for future development :)

In other words, it's easier to deal with ONE gui element with options, than with multiple gui elements, each with its own options.

Practically speaking, I now just have to build one widget.

Now I will use the term "widget class map" to coin that map of css class that will be used by both the theme (the painter)
and the main js controller (the brain of the widget).



Widget class map
---------
2020-01-14 -> 2020-01-24


- .fileuploader-widget: the html element containing the whole widget.
    It's used by theme files to style the whole widget, and therefore
    the theme css class must be put on that same element in order to apply a theme
    to the widget.
   
    - .input-file: the hidden file input that's used to hold the change event 
    - .fileuploader-item: an item representing a file. It's used to obtain the index of the file. 
        - .btn-remove-file: the remove file button.  
    - data-id=$itemId: the theme is responsible for adding this attribute on the same element than the .fileuploader-item.
        It's used by the core to access the inner file from a click in the gui.         
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





         
         
File and FileUrl
-----------
2020-01-17

To help with the development of this plugin, I introduce two concepts:

- file
- fileUrl


The file is basically the javascript File object.
We've got files when the user selects one or more files via the browser "open files" dialog,
or when she drops them into the drop zone.

The fileUrl is like a file, but it also has an url attached to it. The url in the widget takes the form
of a hidden input text.

So for our widget, a file selected by the user becomes a fileUrl only after being uploaded.

By default, when we speak about files (in this widget), we speak about
the file concept (i.e. not the fileUrl concept).


HiddenFileInputContainer
-------------
2020-01-17

The HiddenFileInputContainer handles the hidden inputs that are used as the return of the control when the form is posted.
So to recap, when the user selects a file, it first gets in the Queue.
Then when the files are uploaded, they are converted to hidden inputs.



FileList
-----------
2020-01-17

The fileList is the object used to store files.
It contains both files and fileUrls.

When file(s) are added by the user via the control (via "open file" dialog in the browser or dropzone),
then the files are added. 
When those files are then uploaded, they become fileUrls.
In an update form, the form can be initialized with some urls as the default value, those are directly
converted to fileUrls.

In every case, all those are handled by the fileList.
The trick I use to know whether the file is just a file or a fileUrl is that the fileUrl is like a file,
but it has an extra id property added to it, which refers to an url.



Thoughts about lang
------------
2020-01-17 2020-01-20


Here is the design I want as far as i18n.
If the user wants a non-english lang, she includes a file, that's it.

Now investigating the problem of lang, apart from the error messages which comes from the fileuploader object,
other messages come from the theme. 
And as a reminder, the server side script might return some error messages too, but that's outside
the scope of this js plugin.

So, we have to deal with this double origin for messages (fileuploader core and theme), and put them in one file.
Since each theme might have different messages, I suggest that the theme file writer put both the error messages
and the theme messages into that lang file.

Now because I plan to create all the themes myself, I will just put all the messages from all themes, plus 
the error messages from the core in one lang file (to avoid create one lang file per theme).

So basically for the user, just include the lang file, which will be named like this:

- /lang/fileuploader-XXX.js

Where XXX is the identifier of the lang, probably in iso 639-2 with 3 chars.


The lang object will basically have a get method with the following signature:

- get (msgId, ?number)


Where msgId is the message identifier and number is the optional parameter passed when the message contains a numeric element in it.

For instance if you want to translate "4 funny cats", you would use the get method like this:

- get ("{x} funny cats", 4)

 
And so the {x} expression will be replaced with 4.
Note, for now, {x} is the only available tag (this might change if I need more later). 
 
 


Validator system
--------
2020-01-21

The validator system is used to validate only files added by the user manually (i.e. not the fileUrls that are present
in the form in update mode).
It's a simple validation system that checks for file size and/or mime type.



Uploader engine
----------
2020-01-21

I named it uploader engine to avoid conflict with fileUploader which is the name of the plugin.
It's the object responsible for uploading the queue.
Communication with the server side follows a protocol:

- client sends the file to upload, server responds with a json response, which can be one of
    - in case of success, the json array structure should be:
         - **type**: success
         - **url**: (the url to the uploaded file treated by the server)
    
    - in case of error, the json array structure should be:
         - **type**: error
         - **message**: (the error message here...)




Properties of file and fileUrl
--------
2020-01-23


As said before, we distinguish between the queue files and the url files.
Both are javascript File objects, but they have the following extra properties:

- queue file:
    - itemId: the item id is used to target the item html. It's an unique identifier assigned to every file.
- url file:
    - itemId: the item id is used to target the item html. It's an unique identifier assigned to every file.
    - id: the id of the file, used to keep track of the bound hidden input 
    - url: the url of the file








         