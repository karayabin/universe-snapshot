Actions list provided by the Light_UserData plugin
=============
2020-03-19


The Light_UserData plugin provides its own [action list](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/pages/action-list.md) item described below.



To use our action list item, you must specify the **use_Light_UserData** option with value = true.


Here is how our action list item looks like:

- ?nameTransformer: see the [action list page](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/pages/action-list.md) for more details
- ?imageTransformer: see the action list page for more details

- use_Light_UserData: (bool)true.     
    
    If the data you want to upload belongs to an user, you might want to consider this option.
    This pattern helps implementing a relatively secure ajax upload system, where the uploaded files are uploaded OUTSIDE the web root directory.
    
    Along with this property, you also need to define the path (see the path property below).
    All the properties below are available only when **use_Light_UserData** is set to true.
                                 
    - path: string. The relative path from the user directory (See the [Light_UserData plugin documentation](https://github.com/lingtalfi/Light_UserData) for more info)
        to the file name you want to upload.
                     
        The uploaded file will be stored into the current user directory (as defined by the LightUserDataService->save method, which is used
        under the hood). 
                     
        The string accepts the following tags:
        - {extension}: will be replaced with the file extension from the name (or transformed name if the name is transformed)
        - {filename}: will be replaced with the file name, which is like the output of the php basename function (i.e. it includes the file extension)
        
    - ?allowSlashInFilename: bool=false.
        This property defines whether or not the forward slashes are allowed in the file name provided by the user.        
                  
    - ?overwrite: bool=false.    
        Whether to allow that the file sent by the user overwrites a file already existing in the filesystem (in case of name conflict).
        
    - ?keepOriginal: bool=false.
        The Light_UserData has this concept of [original files](https://github.com/lingtalfi/Light_UserData/blob/master/doc/pages/conception-notes.md#the-original-file),
        This property defines whether or not to keep an original of the uploaded file.
        
    - ?useVirtualMachine: bool=true
        
        Whether to use the [virtual machine](https://github.com/lingtalfi/Light_UserData/blob/master/doc/pages/virtual-machine.md).
        If true, the id parameter must be passed by the js client, which will be used as the **virtual context id**.
        Note: we chose to use the id parameter because it's already passed by the [ajax file upload protocol](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/pages/ajax-file-upload-protocol.md),
        and we believe it's a good **virtual context id** candidate as well. 
                      
    - protocol: string(fileEditor|null)=null.
    
        The protocol to use.
        The only available choice for now is the **fileEditor** protocol, which means that the server would work in compliance
        with the [file editor protocol defined as an extension of the ajax file upload protocol](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/pages/ajax-file-upload-protocol.md).
        The following properties are exclusively used with the **fileEditor** protocol.        
         
        - ?maxFileNameLength: int.
            The maximum length for the given filename. It ensures that the user won't try to hack the server by sending very long filenames.
            
        - ?isPrivate: bool=false. 
            
            Defines whether the uploaded file is private. The concept of privacy is the one defined in the [Light_UserData conception notes](https://github.com/lingtalfi/Light_UserData/blob/master/doc/pages/conception-notes.md).
            If not set, the user can provide her own value using the [file editor extension of the ajax file upload protocol](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/pages/ajax-file-upload-protocol.md).
            
        - ?tags: array=[]. 
            
            Defines the [tags](https://github.com/lingtalfi/Light_UserData/blob/master/doc/pages/conception-notes.md#tags) to attach to the file.
            If not set, the user can provide her own value using the [file editor extension of the ajax file upload protocol](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/pages/ajax-file-upload-protocol.md).

    - use_2svp: bool=false. 
        
        This is deprecated.        
        You should only use this if you use the [symbolic file name](https://github.com/lingtalfi/TheBar/blob/master/discussions/ajax-file-upload.md#symbolic-file-names) system (which is now deprecated).
        See the [2 steps validation process](https://github.com/lingtalfi/TheBar/blob/master/discussions/ajax-file-upload.md#2-steps-validation-process) section for more details.
        Note: in this plugin we only implement the first part of the 2svp system, where we save the file with the 2svp extension.
        The second part (removing the 2svp extension) is outside the scope of this plugin.   



Examples
===========

         

Example #1: using the Light_UserData plugin
-------------------------
This example uses the [Light_UserData](https://github.com/lingtalfi/Light_UserData) plugin,
which basically allows you to store the user uploads outside the web root directory.

The configuration excerpt below comes from the Light_Kit_Admin (currently in development as I write those lines):

```yaml
# /my_app/config/data/Ling.Light_Kit_Admin/Ling.Light_AjaxFileUploadManager/main.byml
items:
    lka_user_profile:
        csrf_token: true
        action:
            -
                use_Light_UserData: true
                protocol: fileEditor
                path: images/{filename}
                imageTransformer: resize(200)
#                isPrivate: false
                maxFileNameLength: 64
                allowSlashInFilename: true
                overwrite: false
                keepOriginal: true
        validation:
            maxFileSize: 2M
#            maxFileSize: 2g
            extensions:
                - png
                - jpeg
                - jpg
                - gif
                - mts

```
                           