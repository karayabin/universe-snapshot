Light_PaymentMethods, conception notes
================
2021-08-12 -> 2021-08-13



A service to provide **payment methods** for an e-commerce app.



Context
--------
2021-08-12 -> 2021-08-13


This planet was designed to help create an e-commerce app in php.

In particular, during the checkout process, the e-commerce app provides to the customer a set of **payment methods** to choose from.

For instance, the customer can choose to pay with paypal, or stripe, etc...




Payment method handlers
------
2021-08-12 -> 2021-08-13


I've identified a few areas where a **payment method** interacts with the app, and so the goal of this planet is to ensure that 
any **payment method provider** that register to us can handle the interactions for those areas.


We introduce the concept of **payment method handler** (or handler for short in this document).

A **handler** handles the interactions in the following areas:

- on the gui side, during the checkout process, the list item representing the **payment method**, that the user can select, called **payment method list item**.
- js side, when the user has chosen the payment method and clicks the "Place your order" button, a js callback can be called here. 
    This can be useful for instance if you want the "Place your order" button to open a modal with the gui of a **solution provider** that you find
    difficult to integrate otherwise (such as paypal, which doesn't allow, as of 2021, a method to invoke their checkout process programmatically, from what I understood,
    so they force you to click on their buttons: https://github.com/paypal/paypal-checkout-components/issues/1539).
    
- a php side which process the payment information and actually make the payment happen, using the **solution provider** api.


Side note: I use the term **solution provider** as the company that provides a payment solution, such as Paypal, Stripe, etc...


A **handler** implements our **LightPaymentMethodHandlerInterface** interface.

A **handler** has a unique identifier called the **payment method handler identifier**.

You can access all the handlers via our service.





Register to our service
--------
2021-08-12 -> 2021-08-13


You can add your own **payment method handler** by registering to our service.

We use an [open registration system](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/design/open-vs-close-service-registration.md#the-open-registration).

We store the registration data in:

- $app/config/open/Ling.Light_PaymentMethods/payment_methods.byml




