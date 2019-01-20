<?php


namespace Jin\HttpRequestLifecycle\PreRouting;


use Jin\Http\HttpRequest;
use Jin\Http\HttpResponse;
use Jin\Registry\Access;


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
 *         instance: Jin\HttpRequestLifecycle\PreRouting\MaintenanceSwitch
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
     */
    public function handleRequest(HttpRequest $request)
    {
        $maintenance = Access::conf()->get("app.maintenance", []);

        $isActive = $maintenance['is_active'] ?? false;
        $page = $maintenance['page'] ?? "";

        if (true === $isActive) {

            $body = null;

            if (!empty($page)) {
                $appDir = Access::conf()->get("appDir");
                $file = $appDir . "/pages/" . $page;
                if (file_exists($file)) {
                    $body = file_get_contents($file);
                }
            }

            if (null === $body) {
                $body = $this->getDefaultMaintenancePage();
            }

            return new HttpResponse($body);
        }
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    protected function getDefaultMaintenancePage()
    {
        // https://gist.githubusercontent.com/pitch-gist/2999707/raw/8dcc32cd374a01f53cec0a10cf558b30035672d4/gistfile1.html
        ob_start();
        ?>
        <!doctype html>
        <title>Site Maintenance</title>
        <style>
            body {
                text-align: center;
                padding: 150px;
            }

            h1 {
                font-size: 50px;
            }

            body {
                font: 20px Helvetica, sans-serif;
                color: #333;
            }

            article {
                display: block;
                text-align: left;
                width: 650px;
                margin: 0 auto;
            }

            a {
                color: #dc8100;
                text-decoration: none;
            }

            a:hover {
                color: #333;
                text-decoration: none;
            }
        </style>

        <article>
            <h1>We&rsquo;ll be back soon!</h1>
            <div>
                <p>Sorry for the inconvenience but we&rsquo;re performing some maintenance at the moment. If you need to
                    you can always <a href="mailto:#">contact us</a>, otherwise we&rsquo;ll be back online shortly!</p>
                <p>&mdash; The Team</p>
            </div>
        </article>
        <?php
        return ob_get_clean();
    }
}