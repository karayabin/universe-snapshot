<?php


namespace Kamille\Mvc\WidgetDecorator;


use Kamille\Mvc\Widget\WidgetInterface;
use Kamille\Services\XLog;

/**
 * This decorator allows you to use a grid system to wrap your widgets.
 *
 *
 * If this can help (and I suppose it does help a lot), the model used is inspired from the grid system of bootstrap3.
 * http://getbootstrap.com/css/#grid
 *
 *
 *
 *
 * ==========================
 * THE GRID LAYOUT
 * ==========================
 *
 *
 *
 *
 * Nomenclature: row, column and nested column
 * =============================================
 *
 * A grid layout starts with a row.
 * The row can be divided into columns.
 * A row cannot contain another row (directly), it can only contain columns.
 *
 * If you want to divide a column, you need to create a row first, and then divide that row into columns.
 * So, a column cannot contain another column (directly), it can only contain rows.
 *
 * A column located inside a column (indirectly) is called a nested column.
 *
 *
 *
 *
 *
 * Getting started
 * ========================
 *
 *
 * Enabling the grid layout
 * ----------------------------
 * You first need to enable the grid layout before you can use it.
 * The grid layout is active on a per position basis.
 *
 * This means, for a given position, you either use the grid layout or you don't, but if you use it,
 * all the widgets, without exception, will be affected by that grid layout.
 *
 * To enable the grid layout, you add the "grid" key in your laws configuration, and the value is an array
 * of positions for which the grid layout should be available.
 *
 * For instance, with the following config snippet, the grid layout will be active for the "maincontent" position only.
 *
 * - ...
 * - layout: ...
 * - widgets: ...
 * - grid: [maincontent]
 * - ...
 *
 *
 *
 * The vision
 * ----------------------
 *
 * You organize the widgets in the grid layout by describing the vision you have with the fragId notation.
 * fragId stands for fragment/fraction identifier.
 *
 * So, for instance, let's say you have this vision in mind:
 *
 *
 *
 * |---------------|---------------|---------------|
 * |       w1      |      w2       |      w3       |
 * |---------------|---------------|---------------|
 * |---------------|-------------------------------|
 * |               ||-----------------------------||
 * |               ||              w5             ||
 * |      w4       ||-----------------------------||
 * |               ||--------------|--------------||
 * |               ||       w6     |       w7     ||
 * |               ||--------------|--------------||
 * |---------------|-------------------------------|
 *
 *
 * Which actually translates to the following pseudo markup (which I will probably use
 * as of now, pure lazyness):
 *
 *
 * <row>
 *      <col 1/3> w1 </col>
 *      <col 1/3> w2 </col>
 *      <col 1/3> w3 </col>
 * </row>
 * <row>
 *      <col 1/3> w4 </col>
 *      <col 2/3>
 *          <row>
 *              <col 1/1> w5 </col>
 *          </row>
 *          <row>
 *              <col 1/2> w6 </col>
 *              <col 1/2> w7 </col>
 *          </row>
 *      </col>
 * </row>
 *
 *
 *
 * To achieve such a markup, you use the fragId notation, like so:
 *
 * - w1: 1/3
 * - w2: 1/3
 * - w3: (blank, or 1/3)
 * - w4: 1/3
 * - w5: 2/3-1
 * - w6: 1/2
 * - w7: 1/2.
 *
 *
 *
 * So as you can see, each widget has its own fragId.
 * For instance, widget 1 has a fragId of 1/3, widget 2's fragId is 1/3 too, and so on...
 *
 *
 * So, to recap, by assigning each widget a fragId, you can easily create the vision you have in mind.
 *
 *
 *
 * Introduction to the notation
 * --------------------
 *
 * Once you have your vision in mind, you need to write it down as fragIds.
 *
 * There are a couple of rules useful for your understanding:
 *
 * ### A row naturally ends (or closes) when it's complete.
 *
 * So, if we write this:
 *
 * w1: 1/3
 * w2: 1/3
 * w3: 1/3
 *
 * At widget 3, the row ends naturally, because we reach the last third.
 * The markup will be the following
 *
 * <row>
 *      <col 1/3> w1 </col>
 *      <col 1/3> w2 </col>
 *      <col 1/3> w3 </col>
 * </row>
 *
 *
 * ### When a row closes, the system by default creates the new row as a sibling
 *
 * So, if we write this:
 *
 * w1: 1/3
 * w2: 1/3
 * w3: 1/3
 * w4: 1/3
 *
 * At widget 3, the row ends naturally, because we reach the last third.
 * And so per this rule, the widget 4 will be created on its own row.
 *
 * The markup will be the following
 *
 * <row>
 *      <col 1/3> w1 </col>
 *      <col 1/3> w2 </col>
 *      <col 1/3> w3 </col>
 * </row>
 * <row>
 *      <col 1/3> w4 </col>
 *      ...to be continued, this is just a theoretical example shown to illustrate a concept
 *
 *
 *
 * Doing children
 * =====================
 * So now that you've got a gist of the fragId notation, let's get our hands really dirty, and let's make children.
 *
 *
 * Here is our vision (I added some line numbers for further reference):
 *
 * 1.               <row>
 * 2.                    <col 1/3> w4 </col>
 * 3.                    <col 2/3>
 * 4.                        <row>
 * 5.                            <col 1/1> w5 </col>
 * 6.                        </row>
 * 7.                        <row>
 * 8.                            <col 1/2> w6 </col>
 * 9.                            <col 1/2> w7 </col>
 * 10.                       </row>
 * 11.                   </col>
 * 12.              </row>
 *
 * And here is the corresponding notation:
 *
 *
 * w4: 1/3
 * w5: 2/3-1
 * w6: 1/2
 * w7: 1/2.
 *
 *
 *
 * The dash
 * -----------------
 * Notice the notation for widget 5 on line 5: "2/3-1".
 * The dash is just a separator, so the notation should be read: 2/3, then 1/1  (1 is shorthand for 1/1).
 * THE DASH IS THE NOTATION FOR OPENING A NESTED COLUMN.
 *
 * Reminder: a nested column is a column inside a column.
 * So for instance, the column line 5 is a nested column, and so are the columns line 8 and 9.
 *
 * However, the column line 5 is an opening nested column, which means it contains the col-row-col pattern (line 3-4-5)
 * which indicate the opening of a nested column.
 * When that pattern happen, the col before the row is called the parent column, and the col after the row is called
 * the child column (or just column).
 *
 * The fragId of an opening nested column is composed of the fraction characteristics of both the parent column AND
 * the child column, separated by a dash.
 *
 *
 * The dot
 * --------------
 * If you open a nested column, at some point you have to close it as well.
 * To close a nested column, we use the dot notation, so that in the end, the number of dashes (opening nested columns)
 * is equal to the number of dots (closing nested columns), at least in a well balanced/valid fragId notation.
 *
 * The reason why you need to specify the dot is that as said before: by default when a row naturally ends,
 * the system creates the next row as a sibling.
 * So for instance, on line 6, the row naturally ends (because the widget 5 takes the whole space available
 * to that row).
 * And so if the next fragId you specify is 1/2 (like in the example above w6: 1/2), then a new sibling row is created (line7),
 * which holds the new 1/2 column.
 *
 * But what if you wanted widget 6 to be a sibling of widget 4 instead?
 * So, what if you wanted to do this:
 *
 * 1.               <row>
 * 2.                    <col 1/3> w4 </col>
 * 3.                    <col 2/3>
 * 4.                        <row>
 * 5.                            <col 1/1> w5 </col>
 * 6.                        </row>
 * 7.                    </col>
 * 8.               </row>
 * 9.               <row>
 * 10.                   <col 1/2> w6 </col>
 * 11.                   <col 1/2> w7 </col>
 * 12.              </row>
 *
 *
 * Then, you would use a dot, to explicitly close the nested column opened by widget 5, and the notation would be the
 * following:
 *
 * w4: 1/3
 * w5: 2/3-1.
 * w6: 1/2
 * w7: 1/2
 *
 *
 *
 *
 * So, re-read those examples as long as necessary, and when you are ready, meet the big boss of this document,
 * which make uses of multiple consecutive dots (each dot closes a nested column):
 *
 *
 *
 * <row>
 *      <col 1/3> w1 </col>
 *      <col 1/3> w2 </col>
 *      <col 1/3> w3 </col>
 * </row>
 * <row>
 *      <col 1/6> w4 </col>
 *      <col 5/6>
 *          <row>
 *              <col 1/3> w5 </col>
 *              <col 2/3>
 *                  <row>
 *                      <col 1/1> w6 </col>
 *                  </row>
 *              </col>
 *          </row>
 *      </col>
 * </row>
 *
 *
 * - w1: 1/3
 * - w2: 1/3
 * - w3: 1/3
 * - w4: 1/6
 * - w5: 5/6-1/3
 * - w6: 2/3-1..
 *
 *
 *
 *
 *
 * If you can understand (at least partially) the fragId notation, then you are ready to use it and create
 * awesome templates.
 *
 * Enjoy!
 *
 *
 *
 *
 */
