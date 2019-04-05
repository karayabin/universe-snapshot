[Back to the Ling/Deploy api](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy.md)<br>
[Back to the Ling\Deploy\Helper\ScpHelper class](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Helper/ScpHelper.md)


ScpHelper::push
================



ScpHelper::push — and returns whether the transfer was successful.




Description
================


public static [ScpHelper::push](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Helper/ScpHelper/push.md)(string $srcPath, string $dstPath, string $sshConfigId) : bool




Silently transfers the $srcPath on the local machine to $dstPath on the remote machine (identified by $sshConfigId),
and returns whether the transfer was successful.




Parameters
================


- srcPath

    

- dstPath

    

- sshConfigId

    


Return values
================

Returns bool.








See Also
================

The [ScpHelper](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Helper/ScpHelper.md) class.

Next method: [fetch](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Helper/ScpHelper/fetch.md)<br>

