<?php


namespace Ling\Light_Realist\Rendering;


use Ling\Light\ServiceContainer\LightServiceContainerAwareInterface;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_AjaxHandler\Service\LightAjaxHandlerService;
use Ling\Light_ControllerHub\Service\LightControllerHubService;
use Ling\Light_CsrfSession\Service\LightCsrfSessionService;
use Ling\Light_Realist\Exception\LightRealistException;
use Ling\Light_ReverseRouter\Service\LightReverseRouterService;

/**
 * The BaseRealistListItemRenderer class.
 *
 *
 */
class BaseRealistListItemRenderer implements RealistListItemRendererInterface, LightServiceContainerAwareInterface, RequestIdAwareRendererInterface
{


    /**
     * This property holds the types for this instance.
     * It's an array of columnName => [type, typeOptions]
     * @var array
     */
    protected $types;


    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected $container;

    /**
     * This property holds the dynamicProperties for this instance.
     * It's an array of position => columnNames.
     * With columnNames being an array of column names.
     *
     *
     * @var array
     */
    protected $dynamicProperties;


    /**
     * This names of the properties to display, and in the order they should be displayed.
     * @var array
     */
    protected $propertiesToDisplay;


    /**
     * This property holds the ric for this instance.
     * See @page(the realist conception notes) for more details, the model part.
     * Also see the @page(open admin table helper implementation notes).
     *
     * @var array
     */
    protected $ric;

    /**
     * This property holds the requestId for this instance.
     * @var string
     */
    protected $requestId;


    /**
     * This property holds the controllerHubRoute for this instance.
     * @var string
     */
    private $_controllerHubRoute;

    /**
     * This property holds the _ajaxHandlerServiceUrl for this instance.
     * @var string
     */
    private $_ajaxHandlerServiceUrl;

    /**
     * This property holds the _csrfSimpleToken for this instance.
     * @var string
     */
    private $_csrfSimpleToken;


    /**
     * Builds the BaseDuelistRowsRenderer instance.
     */
    public function __construct()
    {
        $this->types = [];
        $this->dynamicProperties = [];
        $this->propertiesToDisplay = [];
        $this->ric = [];
        $this->container = null;
        $this->requestId = null;
        $this->_controllerHubRoute = null;
        $this->_ajaxHandlerServiceUrl = null;
        $this->_csrfSimpleToken = null;
    }



    //--------------------------------------------
    // LightServiceContainerAwareInterface
    //--------------------------------------------
    /**
     * @implementation
     */
    public function setContainer(LightServiceContainerInterface $container)
    {
        $this->container = $container;
    }


    //--------------------------------------------
    // RequestIdAwareRendererInterface
    //--------------------------------------------
    /**
     * @implementation
     */
    public function setRequestId(string $requestId)
    {
        $this->requestId = $requestId;
    }


    //--------------------------------------------
    // RealistListItemRendererInterface
    //--------------------------------------------
    /**
     * @implementation
     */
    public function setPropertyType(string $property, string $type, array $options = [])
    {
        $this->types[$property] = [$type, $options];
    }

    /**
     * @implementation
     */
    public function setRic(array $ric)
    {
        $this->ric = $ric;
    }


    /**
     * @implementation
     */
    public function setPropertiesToDisplay(array $propertyNames)
    {
        $this->propertiesToDisplay = $propertyNames;
    }


    /**
     * @implementation
     */
    public function addDynamicProperty(string $property)
    {
        $this->dynamicProperties[] = $property;
    }


