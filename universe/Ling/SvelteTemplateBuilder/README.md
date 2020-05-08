SvelteTemplateBuilder
===========
2020-05-08



A tool to build svelte templates.


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/SvelteTemplateBuilder
```

Or just download it and place it where you want otherwise.






Summary
===========
- [SvelteTemplateBuilder api](https://github.com/lingtalfi/SvelteTemplateBuilder/blob/master/doc/api/Ling/SvelteTemplateBuilder.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))





Create a svelte component
------------

To create a svelte component based on this template: [my-svelte-component](https://github.com/lingtalfi/my-svelte-component),
we will use the script provided by this planet (referenced as **/path/to/universe/Ling/SvelteTemplateBuilder/scripts/my-svelte-component.php**).

This script requires two arguments: the component class name, and the component directory name.




Open a terminal and type this:


```bash
cd /myapp
php -f /path/to/universe/Ling/SvelteTemplateBuilder/scripts/my-svelte-component.php -- MyTestComponent my-test-component  
```

This command will create the following structure:

```text 
- /myapp/
----- MyTestComponent/
--------- .gitignore
--------- dist/
--------- index.html
--------- package.json
--------- README.md
--------- rollup.config.js
--------- src/
------------- main.js
------------- MyTestComponent.svelte

```
  
Then to use your component, type the following:


```bash 
cd MyTestComponent
npm install
npm run dev
```


That's it.



### Going further

As we saw, the path to the script is quite long and hardly memorizable by humans.
Hence I recommend using a bash alias like this one for instance:


```bash 
alias sveltecompo='php -f /path/to/universe/Ling/SvelteTemplateBuilder/scripts/my-svelte-component.php -- '
```

Now to create a svelte component, just do:

```bash 
sveltecompo MyTestComponent my-test-component 
```






History Log
=============

- 1.0.0 -- 2020-05-08

    - initial commit