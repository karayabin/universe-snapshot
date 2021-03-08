The container notation
==========
2021-02-25

The container notation is way to reference variables from a php array.

It looks like this:

- ${my_var}
- ${france.paris}
- ...



It's composed of the following elements (in order):

- a dollar symbol directly followed by an opening curly bracket
- the variable name,
  using [bdot notation](https://github.com/karayabin/universe-snapshot/blob/master/universe/Ling/Bat/doc/bdot-notation.md)
- a closing curly bracket




Amongst other things, it's used in the light's service container configuration files.


