<?php

namespace Meredith\FormRenderer\ControlsRenderer;

use Bat\CaseTool;
use DirScanner\YorgDirScannerTool;
use Meredith\FormRenderer\ControlsRenderer\Control\AnyTimePickerControlInterface;
use Meredith\FormRenderer\ControlsRenderer\Control\ColisControlInterface;
use Meredith\FormRenderer\ControlsRenderer\Control\ControlInterface;
use Meredith\FormRenderer\ControlsRenderer\Control\InputControlInterface;
use Meredith\FormRenderer\ControlsRenderer\Control\MonoStatusControlInterface;
use Meredith\FormRenderer\ControlsRenderer\Control\SingleSelectChainMasterControlInterface;
use Meredith\FormRenderer\ControlsRenderer\Control\SingleSelectChainSlaveControlInterface;
use Meredith\FormRenderer\ControlsRenderer\Control\SingleSelectControlInterface;
use Meredith\FormRenderer\ControlsRenderer\Control\TokenFieldControlInterface;
use Meredith\FormRenderer\ControlsRenderer\Control\UrlWithDropZoneControlInterface;

/**
 * LingTalfi 2015-12-31
 */
class BootstrapControlsRenderer extends ControlsRenderer
{


    protected function renderControl(ControlInterface $c)
    {
        if ($c instanceof SingleSelectChainMasterControlInterface) {
            return $this->renderSingleSelectChainMasterControl($c);
        }
        elseif ($c instanceof SingleSelectChainSlaveControlInterface) {
            return $this->renderSingleSelectChainSlaveControl($c);
        }
        elseif ($c instanceof ColisControlInterface) {
            return $this->renderColisControl($c);
        }
        elseif ($c instanceof AnyTimePickerControlInterface) {
            return $this->renderAnyTimePickerControl($c);
        }
        elseif ($c instanceof TokenFieldControlInterface) {
            return $this->renderTokenFieldControl($c);
        }
        elseif ($c instanceof MonoStatusControlInterface) {
            return $this->renderMonoStatusControl($c);
        }
        elseif ($c instanceof SingleSelectControlInterface) {
            return $this->renderSingleSelectStatusControl($c);
        }
        elseif ($c instanceof InputControlInterface) {
            return $this->renderInputControl($c);
        }
        else {
            $this->log(sprintf("Doesn't know how to render control of class %s", get_class($c)));
        }
        return '';
    }


    private function renderInputControl(InputControlInterface $c)
    {
        $label = $c->getLabel();
        $required = "";
        if (true === $c->getIsRequired()) {
            $label .= ' <span class="text-danger">*</span>';
            $required = ' required="required"';
        }
        $type = $c->getType();
        $name = htmlspecialchars($c->getName());
        $id = htmlspecialchars($name);
        $placeholder = htmlspecialchars($c->getPlaceholder());
        $value = htmlspecialchars($c->getValue());
        $help = (null !== $h = $c->getHelp()) ? '<span class="help-block">' . $h . '</span>' : '';

        return <<<EEE
<!-- input field -->
<div class="form-group">
    <label class="control-label col-lg-3">$label</label>

    <div class="col-lg-9">
        <input type="$type" name="$name" class="form-control" id="$id"
               $required placeholder="$placeholder"
               value="$value">
        $help
    </div>
</div>
<!-- /input field -->
EEE;

    }


    private function renderMonoStatusControl(MonoStatusControlInterface $c)
    {
        $label = $c->getLabel();
        $value = htmlspecialchars($c->getValue());
        $name = htmlspecialchars($c->getName());
        $id = htmlspecialchars($name);
        $checked = (true === (bool)$value) ? 'checked="checked"' : '';

        return <<<EEE
<!-- switchery single -->
<div class="form-group">
    <div class="col-lg-9">
        <div class="checkbox checkbox-switchery switchery-xs">
            <label>
                <input id="$id" type="checkbox" name="$name" value="$value" class="switchery" $checked>
                $label
            </label>
        </div>
    </div>
</div>
<!-- /switchery single -->
EEE;

    }


