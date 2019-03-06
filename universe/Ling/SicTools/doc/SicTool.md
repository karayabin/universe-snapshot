SicTool
=======
2019-02-06


The SicTool class contains general purpose methods to work with the sic notation.




Methods summary
===============

- [isSicBlock](#issicblock)





isSicBlock
---------


Returns whether the given $thing is a sic block.

### Description

```php
isSicBlock ( mixed $thing, string $passKey = null ): bool
```


### Parameters


- **thing**

    The thing to test as a sic block. It can be anything: a string, an array, an object,...,
    but only a valid sic block will make the method return true.

- **passKey**

    The pass key to invalidate a sic block.
    If found in the array (as a key), the array will not be considered a sic block.

    See more details about the pass key on the [sic documentation](https://github.com/lingtalfi/NotationFan/blob/master/sic.md#notation-abstract).
    Generally, the pass key is "__pass__".


### Return Values

Returns a boolean.


### Examples

#### Example #1 isSicBlock example

```php

a(SicTool::isSicBlock("")); // false, a string can't be a sick block

a(SicTool::isSicBlock([
    "my_email" => 'johndoe@gmail.com',
])); // false, the array doesn't contain the "instance" key


a(SicTool::isSicBlock([
    "instance" => 'Animal',
])); // true


a(SicTool::isSicBlock([
    "instance" => 'Animal',
    "__pass__" => null,
], '__pass__')); // false, the pass key is found in the sic block array

```








