JSelectHide
===========
2021-04-05



A js tool to help hiding select panes.


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========

Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.JSelectHide
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/JSelectHide
```

Or just download it and place it where you want otherwise.






How does it work
========
2021-04-05

The idea is that you have some select, and each time you choose an option, a pane shows up, while its sibling become
hidden.

This is done by first importing our javascript file (in **/libs/universe/Ling/JSelectHide/select-hide.js**) (don't forget
to also import jquery), then do something like this.

Html:

```html

<form id="the-example-context">
    <h6>Select hide demo</h6>

    <div class="the-select">
      <select class="select-hide">
        <option data-target="my-pane1">Option A</option>
        <option data-target="my-pane2">Option B</option>
        <option data-target="my-pane3">Option C</option>
      </select>
    </div>

    <div class="the-panes">
        <div class="select-hide-pane" data-id="my-pane1">
            pane 1 content
        </div>
        <div class="select-hide-pane" data-id="my-pane2">
            pane 2 content
        </div>
        <div class="select-hide-pane" data-id="my-pane3">
            pane 3 content
        </div>
    </div>


</form>


<script>
    $(document).ready(function () {
      
        SelectHide.init({
            context: $("#the-example-context"),
            openPane: "my-pane1",
        });


    });
</script>


```



The html markup should be the following (as you can see in the example above):

- each select has the **select-hide** css class, and its options have a **data-target** attribute indicating the id of the pane to open when selected.
- then write your pane elements with a css class of: **select-hide-pane**, and a **data-id** attribute set to the id of the pane.



That's it for the markup.
Then call the **SelectHide.init** in the js.

The available options are:

- context: a jquery object/selection to use as the context. The default value is the "body".
  When you call the init method, only the panes in the given context will be processed, the other panes will be ignored.

- openPane: string, the id of the pane which should be already opened when the page is displayed.
  By default, all panes will be hidden.





History Log
=============

- 1.0.1 -- 2021-04-05

  - fix select options not synced with pane at init
  
- 1.0.0 -- 2021-04-05

    - initial commit