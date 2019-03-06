<?php


namespace Ling\Jin\Component\PreRouting;


use Ling\Jin\Exception\BadConfiguration\JinBadMaintenancePageException;
use Ling\Jin\Http\HttpRequest;
use Ling\Jin\Http\HttpResponse;
use Ling\Jin\Registry\Access;


/**
 * @info The MaintenanceSwitch class is a {-component-} which can put your app to maintenance mode.
 *
 *
 * Instantiation
 * --------------
 * The MaintenanceSwitch should be called during the pre_routing phase (config/http_request_lifecycle.yml).
 * Like this for instance:
 *
 * ```yml
 * pre_routing:
 *     -
 *         instance: Jin\Component\PreRouting\MaintenanceSwitch
 *         callable_method: handleRequest
 * ```
 *
 *
 *
 * Configuration
 * --------------
 * The MaintenanceSwitch is configured from the config/variables/app.yml file, under the maintenance section.
 *
 * maintenance:
 *      - is_active: bool=false, whether the application is currently in maintenance (true) or not (false).
 *      - page: string="", if the app is in maintenance, then this property defines the relative path to the page to display to
 *          the user while the app is in maintenance.
 *          The page should be an html file, so that we are sure that no error will occur.
 *          The path is relative to the "pages" directory.
 *          If empty, or if the page is not found, a fallback maintenance page will be used.
 *
 *          Note: technically, if you really want to have a blank maintenance page, just create a maintenance page
 *          with nothing in it.
 *
 *
 *
 *
 *
 *
 *
 *
 */
class MaintenanceSwitch
{


    /**
     * @info Handles the given http request.
     * The configuration config/variables/app.yml -> maintenance section is read (see more in the class description)
     * If the maintenance is active and properly configured, this method will return the http response with the
     * maintenance page as body.
     * Otherwise by default, nothing is returned.
     *
     *
     *
     * @param HttpRequest $request
     * @return HttpResponse|null
     * @throws JinBadMaintenancePageException when the page is not set correctly
     */
    public function handleRequest(HttpRequest $request)
    {
        $maintenance = Access::conf()->get("app.maintenance", []);

        $isActive = $maintenance['is_active'] ?? false;

        if (true === $isActive) {

            $body = null;
            $resourceId = $maintenance['page'] ?? "";

            if (!empty($resourceId)) {
                $variables = $maintenance['vars'] ?? [];
                if (!is_array($variables)) {
                    $variables = [];
                }
                $body = Access::templateEngine()->render($resourceId, $variables);
            }

            if (null === $body) {
                throw new JinBadMaintenancePageException("Page not found: $resourceId");
            }

            return new HttpResponse($body);
        }
    }
}