class GridWidgetDecorator implements WidgetDecoratorInterface
{


    private $systemStarted;
    private $store;
    private $hasJustClosedRow;
    //
    protected $widgetConfig;


    public function __construct()
    {
        $this->systemStarted = false;
        $this->store = 0;
        $this->hasJustClosedRow = false;

    }


    public static function create()
    {
        return new static();
    }

    public function decorate(&$content, $positionName, $widgetId, $index, WidgetInterface $widget, array $config)
    {
        if (true === $this->isGridSystemActive($positionName, $config)) {

            if (false !== $fragId = $this->getFragId($widgetId, $config)) {

                $this->widgetConfig = $config['widgets'][$widgetId];

                $closeRow = false;

                list($parentSpaceUsed,
                    $parentAvailableSpace,
                    $spaceUsed,
                    $availableSpace,
                    $hasDash,
                    $nbDots) = $this->extractFragId($fragId);


                $this->store += $spaceUsed;
                if ($availableSpace <= $this->store) {
                    $closeRow = true;
                    $this->store = 0;
                }


                $sPrefix = $this->getPrefix($fragId, $parentSpaceUsed,
                    $parentAvailableSpace,
                    $spaceUsed,
                    $availableSpace,
                    $hasDash,
                    $nbDots);

                $content = $sPrefix . $this->renderContent($content, $widgetId) . $this->getSuffix($closeRow, $nbDots);
            }
        }
    }





