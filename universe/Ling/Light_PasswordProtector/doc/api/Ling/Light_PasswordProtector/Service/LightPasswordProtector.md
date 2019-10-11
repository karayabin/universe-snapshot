[Back to the Ling/Light_PasswordProtector api](https://github.com/lingtalfi/Light_PasswordProtector/blob/master/doc/api/Ling/Light_PasswordProtector.md)



The LightPasswordProtector class
================
2019-08-07 --> 2019-10-03






Introduction
============

The LightPasswordProtector class.


This service basically memorizes a hash algorithm and its options, so that you can use it consistently across your whole application.

It uses the php technique based on the password_hash and password_verify methods.
For more information please refer to the php documentation:

- [https://www.php.net/manual/en/function.password-hash.php](https://www.php.net/manual/en/function.password-hash.php)
- [https://www.php.net/manual/en/function.password-verify.php](https://www.php.net/manual/en/function.password-verify.php)


Note: it is recommended to store the password with 255 chars.
Note 2 : I recommend not to use the default algorithm, since this might change over time.




The available algorithms and options are the following (last update 2019-08-07):


- default
     options: the options of the concrete algorithm used.

- bcrypt
     - options:
         - cost: int=10, the algorithmic cost that should be used.

- argon2i (php7.2+)
     - options:
         - memory_cost: int=PASSWORD_ARGON2_DEFAULT_MEMORY_COST (the php constant), the maximum memory in bytes that may be used to compute the hash
         - time_cost: int=PASSWORD_ARGON2_DEFAULT_TIME_COST (the php constant), the maximum amount of time it may take to compute the hash
         - threads: int=PASSWORD_ARGON2_DEFAULT_THREADS (the php constant), the number of threads to use for computing the hash



- argon2id (php7.3+)
     - options: same as argon2i



Class synopsis
==============


class <span class="pl-k">LightPasswordProtector</span>  {

- Properties
    - protected string [$algorithmName](#property-algorithmName) ;
    - protected array [$algorithmOptions](#property-algorithmOptions) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_PasswordProtector/blob/master/doc/api/Ling/Light_PasswordProtector/Service/LightPasswordProtector/__construct.md)() : void
    - public [passwordHash](https://github.com/lingtalfi/Light_PasswordProtector/blob/master/doc/api/Ling/Light_PasswordProtector/Service/LightPasswordProtector/passwordHash.md)(string $password) : string
    - public [passwordVerify](https://github.com/lingtalfi/Light_PasswordProtector/blob/master/doc/api/Ling/Light_PasswordProtector/Service/LightPasswordProtector/passwordVerify.md)(string $password, string $hash) : bool
    - public [setAlgorithmName](https://github.com/lingtalfi/Light_PasswordProtector/blob/master/doc/api/Ling/Light_PasswordProtector/Service/LightPasswordProtector/setAlgorithmName.md)(string $algorithmName) : void
    - public [setAlgorithmOptions](https://github.com/lingtalfi/Light_PasswordProtector/blob/master/doc/api/Ling/Light_PasswordProtector/Service/LightPasswordProtector/setAlgorithmOptions.md)(array $algorithmOptions) : void

}




Properties
=============

- <span id="property-algorithmName"><b>algorithmName</b></span>

    This property holds the algorithmName for this instance.
    
    

- <span id="property-algorithmOptions"><b>algorithmOptions</b></span>

    This property holds the algorithmOptions for this instance.
    See the class description for the available options, depending on the chosen algorithm.
    
    



Methods
==============

- [LightPasswordProtector::__construct](https://github.com/lingtalfi/Light_PasswordProtector/blob/master/doc/api/Ling/Light_PasswordProtector/Service/LightPasswordProtector/__construct.md) &ndash; Builds the LightPasswordProtector instance.
- [LightPasswordProtector::passwordHash](https://github.com/lingtalfi/Light_PasswordProtector/blob/master/doc/api/Ling/Light_PasswordProtector/Service/LightPasswordProtector/passwordHash.md) &ndash; Creates a password hash and returns it.
- [LightPasswordProtector::passwordVerify](https://github.com/lingtalfi/Light_PasswordProtector/blob/master/doc/api/Ling/Light_PasswordProtector/Service/LightPasswordProtector/passwordVerify.md) &ndash; Verifies that the given password matches a hash.
- [LightPasswordProtector::setAlgorithmName](https://github.com/lingtalfi/Light_PasswordProtector/blob/master/doc/api/Ling/Light_PasswordProtector/Service/LightPasswordProtector/setAlgorithmName.md) &ndash; Sets the algorithmName.
- [LightPasswordProtector::setAlgorithmOptions](https://github.com/lingtalfi/Light_PasswordProtector/blob/master/doc/api/Ling/Light_PasswordProtector/Service/LightPasswordProtector/setAlgorithmOptions.md) &ndash; Sets the algorithmOptions.





Location
=============
Ling\Light_PasswordProtector\Service\LightPasswordProtector<br>
See the source code of [Ling\Light_PasswordProtector\Service\LightPasswordProtector](https://github.com/lingtalfi/Light_PasswordProtector/blob/master/Service/LightPasswordProtector.php)



SeeAlso
==============
Previous class: [LightPasswordProtectorException](https://github.com/lingtalfi/Light_PasswordProtector/blob/master/doc/api/Ling/Light_PasswordProtector/Exception/LightPasswordProtectorException.md)<br>
