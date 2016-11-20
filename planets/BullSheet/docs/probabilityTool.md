ProbabilityTool
======================
2016-02-11



In the example below, out of 54 tries, the probability is that the number 5 will be chosen 50 times.


```php
$types = [
    1 => 1, // creators
    2 => 1, // actors
    3 => 1, // emotion
    4 => 1, // genre
    5 => 50, // any
];

a(ProbabilityTool::resolveWeight($types));
```