    //--------------------------------------------
    //
    //--------------------------------------------

    protected function renderContent($content, $widgetId)
    {
        return $content;
    }

    protected function renderRowStart()
    {
        return "[row]";
    }

    protected function renderColStart($fragId, $parentSpaceUsed,
                                      $parentAvailableSpace,
                                      $spaceUsed,
                                      $availableSpace,
                                      $hasDash,
                                      $nbDots)
    {
        return "[col $fragId]";
    }

    protected function renderNestedColStart($fragId, $parentSpaceUsed,
                                            $parentAvailableSpace,
                                            $spaceUsed,
                                            $availableSpace,
                                            $hasDash,
                                            $nbDots)
    {
        $s = "[col $parentSpaceUsed/$parentAvailableSpace]";
        $s .= "[row]";
        $s .= "[col $spaceUsed/$availableSpace]";
        return $s;
    }

    protected function renderColEnd()
    {
        return "[/col]";
    }

    protected function renderRowEnd()
    {
        return "[/row]";
    }

    protected function renderNestedColEnd()
    {
        return "[col][/row]";
    }


    protected function getPrefix($fragId, $parentSpaceUsed,
                                 $parentAvailableSpace,
                                 $spaceUsed,
                                 $availableSpace,
                                 $hasDash,
                                 $nbDots)
    {
        $sPrefix = "";
        if (false === $this->systemStarted) {
//            $sPrefix .= "[row]: starter<br>";
            $sPrefix .= $this->renderRowStart();
            $this->systemStarted = true;
        }

        if (true === $this->hasJustClosedRow) {
            $this->hasJustClosedRow = false;
//            $sPrefix .= '[row]: natural start<br>';
            $sPrefix .= $this->renderRowStart();
        }


        if (true === $hasDash) {
//            $sPrefix .= "[col $parentSpaceUsed/$parentAvailableSpace]: parent col<br>";
//            $sPrefix .= "[row]: extra level<br>";
//            $sPrefix .= "[col $spaceUsed/$availableSpace]: child col";
            $sPrefix .= $this->renderNestedColStart($fragId, $parentSpaceUsed,
                $parentAvailableSpace,
                $spaceUsed,
                $availableSpace,
                $hasDash,
                $nbDots);
        } else {
//            $sPrefix .= "[col $fragId]";
            $sPrefix .= $this->renderColStart($fragId, $parentSpaceUsed,
                $parentAvailableSpace,
                $spaceUsed,
                $availableSpace,
                $hasDash,
                $nbDots);
        }
//        return $sPrefix . " - [used: $spaceUsed, max= $availableSpace]<br>";
        return $sPrefix;
    }


