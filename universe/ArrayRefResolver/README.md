ArrayRefResolver
===========
2019-02-05



Walks an array recursively and resolves the references.




This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import ArrayRefResolver
```

Or just download it and place it where you want otherwise.



Summary
=======

- [How to](#how-to)
- [Implementation](#implementation)






How to
======

The basic idea is to be able to inject some variables into a configuration array,
using a reference resolution mechanism.



```php



$variables = [
    "admin_email" => 'johndoe@gmail.com',
];
$conf = [
    'email' => '${admin_email}',
];



$resolver->setVariables($variables);
$resolver->resolve($conf);
az($conf);


```

Will output:

```html
array(1) {
  ["email"] => string(17) "johndoe@gmail.com"
}

```



Now you need to choose an implementation (i.e. the concrete resolver).






Implementation
==============



The following implementations are available:


- [ArrayTagResolver](https://github.com/karayabin/universe-snapshot/blob/master/universe/ArrayRefResolver/ArrayTagResolver.md)











History Log
------------------

- 1.0.0 -- 2019-02-05

    - initial commit