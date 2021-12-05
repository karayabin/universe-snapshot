Light_PaymentMethods_Stripe, conception notes
================
2021-08-12 -> 2021-08-17


Service options
-----
2021-08-17


- env: string (live|test), defines which stripe environment we are using
- keys: 
  - live:
    - public: string, the api public key for the **live** environment
    - secret: string, the api secret key for the **live** environment
  - test:
    - public: string, the api public key for the **test** environment
    - secret: string, the api secret key for the **test** environment
