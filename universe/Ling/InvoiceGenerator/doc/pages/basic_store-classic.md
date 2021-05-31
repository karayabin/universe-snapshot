basicStore/classic 
=========
2021-05-07




Here is an example pdf of the **basicStore/classic** template:

[pdf example](https://github.com/lingtalfi/InvoiceGenerator/blob/master/assets/pdf/example-basic_store-classic.pdf)




Here is the php code I used to generate that pdf:

```php
<?php


use Ling\InvoiceGenerator\InvoiceGenerator;

require_once __DIR__ . "/../scripts/Ling/Light/init.container.inc.php";



$lines = [];
for ($i = 1; $i <= 47; $i++) {
    $lines[] = [
        'product_reference' => "P$i",
        'product_name' => " CC mk2 SCratch",
        'quantity' => "2",
        'unit_price' => "499,00",
    ];
}




InvoiceGenerator::generate([
    "main" => [
        "invoice_number" => "6485590",
        "purchase_date" => "2021-05-06",
        "payment_method" => "VISA",
        "company" => "Komin>talfi",
        "first_name" => "talfi",
        "last_name" => "ling",
        "address" => "8 rue oxford plazza",
        "zip_postal_code" => "73000",
        "city" => "LongCastle",
        "phone" => "04 45 54 45 54",
        "country" => "france",
        "discount_code" => "EZ778",
        "discount_label" => "-10% sur les t-shirt jaunes",
        "discount_amount" => "5.00",
    ],
    "lines" => $lines,
    "total" => [
        [
            "TOTAL",
            "330 €<br>",
        ],
    ],
    "vendor" => [
        "title" => "KominVendor.com",
        "name" => "Komin.fr",
        "address" => "6 rue du marché creux",
        "zip" => "73000",
        "city" => "LongCastle",
        "country" => "france",
        "phone" => "05 11 22 33 44",
    ],
    "options" => [
        "currency_decimal_separator" => ",",
        "footer" => "Komino> -
                6 rue du marché creux 73000 LongCastle<br>
                Tél: 05 11 22 33 44 - Email: contact@komin.fr",
        "footer_left_margin_percent" => 35,
    ]
], "basicStore/classic", "/tmp/test.pdf", $html, [
    "htmlOnly" => false,
]);


echo $html;
```


