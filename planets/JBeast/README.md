JBeast
=================
2016-05-13



JBeast is a javascript unit testing framework to for the [beauty'n'beast pattern](https://github.com/lingtalfi/Dreamer/blob/master/UnitTesting/BeautyNBeast/pattern.beautyNBeast.eng.md).





How does it work?
--------------------

You have the following methods:


```php
assert ( bool condition, string falseMessage="" )
        // evaluate the condition and store the result in a stack
print ()
        // when all your tests are completed, use this method to display the [**test results string**](https://github.com/lingtalfi/Dreamer/blob/master/UnitTesting/BeautyNBeast/pattern.beautyNBeast.eng.md#bnb-protocol).
        // If you have async tests, just call this method when you're ready.
```





