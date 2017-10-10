<?php


namespace Kamille\Utils\Routsy\LinkGenerator;

/**
 * This is a class to generate links for the kamille developers/users.
 *
 *
 * Usage
 * ============
 * ->getUri("Core_myRouteId5", [
 *      'dynamic' => 46,
 * ]);
 *
 * See Routsy system documentation for more information.
 *
 */
interface LinkGeneratorInterface
{
    public function getUri($routeId, array $params = []);
}