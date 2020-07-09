Conception notes
===========
2019-05-10 -> 2020-06-08





Conception thoughts
---------
2019-05-10


While creating the LightUserInterface interface, I was asking myself: what method should I implement:


- hasRight ( string right ): bool
- getRights (): array



In terms of practicality, the first one gives less work to the developer, because the foreach
loop is encapsulated by the user.

Whereas with the second method, to check a right, we need a third party tool with two arguments
vs one:

```txt
RightChecker::hasRight (right, User)
```

And so it's funny to me to observe that the more we trust 
the users, the less work we have to do.

But of course, that only works in the perfect world of oop where people don't lie, and to the
question "do you have the right to do that?", they will just answer genuinely.

The world would just be simpler if we were all as honest as robots, wouldn't it?






The LightWebsiteUser class, the new user concept
---------------
2020-06-08


Until now in my mind the user identifier and email were synonyms, as I thought that the user's identifier
was his/her email.

It's not the case anymore. Thinking again about binding an user account to an email, I find it limiting.

I believe the user shall be able to create multiple accounts with the same email. 

Therefore my new conception about the LightWebsiteUser is this:


- the identifier is still unique (database wise)
- an email is not unique: the user can have multiple accounts with the same email (but different identifiers)


### The login page

Here is what we suggest for applications that use our plugin.

The user shall be able to connect with either her email or her identifier.

If she connects with her identifier, then it's a no brainer (it's unique in the database).

If she connects with her email, and assuming she has multiple accounts, then your software will have to make a choice about
which one of the account to open.

I personally will be lazy and open the first account found in the database with that email (the rationale being
that an user having multiple accounts can use her identifier to log in instead of her email).

A braver person might implement a system that would provide the different accounts list to the user, and the user would then
choose from that list which account she wants to open.







