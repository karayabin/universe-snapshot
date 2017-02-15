<?php


namespace AdminTable\View;

use AdminTable\Table\ListParameters;


/**
 *
 * This renderer provides special features for the links.
 * A feature is activated by adding a special css class on a link.
 * It's handled by the javascript code automatically displayed at the end of the table.
 *
 * The following classes and features are available:
 *
 * - confirmlink: displays a raw javascript confirm dialog before following the link
 * - postlink: posts a form when the link is clicked.
 *              The data of the form are given by special attributes provided by the link:
 *              - data-action: the name of the action executed
 *              - data-ric: the ric of the row containing the link being clicked
 *              - data-value: an extra value that the user can pass if she wants to
 *
 * - ajaxlink: sends an ajax request, possibly fetching data.
 *          The setup is a little bit more complex.
 *          The link contains the following attributes:
 *              - data-url: the url of the ajax service to call, post method is used by default
 *              - data-param: a parameter to send along with the request, the name of the param
 *                              is "param" by default, or can be chosen using the data-param-name parameter
 *              - ?data-param-name: the name of the parameter sent to the ajax service.
 *                              Note: as for now, only one parameter can be sent.
 *              - ?data-handler: the name of the callback chosen to handle a successful request.
 *                      This parameter is optional.
 *                      It's only necessary if you need to treat the data that comes back
 *                      from the requested server.
 *                      The handler has to be registered using the AdminTable.registerAjaxCallback method,
 *                      which takes two arguments: the handler name and the callback.
 *                      The AdminTable is available at the global level.
 *                      Note: the AdminTable is only available once the renderTable method is called.
 *
 * - jslink: execute a js handler.
 *                  The js handler has to be registered using the AdminTable.registerAjaxCallback method.
 *                  It's then executed when the link is clicked, and the argument passed to the callback
 *                  is the link (as a dom object).
 *
 *
 *
 *
 *
 */
class AdminTableRenderer implements TableRendererInterface
{

    public $texts = [
        'search.placeholder' => "Search in rows",
        'search.btn' => "Search",
        'nipp.label' => "Number or rows",
        'multipleActions.checkAll' => "Check all rows",
        'multipleActions.uncheckAll' => "Uncheck all rows",
        'multipleActions.select' => "For all selected rows",
        'list.noresult' => "No results for this table",
        'multipleAction.confirm' => "Are you sure you want to execute this action on all the selected rows?",
        'singleAction.confirm' => "Are you sure you want to execute this action?",
    ];

    public $urlPrefix;
    private $tableId;
    private $extraHiddenFields;
    private $onItemIteratedCallback;


    public function __construct()
    {
        $this->tableId = "datatable-" . rand(0, -10000);
        $this->extraHiddenFields = [];
    }


    public static function create()
    {
        return new self();
    }


    public function getTableId()
    {
        return $this->tableId;
    }

    public function setExtraHiddenFields(array $fields)
    {
        $this->extraHiddenFields = $fields;
        return $this;
    }

    public function setOnItemIteratedCallback(\Closure $callback)
    {
        $this->onItemIteratedCallback = $callback;
        return $this;
    }

