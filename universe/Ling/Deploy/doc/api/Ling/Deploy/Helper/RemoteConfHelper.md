[Back to the Ling/Deploy api](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy.md)



The RemoteConfHelper class
================
2019-04-03 --> 2019-05-10






Introduction
============

The RemoteConfHelper class.



Class synopsis
==============


class <span class="pl-k">RemoteConfHelper</span>  {

- Methods
    - public static [readConfByFile](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Helper/RemoteConfHelper/readConfByFile.md)(string $confPath) : array
    - public static [pushConf](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Helper/RemoteConfHelper/pushConf.md)(array $conf, string $sshConfigId, string $appDir, string $dstPath, Ling\CliTools\Output\OutputInterface $output, int $indentLevel = 0) : bool

}






Methods
==============

- [RemoteConfHelper::readConfByFile](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Helper/RemoteConfHelper/readConfByFile.md) &ndash; Returns the configuration array corresponding to the given $confPath.
- [RemoteConfHelper::pushConf](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Helper/RemoteConfHelper/pushConf.md) &ndash; and returns whether the result was successful.





Location
=============
Ling\Deploy\Helper\RemoteConfHelper


SeeAlso
==============
Previous class: [Quoter](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Helper/Quoter.md)<br>Next class: [ScpHelper](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Helper/ScpHelper.md)<br>
