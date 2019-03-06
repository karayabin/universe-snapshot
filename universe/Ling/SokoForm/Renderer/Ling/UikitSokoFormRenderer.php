<?php


namespace Ling\SokoForm\Renderer\Ling;


use Ling\Bat\StringTool;

class UikitSokoFormRenderer
{


    public function __construct()
    {
        //
    }

    public static function create()
    {
        return new static();
    }


    /**
     * The uikit css library has to been called prior to displaying this form.
     */
    public function renderForm(array $form, array $options = [])
    {


        //--------------------------------------------
        // OPTIONS
        //--------------------------------------------
        $title = $options['title'] ?? null;
        $size = $options['size'] ?? null; // small, medium, large
        $style = $options['style'] ?? "stacked"; // stacked, horizontal
        $cssClass = $options['class'] ?? null;
        $submitButtonText = $options['submitButtonText'] ?? "Submit";
        $submitButtonClass = $options['submitButtonClass'] ?? "";
        $submitButtonAttributes = $options['submitButtonAttributes'] ?? [];
        $noValidate = $options['noValidate'] ?? false;
        $headings = $options['headings'] ?? [];
        $topContent = $options['topContent'] ?? "";
        $controlIds = $options['controlIds'] ?? [];

        /**
         * Note: this is named view property (set from the view) as opposed to model property (set
         * from the model).
         */
        $controlViewProperties = $options['controlProperties'] ?? [];
        $grid = $options['grid'] ?? [];


        //--------------------------------------------
        // SCRIPT
        //--------------------------------------------
        $formProps = $form['form'];
        $controls = $form['controls'];
        $notifications = $formProps['notifications'];
        $attributes = $formProps['attributes'];
        $curClass = "";
        if ($cssClass) {
            $curClass = $attributes['class'] ?? "";
            $curClass .= " " . $cssClass;
        }
        $curClass .= " uk-form-$style";
        if (null !== $size) {
            $curClass .= " uk-form-width-$size";
        }

        if ($grid) {
            $curClass .= " uk-grid-small";
            $attributes['uk-grid'] = "";
        }

        $attributes['class'] = $curClass;


        // success, info, error, warning
        if ($notifications) {
            $this->renderNotifications($notifications);
        }
        ?>

        <?php echo $topContent; ?>

        <form
                method="<?php echo $formProps['method']; ?>"
                action="<?php echo $formProps['action']; ?>"
            <?php if (null !== $formProps['enctype']): ?>
                enctype="<?php echo $formProps['enctype']; ?>"
            <?php endif; ?>
            <?php echo StringTool::htmlAttributes($attributes) ?>

            <?php if (true === $noValidate): ?>
                novalidate
            <?php endif; ?>

        >


            <?php if (empty($grid)): ?>

            <fieldset class="uk-fieldset">

                <?php if ($title): ?>
                    <legend class="uk-legend"><?php echo $title; ?></legend>
                <?php endif; ?>
                <?php endif; ?>


                <?php

                /**
                 * HIdden fields would mess up the grid,
                 * so we extract them from the normal flow and display them at the end
                 */
                $hiddenControls = [];


                foreach ($controls as $control):
                    $controlName = $control['name'];
                    $controlClass = $control['class'];
                    $controlType = $control['type'] ?? null;
                    $controlGrid = $grid[$controlName] ?? null;


                    // merging control properties set from the view with properties set from the model
                    if (array_key_exists($controlName, $controlViewProperties)) {
                        $viewProperties = $controlViewProperties[$controlName];
                        $props = $control['properties'] ?? [];
                        $props = array_merge($props, $viewProperties);
                        $control['properties'] = $props;
                    }


                    $cssId = $controlIds[$control['name']] ?? null;
                    $cssControlClass = "";
                    if ("SokoChoiceControl" === $controlClass) {

                        $properties = $control['properties'];

                        $style = $properties['style'] ?? 'select';
                        if ("radio" === $style) {
                            $cssControlClass .= " myuk-radio-container";
                        }

                        $errors = $control['errors'];
                        $hasError = (count($errors) > 0);
                        if ($hasError) {
                            $cssControlClass .= " uk-form-danger";
                        }
                    }


                    if ("SokoInputControl" === $controlClass && "hidden" === $controlType) {
                        $hiddenControls[] = $control;
                        continue;
                    }


                    ?>


                    <?php if (array_key_exists($controlName, $headings)): ?>
                    <div class="uk-width-1-1">
                        <h3 class="uk-heading-line"><span><?php echo $headings[$controlName]; ?></span></h3>
                    </div>
                <?php endif; ?>


                    <?php if ($controlGrid): ?>
                    <div class="uk-width-<?php echo $controlGrid; ?>">
                <?php endif; ?>

                    <div class="uk-margin"
                        <?php if (null !== $cssId): ?>
                            id="<?php echo $cssId; ?>"
                        <?php endif; ?>
                    >
                        <div class="uk-form-label"><?php echo $control['label']; ?></div>
                        <div class="uk-form-controls <?php echo $cssControlClass; ?>">
                            <?php
                            switch ($controlClass) {
                                case "SokoInputControl":
                                    $this->renderSokoInputControl($control);
                                    break;
                                case "SokoChoiceControl":
                                    $this->renderSokoChoiceControl($control);
                                    break;
                                case "SokoFilePlaceholderControl":
                                    $this->renderSokoFilePlaceHolderControl($control);
                                    break;
                                case "SokoFileControl":
                                case "SokoSafeUploadControl":
                                    if ("SokoSafeUploadControl" === $controlClass) {
                                        $control['type'] = "ajax";
                                    }
                                    $this->renderInputFileSokoInputControl($control);
                                    break;
                                default:
                                    echo "Unknown control renderer method for controlClass=$controlClass";
                                    break;
                            }
                            ?>
                        </div>
                    </div>

                    <?php if ($controlGrid): ?>
                    </div>
                <?php endif; ?>
                <?php endforeach; ?>


                <!-- HIDDEN FIELDS -->
                <?php foreach ($hiddenControls as $control): ?>
                    <?php $this->renderSokoInputControl($control); ?>
                <?php endforeach; ?>


                <!-- SUBMIT BUTTON -->
                <?php if ($grid): ?>
                <div class="uk-width-1-1">
                    <?php endif; ?>
                    <div uk-margin>
                        <button class="uk-button uk-button-primary
                    <?php echo $submitButtonClass; ?>"
                            <?php if ($submitButtonAttributes): ?>
                                <?php echo StringTool::htmlAttributes($submitButtonAttributes); ?>
                            <?php endif; ?>
                        ><?php echo $submitButtonText; ?></button>
                    </div>
                    <?php if ($grid): ?>
                </div>
            <?php endif; ?>

                <?php if (empty($grid)): ?>
            </fieldset>
        <?php endif; ?>
        </form>
        <?php
    }


