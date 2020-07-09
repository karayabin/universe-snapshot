[Back to the Ling/ArrayDiff api](https://github.com/lingtalfi/ArrayDiff/blob/master/doc/api/Ling/ArrayDiff.md)<br>
[Back to the Ling\ArrayDiff\ArrayDiff class](https://github.com/lingtalfi/ArrayDiff/blob/master/doc/api/Ling/ArrayDiff/ArrayDiff.md)


ArrayDiff::diff
================



ArrayDiff::diff — Returns the diff between the given arrays "a" and "b".




Description
================


public static [ArrayDiff::diff](https://github.com/lingtalfi/ArrayDiff/blob/master/doc/api/Ling/ArrayDiff/ArrayDiff/diff.md)(array $a, array $b) : array




Returns the diff between the given arrays "a" and "b".

The diff is an array with the following structure, which represents the changes
to apply to "a" so that it ends in "b".

- 0: toAdd, an array of bkey => value, the values to add to "a" so that it looks like "b".
- 1: toRemove,  an array of bkeys to remove from "a" so that it looks like "b".
- 2: toUpdate,  an array of bkeys => value, the values to update in "a" so that it looks like "b".


bkey refers to the [bdot notation](https://github.com/lingtalfi/Bat/blob/master/doc/bdot-notation.md).




Parameters
================


- a

    

- b

    


Return values
================

Returns array.








Source Code
===========
See the source code for method [ArrayDiff::diff](https://github.com/lingtalfi/ArrayDiff/blob/master/ArrayDiff.php#L36-L77)


See Also
================

The [ArrayDiff](https://github.com/lingtalfi/ArrayDiff/blob/master/doc/api/Ling/ArrayDiff/ArrayDiff.md) class.



