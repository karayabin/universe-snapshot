Virtual machine
==============
2020-03-16





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

The vm has two states: an initial state and a current state.

The vm is initialized (i.e. initial state)  whenever the page is refreshed and the form is not posted.
The vm's current state is used when the form is posted, but there are some errors in the form. 


Then, when the user interacts with the gui, all the operations (delete, create, update) are performed in a virtual space handled 
by the virtual machine.

Now when the form is submitted successfully only, the vm operations are committed to the actual database and filesystem.

Also, if the user resets the form, the virtual machine is simply reset to its initial state.

