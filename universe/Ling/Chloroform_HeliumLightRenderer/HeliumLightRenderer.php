<?php


namespace Ling\Chloroform_HeliumLightRenderer;

use Ling\Bat\StringTool;
use Ling\Chloroform_HeliumLightRenderer\Exception\ChloroformHeliumLightRendererException;
use Ling\Chloroform_HeliumRenderer\HeliumRenderer;
use Ling\GormanJsonDecoder\GormanJsonDecoder;
use Ling\HtmlPageTools\Copilot\HtmlPageCopilot;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_AjaxHandler\Service\LightAjaxHandlerService;
use Ling\Light_CsrfSession\Service\LightCsrfSessionService;

/**
 * The HeliumLightRenderer class.
 */
class HeliumLightRenderer extends HeliumRenderer
{


    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected $container;


    /**
     * Builds the HeliumLightRenderer instance.
     * @param array $options
     */
    public function __construct(array $options = [])
    {
        parent::__construct($options);
        $this->container = null;
    }

    /**
     * Sets the container.
     *
     * @param LightServiceContainerInterface $container
     */
    public function setContainer(LightServiceContainerInterface $container)
    {
        $this->container = $container;
    }


    /**
     * @overrides
     */
    public function render(array $chloroform): string
    {
        /**
         * @var $copilot HtmlPageCopilot
         */
        $copilot = $this->container->get('html_page_copilot');
        $copilot->registerLibrary("Chloroform_HeliumRenderer", [
            "/libs/universe/Ling/Chloroform_HeliumRenderer/helium.js",
        ], [
            "/libs/universe/Ling/Chloroform_HeliumRenderer/helium.css",
        ]);
        return parent::render($chloroform);
    }


    /**
     * @overrides
     */
    public function printField(array $field)
    {

        $className = $field['className'];
        switch ($className) {
            case "Ling\Chloroform\Field\AjaxFileBoxField":
                /**
                 * Since there can be many js clients to handle the AjaxFileBox, in this class we decide to use
                 * the **type** property to decide which js client in particular we want to use.
                 */
                $type = $field['type'] ?? "fileUploader";


                if ('fileUploader' === $type) {
                    $this->printAjaxFileBoxField_FileUploader($field);
                } else {
                    throw new ChloroformHeliumLightRendererException("Not implemented yet, ajaxFileBox with type $type");
                }
                break;
            case "Ling\Light_ChloroformExtension\Field\TableListField":
                $this->printTableListField($field);
                break;
            default:
                return parent::printField($field);
                break;
        }
    }


    /**
     *
     * Prints an ajax file box field.
     *
     * See the @page(Chloroform toArray) method for more info about the field structure.
     *
     * @param array $field
     * @throws \Exception
     */
    protected function printAjaxFileBoxField_FileUploader(array $field)
    {

        /**
         * @var $copilot HtmlPageCopilot
         */
        $copilot = $this->container->get('html_page_copilot');


        $copilot->registerLibrary("Jquery", [
            '/libs/universe/Ling/Jquery/3.5.1/jquery.min.js',
        ]);

        $copilot->registerLibrary("FontAwesome", [], [
            '/libs/universe/Ling/FontAwesome/5.13/css/all.min.css',
        ]);


        $lang = $field['lang'] ?? 'eng';
        $jsLibs = [
            '/libs/universe/Ling/JFileUploader/dist/bundle.js',
            '/libs/universe/Ling/JFileUploader/dist/lang/lang-' . $lang . '.js',
        ];

        $copilot->registerLibrary("JFileUploader", $jsLibs, [
            '/libs/universe/Ling/JFileUploader/dist/bundle.css',
            '/libs/universe/Ling/JFileUploader/dist/css/cropper-1.5.6.css',
        ]);


        $copilot->registerLibrary("Select2", [
            '/libs/universe/Ling/Select2/4.0.13/select2.min.js',
        ], [
            '/libs/universe/Ling/Select2/4.0.13/select2.min.css',
        ]);


        $cssId = $this->getCssIdById($field['id']);
        $cssContainerId = StringTool::getUniqueCssId('fileuploader-');


        ?>


        <div class="field form-group">
            <?php $this->printFieldLabel($field); ?>
            <?php $this->printErrorsAndHint($field); ?>
            <div id="<?php echo $cssContainerId; ?>"></div>
        </div>

        <script>

            var options = <?php echo GormanJsonDecoder::decode($field); ?>;
            document.addEventListener("DOMContentLoaded", function (event) {
                new FileUploader({
                    target: document.getElementById("<?php echo $cssContainerId; ?>"),
                    props: {
                        options: options,
                    }
                });
            });
        </script>

        <?php


    }

