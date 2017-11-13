Claws mvc
===============
2017-10-31



Claw mvc is a redefined form of MVC.

[![claws-mvc-displaying-page.png](https://s19.postimg.org/d2wzewzwz/claws-mvc-displaying-page.png)](https://postimg.org/image/a8tu1gxqn/)


The goal is still for the model to pass information to the view, via the controller.

The three main components are:

- M: the model, which goal is to provide an array (or sometimes an object if more appropriate) to the controller.
        This array is also called the model (which I agree is confusing).
        The model generally communicates with some api provided by the application.
        Those apis should be specifically designed for the model (i.e., the other components V and C 
        should have their own apis, but should not be able to communicate with the model api).
        
- V: the view, which goal is to display the array passed by the controller.
        The view has the responsibility to decide every thing that relates to design and appearance.
        It has the power to translate some strings that are left over by the model.
        It is recommended that the view's apis are rather tools (that we can call statically) available 
        to the application, like a translator function, or a assets loader tool (view related tools).
        
- C: the controller, it's responsible for returning the http response.
        In other words, if the user request an html page, the controller is responsible for returning
        the html page.
        To do so, it can do whatever it wants.
        
        In claws mvc, the controller receives the model, and also has a claws object to which it can attach widgets to.
        
        And so composing an html page by attaching widgets to the claws object is the daily task of the controller
        in this system.
        
        To enhance re-usability, we (claws-mvc developers) strive at making the controller as slim as possible.
        For that, we encapsulate the model code in a wrapper, as to promote the idea of importing the model
        with just one line of code.
        
        If the model requires variables, the controller usually serves as a medium, unless this variables
        are accessible directly via the super php arrays (like $_GET, $_POST, etc), in which case there is no need
        for the controller to pass them to the model.
        
        Sometimes, the chosen widgets depend on the model, and so the controller can analyze some part of the model
        to decide which widget(s) to attach/not attach.
        Since different paths become then possible, we recommend that the Controller can be overridden at the 
        theme level, if the host application allows such a thing.
        
         
        
        
        
        
Using the clawsMvc model promotes thin readable controllers, which makes it easier to create new pages or re-use pages.
                 
From now on, it is recommended that users of the kamille framework adopt the clawsMvc system in their applications.                
        
        

Suggested organization for your apps
----------------------------------------

- class-modules
    - $moduleName
        - Model
            - Front
                - $yourFrontModelName.php
                
- class-controllers
    - $moduleName
            - Front
                - $yourFrontControllerName.php
                
- theme
    - $someRelativePath
        - $moduleName                
            - Front                
                - $whatever.tpl.php                
                
