<?php

// http://www.booked.net/widgets/weather




$params = [
    'cityID' => 904, // 904=tours
    'color' => "137AE9", // background color
];


?><!-- weather widget start -->
<div id="m-booked-bl-simple-week-vertical-52041"><a href="http://www.booked.net/weather/saint-pierre-des-corps-31900"
                                                    class="booked-wzs-160-275 weather-customize"
                                                    style="background-color:#62e95b;width:160px;"
                                                    id="width1">
        <div class="booked-wzs-160-275_in">
            <div class="booked-wzs-160-275-data">
                <div class="booked-wzs-160-275-left-img wrz-01"></div>
                <div class="booked-wzs-160-275-right">
                    <div class="booked-wzs-day-deck">
                        <div class="booked-wzs-day-val">
                            <div class="booked-wzs-day-number"><span class="plus">+</span>16</div>
                            <div class="booked-wzs-day-dergee">
                                <div class="booked-wzs-day-dergee-val">&deg;</div>
                                <div class="booked-wzs-day-dergee-name">C</div>
                            </div>
                        </div>
                        <div class="booked-wzs-day">
                            <div class="booked-wzs-day-d"><span class="plus">+</span>16&deg;</div>
                            <div class="booked-wzs-day-n"><span class="plus">+</span>7&deg;</div>
                        </div>
                    </div>
                    <div class="booked-wzs-160-275-info">
                        <div class="booked-wzs-160-275-city smolest-min">Saint-Pierre-des-Corps</div>
                        <div class="booked-wzs-160-275-date">Mercredi, 29</div>
                    </div>
                </div>
            </div>
            <table cellpadding="0" cellspacing="0" class="booked-wzs-table-160">
                <tr>
                    <td class="week-day"><span class="week-day-txt">Mardi</span></td>
                    <td class="week-day-ico">
                        <div class="wrz-sml wrzs-18"></div>
                    </td>
                    <td class="week-day-val"><span class="plus">+</span>16&deg;</td>
                    <td class="week-day-val"><span class="plus">+</span>7&deg;</td>
                </tr>
                <tr>
                    <td class="week-day"><span class="week-day-txt">Jeudi</span></td>
                    <td class="week-day-ico">
                        <div class="wrz-sml wrzs-01"></div>
                    </td>
                    <td class="week-day-val"><span class="plus">+</span>22&deg;</td>
                    <td class="week-day-val"><span class="plus">+</span>7&deg;</td>
                </tr>
                <tr>
                    <td class="week-day"><span class="week-day-txt">Vendredi</span></td>
                    <td class="week-day-ico">
                        <div class="wrz-sml wrzs-18"></div>
                    </td>
                    <td class="week-day-val"><span class="plus">+</span>19&deg;</td>
                    <td class="week-day-val"><span class="plus">+</span>10&deg;</td>
                </tr>
                <tr>
                    <td class="week-day"><span class="week-day-txt">Samedi</span></td>
                    <td class="week-day-ico">
                        <div class="wrz-sml wrzs-18"></div>
                    </td>
                    <td class="week-day-val"><span class="plus">+</span>14&deg;</td>
                    <td class="week-day-val"><span class="plus">+</span>9&deg;</td>
                </tr>
                <tr>
                    <td class="week-day"><span class="week-day-txt">Dimanche</span></td>
                    <td class="week-day-ico">
                        <div class="wrz-sml wrzs-01"></div>
                    </td>
                    <td class="week-day-val"><span class="plus">+</span>18&deg;</td>
                    <td class="week-day-val"><span class="plus">+</span>8&deg;</td>
                </tr>
                <tr>
                    <td class="week-day"><span class="week-day-txt">Lundi</span></td>
                    <td class="week-day-ico">
                        <div class="wrz-sml wrzs-01"></div>
                    </td>
                    <td class="week-day-val"><span class="plus">+</span>20&deg;</td>
                    <td class="week-day-val"><span class="plus">+</span>8&deg;</td>
                </tr>
            </table>
            <div class="booked-wzs-center"><span class="booked-wzs-bottom-l">Prévisions sur 7 jours</span></div>
        </div>
    </a></div>
<script type="text/javascript"> var css_file = document.createElement("link");
    css_file.setAttribute("rel", "stylesheet");
    css_file.setAttribute("type", "text/css");
    css_file.setAttribute("href", 'https://s.bookcdn.com/css/w/booked-wzs-widget-160x275.css?v=0.0.1');
    document.getElementsByTagName("head")[0].appendChild(css_file);
    function setWidgetData(data) {
        if (typeof(data) != 'undefined' && data.results.length > 0) {
            for (var i = 0; i < data.results.length; ++i) {
                var objMainBlock = document.getElementById('m-booked-bl-simple-week-vertical-52041');
                if (objMainBlock !== null) {
                    var copyBlock = document.getElementById('m-bookew-weather-copy-' + data.results[i].widget_type);
                    objMainBlock.innerHTML = data.results[i].html_code;
                    if (copyBlock !== null) objMainBlock.appendChild(copyBlock);
                }
            }
        } else {
            alert('data=undefined||data.results is empty');
        }
    } </script>
<script type="text/javascript" charset="UTF-8"
        src="https://widgets.booked.net/weather/info?<?php echo http_build_query($params); ?>&action=get_weather_info&ver=5&type=4&scode=124&ltid=3457&domid=w209&anc_id=53098&cmetric=1&wlangID=3&wwidth=160&border_form=1&transparent=0"></script><!-- weather widget end -->