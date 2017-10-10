<?php


namespace Kamille\Architecture\Application\Web;


use Kamille\Architecture\ApplicationParameters\ApplicationParameters;
use Kamille\Architecture\Request\Web\HttpRequestInterface;
use Kamille\Architecture\RequestListener\Web\HttpRequestListenerInterface;

class WebApplication implements WebApplicationInterface
{
    private static $inst;

    /**
     * @var HttpRequestListenerInterface[]
     */
    private $listeners;

    /**
     *
     * PARAMS
     * ==========
     *
     * In this implementation, by default I load all the application parameters at once from a paramsFile.
     *
     * Now what is an application parameter?
     *
     * Usually, parameters are services parameters and they are set directly inside the services container (X).
     * However, some parameters might be shared by services.
     * When a service parameter is shared by at least two services, it is casted to an application parameter,
     * and ends here, in the params property of this class.
     *
     * So, the paramsFile is a php file, which defines a $params variable,
     * and which contains all the application parameters, which are parameters common to services.
     * The problem is: as a module developer (which provide the services),
     * how do you know in advance which parameters are going to be available
     * as an application parameters?
     *
     * Since we cannot know, this is based on common sense.
     * The parameters are the following list (decided by THIS class, so, change the class and you
     * get a totally different result...):
     *
     *
     * - app_dir: the path of the directory containing the application files.
     * - debug: bool, whether or not the application is in debug mode or not.
     *          The default should be assumed false.
     *          Debug mode is different than developing in dev mode.
     *          Dev mode basically just means local environment (database local pass for instance).
     *          But debug mode goes one step further: it can enable extra debug messages, useful
     *          for occasional debugging, or fake mail sending, or...
     * - theme: the name of the theme (if you are using a themable application)
     * - lang: the name of the current lang (if your application is multilingual), using iso 639-2 (alpha3) code
     * - request: HttpRequestInterface, the request to handle (only set when the application handle method is called)
     *
     *
     *
     * I will try to maintain this list, as I will develop/discover other services/modules.
     *
     *
     * WHERE is the paramsFile
     * -----------------------------
     * The paramsFile is set internally by this class, so that it doesn't polluate the public api.
     * If you need to change the default, override the getParams method.
     *
     * By default, the params file is located at the application level,
     * in the config/application-parameters-$env.php file,
     * where $env is the value of the environment (usually dev or prod).
     * This path is computed when the handleRequest method is called.
     *
     *
     * This class uses php parameters file, as every developer using this framework knows php, which makes it easier
     * to understand/manipulate.
     *
     *
     */
    private $params;

    private function __construct()
    {
        $this->listeners = [];
        $this->params = $this->getParams();
    }


    /**
     * Note: singleton so that we can access parameters from anywhere
     * @return static
     */
    public static function inst()
    {
        if (null === self::$inst) {
            self::$inst = new static();
        }
        return self::$inst;
    }


    /**
     * @return $this
     */
    public function addListener(HttpRequestListenerInterface $listener)
    {
        $this->listeners[] = $listener;
        return $this;
    }

    //--------------------------------------------
    // PARAMS
    //--------------------------------------------
    public function set($key, $value)
    {
        $this->params[$key] = $value;
        return $this;
    }

    public function get($key, $defaultValue = null)
    {
        if (array_key_exists($key, $this->params)) {
            return $this->params[$key];
        }
        return $defaultValue;
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    public function handleRequest(HttpRequestInterface $request)
    {
        $this->set('request', $request); // let the request be available from (almost) everywhere!
        foreach ($this->listeners as $listener) {
            $listener->listen($request); // use request.params to "stop" the treatment of the request if necessary
        }
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    protected function getParams()
    {
        return ApplicationParameters::all();
    }
}