    public function renderTable(ListParameters $p)
    {

        //--------------------------------------------
        // PRINT THE TABLE
        //--------------------------------------------
        $paginationSelectedId = "selected-link-" . rand(0, 10000);
        $tableId = $this->tableId;
        $this->tableId = $tableId;
        $i = 0;
        $items = $p->items;
        $currentPage = $p->page;
        $sortColumn = $p->sortColumn;
        $sortColumnDir = $p->sortColumnDir;
        $search = $p->search;
        $nbItemsPerPageChoice = $p->nipp;
        $nbPages = $p->nbPages;
        $extraCols = $p->extraColumns;
        $ric = $p->ric;
        $ricSeparator = $p->ricSeparator;

        ?>
        <section id="<?php echo $tableId; ?>" class="admintable">
            <?php if (count($items) > 0): ?>
                <div class="toolbar">
                    <?php if ($p->hasPageSelector): ?>
                        <form method="get" action="">
                            <?php $this->printHiddenFields('page', $p, $currentPage, $sortColumn, $sortColumnDir, $search, $nbItemsPerPageChoice); ?>
                            <select name="<?php echo $p->pageGetKey; ?>" class="page-selector">
                                <?php for ($i = 1; $i <= $nbPages; $i++):
                                    $sel = ($i === $currentPage) ? ' selected="selected"' : '';
                                    ?>
                                    <option <?php echo $sel; ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php endfor; ?>
                            </select>
                        </form>
                    <?php endif; ?>


                    <?php if ($p->hasSearch): ?>
                        <div class="search">
                            <form class="search-form" method="get" action="">
                                <?php $this->printHiddenFields('search', $p, 1, $sortColumn, $sortColumnDir, $search, $nbItemsPerPageChoice); ?>
                                <input name="<?php echo $p->searchGetKey; ?>" class="search-input" type="text"
                                       value="<?php echo htmlspecialchars($search); ?>"
                                       placeholder="<?php echo $this->texts['search.placeholder']; ?>">
                                <input class="search-submit-btn" type="submit"
                                       value="<?php echo $this->texts['search.btn']; ?>">
                            </form>
                        </div>
                    <?php endif; ?>


                    <?php if ($p->hasNippSelector): ?>
                        <div class="nblines_per_page">
                            <form method="get" action="">
                                <span><?php echo $this->texts['nipp.label']; ?></span>
                                <?php $this->printHiddenFields('nipp', $p, $currentPage, $sortColumn, $sortColumnDir, $search, $nbItemsPerPageChoice); ?>
                                <select name="<?php echo $p->nbItemsPerPageGetKey; ?>" class="nipp-selected">
                                    <?php foreach ($p->nbItemsPerPageList as $value):
                                        $sel = ((int)$value === (int)$nbItemsPerPageChoice) ? ' selected="selected"' : '';
                                        ?>
                                        <option
                                            <?php echo $sel; ?>
                                                value="<?php echo $value; ?>"><?php echo ucfirst((string)$value); ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </form>
                        </div>
                    <?php endif; ?>
                </div>


                <form method="post" action="" class="datatable-form">
                    <table class="datatable">
                        <thead>
                        <tr class="headerrow">

                            <?php if (true === $p->showCheckboxes): ?>
                                <td></td>
                            <?php endif; ?>

                            <?php

                            $labels = [];
                            if (is_array($p->columnLabels)) {
                                $labels = $p->columnLabels;
                            }

                            $item = $this->decorateItem($items[0], $extraCols);
                            foreach ($item as $k => $v):
                                $_hid = ($this->isHidden($k, $p)) ? ' style="display: none"' : "";

                                $dir = ('asc' === $sortColumnDir) ? 'desc' : 'asc';
                                $link = $this->url(null, [
                                    $p->pageGetKey => 1,
                                    $p->sortColumnGetKey => $k,
                                    $p->sortColumnDirGetKey => $dir,
                                ]);
                                $label = (array_key_exists($k, $labels)) ? $labels[$k] : $k;

                                ?>
                                <td<?php echo $_hid; ?>>
                                    <a href="<?php echo $link; ?>">
                                        <?php echo $label; ?>
                                    </a>
                                </td>
                            <?php endforeach; ?>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($items as $item):
                            $trClass = "";
                            $this->onItemIterated($item, $trClass);
                            $rowUniqueIdentifier = $this->getRowUniqueIdentifier($item, $ric, $ricSeparator);
                            ?>
                            <tr class="<?php echo $trClass . ' ';
                            echo (0 === $i++ % 2) ? 'even' : 'odd'; ?>">

                                <?php if (true === $p->showCheckboxes): ?>
                                    <td>
                                        <input class="checkbox" type="checkbox" name="ids[]"
                                               value="<?php echo htmlspecialchars($rowUniqueIdentifier); ?>">
                                    </td>
                                <?php endif; ?>


                                <?php
                                $item = $this->decorateItem($item, $extraCols);
                                foreach ($item as $k => $v):
                                    $_hid = ($this->isHidden($k, $p)) ? ' style="display: none"' : "";
                                    ?>
                                    <td<?php echo $_hid; ?>>
                                        <?php
                                        if (array_key_exists($k, $p->transformers)) {
                                            $v = call_user_func($p->transformers[$k], $v, $item, $rowUniqueIdentifier);
                                        }
                                        echo $v;
                                        ?>
                                    </td>
                                <?php endforeach; ?>


                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>


                    <?php if ($p->hasPagination): ?>
                        <div class="toolbar bottom-toolbar">
                            <?php if ($nbPages > 1): ?>
                                <ul class="pagination">
                                    <?php
                                    for ($i = 1; $i <= $nbPages; $i++):
                                        $link = $this->url(null, [
                                            $p->pageGetKey => $i,
                                        ]);

                                        $sel = '';
                                        $id = '';
                                        if ($i === $currentPage) {
                                            $sel = ' class="selected"';
                                            $id = ' id="' . $paginationSelectedId . '"';
                                        }
                                        ?>
                                        <li<?php echo $id; ?>><a <?php echo $sel; ?>
                                                    href="<?php echo $link; ?>"><?php echo $i; ?></a></li>
                                    <?php endfor; ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>


                    <?php if ($p->hasMultipleActions): ?>
                        <div class="multiple-actions">
                            <button
                                    class="checkall-btn"><?php echo $this->texts['multipleActions.checkAll']; ?></button>
                            <button
                                    class="uncheckall-btn hidden"><?php echo $this->texts['multipleActions.uncheckAll']; ?></button>
                            <select class="multiple-action-selector" name="multiple-action">
                                <option
                                        value="0"><?php echo $this->texts['multipleActions.select']; ?></option>
                                <?php foreach ($p->multipleActions as $k => $v):
                                    $confirm = (array_key_exists(2, $v) && true === $v[2]) ? ' data-confirm="true"' : '';
                                    ?>
                                    <option <?php echo $confirm; ?>
                                            value="<?php echo $k; ?>"><?php echo $v[0]; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    <?php endif; ?>

                </form>
                <div class="hidden blackhole"></div>

            <?php else: ?>
                <p>
                    <?php echo $this->texts['list.noresult']; ?>
                </p>
            <?php endif; ?>
        </section>
        <script>


            var ajaxPost = function (url, data, success) {
                var params = typeof data == 'string' ? data : Object.keys(data).map(
                        function (k) {
                            return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
                        }
                    ).join('&');

                var xhr = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP");
                xhr.open('POST', url);
                xhr.onreadystatechange = function () {
                    if (xhr.readyState > 3 && xhr.status == 200) {
                        success(xhr.responseText);
                    }
                };
                xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.send(params);
                return xhr;
            };


            var adminTableHandlers = {};
            window.AdminTable = {};
            window.AdminTable.registerAjaxCallback = function (handler, callback) {
                adminTableHandlers[handler] = callback;
            };


            var tableSection = document.getElementById('<?php echo $tableId ?>');
            var pageSelector = tableSection.querySelector('.page-selector');
            var toolbarSubmit = function () {
                this.parentNode.submit();
            };
            pageSelector && pageSelector.addEventListener('change', toolbarSubmit);


            /**
             * toolbar
             */
            var nippSelector = tableSection.querySelector('.nipp-selected');
            nippSelector && nippSelector.addEventListener('change', toolbarSubmit);


            /**
             * Pagination: scroll to the selected element
             */
            var selected = document.getElementById('<?php echo $paginationSelectedId ?>');
            if (selected) {
                document.addEventListener('DOMContentLoaded', function () {
                    selected.parentNode.scrollLeft = selected.offsetLeft - 100; // 100 is a safe margin, so that we can click the links on the left.
                });
            }

            /**
             * Check all button
             */
            var checkAllBtn = tableSection.querySelector('.checkall-btn');
            var uncheckAllBtn = tableSection.querySelector('.uncheckall-btn');
            var table = tableSection.querySelector(".datatable");

            if (table) {


                if (checkAllBtn) {

                    checkAllBtn.addEventListener('click', function (e) {
                        e.preventDefault();
                        [].forEach.call(table.querySelectorAll(".checkbox"), function (el) {
                            el.checked = true;
                        });
                        checkAllBtn.classList.add('hidden');
                        uncheckAllBtn.classList.remove('hidden');
                    });


                    uncheckAllBtn.addEventListener('click', function (e) {
                        e.preventDefault();
                        [].forEach.call(table.querySelectorAll(".checkbox"), function (el) {
                            el.checked = false;
                        });
                        checkAllBtn.classList.remove('hidden');
                        uncheckAllBtn.classList.add('hidden');
                    });
                }

                /**
                 * Multiple action
                 */
                var tableForm = tableSection.querySelector('.datatable-form');
                var multiActionSelector = tableSection.querySelector(".multiple-action-selector");
                multiActionSelector && multiActionSelector.addEventListener('change', function () {

                    var option = multiActionSelector.options[multiActionSelector.selectedIndex];
                    if (option.hasAttribute('data-confirm') && 'true' === option.getAttribute('data-confirm')) {
                        if (true === window.confirm("<?php echo $this->jsQuote($this->texts['multipleAction.confirm']); ?>")) {
                            tableForm.submit();
                        }
                    }
                    else {
                        tableForm.submit();
                    }
                });


                /**
                 * Handling datatable single actions
                 */
                var blackhole = tableSection.querySelector(".blackhole");
                table.addEventListener('click', function (e) {

                    if (e.target.classList.contains("confirmlink")) {
                        if (false === window.confirm("<?php echo $this->jsQuote($this->texts['singleAction.confirm']); ?>")) {
                            e.preventDefault();
                            return; // prevent postlink to execute (delete link for instance)
                        }
                    }


                    if (e.target.classList.contains('postlink')) {


                        var action = e.target.getAttribute('data-action');
                        var ric = e.target.getAttribute('data-ric');
                        var value = e.target.getAttribute('data-value');


                        var tmpForm = document.createElement('form');
                        tmpForm.setAttribute('method', 'post');


                        var inputAction = document.createElement('input');
                        inputAction.setAttribute('type', 'hidden');
                        inputAction.setAttribute('name', 'action');
                        inputAction.setAttribute('value', action);

                        var inputRic = document.createElement('input');
                        inputRic.setAttribute('type', 'hidden');
                        inputRic.setAttribute('name', 'ric');
                        inputRic.setAttribute('value', ric);


                        tmpForm.appendChild(inputAction);
                        tmpForm.appendChild(inputRic);


                        if (null !== value) {
                            var inputVal = document.createElement('input');
                            inputVal.setAttribute('type', 'hidden');
                            inputVal.setAttribute('name', 'value');
                            inputVal.setAttribute('value', value);
                            tmpForm.appendChild(inputVal);
                        }

                        blackhole.appendChild(tmpForm);
                        tmpForm.submit();


                        e.preventDefault();
                    }
                    else if (e.target.classList.contains('ajaxlink')) {

                        var url = e.target.getAttribute('data-url');
                        var param = e.target.getAttribute('data-param');
                        var paramName = e.target.getAttribute('data-param-name');
                        var handler = e.target.getAttribute('data-handler');

                        var callback = function () {
                        };
                        if (null !== handler && handler in adminTableHandlers) {
                            callback = adminTableHandlers[handler];
                        }


                        var data = {};
                        if (null !== param) {
                            var theParamName = "param";
                            if (null !== paramName) {
                                theParamName = paramName;
                            }
                            data[theParamName] = param;
                        }

                        ajaxPost(url, data, function (theData) {
                            callback(theData, e.target);
                        });
                        e.preventDefault();
                    }
                    else if (e.target.classList.contains('jslink')) {

                        var handler = e.target.getAttribute('data-handler');
                        var callback = function () {
                        };
                        if (null !== handler && handler in adminTableHandlers) {
                            callback = adminTableHandlers[handler];
                        }
                        callback(e.target);
                        e.preventDefault();
                    }
                });
            }
        </script>
        <?php
    }




