#!/usr/bin/env php
<?php


use Ling\CliTools\Helper\VirginiaMessageHelper as H;
use Ling\CliTools\Output\Output;


require_once "/myphp/universe/bigbang.php"; // activate universe


$out = new Output();
H::info("This is a demo of virginia message helper." . PHP_EOL, $out);
H::info("Starting <bold>Make some coffee</bold> command:" . PHP_EOL, $out);
H::info("Gathering information from the web servers...", $out, 1);
$out->write('<success>ok</success>' . PHP_EOL);
H::discover("New type of coffee found: <bold>Mounty cream</bold>." . PHP_EOL, $out, 1);
H::warning("No definition found for coffee type <bold>Mounty cream</bold>." . PHP_EOL, $out, 2);
H::info("Will use default coffee: <bold>Cappuccino</bold>." . PHP_EOL, $out, 2);
H::command("coffee_maker make with-sugars=2 type=cappuccino" . PHP_EOL, $out, 1);
H::success("Congrats! Cappuccino coffee is ready at slot 9785." . PHP_EOL, $out);
H::error("Oh wait! no, somebody spat in the coffee, please abort." . PHP_EOL, $out, 1);
H::error("Oh wait! no, somebody spat in the coffee, please abort." . PHP_EOL, $out, 1);
H::error("Oh wait! no, somebody spat in the coffee, please abort." . PHP_EOL, $out, 1);
H::info(H::s(2) . "I'm just kidding." . PHP_EOL, $out);
H::info(H::s(2) . "By the way this is an indented line using the <bold>s</bold> method." . PHP_EOL, $out);
H::info(H::i(2) . "By the way this is an indented line using the <bold>i</bold> method." . PHP_EOL, $out);
H::info(H::j(2) . "By the way this is an indented line using the <bold>j</bold> method." . PHP_EOL, $out);
H::info(H::s(0) . "You" . PHP_EOL, $out);
H::info(H::s(1) . "can" . PHP_EOL, $out);
H::info(H::s(2) . "control" . PHP_EOL, $out);
H::info(H::s(3) . "the" . PHP_EOL, $out);
H::info(H::s(4) . "indent" . PHP_EOL, $out);
H::info(H::s(5) . "level" . PHP_EOL, $out);
H::info(H::s(6) . "and" . PHP_EOL, $out);
H::info(H::s(5) . "your" . PHP_EOL, $out);
H::info(H::i(4) . "indent" . PHP_EOL, $out);
H::info(H::i(3) . "style" . PHP_EOL, $out);
H::info(H::i(2) . "like" . PHP_EOL, $out);
H::info(H::i(1) . "this." . PHP_EOL, $out);
H::info(H::i(0) . "So" . PHP_EOL, $out);
H::info(H::j(1) . "basically" . PHP_EOL, $out);
H::info(H::j(2) . "<bold>VirginiaMessageHelper</bold>" . PHP_EOL, $out);
H::info(H::j(3) . "gives" . PHP_EOL, $out);
H::info(H::j(4) . "you" . PHP_EOL, $out);
H::info(H::j(3) . "<bold:red:bgLightYellow>full control</bold:red:bgLightYellow>" . PHP_EOL, $out);
H::info(H::j(2) . "over" . PHP_EOL, $out);
H::info(H::j(1) . "your" . PHP_EOL, $out);
H::info(H::j(0) . "formatting." . PHP_EOL, $out);




