Light_ZouUploader
================
2020-04-13


A php facade to handle both regular uploads and chunk uploads.


The idea of the zou uploader is to help you handle both regular file uploads and chunk uploads in the same manner.

In terms of code, this helper will let you do this:



```php



$zou = new ZouUploader();
$zou->setDestinationPath($somePath);
$zou->setOptions([
    'override' => false,
]);
if(true === $zou->isUploaded($httpRequest)){
    // here you know that the file is fully uploaded, whether it's a regular upload or a chunk upload
}

```





How does it work
---------------

A regular upload is when the file is uploaded at once.

A chunk upload is when the file is broken into chunks, and the client sends the chunks one by one; and so the server receives the chunks one by one.


In the case of a regular upload, the ZouUploader doesn't have much to do, we just check that the given **phpFile** contains no error,
and copy the file to the destination path and that's pretty much it.


In the case of the chunk uploads however, we need to re-assemble the chunks together. The **isUploaded** method will only return true when all the chunks are uploaded.

How do we know when all the chunks are uploaded? We use a protocol named the [simple chunk upload protocol](https://github.com/lingtalfi/TheBar/blob/master/discussions/simple-chunk-upload-protocol.md).


Now whether we use the regular upload or the chunk upload is defined by an extra property that must be sent by the client:


- useChunks: string 0|1 = 0.



Note: for the chunk upload, we don't listen to the filename suggestion sent by the client, we let the application deal with it and set the 
appropriate destination path to our uploader.