    private function renderSingleSelectStatusControl(SingleSelectControlInterface $c)
    {
        $label = $c->getLabel();
        $value = $c->getValue();
        $name = htmlspecialchars($c->getName());
        $v2l = $c->getValues2Labels();

        $s = '';
        $s .= <<<EEE
<!-- single select -->
<div class="form-group">
    <label class="control-label col-lg-2">$label</label>
    <div class="col-lg-10">
        <select id="$name"  class="form-control" name="$name">
EEE;

        foreach ($v2l as $v => $l) {
            $sSel = ($v === $value) ? ' selected="selected"' : '';
            $val = htmlspecialchars($v);
            $s .= "<option" . $sSel . " value=\"$val\">$l</option>";
        }
        $s .= <<<EEE
        </select>
    </div>
</div>
<!-- /single select -->
EEE;
        return $s;

    }


    private function renderSingleSelectChainMasterControl(SingleSelectChainMasterControlInterface $c)
    {
        $label = $c->getLabel();
        $value = $c->getValue();
        $name = htmlspecialchars($c->getName());
        $v2l = $c->getValues2Labels();
        $nodes = $c->getNodes();
        $options = json_encode($c->getOptions());


        $s = '';
        $s .= <<<EEE
<!-- single select chain's master -->
<div class="form-group">
    <label class="control-label col-lg-2">$label</label>
    <div class="col-lg-10">
        <select id="$name" class="form-control" name="$name">
EEE;

        foreach ($v2l as $v => $l) {
            $sSel = ($v === $value) ? ' selected="selected"' : '';
            $val = htmlspecialchars($v);
            $s .= "<option" . $sSel . " value=\"$val\">$l</option>";
        }
        $s .= <<<EEE
        </select>
    </div>
</div>

<script>
    (function ($) {
        $(document).ready(function () {
            var oChain = new window.selectChain($options);\n
EEE;
        $lastNode = array_pop($nodes);
        if ($nodes) {
            foreach ($nodes as $node) {
                list($name, $url, $params) = $node;
                $params = json_encode($params);
                $s .= "oChain.addNode($('form #$name'), '$url', $params);\n";
            }
        }
        if ($lastNode) {
            $name = array_shift($lastNode);
            $s .= "oChain.addNode($('form #$name'));\n";
        }
        $s .= <<<EEE
            oChain.start();
        });
    })(jQuery);
</script>
<!-- /single select chain's master -->
EEE;

        return $s;

    }

    private function renderSingleSelectChainSlaveControl(SingleSelectChainSlaveControlInterface $c)
    {
        $label = $c->getLabel();
        $name = htmlspecialchars($c->getName());

        $s = '';
        $s .= <<<EEE
<!-- single select chain's slave -->
<div class="form-group">
    <label class="control-label col-lg-2">$label</label>
    <div class="col-lg-10">
        <select id="$name" class="form-control" name="$name"></select>
    </div>
</div>
<!-- /single select chain's slave -->
EEE;

        return $s;

    }


    private function renderColisControl(ColisControlInterface $c)
    {
        $label = $c->getLabel();
        $required = "";
        if (true === $c->getIsRequired()) {
            $label .= ' <span class="text-danger">*</span>';
            $required = ' required="required"';
        }
        $name = htmlspecialchars($c->getName());
        $id = htmlspecialchars($name);
        $placeholder = htmlspecialchars($c->getPlaceholder());
        $value = htmlspecialchars($c->getValue());
        $help = (null !== $h = $c->getHelp()) ? '<span class="help-block">' . $h . '</span>' : '';


        $extensions = $c->getExtensions();
        $profileId = $c->getProfileId();
        $itemNames = $c->getItemNames();
        $maxSize = $c->getMaxSize();
        $chunkSize = $c->getChunkSize();
        $onPreviewDisplayAfter = $c->getOnPreviewDisplayAfterJsCallback();


        $colisDataId = 'colis-' . CaseTool::toSnake($id);

        $itemNames = json_encode($itemNames);
        $previewOptions = json_encode($c->getPreviewOptions());


        return <<<EEE
<!-- input field -->
<div class="form-group">
    <label class="control-label col-lg-3">$label</label>

    <div class="col-lg-9">
    
        <input data-colis-id="$colisDataId" type="text" name="$name" class="form-control colis_selector typeahead-basic" id="$id"
               $required placeholder="$placeholder"
               value="$value">
        $help
    </div>
</div>
<script>
   (function ($) {
        $(document).ready(function () {

            var itemList = $itemNames;
            
            var previewOptions = $previewOptions;
            
            
            
            window.colisClasses.preview.prototype.buildTemplate = function (jWrapper) {
                jWrapper.append('<div class="colis_preview alert alert-primary"><ul class="colis_polaroids"></ul></div>');
                this.jPreview = jWrapper.find('.colis_preview');
            };
            

            $('.colis_selector[data-colis-id="$colisDataId"]').colis({
                urlInfo: "/libs/colis/service/ling/colis_info_mixed.php",
                requestPayload: {
                    id: "$profileId"
                },
                selector: {
                    items: itemList,
                    options: {
                        classNames: {
                            menu: 'tt-dropdown-menu'
                        }
                    }
                },
                uploader: {
                    url: "/libs/colis/service/ling/colis_upload_mixed.php",
                    multipart_params: {
                        id: "$profileId"
                    },
                    filters: {
                        // Specify what files to browse for
                        mime_types: [
                            {title: "my files", extensions: "$extensions"}
                        ],
                        // Maximum file size
                        max_file_size: '$maxSize'
                    }, 
                    chunk_size: "$chunkSize"                                       
                },
                preview: previewOptions,
                onPreviewDisplayAfter: $onPreviewDisplayAfter
            });

        });
    })(jQuery);
</script>        
<!-- /input field -->
EEE;

    }


