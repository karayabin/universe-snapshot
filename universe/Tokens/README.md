Tokens
=========================
2016-12-06 -- 2016-12-19



Manipulate the tokens inside a file.



Tokens is part of the [universe](https://github.com/karayabin/universe-snapshot).





Intent
------------
So I have this generic translation file which content looks like this:

```php
<?php


$defs = [

    //--------------------------------------------
    // NO DB
    //--------------------------------------------
    "You could use the \"Configure\" item on the left menu in the Quickstart section." => "You could use the \"Configure\" item on the left menu in the Quickstart section.",
    //--------------------------------------------
    // PROCESS SQL
    //--------------------------------------------
    "The statements have been successfully executed" => "The statements have been successfully executed",
    "An error occurred, please checked the nullos logs" => "An error occurred, please checked the nullos logs",
];
```


And now I want to port it to other languages.

Basically, I need to replace the values of the array, BUT, I also want to keep the comments, as they serve organizational purposes.

So how do you do that?

Well, a possible solution is to use the TokensRepresentation object of the Tokens planet.

See the examples section for the concrete solution.




TokenRepresentation explained
=======================

First, there is the notion of token identifier explained here: http://php.net/manual/fr/function.token-get-all.php.

Then, what is possible to do is take an array of token identifiers, and modify some well identified parts of it.

In order to do so, we create a TokenRepresentation instance, which holds the token identifiers.

Then, we add sequences to it (ReplacementSequence).

Each sequence is a sequence of tokens (ReplacementSequenceToken) that need to be matched.

Finally, the TokenRepresentation parses all the token identifiers one by one, and communicates with each sequence
to see if they match or not.

If a sequence matches, it's the opportunity for you to alter the original token identifier.

If none of this makes sense, please go directly to the "Examples" section.




Examples
============


So here is the input file's content:

```php
<?php


$defs = [

    //--------------------------------------------
    // NO DB
    //--------------------------------------------
    "You could use the \"Configure\" item on the left menu in the Quickstart section." => "You could use the \"Configure\" item on the left menu in the Quickstart section.",
    //--------------------------------------------
    // PROCESS SQL
    //--------------------------------------------
    "The statements have been successfully executed" => "The statements have been successfully executed",
    "An error occurred, please checked the nullos logs" => "An error occurred, please checked the nullos logs",
];
```


Here is the code to execute, which uses the TokenRepresentation object.


```php
<?php

use Tokens\TokenRepresentation\ReplacementSequence;
use Tokens\TokenRepresentation\ReplacementSequenceToken;
use Tokens\TokenRepresentation\TokenRepresentation;
use Tokens\Tokens;


$src = "/pathto/app-nullos/lang/ch/modules/sqlTools/sqlTools.php";
$tokenIdentifiers = token_get_all(file_get_contents($src));
//a(Tokens::explicitTokenNames($tokenIdentifiers));
echo '<hr>';


$representation = TokenRepresentation::create($tokenIdentifiers);
$representation->addReplacementSequence(
    ReplacementSequence::create()
        ->addToken(
            ReplacementSequenceToken::create()
                ->matchIf(function ($tokenIdentifier) {
                    return (is_array($tokenIdentifier) && T_CONSTANT_ENCAPSED_STRING === $tokenIdentifier[0]);
                })
        )
        ->addToken(
            ReplacementSequenceToken::create()
                ->optional()
                ->matchIf(function ($tokenIdentifier) {
                    return (is_array($tokenIdentifier) && T_WHITESPACE === $tokenIdentifier[0]);
                })
        )
        ->addToken(
            ReplacementSequenceToken::create()
                ->matchIf(function ($tokenIdentifier) {
                    return (is_array($tokenIdentifier) && T_DOUBLE_ARROW === $tokenIdentifier[0]);
                })
        )
        ->addToken(
            ReplacementSequenceToken::create()
                ->optional()
                ->matchIf(function ($tokenIdentifier) {
                    return (is_array($tokenIdentifier) && T_WHITESPACE === $tokenIdentifier[0]);
                })
        )
        ->addToken(
            ReplacementSequenceToken::create()
                ->matchIf(function (&$tokenIdentifier) {
                    $ret = (is_array($tokenIdentifier) && T_CONSTANT_ENCAPSED_STRING === $tokenIdentifier[0]);
                    if(true===$ret){
                        $tokenIdentifier[1] = '"Maurice owns this file now, niaaahahahaha"';
                    }
                    return $ret;
                })
        )
);
$newTokens = $representation->getTokens();
Tokens::toFile($newTokens, "maurice.php");
```



Since 1.1.0, there is a newer easier way to do so:


```php
<?php

use Tokens\TokenRepresentation\ReplacementSequence;
use Tokens\TokenRepresentation\ReplacementSequenceToken;
use Tokens\TokenRepresentation\TokenRepresentation;
use Tokens\Tokens;
use Tokens\Util\TokenUtil;


$src = "/pathto/app-nullos/lang/ch/modules/sqlTools/sqlTools.php";
$tokenIdentifiers = token_get_all(file_get_contents($src));
//a(Tokens::explicitTokenNames($tokenIdentifiers));
echo '<hr>';


$representation = TokenRepresentation::create($tokenIdentifiers);
$representation
    ->addReplacementSequence(
        ReplacementSequence::create()
            ->addToken(
                ReplacementSequenceToken::create()
                    ->matchIf(function ($tokenIdentifier) {
                        return (is_array($tokenIdentifier) && T_CONSTANT_ENCAPSED_STRING === $tokenIdentifier[0]);
                    })
            )
            ->addToken(
                ReplacementSequenceToken::create()
                    ->optional()
                    ->matchIf(function ($tokenIdentifier) {
                        return (is_array($tokenIdentifier) && T_WHITESPACE === $tokenIdentifier[0]);
                    })
            )
            ->addToken(
                ReplacementSequenceToken::create()
                    ->matchIf(function ($tokenIdentifier) {
                        return (is_array($tokenIdentifier) && T_DOUBLE_ARROW === $tokenIdentifier[0]);
                    })
            )
            ->addToken(
                ReplacementSequenceToken::create()
                    ->optional()
                    ->matchIf(function ($tokenIdentifier) {
                        return (is_array($tokenIdentifier) && T_WHITESPACE === $tokenIdentifier[0]);
                    })
            )
            ->addToken(
                ReplacementSequenceToken::create()
                    ->matchIf(function (&$tokenIdentifier) {
                        return (is_array($tokenIdentifier) && T_CONSTANT_ENCAPSED_STRING === $tokenIdentifier[0]);
                    })
            )
    )
    ->onSequenceMatch(function($newSeq){
        $newSeq[4][1] = TokenUtil::encapsulate("Maurice owns this file now, niaaahahahaha");
        return $newSeq;
    })
;
$newTokens = $representation->getTokens();
Tokens::toFile($newTokens, "maurice.php");
```





And here is the result (for both above code examples it's the same result): the output file's content (maurice.php):


```php
<?php


$defs = [

    //--------------------------------------------
    // NO DB
    //--------------------------------------------
    "You could use the \"Configure\" item on the left menu in the Quickstart section." => "Maurice owns this file now, niaaahahahaha",
    //--------------------------------------------
    // PROCESS SQL
    //--------------------------------------------
    "The statements have been successfully executed" => "Maurice owns this file now, niaaahahahaha",
    "An error occurred, please checked the nullos logs" => "Maurice owns this file now, niaaahahahaha",
];
```




Another implementation
-----------------------
2016-12-19

Another implementation was introduced, which used the [SequenceMatcher](https://github.com/lingtalfi/SequenceMatcher) technique.
It's actually even better, depending on your use case, so be sure to check it out.


 
 
History Log
------------------
    
- 1.4.0 -- 2016-12-31

    - add UseStatementsUtil
    
- 1.3.0 -- 2016-12-29

    - add SequenceMatcher TokenAlternateEntity
    
- 1.2.0 -- 2016-12-19

    - add SequenceMatcher section


- 1.1.0 -- 2016-12-07

    - add TokenRepresentation->onSequenceMatch
    
- 1.0.1 -- 2016-12-07

    - fix Tokens::toFile not returning value
    
- 1.0.0 -- 2016-12-06

    - initial commit
    
    
    
