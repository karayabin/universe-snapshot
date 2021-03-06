Light cli, conception notes
==========
2021-01-05 -> 2021-05-24

The major ideas behind **light cli** are:

 

- provide you with one executable (called **light** from now on) which you can use to manipulate all the light apps on your machine 
- third party plugins can extend our **light** program by adding their own commands  
- we provide some [basic commands](#usage-commands) to start with
- our executable has access to the light (initialized) instance, which makes programming easier for light developers (because we can access to the container)



Installation/basics
---------
2021-01-05 -> 2021-05-24


There are two ways to install the **light** command on your machine:

- the [automatic installation](#automatic-installation) (a one liner)
- the [manual installation](#manual-installation) (is the exact description of what the automatic **install** does, but you do them manually)


Regardless of the installation method you choose, it will do the following:

- install a **standalone light app** on your machine (located in **/usr/local/share/universe/Ling/Light_Cli/light-app-standalone**)
- install the **light-cli** executable on your machine (located in **/usr/local/share/universe/Ling/Light_Cli/light-app-standalone/universe/Ling/Light_Cli/bin/light-cli**)
- make two aliases to the **light-cli** executable, so that it's easier to call from a terminal:
    - light     (**/usr/local/bin/light**)
    - lt        (**/usr/local/bin/lt**)
    The two aliases work the same way, just use the one you want (by typing it directly in your terminal) to invoke our executable.
            



Once this is done, you can use our **light** executable/program to execute our [basic commands](#usage-commands), or some other commands from third-party authors.

As a third-party author, your commands have access to the **light instance** (and therefore the container of the app).


However, the **light instance** that you get depends on the current directory (pwd).

See more in the [light executable script](#the-light-executable-script) section.






The light executable script
----------
2021-05-24


Our executable resides in **/usr/local/share/universe/Ling/Light_Cli/light-app-standalone/universe/Ling/Light_Cli/bin/light-cli**, and can be called via either of its two aliases:

- light
- lt


The goal of the **light executable** is to initialize the light instance, and provide them to the rest of the code (i.e. the third-party authors commands' code, mainly)


In order to initialize the light instance, we internally do this two-steps process:

- call a [bigbang.php](https://raw.githubusercontent.com/karayabin/universe-snapshot/master/universe/bigbang.php) script to start the universe
- call the **init light script** (located at **scripts/Ling/Light/init.light.inc.php**) provided by the [Light planet](https://github.com/lingtalfi/Light), and which provides the **light instance** (and container). 
  

The exact path of the **bigbang.php** script and the **init light script**  depend on your current working directory (given by the native pwd command).

Basically, if you are inside a **light application** (which directory is **$appDir**) we try to use the files from the **light application** you are in.

If you're not inside a **light application**, then we resort to the fallback files located in the **standalone light app** that was installed during the [installation process](#installationbasics).


So, the possible paths for the **bigbang** script are:

- **$appDir/universe/bigbang.php**                                                          (if your are inside a light application located at $appDir)
- **/usr/local/share/universe/Ling/Light_Cli/light-app-standalone/universe/bigbang.php**    (by default, if you are not inside any light application)
  
Similarly, the possible paths for the **init light script** are:

- **$appDir/scripts/Ling/Light/init.light.inc.php**                                                         (if your are inside a light application located at $appDir)
- **/usr/local/share/universe/Ling/Light_Cli/light-app-standalone/scripts/Ling/Light/init.light.inc.php**    (by default, if you are not inside any light application)


Note that with this system, it's likely that the **light executable** uses the **bigbang** script from your app, while using the **init light script** from
the **standalone light app**. That's normal, and it's a design choice that actually solve some problems I had while conceiving third-party commands (i.e. the [Light_PlanetInstaller](https://github.com/lingtalfi/Light_PlanetInstaller) planet).




### automatic installation

2021-02-12

The steps are described in the [manual installation](#manual-installation).

Execute the following one-liner, which assumes you have the **php** (in version 8+) and **unzip** programs on your
machine.

Mac:

```bash
temp_file=$(mktemp); curl -fsSL https://raw.githubusercontent.com/lingtalfi/Light_Cli/master/scripts/web-installer.php > $temp_file; php -f $temp_file;
```

### manual installation

2021-02-12

1. First define a path where the **Light_Cli** plugin will put the assets it needs to work. We call that path **
   $cliPath**, and in the rest of this section we will choose **$cliPath**=**/usr/local/share**, which is the value used
   by the automatic installation (choose the value you want).

   Warning: before you change the default path, be sure to read
   the [machine universe](https://github.com/lingtalfi/UniverseTools/blob/master/doc/pages/conception-notes.md#machine-universe)
   concept, as our plugin subscribe to its philosophy.


2. Create the **$cliPath/universe/Ling/Light_Cli** directory.


3. Download the **light standalone app zip**
   from **https://github.com/lingtalfi/Light_AppBoilerplate/raw/master/assets/light-app-boilerplate.zip**.


4. Unzip it, and move the **light-app-boilerplate** dir to **$cliPath/universe/Ling/Light_Cli/light-app-standalone**.


5. Make the **$cliPath/universe/Ling/Light_Cli/light-app-standalone/universe/Ling/Light_Cli/bin/light-cli** binary
   executable (chmod u+x).


6. Make a symlink of that binary in **/usr/local/bin** (this is what the automatic **install** does), or the location of
   your choice.

    - cd **/usr/local/bin** && ln -s **
      $cliPath/universe/Ling/Light_Cli/light-app-standalone/universe/Ling/Light_Cli/bin/light-cli** light
    - cd **/usr/local/bin** && ln -s **
      $cliPath/universe/Ling/Light_Cli/light-app-standalone/universe/Ling/Light_Cli/bin/light-cli** lt (optional, but if
      you want to type lt instead light to save some time, create this symlink too)

   Note: I personally use only the **lt** command, as it's faster to type. Note2: make sure **/usr/local/bin** is in
   your $PATH (I believe it is by default), otherwise that wouldn't work.

7. That should have worked. Now invoke the **light** (and/or **lt**) command directly, you should see the light cli
   welcome screen.

Usage theory
------
2021-01-05 -> 2021-02-26

The **light** command (or its alias **lt**) can be used in the
following manners:

- light \<appId> <command> (\<args>)?
- light \<alias> (\<args>)?
- light \<specialExpression>

The first form is the most common. The second form is internally transposed to the first form, but it allows for less
verbose commands. The third form is reserved for our plugin's own commands, such as **help** for instance.

Some fictive examples of the first form:

- light lpi import Ling.Bat
- light mailer send johndoe@gmail.com --subject="Long time no see" --message="Hi there, how is it going? Long time no
  see..."

Some fictive examples of the second form:

- light import Ling.Bat
- light sendMail johndoe@gmail.com --subject="Long time no see" --message="Hi there, how is it going? Long time no
  see..."

Some fictive examples of the third form:

- light help

Plugin authors register their **cli app** using an identifier (**appId**).

Plugin authors also register their aliases if any, so for instance an author could register the following alias:

- import = lpi import

Different plugin authors could potentially register the same alias, for instance:

- import = appId1 import
- import = appId2 doImportItem

When this happens, we ask the user to make up his/her mind and select the command he/she wants to execute.





Usage commands
---------
2021-01-05 -> 2021-02-23


- **commands**: displays the list of registered third party application commands and aliases.
    - Arguments:
        - parameters:
            - filter: filters the list using either an int or a string.
                - If it's a string, it filters the list using that string. We search in **appId command** names.
                  By default, the filter expression matches any part of the string. To make it match only the
                  beginning of the string, prefix the string with the dollar symbol ($).
                - If it's an int, it's a number given by this list command. Each number represents a unique appId
                  command.
        - flags:
            - v: verbose, whether to display all the details about each command (flags, options, parameters, etc...).
- **create_app**: builds a light application with the given name in the current directory.
    - Arguments:
        - parameters:
            - appName: the name of the application to create
        - flags:
            - c: cache, by default, this command downloads the boilerplate from the web every time to make sure you have the latest version.
                If the c flag is raised, it will use the cached version instead. If the cached version does not exist yet, 
                it will be fetched from the internet.
        - aliases:
            - mkapp
- **help**: displays a help message.
- **planets**: lists all planets found in the current application, along with their current version numbers
    - Arguments:
        - flags:
            - l: display only light planets  
- **routes**: displays the routes available to the current app.
    - Arguments:
        - flags:
            - p: planets, group the routes by planets.
- **services**: displays the list of services available in the current app.
    - Arguments:
        - flags:
            - v: verbose, whether to display the class behind the services. Note that this method will instantiate all the services in order to access the classes.
              So, depending on what the service does when it's instantiated, one might generate side effects.




Plugin authors
-------------
2021-01-05 -> 2021-01-08

Plugin authors, to get started, create your [CliTools](https://github.com/lingtalfi/CliTools) program, and implement
our **LightCliApplicationInterface** interface. Read the source code of the interface to understand what it's all about.

When our application will call yours, it will pass the following:

- input:
  a [CommandLineInput](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/CommandLineInput.md)
  instance
- output: an [Output](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/Output.md) instance

Once this is done, you just need to register your cli application, using the regular service registration system in
light, and using our main service's **registerCliApp** method.






