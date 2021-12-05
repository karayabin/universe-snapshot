JLingHelpers, conception notes
================
2021-08-03

Some js tools I use to make my life easier.



The addToast method
---------
2021-08-03


This method adds a [bootstrap5 toast](https://getbootstrap.com/docs/5.0/components/toasts/) in a **toast container** (see b5 docs for more info about **toast container**).

Before you can use the addToast method, you need to create a toast context, which contains the **toast container** and a hidden toast template in it.

Add this in your html, preferably just after the opening body tag so that there is no interference with other elements:

```html

<div id="toast-context" aria-live="polite" aria-atomic="true" class="position-relative" style="z-index:10">
    <div class="toast-container position-absolute top-0 end-0 p-3">


    </div>
    <div class="d-none tpl-toast">
        <!-- Then put toasts within -->
        <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <div style="width:20px; height:20px" class="type-marker rounded-1 me-2"></div>
                <strong class="me-auto">KitStore</strong>
                <small class="text-muted time-marker">just now</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                See? Just like this.
            </div>
        </div>
    </div>
</div>
```


You can customize all the parts of it to your liking, but some conventions have been established.


By default, (i.e., customizable via the LingHelpers._toastOptions) the context element has an id of toast-context.

Inside the context, the following elements and css classes are expected:

- **.toast-container**: the toast container, which will contain all the toasts to be displayed
- **.tpl-toast**: the hidden element that contains the toast template
- **.toast**: the toast template (it must be inside the **.tpl-toast** element), we will clone it every time we need to add a toast


The toast template is customizable, as toasts in general are highly customizable.
We provide the following conventions that you can use to your advantage:

- **.toast-body**: the message of the toast will be injected in that element. It can contain html.
- **.type-marker**: if such an element is found, we will add some css class to it, based on the toast type argument.
    The map of toast_type => css_class_to_add is customizable via the _toastOptions.
    The goal of this element is to provide a color hint about the toast type (i.e., red for error, green for success, etc...).
- **.time-marker**: if such an element is found, we will add a time hint about the time the toast was printed (and refresh it every second).
    This time hint works in reverse (i.e., just now, 10 seconds ago, 1 minute ago, 2 hours 37 minutes ago, etc...).


Once your html is setup, simply call our method:

```js
LingHelpers.addToast("This is an info message", "info");
```

The default types are:

- warning
- info
- success
- error


You can customize the types via the **_toastOptions** property.