    private function renderTokenFieldControl(TokenFieldControlInterface $c)
    {
        $label = $c->getLabel();
        $required = "";
        if (true === $c->getIsRequired()) {
            $label .= ' <span class="text-danger">*</span>';
            $required = ' required="required"';
        }
        $name = htmlspecialchars($c->getName());
        $id = htmlspecialchars($name);
        $placeholder = htmlspecialchars($c->getPlaceholder());
        $value = htmlspecialchars($c->getValue());
        $help = (null !== $h = $c->getHelp()) ? '<span class="help-block">' . $h . '</span>' : '';
        $sugg = $c->getSuggestions();
        $fSugg = [];
        foreach ($sugg as $v) {
            $fSugg[] = ['value' => $v];
        }
        $fSugg = json_encode($fSugg);


        return <<<EEE
<!-- input field -->
<div class="form-group">
    <label class="control-label col-lg-3">$label</label>

    <div class="col-lg-9">
        <input type="text" name="$name" class="form-control tokenfield-typeahead" id="$id"
               $required placeholder="$placeholder"
               value="$value">
        $help
    </div>
</div>
<script>
   (function ($) {
        $(document).ready(function () {
        
        
            var engine = new Bloodhound({
                local: $fSugg,
                datumTokenizer: function(d) {
                    return Bloodhound.tokenizers.whitespace(d.value);
                },
                queryTokenizer: Bloodhound.tokenizers.whitespace
            });
        
            // Initialize engine
            engine.initialize();
        
            // Initialize tokenfield
            $('form #$id').tokenfield({
                typeahead: [null, { source: engine.ttAdapter() }]
            });
        

        });
    })(jQuery);
    
    
</script>
<!-- /input field -->
EEE;

    }

    private function renderAnyTimePickerControl(AnyTimePickerControlInterface $c)
    {
        $label = $c->getLabel();
        $required = "";
        if (true === $c->getIsRequired()) {
            $label .= ' <span class="text-danger">*</span>';
            $required = ' required="required"';
        }
        $name = htmlspecialchars($c->getName());
        $id = htmlspecialchars($name);
        $placeholder = htmlspecialchars($c->getPlaceholder());
        $value = htmlspecialchars($c->getValue());
        $help = (null !== $h = $c->getHelp()) ? '<span class="help-block">' . $h . '</span>' : '';
        $options = json_encode($c->getPickerOptions());

        return <<<EEE
<!-- input field -->
<div class="form-group">
    <label class="control-label col-lg-3">$label</label>

    <div class="col-lg-9">
        <div class="input-group">
            <span class="input-group-addon"><i class="icon-calendar3"></i></span>
            <input name="$name"
            $required
            placeholder="$placeholder"
            type="text" class="form-control" id="$id" value="$value">
        </div>    
        $help
    </div>
</div>
<!-- /input field -->
<script>
   (function ($) {
        $(document).ready(function () {
            $('form #$id').AnyTime_picker($options);
        });
    })(jQuery);    
</script>
EEE;

    }

}