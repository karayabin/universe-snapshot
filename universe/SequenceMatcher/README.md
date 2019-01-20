SequenceMatcher
=========================
2016-12-15 -- 2015-12-19


Find/replace a pattern in a sequence of things.



Sometimes, you have a sequence of things and you need to find a pattern of those things in the sequence.

If those things were characters, then the sequence of things would be a string, and you could use the php regex functions.

Regex only applies to strings though, so what if you need to parse a more abstract sequence of things?

That's when the SequenceMatcher can become handy.

Although it doesn't have all the bells and whistles of the regex, it has two or three useful features that allow
basic searching through a sequence of things.

In other words, the SequenceMatcher is an simplified abstraction of the regex engine, which works with things, not only
characters.





Concepts
-------------


A sequence contains an arbitrary number of things.

A thing can be anything: a number, a character, an array, an object, ...

When you want to match a particular combination of things in the sequence, you first create what's called a model.

A model is like a pattern in the regex model: it's basically a blue print used to match against the things in the sequence.

A model is composed of elements.

There are three types of elements:

- entity
- group (of elements)
- alternate (group of elements)


The entity is the smallest and most fundamental element.

It's an intelligent object which has a match method (i.e. it is able to tell whether or not it matches
against a given thing).



The group and alternate group are syntactic element.

The group is a container for other elements,

and the alternate group allows the parallelization of groups (useful in some cases
where you want to match one of different alternatives).



The model is then given to the SequenceMatcher.

The SequenceMatcher can only work with one model and one sequence at the time.

The SequenceMatcher parses the sequence of things, and, using the different elements, finds whether or not the model
matches the sequence of things.

The model may be found zero, one or more times.


You can add listeners to the SequenceMatcher, in order to do something useful when a match is found.

There are two main things you can do:

- accessing the matched entities; this is useful if you want to extract some information out of a sequence (think preg_match)
- replace the matched entities by a subsequence of your choice (think preg_replace)




Modificators
----------------------

Beside the elements, the SequenceMatcher also provides the following modificators (inspired by regex):

- ? modificator
- + modificator
- * modificator



Modificators can be applied to all elements.




Some notes about the implementation
-----------------------------------

An element has a __toString method, because it eases the testing phase (and coding this object was hard for me...).

I have to say, the implementation is quite weak: and since I was not confident in
the code, I compensated with some tests.

Basically, I built up the tool until I could use it, but it might not work
for your cases.

The way it's implemented, I believe the best way to extend it is to
read the tests and use the "test first" method (writing your tests before you
implement a new functionality or when you find a bug).

The tests are in the btests directory of this repository.

Good luck.



Where do I found some example code?
----------------------------------

I made this code for the only purpose of being able to extract the
translation information out of files.

I could have used regex, but I remembered having a bad experience (a long time ago)
trying to cope with both the double quote OR the single quote escaping that
can occur in my case, something like the example below:

```php
<?php

echo __("This is an example of string I want to extract", "optionalContext");
echo __("This is an example of string I want to extract");
echo __("This is an {example} of string I want to extract", null, [
    'example' => $something,
]);
```

So in a way, I found the approach of parsing tokens more elegant,
although in the end I'm not a big fan of my implementation, as I said earlier.

