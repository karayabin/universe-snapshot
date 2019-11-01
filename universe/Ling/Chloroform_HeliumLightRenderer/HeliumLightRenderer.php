<?php


namespace Ling\Chloroform_HeliumLightRenderer;

use Ling\Bat\CaseTool;
use Ling\Chloroform_HeliumRenderer\HeliumRenderer;
use Ling\HtmlPageTools\Copilot\HtmlPageCopilot;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_AjaxFileUploadManager\Util\LightAjaxFileUploadManagerRenderingUtil;

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
        $copilot->registerLibrary("chloroformHeliumRenderer", [
            '/libs/universe/Ling/Chloroform_HeliumRenderer/helium.js',
        ], [
            '/libs/universe/Ling/Chloroform_HeliumRenderer/helium.css',
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
                $this->printAjaxFileBoxField($field);
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
     * See the @page(Chloroform toArray) method for more info about the fields structure.
     *
     * @param array $field
     * @throws \Exception
     */
    protected function printAjaxFileBoxField(array $field)
    {

        /**
         * @var $copilot HtmlPageCopilot
         */
        $copilot = $this->container->get('html_page_copilot');
        $copilot->registerLibrary("jsFileUploader", [
            '/plugins/Light_Kit_Admin/fileuploader/fileuploader.js',
        ], [
            '/plugins/Light_Kit_Admin/fileuploader/fileuploader.css',
        ]);


        $suffix = CaseTool::toDash($field['id']);
        $sizeClass = $options['sizeClass'] ?? "w100";


        $cssId = $this->getCssIdById($field['id']);
        $style = $this->options['formStyle'];
        $hasHint = ('' !== (string)$field['hint']);
        $hintId = $cssId . '-help';
        $sClass = "";
        if ($field['errors']) {
            $sClass = "helium-is-invalid";
        }

        $uploaderUtil = new LightAjaxFileUploadManagerRenderingUtil();
        $uploaderUtil->setSuffix($suffix);


        ?>
        <div class="field form-group">
            <label for="id-fileuploader-input-<?php echo $suffix; ?>"><?php echo $field['label']; ?></label>
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="id-fileuploader-input-<?php echo $suffix; ?>"
                       value="<?php echo htmlspecialchars($field['value']); ?>"
                    <?php echo $sClass; ?>
                    <?php if (true === $hasHint): ?>
                        aria-describedby="<?php echo $hintId; ?>"
                    <?php endif; ?>
                       multiple
                >
                <label class="custom-file-label"
                       for="id-fileuploader-input-<?php echo $suffix; ?>">Choose file</label>


            </div>
            <div class="file-uploader-dropzone mt-2" id="id-fileuploader-dropzone-<?php echo $suffix; ?>">Or drop file
            </div>

            <div id="id-fileuploader-progress-<?php echo $suffix; ?>"></div>
            <div id="id-fileuploader-urltoform-<?php echo $suffix; ?>"></div>
            <div id="id-fileuploader-filevisualizer-<?php echo $suffix; ?>"
                 class="file-uploader-filevisualizer <?php echo htmlspecialchars($sizeClass); ?>"></div>

            <div id="id-fileuploader-error-<?php echo $suffix; ?>" class="alert alert-danger mt-2 d-none"
                 role="alert">
                <strong>Oops!</strong> The following errors occurred:
                <ul>
                </ul>
            </div>

            <?php $this->printErrorsAndHint($field); ?>
        </div>


        <script>
            document.addEventListener("DOMContentLoaded", function (event) {
                $(document).ready(function () {
                    <?php $uploaderUtil->printJavascript($field); ?>
                });
            });
        </script>

        <?php


    }
}