    protected function renderSokoInputControl(array $control)
    {
        $type = $control['type'];
        $label = $control['label'];
        $errors = $control['errors'];
        $hasError = (count($errors) > 0);

        if ("textarea" === $type) {
            $this->renderTextareaSokoInputControl($control);
        } elseif ("file" === $type) {
            $this->renderInputFileSokoInputControl($control);
        } elseif ("hidden" === $type) {
            $this->renderHiddenSokoInputControl($control);
        } else {
            $this->renderInputSokoInputControl($control);
        }
    }


    protected function renderInputSokoInputControl(array $control)
    {
        $label = $control['label'];
        $errors = $control['errors'];
        $value = $control['value'];
        $name = $control['name'];
        $properties = $control['properties'];
        $hasError = (count($errors) > 0);

        $icon = $properties['icon'] ?? null;
        $iconPosition = $properties['iconPosition'] ?? "left";
        $iconIsClickable = $properties['iconIsClickable'] ?? true;
        $iconTag = (true === $iconIsClickable) ? 'a' : 'span';

        ?>
        <?php if ($icon): ?>
        <div class="uk-inline">
        <<?php echo $iconTag; ?> class="uk-form-icon
        <?php if ("right" === $iconPosition): ?>
            uk-form-icon-flip
        <?php endif; ?>
        <?php if ($hasError):
            /**
             * I would have liked to do that, but it's not available yet,
             * https://github.com/uikit/uikit/issues/3408
             */
            ?>
            uk-form-danger
        <?php endif; ?>
        "
        <?php if ($hasError): ?>
            style="color: red"
        <?php endif; ?>
        uk-icon="icon: <?php echo $icon; ?>"></<?php echo $iconTag; ?>>
    <?php endif; ?>
        <input class="uk-input
                    <?php if ($hasError): ?>
                    uk-form-danger
                    <?php endif; ?>
" type="text"
               name="<?php echo htmlspecialchars($name); ?>"
               value="<?php echo htmlspecialchars($value); ?>"
            <?php $this->extraAttributes('renderInputSokoInputControl', $control); ?>
               placeholder="<?php echo htmlspecialchars($label); ?>"
        >

        <?php if ($icon): ?>
        </div>
    <?php endif; ?>

        <?php
    }

