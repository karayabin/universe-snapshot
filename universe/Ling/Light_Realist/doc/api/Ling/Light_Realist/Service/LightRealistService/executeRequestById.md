[Back to the Ling/Light_Realist api](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist.md)<br>
[Back to the Ling\Light_Realist\Service\LightRealistService class](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService.md)


LightRealistService::executeRequestById
================



LightRealistService::executeRequestById —      the .byml extension.




Description
================


public [LightRealistService::executeRequestById](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/executeRequestById.md)(string $requestId, ?array $params = [], ?array $options = []) : array




Executes the realist identified by the given requestId, and returns an array with the following
properties (see [the realist conception notes](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/realist-conception-notes.md) for more details):


- nb_total_rows: int, the total number of rows without "where" filtering
- current_page_first: int, the index of the first item of the current page
- current_page_last: int, the index of the last item of the current page
- nb_pages: int, the number of pages
- nb_items_per_page: int, the number of items per page
- page: int, the current page number
- rows: array, the raw rows returned by the sql query
- rows_html: string, the html of the rows, as shaped by the realist configuration
- sql_query: string, the executed sql query (intend: debug)
- markers: array, the markers used along with the executed sql query (intend: debug)



The requestId is a string with the following structure:

- requestId: fileId:queryId

With:

- fileId: the relative path (relative to the baseDir) to the babyYaml file storing the data, without
     the .byml extension.
- queryId: the request declaration identifier used inside the babyYaml file.

Params an array containing the following:

- ?tags: the tags to use with the request. (see [the realist tag transfer protocol](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/realist-tag-transfer-protocol.md) for more details).
- ?csrf_token: string|null. the value of the csrf token to check against. If not passed or null, no csrf checking will be performed.
- ?csrf_token_pass: bool. If true, will bypass the csrf_token validation.
         Usually, you only want to use this if you've already checked for another csrf token earlier (i.e. you
         already trust that the user is who she claimed she is).


If the sql query is not valid, an exception will be thrown.




Parameters
================


- requestId

    

- params

    

- options

    


Return values
================

Returns array.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightRealistService::executeRequestById](https://github.com/lingtalfi/Light_Realist/blob/master/Service/LightRealistService.php#L229-L444)


See Also
================

The [LightRealistService](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService.md) class.

Previous method: [__construct](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/__construct.md)<br>Next method: [getStandardDeveloperVariables](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/getStandardDeveloperVariables.md)<br>

