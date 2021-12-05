[Back to the Ling/WiseTool api](https://github.com/lingtalfi/WiseTool/blob/master/doc/api/Ling/WiseTool.md)



The WiseTool class
================
2019-08-07 --> 2021-07-30






Introduction
============

The WiseTool class.

This is just an adaptor class.


Did you ever encounter the following notification words?

- warning
- info
- success
- error

Those are pretty standard notification types.
However, if if you've worked with bootstrap 4, you'll see that they have some notification classes, but the wording
is a little bit different:

- warning
- primary
- success
- danger

Ok.
Now let me add my own, one letter variation:

- w (warning)
- i (info)
- s (success)
- e (error)


I use those some times in some notifying tools I create.



Also there are the [Chloroform notification classes](https://github.com/lingtalfi/Chloroform/blob/master/doc/pages/chloroform-array.md), and probably a lot of other systems.


And so we end up with those notifications which basically are the same, but they just have different names (or representations).
The goal of this class is to provide easy translation from one set to another.

The first set is called regular, the second is called bootstrap, and the third (one letter) is called wise.

The chloroform objects are called "chloroform".



So to recap, here are the supported systems:

- regular
- bootstrap
- wise
- chloroform



Class synopsis
==============


class <span class="pl-k">WiseTool</span>  {

- Methods
    - public static [wiseToRegular](https://github.com/lingtalfi/WiseTool/blob/master/doc/api/Ling/WiseTool/WiseTool/wiseToRegular.md)(string $wiseType) : string
    - public static [wiseToBootstrap](https://github.com/lingtalfi/WiseTool/blob/master/doc/api/Ling/WiseTool/WiseTool/wiseToBootstrap.md)(string $wiseType) : string
    - public static [wiseToChloroform](https://github.com/lingtalfi/WiseTool/blob/master/doc/api/Ling/WiseTool/WiseTool/wiseToChloroform.md)(string $wiseType, string $message) : [FormNotificationInterface](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/FormNotification/FormNotificationInterface.md)
    - public static [regularToBootstrap](https://github.com/lingtalfi/WiseTool/blob/master/doc/api/Ling/WiseTool/WiseTool/regularToBootstrap.md)(string $regularType) : string
    - public static [regularToWise](https://github.com/lingtalfi/WiseTool/blob/master/doc/api/Ling/WiseTool/WiseTool/regularToWise.md)(string $regularType) : string
    - public static [regularToChloroform](https://github.com/lingtalfi/WiseTool/blob/master/doc/api/Ling/WiseTool/WiseTool/regularToChloroform.md)(string $regularType, string $message) : [FormNotificationInterface](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/FormNotification/FormNotificationInterface.md)
    - public static [bootstrapToRegular](https://github.com/lingtalfi/WiseTool/blob/master/doc/api/Ling/WiseTool/WiseTool/bootstrapToRegular.md)(string $bootstrapType) : string
    - public static [bootstrapToWise](https://github.com/lingtalfi/WiseTool/blob/master/doc/api/Ling/WiseTool/WiseTool/bootstrapToWise.md)(string $bootstrapType) : string
    - public static [bootstrapToChloroform](https://github.com/lingtalfi/WiseTool/blob/master/doc/api/Ling/WiseTool/WiseTool/bootstrapToChloroform.md)(string $bootstrapType, string $message) : [FormNotificationInterface](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/FormNotification/FormNotificationInterface.md)

}






Methods
==============

- [WiseTool::wiseToRegular](https://github.com/lingtalfi/WiseTool/blob/master/doc/api/Ling/WiseTool/WiseTool/wiseToRegular.md) &ndash; Returns the regular version of the given wise notification type.
- [WiseTool::wiseToBootstrap](https://github.com/lingtalfi/WiseTool/blob/master/doc/api/Ling/WiseTool/WiseTool/wiseToBootstrap.md) &ndash; Returns the bootstrap version of the given wise notification type.
- [WiseTool::wiseToChloroform](https://github.com/lingtalfi/WiseTool/blob/master/doc/api/Ling/WiseTool/WiseTool/wiseToChloroform.md) &ndash; Returns the chloroform version of the given wise notification type.
- [WiseTool::regularToBootstrap](https://github.com/lingtalfi/WiseTool/blob/master/doc/api/Ling/WiseTool/WiseTool/regularToBootstrap.md) &ndash; Returns the bootstrap version of the given regular notification type.
- [WiseTool::regularToWise](https://github.com/lingtalfi/WiseTool/blob/master/doc/api/Ling/WiseTool/WiseTool/regularToWise.md) &ndash; Returns the wise version of the given regular notification type.
- [WiseTool::regularToChloroform](https://github.com/lingtalfi/WiseTool/blob/master/doc/api/Ling/WiseTool/WiseTool/regularToChloroform.md) &ndash; Returns the chloroform version of the given regular notification type.
- [WiseTool::bootstrapToRegular](https://github.com/lingtalfi/WiseTool/blob/master/doc/api/Ling/WiseTool/WiseTool/bootstrapToRegular.md) &ndash; Returns the regular version of the given bootstrap notification type.
- [WiseTool::bootstrapToWise](https://github.com/lingtalfi/WiseTool/blob/master/doc/api/Ling/WiseTool/WiseTool/bootstrapToWise.md) &ndash; Returns the wise version of the given bootstrap notification type.
- [WiseTool::bootstrapToChloroform](https://github.com/lingtalfi/WiseTool/blob/master/doc/api/Ling/WiseTool/WiseTool/bootstrapToChloroform.md) &ndash; Returns the chloroform version of the given bootstrap notification type.





Location
=============
Ling\WiseTool\WiseTool<br>
See the source code of [Ling\WiseTool\WiseTool](https://github.com/lingtalfi/WiseTool/blob/master/WiseTool.php)



SeeAlso
==============
Previous class: [WiseToolException](https://github.com/lingtalfi/WiseTool/blob/master/doc/api/Ling/WiseTool/Exception/WiseToolException.md)<br>