    protected function renderInputFileSokoInputControl(array $control)
    {
        $type = $control['type'];
        if ("ajax" === $type) {
            $this->renderInputAjaxFileSokoInputControl($control);
        } else {
            $this->renderInputStaticFileSokoInputControl($control);
        }
    }


    protected function renderInputStaticFileSokoInputControl(array $control)
    {
        $uploadFileText = $control['uploadFileText'] ?? "Upload a file";
        $value = $control['value'];
        $name = $control['name'];
        $errors = $control['errors'];
        $hasError = (count($errors) > 0);
        ?>
        <div class="uk-form-custom">
            <input type="file"
                <?php $this->extraAttributes('renderInputStaticFileSokoInputControl', $control); ?>
                   name="<?php echo htmlspecialchars($name); ?>"
                   value="<?php echo htmlspecialchars($value); ?>">

            <button class="uk-button
            <?php if (true === $hasError): ?>
            uk-button-danger
            <?php endif; ?>
" type="button" tabindex="-1"><?php echo $uploadFileText; ?>
            </button>
        </div>
        <?php
    }


    protected function renderInputAjaxFileSokoInputControl(array $control)
    {
        $properties = $control['properties'] ?? [];
        $uploadFileTextPart1 = $properties['uploadFileTextPart1'] ?? "Attach binaries by dropping them here or";
        $uploadFileTextPart2 = $properties['uploadFileTextPart2'] ?? "selecting one";
        $url = $properties['url'] ?? "";
        $cssId = $properties["cssId"] ?? StringTool::getUniqueCssId("uikit-soko-ajax-upload-");


        $value = $control['value'];
        $name = $control['name'];
        $errors = $control['errors'];
        $hasError = (count($errors) > 0);

        /**
         * @todo-ling: add hidden input holding the ajax loaded file (for form submission)
         */
        ?>
        <div
                id="<?php echo $cssId; ?>"
                class="js-upload uk-placeholder uk-text-center
<?php if (true === $hasError): ?>
uk-form-danger
<?php endif; ?>
">
            <span uk-icon="icon: cloud-upload"></span>
            <span class="uk-text-middle"><?php echo $uploadFileTextPart1; ?></span>
            <div uk-form-custom>
                <input type="file"
                    <?php
                    // note: this will probably be moved to another hidden input representing the real postable value of this control
                    $this->extraAttributes('renderInputAjaxFileSokoInputControl', $control); ?>
                       multiple>
                <span class="uk-link"><?php echo $uploadFileTextPart2; ?></span>
            </div>
        </div>


        <progress id="js-progressbar" class="uk-progress" value="0" max="100" hidden></progress>

        <script>

            /**
             * Here we define a general hook object,
             * so that the template can do its own things.
             */
            var cssId = "<?php echo addslashes($cssId); ?>";
            var bar = document.getElementById('js-progressbar');


            var component = UIkit.upload('#' + cssId, {

                url: "<?php echo addslashes($url); ?>",
                multiple: true,

                beforeSend: function () {
                    console.log('beforeSend', arguments);
                },
                beforeAll: function () {
                    console.log('beforeAll', arguments);
                },
                load: function () {
                    console.log('load', arguments);
                },
                error: function () {
                    console.log('error', arguments);
                },
                complete: function () {
                    console.log('complete', arguments);
                },

                loadStart: function (e) {
                    console.log('loadStart', arguments);

                    bar.removeAttribute('hidden');
                    bar.max = e.total;
                    bar.value = e.loaded;
                },

                progress: function (e) {
                    console.log('progress', arguments);

                    bar.max = e.total;
                    bar.value = e.loaded;
                },

                loadEnd: function (e) {
                    console.log('loadEnd', arguments);

                    bar.max = e.total;
                    bar.value = e.loaded;
                },

                completeAll: function (request) {
                    console.log('completeAll', arguments);
                    var response = request["response"];


                    setTimeout(function () {
                        bar.setAttribute('hidden', 'hidden');
                    }, 1000);

                    alert('Upload Completed');
                }

            });


        </script>
        <?php
    }

