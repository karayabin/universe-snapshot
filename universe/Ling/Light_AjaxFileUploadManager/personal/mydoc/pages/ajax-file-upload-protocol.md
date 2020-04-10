Ajax file upload protocol
===================
2019-08-01 -> 2020-03-16


This protocol describes the communication between two actors:

- an application
- a backend service

The goal is that the application uploads a file (uploaded by the application user) to the backend server in a
relatively secure manner.

- Step 1: the application sends the following data to the backend service

     - id: string, the identifier of the uploaded item. This identifier is associated to an array of
            actions (aka [action list](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/pages/action-list.md))  
            to execute on the uploaded file.
            
            The action lists and corresponding ids are set in advance by the application, and the backend service has access to that list,
            so that when the application sends the id to the backend service, it knows what actions need to be executed.

             Any action can be taken, usually the server simply stores the file in the filesystem (and returns the expected response, see step 2)
             but it can also create extra thumbnails (in the case of images) with particular sizes, for instance.

             Also any number of actions can be linked to a single identifier.

             The "id" key has to be accessible via the $_POST array in a php backend.

     - ?item: this contains the uploaded file.
                 The "item" key has to be accessible via the $_FILES array in the php backend.

     - ?csrf_token: The csrf token to match.
             This is required if the **configuration item** referenced by the given **id** requires a csrf token validation.
             See more about the [configuration items](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/pages/configuration-files.md).
                 
    - ?...additional parameters can be added if necessary             

- Step 2: the response from the backend server.

     Every time a request is sent from the application to the server, the server responds with a json array having the following structure:

         - type: success|error
         - ?error: (if the response is of type error only) -- The error message
         - ?url: (if the response is of type success only) -- That's either the relative path (relative from the application web root) to where the file
                     has been uploaded, or the absolute path if the resource is not stored on the server (it then must start with http:// or https://).
                     
                      If the file has been stored at many places (in the cases of multiple thumbnails generation for instance),
                     only the main path is used, which is the path that we would store in a database if we wanted to access the file again.
         - ...

     The type defines whether the upload was successful.
     If an error occurred, the type should be error and the error entry should exist and contain the error message (a string).
     Other keys can be added, this is done via the actions system aforementioned.





 








Related documents
====================

- [Secure file upload discussion](https://github.com/lingtalfi/TheBar/blob/master/discussions/secure-file-upload.md)
- [Ajax file upload discussion](https://github.com/lingtalfi/TheBar/blob/master/discussions/ajax-file-upload.md)

