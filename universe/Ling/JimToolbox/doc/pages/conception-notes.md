JimToolbox, conception notes
================
2021-04-15 -> 2021-05-01

Jim tool box is a toolbox located on the side of screen. You can click its different tabs to expand the corresponding
panels.





Screenshots
======
2021-04-15

### Collapsed

![jimtoolbox collapsed](https://lingtalfi.com/img/universe/JimToolbox/jimtoolbox-collapsed.png)

### Expanded

![jimtoolbox expanded](https://lingtalfi.com/img/universe/JimToolbox/jimtoolbox-expanded.png)





How does it work
==========
2021-04-15

JimToolbox require a certain html markup to function properly.

Here is how it works (note that both our js and css files are required):

```php

<?php

$nbItems = 4;

?>

<div class="jim-toolbox toolbox-close">
    <div class="toolbox-toggle">


        <div class="toolbox-toggle-top d-flex flex-column justify-content-center align-items-center mb-1">
            <i class="far fa-plus-square text-toggle-plus"></i>
            <i class="far fa-minus-square text-toggle-minus"></i>
            <i class="fas fa-arrow-up mt-3 arrow-icon arrow-icon-up"></i>
        </div>

        <div class="toolbox-toggle-container">

            <div class="toolbox-toggle-container-slider">

                <?php for ($i = 1; $i <= $nbItems; $i++): ?>


                    <div class="toolbox-toggle-item" title="Module <?php echo $i; ?>"
                         data-target="module-<?php echo $i; ?>">

                        <i class="fab fa-accusoft"></i>
                        <div class="toolbox-toggle-item-name">Option <?php echo $i; ?></div>
                    </div>
                <?php endfor; ?>
            </div>
        </div>

        <div class="d-flex justify-content-center mt-1">
            <i class="fas fa-arrow-down arrow-icon arrow-icon-down"></i>
        </div>
    </div>

    <div class="toolbox-panel">


        <div class="toolbox-content">


            <?php for ($i = 1; $i <= $nbItems; $i++): ?>

                <div class="toolbox-module" data-id="module-<?php echo $i; ?>">
                    <div class="toolbox-title">
                        <button type="button" class="close float-right toolbox-close-btn" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>

                        <h4 class="mb-0 d-inline-block">Module <?php echo $i; ?></h4>
                    </div>

                    <div class="toolbox-body">
                        My module #<?php echo $i; ?>
                    </div>
                </div>

            <?php endfor; ?>

        </div>
    </div>
</div>


<script>

    document.addEventListener("DOMContentLoaded", function (event) {
        $(document).ready(function () {


            var jToolbox = $('.jim-toolbox');
            JimToolbox.init({
                context: jToolbox,
            });
        });
    });

</script>
```

In the above example, we used the **div.jim-toolbox** as the context.

The **jim toolbox** as a combination of two elements:

- the toggle
- the panel

The toggle is the part you see when the jim toolbox is collapsed, while the panel is the part you see when the toolbox
is expanded (see the screenshots above).

The toggle itself is composed of items, each of which contains a text and an icon.

When you click a **toggle item**, the corresponding **module** (aka pane) opens in the panel.

One has to make sure that the **data-target** attribute of the **toggle item** matches the **data-id** attribute of
the **module**.

### Useful css classes
2021-04-15

- **toolbox-close**: apply this css class to your context to hide the toolbox (it's open by default)
- **toolbox-close-btn**: inside a module, use this class to close the module

### The js options
2021-04-15 -> 2021-04-30

The **jim toolbox** comes with the following options for the **init** method:

- context: jquery element, required, the context in which the toolbox is contained
- useToggleShortcut: bool=true, whether to allow a shortcut to toggle the visibility of the toggle
- toggleShortcutKey: string=t, assuming that useToggleShortcut=true, the key to type to actually toggle the toolbox's
  visibility Note that if a module is opened in the panel, the shortcut key will close the panel first (i.e. a second
  stroke on the shortcut key is required to hide the toggle as well).
- isVisible: bool=false, whether to start with the toolbox visible
- openId: string=null, the id (i.e. data-id) of the module to open on startup




Using acp
==========
2021-04-30

If you want your content to be loaded dynamically instead of statically, you can use
the [acp](https://github.com/lingtalfi/AjaxCommunicationProtocol) feature of **Jim toolbox**.

There are a couple of things to setup:

- make sure to create an [acp pane](#the-acp-pane) in your html (see the acp pane section below)
- set the **data-acp** attribute of your **toggle item** to the url you want to call. The url must respond with an **
  acp** response. In case of success, the **content** property of the acp response will be injected directly into the
  body of the **acp pane** (aka module). If the **title** property is provided, it will feed the title of the pane. In
  case of error, the error message will be displayed in red in the body of the pane. The default title for an error is "
  Error".

That's it for the setup.


Note that you can have both static and dynamic **toggle items** in the same toolbox.


The acp pane
---------
2021-04-30 -> 2021-05-01

In order to use **acp**, you need to create an **acp module**.

It looks like this:

```html

<div class="toolbox-module" data-id="_acp">
    <div class="toolbox-title">
        <button type="button" class="close float-right toolbox-close-btn" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>

        <h4 class="mb-0 d-inline-block toolbox-title-text">Title</h4>

        <div class="toolbox-loader spinner-border spinner-border-sm ml-2" role="status">
            <span class="sr-only">Loading...</span>
        </div>
      
    </div>


    <div class="toolbox-body">
    </div>
</div>
```

Notice that the **data-id** value is **_acp**, which is a reserved identifier.

Note that you need to create the **acp module** (aka pane) once only, because the same pane is reused by all acp **
toggle items**.

The functional css classes used by the js code are:

- toolbox-module (which holds the data-id attribute with the value of **_acp**)
- toolbox-close-btn (trigger to close the module)
- toolbox-title-text (which contains the title of the module)
- toolbox-loader (which visibility will be toggled on and off as the dynamic content is fetched and injected into the pane)
- toolbox-body (in which we inject the dynamic content fetched via ajax)

The rest of the markup is up to you, and you can change it if you want. In the above example, I use bootstrap 4.



