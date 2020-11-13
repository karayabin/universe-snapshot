Light_Mailer
===========
2020-06-29 -> 2020-08-17



A mailer service for the [light framework](https://github.com/lingtalfi/Light).


This is a [Light plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).

This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Light_Mailer
```

Or just download it and place it where you want otherwise.






Summary
===========
- [Light_Mailer api](https://github.com/lingtalfi/Light_Mailer/blob/master/doc/api/Ling/Light_Mailer.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- [Services](#services)
- Pages
    - [Conception notes](https://github.com/lingtalfi/Light_Mailer/blob/master/doc/pages/conception-notes.md)
    - [Events](https://github.com/lingtalfi/Light_Mailer/blob/master/doc/pages/events.md)






Services
=========


Here is an example of the service configuration:

```yaml
mailer:
    instance: Ling\Light_Mailer\Service\LightMailerService
    methods:
        setContainer:
            container: @container()
        setOptions:
            options:
                useDebug: true              # default is false
                useSendFailuresLog: true    # default is true
        setTransports:
            transports:
                default:
                    type: smtp
                    host: sslmail.fai.com
                    port: 995
                    username: contact@mywebsite.com
                    password: abcdefg123
        setSenders:
            senders:
                default:
                    from: contact@mywebsite.com


# --------------------------------------
# hooks
# --------------------------------------
$logger.methods_collection:
    -
        method: addListener
        args:
            channels: mailer.debug
            listener:
                instance: Ling\Light_Logger\Listener\LightCleanableFileLoggerListener
                methods:
                    configure:
                        options:
                            file: ${app_dir}/log/mailer_debug.txt
    -
        method: addListener
        args:
            channels: mailer.send_failures
            listener:
                instance: Ling\Light_Logger\Listener\LightFileLoggerListener
                methods:
                    configure:
                        options:
                            file: ${app_dir}/log/mailer_send_failures.txt






```



History Log
=============

- 1.3.0 -- 2020-08-17

    - update LightMailerService, add setSender and setTransport methods
    
- 1.2.0 -- 2020-08-14

    - the default templates directory is now app/templates/Light_Mailer again
    
- 1.1.0 -- 2020-08-14

    - the default templates directory is now app/templates
    
- 1.0.1 -- 2020-07-27

    - fix typo in LightMailerService->sendMessage
    
    
- 1.0.0 -- 2020-06-29

    - initial commit