    protected function renderHiddenSokoInputControl(array $control)
    {
        $value = $control['value'];
        $name = $control['name'];
        ?>
        <input type="hidden"
               name="<?php echo htmlspecialchars($name); ?>"
            <?php $this->extraAttributes('renderHiddenSokoInputControl', $control); ?>
               value="<?php echo htmlspecialchars($value); ?>">
        <?php
    }

    protected function renderSokoFilePlaceHolderControl(array $control)
    {

        /**
         * Note that this method suits only single upload file components.
         * If you want multiple file handling, create ANOTHER method...
         */

        $value = $control['value'];
        $name = $control['name'];
        $cssId = StringTool::getUniqueCssId("soko-file-placeholder-");
        $hiddenControlCssId = StringTool::getUniqueCssId("soko-hidden-file-placeholder-");

        ?>
        <div class="file-place-holder" id="<?php echo $cssId; ?>">

        </div>
        <input
                id="<?php echo $hiddenControlCssId; ?>"
                type="hidden"
                name="<?php echo htmlspecialchars($name); ?>"
            <?php $this->extraAttributes('renderHiddenSokoInputControl', $control); ?>
                value="<?php echo htmlspecialchars($value); ?>">
        <script>

            jqueryComponent.ready(function () {

                /**
                 * Here we provide an api for the ajax uploader js component.
                 * To use the api from outside this block, do this:
                 *
                 *
                 * var controlName = "piece_identite_uri";
                 * var placeHolderApi = window.myUiKitFilePlaceHolderApis[controlName];
                 * // placeHolderApi.appendFile( "any..." );
                 * // ...
                 */

                var jControlContainer = $('#<?php echo $cssId; ?>');
                var jHidden = $('#<?php echo $hiddenControlCssId; ?>');
                var MyUiKitFilePlaceHolderApi = function () {


                    var zis = this;
                    this.events = {};


                    function trigger(eventName) {
                        var args = Array.prototype.slice.call(arguments, 1);
                        var zeArgs = [eventName];
                        for (var i in args) {
                            zeArgs.push(args[i]);
                        }


                        var callbacks = zis.events[eventName];
                        for (var i in callbacks) {
                            callbacks[i].apply(null, zeArgs);
                        }
                    }

                    this.appendFile = function (relativePath) {

                        var fileName = relativePath.split(/[\\/]/).pop();
                        var s = '<ul class="uk-list uk-list-bullet"><li>' +
                            '<span class="uk-margin-medium-right">' + fileName + '</span>' +
                            '<a href="" uk-icon="close"></a>' +
                            '</li></ul>';

                        jControlContainer.empty(); // single file handling
                        jControlContainer.append(s);
                        jHidden.val(relativePath);


                        jControlContainer.find("a").on('click', function () {
                            zis.removeFile();
                            return false;
                        });
                    };


                    this.removeFile = function () {
                        jHidden.val("");
                        jControlContainer.empty();
                        trigger("fileRemoved");
                    };


                    this.on = function (eventName, callback) {
                        if (false === (eventName in zis.events)) {
                            zis.events[eventName] = [];
                        }
                        zis.events[eventName].push(callback);
                    };


                };


                //----------------------------------------
                // SHARING THIS API TO THE OUTER WORLD
                //----------------------------------------
                if (false === ('myUiKitFilePlaceHolderApis' in window)) {
                    window.myUiKitFilePlaceHolderApis = {};
                }
                var api = new MyUiKitFilePlaceHolderApi();
                window.myUiKitFilePlaceHolderApis["<?php echo $name; ?>"] = api;


                //----------------------------------------
                // STATIC VALUE?
                //----------------------------------------
                <?php if($value): ?>
                api.appendFile("<?php echo addslashes($value); ?>");
                <?php endif; ?>


            });

        </script>


        <?php
    }

    protected function renderTextareaSokoInputControl(array $control)
    {
        $label = $control['label'];
        $value = $control['value'];
        $controlName = $control['name'];
        $errors = $control['errors'];
        $hasError = (count($errors) > 0);
        ?>
        <textarea class="uk-textarea
            <?php if ($hasError): ?>
            uk-form-danger
            <?php endif; ?>
" rows="5"
                  name="<?php echo htmlspecialchars($controlName); ?>"
                  placeholder="<?php echo htmlspecialchars($label); ?>"
            <?php $this->extraAttributes('renderTextareaSokoInputControl', $control); ?>
        ><?php echo $value; ?></textarea>
        <?php
    }


