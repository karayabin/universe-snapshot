<?php


namespace EchartsWrapper;

use Bat\StringTool;


/**
 * A wrapper for the awesome echarts.js library.
 *
 * https://ecomfe.github.io/echarts-examples/public/index.html
 *
 * You will need to include the js file by your own.
 * <script src="/libs/echarts/echarts.min.js"></script>
 *
 */
class EchartsWrapper
{
    public static $params = [
        'symbolSize' => 6,
    ];


    /**
     * Note: you need the world.js extension in order for this method to work.
     * // view-source:https://ecomfe.github.io/echarts-examples/public/vendors/echarts/map/js/world.js
     */
    public static function displayCountryMap(array $options = [])
    {

        static::init();
        $title = $options['title'] ?? "My title";

        /**
         * Horizontal align of the title
         * Values are:
         *      - left (default)
         *      - center
         *      - right
         */
        $titleAlign = $options['titleAlign'] ?? "left";
        $dataColors = $options['dataColors'] ?? [];
        /**
         * Default label color is same as fan color
         */
        $labelColor = $options['labelColor'] ?? null;
        $title = self::dquote($title);

        /**
         * array of label => value (a number, the percentage will be computed automatically)
         */
        $data = $options['data'] ?? [];
        $dataRows = [];
        foreach ($data as $label => $value) {
            $item = [
                "value" => $value,
                "name" => $label,
            ];
            if (array_key_exists($label, $dataColors)) {
                $item["itemStyle"] = [
                    'color' => $dataColors[$label],
                ];
            }
            $dataRows[] = $item;
        }


        $cssId = self::generateTag($options);


        ?>

        <script type="text/javascript">


            <?php static::jsTop(); ?>

            var myChart = echarts.init(document.getElementById('<?php echo $cssId; ?>'));

            var option = {
                title: {
                    text: "<?php echo $title; ?>",
                    subtext: '',
                    x: '<?php echo $titleAlign; ?>'
                },
                tooltip: {
                    trigger: 'item',
                    // formatter: "{a} <br/>{b} : {c} ({d}%)", // a is the series name
                    formatter: function (params) {
                        if (params.value) {
                            return params.name + ' : ' + params.value;
                        }
                        return "";
                    }
                },
                visualMap: {
                    min: 0,
                    max: 1000000,
                    text: ['High', 'Low'],
                    realtime: false,
                    calculable: true,
                    inRange: {
                        color: ['lightskyblue', 'yellow', 'orangered']
                    }
                },
                series: [
                    {
                        name: 'World Population (2010)',
                        type: 'map',
                        mapType: 'world',
                        roam: true,
                        aspectScale: 1,
                        itemStyle: {
                            emphasis: {label: {show: true}}
                        },
                        data:<?php echo json_encode($dataRows); ?>
                    }
                ]
            };

            <?php if(null !== $labelColor): ?>
            option['label'] = {
                color: "<?php echo $labelColor; ?>"
            };
            <?php endif; ?>


            myChart.setOption(option);

            <?php static::jsBottom(); ?>
        </script>
        <?php
    }


    public static function displayPie(array $options = [])
    {

        static::init();
        $title = $options['title'] ?? "My title";

        /**
         * Horizontal align of the title
         * Values are:
         *      - left (default)
         *      - center
         *      - right
         */
        $titleAlign = $options['titleAlign'] ?? "left";
        $radius = $options['radius'] ?? "65";
        $piePositionLeft = $options['piePositionLeft'] ?? "50"; // in percent
        $piePositionTop = $options['piePositionTop'] ?? "60";
        $dataColors = $options['dataColors'] ?? [];
        /**
         * Default label color is same as fan color
         */
        $labelColor = $options['labelColor'] ?? null;
        $title = self::dquote($title);

        /**
         * array of label => value (a number, the percentage will be computed automatically)
         */
        $data = $options['data'] ?? [];
        $dataLabels = array_keys($data);
        $dataRows = [];
        foreach ($data as $label => $value) {
            $item = [
                "value" => $value,
                "name" => $label,
            ];
            if (array_key_exists($label, $dataColors)) {
                $item["itemStyle"] = [
                    'color' => $dataColors[$label],
                ];
            }
            $dataRows[] = $item;
        }


        $cssId = self::generateTag($options);


        $legendOptions = array_replace([
            "orient" => "vertical",
            "right" => "0",
            "data" => $dataLabels,
        ], $options['legend'] ?? []);


        ?>

        <script type="text/javascript">


            <?php static::jsTop(); ?>

            var myChart = echarts.init(document.getElementById('<?php echo $cssId; ?>'));

            var option = {
                title: {
                    text: "<?php echo $title; ?>",
                    subtext: '',
                    x: '<?php echo $titleAlign; ?>'
                },
                tooltip: {
                    trigger: 'item',
                    // formatter: "{a} <br/>{b} : {c} ({d}%)", // a is the series name
                    formatter: "{b} : {c} ({d}%)",
                },
                legend: <?php echo json_encode($legendOptions); ?>,
                series: [
                    {
                        // name: 'coucou',
                        type: 'pie',
                        radius: '<?php echo $radius; ?>%',
                        center: ['<?php echo $piePositionLeft; ?>%', '<?php echo $piePositionTop; ?>%'],
                        data: <?php echo json_encode($dataRows); ?>,
                        itemStyle: {
                            emphasis: {
                                shadowBlur: 10,
                                shadowOffsetX: 0,
                                shadowColor: 'rgba(0, 0, 0, 0.5)'
                            }
                        },
                        labelLine: {
                            lineStyle: 'black'
                        }
                    }
                ]
            };

            <?php if(null !== $labelColor): ?>
            option['label'] = {
                color: "<?php echo $labelColor; ?>"
            };
            <?php endif; ?>


            myChart.setOption(option);

            <?php static::jsBottom(); ?>
        </script>
        <?php
    }

