Developer FAQ
--------
2020-08-18




How do I alter the number of columns without breaking the display?
------------
2020-08-18


It all depends on your concrete renderer, but in theory, every renderer should follow this algorithm to display the list:


From the realist nugget:

- take the **rendering.column_labels**, and subtract the **rendering.hidden_columns** from it, you obtain the columns to display


If you use the [open admin table protocol](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/open-admin-table-protocol.md), then if you add a custom column in the **rendering.column_labels**, you 
also need to provide a value in **rendering.open_admin_table.data_types**; failing to do so can result in display problems,
such as an extra column being displayed by the renderer. 