    protected function renderSokoChoiceControl(array $control)
    {

        $properties = $control['properties'];
        $style = $properties['style'] ?? 'select';

        if ("select" === $style) {
            $this->renderSelectSokoChoiceControl($control);
        } elseif ("radio" === $style) {
            $this->renderRadioSokoChoiceControl($control);
        } elseif ("checkbox" === $style) {
            $this->renderCheckboxSokoChoiceControl($control);
        }
    }


    protected function renderSelectSokoChoiceControl(array $control)
    {
        $errors = $control['errors'];
        $choices = $control['choices'];
        $controlValue = $control['value'];
        $controlName = $control['name'];
        $hasError = (count($errors) > 0);
        ?>

        <select
                class="uk-select
<?php if ($hasError): ?>
uk-form-danger
<?php endif; ?>
"
                name="<?php echo htmlspecialchars($controlName); ?>"
            <?php $this->extraAttributes('renderSelectSokoChoiceControl', $control); ?>
        >
            <?php foreach ($choices as $value => $label):
                $sSel = ((string)$value === (string)$controlValue) ? 'selected="selected"' : "";
                ?>
                <option <?php echo $sSel; ?>
                        value="<?php echo htmlspecialchars($value); ?>"><?php echo $label; ?></option>
            <?php endforeach; ?>
        </select>


        <?php
    }


    protected function renderRadioSokoChoiceControl(array $control)
    {
        $choices = $control['choices'];
        $controlValue = $control['value'];
        $controlName = $control['name'];
        $properties = $control['properties'] ?? [];
        $br = $properties['br'] ?? false;

        ?>
        <?php
        $cpt = 0;
        foreach ($choices as $value => $label):
            $sChecked = ((string)$value === (string)$controlValue) ? 'checked' : '';
            ?>
            <label class="uk-text-small"><input class="uk-radio" type="radio"
                                                name="<?php echo htmlspecialchars($controlName); ?>"
                                                value="<?php echo htmlspecialchars($value); ?>"
                    <?php $this->extraAttributes('renderRadioSokoChoiceControl', $control, $cpt); ?>
                    <?php echo $sChecked; ?>> <?php echo $label; ?></label>
            <?php if (true === $br): ?>
            <br>
        <?php endif; ?>
            <?php
            $cpt++;
        endforeach; ?>
        <?php
    }

    protected function renderCheckboxSokoChoiceControl(array $control)
    {
        $choices = $control['choices'];
        $controlValues = $control['value']; // an array of the selected values
        if (null === $controlValues) {
            $controlValues = [];
        }
        if (is_string($controlValues)) {
            $controlValues = [$controlValues];
        }
        $controlName = $control['name'];
        $properties = $control['properties'] ?? [];
        $br = $properties['br'] ?? false;
        $array = $properties['array'] ?? false;
        ?>
        <?php
        $cpt = 0;
        foreach ($choices as $value => $label):
            if (in_array($value, $controlValues, true)) {
                $sChecked = 'checked';
            } else {
                $sChecked = "";
            }
            ?>
            <label><input class="uk-checkbox"
                          type="checkbox"
                          name="<?php echo htmlspecialchars($controlName); ?><?php echo (true === $array) ? '[]' : ''; ?>"
                          value="<?php echo htmlspecialchars($value); ?>"
                    <?php $this->extraAttributes('renderCheckboxSokoChoiceControl', $control, $cpt); ?>
                    <?php echo $sChecked; ?>> <?php echo $label; ?></label>
            <?php if (true === $br): ?>
            <br>
        <?php endif; ?>

            <?php
            $cpt++;
        endforeach; ?>
        <?php
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    protected function renderNotifications(array $notifications, array $options = [])
    {

        $cssClass = $options['cssClass'] ?? null;

        foreach ($notifications as $notification):

            $type = $notification['type'];
            if ('info' === $type) {
                $type = "primary";
            } elseif ('error' === $type) {
                $type = "danger";
            }

            ?>
            <div class="uk-alert uk-alert-<?php echo $type; ?>
<?php if ($cssClass): ?>
<?php echo " " . $cssClass; ?>
<?php endif; ?>

">
                <!--                <a class="uk-alert-close" uk-close></a>-->
                <?php if ($notification['title']): ?>
                    <h6 class="uk-text-lead"><?php echo $notification['title']; ?></h6>
                <?php endif; ?>
                <p><?php echo $notification['msg']; ?></p>
            </div>
        <?php endforeach;

    }



    //--------------------------------------------
    //
    //--------------------------------------------
    protected function extraAttributes(string $methodName, array $control, $extra = null)
    {

    }
}