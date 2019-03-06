Html Template
=================
2016-01-31





Motivation
---------------

So I need to render items loaded via ajax.
The current technique I use is to render them server side, then my ajax call just display the whole 
spitted html.

That works, but now I'm thinking of using some more structured pattern.

First, which approach is better between rendering using server side scripting (php in my case),
or client side scripting (js + jquery in my case)?


I believe this:

- performances:
    displaying server side json and letting the client process the template distributes the load of work to do 
    between the client and the server, which is better than rendering all from php.
    
- about coding usability:
    I feel much more powerful with php than js, so I tended to think that it would be easier to code a template
    in php, however I missed the point that I can do hard info on the server side, and let the template be 
    what it should be: a dumb html template with place holders.
    
    
Therefore, I would now use the second approach: fetching json data from the server, then rendering
using a template system.
    
    

Now what template system?

I know moustache, which I copied to make a turbo version some times ago.
I like the simplicity of it.
I will start with a subset of turbo that just display simple strings.
When needed, I would add the loop ability.

Note: turbo has more options that moustache in the end, that's why I prefer turbo.
Also, I feel more comfortable extending my own code.

That is, if I can found old turbo files on my hard drive (oops?).


Organisation
----------------

My template files would be organized under the www/templates folder.
That makes it simple for my brain to know where to search when I'm looking for a template.

To use a template, the template "plugin" I use must help me with that, so that I just need to specify
the relative path of the template I want to use. 
I'll work on that sugar thing while I'm at coding.
That's important, it makes me focus right on the gluing code that binds a template to an ajax call,
rather than re-thinking about: so where should I put my template, and how should I call it, ...?

So, a must have.



Code first sketch
--------------------

With that in mind, I believe that the fetchTemplate method could be overridden by the user.


The inject json data workflow
-------------------------------
(what is not handled by the plugin is how you get json data from the server)
(so it starts when you actually have the json data)

(methods related to working with templates in a directory)

+ void      setTemplateDir ( str:url )
                defaults to: /templates
                
                
+ void      loadTemplate( str:template, callback:onLoaded )
                Load the template to use for the rest of the script.
                Should handle caching.

+ string    getHtml ( map:data )
                injects the data in the defined template, and return the 
                resulting string.
                



Nomenclature
---------------

template: a web template, as described above
templateString: some string being itself the template  








    