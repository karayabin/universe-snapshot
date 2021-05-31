[Back to the Ling/LingTalfi api](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi.md)<br>
[Back to the Ling\LingTalfi\Util\SubscribersUtil class](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Util/SubscribersUtil.md)


SubscribersUtil::updateSubscribersDependenciesAndCommit
================



SubscribersUtil::updateSubscribersDependenciesAndCommit — Updates the planets which depend on the given planetDot.




Description
================


public [SubscribersUtil::updateSubscribersDependenciesAndCommit](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Util/SubscribersUtil/updateSubscribersDependenciesAndCommit.md)(string $appDir, string $planetDot, ?array $options = []) : void




Updates the planets which depend on the given planetDot.
By update, I mean increment the version number and push them using my kpp shortcut.

Available options are:
- force: bool=false. If true, the subscribers planet will be commit no matter what.




Parameters
================


- appDir

    

- planetDot

    

- options

    


Return values
================

Returns void.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [SubscribersUtil::updateSubscribersDependenciesAndCommit](https://github.com/lingtalfi/LingTalfi/blob/master/Util/SubscribersUtil.php#L32-L65)


See Also
================

The [SubscribersUtil](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Util/SubscribersUtil.md) class.



