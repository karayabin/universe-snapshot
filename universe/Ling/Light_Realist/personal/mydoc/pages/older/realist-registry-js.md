Realist registry js
===================
2019-09-25



Because many js tools are involved in a successful implementation of a realist,
and since some of those tools are re-used in different places, we provide
yet another js tool called the **realist registry** (realist-registry.js), which basically
provides access to the other tools.


It's a static object, which should be written by the renderer,
and which can provide the following shortcuts:


- getOpenAdminTableHelper(): returns a reference to the open admin table helper, provided
        that your realist uses an open admin table protocol helper, such as [Open Admin Table One](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/older/open-admin-table-helper-implementation-notes.md).
          