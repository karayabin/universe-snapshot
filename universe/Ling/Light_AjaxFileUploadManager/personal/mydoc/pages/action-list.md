Action list
=============
2019-08-01



The action list is actually an array of id => action list (which means each id is bound to an action list).

Each action list is an array of action items.

The id is just any string.

The main use of it, as defined in the [ajax file upload protocol](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/pages/ajax-file-upload-protocol.md), 
is that the application sends an id along with the file to the backend service, so that the backend service know which actions to execute on the uploaded file.



The main goal of an action item is to store the uploaded file in the file system.

In order to store a file, we have the option of renaming that file (for instance, we can randomize the file name for security reason,
or we could replace all weird chars with underscores, etc...).

Also, in the case of an image, we have the opportunity to create one or more thumbnail(s) of different sizes.

We can also create our own actions to do whatever we want when we receive an uploaded file.


The notation for an action takes the form of an array, with the following structure (which might expand with time):

Note that all entries are optional, depending on the action.

- storeDir: string, the path to the directory where to store the uploaded file.
        
        Basically, the complete path to the uploaded file will be this:
        
            - fullPath = $storeDir / $fileName
             
        storeDir can be one of the following:
                
            - a relative path (relative to the application root dir), if the first char is not a slash
            - an absolute path if the first char is a slash, in which case you can reference any directory on your machine

        Note: if you use this directive, it will create a copy of the uploaded file to the filesystem, otherwise it won't (but maybe your action
        does something else, like logging, sending email, ...).
        
- returnUrlDir: string, this is like the url version of the storeDir.
                returnUrlDir is the url prefix to prepend to the fileName to get the complete url of the uploaded file, in
                case this file is returned to the js client (isReturnedPath=true).
                
                Basically, the complete url (i.e. web accessible) to the file is:
                
                - fullUrl: $returnUrlDir / $fileName
                
                Notice that depending on your preferences/needs, $returnUrlDir can start with http:// or https://,
                or be an absolute url starting with a slash, or even a relative url (not starting with the http protocol nor with a slash).
                
                The only constraint is that the compounded fullUrl is web accessible (i.e. if it's you can put it in the href attribute of a link tag,
                and clicking that link would lead you to the resource).
                
                Note: storeDir and returnUrlDir work together (i.e. when you use one you use the other as well).
                
                
                                       
        
- nameTransformer: string, the file name transformer to apply to the uploaded file.
                The possible values are:
                - randomize($length, $keepExtension=true): returns a random name of $length character ($length being an int of your choice). 
                - snake: returns the snake version of the file name. See the [toSnake](https://github.com/lingtalfi/Bat/blob/master/CaseTool.md#tosnake) method for more info.
                - changeFileName($newName): changes the file name to $newName, and keeps the file extension if any.
                - set($newName): replaces the file name entirely with $newName. Note: this get rids of the old name's file extension if any.
                
- isReturnedPath: bool=true. Whether the relative file path created by this action should be the one returned by the backend service to the application.
                        Note: if an id is associated with multiple actions, you should set the isReturnedPath to false for all of them but one.
- imageTransformer: string, the image transformer to apply to the uploaded file (to use only if the uploaded file is an image).
                        The possible values are:
                        - resize($width=null, $height=null): this transformer will resize the image (up-resizing or down resizing are both permitted, but keep in mind
                            that the up-resizing is associated with a loss of quality of the image).
                            The way it works is that this transformer always keeps the original ratio of the image.
                            
                            If only one parameter is specified and the other set to null (for instance width=500 and height=null),
                            then the specified parameter is the absolute width (or height) that the resulting image will have.
                            
                            When both parameters are specified at the same time, they represent the maximum width and maximum height 
                            that the resulting image can have.
                            
                            If none of the parameters are specified, the original image will be simply copied with the same dimensions.
                            You shouldn't use the transformer without specifying any parameter (it's faster to not use an image transformer at all
                            in this case).
                            
                            Note: this method will replace any previously existing file if it has the same location.
- db_update: array. This entry updates a table in the database with the value computed if the **returnUrlDir** option is set.
                    This features depends on other services, so make sure the following service are accessible via your service container
                    before you continue:
                        - [user_manager](https://github.com/lingtalfi/Light_UserManager/) 
                        - [database](https://github.com/lingtalfi/Light_Database)
                    The db_update array has the following structure:
                        - ?db: string, the name of the database to update. This is optional. The default will be the default database of the pdo connection (defined by the configuration of the database service).
                        - table: string, the name of the table (without the database prefix) to update
                        - column: string, the name of the column to update
                        - where: array, the fields forming the where condition of the sql update statement.
                            For instance if the where array is like this:
                                - user_id: $userIdentifier 
                                
                            Then the where statement will look something like this:
                                - where user_id = $userIdentifier
                                
                            If the where array contains multiple entries like this:
                                - user_id: 45 
                                - amount: 78
                                
                             Then the entries are combined using the AND logical operator, and so the resultting where 
                             statement will look like this:
                             
                                - where user_id = 45 and amount = 78
                                
                             As for now, that's all we can do (I might expand on this notation as I have a concrete need for it).
                             The last important thing to know is that the value of the where can be a special token.
                             
                             A token is basically replaced with another value when computing the sql statement.
                             The available tokens are:
                                - $userIdentifier: the user identifier (the user being the user returned by the user_manager service's getUser method) 
                                - $userId: the user id (assuming that the user has a getId method, which is the case for a [WebsiteLightUser](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/WebsiteLightUser.md)) 
                             
                             
                             
                             
                             
                                
                                
                                
                                  
                                
                                
                                
                                    
                        
                        
                    
                                                       