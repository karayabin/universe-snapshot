Vswitch
------------
2016-03-02



Thoughts, brainstorm, intro
----------
Sometimes you have a portion of your html page that lives by its own (independent of the rest of the page).
Let's call that a web module in this document.

For instance if you have a form, and the user clicks the submit button and the form validates,
and then the form is replaced by a success text: "Your data has been submitted. We'll get in touch soon.".
 
Often times, it appears as if an element of the web module was REPLACED by another one.
If I call that element a view, then all we do to accomplish the web module's goal in that case is switch from a view to another.

Switching views appears to be a recurrent task when creating gui.
However, there are many ways to approach it, depending on your needs.


Two popular techniques are:

- putting all your html code in the web module's views, and showing/hiding those that you want
- re-render the web module based on events triggered by the user



The vswitch object is based on the show/hide technique.



Implementation, brainstorm
------------------

A classical technique is to put everything in the same "template" and switch via css display: bloc|none.
Let's illustrate this technique with the form example described above.


```html
<div class="view_node">
    <div class="view form">
        form...
    </div>
    
    <div class="view success">
        Yeeehaa
    </div>
</div>
```


So we have our view node, which direct children are only switchable views.
Then with the help of simple css rules, we can have our mechanism done in no time.
 
 
```css
.view_node .view{display: none;}
.view_node.form > .form,
.view_node.success > .success
{display: block;}
``` 

Then to switch view, we just need to add the form or success css class to the view node.


That works, but let's think about this model.

+ easy to implement
+ everything in the same template (easy)
+ works fine with css transitions

- everything in the same template (some prefer to have one view per template)







Conclusion
---------------

It might/might not be the perfect solution for your needs.

 
 
 




  