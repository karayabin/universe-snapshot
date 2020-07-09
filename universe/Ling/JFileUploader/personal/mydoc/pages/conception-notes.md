JFileUploader conception notes
===========
2020-06-02




I've decided to rework JFileUploader from the ground up.

Now it's in version 3.

This tool was designed to handle the [file manager protocol](https://github.com/lingtalfi/TheBar/blob/master/discussions/file-manager-protocol.md).

And so as a side effect, it can do file uploading in general.




About the different versions
----------

tldr: version 3 was written with svelte.


First version was vanilla javascript with jquery. It worked well but when I added features to the **file manager protocol**, the code started to be messy,
so I rewrote it with js classes, that was version 2. To use classes, I had to use webpack/babel (I didn't know about those before starting coding
the version 2, since I always used vanilla js and jquery so far).

While I was coding version 2, I stumbled upon **react**, and since I was into re-factorizing the code, I decided to rework version 2 with react.
At first I was very happy with **react**, since it allowed me to get things done more efficiently. In particular, I could drop the handlebars template (from version 1)
completely, so I was hyped up. 

But then I realized that the toolchain to make react work was painful (at least for me), and it seemed to me that to use react scarcely (just creating a react widget
rather than a one page react application) was harder than advertised, and that basically once you dive into react there is no going back.

So that scared me, since I always could do anything I wanted in vanilla js + jquery, and in the end, I decided to drop all my efforts of learning react and use
the vanilla version which I found more flexible.

But then I stumbled upon **svelte**, and I was hyped up again, it seemed to have all the benefits of react, minus the downsides, so, although tired of learning
all those new frameworks, I gave it a try. 

Well, now I can say with certainty, **svelte** is awesome, it kept all its promises. To me, it's like **react** done the right way.

By that I mean: svelte is faster (because it uses pre-compilation instead of runtime diff evaluation of the shadow dom),
it's more friendly (react forces you to learn jsx syntax, while svelte just use the usual suspects: html js css all in one file).

The tool chain is also easier to setup, and at least in my case seemed to work better.

So, in the end, I'm glad I took the time to investigate in this technology, because it can speed up development time.

I believe I will use svelte for my next js widgets, at least if they require some kind of templating.

Anyway, version 3 was written with svelte.







At this time of writing, the version 3 is already written.
So, there is no conception work left to write, I will write the main documentation in the **README.md** instead.

And keep this **conception-notes** file for special topics (if any) that won't fit in the **README.md**.


 


