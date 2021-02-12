Environments in light
==============
2021-02-09




This document contains my thoughts about the subject of environment.

I intend to implement those thoughts in the light framework.



So the basic idea of environment is that a web application might behave differently depending on where it's deployed.

If it's on the local developer machine, or on a production machine, etc...


For the rest of this discussion, let's simplify the environments to only two: development (dev), and production (prod).


So what is really different in the same app in dev and in prod for instance?

Database passwords, credentials in general, debug mode behaviours, probably other things.



Problem/solution
--------
2021-02-09


The problem that I want to minimize today is maintenance. 

When we have one app per environment, we still have to maintain each of them.

So for instance when we change something in dev, we want those changes to be reflected in all the other environments.


A common approach to this is to say that the only things that really changes when you update an app is the configuration files,
and so the app should be able to detect the environment it's in, and use the appropriate configuration files.


That's the basic idea I'm going for.

I do believe that the changes we are interested in can be centralized in a concept that I will name "environment sensitive files".

It's a good idea to keep those types of file to a minimum, as to make the maintainer's job easier.



The environment sensitive files in light
-----------
2021-02-09


In light, for the moment, I'll try to keep those sensitive files to the following list (that I should update live).

- plugin's configuration files




Implementation
----------
2021-02-09


So how does light know which environment it's in, and what does it do when it knows it?

Let's tackle the first question first: how does light know which environment it's in?


By default, and by convention, we assume that the app is always in prod mode, unless the **$_SERVER['APPLICATION_ENVIRONMENT']** is set (in which case its value is used as the environment)


Now to change it, I let developers infer that the way they want, so that there is some flexibility.

We could use apache variables to define that, or set it manually on each environment.

I remember using this trick, working on a local mac os x and a prod unix server, where I set a php condition based on the existence
of the **/Users** directory, which only exists on the dev machine but not on the prod.

So, whatever you decide is good. 

The **scripts/Ling/Light/init.container.inc.php** is where it's located at the moment I'm writing those lines.

Then, we store it in the light instance, and from there it's available via the container, since the light instance is available via the container
at all time.


For the second question: what does it do once it knows the environment?

We have to answer this question for each item of the [environment sensitive files](#the-environment-sensitive-files-in-light).


### plugin's configuration files
2021-02-09


My idea, which I saw in other php frameworks, is to use name pattern recognition.


I propose this naming convention for plugin's configuration files (which are [babyYaml](https://github.com/lingtalfi/BabyYaml)) files in light:

- /config/services/$pluginName.byml: this is the regular plugin configuration file location in light
- /config/services/$env/$pluginName.byml: this is an optional environment sensitive file for the **$env** environment.


With:

- $pluginName: the name of the plugin/planet
- $env: the name of the environment (dev, prod, ...)


Then in terms of merging algorithm, here is what I propose:

- the **environment sensitive file**, if it's a babyYaml file (i.e. a php array), should be merged into its non environment sensitive sibling,
    using the array_merge like algorithm (meaning its data will override the non environment sensitive file in case of conflicts).
  


To demonstrate the exact syntax, let's use an imaginary **Light_Train** plugin.

It's configuration file is (**config/services/$pluginName.byml**):


```yaml
train: 
    instance: Ling\Light_Train\Service\LightTrainService
    methods: 
        setContainer: 
            container: @container()
        
        setOptions: 
            options:
                password: prod_pass_ABC123
                

```

As stated earlier, we assume that the natural state of the app is **prod**.

Now to override the password in the dev environment, let's create this file, **config/services/dev/$pluginName.byml**: 


```yaml
train.methods.setOptions.options.password: dev_pass_ABC123
```


So now with this setup, when the environment is **dev**, the password used by this plugin will be: **dev_pass_ABC123**, and otherwise, it will default to **prod_pass_ABC123**. 













         





























