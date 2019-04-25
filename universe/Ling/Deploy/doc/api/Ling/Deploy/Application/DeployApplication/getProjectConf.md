[Back to the Ling/Deploy api](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy.md)<br>
[Back to the Ling\Deploy\Application\DeployApplication class](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Application/DeployApplication.md)


DeployApplication::getProjectConf
================



DeployApplication::getProjectConf — Returns the configuration array for the current project.




Description
================


public [DeployApplication::getProjectConf](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Application/DeployApplication/getProjectConf.md)() : array




Returns the configuration array for the current project.

It is assumed that the project is defined.
If not, an exception will be thrown.


All projects configuration is stored in one centralized file:

 ~/.deploy/deploy-conf.byml


Exceptions will be thrown if this file doesn't exist.
Exceptions will also be thrown if the file exist but the project identifier is not configured.
Exceptions will also be thrown if the mandatory project configuration keys are not found. Those mandatory
configuration keys are:

- root_dir: the root path to the project application on the local machine
- ssh_config_id: the ssh identifier of the **~/.ssh/config** file to use to connect through the remote project via ssh
- remote_root_id: the root path to the project application on the remote machine


The returned configuration array is always merged with default values, so that
the maintainer of the project doesn't have to type explicitly all option key/value pairs.


The default configuration for a project is the following (see the documentation for more details):

```txt
map-conf:
     ignoreHidden: 1
     ignoreNames: []
     ignorePaths: []
```




Parameters
================

This method has no parameters.


Return values
================

Returns array.


Exceptions thrown
================

- [DeployException](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Exception/DeployException.md).&nbsp;







See Also
================

The [DeployApplication](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Application/DeployApplication.md) class.

Previous method: [setProjectIdentifier](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Application/DeployApplication/setProjectIdentifier.md)<br>Next method: [getConf](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Application/DeployApplication/getConf.md)<br>

