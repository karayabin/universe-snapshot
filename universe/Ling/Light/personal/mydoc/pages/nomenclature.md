Nomenclature
=============
2020-08-21 -> 2021-03-08



Summary
-----------

- [Ajax nugget](#ajax-nugget)
- [Eco structure](#eco-structure)
- [Nugget](#nugget)
- [Provider service, subscriber service](#provider-service-subscriber-service)



Ajax nugget
----------
2020-08-21

An **ajax nugget** is the [nugget](#nugget) used in a communication where a [subscriber service](#provider-service-subscriber-service) wants to execute a method of the provider via ajax.
In order to execute that method, an extra bit of configuration is required, and so the idea is that the subscriber passes an extra identifier parameter to the provider, which the provider transforms into a nugget.

The main idea behind this is security. By passing an identifier instead of directly passing configuration parameters, we limit the actions of a malicious user who might try to use the service improperly. 


Often, the provider service uses the [ajax handler](https://github.com/lingtalfi/Light_AjaxHandler) system, in combination with the [Light_Nugget](https://github.com/lingtalfi/Light_Nugget) plugin to access the nugget.




Related: [nugget](#nugget).



Eco-structure
----------
2021-03-08


An **eco-structure** is a structure built collectively by third party plugins.


 


Nugget
----------
2020-08-21 -> 2020-11-10


A **nugget**, in the light lingo, often refers to a bit of service configuration.

By extension, it refers to a bit of configuration in general.


Usually, when a [subscriber service](#provider-service-subscriber-service) uses the service of a provider, a **nugget** is required
to have full control over the behaviour of the executed service.

In **light**, a **nugget** is often stored in the form of a [babyYaml](https://github.com/lingtalfi/BabyYaml) file.

 
Related: [ajax nugget](#ajax-nugget).
 


Provider service, subscriber service
-----------------
2020-08-21



As the name suggests, the **provider service** is a service which provides something.

For instance, a mailer service, or a service to display html lists.

Then the subscriber services are the ones using the provider services.


Usually, the **provider (service)** requires the subscriber to register before it can use the provider services, hence the terminology provider/subscriber. 




