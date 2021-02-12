DatePickerHelper
===========
2018-06-05



Convert between jquery date picker date format and php date format.


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/DatePickerHelper
```

Or just download it and place it where you want otherwise.



How to
==========



```php
<?php

// using the a function from the universe here (https://github.com/karayabin/universe-snapshot/blob/master/bigbang.php)
a(DatePickerHelper::convertFromDatePickerToPhpDate("dd/mm/yy")); // prints d/m/Y
a(DatePickerHelper::convertFromPhpDateToDatePicker("Y-m-d")); // prints yy-mm-dd


$birthdayDate = "09/12/1944";
a(DatePickerHelper::convertFromNumericInputToMysqlDate($birthdayDate, "d/m/Y")); // 1944-12-09
```






History Log
------------------

- 1.1.2 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.1.1 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.1.0 -- 2018-06-05

    - add convertFromNumericInputToMysqlDate method

- 1.0.0 -- 2018-06-05

    - initial commit