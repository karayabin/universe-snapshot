Light_SimpleHttpServer, conception notes
============
2020-10-29 -> 2020-11-20


This service helps you manage your exception, by providing a controller that you can extend, which allows you to throw exceptions that will
be converted to http error codes (such as 404, 403, 500, etc...).




The basic idea is that you attach an httpErrorCode to when you throw an exception, and then our service catches the exception
and returns the http response with that error code.

We also send the exception message to the log.

We advise that you only use our exception for server error codes (5XX), which are generally application errors which need to be addressed.

For other code classes, such as 4XX for instance, if it's a user error (like 404, 403, etc...), I personally won't log them, as there is nothing
wrong with the application, and I already have my apache/nginx logs, should I want to investigate those requests, so I don't want to overload my app logs
with this kind of requests.



Our controller also understands the following [ExceptionCodes](https://github.com/lingtalfi/ExceptionCodes/blob/master/doc/pages/conception-notes.md):

- **FORBIDDEN**, which it translates to a 403 http response





Decide which http codes to log
----------
2020-10-30

By default, we send to the log every exception that we catch.

You can however decide which http status codes you want to NOT send to the log, using the **do_not_log_codes** option of our service.
See [the service configuration in our README file](https://github.com/lingtalfi/Light_SimpleHttpServer). 