Ajax upload pattern
=======================
2017-02-26



This is a pattern to upload a file based on record data (from database),
and using an ajax uploader (like dropzone for instance).


For instance, we are displaying an user form from the database.
The user has a few properties:

- id
- name
- password
- avatar



Conception
------------------
Things to keep in mind:

- the ajax uploader is not synced with the form post.
        This means that first the gui user will upload the file,
        and then only she will post the form.
        
        In other words, the file is uploaded on the webserver BEFORE
        the form is posted.
        
        This means that the id (or any other primary key)
        is not available in the form (in insert mode) when the
        file is uploaded.
        
        Hence, if you want to have a file name based on the id (which
        is a logical idea), you need a workaround, like the one
        provided by this pattern, explained just below.

        The work around that we use in this pattern is that 
        we provide additional data (aka payload in this planet) to the file when the ajax file
        is sent via http.
        
        That is, we provide the record data along with the file.
        
        Then on the ajax/server side, we use tags to inject
        this record data to the file path.
        
        For instance, we could use this path:
        
            /tmp/mypath/upload/image-{ric}.jpg
        
        The ric is the dash separated version of the ric array.
        Note that we use the generic term ric instead of column specific names (like id for instance),
        because conventions like that tend to ease the implementation of the related tools.
        
        In update mode, we will have all the record data available
        (i.e. the ric columns are already defined), so 
        no problem to pass the data.
        
        
        However, for insert mode, we create a temporarily random value
        as ric (i.e. ric=fez980zegiuhzeKEj)
        and so the file is temporarily created with this random value.
        
        
            So, 
            /tmp/mypath/upload/image-{ric}.jpg
            
            creates the following file
            
            /tmp/mypath/upload/image-fez980zegiuhzeKEj.jpg 
            
            
            The trick is that we also save the random value
            in the session along with the path of the file (so ajax/server side).
            
            We will use the profile id, as the key, which is always available (on both
            the server side and the main side)
            
            
            $_SESSION[$myModuleOrNamespace][$profile_id] = [$tmpFilePath, fez980zegiuhzeKEj] 
            
            
            Note: the $tmpFilePath is given by the ajax server
            (i.e. the ajax server is part of the implementation of this pattern).
            
            With this random value stored in memory, we now just
            wait for the gui user to post the form
            (this time, main application side).
            
            When she does, and if the form is in insert mode,
            we parse all entries of the $_SESSION[myModule][$profile_id] array, and for each of them,
            we move the $tmpFilePath to its final destination (replacing the random
            value by the id of the record available to the application). 
            
            
            So, that's the basic idea and concepts behind this pattern.        



