[Back to the Ling/Light_DebugTrace api](https://github.com/lingtalfi/Light_DebugTrace/blob/master/doc/api/Ling/Light_DebugTrace.md)<br>
[Back to the Ling\Light_DebugTrace\Service\LightDebugTraceService class](https://github.com/lingtalfi/Light_DebugTrace/blob/master/doc/api/Ling/Light_DebugTrace/Service/LightDebugTraceService.md)


LightDebugTraceService::appendSection
================



LightDebugTraceService::appendSection — Appends a section to the target file, if the target file is defined.




Description
================


protected [LightDebugTraceService::appendSection](https://github.com/lingtalfi/Light_DebugTrace/blob/master/doc/api/Ling/Light_DebugTrace/Service/LightDebugTraceService/appendSection.md)(array $section) : void




Appends a section to the target file, if the target file is defined.

And/or appends a section to a file (which named is based on the http request uri) in the target dir,
if the target dir is defined.


The section is an array of key/value pairs.




Parameters
================


- section

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [LightDebugTraceService::appendSection](https://github.com/lingtalfi/Light_DebugTrace/blob/master/Service/LightDebugTraceService.php#L263-L278)


See Also
================

The [LightDebugTraceService](https://github.com/lingtalfi/Light_DebugTrace/blob/master/doc/api/Ling/Light_DebugTrace/Service/LightDebugTraceService.md) class.

Previous method: [setHttpRequestFilters](https://github.com/lingtalfi/Light_DebugTrace/blob/master/doc/api/Ling/Light_DebugTrace/Service/LightDebugTraceService/setHttpRequestFilters.md)<br>Next method: [resetFile](https://github.com/lingtalfi/Light_DebugTrace/blob/master/doc/api/Ling/Light_DebugTrace/Service/LightDebugTraceService/resetFile.md)<br>

