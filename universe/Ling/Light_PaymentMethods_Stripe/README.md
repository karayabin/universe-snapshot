Light_PaymentMethods_Stripe
===========
2021-08-12



Some tools to build common php based webservices.


This is a [Light plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).

This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========

Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.Light_PaymentMethods_Stripe
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Light_PaymentMethods_Stripe
```

Or just download it and place it where you want otherwise.






Summary
===========
- [Light_PaymentMethods_Stripe api](https://github.com/lingtalfi/Light_PaymentMethods_Stripe/blob/master/doc/api/Ling/Light_PaymentMethods_Stripe.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- [Services](#services)
- Pages
    - [Conception notes](https://github.com/lingtalfi/Light_PaymentMethods_Stripe/blob/master/doc/pages/conception-notes.md)






Services
=========


Here is an example of the service configuration:

```yaml
payment_methods_stripe:
    instance: Ling\Light_PaymentMethods_Stripe\Service\LightPaymentMethodsStripeService
    methods:
        setContainer:
            container: @container()
        setOptions:
            options: ${payment_methods_stripe_vars.service_options}


payment_methods_stripe_vars:
    service_options: []





```



History Log
=============

- 0.0.1 -- 2021-08-12

    - initial commit