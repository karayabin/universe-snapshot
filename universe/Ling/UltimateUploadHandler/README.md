UltimateUploadHandler
===========
2018-06-03



An upload handler for your ajax services.


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/UltimateUploadHandler
```

Or just download it and place it where you want otherwise.




Why ultimate?
=================
Because I'm so tired/bored of creating upload handlers, so I decided that this one would be the very last one.
And so this time I used pure oop design to resist time, evolution, and perhaps worst of all, my self criticism.




What's the global picture?
===================

So you have found a new js tool that handle the front part of your upload (dropzone, uikit upload, ...)
Awesome.

But then how do you handle the upload server side?

That's where the ultimate uploader comes in.

It basically is flexible enough to let you define the constraints you want on a per-identifier basis
(you pass the identifier via GET). Also, what the process returns when the file is uploaded is configurable,
I often return the uri of the newly uploaded file.




Examples
=============

In all my examples, I will use [Ecp](https://github.com/lingtalfi/Ecp) strategy,
which works well for me as far as handling ajax calls is concerned,
but you will use the strategy that fits best your use case...



If you are using the [kamille framework](https://github.com/lingtalfi/kamille),
then have a look at the UltimateUploadHandler module, which allows you to create your
ajax handler using just one line:



Using kamille UltimateUploadHandler module
------------------------

```php
        case "upload":

            $fileKey = $_GET['file_key'] ?? "files";
            $identifier = $_GET['identifier'] ?? null;
            if ($identifier) {

                // this is the one line I'm talking about, the rest is just ecp piping...
                $out = UltimateUploadHandlerAjaxServiceHelper::handleEcpUpload([
                    "identifier" => $identifier,
                    "fileKey" => $fileKey,
                    "output" => $output,
                    "context" => $_GET, // or any other context you want
                ]);
            } else {
                $output->error("identifier not found in GET");
            }
            break;
```


How to create an upload handler manually?
---------------------

(example from the UltimateUploadHandler module's hook)

```php
    public static function UltimateUploadHandler_getUploadHandler(&$uploadHandler, string $identifier, array $context = [])
    {

        switch ($identifier) {
            case "ThisApp_document_collector_piece_identite":
                $token = $context['token'] ?? "123";
                $uploadHandler = WebBasicUploadHandler::create()
                    ->setDstFile(function (array $phpFile) use ($token) {
                        $name = $phpFile['name'];
                        return A::appDir() . "/www/uploads/documents/$token/$name";
                    })
                    ->setWebDir(A::appDir() . "/www")
                    ->addConstraint(SizeConstraint::create()->setMaxSize("5M"))
                    ->addConstraint(MimeTypeConstraint::create()->setAllowedMimeTypes([
                        "image/gif",
                        "image/jpeg",
                        "image/png",
                        "application/pdf",
                    ]));
                break;
            default:
                break;
        }

    }
```



History Log
------------------

- 1.2.0 -- 2018-06-03

    - add FrenchMimeTypeConstraint and FrenchSizeConstraint classes

- 1.1.0 -- 2018-06-03

    - add WebBasicUploadHandler getReturnInfo method now also returns the fileName property

- 1.0.0 -- 2018-06-03

    - initial commit