    public static function displayBasicLineChart(array $options = [])
    {

        static::init();

        //--------------------------------------------
        // USER OPTIONS
        //--------------------------------------------
        $title = $options['title'] ?? 'My title';
        // https://ecomfe.github.io/echarts-doc/public/en/option.html#title.textStyle
        $textStyle = $options['textStyle'] ?? []; //
        $symbolSize = self::getParam("symbolSize", $options);
        /**
         * array of label => serie
         *  - serie: an array of xValue => yValue (often, date => value)
         */
        $series = $options['series'] ?? [];
        $tooltipFormatter = $options['toolTipFormatter'] ?? <<<EEE
<span style="color: #c2c2c2; font-size: 0.8em;">{key}</span><br>{value}
EEE;


        //--------------------------------------------
        // SCRIPT
        //--------------------------------------------
        $cssId = self::generateTag($options);
        ?>
        <script type="text/javascript">


            <?php static::jsTop(); ?>

            var tooltipFormatter = "<?php echo self::dquote($tooltipFormatter); ?>";


            var myChart = echarts.init(document.getElementById('<?php echo $cssId; ?>'));
            var symbolSize = <?php echo $symbolSize; ?>;

            var series = <?php echo json_encode($series); ?>;
            var theSeries = [];
            var theLabels = [];
            for (var label in series) {
                theSeries.push({
                    name: label,
                    type: 'line',
                    showAllSymbol: true,
                    symbolSize: function (value) {
                        return symbolSize;
                    },
                    data: series[label]
                });
                theLabels.push(label);
            }

            var option = {
                title: {
                    text: "<?php echo self::dquote($title); ?>",
                    subtext: '',
                    textStyle: <?php echo json_encode($textStyle, \JSON_FORCE_OBJECT); ?>
                },
                //     start : 70
                legend: {
                    data: theLabels,
                    type: "scroll",
                    right: 0,
                    orient: "vertical"
                },
                // toolbox: {
                //     show : true,
                //     feature : {
                //         mark : {show: true},
                //         dataView : {show: true, readOnly: false},
                //         restore : {show: true},
                //         saveAsImage : {show: true}
                //     }
                // },
                // dataZoom: {
                //     show: true,
                tooltip: {
                    trigger: 'item',
                    formatter: function (params) {
                        var value = params.value;
                        var key = value[0];
                        var value = value[1];
                        return tooltipFormatter.replace('{key}', key).replace('{value}', value);
                    }
                },
                // },
                dataZoom: [{
                    type: 'inside',
                    throttle: 50
                }],
                // grid: {
                //     y2: 80
                // },
                xAxis: [
                    {
                        type: 'time',
                        splitNumber: 10
                    }
                ],
                yAxis: [
                    {
                        type: 'value'
                    }
                ],
                series: theSeries
            };

            myChart.setOption(option);

            <?php static::jsBottom(); ?>
        </script>
        <?php
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Use these to wrap your js code into some special functions, such as a dom.load event, or jquery.ready, ...
     */
    protected static function jsTop()
    {
    }

    protected static function jsBottom()
    {
    }

    /**
     * Called by any printer...
     */
    protected static function init() // override me
    {

    }

    //--------------------------------------------
    //
    //--------------------------------------------
    private static function dquote(string $text)
    {
        return str_replace('"', '\"', $text);
    }

    private static function generateTag(array $options)
    {
        $cssId = StringTool::getUniqueCssId('echarts-');
        $width = $options['width'] ?? '800';
        $height = $options['height'] ?? '300';
        $sStyle = '';
        if ($width) {
            $sStyle .= 'width: ' . $width . 'px;';
        }
        if ($height) {
            $sStyle .= 'height: ' . $height . 'px;';
        }
        ?>
        <!-- prepare a DOM container with width and height -->
        <div id="<?php echo $cssId; ?>" style="<?php echo $sStyle; ?>"></div>
        <?php
        return $cssId;
    }

    private static function getParam(string $paramName, array $options)
    {
        return $options[$paramName] ?? self::$params[$paramName];
    }
}