But anyway, this example is used in the [nullos admin](https://github.com/lingtalfi/nullos-admin)'s Linguist module.

Here is the code that extracts those translations, for your convenience:

```php

// app-nullos/class-modules/Linguist/Util/LinguistScanner.php

public static function scanTranslationsByFile($file)
{

    $ret = [];

    $tokens = token_get_all(file_get_contents($file));

    $model = Model::create()
        ->addElement(TokenEntity::create(T_STRING, '__'))
        ->addElement(TokenEntity::create(T_WHITESPACE, null), '?')
        ->addElement(TokenEntity::create(null, '('))
        ->addElement(TokenEntity::create(T_WHITESPACE, null), '?')
        ->addElement(TokenEntity::create(T_CONSTANT_ENCAPSED_STRING, null), null, 'id')
        ->addElement(TokenEntity::create(T_WHITESPACE, null), '?')
        ->addElement(Group::create(null)
                ->addElement(TokenEntity::create(null, ','))
                ->addElement(TokenEntity::create(T_WHITESPACE, null), '?')
                ->addElement(TokenEntity::create(T_CONSTANT_ENCAPSED_STRING, null), null, 'context')
                ->addElement(TokenEntity::create(T_WHITESPACE, null), '?')
            , '?'
        )
        ->addElement(TokenGreedyEntity::create(null, ')'), '*')
        ->addElement(TokenEntity::create(null, ')'));

    $sequence = $tokens;

    $markers = [];
    SequenceMatcher::create()
        ->match($sequence, $model, function (array $matchedElements, array $matchedThings, array $_markers = null) use (&$markers) {
            $markers[] = TokensSequenceMatcherUtil::detokenizeMarkers($_markers);
        });

    foreach ($markers as $info) {
        $arr = [
            'id' => array_shift($info['id']),
        ];
        if (array_key_exists('context', $info)) {
            $arr['context'] = array_shift($info['context']);
        }
        $ret[] = $arr;
    }
    return $ret;
}

```

Note that the code above uses an intermediary TokenEntity wrapper,
which basically allows matching tokens.

The SequenceMatcher code is totally abstract and can match any object,
and the TokenEntity is just an example of specialization of that EntityInterface.


The TokenEntity itself is found in the [Tokens](https://github.com/lingtalfi/Tokens) library.

I also created a very useful TokenGreedyEntity, which basically matches
any token EXCEPT the one given.



Another example: fetch the use statements in a file
------------------------------------------

Here is another useful example of how to use the SequenceMatcher.

Again, it involves php tokens, and so we use 
the TokenEntity from the [Tokens](https://github.com/lingtalfi/Tokens) planet as the concrete 
thing that is iterated.

 
```php
<?php


use SequenceMatcher\Model;
use \SequenceMatcher\SequenceMatcher;
use Tokens\SequenceMatcher\Element\TokenAlternateEntity;
use Tokens\SequenceMatcher\Element\TokenEntity as TokenEntity;
use Tokens\SequenceMatcher\Element\TokenGreedyEntity;
use Tokens\Tokens;

require_once "bigbang.php";


$file = __FILE__;
$tokens = token_get_all(file_get_contents($file));
//az(Tokens::explicitTokenNames($tokens));

$model = Model::create()
    ->addElement(TokenEntity::create(T_USE, null))
    ->addElement(TokenEntity::create(T_WHITESPACE, null), '?')
    ->addElement(TokenAlternateEntity::create([T_STRING, T_NS_SEPARATOR]), null, 'a')
    ->addElement(TokenGreedyEntity::create(null, ';'), '*', 'a')
    ->addElement(TokenEntity::create(null, ';'));

$sequence = $tokens;

$markers = [];
SequenceMatcher::create()
    ->match($sequence, $model, function (array $matchedElements, array $matchedThings, array $_markers = null) use (&$markers) {
        $markers[] = Tokens::concatenate($_markers['a']);
    });

a($markers);
/**
 * array (size=6)
 * 0 => string 'SequenceMatcher\Model' (length=21)
 * 1 => string '\SequenceMatcher\SequenceMatcher' (length=32)
 * 2 => string 'Tokens\SequenceMatcher\Element\TokenAlternateEntity' (length=51)
 * 3 => string 'Tokens\SequenceMatcher\Element\TokenEntity as TokenEntity' (length=57)
 * 4 => string 'Tokens\SequenceMatcher\Element\TokenGreedyEntity' (length=48)
 * 5 => string 'Tokens\Tokens' (length=13)
 */
```




Replace things
==================

This is not implemented yet, because I didn't need that functionality at the time I wrote this tool,
and I was in a hurry.

Still, the intent of this planet is to provide the replace functionality, maybe some day?






History Log
------------------

- 1.0.0 -- 2016-12-19

    - initial commit























