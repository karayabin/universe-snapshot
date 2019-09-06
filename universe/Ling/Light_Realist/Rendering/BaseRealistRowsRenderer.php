<?php


namespace Ling\Light_Realist\Rendering;


use Ling\Light\ReverseRouter\LightReverseRouterInterface;
use Ling\Light\ServiceContainer\LightServiceContainerAwareInterface;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;

/**
 * The BaseRealistRowsRenderer interface.
 *
 */
class BaseRealistRowsRenderer implements RealistRowsRendererInterface, LightServiceContainerAwareInterface
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
     * This property holds the dynamicColumns for this instance.
     * It's an array of position => columnItems.
     * With columnItems being an array of columnName => label.
     *
     *
     * @var array
     */
    protected $dynamicColumns;

    /**
     * This property holds the ric for this instance.
     * See @page(the realist conception notes) for more details, the model part.
     * Also see the @page(open admin table helper implementation notes).
     *
     * @var array
     */
    protected $ric;


    /**
     * Builds the BaseDuelistRowsRenderer instance.
     */
    public function __construct()
    {
        $this->types = [];
        $this->dynamicColumns = [];
        $this->ric = [];
        $this->container = null;
    }


    /**
     * @implementation
     */
    public function setContainer(LightServiceContainerInterface $container)
    {
        $this->container = $container;
    }


    /**
     * @implementation
     */
    public function setColumnType(string $columnName, string $type, array $options = [])
    {
        $this->types[$columnName] = [$type, $options];
    }


    /**
     * @implementation
     */
    public function addDynamicColumn(string $columnName, string $label, $position = 'post')
    {
        if (false === array_key_exists($position, $this->dynamicColumns)) {
            $this->dynamicColumns[$position] = [];
        }
        $this->dynamicColumns[$position][$columnName] = $label;
    }


    /**
     * @implementation
     */
    public function render(array $rows): string
    {
        $s = '';
        $preCols = $this->dynamicColumns["pre"] ?? [];
        $postCols = $this->dynamicColumns["post"] ?? [];


        foreach ($rows as $row) {
            $s .= '<tr>';

            // dynamic pre columns
            foreach ($preCols as $col => $label) {
                $s .= '<td>';
                $type = $this->types[$col] ?? ["text", []];
                $s .= $this->renderColumnContent('', $type[0], $type[1], $row);
                $s .= '</td>';
            }

            // data columns
            foreach ($row as $col => $val) {
                $type = $this->types[$col] ?? ["text", []];
                $s .= '<td>';
                $s .= $this->renderColumnContent($val, $type[0], $type[1], $row);
                $s .= '</td>';
            }

            // dynamic post columns
            foreach ($postCols as $col => $label) {
                $s .= '<td>';
                $type = $this->types[$col] ?? ["text", []];
                $s .= $this->renderColumnContent('', $type[0], $type[1], $row);
                $s .= '</td>';
            }
            $s .= '</tr>';
        }
        return $s;
    }

    /**
     * @implementation
     */
    public function setRic(array $ric)
    {
        $this->ric = $ric;
    }




    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Returns the html content of a column which value is given.
     *
     *
     * @param $value
     * @param string $type
     * @param array $options
     * @param array $row
     * @return string
     */
    protected function renderColumnContent($value, string $type, array $options, array $row): string
    {
        switch ($type) {
            case "image":
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
            case "checkbox":
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
     * For parameters, it's a proxy to the @page(LightReverseRouterInterface) (i.e. see their doc for more details).
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
         * @var $rr LightReverseRouterInterface
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
}