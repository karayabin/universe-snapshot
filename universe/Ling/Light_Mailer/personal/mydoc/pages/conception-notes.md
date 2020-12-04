Light_Mailer, conception notes
=============
2020-06-26 -> 2020-11-30


   
* [What's the template](#whats-the-template)
* [Multi-transport](#multi-transport)
 * [smtp parameters](#smtp-parameters)
* [Multi-sender](#multi-sender)
* [Logs](#logs)
* [Types of variables](#types-of-variables)
* [Template parts reference](#template-parts-reference)
* [Files](#files)




Light_Mailer is a service to send mails in the context of a [light](https://github.com/lingtalfi/Light) application.


It uses [SwiftMailer](https://swiftmailer.symfony.com/) under the hood.



**Light_Mailer** works with templates, so that sending an email is just about choosing a template id, like this:


```php 
 
$recipientList = ['paul@gmail.com'];
$container->get('mailer')->send('welcome_new_subscrber', $recipientList);

```

That's the basic idea.

But of course, before you can do that, you need to configure the service (in particular the smtp parameters),
and create the template, which is explained below.



What's the template
-----------
2020-06-26 -> 2020-08-14


By default, we have all the templates in the **${app_dir}/templates/Light_Mailer** directory.

You can organize yourself how you want inside this directory.

Creating subdirectories is possible, in which case the name of the template will use the (forward) slash char as the path delimiter.


Here is an example of structure:

```txt

- /myapp/templates/Light_Mailer/
----- my_app_1/
--------- welcome_new_subscriber/
------------- html.html
------------- plain.txt
------------- subject.txt
--------- forgotten_password/
------------- html.html
------------- plain.txt
------------- subject.txt
```


The above structure contains two templates:

- **my_app_1/welcome_new_subscriber**
- **my_app_1/forgotten_password**


As you can see, the template name is basically the relative path (from the **Light_Mailer** directory) to the directory
containing your templates.


Each template directory can contain the following files:

- html.html
- plain.txt
- subject.txt


The **html.html** file contains the html version of your mail, **plain.txt** contains the plain version, and **subject.txt**
contains the subject of your email.

You can override the subject on the fly when sending an email.

For the body of the email: if your email contains html, it's recommended to provide both versions, html and plain, but if
you omit the plain version, our service will create one automatically based on what you've provided 
(by stripping the html tags from the **html** version).

If you provide only the **plain** version, then our service considers that you only want to send a plain text email and
 will just send the plain version as is.




Multi-transport
-------------
2020-06-26


Our service let you configure multiple transports, and have them assigned to an id,
so that when you send an email, you can choose which transport to use simply by referring to its id.


One of the transport must have an id of "default", and will be used by default if you don't specify the transport
when sending an email.


You configure the different transports via an array of transport items (see our configuration file).
The key is the **transport id** (for instance "default", or "banana"), and the value is an array containing
at least a **type** property, which can be one of the following:  

- smtp


Then depending on the transport type, you might need to provide more parameters.


### smtp parameters

The extra parameters for the smtp transport type are:

- host
- port
- username
- password


Here is an example of our service configuration, to make this more obvious:


```yaml
mailer:
    instance: Ling\Light_Mailer\Service\LightMailerService
    methods:
        setContainer:
            container: @container()
        setTransports:
            transports:
                default:
                    type: smtp
                    host: sslmail.fai.com
                    port: 995
                    username: contact@mywebsite.com
                    password: abcdefg123
```



Multi-sender 
----------
2020-06-26


Alike transport items, you can configure multiple senders.


Each sender item is an array of options defining who is sending the mail, and optionally who should the response bounce to.


The following options are available (per item):

- **from**: the address(es) of who wrote the message (required).

    If it's an array, then we add a "From:" field for each item of the array.
    Each item of the array can be either a string or an array with the following structure:
    - 0: address 
    - 1: name
     
    Note: if you use multiple from fields, then you must specify a sender.
    For more details, refer to the [swift mailer documentation](https://swiftmailer.symfony.com/docs/messages.html#specifying-sender-details).
    
    Tip: use the array notation if you want to customize the name in the "From:" field (instead of having just the plain email address).
    
- **sender**: the address of the single person who sent the message (optional)
- **returnPath**: the address where bounces should go to (optional)


Only the **from** property is required.
If you want that the response to your email bounces to another person than the one(s) specified with the **from** option,
then you need to specify the **returnPath** option.
 
The **sender** option exists because the person who actually sent the email may not be the person who wrote the email. 
It has a higher precedence than the **from** option and will be used as the **returnPath**, unless otherwise specified.


Each **sender item** is referenced by an id, one of those id must be **default**, and is used by default unless otherwise
specified.


Here is an example of our service configuration, to make this more obvious: 



```yaml
mailer:
    instance: Ling\Light_Mailer\Service\LightMailerService
    methods:
        setContainer:
            container: @container()
        setTransports:
            transports:
                default:
                    type: smtp
                    host: sslmail.fai.com
                    port: 995
                    username: contact@mywebsite.com
                    password: abcdefg123
        setSenders:
            senders:
                default:
                    from: contact@mywebsite.com
```




Logs
--------
2020-06-26


We believe in logs.

Using the [Light_Logger](https://github.com/lingtalfi/Light_Logger) plugin under the hood, we provide two types of logs:


- a debugging mechanism via the **mailer.debug** channel if you set the **useDebug** option to false, at our service configuration level.
- a list of all failed addresses (along with the templateId information), via the **mailer.send_failures** channel. 
    It's active by default, and can be disabled by setting the **useSendFailuresLog** option to false, at our service configuration level.


 

Types of variables
----------
2020-06-29 -> 2020-11-30


We can use variables to make the content of our template more dynamic.

**Light_Mailer** has two types of variables:

- **common variables**
- **recipient variables**

The difference is that **recipient variables** are specific to a recipient, while **common variables**
apply to every recipient.


To write a variable, we use the tag notation like this (by default): 

```html
This is a {variable}.
```

The common variables are resolved first, then the recipient variables.

The colon (:) character cannot be used in variables, as it's reserved for [template parts reference](#template-parts-reference).


You can replace a variable by a string or a **php callable**.

If it's a callable, it must return a string.

The parameters of the callable are:

- context: an array of variables that you can define when sending the email


Variables apply in every part of the email: subject, plain and html.




Template parts reference
---------
2020-11-30

In addition to using variables, you can also replace some parts of your email with some template parts references.

Template parts reference allow us to write text in a file, and reference them in the email later.



The notation looks like this:

```html
{template:header.txt}

Hello, just a test email


{template:footer.txt}
```


In the above example, we've used two **template parts references**, one for the header and one for the footer.

In order to use **template parts references**, you must first register the directory that contains your template parts.


This is done via our service's **registerTemplatePartsDirectory** method.

So for instance, in my app I create the following structure:

```txt
- $app/
----- templates/
--------- app/
------------- mailer_template_parts/
------------------ footer.txt
------------------ header.txt
```

Then I register the directory using the **template** alias:

```
$light_mailer_service->registerTemplatePartsDirectory( 'template', "$app/templates/app/mailer_template_parts" );
```

Now I can use the **template parts** notation as explained above.


The template parts references are replaced before the variables are resolved.

Therefore, you can use variables in your **template parts**.

However, you cannot call template parts from your template parts.





















Files
----------
2020-06-29


**Light_Mailer** let you work with two types of files:

- attached files  
- embed files  


Attached files are attached to the email.
Embed files are images displayed inside the email body.


To add an attached file to your email, you can use the **attachedFiles** option of the **send** method (for more details, see the **send** method documentation).


To add an embedded file in your email, you can use the **embeddedFiles** option of the **send** method.

The basic idea is that you define an arbitrary key for each embedded file, and you use that key in the template to reference the file "url".

For instance, you can call the send method like this:


```php
$container->get("mailer")->send("test1", "paul@gmail.com", [
    "embeddedFiles" => [
        'home_ref' => "/path/to/home.png",
    ],
]);

```


And in your template, you can do this:

```html
Hi paul, this is my new home: <img src="{home_ref}">.

As you can see the pool is still a work in progress, blabla...

``` 


Note: you can also use the **home_ref** with an href attribute.
See more info in the [swift mailer documentation](https://swiftmailer.symfony.com/docs/messages.html#embedding-inline-media-files).

Note2: some clients do not support embedded files, in which case those may appear as attachments.


Note3: in theory it will work for any displayable (or playable) media type, such as video.















