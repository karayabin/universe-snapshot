JBootstrapAutocomplete
===========
2019-11-15



A port of the [bootstrap-autocomplete](https://www.jqueryscript.net/form/jQuery-Bootstrap-4-Typeahead-Plugin.html) plugin for the universe framework.


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/JBootstrapAutocomplete
```

Or just download it and place it where you want otherwise.







What is this
=============

This planet is a port from the [bootstrap autocomplete plugin](https://github.com/bassjobsen/Bootstrap-3-Typeahead) 
to the [universe](https://github.com/karayabin/universe-snapshot).

I also included the blood hound engine from [twitter typeahead](https://github.com/twitter/typeahead.js/blob/master/doc/jquery_typeahead.md)
and some custom css.

See the [documentation for bloodhound](https://github.com/twitter/typeahead.js/blob/master/doc/bloodhound.md) for more details,
and/or the [typeahead examples](http://twitter.github.io/typeahead.js/examples/). 

I host it as a planet for dependency resolution convenience inside my universe framework, but all credits
goes to the guy who wrote this plugin and posted it on jqueryscript.net.



How to use
==========


See the [documentation for bootstrap-autocomplete](https://github.com/bassjobsen/Bootstrap-3-Typeahead) for more details. 


First type your html:

```html
<input class="typeahead form-control">
```


Then define your sources.

You can either:

- define sources directly
- load the data from an external JSON file 


Define sources directly
---------
```js
$(".typeahead").typeahead({
  source: [
    {id: "id1", name: "jQuery"},
    {id: "id2", name: "Script"},
    {id: "id3", name: "Net"}
  ]
});

```

Load the data from an external JSON file
---------

```js

$(".typeahead").typeahead({ 
    source: function (query, process) {
        $.ajax({
            url: '/test.json',
            type: 'POST',
            dataType: 'JSON',
            success: function (data) {
                process(data);
            }
        });
    },
});
```



Then call the plugin:

```js
$(".typeahead").typeahead({ 

  // data source
  source: [],

  // how many items to show
  items: 8,

  // default template
  menu: '<ul class="typeahead dropdown-menu" role="listbox"></ul>',
  item: '<li><a class="dropdown-item" href="#" role="option"></a></li>',
  headerHtml: '<li class="dropdown-header"></li>',
  headerDivider: '<li class="divider" role="separator"></li>',
  itemContentSelector:'a',

  // min length to trigger the suggestion list
  minLength: 1,

  // number of pixels the scrollable parent container scrolled down
  scrollHeight: 0,

  // auto selects the first item
  autoSelect: true,

  // callbacks
  afterSelect: $.noop,
  afterEmptySelect: $.noop,

  // adds an item to the end of the list
  addItem: false,

  // delay between lookups
  delay: 0,
  
});


```









History Log
=============

- 1.1.0 -- 2019-11-15

    - add bloodhound and custom css
    
- 1.0.2 -- 2019-11-15

    - fix README.md sources
    
- 1.0.1 -- 2019-11-15

    - fix README.md typo
    
- 1.0.0 -- 2019-11-15

    - initial commit