Developer memo
==========
2020-09-24



This document contains a collection of concepts that I often use, and are easy to forget.

This is mainly intended for myself, but if it's useful to anybody else, that's even better.



Variable replacement notation
----------------
2020-09-24 -> 2021-02-25


- Light_RealGenerator: !{var}, pool: variables
- Light_Nugget: %{var}, pool: _vars
- Container: ${var}, pool: the config file, it uses [container notation](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/notation/container-notation.md)
- Light_Kit: ${var}, pool: via the AdminPageController->renderAdminPage method (lka)





