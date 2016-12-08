<?php

namespace QuickForm\ControlFactory;

use Bat\StringTool;
use QuickForm\QuickForm;
use QuickForm\QuickFormControl;
use QuickPdo\QuickPdo;

class LingControlFactory implements ControlFactoryInterface
{

    public function displayControl($name, QuickFormControl $c, QuickForm $f)
    {
        $canHandle = true;
        $type = $c->getType();
        $args = $c->getTypeArgs();

        switch ($type) {
            case 'text':
            case 'hidden':
            case 'password':
                $placeholder = null;
                $htmlArgs = [];
                if (array_key_exists(0, $args)) {
                    if (is_string($args[0])) {
                        $placeholder = $args[0];
                        $htmlArgs = (array_key_exists(1, $args)) ? $args[1] : [];
                    } elseif (is_array($args[0])) {
                        $htmlArgs = $args[0];
                    }

                }

                $pl = (null !== $placeholder) ? ' placeholder="' . htmlspecialchars($placeholder) . '"' : '';

                ?>
                <input
                        type="<?php echo $type; ?>"
                        name="<?php echo htmlspecialchars($name); ?>"
                        value="<?php echo htmlspecialchars($c->getValue()); ?>"
                    <?php echo $pl; ?>
                    <?php echo StringTool::htmlAttributes($htmlArgs); ?>
                >
                <?php
                break;
            case 'file':
                // http://www.w3schools.com/tags/att_input_accept.asp
                $htmlArgs = (array_key_exists(0, $args)) ? $args[0] : [];
                $multiple = (in_array('multiple', $htmlArgs, true)) ? '[]' : '';
                ?>
                <input
                        type="file"
                        name="<?php echo htmlspecialchars($name) . $multiple; ?>"
                    <?php echo StringTool::htmlAttributes($htmlArgs); ?>
                >
                <?php
                break;
            case 'checkbox':
                $args = $c->getTypeArgs();
                $label = $args[0];
                $value = (int)$c->getValue(); // bool
                $checked = (1 === $value) ? ' checked="checked"' : '';
                ?>

                <label class="checkbox-label">
                    <input
                            type="checkbox"
                            name="<?php echo htmlspecialchars($name); ?>"
                            value="1"
                        <?php echo $checked; ?>
                    >
                    <?php echo $label; ?>
                </label>
                <?php
                break;
            case 'checkboxList':
                $args = $c->getTypeArgs();
                $boxes = $args[0];
                $v = $c->getValue(); // array of checked values|null
                if (null === $v) {
                    $v = [];
                }
                ?>
                <?php foreach ($boxes as $value => $label):
                $checked = (in_array($value, $v)) ? ' checked="checked"' : '';
                ?>
                <label class="checkbox-label">
                    <input
                            type="checkbox"
                            name="<?php echo htmlspecialchars($name); ?>[]"
                            value="<?php echo htmlspecialchars($value); ?>"
                        <?php echo $checked; ?>
                    >
                    <?php echo $label; ?>
                </label>
            <?php endforeach; ?>
                <?php
                break;
            case 'radioList':
                $args = $c->getTypeArgs();
                $boxes = $args[0];
                $v = $c->getValue(); // string|null

                ?>
                <?php foreach ($boxes as $value => $label):
                $checked = ($v === $value) ? ' checked="checked"' : '';
                ?>
                <label class="radio-label">
                    <input
                            type="radio"
                            name="<?php echo htmlspecialchars($name); ?>"
                            value="<?php echo htmlspecialchars($value); ?>"
                        <?php echo $checked; ?>
                    >
                    <?php echo $label; ?>
                </label>
            <?php endforeach; ?>
                <?php
                break;
            case 'selectByRequest':
                $markers = [];
                $args = $c->getTypeArgs();
                $q = $args[0];
                $value = $c->getValue();
                if (array_key_exists(1, $args)) {
                    $markers = $args[1];
                }
                $items = QuickPdo::fetchAll($q, $markers, \PDO::FETCH_COLUMN | \PDO::FETCH_UNIQUE);

                ?>
                <select
                        name="<?php echo htmlspecialchars($name); ?>"
                >
                    <?php foreach ($items as $pk => $label):
                        $sel = ((int)$value === (int)$pk) ? ' selected="selected"' : '';
                        ?>
                        <option
                            <?php echo $sel; ?>value="<?php echo htmlspecialchars($pk); ?>"><?php echo $label; ?></option>
                    <?php endforeach; ?>
                </select>
                <?php
                break;
            case 'select':
            case 'selectMultiple':
                $args = $c->getTypeArgs();
                $items = $args[0];
                $value = $c->getValue();
                $htmlArgs = (array_key_exists(1, $args)) ? $args[1] : [];

                $nonScalar = '';
                if ('selectMultiple' === $type) {
                    $htmlArgs[] = 'multiple';
                }

                if (in_array('multiple', $htmlArgs, true)) {
                    $nonScalar = '[]';
                }


                ?>
                <select
                        name="<?php echo htmlspecialchars($name) . $nonScalar; ?>"
                    <?php echo StringTool::htmlAttributes($htmlArgs); ?>
                >
                    <?php foreach ($items as $k => $v):

                        if (is_array($v)):
                            ?>
                            <optgroup label="<?php echo htmlspecialchars($k); ?>">
                                <?php foreach ($v as $_k => $_v):
                                    $sel = ($value == $_k) ? ' selected="selected"' : '';
                                    ?>
                                    <option
                                        <?php echo $sel; ?>value="<?php echo htmlspecialchars($_k); ?>"><?php echo $_v; ?></option>
                                <?php endforeach; ?>
                            </optgroup>
                            <?php
                        else:


                            $sel = ($value == $k) ? ' selected="selected"' : '';
                            ?>
                            <option
                                <?php echo $sel; ?>value="<?php echo htmlspecialchars($k); ?>"><?php echo $v; ?></option>
                            <?php
                        endif;
                    endforeach; ?>
                </select>
                <?php
                break;
            case 'date3':
                $args = $c->getTypeArgs();

                if (array_key_exists(0, $args) && null !== $args[0]) {
                    $months = $args[0];
                } else {
                    $months = [
                        'january',
                        'february',
                        'march',
                        'april',
                        'may',
                        'june',
                        'july',
                        'august',
                        'september',
                        'october',
                        'november',
                        'december',
                    ];
                }
                $maxYear = (array_key_exists(1, $args)) ? $args[1] : date('Y');
                $minYear = (array_key_exists(2, $args)) ? $args[2] : 1900;
                if ($minYear > $maxYear) { // avoid infinite loop
                    $this->error("date3: max year cannot be less than min year");
                }

                $elId = 'date-3-' . $name;


                $value = $c->getValue();
                if (null !== $value) {
                    list($year, $month, $day) = explode('-', $value);
                } else {
                    $year = $month = $day = 0;
                }

                ?>
                <select class="autowidth _day" id="<?php echo $elId; ?>">
                    <?php for ($i = 1; $i <= 31; $i++):
                        $sel = ((int)$i === (int)$day) ? ' selected="selected"' : '';
                        $i = sprintf('%02s', $i);
                        ?>
                        <option <?php echo $sel; ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php endfor; ?>
                </select>
                <select class="autowidth _month">
                    <?php for ($i = 0; $i < 12; $i++):
                        $sel = ((int)($i + 1) === (int)$month) ? ' selected="selected"' : '';
                        ?>
                        <option <?php echo $sel; ?>
                                value="<?php echo sprintf('%02s', $i + 1); ?>"><?php echo $months[$i]; ?></option>
                    <?php endfor; ?>
                </select>
                <select class="autowidth _year _lastdate">
                    <?php for ($i = $maxYear; $i >= $minYear; $i--):
                        $sel = ((int)$i === (int)$year) ? ' selected="selected"' : '';
                        ?>
                        <option <?php echo $sel; ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php endfor; ?>
                </select>
                <input class="_target" type="hidden" name="<?php echo htmlspecialchars($name); ?>" value="">
                <script>
                    (function () {
                        var dayEl = document.getElementById('<?php echo $elId; ?>');
                        window.onSubmitCallbacks.push(function (c) {
                            var parent = dayEl.parentNode;
                            var day = dayEl.options[dayEl.selectedIndex].value;
                            var monthEl = parent.querySelector('._month');
                            var month = monthEl.options[monthEl.selectedIndex].value;
                            var yearEl = parent.querySelector('._year');
                            var year = yearEl.options[yearEl.selectedIndex].value;

                            var date = year + '-' + month + '-' + day;
                            var target = parent.querySelector('._target');
                            target.value = date;
                            c();
                        })
                    })();
                </script>
                <?php
                break;
            case 'date6':
                $args = $c->getTypeArgs();

                if (array_key_exists(0, $args) && null !== $args[0]) {
                    $months = $args[0];
                } else {
                    $months = [
                        'january',
                        'february',
                        'march',
                        'april',
                        'may',
                        'june',
                        'july',
                        'august',
                        'september',
                        'october',
                        'november',
                        'december',
                    ];
                }
                $maxYear = (array_key_exists(1, $args)) ? $args[1] : date('Y');
                $minYear = (array_key_exists(2, $args)) ? $args[2] : 1900;
                if ($minYear > $maxYear) { // avoid infinite loop
                    $this->error("date6: max year cannot be less than min year");
                }

                $elId = 'date-6-' . $name;


                $value = $c->getValue();
                if (null !== $value) {
                    $p = explode(' ', $value);
                    list($year, $month, $day) = explode('-', $p[0]);
                    list($hour, $minute, $second) = explode(':', $p[1]);
                } else {
                    $year = $month = $day = $hour = $minute = $second = 0;
                }

                ?>
                <select class="autowidth _day" id="<?php echo $elId; ?>">
                    <?php for ($i = 1; $i <= 31; $i++):
                        $sel = ((int)$i === (int)$day) ? ' selected="selected"' : '';
                        $i = sprintf('%02s', $i);
                        ?>
                        <option <?php echo $sel; ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php endfor; ?>
                </select>
                <select class="autowidth _month">
                    <?php for ($i = 0; $i < 12; $i++):
                        $sel = ((int)($i + 1) === (int)$month) ? ' selected="selected"' : '';
                        ?>
                        <option <?php echo $sel; ?>
                                value="<?php echo sprintf('%02s', $i + 1); ?>"><?php echo $months[$i]; ?></option>
                    <?php endfor; ?>
                </select>
                <select class="autowidth _year _lastdate">
                    <?php for ($i = $maxYear; $i >= $minYear; $i--):
                        $sel = ((int)$i === (int)$year) ? ' selected="selected"' : '';
                        ?>
                        <option <?php echo $sel; ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php endfor; ?>
                </select>

                <select class="autowidth _hour">
                    <?php for ($i = 0; $i <= 23; $i++):
                        $i = sprintf('%02s', $i);
                        $sel = ((int)$i === (int)$hour) ? ' selected="selected"' : '';
                        ?>
                        <option <?php echo $sel; ?> value="<?php echo $i; ?>"><?php echo $i; ?>h</option>
                    <?php endfor; ?>
                </select>
                <select class="autowidth _minute">
                    <?php for ($i = 0; $i <= 59; $i++):
                        $i = sprintf('%02s', $i);
                        $sel = ((int)$i === (int)$minute) ? ' selected="selected"' : '';
                        ?>
                        <option <?php echo $sel; ?> value="<?php echo $i; ?>"><?php echo $i; ?>m</option>
                    <?php endfor; ?>
                </select>
                <select class="autowidth _second">
                    <?php for ($i = 0; $i <= 59; $i++):
                        $i = sprintf('%02s', $i);
                        $sel = ((int)$i === (int)$second) ? ' selected="selected"' : '';
                        ?>
                        <option <?php echo $sel; ?> value="<?php echo $i; ?>"><?php echo $i; ?>s</option>
                    <?php endfor; ?>
                </select>

                <input class="_target" type="hidden" name="<?php echo htmlspecialchars($name); ?>" value="">
                <script>
                    (function () {
                        var dayEl = document.getElementById('<?php echo $elId; ?>');
                        window.onSubmitCallbacks.push(function (c) {
                            var parent = dayEl.parentNode;
                            var day = dayEl.options[dayEl.selectedIndex].value;
                            var monthEl = parent.querySelector('._month');
                            var month = monthEl.options[monthEl.selectedIndex].value;
                            var yearEl = parent.querySelector('._year');
                            var year = yearEl.options[yearEl.selectedIndex].value;
                            var hourEl = parent.querySelector('._hour');
                            var hour = hourEl.options[hourEl.selectedIndex].value;
                            var minuteEl = parent.querySelector('._minute');
                            var minute = minuteEl.options[minuteEl.selectedIndex].value;
                            var secondEl = parent.querySelector('._second');
                            var second = secondEl.options[secondEl.selectedIndex].value;

                            var date = year + '-' + month + '-' + day + " " + hour + ':' + minute + ':' + second;
                            var target = parent.querySelector('._target');
                            target.value = date;
                            c();
                        })
                    })();
                </script>
                <?php
                break;
            case 'message':
                ?>
                <textarea
                        name="<?php echo htmlspecialchars($name); ?>"
                ><?php echo $c->getValue(); ?></textarea>
                <?php
                break;
            default:
                $canHandle = false;
                break;
        }
        return $canHandle;
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    private function error($m)
    {
        throw new \Exception($m);
    }


}