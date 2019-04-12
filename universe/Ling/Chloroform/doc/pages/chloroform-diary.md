Chloroform diary
=========
2019-04-10


I asked myself if I really need a tool for creating forms. I mean, I saw other systems like WTForm for the python Flask framework,
and looking at the templates, they were so close to a hand-written form that I asked myself: is it really worth it?


My conclusion was that a form system has another side of the coin, and so basically a form system has two usages:


- you can use the Form object to quickly create a validation system. 
        So for instance you would use it and inject the $_POST variables in it, and have a method like validates_on_submit.
        
- now as far as rendering is concerned, there is also a distinction to make between the front forms, which you are more likely
        to create manually, because there is only one or two forms, and you want full control on the design and so 
        you almost don't need a form system in this case.
        
        But there is also the forms for an admin back end, and you probably will need to create a lot of forms
        (for instance in an auto-admin plugin), and so in that case, it's worth creating a Renderer object that knows
        exactly how to render automatically a form based on the control types.
        
        
So, if it's not the most useful thing to have for rendering front forms, it still is a valuable asset to have in one's toolbox.

And so, I will implement it.




I've nothing special to say about the implementation yet, I'll just do a logical (boring but no surprise), simple implementation
of what you would expect for a form system.




From reading Form design pattern book:
------------------

Error messages should be like:

- Enter your first name          
         
         
Labels should be direct, like:

- First name  (i.e. not "Enter your first name")         




I will continue in the [chloroform discussion](https://github.com/lingtalfi/Chloroform/blob/master/doc/pages/chloroform-discussion.md) document.



