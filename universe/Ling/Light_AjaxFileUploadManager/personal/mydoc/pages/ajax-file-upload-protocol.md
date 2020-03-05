Ajax file upload protocol
===================
2019-08-01 -> 2020-02-21


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
             
    - ?extension: string. The protocol extension to use. See the "Protocol extensions" section below for more details.
                 
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




Protocol Extensions
=============
2020-01-29


Protocol extensions are like modules, they add properties to the "ajax file upload protocol".
A protocol extension must define the "extension" property with the value of the name of the protocol extension.

And obviously, make sure the server you're communicating with understands the protocol extension you want before you send data to it.

The known protocol extensions are exposed in the next sections.




The fileEditor protocol addition
------------
2020-01-28 -> 2020-02-21

The fileEditor protocol addition is an extension of the ajax file upload protocol.
The goal is to provide the user with a more powerful file management experience.


The backend service is willing to handle the following extra-parameters (note that all of them can be overwritten by the server):

- extension: mandatory, string = fileEditor.
- action: optional, string(add|remove|update)=add.

    This defines the type of action to execute. The two choices are **add**, **remove** and **update**.
    With the **add** action, the intent is to add a new file to the server.
    The **add** action might trigger an error if the file we are trying to create already exists in the server (i.e. name conflict),
    depending on the server configuration.
    
    The **remove** action will delete an existing file. An error will be thrown if the user tries 
    to remove a non-existing file or a file she has not permission on.
    
    The **update** action intent is to update information about the file, and/or the file itself.
    Again, same as with the **add** action, if the updated file location already exists, the operation might be rejected 
    by the server, depending on the server configuration.
    
    Depending on the action type, the parameters to send to the server will differ, and so might the server's response.
    
    
     
- Params for the **add** action:             
    - filename: mandatory, string.
    
        The file path (including file extension) chosen by the user.
        How it's used by the server depends on the server configuration: it might be just a filename which the server
        would put in a predefined directory, or it could be a portion of path if the server configuration allows the
        creation of subdirectories.        
        
        The server might even overwrite totally or partially the filename in order to provide
        a better service (for instance the server could decide to choose the file extension).
        
    - is_private: optional, string=0|1.
    
        Indicates whether the file should be considered as private (only the user should be able to see it) 
        or public (anybody can see it).
        0 means public, 1 means private.
        The server might not understand that parameter, check your server before using that parameter.
        
    - tags: optional, array=[].
    
        An array of tags to attach to the file.
        It's an array of id => label,
        where id is the identifier of the tag.
        The server might not understand that parameter, check your server before using that parameter.
        
        
- Params for the **remove** action:
    - url: mandatory, string. 
    
    The url of the file to remove.     
    
- Params for the **update** action:
    Same params as the params for the **add action**, but with one extra property:
    - url: mandatory, string. The url of the file to update     
         



Response for the **add** action: same as the standard response.
Response for the **remove** action: same as the standard response, but the url parameter is not sent back.
Response for the **update** action: same as the standard response.





Related documents
====================

- [Secure file upload discussion](https://github.com/lingtalfi/TheBar/blob/master/discussions/secure-file-upload.md)
- [Ajax file upload discussion](https://github.com/lingtalfi/TheBar/blob/master/discussions/ajax-file-upload.md)

