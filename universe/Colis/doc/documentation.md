Colis Documentation
=========================
2016-01-14




- [Colis global picture](https://github.com/lingtalfi/Colis/blob/master/doc/documentation.md#colis-global-picture)
- [Colis options](https://github.com/lingtalfi/Colis/blob/master/doc/documentation.md#colis-options)
- [Extending colis](https://github.com/lingtalfi/Colis/blob/master/doc/documentation.md#extended-colis)
- [Colis ling](https://github.com/lingtalfi/Colis/blob/master/doc/documentation.md#colis-ling)
- [Colis ling options](https://github.com/lingtalfi/Colis/blob/master/doc/documentation.md#colis-ling-options)
- [Colis ling services](https://github.com/lingtalfi/Colis/blob/master/doc/documentation.md#colis-ling-services)
- [Playing with the colis-ling demo](https://github.com/lingtalfi/Colis/blob/master/doc/documentation.md#playing-with-the-colis-ling-demo)
- [Performances tips](https://github.com/lingtalfi/Colis/blob/master/doc/documentation.md#performances-tips)




Colis global picture
-----------------


![colis global picture](http://s19.postimg.org/keuvg190j/colis_global_picture.jpg)


Colis options
-----------------

```js
{
    selector: {}, // selector reserved conf
    preview: {}, // preview reserved conf
    uploader: {}, // uploader reserved conf

    /**
     * This is the jquery handle to the selector element.
     * It is required but set automatically if you instantiate colis
     * as a jquery plugin
     */
    jInput: null,
    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/    
    /**
     * The items to display in the selector.
     * Items can be:
     * - an array of item names
     */
    items: [],
    /**
     * url of the info service
     */
    urlInfo: '/libs/colis/service/ling/colis_info_fast.php',
    /**
     * This should be sent to each service request.
     * You can use this to build application logic.
     */
    requestPayload: {},
    /**
     * Should be called everytime a service call responds with an (tim) error
     */
    onRequestError: function (m) {
        console.log(m);
    },
    /**
     * void  function ( info )
     *      What's inside info depends on your implementation.
     *      info array is returned from the colis_info service.
     */
    onPreviewDisplayAfter: noop
}
```








Extending colis
-----------------

The colis code (in colis.js) itself doesn't do much by itself.
It needs an implementation to be useful.

What colis does is define which objects are going to be use (a selector, a preview and an uploader),
and the basic behaviour between those objects, but yet it doesn't implement those objects!

That is, if you look in the source code of colis.js, you will find empty objects that need to be overridden.
Colis expects the implementation to override the following methods (the code below is actually the relevant
part from the colis.js source code):
 
 
```js 
window.colisClasses.uploader.prototype.build = function (oColis, conf) {

};
window.colisClasses.preview.prototype.build = function (oColis, conf) {

};
window.colisClasses.preview.prototype.display = function (info) {
    // displays the info in the preview
};
window.colisClasses.selector.prototype.build = function (oColis, conf) {
    // override, and implement your selector here
};
window.colisClasses.selector.prototype.appendItem = function (name) {
    // append an item to the current list
};
window.colisClasses.selector.prototype.setValue = function (name) {
    // set the value of the control to the given name
};
``` 


As for now, there is only one implementation called ling (in colis-ling.js).
There is more information about colis-ling later in this document.






Colis Ling
-------------


Colis ling defines the body of the colis "empty" methods.
It uses:

- typeahead (https://github.com/twitter/typeahead.js) as the selector
- pluploader 2.1.8 as the uploader (http://www.plupload.com/)
- a self coded preview 




Colis ling options
--------------------

For the selector, colis-ling uses the typeahead options and datasets.

#### typeahead options and datasets

```js
{
    options: {
        hint: true,
        highlight: true,
        minLength: 1,
        classNames: {
            menu: 'tt-menu'
        }
    },
    datasets: {
        name: 'myDataset',
        limit: 100,
        source: substringMatcher()
    }
}
```


#### preview options

For the preview, colis-ling uses the following options:


```js
{
    /**
     * This is required, but this is automatically set to the right value if you 
     * instantiate colis as a jquery plugin
     */
    jPreview: this.jPreview,
    /**
     * Whether or not to display the preview on startup.
     * The default is false to save some space on the page.
     */
    showOnStartup: false,
    /**
     * Handler know how to display the info coming from the info service.
     * 
     * Every type of info has its own handler.
     * You can create your own handlers.
     * 
     * The default (builtin) handlers are image, localVideo, externalVideo, youtube and none.
     * 
     * 
     * This implementation expects that the info map contains at least a "type" key which value
     * is something like "image", or "video", or "none" if no info was available.
     *
     * 
     * For instance, the info map corresponding to the "image" handler should look like this:
     *
     * - info:
     * ----- type: image
     * ----- src: /url/to/image.jpg  (or possibly starting with http://)
     *
     * 
     *
     */
    handlers: {
        image: function (info, jPreview) {
            var url = info.src;
            jPreview.find(".colis_polaroids").empty().append('<li><a href="' + url + '" target="_blank' +
            '"><img src="' + url + '" alt="' + url + '"></a></li>');
        },
        localVideo: function (info, jPreview) {
            var url = info.src;
            var duration = info.duration;
    
            jPreview.find(".colis_polaroids").empty().append('<li>' +
            '<video width="100" controls>' +
            '<source src="' + encodeUrl(url) + '" type="video/mp4">' +
            'Your browser does not support the video tag.' +
            '</video>' +
            '<div class="colis_preview_additional_info">' +
            '<div class="inner"><ul>' +
            '<li>' + _("Duration") + ': ' + formatDuration(duration) + '</li>' +
            '</ul></div>' +
            '</div>' +
            '</li>');
        },
        externalVideo: function (info, jPreview) {
            var url = info.src;
            var duration = info.duration;
    
            jPreview.find(".colis_polaroids").empty().append('<li>' +
            '<video width="100" controls>' +
            '<source src="' + encodeUrl(url) + '" type="video/mp4">' +
            'Your browser does not support the video tag.' +
            '</video>' +
            '</li>');
        },
        youtube: function (info, jPreview) {
            jPreview.find(".colis_polaroids").empty().append('<li>' +
            info.iframe +
            '<div class="colis_preview_additional_info">' +
            '<div class="inner"><ul>' +
            '<li>' + _("Title") + ': ' + info.title + '</li>' +
            '<li>' + _("Description") + ': ' + info.description + '</li>' +
            '<li>' + _("Duration") + ': ' + formatDuration(info.duration) + '</li>' +
            '</ul></div>' +
            '</div>' +
            '</li>');
            //jPreview.find('iframe').attr("width", "30%");
        },
        none: function (info, jPreview) {
            jPreview.find(".colis_polaroids").empty();
        }
    
    }
}
```


#### uploader options

For the uploader, colis-ling uses mainly the plupload options. 

```js
{
    //------------------------------------------------------------------------------/
    // THIS IMPLEMENTATION'S SPECIFIC OPTIONS
    //------------------------------------------------------------------------------/
    /**
     * required, but automatically set if you instantiate your 
     * colis as a jquery plugin.
     */
    jDropZone: this.jDropZone, 

    //------------------------------------------------------------------------------/
    // PLUPLOAD OPTIONS
    //------------------------------------------------------------------------------/
    /**
     * Please refer to plupload documentation for more details.
     */
    browse_button: this.jBrowse[0],
    url: '/libs/colis/service/ling/colis_upload_fast.php',
    multipart_params: {
        id: 'none'
    },
    filters: {
        // Specify what files to browse for
        mime_types: [
            {title: "Image files", extensions: "jpg,gif,png,mts,avi,psd,mp4"},
            {title: "Zip files", extensions: "zip"}
        ],
        // Maximum file size
        max_file_size: '2000mb'
    },
    /**
     * I noticed that the bigger the chunk, the faster the upload...
     */
    chunk_size: '1mb',
    unique_names: false,
    drop_element: this.jDropZone[0]
}
```



Colis ling services
-------------------

Creating colis services was a trial and error process.
I made three attemps, each of which is in the "service" folder.
That's because I believe having various implementations examples can help.


The colis ling services come in flavours, there are three flavours, each corresponding to an attempt.

- fast 
- profiles
- mixed

Each flavour is declined into two services: 

- the upload service, responsible for handling the upload to the server
- the info service, responsible for giving information (meta data) about an existing item


There is actually a fourth flavour called "new", but there is only the upload service version of it.



The differences between flavours are explained inside the comments of the corresponding services, 
and I invite you to read more from there. 
The default flavour is fast, for pedagogic reasons. 
 
 
In a nutshell, all flavours do basically the same thing, but the level of organisation that they offer varies.
 

- the fast flavour is the first one that was implemented, it is meant to get the basics of chunking right.
            It does not offer a lot of flexibility, and therefore it's very straight forward and fast.
            
- the profiles version is the first evolution based on the fast flavour, it uses configuration profiles,
            which bounds a profile to an id that the client must pass. 
            
- the mixed version gives you even more flexibility, and even forces you to create oop code. 
                        
            
            
            

Playing with the colis-ling demo
--------------------------------
 

### upload a video 

So last time we tested the demo with the images and it (hopefully) worked.
Now let's say we want to upload a video.

You need to change the function that gets the video duration first.

When you upload a video, once uploaded, the upload service tries to get the duration of that video by calling a 
getVideoDuration function.

Open the **/www/libs/colis/service/ling/inc/demo.func.php** file, read the comments and adapt the code to your needs.

Now, you should be able to upload a video and have the duration be displayed correctly.
    
    
### paste a youtube url

There is another thing that this demo does: it can read meta data from a youtube url when you paste it in the selector.

Sounds great? Sure, but...

You first need to have a YouTube API_KEY.
That's because the code used by the demo uses the YouTube V3 API, which requires a YouTube API_KEY.

Go find a YouTube API_KEY on the internet, then open the **/www/libs/colis/service/ling/inc/colis_init_fast.php** file and
paste your key around line 21.

Now, you should be able to paste a youtube url and get the corresponding meta data be displayed in the preview.
 
 
 
 
### testing flavours

Remember the demo code from the [Colis home page](https://github.com/lingtalfi/Colis)? 
It looked like this:
 
```js 
<script type="text/javascript">

    (function ($) {
        $(document).ready(function () {
            var itemList = <?php echo json_encode($uploadedFiles); ?>;
            $('.colis_selector').colis({
                selector: {
                    items: itemList
                }
            });
        });
    })(jQuery);


</script>
```

Let's make some options more explicit.
The code below does the exact same thing as the code above.


```js 
<script type="text/javascript">

    (function ($) {
        $(document).ready(function () {
            var itemList = <?php echo json_encode($uploadedFiles); ?>;
            $('.colis_selector').colis({
                urlInfo: '/libs/colis/service/ling/colis_info_fast.php',
                selector: {
                    items: itemList
                },
                uploader: {
                    url: '/libs/colis/service/ling/colis_upload_fast.php'
                }
            });
        });
    })(jQuery);


</script>
```

That is, the default flavour is fast.
But now our code is better, because now we can change easily change the fast flavour to another flavour if we want to.


### testing profiles flavours


To test the profiles flavour, let's try the following code:


```js 

<script type="text/javascript">

    (function ($) {
        $(document).ready(function () {
            var itemList = <?php echo json_encode($uploadedFiles); ?>;
            $('.colis_selector').colis({
                urlInfo: '/libs/colis/service/ling/colis_info_profiles.php',
                requestPayload: {
                    id: "episode-thumbnail"
                },
                selector: {
                    items: itemList
                },
                uploader: {
                    url: '/libs/colis/service/ling/colis_upload_profiles.php'
                }
            });
        });
    })(jQuery);


</script>

```

The profileId is in this demo: episode-thumbnail.
On the server side, in the **/www/libs/colis/service/ling/inc/colis_init_profiles.php** file, it 
corresponds to an (sole) existing profile.

The strategy behind the profiles flavour is to control the behaviour of the uploaded chunks via a profileId. 


### testing mixed flavours

Mixed is based on the profiles flavour, but it uses oop code.
It was originally designed to include the colis control into the [meredith](https://github.com/lingtalfi/Meredith) workflow.


```js
<script type="text/javascript">

    (function ($) {
        $(document).ready(function () {
            var itemList = <?php echo json_encode($uploadedFiles); ?>;
            $('.colis_selector').colis({
                urlInfo: '/libs/colis/service/ling/colis_info_mixed.php',
                requestPayload: {
                    id: "episode-thumbnail"
                },
                selector: {
                    items: itemList
                },
                uploader: {
                    url: '/libs/colis/service/ling/colis_upload_mixed.php'
                }
            });
        });
    })(jQuery);


</script>
```





Performances tips
--------------------


Short story, increase your chunk size.

Long story, read below.

While playing with the services, I tried to change the upload service code a lot (hence the three flavours), because I noticed that
it had a huge impact on performances.

But, 

I forgot the most obvious parameter: the chunk size.
Since chunks are repeatedly sent to the server, the poor server has to treat a lot of requests.
Reducing the number of requests frees the server resources A LOT!, and yet you still have your progress bar ;)

The default chunk size I was playing with was 1Mo.
This is still the default, because php, by default has an upload_max_filesize of 2Mo, and we need to be below that threshold (or the server
respond with an enigmatic error like for instance 403: "colis error: Failed to move uploaded file").

You should really try to increase the upload_max_filesize and post_max_size values to your preferred values, but here is the thing:
if for some reasons you don't want to update your php.ini, and if you are using apache, you can actually change those values from 
your .htaccess.
  
  
```bash
php_value upload_max_filesize 50M
php_value post_max_size 50M
```

Remember that the chunk size must be less than (strictly) the upload_max_filesize value.

