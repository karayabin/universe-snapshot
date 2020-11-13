[Back to the Ling/Light_Realform api](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform.md)<br>
[Back to the Ling\Light_Realform\Service\LightRealformService class](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Service/LightRealformService.md)


LightRealformService::getChloroformByConfiguration
================



LightRealformService::getChloroformByConfiguration — Returns the chloroform instance based on the given configuration.




Description
================


public [LightRealformService::getChloroformByConfiguration](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Service/LightRealformService/getChloroformByConfiguration.md)(array $formConf, ?array &$extraInfo = []) : [Chloroform](https://github.com/lingtalfi/Chloroform)




Returns the chloroform instance based on the given configuration.
The chloroform.fields defined in the configuration will ba added to the form instance.

More info in the [Light_Realform conception notes](https://github.com/lingtalfi/Light_Realform/blob/master/doc/pages/2020/conception-notes.md).

The extraInfo array will contain the following after this method execution:
- multipliers: array of field_identifier => multiplier conf
     (remember that there should be only one multiplier per form, but here we are just returning
     every multiplier defined).




Parameters
================


- formConf

    

- extraInfo

    


Return values
================

Returns [Chloroform](https://github.com/lingtalfi/Chloroform).








Source Code
===========
See the source code for method [LightRealformService::getChloroformByConfiguration](https://github.com/lingtalfi/Light_Realform/blob/master/Service/LightRealformService.php#L109-L184)


See Also
================

The [LightRealformService](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Service/LightRealformService.md) class.

Previous method: [getNugget](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Service/LightRealformService/getNugget.md)<br>Next method: [executeRealform](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Service/LightRealformService/executeRealform.md)<br>

