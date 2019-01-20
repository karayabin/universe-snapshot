<?php


use BeeFramework\Component\Html\Crawler\BDomElement\BDomElement;
use BeeFramework\Component\Html\Crawler\Collection\Collection;

require_once 'alveolus/bee/boot/autoload.php';

//header('Content-Type: text/plain');
$file = 'doc1.html';

$query = "//*[@id='ex1']";
$q2 = ".//a";

a(Collection::fromFile($file)
        ->xpath($query, true)
        ->xpath($q2, true)
        ->xpath('./ancestor-or-self::div[@class="hop"]', true)
);


$o = Collection::fromFile($file)
    ->xpath($query, true)
//    ->xpath($q2)
//    ->xpath('./ancestor-or-self::div[@class="hop"]')
;

$o->each(function (BDomElement $el) use ($q2) {
    echo '<hr>';
    a($el->name());
    a($el->attributes());

    if ('ex1' === $el->attribute('id')) {
        a(Collection::fromContext($el)
                ->xpath($q2, true)
//                ->xpath('./ancestor-or-self::div[@class="hop"]', true)
        );
    }

});


