Beauty conception notes
=======
2021-03-05



This is a tool I built in 2015.

It provides a gui for visualizing and triggering [bnb tests](https://github.com/lingtalfi/Dreamer/blob/master/UnitTesting/BeautyNBeast/pattern.beautyNBeast.eng.md).



I added a "planet system" flavour today, and so that's what I'm going to describe in this document.


Bnb planet system
---------
2021-03-05


The goal of this section is to help the end user setting up the gui in order to have
unit tests available for his/her app.


This system is optimized for planet authors. In fact, it will work only if the end user
follows some strict conventions explained below.


Here is the setup:


- first create a **bnb** directory at the root of your planet
- create all your test files in that directory, using the **bnb.php** extension.
    Note: you can add/change the file extension using the configuration section described later.
  
- now that your files are stored where you want we need to prepare your app so that it can read your tests.
    This needs to be done once per app:
    - At the root of your web server, copy the following two files (you will find them in our repository under the **demo** directory:
        - **bnb.php**: this is the main gui 
        - **bnb-unit.php**: this is the proxy to a single test, it's called via the gui 

- now open the **bnb.php** file and configure it (the configure section is at the top of the file)
- now you're all set, open the bnb.php file in a browser, and play with the gui to trigger your tests and see the results...
    






