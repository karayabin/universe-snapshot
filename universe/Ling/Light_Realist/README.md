Light Realist
===========
2019-08-09



A list helper for your [light](https://github.com/lingtalfi/Light) projects.

This is a [Light framework plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).




Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Realist
```

Or just download it and place it where you want otherwise.






Summary
===========
- [Realist api](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- [Conception notes](https://github.com/lingtalfi/Light-Realist/tree/master/doc/pages)
- [Services](#services)



What is it?
============

Read the conceptions notes (link in the summary), starting with the realist conception notes.



Services
=========


This plugin provides the following services:

- realist


 



Here is the content of the an example service configuration file:

```yaml
realist:
    instance: Ling\Light_Realist\Service\LightRealistService
    methods:
        setContainer:
            container: @container()
        setBaseDir:
            dir: ${app_dir}

realist_action_handler:
    instance: Ling\Light_Realist\Service\LightRealistService
    methods:
        setContainer:
            container: @container()
        setBaseDir:
            dir: ${app_dir}


# --------------------------------------
# hooks
# --------------------------------------
$easy_route.methods_collection:
    -
        method: registerBundleFile
        args:
            file: config/data/Light_Realist/Light_EasyRoute/realist_routes.byml
```





History Log
=============

- 1.14.0 -- 2019-10-11

    - added special or, and, open_parenthesis and close_parenthesis to open admin tags
    - Revisit open admin table helper implementation
    
- 1.13.3 -- 2019-10-09

    - add GenericActionItemHandlerTrait->decorateGenericActionItemByAssets jsActionName and generateAjaxParams options, removed generate_ajax_params option
    
- 1.13.2 -- 2019-10-07

    - fix list actions nested items not handled properly
    
- 1.13.1 -- 2019-10-01

    - fix potential csrf token name conflict with multiple realist instances on the same page
    
- 1.13.0 -- 2019-10-01

    - add GenericActionItemHandlerTrait->decorateGenericActionItemByAssets modalVariables option
    
- 1.12.2 -- 2019-10-01

    - update doc
    
- 1.12.1 -- 2019-10-01

    - update doc
    
- 1.12.0 -- 2019-10-01

    - allow more compact notation for rendering.list_action_groups and rendering.list_general_actions
    
- 1.11.0 -- 2019-09-27

    - removed LightRealistListActionHandlerInterface->getHandledIds
    - removed LightRealistListGeneralActionHandlerInterface->getHandledIds
    - fix open admin table helper js pagination inconsistencies when changing nipp selector
    
- 1.10.3 -- 2019-09-26

    - fix problem with un-synchronized DocBuilder not generating doc
    
- 1.10.2 -- 2019-09-26

    - fix modal implementation forgotten part 2

- 1.10.1 -- 2019-09-26

    - fix modal implementation forgotten
    
- 1.10.0 -- 2019-09-26

    - add modal support for toolbar item and list general action items
    - fix wrong location for list general action handler class
     
- 1.9.0 -- 2019-09-25

    - update list action handler, removed the execute and getButton methods  
    - add realist-registry   
    - add general_actions concept

- 1.8.0 -- 2019-09-25

    - update open admin table helper main implementation, now uses ajax handler 
    - implemented basic csrf protection 
    - added list action handler params and right properties 
    - add ContainerAwareRealistDynamicInjectionHandler 
    - implemented list action: print 
    
- 1.7.0 -- 2019-09-19

    - add dynamic injection concept and (careless) implementation
    
- 1.6.5 -- 2019-09-18

    - fix doc links page -> pages
    
- 1.6.4 -- 2019-09-18

    - fix RealistListRendererInterface->render method not existing
    - fix doc links
    
- 1.6.3 -- 2019-09-16

    - update documentation link to susco
    
- 1.6.2 -- 2019-09-12

    - update documentation link to ric
    
- 1.6.1 -- 2019-09-05

    - fix typo in duelist, "all" special value is now recognized as a page_length (i.e. not page)
    
- 1.6.0 -- 2019-09-05

    - update duelist, "all" special value is now recognized as a page

- 1.5.0 -- 2019-09-05

    - add .oath-row-select-checkbox recommendation in the open admin table helper implementation notes
    
- 1.4.1 -- 2019-09-05

    - fix link to api
    
- 1.4.0 -- 2019-09-05

    - add the number_of_items_per_row widget in open admin protocol implementation one
    
- 1.3.0 -- 2019-09-05

    - add BaseRealistRowsRenderer->getUrlByRoute and extractRic methods. 
    
- 1.2.0 -- 2019-09-04

    - update OpenAdminTableBaseRealistListRenderer->prepareByRequestDeclaration 
    
- 1.1.1 -- 2019-09-04

    - testing new repository name sync
    
- 1.1.0 -- 2019-09-04

    - removed OpenAdminTableRendererInterface
    - added RealistListRendererInterface
    
- 1.0.1 -- 2019-09-03

    - fix doc link
    
- 1.0.0 -- 2019-09-03

    - initial commit