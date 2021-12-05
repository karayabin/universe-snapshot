Light_Kit_Store, service options
================
2021-06-28


Our service provides the following options:


- captcha_keys
- not_found_route
- signup_mode




captcha_keys
-------
2021-06-28


The captcha keys given by the **google recaptcha** api (https://developers.google.com/recaptcha).

We use those keys during the signup process, to limit the number of bots signing up.


Array of **id** => item, each of which being an array with two entries:

- site: the site key
- secret: the secret key

Both the site and the secret keys are given by google (you need to create an account...). 


The **id** is an arbitrary string that you choose. In our case, we fixed it to the value: "kitstore" (i.e, don't change it).


```yaml
$kit_store_vars:
    service_options:
        captcha_keys:
            kitstore:
                site: A6LdSfycbAAAAAjvBU9kyDggldUnxsJZzIcfRAcP
                secret: V6LdSfycbAAAAIzXaKtYQcbn_dVJF_kZWF7MSAPR
            ...    
```



not_found_route
-------
2021-06-28


String. The name of the route to use when a page is not found.

The default value is:

- lks_route-404




signup_mode
-------
2021-06-28


String: direct | mail | moderator. 



Defines what happens when the user successfully signs up.

It can be one of the following:

- direct: the user can log in directly (user.active=1) 
- mail: the user needs to open his/her mail and click the confirmation token in it to activate his account (user.active=2)
- moderator: the user is registered but not active. A moderator shall come later and activate the user account (user.active=3)



The default value is mail.





