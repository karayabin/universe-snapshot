Bashtml
=====
2019-02-26


Bashtml is a language used to write formatted console messages (messages with colors, bold, ...).




Summary
===========
- [The basic example](#the-basic-example)
- [The nested tags example](#the-nested-tags-example)
- [The combined tags example](#the-combined-tags-example)
- [The tags list](#the-tags-list)
- [Related tools](#related-tools)


It uses a tag markup system, like html, and is actually very close to html in its most basic form.

The main differences is that in bashtml:

- there is no tag attributes
- we can combine multiple tags in one using the colon separator (:)
- the set of tags is not the same


The basic example
--------------------

An example of bashtml formatted string is:


```bash
Hello, my name is <red>Ling</red>, and I like <green>pizzas</green>.
```

As you can guess, the text above will print in black, except for the word "Ling" which will print in red, and the word "pizzas" which will print in green.


 
The nested tags example
-------------------

Like in html, it is very possible to nest tags, like this:

```bash
<bold>Hello, I like <green>pizzas</green>.</bold>
```

In the example above, the whole sentence is in bold, and the word "pizzas" is in green bold.



The combined tags example
-----------------------

A special feature that we have in bashtml is the ability to combine multiple tags in one.

So, instead of writing this:


```bash
The pizza is <red><bold>redBull</bold></red>
```


We can write this, which has exactly the same effect: 

```bash
The pizza is <red:bold>redBull</red:bold>
```


In short, combining tags is a syntactic sugar that let us combine formatting tags using only one tag.


 
 
The tags list
-----------------------

Since bashtml is a console language, the formatting is quite limited.

Here is the tag list of the bashtml language.


- (logging)
     - success
     - info
     - warning
     - error
- (specials)
     - bold
     - dim
     - underlined
     - blink
     - reverse
     - hidden
- (foreground colors)
     - default
     - black
     - red
     - green
     - yellow
     - blue
     - magenta
     - cyan
     - lightGray
     - darkGray
     - lightRed
     - lightGreen
     - lightYellow
     - lightBlue
     - lightMagenta
     - lightCyan
     - white
- (background colors)
     - bgDefault
     - bgBlack
     - bgRed
     - bgGreen
     - bgYellow
     - bgBlue
     - bgMagenta
     - bgCyan
     - bgLightGray
     - bgDarkGray
     - bgLightRed
     - bgLightGreen
     - bgLightYellow
     - bgLightBlue
     - bgLightMagenta
     - bgLightCyan
     - bgWhite




Related tools
----------------

See the [BashtmlFormatter](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Formatter/BashtmlFormatter.md) for a concrete implementation of the bashtml language.
