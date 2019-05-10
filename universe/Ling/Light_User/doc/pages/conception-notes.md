Conception notes
===========
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

