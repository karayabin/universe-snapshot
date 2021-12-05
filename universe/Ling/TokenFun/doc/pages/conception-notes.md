TokenFun, conception notes
===========
2016-01-02 -> 2020-07-28





TokenProp
------------
2020-07-28


A token prop is used as a tool to compare against a php token.
It's either:
- a string, in which case it matches with a php token of type string
- an int, in which case it matches with the php token type.
- an array, which contains an arbitrary number of other elements (of type string or int).
    If one at least of those elements matches against the php token, the token prop matches.