    //------------------------------------------------------------------------------/
    //
    //------------------------------------------------------------------------------/
    protected function printHiddenFields($exclude, ListParameters $p, $page, $sortColumn, $sortColumnDir, $search, $nbItemsPerPageChoice)
    {
        ?>
        <input type="hidden" name="<?php echo $p->sortColumnGetKey; ?>"
               value="<?php echo htmlspecialchars($sortColumn); ?>">

        <input type="hidden" name="<?php echo $p->sortColumnDirGetKey; ?>"
               value="<?php echo htmlspecialchars($sortColumnDir); ?>">


        <?php
        if ('search' !== $exclude): ?>
            <input type="hidden" name="<?php echo $p->searchGetKey; ?>"
                   value="<?php echo htmlspecialchars($search); ?>">
        <?php endif;


        if ('nipp' !== $exclude): ?>
            <input type="hidden" name="<?php echo $p->nbItemsPerPageGetKey; ?>"
                   value="<?php echo $nbItemsPerPageChoice; ?>">
        <?php endif;


        if ('page' !== $exclude): ?>
            <input type="hidden" name="<?php echo $p->pageGetKey; ?>"
                   value="<?php echo $page; ?>">
        <?php endif;


        foreach ($this->extraHiddenFields as $name => $value):

            if (is_array($value)) {
                foreach ($value as $v) {
                    ?>
                    <input type="hidden" name="<?php echo htmlspecialchars($name); ?>"
                           value="<?php echo htmlspecialchars($v); ?>"><?php
                }
            } else {
                ?>
                <input type="hidden" name="<?php echo htmlspecialchars($name); ?>"
                       value="<?php echo htmlspecialchars($value); ?>"><?php
            }


        endforeach;

    }