    /**
     * @implementation
     */
    public function render(array $rows): string
    {

        $s = '';


        foreach ($rows as $row) {
            $s .= '<tr>';


            foreach ($this->propertiesToDisplay as $pName) {


                //--------------------------------------------
                // regular data from the storage
                //--------------------------------------------
                if (array_key_exists($pName, $row)) {
                    $val = $row[$pName];

                    $type = $this->types[$pName] ?? ["text", []];
                    $s .= '<td>';
                    $s .= $this->renderPropertyContent((string)$val, $type[0], $type[1], $row);
                    $s .= '</td>';

                }
                //--------------------------------------------
                // dynamic
                //--------------------------------------------
                elseif (in_array($pName, $this->dynamicProperties)) {
                    $s .= '<td>';
                    $type = $this->types[$pName] ?? ["text", []];
                    $s .= $this->renderPropertyContent('', $type[0], $type[1], $row);
                    $s .= '</td>';
                } else {
                    throw new LightRealistException("ListItemRenderer: don't know how to display the property $pName.");
                }
            }

            $s .= '</tr>';
        }
        return $s;
    }





    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Returns the html content of a column which value is given.
     *
     *
     * @param string $value
     * @param string $type
     * @param array $options
     * @param array $row
     * @return string
     * @throws \Exception
     *
     */
    protected function renderPropertyContent(string $value, string $type, array $options, array $row): string
    {
        switch ($type) {
            case "Light_Realist.image":
                $sAttr = '';
                $width = $options['width'] ?? null;
                if (null !== $width) {
                    $sAttr .= ' width="' . $width . '"';
                }
                $height = $options['height'] ?? null;
                if (null !== $height) {
                    $sAttr .= ' height="' . $height . '"';
                }
                $value = '<img src="' . htmlspecialchars($value) . '" alt="image" ' . $sAttr . '  />';
                break;
            case "Light_Realist.checkbox":
                $sAttr = '';
                if (array_key_exists("name", $options)) {
                    $sAttr .= ' name="' . htmlspecialchars($options['name']) . '"';
                }
                if (array_key_exists("value", $options)) {
                    $sAttr .= ' value="' . htmlspecialchars($options['value']) . '"';
                }

                /**
                 * As recommended in the realist conception notes,
                 * I went ahead and implemented the [ric admin table helper tool](https://github.com/lingtalfi/JRicAdminTableHelper)
                 * directly (just override if necessary).
                 *
                 */
                foreach ($this->ric as $col) {
                    if (array_key_exists($col, $row)) {
                        $sAttr .= ' data-ric-' . htmlspecialchars($col) . '="' . htmlspecialchars($row[$col]) . '"';
                    }
                }

                $value = '<input class="rath-emitter oath-row-select-checkbox" type="checkbox" ' . $sAttr . ' />';
                break;
            case "Light_Realist.hub_link":
                $useRic = $options['url_params_add_ric'] ?? false;
                $extraKeys = $options['url_params_add_keys'] ?? [];
                $extraUrlParams = [];
                if (true === $useRic) {
                    $extraUrlParams = $this->extractRic($row);
                }

                foreach ($extraKeys as $k => $rowKey) {
                    if (array_key_exists($rowKey, $row)) {
                        $extraUrlParams[$k] = $row[$rowKey];
                    } else {
                        throw new LightRealistException("Undefined key $rowKey in the given row.");
                    }
                }

                $urlParams = array_merge($options['url_params'], $extraUrlParams);
                $url = $this->getUrlByRoute($this->getControllerHubRoute(), $urlParams);
                $text = $options['text'];
                if (empty($text)) {
                    $text = $value;
                }

                $icon = $options['icon'] ?? null;
                if (null !== $icon) {
                    return '<a title="' . htmlspecialchars($text) . '" href="' . htmlspecialchars($url) . '"><i class="' . htmlspecialchars($icon) . '"></i></a>';
                } else {
                    return '<a href="' . htmlspecialchars($url) . '">' . $text . '</a>';
                }

                break;
            case "Light_Realist.mixer":
                $separator = $options['separator'] ?? ' ';
                $items = $options['items'] ?? [];
                $s = '';
                $c = 0;
                foreach ($items as $item) {
                    if (0 !== $c) {
                        $s .= $separator;
                    }
                    $s .= $this->renderPropertyContent($value, $item['type'], $item, $row);
                    $c++;
                }
                return $s;
                break;
            default:
                break;
        }
        return $value;
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Returns the url corresponding to the given route, using the reverse_router service.
     *
     * For parameters, it's a proxy to the @page(LightReverseRouterService) (i.e. see their doc for more details).
     *
     *
     * @param string $route
     * @param array $urlParameters
     * @param bool|null=null $useAbsolute
     * @return string
     * @throws \Exception
     */
    protected function getUrlByRoute(string $route, array $urlParameters = [], bool $useAbsolute = null): string
    {
        /**
         * @var $rr LightReverseRouterService
         */
        $rr = $this->container->get("reverse_router");
        return $rr->getUrl($route, $urlParameters, $useAbsolute);
    }


    /**
     * Returns an array of ricColumn => value
     *
     * @param array $row
     * @return array
     */
    protected function extractRic(array $row): array
    {
        $ret = [];
        foreach ($this->ric as $col) {
            if (array_key_exists($col, $row)) {
                $ret[$col] = $row[$col];
            }
            // else let the dev figure it out (since it's rendering, I don't want to crash the design)
        }
        return $ret;
    }

    /**
     * Returns the name of the route to the @page(controller hub service).
     *
     * @return string
     * @throws \Exception
     */
    protected function getControllerHubRoute(): string
    {
        if (null === $this->_controllerHubRoute) {
            /**
             * @var $hubs LightControllerHubService
             */
            $hubs = $this->container->get("controller_hub");
            $this->_controllerHubRoute = $hubs->getRouteName();
        }
        return $this->_controllerHubRoute;
    }


    /**
     * Returns the url of the @page(ajax handler service).
     *
     * @return string
     * @throws \Exception
     */
    protected function getAjaxHandlerServiceUrl(): string
    {
        if (null === $this->_ajaxHandlerServiceUrl) {
            /**
             * @var $ahs LightAjaxHandlerService
             */
            $ahs = $this->container->get("ajax_handler");
            $this->_ajaxHandlerServiceUrl = $ahs->getServiceUrl();
        }
        return $this->_ajaxHandlerServiceUrl;
    }


    /**
     * Returns the csrf simple token value.
     * See the @page(Light_CsrfSession plugin) for more info.
     * @return string
     * @throws \Exception
     */
    protected function getCsrfSimpleTokenValue(): string
    {
        if (null !== $this->_csrfSimpleToken) {
            return $this->_csrfSimpleToken;
        }
        /**
         * @var $c LightCsrfSessionService
         */
        $c = $this->container->get("csrf_session");
        $this->_csrfSimpleToken = $c->getToken();
        return $this->_csrfSimpleToken;
    }
}