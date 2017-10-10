<?php
use Kamille\Architecture\Request\Web\HttpRequestInterface;

/**
 * id => [
 *      uri,
 *      urlParams constraints,
 *      http requirements
 *      controller match (see WebRouterInterface for more details)
 * ]
 */
$routes["Core_myRouteId1"] = ["/mystatic/uri", null, null, "?Controller:method"];

$routes["Core_myRouteId2"] = ["/mystatic2/uri", null, null, ["?Controller:method", ["urlParam1" => "blabla"]]];
$routes["Core_myRouteId3"] = ["/mystatic3/uri", [
    // ints
    'dynamic' => ">6",
    'dynamic2' => ">=6",
    'dynamic3' => "<6",
    'dynamic4' => "<=6",
    'dynamic5' => "6", // =
    'dynamic6' => ">7<10",
    'dynamic6b' => ">=7<10",
    'dynamic6c' => ">=7<=10",
    'dynamic6d' => ">7<=10",
    'dynamic9' => ["78", "45"], // alternatives
    // strings
    'dynamic7' => "kabo",
    'dynamic8' => ["kano", "kabo"], // alternatives


], null, "?Controller:method"];
$routes["Core_myRouteId4"] = ["/my/{dynamic}/uri", ['dynamic' => ["64", "65", "66"]], [
    'https' => true,
    'inGet' => ["disconnect", "pou"],
    'inPost' => ["disconnect", "pou"],
    'getValues' => ["ee" => "45", "pou" => "pl"],
    'postValues' => ["ee" => "45", "pou" => "pl"],
], "?Controller:method"];
$routes["Core_myRouteId5"] = ["/my/{dynamic}/uri", null, function (HttpRequestInterface $request) {
    return true; // true if ok, false will make the match fails
}, "?Controller:method"];


// note the null uri, which means the uri matches (but maybe the other criterion will fail)
$routes["Core_myRouteId6"] = [null, null, function (HttpRequestInterface $request) {
    return true; // true if ok, false will make the match fails
}, "?Controller:method"];
