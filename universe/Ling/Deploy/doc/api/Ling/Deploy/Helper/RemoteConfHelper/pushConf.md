[Back to the Ling/Deploy api](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy.md)<br>
[Back to the Ling\Deploy\Helper\RemoteConfHelper class](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Helper/RemoteConfHelper.md)


RemoteConfHelper::pushConf
================



RemoteConfHelper::pushConf — and returns whether the result was successful.




Description
================


public static [RemoteConfHelper::pushConf](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Helper/RemoteConfHelper/pushConf.md)(array $conf, string $sshConfigId, string $appDir, string $dstPath, Ling\CliTools\Output\OutputInterface $output, int $indentLevel = 0) : bool




Pushes the given conf array as a file on the remote identified by $sshConfigId, at the given $dstPath;
and returns whether the result was successful.




Parameters
================


- conf

    

- sshConfigId

    

- appDir

    

- dstPath

    

- output

    

- indentLevel

    


Return values
================

Returns bool.








See Also
================

The [RemoteConfHelper](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Helper/RemoteConfHelper.md) class.

Previous method: [readConfByFile](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Helper/RemoteConfHelper/readConfByFile.md)<br>

