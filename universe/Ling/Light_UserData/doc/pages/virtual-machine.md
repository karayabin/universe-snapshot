Virtual machine
==============
2020-03-16 -> 2020-05-19





Why a virtual machine?
-------------

The problem with my current implementation of ajax upload is that when a file is uploaded, it's also inserted
in the **luda_resource** table directly, and the file is created on the server.

So that can be a problem in various situations, one of them being the following.

Imagine an user profile form, where the user can change her avatar, which path is defined in the **lud_user** table.

The user drops a new picture to change her profile, and so the **fileuploader.js** script removes the old one and
adds the new one (that's how this script works) in the **luda_resource** table, effectively displaying the 
new profile picture.

The problem with that is that if we now refresh the page, the old reference from the **lud_user** table doesn't point to anything,
because the user didn't submit the form successfully, and it has been deleted by the js client, and the new picture path
is now in the **luda_resource** table, but the user is not aware of it.

So that situation is really a bad gui experience for the user, and needs to be fixed.
Furthermore, the same kind of bad gui experience happens when the user clicks the reset button of the form, 
expecting the whole form (including the picture) to revert back to its initial state, but with the current 
implementation this won't happen, as the current system performs the gui operations directly on the real files BEFORE
the form is submitted.





The virtual machine is basically my answer to those problems


Overview
------------
2020-03-16 -> 2020-05-19

We use an adapted version of the [TemporaryVirtualFileSystem](https://github.com/lingtalfi/TemporaryVirtualFileSystem).

In our version, we've added a few things:

- support for original urls, see the [conception notes](https://github.com/lingtalfi/Light_UserData/blob/master/doc/pages/conception-notes.md) for more info
- support for related files, see the [related-files.md](https://github.com/lingtalfi/Light_UserData/blob/master/doc/pages/related-files.md) document for more info


In the meta property, we've added the following:
- **has_original**: bool, whether the file has an original copy associated with it
- **related**: array, described in the **related-files.md** document


The **commit list** supports those new properties by adding the following absolute paths:

- (meta) 
    - original_abs_path: string=null, the absolute path to the original file if any, or null otherwise
    - related
        - (index)
            abs_path: the absolute path to the related file
            
            
            