    /**
     *
     * Prints a table list file box field.
     *
     * See the @page(Chloroform toArray) method and the @page(TableListField conception notes) for more info about
     * the field structure.
     *
     * @param array $field
     * @throws \Exception
     */
    protected function printTableListField(array $field)
    {

        /**
         * @var $service LightAjaxHandlerService
         */
        $service = $this->container->get("ajax_handler");
        $baseUrl = $service->getServiceUrl();
        $useAutoComplete = $field['useAutoComplete'] ?? false;


        if (false === $useAutoComplete) {
            $this->printSelectField($field);
        } else {

            $formMode = $this->_chloroform['mode'];

            $mode = $field['mode'] ?? 'default';
            $isMultiplier = ('multiplier' === $mode);
            $tableListIdentifier = $field['tableListIdentifier'];
            /**
             * @var $csrfService LightCsrfSessionService
             */
            $csrfService = $this->container->get('csrf_session');
            $csrfToken = $csrfService->getToken();

            /**
             * Here I use two input texts.
             * One of them is the regular input text, but I hide it.
             * The other one is the auto-complete control, with which the user interacts.
             * When the user selects an item, it updates the value of the hidden field.
             *
             * In terms of posted data, only the regular hidden input text value will be taken into account.
             * The auto-complete control will use a fake/irrelevant name that should be ignored.
             *
             * Also, note that this tool expects the ajax-service to return an array of rows, each
             * of which having the following structure:
             *
             * - label: the label
             * - value: the value
             *
             *
             */
            $fieldAutoComplete = [
                "label" => $field['label'],
                "id" => $field['id'] . "_autocomplete_helper_",
                "hint" => $field['hint'],
                "errorName" => $field['errorName'],
                "value" => $field['autoCompleteLabel'] ?? '',
                "htmlName" => '_autocomplete_helper_',
                "errors" => [],
                "className" => 'Ling\Chloroform\Field\StringField',
                // add an icon
                'icon' => 'fas fa-search',
                'icon' => 'far fa-list-alt',
                'icon_position' => 'pre',
            ];

            $addBindingButtonId = '';
            if ($isMultiplier && 'insert' === $formMode) {
                $addBindingButtonId = StringTool::getUniqueCssId("tm-add-binding-btn-");
                $fieldAutoComplete['button'] = '<button id="' . htmlspecialchars($addBindingButtonId) . '" class="add-binding-btn btn btn-outline-primary btn-sm"><i class="fas fa-plus"></i></button>';
                $fieldAutoComplete['button_position'] = 'post';
            }

            $field['className'] = 'Ling\Chloroform\Field\HiddenField';
//            $field['className'] = 'Ling\Chloroform\Field\StringField';
            $field['label'] = '(real field)';


            /**
             * @var $copilot HtmlPageCopilot
             */
            $copilot = $this->container->get('html_page_copilot');
            $copilot->registerLibrary("bootstrapAutocomplete", [
                '/libs/universe/Ling/JBootstrapAutocomplete/bootstrap-typeahead.js',
//                '/libs/universe/Ling/JBootstrapAutocomplete/bloodhound.js',
            ], [
                '/libs/universe/Ling/JBootstrapAutocomplete/style.css',
            ]);
            if (true === $isMultiplier) {
                $copilot->registerLibrary("tableList", [
                    '/libs/universe/Ling/Chloroform_HeliumLightRenderer/tablelist/tablelist-multiplier-helper.js',
                ], [
                    '/libs/universe/Ling/Chloroform_HeliumLightRenderer/tablelist/tablelist-multiplier.css',
                ]);

//                $copilot->registerLibrary("sortableJs", [
//                    /**
//                     * http://sortablejs.github.io/Sortable/
//                     */
//                    'https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js',
//                    'https://cdn.jsdelivr.net/npm/jquery-sortablejs@latest/jquery-sortable.js',
//                ]);
                $itemInputName = $field['htmlName'];
                if ('[]' !== substr($itemInputName, -2)) {
                    $itemInputName .= '[]';
                }
            }


            $fieldAutoComplete['errors'] = $field['errors'];
            $fieldId = $field['id'];
            $fieldAutoCompleteId = $fieldAutoComplete['id'];

            $this->printStringField($fieldAutoComplete);
            $this->printHiddenField($field);
            $tableMultiplierItemsId = StringTool::getUniqueCssId("table-multiplier-items-")

            ?>

            <!--
https://github.com/bassjobsen/Bootstrap-3-Typeahead/pull/125#issuecomment-115151206
 -->
            <style type="text/css">
                ul.typeahead {
                    height: auto;
                    max-height: 300px;
                    overflow-x: hidden;
                }

            </style>


            <ul class="list-unstyled tablelist-multiplier-items"
                id="<?php echo htmlspecialchars($tableMultiplierItemsId); ?>">
                <?php if (false === "designPrototype"): ?>
                    <?php for ($i = 1; $i <= 7; $i++): ?>

                        <li>
                            <div class="d-flex tablelist-multiplier-item">
                                <span>1. Root</span>
                                <input type="hidden" value="1"/>
                                <div class="ml-auto">
                                    <span class="drag-item-btn"><i class="fas fa-arrows-alt fa-2x"></i></span>
                                    <span class="remove-item-btn"><i class="far fa-times-circle fa-2x"></i></span>
                                </div>

                            </div>
                        </li>
                    <?php endfor; ?>
                <?php endif; ?>
            </ul>
            <script>


                window.Chloroform_HeliumLightRenderer_TableList_ErrorHandler = function (errData) {
                    console.log(errData);
                    throw new Error("An error occurred. Static call: HeliumLightRenderer->printTableListField, check the console.");
                };

                document.addEventListener("DOMContentLoaded", function (event) {

                    var $ = jQuery;

                    $(document).ready(function () {


                        var useMultiplier = <?php echo ('insert' === $formMode && true === $isMultiplier) ? 'true' : 'false'; ?>;


                        var errorFunc = function (errData) {
                            window.Chloroform_HeliumLightRenderer_TableList_ErrorHandler(errData);
                        };

                        //----------------------------------------
                        // MULTIPLIER
                        //----------------------------------------
                        if (true === useMultiplier) {
                            var tableListMultiplierHelper = new TableListMultiplierHelper({
                                itemInputName: '<?php echo $itemInputName; ?>',
                                jAddBindingBtn: $('#<?php echo $addBindingButtonId; ?>'),
                                jBindingLabelInput: $('#<?php echo $fieldAutoCompleteId; ?>'),
                                jBindingInput: $('#<?php echo $fieldId; ?>'),
                                jItemsContainer: $('#<?php echo $tableMultiplierItemsId; ?>'),
                            });
                            tableListMultiplierHelper.listen();
                        }


                        //----------------------------------------
                        // AUTOCOMPLETE
                        //----------------------------------------
                        var jField = $('#<?php echo $fieldId; ?>');
                        var cache = {};
                        var jAutocompleteControl = $("#<?php echo $fieldAutoCompleteId; ?>");

                        /**
                         * Doc links:
                         * https://github.com/bassjobsen/Bootstrap-3-Typeahead
                         * http://twitter.github.io/typeahead.js/examples/
                         * https://github.com/twitter/typeahead.js/blob/master/doc/jquery_typeahead.md
                         *
                         */
                        jAutocompleteControl.typeahead({

                            // data source
                            source: function (query, process) {
                                if (query in cache) {
                                    process(cache[query]);
                                } else {
                                    $.ajax({
                                        url: '<?php echo $baseUrl; ?>',
                                        type: 'POST',
                                        data: {
                                            handler: 'Light_ChloroformExtension',
                                            action: 'table_list.autocomplete',
                                            tableListIdentifier: '<?php echo $tableListIdentifier; ?>',
                                            csrf_token: '<?php echo $csrfToken; ?>',
                                            q: query,
                                        },
                                        dataType: 'JSON',
                                        success: function (data) {
                                            if ('success' === data.type) {
                                                cache[query] = data.rows;
                                                process(data.rows);
                                            } else {
                                                errorFunc(data);
                                            }
                                        }
                                    });
                                }
                            },

                            // how many items to show
                            items: 'all',

                            // default template
                            menu: '<ul class="typeahead dropdown-menu" role="listbox"></ul>',
                            item: '<li><a class="dropdown-item" href="#" role="option"></a></li>',
                            headerHtml: '<li class="dropdown-header"></li>',
                            headerDivider: '<li class="divider" role="separator"></li>',
                            itemContentSelector: 'a',
                            displayText: function (item) {
                                return item.label;
                            },

                            // min length to trigger the suggestion list
                            minLength: 0,

                            // number of pixels the scrollable parent container scrolled down
                            scrollHeight: 0,

                            // auto selects the first item
                            autoSelect: true,

                            // callbacks
                            afterSelect: function (item) {
                                if ($.isPlainObject(item)) {
                                    jField.val(item.value);
                                    if (true === useMultiplier) {
                                        var items = {};
                                        items[item.value] = item.label;
                                        tableListMultiplierHelper.addItems(items);
                                    }

                                }
                            },
                            afterEmptySelect: $.noop,

                            // adds an item to the end of the list
                            addItem: false,

                            // delay between lookups
                            delay: 0,

                        });


                    });
                });
            </script>
            <?php

        }
    }
}