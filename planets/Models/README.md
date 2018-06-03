Models
===========
2017-04-18



Models for your templates.


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).





What's a model?
===========

A model is a set of well defined properties (key/value pairs) representing an object.

Templates are responsible for displaying models.

The main idea behind models is that the same model can be interpreted by different templates.

So, with the same mould, we can create different variations, basically.






Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Models
```

Or just download it and place it where you want otherwise.






Related
=========
- https://github.com/lingtalfi/form-modelization
- https://github.com/lingtalfi/FormModel



History Log
------------------
    
- 1.25.0 -- 2018-03-30

    - add SimpleDropDownModel model
    
- 1.24.0 -- 2018-03-28

    - add InfoTableModel hidden property to the model
    
- 1.23.0 -- 2018-03-27

    - add InfoTableModel colTransfomers property to the model
    
- 1.22.0 -- 2018-03-27

    - add InfoTableModel
    
- 1.21.0 -- 2018-01-18

    - update formModel -> 1.3.0
    
- 1.20.0 -- 2017-12-03

    - add RepaymentSchedule model
    
- 1.19.1 -- 2017-11-27

    - update formModel -> 1.2.1
    
- 1.19.0 -- 2017-11-27

    - update formModel -> 1.2.0
    
- 1.18.0 -- 2017-11-27

    - update formModel -> 1.1.0
    
- 1.17.0 -- 2017-11-24

    - add formModel 1.0.0
    
- 1.16.0 -- 2017-11-15

    - add ListBundle model
    
- 1.15.0 -- 2017-08-26

    - add Breadcrumbs model
    
- 1.14.1 -- 2017-08-04

    - fix LeeListSortBarModel bugs
    
- 1.14.0 -- 2017-08-03

    - add Pagination model
    
- 1.13.0 -- 2017-08-03

    - add ListSortBar model
    
- 1.12.1 -- 2017-08-02

    - fix LeeAdminSidebarMenuModel getArray doesn't return active property
    
- 1.12.0 -- 2017-08-01

    - add AdminSidebarMenuModel optional active property
    - LeeAdminSidebarMenuModel now understands active property 
    
- 1.11.0 -- 2017-08-01

    - add LeeAdminSidebarMenuModel
    
- 1.10.0 -- 2017-08-01

    - add AdminSidebarMenuModel optional name property

- 1.9.0 -- 2017-05-07

    - DataTable model: add link value for type 
    
- 1.8.0 -- 2017-05-06

    - DataTable model: headers does now contain only columnIds 
    
- 1.7.0 -- 2017-05-05

    - renamed actionLink to actionItem
    
- 1.6.0 -- 2017-05-03

    - add dropDown and actionLink models
    
- 1.5.1 -- 2017-05-03

    - add flavour to DataTable model
    
- 1.5.0 -- 2017-05-03

    - add paginationNavigators and paginationLength
    
- 1.4.3 -- 2017-05-03

    - add textPaginationPrev and textPaginationNext methods
    
- 1.4.2 -- 2017-05-02

    - add textUseSelectedRowsEmptyWarning and action\[useSelectedRows] for DataTable model
    
- 1.4.1 -- 2017-05-02

    - add textEmptyBulkWarning and showEmptyBulkWarning for DataTable model
    
- 1.4.0 -- 2017-05-01

    - add textSearchClear for DataTable model 
    
- 1.3.0 -- 2017-04-30

    - improved on DataTable
    
- 1.2.0 -- 2017-04-30

    - add DataTable
    
- 1.1.0 -- 2017-04-22

    - add AdminSidebarMenuModel
    
- 1.0.0 -- 2017-04-18

    - initial commit