    protected function getSuffix($closeRow, $nbDots)
    {
        $sSuffix = "";
//        $sSuffix .= "[/col]<br>";
        $sSuffix .= $this->renderColEnd();

        if (true === $closeRow) {
//            $sSuffix .= '[/row]: natural ending<br>';
            $sSuffix .= $this->renderRowEnd();
            $this->hasJustClosedRow = true;
        }

        for ($i = 0; $i < $nbDots; $i++) {
//            $sSuffix .= '[/col]: dot ending<br>';
//            $sSuffix .= '[/row]: dot ending<br>';
            $sSuffix .= $this->renderNestedColEnd();

        }
        return $sSuffix;
    }


    protected function getFragId($widgetId, array $config)
    {
        if (
            array_key_exists("widgets", $config) &&
            array_key_exists($widgetId, $config['widgets']) &&
            array_key_exists("grid", $config['widgets'][$widgetId])
        ) {
            return $config['widgets'][$widgetId]['grid'];
        }
        return false;
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    private function extractFragId($fragId)
    {
        $parentSpaceUsed = null;
        $parentAvailableSpace = null;
        $spaceUsed = null;
        $availableSpace = null;
        $hasDash = false;
        $nbDots = 0;


        if ('.' === substr($fragId, -1)) {
            $len = strlen($fragId);
            $fragId = rtrim($fragId, '.');
            $newLen = strlen($fragId);
            $nbDots = $len - $newLen;
        }

        $p = explode('-', $fragId, 2);
        if (2 === count($p)) {
            $parent = $p[0];
            $frag = $p[1];
            if ('1' === $parent) {
                $parent = "1/1";
            }
            $p = explode('/', $parent, 2);
            $parentSpaceUsed = (int)$p[0];
            $parentAvailableSpace = (int)$p[1];
            $hasDash = true;
        } else {
            $frag = $p[0];
        }

        if ('1' === $frag) {
            $frag = "1/1";
        }
        $p = explode('/', $frag, 2);
        $spaceUsed = (int)$p[0];
        $availableSpace = (int)$p[1];


        return [
            $parentSpaceUsed,
            $parentAvailableSpace,
            $spaceUsed,
            $availableSpace,
            $hasDash,
            $nbDots,
        ];
    }


    private function isGridSystemActive($positionName, array $config)
    {
        if (array_key_exists("grid", $config)) {
            $grid = $config['grid'];
            if (!is_array($grid)) {
                $grid = [$grid];
            }
            if (in_array($positionName, $grid, true)) {
                return true;
            }
        }
        return false;
    }

}