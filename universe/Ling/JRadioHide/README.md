JRadioHide
===========
2021-04-02 -> 2021-05-07

A js tool to help hiding radio panes.

This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========

Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller)
via [light-cli](https://github.com/lingtalfi/Light_Cli)

```bash
lt install Ling.JRadioHide
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.

```bash
uni import Ling/JRadioHide
```

Or just download it and place it where you want otherwise.





How does it work
========
2021-04-02 -> 2021-05-07

The idea is that you have some radio inputs, and each time you select one of them, it shows up, while its sibling become
hidden.

This is done by first importing our javascript file (in **/libs/universe/Ling/JRadioHide/radio-hide.js**) (don't forget
to also import jquery), then do something like this.

Html:

```html

<form id="the-example-context">
    <h6>Radio hide demo</h6>

    <div class="the-radio-buttons">
        <div>
            <input name="favourite_actor" id="id1" class="radio-hide" type="radio" data-target="my-pane1">
            <label for="id1">Option A</label>
        </div>
        <div>
            <input name="favourite_actor" id="id2" class="radio-hide" type="radio" data-target="my-pane2">
            <label for="id2">Option B</label>
        </div>
        <div>
            <input name="favourite_actor" id="id3" class="radio-hide" type="radio" data-target="my-pane3">
            <label for="id3">Option C</label>
        </div>
    </div>

    <div class="the-panes">
        <div class="radio-hide-pane" data-id="my-pane1">
            pane 1 content
        </div>
        <div class="radio-hide-pane" data-id="my-pane2">
            pane 2 content
        </div>
        <div class="radio-hide-pane" data-id="my-pane3">
            pane 3 content
        </div>
    </div>


</form>


<script>
    $(document).ready(function () {
      
        RadioHide.init({
            context: $("#the-example-context"),
            openPane: "my-pane1",
        });


    });
</script>


```



The html markup should be the following (as you can see in the example above):

- each input has the **radio-hide** css class, and it also has a **data-target** attribute indicating the id of the pane to open when clicked
- then write your pane elements with a css class of: **radio-hide-pane**, and a **data-id** attribute set to the id of the pane.
  


That's it for the markup.
Then call the **RadioHide.init** in the js.

The available options are:

- context: a jquery object/selection to use as the context. The default value is the "body".
        When you call the init method, only the panes in the given context will be processed, the other panes will be ignored.
  
- openPane: string, the id of the pane which should be already opened when the page is displayed.
    By default, all panes will be hidden.

- changeAfter: function, a callback to call after a radio button is changed. It receives the targetPane value (the data-target of the opened pane) as its first argument.





History Log
=============

- 1.0.7 -- 2021-05-31

    - Removing trailing plus in lpi-deps file (to work with Light_PlanetInstaller:2.0.0 api

- 1.0.6 -- 2021-05-07
  
    - fix changeAfter callback not called when selected via openPane option
    
- 1.0.5 -- 2021-05-07
  
    - update changeAfter option, now receives targetPane as argument
    
- 1.0.4 -- 2021-05-07
  
    - add changeAfter option
    
- 1.0.3 -- 2021-05-07
  
    - fix radio input not unbinding jquery event before binding
    
- 1.0.2 -- 2021-04-05
  
    - fix radio input not synced with pane at init
    
- 1.0.1 -- 2021-04-02
  
    - fix documentation, misleading information about panes parent (is actually irrelevant)
    
- 1.0.0 -- 2021-04-02
  
    - initial commit