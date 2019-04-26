Light_Kit_Demo
===========
2019-04-25


WWORK IN PROGRESS, COME BACK IN A FEW MONTHS...



Some demonstration of how to use Light_Kit with concrete websites.


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Light_Kit_Demo
```

Or just download it and place it where you want otherwise.






Summary
===========
- [Light_Kit_Demo api](https://github.com/lingtalfi/Light_Kit_Demo/blob/master/doc/api/Ling/Light_Kit_Demo.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))



What is this?
============

This is my first [Light_Kit](https://github.com/lingtalfi/Light_Kit) demo.


My intention is to create 5 websites using the Light_Kit planet.

The 5 websites use bootstrap.


The credits for those 5 websites actually goes to Brad Traversy, the author of the course [Bootstrap 4 From Scratch With 5 Projects ](https://www.udemy.com/bootstrap-4-from-scratch-with-5-projects/),
which I followed on udemy.com, and from which I learned how to use bootstrap 4. 

I can only recommend this course for any web developer who wants to learn bootstrap 4.

Now the Light_Kit planet is not limited to creating bootstrap themes, but I wanted to start simple first, and so bootstrap appeared to me as a good starting point.


So here are the live versions demos (and again, if you want to learn how to create those templates, take the course by Brad):

- LoopLab           status: todo link  
- Mizuxe            status: todo link
- Glozzom           status: todo link
- Blogen            status: todo link
- PortfolioGrid     status: todo link



And the code for each project can be found in the projects directory of this repository.

Now for saving some space, the (planet) dependencies for each project isn't included, but I added a map.txt file in the universe directory,
so that you can simply run the following commands to repatriate them all at once: 


```bash
cd /the_app_that_you_want
uni map
```

This command will search for a map file in **/the_app_that_you_want/universe/map.txt**, and will import all the planets
defined in it. More info in the [help of the uni tool](https://github.com/lingtalfi/Uni2#help).

Once you've done that, you have the complete code.






History Log
=============

- 0.1.0 -- 2019-04-26

    - add assets for looplab prototype version 

- 0.0.0 -- 2019-04-25

    - initial commit