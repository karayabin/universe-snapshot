SvelteTemplateBuilder
===========
2020-05-08 -> 2021-03-05



A tool to build svelte templates.


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.SvelteTemplateBuilder
```

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
php -f /path/to/universe/Ling/SvelteTemplateBuilder/scripts/my-svelte-component.php -- MyAwesomeComponent my-test-component  
```

This command will create the following structure:

```text 
- /myapp/
----- MyAwesomeComponent/
--------- .gitignore
--------- dist/
--------- index.html
--------- index-test.html
--------- package.json
--------- README.md
--------- rollup.config.js
--------- rollup.config-test.js
--------- src/
------------- main.js
------------- MyAwesomeComponent.svelte
------------- MyAwesomeComponentTest.svelte
------------- test.js

```
  
Then to use your component, type the following:


```bash 
cd MyAwesomeComponent
npm install
```


And then either:

```bash 
npm run dev
```

this will build the bundle file(s) and open the **index.html** page which displays your component.


or:

```bash 
npm run dev-test
```

this will build the bundle file(s) and open the **index-test.html** page, which displays the Test version of your component.
This command is good for testing/updating your component.





More info in the [my-svelte-component](https://github.com/lingtalfi/my-svelte-component) page.




That's it.



### Going further

As we saw, the path to the script is quite long and hardly memorizable by humans.
Hence I recommend using a bash alias like this one for instance:


```bash 
alias sveltecompo='php -f /path/to/universe/Ling/SvelteTemplateBuilder/scripts/my-svelte-component.php -- '
```

Now to create a svelte component, just do:

```bash 
sveltecompo MyAwesomeComponent my-test-component 
```






History Log
=============

- 1.1.3 -- 2021-03-05

    - update README.md, add install alternative

- 1.1.2 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.1.1 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.1.0 -- 2020-05-11

    - add test rig implementation, and fix using componentName instead of dirName
    
- 1.0.0 -- 2020-05-08

    - initial commit