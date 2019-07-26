[Back to the Ling/Deploy api](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy.md)<br>
[Back to the Ling\Deploy\Helper\ScpHelper class](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Helper/ScpHelper.md)


ScpHelper::fetch
================



ScpHelper::fetch — and returns whether the transfer was successful.




Description
================


public static [ScpHelper::fetch](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Helper/ScpHelper/fetch.md)(string $srcPath, string $dstPath, string $sshConfigId) : bool




Silently transfers the $srcPath on the remote machine (identified by $sshConfigId) to $dstPath on the local machine,
and returns whether the transfer was successful.




Parameters
================


- srcPath

    

- dstPath

    

- sshConfigId

    


Return values
================

Returns bool.








Source Code
===========
See the source code for method [ScpHelper::fetch](https://github.com/lingtalfi/Deploy/blob/master/Helper/ScpHelper.php#L49-L56)


See Also
================

The [ScpHelper](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Helper/ScpHelper.md) class.

Previous method: [push](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Helper/ScpHelper/push.md)<br>