    private function onItemIterated(array $item, &$trClass)
    {
        if (null !== $this->onItemIteratedCallback) {
            call_user_func_array($this->onItemIteratedCallback, [$item, &$trClass]);
        }
    }

    private function isHidden($col, ListParameters $p)
    {
        return (in_array($col, $p->hiddenColumns, true));
    }

    private function decorateItem($item, array $extraColumns)
    {
        foreach ($extraColumns as $id => $info) {
            list($val, $pos) = $info;
            if (null === $pos) {
                $item[$id] = $val;
            } else {
                // http://stackoverflow.com/questions/1783089/array-splice-for-associative-arrays
                $item = array_slice($item, 0, $pos, true) +
                    [$id => $val] +
                    array_slice($item, $pos, null, true);
            }
        }
        return $item;
    }

    private function getRowUniqueIdentifier(array $item, array $ric, $ricSeparator)
    {
        $s = '';
        $i = 0;
        foreach ($ric as $column) {
            if (0 !== $i) {
                $s .= $ricSeparator;
            } else {
                $i++;
            }
            $s .= $item[$column];
        }
        return $s;
    }


    private function url($url, array $params = null, $mergeParams = true, $useHttpBuildQuery = true)
    {
        if (null === $url) {
            $url = $_SERVER['REQUEST_URI'];
            $p = explode('?', $url, 2);
            $url = $p[0];
        }
        $ret = $this->urlPrefix . $url;
        if (null !== $params) {
            if (true === $mergeParams) {
                $params = array_replace($_GET, $params);
            }
            $end = '';
            if (true === $useHttpBuildQuery) {
                $end = http_build_query($params);
            } else {
                $i = 0;
                foreach ($params as $k => $v) {
                    if (0 !== $i++) {
                        $end .= '&';
                    }
                    $end .= $k . '=' . $v;
                }
            }
            $ret = $this->urlPrefix . $url . '?' . $end;
        }
        return htmlspecialchars($ret);

    }

    private function jsQuote($m)
    {
        return str_replace('"', '\"', $m);
    }

}