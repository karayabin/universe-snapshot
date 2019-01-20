General recommendations for rendering form errors
=================================
2017-10-30



It's all about rendering errors.

Why? because errors are trickier than the regular html control.

Maybe you'll want that your error disappear if the user start typing in the control.

And so to implement this kind of behavior, it's best if you have anticipated it in your html markup.

That's what I am going to discuss here.



Markup
==============
I believe (I might be wrong) one of the most flexible markup for this kind of implementation
is the following:


- the error container is already in the form, but is hidden with css.
- when an error is detected with js, its error message is injected inside the error container, and 
    a css class is added to the error container that makes it appear.
- when the user fixes the error (or start fixing it), js again makes the error message disappear by
    removing the "make-it-appear" class from the error container, which makes it disappear.
    
    
    
Here is an illustration of what I just said:


First, the markup is there, but hidden.

```html
<div class="control">
    <input type="text" name="first_name" value="">
</div>
<div class="soko-error-container">
    <span class="error-message"></span>
</div>

```


Then, an error appears, either injected with php (in case of a static form), or with js (if we have a fancier form).
Notice the **soko-active** class that makes the error container appear (not hidden anymore).

```html
<div class="control">
    <input type="text" name="first_name" value="">
</div>
<div class="soko-error-container soko-active">
    <span class="error-message">Your first name must contain at least 3 characters</span>
</div>

```
         
         
The obvious benefit of using a css class is now that we can remove it when we want with js.

So now the last step, we use js to detect that the user is typing in the input.

When she/he does so, all we need to do is remove the **soko-active** class.
We could also empty the error-message if we wanted to, but in this example I won't bother, and
so we end up with this (and yes, the error container is hidden): 


```html
<div class="control">
    <input type="text" name="first_name" value="">
</div>
<div class="soko-error-container">
    <span class="error-message">Your first name must contain at least 3 characters</span>
</div>

```


So, that's it.
Simple but efficient. 