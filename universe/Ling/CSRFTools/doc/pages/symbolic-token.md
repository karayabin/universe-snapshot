Symbolic token
==============
2019-09-20



Let's agree on the fact that a csrf token is brought to the gui by a **gui object**, such as a form, or a list, an ajax button, etc...


The best practice in terms of security regarding csrf implementation is to generate one csrf token per **gui object** instance.


But me being lazy, I encountered this case where I decided to weaken the csrf security a little bit, in exchange of a little less burden
for the developer.


So what follows is not a recommendation at all (in fact, it would be the opposite), but rather just an idea that I will
personally use in some instances of the applications I'll develop. I use this idea to save me some time, or when I'm too lazy (in a bad way).

So in other words it's a trade off.

So the idea is that rather than generating one token per **gui object** instance, we generate one token per **gui object** for a given page.

The thing is that there might be multiple instances of the same **gui object** on the same page.

And so my idea of **symbolic token** is to generate one **csrf token** representing all the **gui objects** of the same type for a given page.


### What's the benefit?

The main benefit is that I don't have to handle individual (csrf) token names, I can just rely on the fact that my object uses a symbolic token, which name remains the same
across the different pages of the applications. If I was using individual token names, I would have to recreate a token name for every page.


### What's the drawback?

The main drawback is that if there are multiple instances of the **gui object** in the page, the attacker has now as many windows to attack.

So for instance if I use a form object with a csrf token, and I have two of those forms on the same page, the attacker can attack both of those forms at the same time.

Note that it doesn't necessarily mean that the security strength is divided by two; after all the attacker still needs to guess the token, but it's just
that if he brute forces the token, he can use either of those two forms.

Also, if he manages to guess the token, he can now corrupt either form.


### My last thoughts

That being said, some objects are usually not used more than once on the same page.
In my case, the only objects that generate csrf tokens so far are a form and a list system, and I've never had more than one
instance of them on the page so far.

So the symbolic token is more often than not a theoretical issue, but it will eventually happen if you go for it.

I personally believe that the trade off is worth it, depending on how frequently I estimate that an object will be used on the page,
as the security's loss doesn't (I believe) help the attacker that much, whereas I can clearly see some precious time saved development wise.

So again, I'll personally go for it in some cases, but I would recommend that one implement this idea only if he knows what he's doing (what are the consequences in terms of security,
and what benefit you get from not creating a token name per object).   

 





  


